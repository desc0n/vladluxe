<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crm extends Controller_Base 
{
    public function getBaseTemplate()
    {
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

        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/index')
        ;

        $this->response->body($template);
    }

    public function action_login()
    {
        if (!Auth::instance()->logged_in() && isset($_POST['login'])) {
            Auth::instance()->login($this->request->post('username'), $this->request->post('password'),true);
            HTTP::redirect('/crm');
        }

        $template = View::factory('crm/login')
            ->set('post', $this->request->post())
        ;

        $this->response->body($template);
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

    public function action_sale()
    {
        /** @var $actionModel Model_Action */
        $actionModel = Model::factory('Action');

        $saleId = $this->request->param('id');

        if ($this->request->post('redactActionClient') !== null) {
            $actionModel->setActionCustomer(
                $this->request->post('redactActionClient'),
                $this->request->post('name'),
                $this->request->post('address'),
                $this->request->post('tk'),
                $this->request->post('phone'),
                $this->request->post('email')
            );

            HTTP::redirect($this->request->referrer());
        }

        if ($this->request->post('addDelivery') !== null) {
            $actionModel->addSaleDelivery($saleId);

            HTTP::redirect($this->request->referrer());
        }

        $saleData = $actionModel->getSaleData($saleId);

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/sale_info')
            ->set('saleData', $saleData)
            ->set('saleProducts', $actionModel->getSaleProductsData($saleId))
            ->set('get', $this->request->query())
        ;

        $this->response->body($template);
    }

    public function action_sales_list()
    {
        /** @var $actionModel Model_Action */
        $actionModel = Model::factory('Action');

        $template = $this->getBaseTemplate();

        $startDate = DateTime::createFromFormat('d.m.Y', null != $this->request->query('start') ? $this->request->query('start') : date('d.m.Y'));
        $endDate = DateTime::createFromFormat('d.m.Y', null != $this->request->query('end') ? $this->request->query('end') : date('d.m.Y'));

        $start = null != $this->request->query('start') ? $startDate->format('d.m.Y') : $startDate->modify('- 1 week')->format('d.m.Y');
        $end = $endDate->format('d.m.Y');

        $template->content = View::factory('crm/sales_list')
            ->set('actionsList', $actionModel->findAllSales($start, $end))
            ->set('get', $this->request->query())
            ->set('start', $start)
            ->set('end', $end)
        ;

        $this->response->body($template);
    }
}