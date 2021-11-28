<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new Engine(ROOTDIR . 'views');
    }

    public function sendPage($page, array $data = []) {
        echo $this->view->render($page, $data);
    }
    //luu gia tri form vua nhap vao session
    protected function saveFormValues(array $data, array $except = [])
    {
      //luu gia tri cua form ngoai tru mat khau cho truong hop
      //dang nhap khong thang cong
        $form = [];
        foreach($data as $key => $value) {
            if (! in_array($key, $except, true)) {
                $form[$key] = $value;
            }
        }
        $_SESSION['form'] = $form;
    }
    //lay va unset gia tri cua form trong session
    protected function getSavedFormValues() {
      return session_get_once('form', []);
    }
    public function showNotFound(){
      $this->sendPage("error");
    }

    }

    ?>
