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
                    <th role="columnheader">Cash income(ksh)</th>
                    <th role="columnheader">Till income(ksh)</th>
                    <th role="columnheader">Net Total</th>
                    <th role="columnheader">Created By</th>
                    <th role="columnheader">Host Address</th>
                </tr>
            </thead>
            <tbody role="rowgroup">
                <tr role="row">
                    <td class="mv" role="cell">june 21st 2020</td>
                    <td class="mv" role="cell">1,000</td>
                    <td class="mv" role="cell">950</td>
                    <td class="mv" role="cell">1,950</td>
                    <td class="mv" role="cell">Trek</td>
                    <td class="mv" role="cell">192.168.0.1</td>
                </tr>
                <tr role="row">
                    <td class="mv" role="cell">june 21st 2020</td>
                    <td class="mv" role="cell">1,000</td>
                    <td class="mv" role="cell">950</td>
                    <td class="mv" role="cell">1,950</td>
                    <td class="mv" role="cell">Trek</td>
                    <td class="mv" role="cell">192.168.0.1</td>
                </tr>
                <tr role="row">
                    <td class="mv" role="cell">june 21st 2020</td>
                    <td class="mv" role="cell">1,000</td>
                    <td class="mv" role="cell">950</td>
                    <td class="mv" role="cell">1,950</td>
                    <td class="mv" role="cell">Trek</td>
                    <td class="mv" role="cell">192.168.0.1</td>
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