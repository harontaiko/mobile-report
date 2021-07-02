<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="home __home">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <div id="rightWrapper" class="full-page">
        <div id="header" class="full-page"><a id="fullPage" href="#">|||</a></div>
        <h2 class="top-logo">Daily Report</h2>
        <div id="contentWrapper">
            <article id="showCase">
                <div class="article-header">Pipeline - <?php echo date('F jS Y', strtotime($data['date'])); ?></div>
                <div class="resrow">
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Total Sales</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/sales"><?php echo number_format($data['totalsales']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Sales Profit</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/sales"><?php echo number_format($data['totalprofit']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Movie Shop</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/movieshop"><?php echo number_format($data['movietotal']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Cyber</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/cyber"><?php echo number_format($data['cybertotal']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Ps</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/ps"><?php echo number_format($data['pstotal']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Till Income</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/net"><?php echo number_format($data['totaltill']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Cash Income</h2>
                            <br>
                            <a class="bluebutt"
                                href="<?php echo URLROOT; ?>/pages/net"><?php echo number_format($data['totalcash']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Average Daily Cash Income</h2>
                            <br>
                            <a class="bluebutt"
                                href="#!"><?php echo number_format($data['avgcashincome']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Average Daily Till Income</h2>
                            <br>
                            <a class="bluebutt"
                                href="#!"><?php echo number_format($data['avgtillincome']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Average Sales Income</h2>
                            <br>
                            <a class="bluebutt"
                                href="#!"><?php echo number_format($data['avgsalesincome']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                    <div class="rescol">
                        <div class="pinkbox">
                            <br>
                            <h2>Average Daily Gross Income</h2>
                            <br>
                            <a class="bluebutt"
                                href="#!"><?php echo number_format($data['avggrossincome']).' ksh'; ?></a>
                            <div class="bottri"></div>
                        </div>
                    </div>
                </div>
            </article>

            <article id="social">
                <section>
                    <a href=""><img class="graphs" loading="lazy"
                            src="https://cdn.pixabay.com/photo/2013/07/18/10/59/pulse-trace-163708_960_720.jpg" /></a>

                    <a href=""><img class="graphs" loading="lazy"
                            src="https://cdn.pixabay.com/photo/2013/07/18/10/59/pulse-trace-163708_960_720.jpg" /></a>

                    <a href=""><img class="graphs" loading="lazy"
                            src="https://cdn.pixabay.com/photo/2013/06/24/09/17/abstract-140898_960_720.jpg" /></a>

                    <a href=""><img class="graphs"
                            src="https://cdn.pixabay.com/photo/2017/12/24/14/27/geometric-3037028_960_720.png" /></a>
                </section>
            </article>

            <article>
                <div class="article-header">Gross Income Today</div>
                <section>
                    <h2><strong><?php echo number_format($data['totalincometoday']) . ' ksh'; ?></strong></h2>
                </section>
            </article>
        </div>
    </div>
    </div>
    <?php require(APPROOT . '/views/inc/footer.php'); ?>
</body>

</html>