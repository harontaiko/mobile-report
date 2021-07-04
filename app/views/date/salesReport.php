<div id="rightWrapper" class="full-page">
    <input type="hidden" id="cr-page" value="<?php echo $data['title']; ?>">
    <div id="header" class="full-page"><a id="fullPage" href="#">|||</a></div>
    <h2 class="top-logo show">Report</h2>
    <h3 class="logout-top"><a href="<?php echo URLROOT; ?>/users/logout">logout</a></h3>
    <div id="contentWrapper">
        <div class="article-header"><a id="back-link" href=""><img class="back-png"
                    src="<?php echo URLROOT; ?>/public/images/images/back.png" alt="back"></a> From
            <?php echo $data['date'];?> to <?php echo $data['date2']; ?></div>
        <table role="table">
            <thead role="rowgroup">
                <tr role="row">
                    <th role="columnheader">Date</th>
                    <th role="columnheader">Item(name)</th>
                    <th role="columnheader">Bought(ksh)</th>
                    <th role="columnheader">Sold(ksh)</th>
                    <th role="columnheader">Net Profit(ksh)</th>
                    <th role="columnheader">Sale By</th>
                    <th role="columnheader">Invoice</th>
                </tr>
            </thead>
            <tbody role="rowgroup">
                <tr role="row">
                    <td class="sl" role="cell">june 21st 2020</td>
                    <td class="sl" role="cell">item</td>
                    <td class="sl" role="cell">950</td>
                    <td class="sl" role="cell">1,950</td>
                    <td class="sl" role="cell">1,000</td>
                    <td class="sl" role="cell">jay</td>
                    <td class="sl" role="cell">invoice</td>.
                </tr>
                <tr role="row">
                    <td class="sl" role="cell">june 21st 2020</td>
                    <td class="sl" role="cell">item</td>
                    <td class="sl" role="cell">950</td>
                    <td class="sl" role="cell">1,950</td>
                    <td class="sl" role="cell">1,000</td>
                    <td class="sl" role="cell">jay</td>
                    <td class="sl" role="cell">invoice</td>.
                </tr>
                <tr role="row">
                    <td class="sl" role="cell">june 21st 2020</td>
                    <td class="sl" role="cell">item</td>
                    <td class="sl" role="cell">950</td>
                    <td class="sl" role="cell">1,950</td>
                    <td class="sl" role="cell">1,000</td>
                    <td class="sl" role="cell">jay</td>
                    <td class="sl" role="cell">invoice</td>.
                </tr>
                <tr>
                    <td role="cell"></td>
                    <td><strong>1,0000/=</strong></td>
                    <td><strong>9500/=</strong></td>
                    <td><strong>11,950/=</strong></td>
                    <td role="cell"></td>
                    <td role="cell"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>