<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="daysrepo __daysrepo">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <?php switch($data['title']): case 'home':?>
    <?php include APPROOT .'/views/repo/homerepo.php'; ?>
    <?php break;?>
    <?php case 'movie': ?>
    <?php include APPROOT .'/views/repo/movierepo.php'; ?>
    <?php break;?>
    <?php case 'ps': ?>
    <?php include APPROOT .'/views/repo/psrepo.php'; ?>
    <?php break;?>
    <?php case 'cyber': ?>
    <?php include APPROOT .'/views/repo/cyberrepo.php'; ?>
    <?php break;?>
    <?php case 'sales': ?>
    <?php include APPROOT .'/views/repo/salesrepo.php'; ?>
    <?php break;?>
    <?php case 'expense': ?>
    <?php include APPROOT .'/views/repo/expenserepo.php'; ?>
    <?php break;?>
    <?php case 'net': ?>
    <?php include APPROOT .'/views/repo/netrepo.php'; ?>
    <?php break;?>
    <?php endswitch; ?>
</body>

<?php require(APPROOT . '/views/inc/footer.php'); ?>

</html>