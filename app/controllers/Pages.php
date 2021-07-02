<?php

class Pages extends Controller
{

    public function __construct()
    {
      $this->pageModel = $this->model('Page'); 
      $this->date = date('Y-m-d', time());
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

      $totalsales = $this->pageModel->totalSales($this->date);
      $totalprofit = $this->pageModel->profitSales($this->date);
      $pstotal = $this->pageModel->psTotal($this->date);
      $movietotal = $this->pageModel->movieTotal($this->date);
      $cybertotal = $this->pageModel->cyberTotal($this->date);
      $totaltill = $this->pageModel->totalTill($this->date);
      $totalcash = $this->pageModel->totalCash($this->date);
      $totalincometoday = $this->pageModel->grossincome($this->date);
      $averagedailycashincome = $this->pageModel->averageCashDailyIncome();
      $averagedailytillincome = $this->pageModel->averageTillDailyIncome();
      $averagedailysalesincome = $this->pageModel->averageSalesDailyIncome();
      $averagedailygrossincome = $this->pageModel->averageGrossDailyIncome();
      $averagedailyincome = $this->pageModel->averageDailyIncome();
      $data = 
      ['title'=>'Daily Report', 
      'db'=>$db, 
      'date'=>$this->date, 
      'totalsales'=>$totalsales, 
      'totalprofit'=>$totalprofit, 
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

      $cashIncome = $this->pageModel->cashIncomeStation('movie', $this->date);
      $tillIncome = $this->pageModel->tillIncomeStation('movie', $this->date);
      $totalIncome = $this->pageModel->totalIncomeStation('movie', $this->date);
      $avgtotalIncome = $this->pageModel->avgtotalIncomeStation('movie');
      $expected = $totalIncome - $avgtotalIncome;

      $data = [
        'title'=>'Movie Shop', 
        'db'=>$db,
        'date'=>$this->date,
        'cash'=>$cashIncome,
        'till'=>$tillIncome,
        'total'=>$totalIncome,
        'avg'=>$avgtotalIncome,
        'expected'=>$expected
      ];

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

      $cashIncome = $this->pageModel->cashIncomeStation('ps', $this->date);
      $tillIncome = $this->pageModel->tillIncomeStation('ps', $this->date);
      $totalIncome = $this->pageModel->totalIncomeStation('ps', $this->date);
      $avgtotalIncome = $this->pageModel->avgtotalIncomeStation('ps');
      $expected = $totalIncome - $avgtotalIncome;

      $data = [
        'title'=>'Ps', 
        'date'=>$this->date,
        'db'=>$db,
        'cash'=>$cashIncome,
        'till'=>$tillIncome,
        'total'=>$totalIncome,
        'avg'=>$avgtotalIncome,
        'expected'=>$expected
      ];

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

      $cashIncome = $this->pageModel->cashIncomeStation('cyber', $this->date);
      $tillIncome = $this->pageModel->tillIncomeStation('cyber', $this->date);
      $totalIncome = $this->pageModel->totalIncomeStation('cyber', $this->date);
      $avgtotalIncome = $this->pageModel->avgtotalIncomeStation('cyber');
      $expected = $totalIncome - $avgtotalIncome;

      $data = [
        'title'=>'Cyber', 
        'date'=>$this->date,
        'db'=>$db,
        'cash'=>$cashIncome,
        'till'=>$tillIncome,
        'total'=>$totalIncome,
        'avg'=>$avgtotalIncome,
        'expected'=>$expected
      ];

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

      $sales = $this->pageModel->getSalesDetails($this->date);
      $currentnet = $this->pageModel->GrossIncomeStation('sales');
      $instock = $this->pageModel->stockCount();
      $created = $this->pageModel->getItemsCreated($this->date);
      $highestSale = $this->pageModel->getItemsHighestSale($this->date);

      $arr = array();
      $arr2 = array();

      while($x =$sales->fetch_assoc())
      {
        array_push($arr,$x);
      }

      while($b = $highestSale->fetch_assoc())
      {
        array_push($arr2, $b);
      }

      $data = 
      ['title'=>'Sales', 
      'db'=>$db,
      'date'=>$this->date,
      'sales'=>$arr,
      'currentnet'=>$currentnet,
      'instock'=>$instock,
      'created'=>$created,
      'high'=>$arr2
      ];

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

      $expensecount = $this->pageModel->getexpenseCount($this->date);
      $expense = $this->pageModel->totalIncomeStation('expenses', $this->date);
      $losses = $this->pageModel->getexpenseLosses();
      $avgincome = $this->pageModel->avgtotalIncomeStation('expenses');

      $data = [
        'title'=>'Expenses',
         'db'=>$db,
         'date'=>$this->date,
         'count'=>$expensecount,
         'amount'=>$expense,
         'losses'=>$losses,
         'avg'=>$avgincome
      ];

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

      $itemsold = $this->pageModel->getSalesDetails($this->date);
      $grosssales = $this->pageModel->GrossIncomeStation('sales');
      $movie = $this->pageModel->totalIncomeStation('movie', $this->date);
      $ps = $this->pageModel->totalIncomeStation('ps', $this->date);
      $cyber = $this->pageModel->totalIncomeStation('cyber', $this->date);
      $expense = $this->pageModel->totalIncomeStation('expenses', $this->date);
      $net = $this->pageModel->getNetTotal($this->date);
      $arr = array();

      while($x =$itemsold->fetch_assoc())
      {
        array_push($arr,$x);
      }

      $data = [
        'title'=>'Net',
         'db'=>$db,
         'date'=>$this->date,
         'sales'=>$arr,
         'salesgross'=>$grosssales,
         'movie'=>$movie,
         'ps'=>$ps,
         'cyber'=>$cyber,
         'expenses'=>$expense,
         'net'=>$net,
      ];

      $this->view('pages/net', $data);
    }
}    