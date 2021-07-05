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
                </tr>
            </thead>
            <tbody role="rowgroup">
                <?php
                $net = getFileteredReportTotal($data['date'], $data['date2'], 'sales', $data['db']);
                $arr = array();

                while($y = $net->fetch_assoc())
                {
                    array_push($arr,$y);
                }
                 $row = getReportDate($data['date'], $data['date2'], 'sales', $data['db']); 
                 while($x = $row->fetch_assoc()):
                ?>
                <tr role="row">
                    <td class="sl" role="cell"><?php echo date('F jS Y',strtotime($x['date_created'])); ?></td>
                    <td class="sl" role="cell"><?php echo isset($x['sales_item']) ? $x['sales_item'] : 'N/A'; ?></td>
                    <td class="sl" role="cell">
                        <?php echo isset($x['buying_price'])? number_format($x['buying_price']) : 'N/A'; ?>
                    </td>
                    <td class="sl" role="cell">
                        <?php echo isset($x['selling_price'])? number_format($x['selling_price']) : 'N/A'; ?>
                    </td>
                    <td class="sl" role="cell"><?php echo isset($x['profit'])? number_format($x['profit']) : 'N/A'; ?>
                    </td>
                    <td class="sl" role="cell"><?php echo isset($x['created_by'])? ($x['created_by']) : 'N/A'; ?></td>
                </tr>
                <?php endwhile ?>
                <tr>
                    <td role="cell"></td>
                    <td role="cell"></td>
                    <td role="cell"></td>
                    <td><strong><?php echo 'Sold '. number_format($arr['0']['selling']) .' ksh' ?></strong></td>
                    <td><strong><?php echo 'Net Profit ' . number_format($arr['0']['pr']). ' ksh' ?></strong></td>
                    <td role="cell"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>