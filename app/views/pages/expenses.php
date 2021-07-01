<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="movie __movie">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <div id="rightWrapper">
        <div id="header"><a id="fullPage" href="#">|||</a></div>
        <h2 class="top-logo">Expenses</h2>
        <div id="contentWrapper">
            <article id="showCase">
                <div class="article-header">Expenses - 1st July 2020</div>
                <div class="resrow">
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Expenses #</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">5</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Total Amount</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">1,690/=</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Losses From Expenses</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">1,690/=</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Average Daily Expenses</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">1,690/=</a>
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