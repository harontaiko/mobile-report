<?php

class Pages extends Controller
{

    public function __construct()
    {
      $this->pageModel = $this->model('Page'); 
    }

    public function index()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'db'=>$db];

      $this->view('pages/index', $data);
    }

    public function movieshop()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Movie Shop', 'db'=>$db];

      $this->view('pages/movieshop', $data);
    }

    public function ps()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Ps', 'db'=>$db];

      $this->view('pages/ps', $data);
    }

    public function cyber()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Cyber', 'db'=>$db];

      $this->view('pages/cyber', $data);
    }

    public function sales()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Sales', 'db'=>$db];

      $this->view('pages/sales', $data);
    }

    public function expenses()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Expenses', 'db'=>$db];

      $this->view('pages/expenses', $data);
    }

    public function net()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Net', 'db'=>$db];

      $this->view('pages/net', $data);
    }
}    