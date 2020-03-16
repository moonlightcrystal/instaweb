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
                $_POST['passwd'] = htmlspecialchars($_POST['passwd']);
                if (password_verify($_POST['passwd'], $info['password'])) {
                    $_SESSION['user_id'] = $info['id'];
                    $_SESSION['login'] = $info['login'];
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['password'] = $info['password'];
                    $_SESSION['notif'] = $info['notif'];
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

    function action_signout()
    {
        session_destroy();
        $this->view->redirect('/main');
    }

    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    function action_forgotpassword()
    {
        if (isset($_POST) && isset($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
            if ($this->model->checkEmailAtRegister($email)) {
                $user_id = $this->model->getUserId($email);
                $newpassword = $this->randomPassword();
                mail($email, 'NEW PASSWORD ON SNAPPICTURE', 'Hello, ' . 'Your new password on snapicture ' . $newpassword);
                $this->model->updatePasword($user_id, password_hash($newpassword, PASSWORD_DEFAULT));
                echo "<script  type='text/javascript'>alert('Check your email and type new password')</script>";
            } else
                echo "<script  type='text/javascript'>alert('this email does not exist')</script>";
        }
        $this->view->redirect('/signin');
    }
}