<div id="wrapper">
    <div id="leftWrapper">
        <div id="listView" class="list">
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/index") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/movieshop") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>/pages/movieshop">movieShop</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/ps") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>/pages/ps">Ps</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/cyber") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>/pages/cyber">Cyber</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/sales") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>/pages/sales">Sales</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/expenses") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>/pages/expenses">Expenses</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "pages/net") !== false) :  ?>class="list-item-active"
                <?php endif ?>><a href="<?php echo URLROOT; ?>/pages/net">Net</a></li>
            <li><a href="<?php echo URLROOT; ?>/users/logout"><img
                        src="<?php echo URLROOT; ?>/public/images/images/logout.png" class="logout-img"
                        alt="logout"></a></li>
        </div>
    </div>