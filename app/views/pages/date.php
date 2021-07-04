<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="date __date">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <?php switch($data['title']): case 'movie':?>
    <?php include APPROOT .'/views/date/movieReport.php'; ?>
    <?php break;?>
    <?php case 'ps': ?>
    <?php include APPROOT .'/views/date/psReport.php'; ?>
    <?php break;?>
    <?php case 'cyber': ?>
    <?php include APPROOT .'/views/date/cyberReport.php'; ?>
    <?php break;?>
    <?php case 'sales': ?>
    <?php include APPROOT .'/views/date/salesReport.php'; ?>
    <?php break;?>
    <?php case 'expense': ?>
    <?php include APPROOT .'/views/date/expenseReport.php'; ?>
    <?php break;?>
    <?php case 'net': ?>
    <?php include APPROOT .'/views/date/netReport.php'; ?>
    <?php break;?>
    <?php endswitch; ?>
</body>

<?php require(APPROOT . '/views/inc/footer.php'); ?>

</html>