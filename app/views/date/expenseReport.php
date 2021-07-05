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
                    <th role="columnheader">Item (Name)</th>
                    <th role="columnheader">Amount(ksh)</th>
                    <th role="columnheader">Net Total</th>
                    <th role="columnheader">Created By</th>
                    <th role="columnheader">Host Address</th>
                </tr>
            </thead>
            <tbody role="rowgroup">
                <?php
                $net = getFileteredReportTotal($data['date'], $data['date2'], 'expense', $data['db']);

                 $row = getReportDate($data['date'], $data['date2'], 'expense', $data['db']); 
                 while($x = $row->fetch_assoc()):
            ?>
                <tr role="row">
                    <td class="exp" role="cell"><?php echo date('F jS Y',strtotime($x['date_created'])); ?></td>
                    <td class="exp" role="cell"><?php echo isset($x['expense_item'])?$x['expense_item']:''; ?></td>
                    <td class="exp" role="cell">
                        <?php echo isset($x['expense_cost'])?number_format($x['expense_cost']):''; ?></td>
                    <td class="exp" role="cell">
                        <?php echo isset($x['expense_cost'])?number_format($x['expense_cost']):''; ?></td>
                    <td class="exp" role="cell">
                        <?php echo isset($x['created_by'])?($x['created_by']):''; ?></td>
                    <td class="exp" role="cell">
                        <?php echo isset($x['creator_ip'])?($x['creator_ip']):''; ?></td>
                </tr>
                <?php endwhile ?>
                <tr>
                    <td role="cell"></td>
                    <td></td>
                    <td><strong><?php echo isset($net) ? number_format($net) .' Ksh' : 'N/A'; ?></strong></td>
                    <td><strong><?php echo isset($net) ? number_format($net) .' Ksh'  : 'N/A'; ?></strong></td>
                    <td role="cell"></td>
                    <td role="cell"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>