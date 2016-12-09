<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
    public function action_find_street()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $this->response->body(json_encode($contentModel->findStreets($this->request->query('query'))));
    }

    public function action_remove_notice_img()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $noticeModel->removeNoticeImg($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_remove_notice()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $noticeModel->removeNotice($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_show_on_index_top()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $noticeModel->showOnIndexTop($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_hide_on_index_top()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $noticeModel->hideOnIndexTop($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_show_on_index_bottom()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $noticeModel->showOnIndexBottom($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_hide_on_index_bottom()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $noticeModel->hideOnIndexBottom($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_send_notice_query()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $result = $noticeModel->sendNoticeQuery($this->request->post());

        $this->response->body(json_encode(['result' => $result]));
    }
}
