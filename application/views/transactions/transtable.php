<?php defined('BASEPATH') OR exit('') ?>

<?= isset($range) && !empty($range) ? $range : ""; ?>
<div class="card bg-transparent border-0">
    <!-- Default panel contents -->
    <div class="card-header bg-transparent border-0"><h3>TRANSACTIONS</h3></div>
    <?php if($allTransactions): ?>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover table-borderless shadow" id="table">
            <thead>
                <tr class="bg-secondary text-white">
                    <th><b></b>SN</th>
                    <th>Receipt No</th>
                    <th>Total Items</th>
                    <th>Total Amount</th>
                    <th>Amount Tendered</th>
                    <th>Change Due</th>
                    <th>Mode of Payment</th>
                    <th>Staff</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allTransactions as $get): ?>
                <tr>
                    <th><?= $sn ?>.</th>
                    <td><a class="pointer vtr" style="color:#b30d0d" title="Click to view receipt"><?= $get->ref ?></a></td>
                    <td><?= $get->quantity ?></td>
                    <td><?= number_format($get->totalMoneySpent, 2) ?>/-</td>
                    <td><?= number_format($get->amountTendered, 2) ?>/-</td>
                    <td><?= number_format($get->changeDue, 2) ?>/-</td>
                    <td><?=  str_replace("_", " ", $get->modeOfPayment)?></td>
                    <td><?=$get->staffName?></td>
                    <td><?=$get->cust_name?> - <?=$get->cust_phone?> - <?=$get->cust_email?></td>
                    <td><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                    <td><?=$get->cancelled ? 'Cancelled' : 'Completed'?></td>
                    <td><?php if ($this->session->admin_role === "Super"):?>
                            <a href="/transactions/delete?i=<?=$get->ref?>">Delete</a>
                        <?php endif;?>
                    </td>
                </tr>
                <?php $sn++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!-- table div end-->
    <?php else: ?>
        <ul><li>No Transactions</li></ul>
    <?php endif; ?>
    
    <!--Pagination div-->
    <div class="col-sm-12 text-center">
        <ul class="pagination">
            <?= isset($links) ? $links : "" ?>
        </ul>
    </div>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
                "pageLength": 200
            });
        } );
    </script>
</div>
<!-- panel end-->