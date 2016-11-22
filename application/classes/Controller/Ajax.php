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
}
