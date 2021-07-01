<?php
session_start();

//db params
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'dailyreport');
DEFINE('DB_PASS', 'Gazaslim5');
DEFINE('DB_NAME', 'daily_report');

//mail params
define("MAIL_HOST", "mail.dailyhackstore.co.ke");
define("MAIL_USERNAME", "info@dailyhackstore.co.ke");
define("MAIL_PASS", "Gazaslim5?");
define("MAIL_SMTP", "ssl");
define("MAIL_PORT", "465");

//app route
define('APPROOT', dirname(dirname(__FILE__)));

define('URLROOT', 'http://localhost/dailyreport-mobile');
//site name
define('SITENAME', 'Daily Report');

define('SITE_DESCRIPTION', 'daily report holics');

define('DEFAULT_TITLE', 'Daily Report');

define('OG_URL', 'http://localhost/dailyreport-mobile');

define('SITE_AUTHOR', 'holics');

define('SITE_TYPE', 'website');

define('THEME_COLOR', '#047aed');

define('PRINCIPAL_MAIL', '');

define('ABOUT_US', '');


        