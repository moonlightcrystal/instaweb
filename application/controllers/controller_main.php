<?php

class Controller_Main extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Main();
    }

    function action_index()
    {
        $data = $this->model->getPublishedImages();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    function action_addLike()
    {
        if (isset($_POST) && !empty($_POST['image_id'])) {
            $this->model->insertLikes($_POST['image_id']);
        }
        $this->view->redirect('/');
    }
}