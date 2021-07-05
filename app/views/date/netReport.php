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
                    <th role="columnheader">Total Cash income(ksh)</th>
                    <th role="columnheader">Total Till income(ksh)</th>
                    <th role="columnheader">Total Expense</th>
                    <th role="columnheader">Total Sale</th>
                    <th role="columnheader">Gross Total</th>
                </tr>
            </thead>
            <tbody role="rowgroup">
                <?php
                $net = getFileteredReportTotal($data['date'], $data['date2'], 'net', $data['db']);
                $arr = array();

                while($y = $net->fetch_assoc())
                {
                    array_push($arr,$y);
                }
                 $row = getReportDate($data['date'], $data['date2'], 'net', $data['db']); 
                 while($x = $row->fetch_assoc()):
            ?>
                <tr role="row">
                    <td class="net" role="cell"><?php echo date('F jS Y',strtotime($x['date_created'])); ?></td>
                    <td class="net" role="cell">
                        <?php echo isset($x['cash_sales'])? number_format($x['cash_sales']) : 'N/A'; ?></td>
                    <td class="net" role="cell">
                        <?php echo isset($x['till_sales'])? number_format($x['till_sales']) : 'N/A'; ?></td>
                    <td class="net" role="cell">
                        <?php echo isset($x['totalexpense'])? number_format($x['totalexpense']) : 'N/A'; ?></td>
                    <td class="net" role="cell">
                        <?php echo isset($x['total_sales'])? number_format($x['total_sales']) : 'N/A'; ?></td>
                    <td class="net" role="cell">
                        <?php $total = ($x['totalincome'] + $x['total_sales']) - $x['totalexpense']; echo isset($total)? number_format($total) : 'N/A'; ?>
                    </td>
                </tr>
                <?php endwhile ?>
                <tr>
                    <td role="cell"></td>
                    <td><strong>
                            <?php echo isset($arr['0']['totalcash'])? 'Total Cash '.number_format($arr['0']['totalcash']).' ksh' : 'N/A'; ?>
                        </strong>
                    </td>
                    <td><strong>
                            <?php echo isset($arr['0']['totaltill'])? 'Total Till '.number_format($arr['0']['totaltill']).' ksh' : 'N/A'; ?>
                        </strong>
                    </td>
                    <td><strong>
                            <?php echo 'Total Expense '.isset($arr['0']['expensetotal'])? 'Total Expense '.number_format($arr['0']['expensetotal']).' ksh' : 'N/A'; ?>
                        </strong>
                    </td>
                    <td> <strong><?php echo isset($arr['0']['totalsales'])? 'Total Sales '.number_format($arr['0']['totalsales']).' ksh' : 'N/A'; ?></strong>
                    </td>
                    <td>
                        <strong>
                            <?php $z = ($arr['0']['incometotal'] + $arr['0']['totalsales'] - $arr['0']['expensetotal']); echo isset($z)? 'Gross '.number_format($z).' ksh' : 'N/A'; ?>
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>