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
}