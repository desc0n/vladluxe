<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base
{
	public function action_index()
	{
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        View::set_global('title', 'Главная');
        View::set_global('rootPage', 'main');

		$template = $contentModel->getBaseTemplate();

        $template->content = View::factory('index')
            ->set('districts', $contentModel->findAllDistricts())
            ->set('types', $noticeModel->findAllTypes())
            ->set('get', $this->request->query())
            ->set('post', $this->request->post())
        ;

        $template
            ->set('get', $this->request->query())
            ->set('post', $this->request->post())
        ;

		$this->response->body($template);
	}

	public function action_page()
	{
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $slug = $this->request->param('slug');
        $pageData = $contentModel->findPageBySlug($slug);

        View::set_global('title', Arr::get($pageData, 'title'));
        View::set_global('rootPage', $slug);

        $template = $contentModel->getBaseTemplate();
        
		$template->content = View::factory('page')
			->set('pageData', $pageData)
            ->set('get', $this->request->query())
        ;

        $template
            ->set('get', $this->request->query())
            ->set('post', $this->request->post())
        ;
        
		$this->response->body($template);
	}

	public function action_contact()
	{
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        View::set_global('title', 'Контакты');
        View::set_global('rootPage', 'contact');

        $template = $contentModel->getBaseTemplate();

		$template->content = View::factory('contact')
            ->set('get', $this->request->query())
        ;

        $template
            ->set('get', $this->request->query())
            ->set('post', $this->request->post())
        ;

        $this->response->body($template);
	}

    public function action_rent_apartment()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        View::set_global('title', 'Сдать квартиру');
        View::set_global('rootPage', 'rent_apartment');

        $template = $contentModel->getBaseTemplate();

        $template->content = View::factory('rent_apartment')
            ->set('get', $this->request->query())
            ->set('districts', $contentModel->findAllDistricts())
            ->set('types', $noticeModel->findAllTypes())
        ;

        $template
            ->set('get', $this->request->query())
            ->set('post', $this->request->post())
        ;

        $this->response->body($template);
    }

    public function action_search()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        View::set_global('title', 'Поиск');
        View::set_global('rootPage', 'search');

        $template = $contentModel->getBaseTemplate();

        $content = View::factory('search')
            ->set('districts', $contentModel->findAllDistricts())
            ->set('types', $noticeModel->findAllTypes())
            ->set('searchedNotices', $noticeModel->searchNotices($this->request->query()))
            ->set('popularNotices', $noticeModel->findPopular())
            ->set('get', $this->request->query())
        ;

        $template
            ->set('content', $content)
            ->set('get', $this->request->query())
            ->set('post', $this->request->post())
        ;

        $this->response->body($template);
    }
}