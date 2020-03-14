<?php

class Controller_Addpost extends Controller
{

    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION) && !empty($_SESSION['user_id']))
            $this->model = new Model_Addpost();
        else
            $this->view->redirect('/');
    }

    function action_index()
    {
        $data = $this->model->getUserImages($_SESSION['user_id']);
        $this->view->generate('addpost_view.php', 'template_view.php', $data);
    }

    function action_addPostToDraft()
    {
        if (isset($_POST) && !empty($_FILES['image'])) {
            if (($filename = $this->model->uploadImg($_FILES['image']))) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;
                if (file_exists($path)) {
                    if ($this->model->addPost($filename, $_SESSION['user_id'], $_POST['title'])) {
                        $this->view->redirect('/addpost');
                    }
                }

            }
            $this->view->redirect('/addpost');
        }
    }

    function action_deletePost()
    {
        if (isset($_POST) && !empty($_POST['image_id'] && !empty($_POST['image_name']))) {
            if ($this->model->deletePost($_POST['image_id'])) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $_POST['image_name'];
                if (file_exists($path))
                    unlink($path);
            }
        }
        $this->view->redirect('/addpost');
    }


    function action_publishPost()
    {
        if (isset($_POST) && !empty($_POST['image_id'])) {
            $this->model->publish($_POST['image_id']);

        }
        $this->view->redirect('/');
    }

    function action_createDraft()
    {
        if (isset($_POST) && !empty($_POST['file'])) {
            $img = str_replace('data:image/png;base64,', '', $_POST['file']);
            $img = str_replace(' ', '+', $img);
            $dec_img = base64_decode($img);
            $name = uniqid() . ".png";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $name, $dec_img);
            $this->model->addPost($name, $_SESSION['user_id'], $_POST['title']);
        }

    }
}