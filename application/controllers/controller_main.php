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
        if (isset($_POST) && !empty($_POST['image_id']) && !empty($_SESSION['user_id'])) {
            if (empty($this->model->selectLikes($_POST['image_id'], $_SESSION['user_id'])))
                $this->model->insertLikes($_POST['image_id'], $_SESSION['user_id'], 'insert');
            else
                $this->model->insertLikes($_POST['image_id'], $_SESSION['user_id'], 'delete');
        }
        $this->view->redirect('/');
    }

    function action_addComment()
    {
        if (isset($_POST) && !empty($_POST['comments'] && !empty($_SESSION['login'] && !empty($_POST['image_id'])))) {
            $this->model->insertComments($_SESSION['login'], $_POST['image_id'], $_POST['comments']);
        }
        $this->view->redirect('/');
    }
}