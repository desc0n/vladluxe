<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base
{
	public function action_index()
	{
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        View::set_global('title', 'Главная');
        View::set_global('rootPage', 'main');

		$template = $contentModel->getBaseTemplate();

        $template->content = View::factory('index')
            ->set('get', $_GET)
            ->set('post', $_POST)
            ->set('districts', $contentModel->findAllDistricts())
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
			->set('get', $_GET)
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
			->set('get', $_GET)
        ;

        $this->response->body($template);
	}

    public function action_reviews()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        View::set_global('title', 'Отзывы');

        $template = View::factory("template");

        $content = View::factory('reviews')
            ->set('reviewsData', $adminModel->findReviews());

        $template
            ->set('content', $content)
            ->set('page', 'reviews');
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
        ;

        $template
            ->set('content', $content)
            ->set('page', 'search')
        ;

        $this->response->body($template);
    }
}