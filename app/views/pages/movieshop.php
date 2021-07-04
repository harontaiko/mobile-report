<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="movie __movie">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <div id="rightWrapper" class="full-page">
        <div id="header" class="full-page"><a id="fullPage" href="#">|||</a></div>
        <h2 class="top-logo show">Movie Shop</h2>
        <h3 class="logout-top"><a href="<?php echo URLROOT; ?>/users/logout">logout</a></h3>
        <div id="contentWrapper">
            <article id="showCase">
                <div class="article-header">Movie Shop - <?php echo date('F jS Y', strtotime($data['date']));?></div>
                <div class="input-wrapper">
                    <label for="from"><strong>Run</strong></label>
                    <select name="run" id="run">
                        <option value="run">select</option>
                        <option value="yesterday">yesterday</option>
                        <option value="today">today</option>
                    </select>
                </div>
                <div class="resrow">
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Cash Income</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['cash']) . ' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Till Income</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['till']) . ' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Total Income</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['total']) . ' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <!--expected = currenttotal - avgmovietotal if diff is >1 total met else ifis == 0, total met else not met-->
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Expected Total</h2>
                            <br>
                            <?php switch(true): case $data['expected'] >1:?>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['total']) . ' ksh'; ?><img
                                    class="icon-img" loading="lazy"
                                    src="<?php echo URLROOT; ?>/public/images/images/check.png" alt="check"></a>
                            <?php break; ?>
                            <?php case $data['expected']  == 0: ?>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['total']) . ' ksh'; ?><img
                                    class="icon-img" loading="lazy"
                                    src="<?php echo URLROOT; ?>/public/images/images/check.png" alt="check"></a>
                            <?php break; ?>
                            <?php case $data['expected']  < 0: ?>
                            <a class="bluebutt" href="#!">Total is below daily average<img class="icon-img"
                                    loading="lazy" src="<?php echo URLROOT; ?>/public/images/images/times.png"
                                    alt="check"></a>
                            <?php break;?>
                            <?php endswitch ?>
                            <div class="bottri"></div>
                        </div>
                    </div>

                </div>
            </article>
            <article>
                <div class="article-header">Filter</div>
                <div class="input-wrapper">
                    <label for="from"><strong>From</strong></label>
                    <input type="date" name="from" id="from">
                </div>
                <div class="input-wrapper">
                    <label for="to"><strong>To</strong></label>
                    <input type="date" name="from" id="from">
                </div>
                <div class="input-wrapper">
                    <button value="Get" id="filter-movie">filter report</button>
                </div>
            </article>
        </div>
    </div>
    </div>
    <?php require(APPROOT . '/views/inc/footer.php'); ?>
</body>

</html>