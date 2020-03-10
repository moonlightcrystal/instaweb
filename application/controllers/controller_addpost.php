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

    function action_addLivePhototoDraft()
    {
        $folder = "/uploads/";
        $destinationFolder = $_SERVER['DOCUMENT_ROOT'] . $folder; // you may need to adjust to your server configuration
        $maxFileSize = 2 * 1024 * 1024;

// Get the posted data
        $postdata = file_get_contents("php://input");

        if (!isset($postdata) || empty($postdata))
            exit(json_encode(["success" => false, "reason" => "Not a post data"]));

// Extract the data
        $request = json_decode($postdata);

// Validate
        if (trim($request->data) === "")
            exit(json_encode(["success" => false, "reason" => "Not a post data"]));


        $file = $request->data;

// getimagesize is used to get the file extension
// Only png / jpg mime types are allowed
        $size = getimagesize($file);
        $ext = $size['mime'];
        if ($ext == 'image/jpeg')
            $ext = '.jpg';
        elseif ($ext == 'image/png')
            $ext = '.png';
        else
            exit(json_encode(['success' => false, 'reason' => 'only png and jpg mime types are allowed']));

// Prevent the upload of large files
        if (strlen(base64_decode($file)) > $maxFileSize)
            exit(json_encode(['success' => false, 'reason' => "file size exceeds {$maxFileSize} Mb"]));

// Remove inline tags and spaces
        $img = str_replace('data:image/png;base64,', '', $file);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

// Read base64 encoded string as an image
        $img = base64_decode($img);

// Give the image a unique name. Don't forget the extension
        $filename = date("d_m_Y_H_i_s") . "-" . time() . $ext;

// The path to the newly created file inside the upload folder
        $destinationPath = "$destinationFolder$filename";

// Create the file or return false
        $success = file_put_contents($destinationPath, $img);

        if (!$success)
            exit(json_encode(['success' => false, 'reason' => 'the server failed in creating the image']));

// Inform the browser about the path to the newly created image
        exit(json_encode(['success' => true, 'path' => "$folder$filename"]));
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
//            var_dump($dec_img);
//            $picture = imagecreatefromstring($dec_img);
//            var_dump($picture);
//            move_uploaded_file($img, $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . 'jdjfk');
            $this->model->addPost($name, $_SESSION['user_id'], $_POST['title']);
        }

    }
}