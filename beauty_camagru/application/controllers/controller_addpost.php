<?php

class Controller_Addpost extends Controller
{

    function action_index()
    {
        $this->view->generate('addpost_view.php', 'template_view.php');
    }
}