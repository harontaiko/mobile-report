<div id="rightWrapper" class="full-page">
    <input type="hidden" id="last-page" value="<?php echo $data['title'] ?>">
    <div id="header" class="full-page"><a id="fullPage" href="#">|||</a></div>
    <h2 class="top-logo show">Gross Income</h2>
    <h3 class="logout-top"><a href="<?php echo URLROOT; ?>/users/logout">logout</a></h3>
    <div id="contentWrapper">
        <article id="showCase">
            <div class="article-header">Gross Income - <?php echo date('F jS Y', strtotime($data['date']));?></div>
            <div class="input-wrapper">
                <label for="from"><strong>Run</strong></label>
                <select name="run" id="run">
                    <option value="run">select</option>
                    <option value="today">today</option>
                </select>
            </div>
            <div class="resrow">
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Items Sold</h2>
                        <br>
                        <a class="bluebutt"
                            href="#!"><?php echo number_format($data['salesn']['0']['itemssold']) . ' items'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Sales Income</h2>
                        <br>
                        <a class="bluebutt"
                            href="#!"><?php echo number_format($data['salesn']['0']['salesincome']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Sales Profit</h2>
                        <br>
                        <a class="bluebutt"
                            href="#!"><?php echo number_format($data['salesn']['0']['salesprofit']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Sales Current Gross</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['salesgrossn']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Cyber Net Income</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['cybern']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Ps Net Income</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['psn']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Movie Net Income</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['movien']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Total Expenses</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['expensesn']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Out Of Stock</h2>
                        <br>
                        <a class="bluebutt" href="#!">N/A</a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Net Total</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['netn']) . ' ksh'; ?><img
                                class="icon-img" loading="lazy"
                                src="<?php echo URLROOT; ?>/public/images/images/check.png" alt="check"></a>
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