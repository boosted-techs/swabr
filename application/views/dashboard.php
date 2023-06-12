<?php
defined('BASEPATH') OR exit('');
?>
<style>
    .latestStuffsBody {
        font-size: 26px;
        font-weight: bolder;
    }
</style>
<?php if($this->session->admin_role != "Basic"):?>
<div class="row latestStuffs">
    <div class="col-sm-3">
        <div class="card border-0 rounded-0 shadow">
            <div class="card-body latestStuffsBody bg-secondary" style="">
                <div class="float-start"><i class="fa fa-shopping-basket"></i></div>
                <div class="float-end">
                    <div><?=$totalItems?></div>
                    <!--<div class="latestStuffsText pull-right">Items in Stock</div> -->
                </div>
            </div>
            <div class="card-footer bg-transparent text-center p-4" style="">Total Items in Stock</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card border-0 rounded-0 shadow">
            <div class="card-body bg-info  text-white latestStuffsBody" style="">
                <div class="float-start"><i class="fa fa-list-ol"></i></div>
                <div class="float-end">
                    <div><?=$totalSalesToday?></div>
                   <!-- <div class="latestStuffsText">Today's Total Sales</div> -->
                </div>
            </div>
            <div class="card-footer bg-transparent p-4 text-center" style="">Items sold today</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card border-0 rounded-0 shadow">
            <div class="card-body text-dark latestStuffsBody" style="background: #ffddcc">
                <div class="float-start"><i class="fa fa-exchange"></i></div>
                <div class="float-end">
                    <div><?=$totalTransactions?></div>
                   <!-- <div class="latestStuffsText pull-right">Total Transactions</div> -->
                </div>
            </div>
            <div class="card-footer p-4 text-center bg-transparent" style="">All-Time Total Transactions</div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card border-0 rounded-0 shadow">
            <div class="card-body bg-success latestStuffsBody" style="">
                <div class="float-start"><i class="fa fa-plus-circle"></i></div>
                <div class="float-end">
                    <div> <?php $query = $this->db->query('SELECT SUM( totalPrice)as total FROM transactions')->row(); echo number_format($query->total);?></div>
                    
                </div>
                
            </div>
            <div class="card-footer text-center p-4 bg-transparent" style="">All-Time Total Earnings</div>
        </div>
    </div>
   
</div>


<!-- ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->
<div class="row mt-5 mb-4">
    <div class="col-sm-9">
        <div class="box">
            <div class="box-header bg-dark">
              <h3 class="box-title" id="earningsTitle"></h3>
            </div>

            <div class="box-body bg-secondary">
              <canvas style="padding-right:25px" id="earningsGraph" width="200" height="80"></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <section class="panel form-group-sm">
            <label class="control-label">Select Account Year:</label>
            <select class="form-control rounded-0" style="height: 40px" id="earningAndExpenseYear">
                <?php $years = range("2016", date('Y')); ?>
                <?php foreach($years as $y):?>
                <option value="<?=$y?>" <?=$y == date('Y') ? 'selected' : ''?>><?=$y?></option>
                <?php endforeach; ?>
            </select>
            <span id="yearAccountLoading"></span>
        </section>
        
        <section class="panel">
          <center>
              <canvas id="paymentMethodChart" width="200" height="200"/></canvas><br>Payment Methods(%)<span id="paymentMethodYear"></span>
          </center>
        </section>
    </div>
</div>
<!-- END OF ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->

<!-- ROW OF SUMMARY -->
<div class="row margin-top-5">
    <div class="col-sm-3">
        <div class="card rounded-0 border-0">
            <div class="card-header bg-success text-white"><i class="fa fa-level-up"></i> HIGH IN DEMAND</div>
            <?php if($topDemanded): ?>
            <table class="table table-striped table-responsive table-hover shadow">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty Sold</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($topDemanded as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td><?=$get->totSold?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="card rounded-0 border-0">
            <div class="card-header bg-danger text-white"><i class="fa fa-level-down"></i> LOW IN DEMAND</div>
            <?php if($leastDemanded): ?>
            <table class="table table-striped table-responsive table-hover shadow">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty Sold</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($leastDemanded as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td><?=$get->totSold?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="card border-0 rounded-0">
            <div class="card-header bg-dark text-white"><i class="fa fa-dollar"></i> HIGHEST EARNING</div>
            <?php if($highestEarners): ?>
            <table class="table table-striped table-responsive table-hover shadow">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Total Earned</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($highestEarners as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td>shs<?=number_format($get->totEarned, 2)?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="card rounded-0 border-0">
            <div class="card-header bg-dark text-danger"><i class="fa fa-dollar"></i> LOWEST EARNING</div>
            <?php if($lowestEarners): ?>
            <table class="table table-striped table-responsive table-hover shadow">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Total Earned</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lowestEarners as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td>shs<?=number_format($get->totEarned, 2)?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
</div>
<!-- END OF ROW OF SUMMARY -->

<div class="row">
    <div class="col-sm-6 mt-3">
        <div class="card rounded-0 border-0">
            <div class="card-header p-4 bg-primary text-white"><h3>Daily Transactions</h3></div>
            <div class="card-body scroll panel-height p-0">
                <?php if(isset($dailyTransactions) && $dailyTransactions): ?>
                <table class="table w-100 table-responsive table-striped table-hover shadow">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dailyTransactions as $get): ?>
                        <tr>
                            <td><?=
                                    date('l jS M, Y', strtotime($get->transactionDate)) === date('l jS M, Y', time())
                                    ? 
                                    "Today" 
                                    : 
                                    date('l jS M, Y', strtotime($get->transactionDate));
                                ?>
                            </td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>shs<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6 mt-3">
        <div class="card rounded-0 border-0">
            <div class="card-header bg-primary p-4 text-white"><h3>Transactions by Days</h3></div>
            <div class="card-body p-0 scroll panel-height">
                <?php if(isset($transByDays) && $transByDays): ?>
                <table class="table table-responsive shadow table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByDays as $get): ?>
                        <tr>
                            <td><?=$get->day?>s</td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>shs<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-6 mt-3">
        <div class="card rounded-0 border-0">
            <div class="card-header p-4 bg-warning"><h3>Transactions by Months</h3></div>
            <div class="panel-body scroll panel-height p-0">
                <?php if(isset($transByMonths) && $transByMonths): ?>
                <table class="table table-responsive table-striped table-hover shadow">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByMonths as $get): ?>
                        <tr>
                            <td><?=$get->month?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>shs<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6 mt-3">
        <div class="card border-0 rounded-0 panel-hash">
            <div class="card-header bg-warning p-4"><h3>Transactions by Years</h3></div>
            <div class="card-body p-0 scroll panel-height">
                <?php if(isset($transByYears) && $transByYears): ?>
                <table class="table table-responsive table-striped table-hover shadow">
                    <thead>
                        <tr style="font-weight: bolder">
                            <th>Year</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByYears as $get): ?>
                        <tr>
                            <td><?=$get->year?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>shs<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
    <?php
else:
    ?>
<Script>window.location = "/transactions";</Script>
<?php endif;?>

<script src="/public/js/chart.js"></script>
<script src="/public/js/dashboard.js"></script>