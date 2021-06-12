<?php 

    namespace Source\App;

    class CadController{
        public function __construct()
        {
            
            !session_start() && session_start();

            $this->view = new \League\Plates\Engine(__DIR__ . "/../../views/");
        }

        public function index(){
            echo $this->view->render('register');
        }
    }