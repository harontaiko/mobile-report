#### **_dailyreport base for holics ENT_**

Inventory management and daily record keeping system, built on PHP OOP and Js, DB used, `SQL`

- cloudflare for DDOS

#### **_INSTALL_**

- Head to the config file and fil in the database params
- DB PARRAMS ARE; `DBNAME:dailyhac_dailyreport`, `DBUSER:dailyhac_report`, `@#holicsent`
- Change `URLROOT` to your default url
- Go to the public folder, and change the `htaccess` if its on an online server, change it to `/public` otherwise use `/rootfolder/public`, replace **root folder** with the name of ur folder
- Change `root url` in `main.js file`
- `uploads moved to app folder` to avoid errors

### To do

- change htps in all js

- change htacces in public, adjust timezone when day comes

- all static js fetched thru jsdeliver,

- Handle responsiveness later on

- edit root url in js so the only editable thing on production is htaccess and config

- update inventory in real time on edit success

- left on editing main record

- error items in stock

```
    <?php switch($data['title']): case 'movie':?>
    <?php include APPROOT .'/views/datesfilter/movieReport.php'; ?>
    <?php break;?>
    <?php case 'ps': ?>
    <?php include APPROOT .'/views/datesfilter/psReport.php'; ?>
    <?php break;?>
    <?php case 'cyber': ?>
    <?php include APPROOT .'/views/datesfilter/cyberReport.php'; ?>
    <?php break;?>
    <?php case 'sales': ?>
    <?php include APPROOT .'/views/datesfilter/salesReport.php'; ?>
    <?php break;?>
    <?php case 'expense': ?>
    <?php include APPROOT .'/views/datesfilter/expenseReport.php'; ?>
    <?php break;?>
    <?php case 'net': ?>
    <?php include APPROOT .'/views/datesfilter/netReport.php'; ?>
    <?php break;?>
    <?php endswitch; ?>
```
