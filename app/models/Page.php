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