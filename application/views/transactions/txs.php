<?php defined('BASEPATH') OR exit('') ?>

<?=isset($range) && !empty($range) ? $range : ""; ?>
<div class="row mt-3 mb-3">
            <form action="/transactions/tx" method="get">
                <div class="row">
                    <div class="col-md-6 row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">From</span>
                                <input type="datetime-local" class="form-control rounded-0" name="date_from" value="<?=isset($_GET['date_from']) ? $_GET['date_from'] : ''?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">To</span>
                                <input type="datetime-local" class="form-control rounded-0" name="date_to" value="<?=isset($_GET['date_to']) ? $_GET['date_to'] : ''?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Item code</span>
                            <input type="text" class="form-control rounded-0" name="code" value="<?=isset($_GET['code']) ? $_GET['code'] : ''?>" placeholder="item code"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary rounded-0" type="submit">Filter</button>
                        <a href="/transactions/tx">
                            <span class="btn btn-danger rounded-0">cancel</span>
                        </a>
                    </div>
                </div>
            </form>
</div>
<div class="card bg-transparent border-0">
    <!-- Default panel contents -->
    <div class="card-header bg-transparent border-0"><h3>TRANSACTIONS ITEMS</h3></div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="table">
            <thead>
            <tr>
                <th></th>
                <th>Code</th>
                <th>Item</th>

                <th>Qty</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Tx ref</th>
                <th>Teller</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($items as $item) :
            ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$item->itemCode?></td>
                <td><?=$item->item?></td>
                <td><?=number_format($item->quantity,0)?></td>
                <td><?=number_format($item->unitPrice, 1)?></td>
                <td><?=number_format($item->totalPrice, 1)?></td>
                <td><a class="pointer vtr" style="color:#b30d0d" title="Click to view receipt" onclick="vtr_(this)"><?=$item->ref?></a></td>
                <td><?=$item->first_name . " " . $item->last_name?></td>
                <td><?=$item->transDate?></td>
            </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    } );
</script>
<script src="/public/js/transactions.js"></script>
