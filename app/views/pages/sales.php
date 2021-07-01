<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="movie __movie">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <div id="rightWrapper">
        <div id="header"><a id="fullPage" href="#">|||</a></div>
        <h2 class="top-logo">Sales</h2>
        <div id="contentWrapper">
            <article id="showCase">
                <div class="article-header">Sales - 1st July 2020</div>
                <div class="resrow">
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Items Sold</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">10</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Sales Income</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">1,690/=</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Sales Profit</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">1,690/=</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Sales Current Gross</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">1,690/=</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Items In Stock</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">19</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Items Created Today</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">0</a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Item with highest sale</h2>
                            <br>
                            <a class="bluebutt" href="#!" target="_blank">earphones @250 each<img class="icon-img"
                                    loading="lazy" src="<?php echo URLROOT; ?>/public/images/images/check.png"
                                    alt="check"></a>
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
                    <button value="Get" id="filter-sales">filter report</button>
                </div>
            </article>
        </div>
    </div>
    </div>
    <?php require(APPROOT . '/views/inc/footer.php'); ?>
</body>

</html>