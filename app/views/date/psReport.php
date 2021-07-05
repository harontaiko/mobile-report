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
                    <?php
                $net = getFileteredReportTotal($data['date'], $data['date2'], 'ps', $data['db']);
                $arr = array();

                while($y = $net->fetch_assoc())
                {
                    array_push($arr,$y);
                }
                 $row = getReportDate($data['date'], $data['date2'], 'ps', $data['db']); 
                 while($x = $row->fetch_assoc()):
                 ?>
                    <tr role="row">
                        <td class="mv" role="cell"><?php echo date('F jS Y',strtotime($x['date_created'])); ?></td>
                        <td class="mv" role="cell">
                            <?php echo isset($x['cash']) ? number_format($x['cash']) .' ksh' : 'N/A'; ?></td>
                        <td class="mv" role="cell">
                            <?php echo isset($x['till']) ? number_format($x['till']) .' ksh' : 'N/A'; ?></td>
                        <td class="mv" role="cell">
                            <?php $total = $x['cash'] + $x['till']; echo isset($total) ? number_format($total) .' ksh' : 'N/A'; ?>
                        </td>
                        <td class="mv" role="cell">
                            <?php echo isset($x['created_by']) ? ($x['created_by']) : 'N/A'; ?></td>
                        <td class="mv" role="cell">
                            <?php echo isset($x['creator_ip']) ? ($x['creator_ip']) : 'N/A'; ?></td>
                    </tr>
                    <?php endwhile ?>
                    <tr>
                        <td role="cell"></td>
                        <td><strong><?php echo 'Total Cash '. number_format($arr['0']['cash']).'=/' ?></strong></td>
                        <td><strong><?php echo 'Total Till '. number_format($arr['0']['till']).'=/' ?></strong></td>
                        <td><strong><?php echo 'Total '. number_format($arr['0']['total']).'=/' ?></strong></td>
                        <td role="cell"></td>
                        <td role="cell"></td>
                    </tr>

                </tbody>
            </table>
        </table>
    </div>
</div>
</div>