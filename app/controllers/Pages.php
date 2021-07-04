<?php

class Pages extends Controller
{

    public function __construct()
    {
      $this->pageModel = $this->model('Page'); 
      $this->date = date('Y-m-d', time());
    }

    public function daysrepo($hostpage, $day)
    {
      $this->checkLoginState();
      if(isset($hostpage) && isset($day))
      {
        $validpages = ['home', 'ps', 'cyber', 'net', 'expense', 'sales', 'movie'];
        $validdays = ['yesterday'];
        if(in_array($hostpage, $validpages) && in_array($day, $validdays))
        {
          $db = $this->pageModel->getDatabaseConnection();
          $yesterday = date("F j, Y", time() - 60 * 60 * 24);
          $date_db = date("Y-m-d", time() - 60 * 60 * 24);

            $totalsales = $this->pageModel->totalSales($date_db);
            $totalprofit = $this->pageModel->profitSales($date_db);
            $pstotal = $this->pageModel->psTotal($date_db);
            $movietotal = $this->pageModel->movieTotal($date_db);
            $cybertotal = $this->pageModel->cyberTotal($date_db);
            $totaltill = $this->pageModel->totalTill($date_db);
            $totalcash = $this->pageModel->totalCash($date_db);
            $totalincometoday = $this->pageModel->grossincome($date_db);
            $averagedailycashincome = $this->pageModel->averageCashDailyIncome();
            $averagedailytillincome = $this->pageModel->averageTillDailyIncome();
            $averagedailysalesincome = $this->pageModel->averageSalesDailyIncome();
            $averagedailygrossincome = $this->pageModel->averageGrossDailyIncome();
            $averagedailyincome = $this->pageModel->averageDailyIncome();

            //movieshop
            $cashIncome = $this->pageModel->cashIncomeStation('movie', $date_db);
            $tillIncome = $this->pageModel->tillIncomeStation('movie', $date_db);
            $totalIncome = $this->pageModel->totalIncomeStation('movie', $date_db);
            $avgtotalIncome = $this->pageModel->avgtotalIncomeStation('movie');
            $expected = $totalIncome - $avgtotalIncome;

            //ps
            $cashIncomeps = $this->pageModel->cashIncomeStation('ps', $date_db);
            $tillIncomeps = $this->pageModel->tillIncomeStation('ps', $date_db);
            $totalIncomeps = $this->pageModel->totalIncomeStation('ps', $date_db);
            $avgtotalIncomeps = $this->pageModel->avgtotalIncomeStation('ps');
            $expectedps = $totalIncomeps - $avgtotalIncomeps;

            //cyber
            $cashIncomec = $this->pageModel->cashIncomeStation('cyber', $date_db);
            $tillIncomec = $this->pageModel->tillIncomeStation('cyber', $date_db);
            $totalIncomec = $this->pageModel->totalIncomeStation('cyber', $date_db);
            $avgtotalIncomec = $this->pageModel->avgtotalIncomeStation('cyber');
            $expectedc = $totalIncomec - $avgtotalIncomec;

            //sales
            $sales = $this->pageModel->getSalesDetails($date_db);
            $currentnet = $this->pageModel->GrossIncomeStation('sales');
            $instock = $this->pageModel->stockCount();
            $outstock = $this->pageModel->outStock();
            $created = $this->pageModel->getItemsCreated($date_db);
            $highestSale = $this->pageModel->getItemsHighestSale($date_db);
      
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

            //expense
            $expensecount = $this->pageModel->getexpenseCount($date_db);
            $expense = $this->pageModel->totalIncomeStation('expenses', $date_db);
            $losses = $this->pageModel->getexpenseLosses();
            $avgincome = $this->pageModel->avgtotalIncomeStation('expenses');

            //net
            $itemsoldn = $this->pageModel->getSalesDetails($date_db);
            $grosssalesn = $this->pageModel->GrossIncomeStation('sales');
            $movien = $this->pageModel->totalIncomeStation('movie', $date_db);
            $psn = $this->pageModel->totalIncomeStation('ps', $date_db);
            $cybern = $this->pageModel->totalIncomeStation('cyber', $date_db);
            $expensen = $this->pageModel->totalIncomeStation('expenses', $date_db);
            $netn = $this->pageModel->getNetTotal($date_db);
            $arrn = array();
      
            while($xn =$itemsoldn->fetch_assoc())
            {
              array_push($arrn,$xn);
            }

            $data = 
            ['title'=>$hostpage, 
            'db'=>$db, 
            'day'=>$day,
            'date'=>$yesterday, 
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
            
            'cash'=>$cashIncome,
            'till'=>$tillIncome,
            'total'=>$totalIncome,
            'avg'=>$avgtotalIncome,
            'expected'=>$expected,

            'cashps'=>$cashIncomeps,
            'tillps'=>$tillIncomeps,
            'totalps'=>$totalIncomeps,
            'avgps'=>$avgtotalIncomeps,
            'expectedps'=>$expectedps,

            'cashc'=>$cashIncomec,
            'tillc'=>$tillIncomec,
            'totalc'=>$totalIncomec,
            'avgc'=>$avgtotalIncomec,
            'expectedc'=>$expectedc,

            'sales'=>$arr,
            'currentnet'=>$currentnet,
            'instock'=>$instock,
            'outstock'=>$outstock,
            'created'=>$created,
            'high'=>$arr2,

            'count'=>$expensecount,
            'amount'=>$expense,
            'losses'=>$losses,
            'avgexp'=>$avgincome,

            'salesn'=>$arrn,
            'salesgrossn'=>$grosssalesn,
            'movien'=>$movien,
            'psn'=>$psn,
            'cybern'=>$cybern,
            'expensesn'=>$expensen,
            'netn'=>$netn,
          ];

        $this->view('pages/daysrepo', $data);
        }
        else{
          $this->error404();
        }

      }else{
       $this->error404();
      }
    }

    public function index()
    {
      $this->checkLoginState();
      


      $db = $this->pageModel->getDatabaseConnection();

      //home
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
      $this->checkLoginState();
      
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
      $this->checkLoginState();
      
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
      $this->checkLoginState();
      
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
      $this->checkLoginState();
      
      $db = $this->pageModel->getDatabaseConnection();

      $sales = $this->pageModel->getSalesDetails($this->date);
      $currentnet = $this->pageModel->GrossIncomeStation('sales');
      $instock = $this->pageModel->stockCount();
      $outstock = $this->pageModel->outStock();
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
      'outstock'=>$outstock,
      'created'=>$created,
      'high'=>$arr2
      ];

      $this->view('pages/sales', $data);
    }

    public function expenses()
    {
      $this->checkLoginState();
      
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
      $this->checkLoginState();
      
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

    public function error404()
    {
      http_response_code(404);
      include('../app/404.php');
      die();
    }

    public function checkLoginState()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
    }
}    