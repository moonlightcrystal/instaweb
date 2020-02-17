<?php

class Controller_Profile extends Controller
{

    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION) && !empty($_SESSION['user_id']))
            $this->model = new Model_Profile($_SESSION['user_id']);
        else
            $this->view->redirect('/');
    }

    function action_index()
    {
        $this->view->generate('profile_view.php', 'template_view.php');
    }

    function action_changeLogin()
    {
        if (isset($_POST) && !empty($_POST['login'])) {
            if ($this->model->checkLoginAtRegister(htmlspecialchars($_POST['login'])))
                echo "<script  type='text/javascript'>alert('choose other login')</script>";
            else {
                if ($this->model->changeUserInfo('login', $_POST['login']))
                    $_SESSION['login'] = $_POST['login'];
                else
                    echo "<script  type='text/javascript'>alert('editing login failed')</script>";
            }
        } else
            echo "<script  type='text/javascript'>alert('fill in the field')</script>";
        $this->view->redirect('/profile');
    }

    function action_confirmMail()
    {
        if (isset($_POST) && !empty($_POST['email'])) {
            if ($this->model->checkEmailAtRegister(htmlspecialchars($_POST['email'])))
                echo "<script  type='text/javascript'>alert('choose other email')</script>";
            else {
                $_SESSION['code'] = $this->model->confirmEmail($_POST['email']);
                $_SESSION['new_email'] = $_POST['email'];
                echo "<script  type='text/javascript'>alert('check your email and fill in the field below')</script>";

            }
        }
        $this->view->redirect('/profile');
    }

    function action_changeEmail()
    {
        if (isset($_POST) && !empty(htmlspecialchars($_POST['code']))) {
            if ($_SESSION['code'] == $_POST['code']) {
                if ($this->model->changeUserInfo('email', $_SESSION['new_email'])) {
                    $_SESSION['email'] = $_SESSION['new_email'];
                } else
                    echo "<script  type='text/javascript'>alert('editing email failed')</script>";
            } else
                echo "<script  type='text/javascript'>alert('the code doesn\'t match')</script>";
        } else
            echo "<script  type='text/javascript'>alert('fill in the field')</script>";
        $this->view->redirect('/profile');

    }

    function action_changePassword()
    {
        if (isset($_POST) && !empty(htmlspecialchars($_POST['newpasswd']) && !empty(htmlspecialchars($_POST['oldpasswd'])))) {
            if (password_verify($_POST['oldpasswd'], $_SESSION['password'])) {
                $this->model->changeUserInfo('password', password_hash($_POST['newpasswd'], PASSWORD_DEFAULT));
                echo "<script  type='text/javascript'>alert('the new password was saved successfully')</script>";
            } else
                echo "<script  type='text/javascript'>alert('incorrect password')</script>";
        } else
            echo "<script  type='text/javascript'>alert('fill in the field')</script>";
        $this->view->redirect('/profile');
    }

    function action_changeAvatar()
    {
        if (isset($_POST) && !empty($_FILES['image'])) {
            $avatarname = $this->model->uploadImg($_FILES['image']);
            $this->model->changeUserInfo('avatar', $avatarname);
            $_SESSION['avatar'] = $avatarname;
            $this->view->redirect('/profile');
        }
    }
}