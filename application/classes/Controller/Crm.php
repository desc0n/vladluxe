<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crm extends Controller_Base 
{
    public function getBaseTemplate()
    {
        if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('/crm/login');
        }

        return View::factory('crm/template')
            ->set('get', $_GET)
            ->set('post', $_POST)
        ;
    }

    public function action_index()
    {
        if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('/crm/login');
        }

        if (Auth::instance()->logged_in() && isset($_POST['logout'])) {
            Auth::instance()->logout();
            HTTP::redirect('/');
        }

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/index')
        ;

        $this->response->body($template);
    }

    public function action_login()
    {
        if (!Auth::instance()->logged_in() && isset($_POST['login'])) {
            Auth::instance()->login($this->request->post('username'), $this->request->post('password'),true);
            HTTP::redirect('/crm/notices_list');
        }

        $template = View::factory('crm/login')
            ->set('post', $this->request->post())
        ;

        $this->response->body($template);
    }

    public function action_logout()
    {
        if (Auth::instance()->logged_in() && isset($_POST['logout'])) {
            Auth::instance()->logout();

            HTTP::redirect('/');
        }
    }

    public function action_registration()
    {
        $template = View::factory('crm/registration')
            ->set('post', $this->request->post())
            ->set('error', '')
        ;

        if (count($this->request->post())) {
            if (empty(Arr::get($_POST,'username'))) {
                $template->set('error', '<div class="alert alert-danger"><strong>Не указан логин!</strong> Укажите Ваш логин.</div>');
            } elseif (empty(Arr::get($_POST,'email'))) {
                $template->set('error', '<div class="alert alert-danger"><strong>Не указана почта!</strong> Укажите Вашу почту.</div>');
            } elseif (Arr::get($_POST,'password','')=="") {
                $template->set('error', '<div class="alert alert-danger"><strong>Не указан пароль!</strong> Укажите Ваш пароль.</div>');
            } else if (Arr::get($_POST,'password') != Arr::get($_POST,'password2')) {
                $template->set('error', '<div class="alert alert-danger"><strong>Пароли не совпадают!</strong> Проверьте правильность подтверждения пароля.</div>');
            } else {
                $user = ORM::factory('User');
                $user->values(array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'password_confirm' => $_POST['password2'],
                ));
                $some_error = false;

                try {
                    $user->save();
                    $user->add("roles",ORM::factory("Role",1));
                }
                catch (ORM_Validation_Exception $e) {
                    $some_error = $e->errors('models');
                }

                if ($some_error) {
                    $template->set('error', '<div class="alert alert-danger"><strong>Ошибка регистрационных данных!</strong> Проверьте правильность ввода данных.</div>');

                    if (isset($some_error['username'])) {
                        if ($some_error['username'] == "models/user.username.unique") {
                            $template->set('error', '<div class="alert alert-danger"><strong>Такой логин уже есть в базе!</strong> Придумайте новый логин.</div>');
                        }
                    }
                    else if (isset($some_error['email'])) {
                        if ($some_error['email']=="email address must be an email address") {
                            $template->set('error', '<div class="alert alert-danger"><strong>Некорректный формат почты!</strong> Проверьте правильность написания почты.</div>');
                        }
                        if ($some_error['email']=="models/user.email.unique") {
                            $template->set('error', '<div class="alert alert-danger"><strong>Такая почта есть в базе!</strong> Укажите другую почту.</div>');
                        }
                    }
                } else {
                    HTTP::redirect('/crm');
                }
            }
        }

        $this->response->body($template);
    }

    public function action_add_notice()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/add_notice')
            ->set('districts', $contentModel->findAllDistricts())
            ->set('types', $noticeModel->findAllTypes())
        ;

        if (isset($_POST['addnotice'])) {
            $id = $noticeModel->addNotice($_POST);
            HTTP::redirect('/crm/redact_notice/' . $id);
        }

        $this->response->body($template);
    }

    public function action_redact_notice()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/redact_notice')
            ->set('districts', $contentModel->findAllDistricts())
            ->set('noticeData', $noticeModel->findById($this->request->param('id')))
            ->set('types', $noticeModel->findAllTypes())
        ;

        $filename=Arr::get($_FILES, 'imgname', []);
        if (!empty($filename)) {
            $noticeModel->loadNoticeImg($_FILES, $this->request->param('id'));
            HTTP::redirect($this->request->referrer());
        }

        if (isset($_POST['redact_notice'])) {
            $noticeModel->setNotice($_POST);

            HTTP::redirect($this->request->referrer());
        }

        $this->response->body($template);
    }

    public function action_notices_list()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/notices_list')
            ->set('noticesList', $noticeModel->getList(
                Arr::get($this->request->query(), 'page', 1),
                Arr::get($this->request->query(), 'limit', 20)
            ))
            ->set('paginationCount', $noticeModel->getListPaginationCount(Arr::get($this->request->query(), 'limit', 20)))
            ->set('page', Arr::get($this->request->query(), 'page', 1))
            ->set('types', $noticeModel->findAllTypes())
        ;

        $this->response->body($template);
    }

    public function action_pages_list()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $template = $this->getBaseTemplate();

        if (isset($_POST['redactpage'])) {
            $adminModel->setPage($_POST);
            HTTP::redirect($this->request->referrer());
        }

        $template->content = View::factory('crm/pages_list')
            ->set('pages', $contentModel->getPages())
        ;

        $this->response->body($template);
    }

    public function action_redact_page()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $template = $this->getBaseTemplate();

        if (isset($_POST['redact_page'])) {
            $adminModel->setPage($this->request->query('id'), $this->request->post('content'));

            HTTP::redirect($this->request->referrer());
        }

        $template->content = View::factory('crm/redact_page')
            ->set('pageData', $contentModel->findPageById((int)$this->request->query('id')))
        ;

        $this->response->body($template);
    }

    public function action_contacts()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $template = $this->getBaseTemplate();

        if (!empty($this->request->post('addContact'))) {
            $contentModel->addContact($this->request->post('type'), $this->request->post('value'));
            HTTP::redirect($this->request->referrer());
        }

        if (!empty($this->request->post('updateContacts'))) {
            $contentModel->updateContacts($this->request->post());
            HTTP::redirect($this->request->referrer());
        }

        $template->content = View::factory('crm/contacts')
            ->set('contacts', $contentModel->getContacts())
        ;
        $this->response->body($template);
    }
}