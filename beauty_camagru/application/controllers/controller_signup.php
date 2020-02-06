<?php

class Controller_Signup extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Signup();
    }


    function action_index()
    {
        $this->view->generate('signup_view.php', 'template_view_auth.php');
    }

    function action_register()
    {
        if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['passwd'])) {
            if ($this->model->get_data() == false) {
                $fullUser = $this->model->registerUser();
                if ($fullUser) {
                    $_SESSION['user_id'] = $saved['id'];
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['email'] = $_POST['email'];
                    echo "Registartion succesfull :)";
                }
                else
                    echo "Registartion failed :(";
            } else
                echo "choose other login or mail";
        }
        $this->indexAction();
    }
}