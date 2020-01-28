<?php

class Controller_Signup extends Controller
{

    function action_index()
    {
        $this->view->generate('signup_view.php', 'template_view_auth.php');
    }
}