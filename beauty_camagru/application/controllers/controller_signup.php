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
//        print $_SESSION['user_id'];
//        if(isset($_SESSION['user_id']))
//            $this->view->generate('signin_view.php', 'template_view_auth.php');
//        else
//            $this->view->generate('signup_view.php', 'template_view_auth.php');
//        $page = isset($_SESSION['user_id']) ? 'signin_view.php' : 'signup_view.php';
//        $this->view->generate($page, 'template_view_auth.php');
        if ($action == 'code') {
            var_dump($_SESSION);
            $this->view->generate('confirmemail_view.php', 'template_view_auth.php');
//        elseif ($_POST['code'])
//           $this->view->generate('signup_view.php', 'template_view_auth.php');
        }
        else
            $this->view->generate('signup_view.php', 'template_view_auth.php');
    }

    function action_register()
    {
        if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['passwd'])) {
            if ($this->model->get_data() == false) {
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

        var_dump($_SESSION);
        $this->view->redirect('/signin');
        if (isset($_POST['code']) && !empty($_SESSION['email'])) {
            var_dump($_POST);
            if ($_SESSION['code'] == htmlspecialchars($_POST['code'])) {
                $fullUser = $this->model->registerUser();
                $_SESSION['user_id'] = $fullUser['id'];
                $this->view->redirect('/signin');
            } else
                echo "incorecct code";
        }
    }
}
//            $fullUser = $this->model->registerUser();
//            var_dump($fullUser);
//            if ($fullUser) {
//                print $fullUser['id'];
//                $_SESSION['user_id'] = $fullUser['id'];
//                $_SESSION['username'] = $_POST['username'];
//                $_SESSION['email'] = $_POST['email'];
//                $this->view->redirect('/signin');
//                echo "Registartion succesfull :)";
//            }
//        } else
//            echo "Registartion failed :(";
//    } else
//$this->view->redirect('/signin');
//}

