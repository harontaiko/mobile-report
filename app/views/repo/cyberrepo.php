<div id="rightWrapper" class="full-page">
    <input type="hidden" id="last-page" value="<?php echo $data['title'] ?>">
    <div id="header" class="full-page"><a id="fullPage" href="#">|||</a></div>
    <h2 class="top-logo show">Cyber</h2>
    <h3 class="logout-top"><a href="<?php echo URLROOT; ?>/users/logout">logout</a></h3>
    <div id="contentWrapper">
        <article id="showCase">
            <div class="article-header">Cyber - <?php echo date('F jS Y', strtotime($data['date']));?></div>
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
                        <h2>Cash Income</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['cashc']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Till Income</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['tillc']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Total Income</h2>
                        <br>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['totalc']) . ' ksh'; ?></a>
                        <div class="bottri"></div>
                    </div>
                </div>
                <div class="rescol">
                    <div class="pinkbox">
                        <br>
                        <h2>Expected Total</h2>
                        <br>
                        <?php switch(true): case $data['expectedc'] >1:?>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['totalc']) . ' ksh'; ?><img
                                class="icon-img" loading="lazy"
                                src="<?php echo URLROOT; ?>/public/images/images/check.png" alt="check"></a>
                        <?php break; ?>
                        <?php case $data['expectedc']  == 0: ?>
                        <a class="bluebutt" href="#!"><?php echo number_format($data['totalc']) . ' ksh'; ?><img
                                class="icon-img" loading="lazy"
                                src="<?php echo URLROOT; ?>/public/images/images/check.png" alt="check"></a>
                        <?php break; ?>
                        <?php case $data['expectedc']  < 0: ?>
                        <a class="bluebutt" href="#!">Total is below daily average<img class="icon-img" loading="lazy"
                                src="<?php echo URLROOT; ?>/public/images/images/times.png" alt="check"></a>
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
                <button value="Get" id="filter-cyber">filter report</button>
            </div>
        </article>
    </div>
</div>
</div>