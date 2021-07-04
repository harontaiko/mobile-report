<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="expense __expense">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <div id="rightWrapper" class="full-page">
        <div id="header" class="full-page"><a id="fullPage" href="#">|||</a></div>
        <h2 class="top-logo show">Expenses</h2>
        <h3 class="logout-top"><a href="<?php echo URLROOT; ?>/users/logout">logout</a></h3>
        <div id="contentWrapper">
            <article id="showCase">
                <div class="article-header">Expenses - <?php echo date('F jS Y', strtotime($data['date']));?></div>
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
                            <h2>Expenses #</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['count']) . ' expenses'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Total Amount</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['amount']) . ' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Total Losses From Expenses</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['losses']) . ' ksh'; ?> <p
                                    id="inline-sm">*excluding salary</p></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Average Daily Expenses</h2>
                            <br>
                            <a class="bluebutt" href="#!"><?php echo number_format($data['avg']) . ' ksh'; ?> </a>
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
                    <button value="Get" id="filter-expenses">filter report</button>
                </div>
            </article>
        </div>
    </div>
    </div>
    <?php require(APPROOT . '/views/inc/footer.php'); ?>
</body>

</html>