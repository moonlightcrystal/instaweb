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
        $likes = array();
        if (isset($_POST) && !empty($_POST['image_id'])) {
            $this->model->insertLikes($_POST['image_id']);
//            $_POST['arrayLikes'] = array_push($_POST['arrayLikes']);
            return(array_unshift($likes, $_POST['image_id']));
            var_dump($likes);
        }
//        $this->view->redirect('/');
    }
}