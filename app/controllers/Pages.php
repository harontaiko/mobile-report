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

      $date = date('Y-m-d', time());

      $db = $this->pageModel->getDatabaseConnection();

      $totalsales = $this->pageModel->totalSales($date);
      $pstotal = $this->pageModel->psTotal($date);
      $movietotal = $this->pageModel->movieTotal($date);
      $cybertotal = $this->pageModel->cyberTotal($date);
      $totaltill = $this->pageModel->totalTill($date);
      $totalcash = $this->pageModel->totalCash($date);
      $totalincometoday = $this->pageModel->grossincome($date);
      $averagedailycashincome = $this->pageModel->averageCashDailyIncome();
      $averagedailytillincome = $this->pageModel->averageTillDailyIncome();
      $averagedailysalesincome = $this->pageModel->averageSalesDailyIncome();
      $averagedailygrossincome = $this->pageModel->averageGrossDailyIncome();
      $averagedailyincome = $this->pageModel->averageDailyIncome();
      $data = 
      ['title'=>'Daily Report', 
      'db'=>$db, 
      'date'=>$date, 
      'totalsales'=>$totalsales, 
      'movietotal'=>$movietotal, 
      'pstotal'=>$pstotal, 
      'cybertotal'=>$cybertotal, 
      'totaltill'=>$totaltill,
      'totalcash'=>$totalcash,
      'totalincometoday'=>$totalincometoday,
      'avgdailyincome' => $averagedailyincome,
      'avgsalesincome' => $averagedailysalesincome,
      'avgcashincome' => $averagedailycashincome,
      'avgtillincome' => $averagedailytillincome,
      'avggrossincome' => $averagedailygrossincome,
    ];

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