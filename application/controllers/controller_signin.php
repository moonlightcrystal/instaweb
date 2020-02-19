<?php

class Controller_Signin extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Signin();
    }

    function action_index()
    {

        $this->view->generate('signin_view.php', 'template_view_auth.php');
    }

    function action_authenfication()
    {
        if (!empty($_POST['login'] && !empty($_POST['passwd']))) {
            if (($info = $this->model->authentication())) {
                if (password_verify($_POST['passwd'], $info['password'])) {
                    $_SESSION['user_id'] = $info['id'];
                    $_SESSION['login'] = $info['login'];
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['password'] = $info['password'];
//                    $_SESSION['email'] = htmlspecialchars($_POST['email']);
                    $this->view->redirect('/main');
                } else {
                    echo "<script  type='text/javascript'>alert('incorrect password')</script>";
                }
            } else {
                echo "<script  type='text/javascript'>alert('incorrect login')</script>";
            }
        }
        $this->view->redirect('/signin');
    }

    function action_signout(){
        session_destroy();
        $this->view->redirect('/main');
    }
}