<?php

function getReportDate($from, $to, $station, $db)
{
    $station == "movie";
    switch($station){
        case 'movie':
        $query = 'SELECT cash, till, created_by, creator_ip, date_created FROM dr_movieshop WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        case 'ps':
        $query = 'SELECT cash, till, created_by, creator_ip, date_created FROM dr_playstation WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        case 'cyber':
        $query = 'SELECT cash, till, created_by, creator_ip, date_created FROM dr_cybershop WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        case 'sales':
        $query = 'SELECT sales_id, sales_item, buying_price, selling_price, cash, till, profit, date_created, time_created, created_by, creator_ip FROM dr_sales WHERE date_created BETWEEN ? AND ? ORDER BY date_created DESC';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        }
        break;
        case 'net':
        $query = 'SELECT sales_id, total_sales, totalprofit, totalincome, totalexpense, cash_sales, till_sales, date_created, time_created, created_by, creator_ip FROM dr_nettotal WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        case 'expense':
        $query = 'SELECT expense_id, expense_item, expense_cost, date_created, time_created, created_by, creator_ip FROM dr_expenses WHERE date_created BETWEEN ? AND ? ORDER BY date_created DESC';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        }
        break;
        default:
        
    }
}

function getFileteredReportTotal($from, $to, $station, $db)
{
    $station == "movie";
    switch($station){
        case 'movie':
        $query = 'SELECT SUM(cash+till) AS total, SUM(till) AS till, SUM(cash) AS cash FROM dr_movieshop WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        case 'ps':
        $query = 'SELECT SUM(cash+till) AS total, SUM(till) AS till, SUM(cash) AS cash FROM dr_playstation WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        }
        break;
        case 'cyber':
        $query = 'SELECT SUM(cash+till) AS total, SUM(till) AS till, SUM(cash) AS cash FROM dr_cybershop WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        case 'sales':
        $query = 'SELECT SUM(selling_price) AS selling, SUM(profit) AS pr FROM dr_sales WHERE date_created BETWEEN ? AND ? ORDER BY date_created DESC';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();

    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        }
        break;
        case 'expense':
        $query = 'SELECT SUM(expense_cost) AS exp_total FROM dr_expenses WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();

        $total = isset($rowItem['exp_total']) ? $rowItem['exp_total'] : 'N/A';
    
        try {
            return $total;
        } catch (Error $e) {
            return false;
        }
        break;
        case 'net':
        $query = 'SELECT SUM(cash_sales) AS totalcash, SUM(till_sales) AS totaltill, SUM(totalexpense) AS expensetotal, SUM(total_sales) AS totalsales, SUM(totalincome) AS incometotal FROM dr_nettotal WHERE date_created BETWEEN ? AND ?';

        $binders ="ss";

        $params = array($from, $to);

        $result = SelectCond($query, $binders, $params, $db);
    
        $row = $result->get_result();
    
        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
        break;
        default;
    }   
}