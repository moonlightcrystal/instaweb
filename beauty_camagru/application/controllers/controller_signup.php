<?php

class Controller_Signup extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Signup();
    }


    function action_index($action = null)
    {
        if ($action == 'code')
            $this->view->generate('confirmemail_view.php', 'template_view_auth.php');
        else
            $this->view->generate('signup_view.php', 'template_view_auth.php');
    }

    function action_register()
    {
        if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['passwd'])) {
            if ($this->model->checkLoginAtRegister($_POST['login'])) {
                echo "<script  type='text/javascript'>alert('choose other login')</script>";
                $this->view->redirect('/signup');
            } elseif ($this->model->checkEmailAtRegister($_POST['email'])) {
                echo "<script  type='text/javascript'>alert('choose other mail')</script>";
                $this->view->redirect('/signup');
            } else {

                $_SESSION['login'] = htmlspecialchars($_POST['login']);
                $_SESSION['email'] = htmlspecialchars($_POST['email']);
                $_SESSION['passwd'] = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                $_SESSION['code'] = $this->model->confirmEmail($_SESSION['email']);
                $this->action_index('code');
            }
        }
    }

    function action_checkCode()
    {

        if (!empty($_POST['code']) && !empty($_SESSION['email'])) {
            if (($_SESSION['code'] == $_POST['code'])) {
                var_dump($_SESSION);
                echo '\n';
                var_dump($_POST);
                $fullUser = $this->model->registerUser();
                $_SESSION['user_id'] = $fullUser['id'];
                $this->view->redirect('/signin');
            } else {
                echo "<script  type='text/javascript'>alert('incorrect code from mail')</script>";
                $this->view->redirect('/signup');
            }
        }
    }
}


