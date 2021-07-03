<?php

class Page
{
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    public function getDatabaseConnection()
    {
      return $this->db;
    }

    public function getNetTotal($date)
    {
        $query2 = 'SELECT SUM(total_sales + totalincome - totalexpense) AS `count` FROM dr_nettotal WHERE date_created=?';

        $binders = "s";

        $param = array($date);

        $result2 = SelectCond($query2, $binders, $param, $this->db);
  
        $row2 = $result2->get_result();
  
        $rowItem2 = $row2->fetch_assoc();
  
        $itemcount = isset($rowItem2['count']) ? $rowItem2['count'] : '0';

        try {
            return $itemcount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function getexpenseLosses()
    {
        $query2 = 'SELECT SUM(expense_cost) AS `count` FROM dr_expenses WHERE expense_item!=?';

        $binders = "s";

        $param = array('salary');

        $result2 = SelectCond($query2, $binders, $param, $this->db);
  
        $row2 = $result2->get_result();
  
        $rowItem2 = $row2->fetch_assoc();
  
        $itemcount = isset($rowItem2['count']) ? $rowItem2['count'] : '0';

        try {
            return $itemcount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function getexpenseCount($date)
    {
        $query2 = 'SELECT COUNT(expense_id) AS `count` FROM dr_expenses WHERE date_created=?';

        $binders = "s";

        $param = array($date);

        $result2 = SelectCond($query2, $binders, $param, $this->db);
  
        $row2 = $result2->get_result();
  
        $rowItem2 = $row2->fetch_assoc();
  
        $itemcount = isset($rowItem2['count']) ? $rowItem2['count'] : '0';

        try {
            return $itemcount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function getItemsHighestSale($date)
    {
        $query2 = 'SELECT MAX(selling_price) AS `count`, sales_item FROM dr_sales WHERE date_created=?';

        $binders = "s";

        $param = array($date);

        $result2 = SelectCond($query2, $binders, $param, $this->db);
  
        $row2 = $result2->get_result();

        try {
            return $row2;
        } catch (Error $e) {
            return false;
        } 
    }

    public function getItemsCreated($date)
    {
        $query2 = 'SELECT COUNT(item_id) AS `count` FROM dr_inventory WHERE date_created=?';

        $binders = "s";

        $param = array($date);

        $result2 = SelectCond($query2, $binders, $param, $this->db);
  
        $row2 = $result2->get_result();
  
        $rowItem2 = $row2->fetch_assoc();
  
        $itemcount = isset($rowItem2['count']) ? $rowItem2['count'] : '0';

        try {
            return $itemcount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function outStock()
    {
        $instock = $this->stockCount();

        $salecount = $this->saleCount();

        $query1 = 'SELECT COUNT(item_id) AS `out` FROM dr_inventory WHERE item_quantity = ?';

        $binders = "s";

        $param = array($salecount);

        $result1 = SelectCond($query1, $binders, $param, $this->db);
  
        $row1 = $result1->get_result();
  
        $rowItem1 = $row1->fetch_assoc();
  
        $salescount = isset($rowItem1['out']) ? $rowItem1['out'] : '0';
  
        try {
            return $salescount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function saleCount()
    {
        $query1 = 'SELECT COUNT(sales_id) AS salescount FROM dr_sales';

        $result1 = SelectCondFree($query1, 'dr_sales', $this->db);
  
        $row1 = $result1->get_result();
  
        $rowItem1 = $row1->fetch_assoc();
  
        $salescount = isset($rowItem1['salescount']) ? $rowItem1['salescount'] : '0';

        try {
            return $salescount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function stockCount()
    {
        $query1 = 'SELECT COUNT(sales_id) AS salescount FROM dr_sales';

        $result1 = SelectCondFree($query1, 'dr_sales', $this->db);
  
        $row1 = $result1->get_result();
  
        $rowItem1 = $row1->fetch_assoc();
  
        $salescount = isset($rowItem1['salescount']) ? $rowItem1['salescount'] : '0';
        
        $query2 = 'SELECT SUM(item_quantity) AS cnt FROM dr_inventory WHERE item_name !=?';

        $binders = "s";

        $param = array('NONE');

        $result2 = SelectCond($query2, $binders, $param, $this->db);
  
        $row2 = $result2->get_result();
  
        $rowItem2 = $row2->fetch_assoc();
  
        $itemcount = isset($rowItem2['cnt']) ? $rowItem2['cnt'] : '0';
  
        try {
            return $itemcount - $salescount;
        } catch (Error $e) {
            return false;
        } 
    }

    public function GrossIncomeStation($station)
    {
        $station == "movie";
        switch($station){
            case 'movie':
            $query = 'SELECT SUM(till+cash) AS total FROM dr_movieshop';
      
            $result = SelectCondFree($query, 'dr_movieshop', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'ps':
            $query = 'SELECT SUM(till+cash) AS total FROM dr_playstation';
      
            $result = SelectCondFree($query, 'dr_playstation', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'cyber':
            $query = 'SELECT SUM(till+cash) AS total FROM dr_cybershop';
      
            $result = SelectCondFree($query, 'dr_cybershop', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'sales':
            $query = 'SELECT SUM(selling_price) AS total FROM dr_sales';
      
            $result = SelectCondFree($query, 'dr_sales', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            default:
            return false;
        }
    }

    public function getSalesDetails($date)
    {
        $query = 'SELECT COUNT(sales_id) AS itemssold, SUM(selling_price) AS salesincome, SUM(profit) AS salesprofit FROM dr_sales WHERE date_created = ?';

        $binders = "s";

        $param = array($date);

        $result = SelectCond($query, $binders, $param, $this->db);
  
        $row = $result->get_result();

        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
    }


    public function avgtotalIncomeStation($station)
    {
        $station == "movie";
        switch($station){
            case 'movie':
            $query = 'SELECT AVG(till+cash) AS total FROM dr_movieshop GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';

            $result = SelectCondFree($query, 'dr_movieshop', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'ps':
            //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $query = 'SELECT AVG(till+cash) AS total FROM dr_playstation GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';
      
            $result = SelectCondFree($query, 'dr_playstation', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'cyber':
            $query = 'SELECT AVG(till+cash) AS total FROM dr_cybershop GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';
      
            $result = SelectCondFree($query, 'dr_cybershop', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'expenses':
            $query = 'SELECT AVG(expense_cost) AS total FROM dr_expenses GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';
      
            $result = SelectCondFree($query, 'dr_expenses', $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            default:
            return false;
        }
    }

    public function totalIncomeStation($station, $date)
    {
        $station == "movie";
        switch($station){
            case 'movie':
            $query = 'SELECT SUM(till+cash) AS total FROM dr_movieshop WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'ps':
            $query = 'SELECT SUM(till+cash) AS total FROM dr_playstation WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'cyber':
            $query = 'SELECT SUM(till+cash) AS total FROM dr_cybershop WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'expenses':
            $query = 'SELECT SUM(expense_cost) AS total FROM dr_expenses WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['total']) ? $rowItem['total'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            default:
            return false;
        }
    }


    public function tillIncomeStation($station, $date)
    {
        $station == "movie";
        switch($station){
            case 'movie':
            $query = 'SELECT till FROM dr_movieshop WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['till']) ? $rowItem['till'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'ps':
            $query = 'SELECT till FROM dr_playstation WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['till']) ? $rowItem['till'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'cyber':
            $query = 'SELECT till FROM dr_cybershop WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['till']) ? $rowItem['till'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            default:
            return false;
        }
    }

    public function cashIncomeStation($station, $date)
    {
        $station == "movie";
        switch($station){
            case 'movie':
            $query = 'SELECT cash FROM dr_movieshop WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['cash']) ? $rowItem['cash'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'ps':
            $query = 'SELECT cash FROM dr_playstation WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['cash']) ? $rowItem['cash'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            case 'cyber':
            $query = 'SELECT cash FROM dr_cybershop WHERE date_created=?';

            $binders= "s";
      
            $param = array($date);
      
            $result = SelectCond($query, $binders, $param, $this->db);
      
            $row = $result->get_result();
      
            $rowItem = $row->fetch_assoc();
      
            $totalsales = isset($rowItem['cash']) ? $rowItem['cash'] : '0';
      
            try {
                return $totalsales;
            } catch (Error $e) {
                return false;
            } 
            break;
            default:
            return false;
        }
    }

    public function grossincome($date)
    {
      $query = 'SELECT AVG(total_sales + totalincome - totalexpense) AS totalincome FROM dr_nettotal WHERE date_created=?';

      $binders = "s";

      $param = array($date);

      $result = SelectCond($query, $binders, $param, $this->db);

      $row = $result->get_result();

      $rowItem = $row->fetch_assoc();
      
      $avgsales = isset($rowItem['totalincome']) ? $rowItem['totalincome'] : '0';

      try {
          return $avgsales;
      } catch (Error $e) {
          return false;
      } 
    }

    public function profitSales($date)
    {
      $query = 'SELECT totalprofit FROM dr_nettotal WHERE date_created=?';

      $binders= "s";

      $param = array($date);

      $result = SelectCond($query, $binders, $param, $this->db);

      $row = $result->get_result();

      $rowItem = $row->fetch_assoc();

      $totalsales = isset($rowItem['totalprofit']) ? $rowItem['totalprofit'] : '0';

      try {
          return $totalsales;
      } catch (Error $e) {
          return false;
      } 
    }

    public function totalSales($date)
    {
      $query = 'SELECT total_sales FROM dr_nettotal WHERE date_created=?';

      $binders= "s";

      $param = array($date);

      $result = SelectCond($query, $binders, $param, $this->db);

      $row = $result->get_result();

      $rowItem = $row->fetch_assoc();

      $totalsales = isset($rowItem['total_sales']) ? $rowItem['total_sales'] : '0';

      try {
          return $totalsales;
      } catch (Error $e) {
          return false;
      } 
    }

    public function movieTotal($date)
    {
      $query = 'SELECT SUM(cash + till) AS total FROM dr_movieshop WHERE date_created=?';

      $binders= "s";

      $param = array($date);

      $result = SelectCond($query, $binders, $param, $this->db);

      $row = $result->get_result();

      $rowItem = $row->fetch_assoc();

      $total = isset($rowItem['total']) ? $rowItem['total'] : '0';

      try {
          return $total;
      } catch (Error $e) {
          return false;
      } 
    }

    public function cyberTotal($date)
    {
      $query = 'SELECT SUM(cash + till) AS total FROM dr_cybershop WHERE date_created=?';

      $binders= "s";

      $param = array($date);

      $result = SelectCond($query, $binders, $param, $this->db);

      $row = $result->get_result();

      $rowItem = $row->fetch_assoc();

      $total = isset($rowItem['total']) ? $rowItem['total'] : '0';

      try {
          return $total;
      } catch (Error $e) {
          return false;
      } 
    }

    public function psTotal($date)
    {
      $query = 'SELECT SUM(cash + till) AS total FROM dr_playstation WHERE date_created=?';

      $binders= "s";

      $param = array($date);

      $result = SelectCond($query, $binders, $param, $this->db);

      $row = $result->get_result();

      $rowItem = $row->fetch_assoc();

      $total = isset($rowItem['total']) ? $rowItem['total'] : '0';

      try {
          return $total;
      } catch (Error $e) {
          return false;
      } 
    }

    public function totalTill($date)
    {
      $qtill = 'SELECT SUM(tbl.till) AS total_till FROM(SELECT till FROM dr_cybershop WHERE date_created=? UNION ALL SELECT till FROM dr_movieshop WHERE date_created=? UNION ALL SELECT till FROM dr_playstation WHERE date_created=?) tbl';

      $binderstill = "sss";

      $parameterstill = array($date, $date, $date);

      $resulttill = SelectCond($qtill, $binderstill, $parameterstill, $this->db);

      $rowtill = $resulttill->get_result();

      $rowItemtill = $rowtill->fetch_assoc();
      
      $totalTill = isset($rowItemtill['total_till']) ? $rowItemtill['total_till'] : '0';

        try {
          return $totalTill;
      } catch (Error $e) {
          return false;
      } 
    }

    public function totalCash($date)
    {
      $qc = 'SELECT SUM(tbl.cash) AS total_cash FROM(SELECT cash FROM dr_cybershop WHERE date_created=? UNION ALL SELECT cash FROM dr_movieshop WHERE date_created=? UNION ALL SELECT cash FROM dr_playstation WHERE date_created=?) tbl';

      $bindersc = "sss";

      $parametersc = array($date, $date, $date);

      $resultc = SelectCond($qc, $bindersc, $parametersc, $this->db);

      $rowc = $resultc->get_result();

      $rowItemc = $rowc->fetch_assoc();
      
      $totalCash = isset($rowItemc['total_cash']) ? $rowItemc['total_cash'] : '0';

        try {
          return $totalCash;
      } catch (Error $e) {
          return false;
      } 
    }

    public function averageDailyIncome()
    {
        $query = 'SELECT AVG(totalincome) AS totalincome FROM dr_nettotal GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';

        $result = SelectCondFree($query, 'dr_nettotal', $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $avgsales = isset($rowItem['totalincome']) ? $rowItem['totalincome'] : '0';

        try {
            return $avgsales;
        } catch (Error $e) {
            return false;
        } 
    }

    public function averageCashDailyIncome()
    {
        $query = 'SELECT AVG(cash_sales) AS totalincome FROM dr_nettotal GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';

        $result = SelectCondFree($query, 'dr_nettotal', $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $avgsales = isset($rowItem['totalincome']) ? $rowItem['totalincome'] : '0';

        try {
            return $avgsales;
        } catch (Error $e) {
            return false;
        } 
    }

    public function averageTillDailyIncome()
    {
        $query = 'SELECT AVG(till_sales) AS totalincome FROM dr_nettotal GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';

        $result = SelectCondFree($query, 'dr_nettotal', $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $avgsales = isset($rowItem['totalincome']) ? $rowItem['totalincome'] : '0';

        try {
            return $avgsales;
        } catch (Error $e) {
            return false;
        } 
    }

    public function averageSalesDailyIncome()
    {
        $query = 'SELECT AVG(total_sales) AS totalincome FROM dr_nettotal GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';

        $result = SelectCondFree($query, 'dr_nettotal', $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $avgsales = isset($rowItem['totalincome']) ? $rowItem['totalincome'] : '0';

        try {
            return $avgsales;
        } catch (Error $e) {
            return false;
        } 
    }

    public function averageGrossDailyIncome()
    {
        $query = 'SELECT AVG(total_sales + totalincome - totalexpense) AS totalincome FROM dr_nettotal GROUP BY DATE_SUB(NOW(), INTERVAL 1 DAY)';

        $result = SelectCondFree($query, 'dr_nettotal', $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $avgsales = isset($rowItem['totalincome']) ? $rowItem['totalincome'] : '0';

        try {
            return $avgsales;
        } catch (Error $e) {
            return false;
        } 
    }
   
}