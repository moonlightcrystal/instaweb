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
        if (isset($_POST['profile'])) {
            $this->view->redirect('/profile');
        } else
            $this->view->redirect('/');
    }

    function action_addComment()
    {
        if (isset($_POST) && !empty(htmlspecialchars($_POST['comments']) && !empty($_SESSION['login'] && !empty($_POST['image_id'])))) {
            $comments = htmlspecialchars($_POST['comments']);
            $this->model->insertComments($_SESSION['login'], $_POST['image_id'], $comments);

            $data = $this->model->getEmail($_POST['image_id']);
            $email = $data[0]['email'];
            if ($data[0]['notif'])
                mail($email, "New comment from snapicture", "Hello " . $_SESSION['login'] . ', ' . 'new comment is on your post is "' . $_POST['comments'] . '" from ' . $_SESSION['login']);
        }
        if (isset($_POST['profile'])) {
            $this->view->redirect('/profile');
        } else
            $this->view->redirect('/');
    }
}