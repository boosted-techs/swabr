<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1; ?>
<Style>
    @font-face {
        font-family: 'thermal';
        src : url("/public/fonts/thermal.ttf");
    }
    #transReceiptToPrint {
        font-family: 'thermal', sans-serif;
   }
</Style>
<div id="transReceiptToPrint">
    <div class="row">
        <div class="col-xs-12 text-center text-uppercase border-bottom border-secondary" style="padding: 0 !important;">
            <h3>THE ZAKS INVESTMENTS LTD</h3>
            <p class="text-lowercase" style="margin-top:-10px !important;">info@zaks.com <br/>+256700500690</p>
        </div>
    </div>
    <div class="row text-end">
        <div class="col-sm-12">
            <b><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></b>
        </div>
    </div>
    
    <div class="row" style="margin-top:-7px !important;">
        <div class="col-sm-12 text-start">
            <label>No:</label>
            <span><?=isset($ref) ? $ref : ""?></span>
		</div>
    </div>
    <table class="col-md-12 mx-auto table table-bordered w-100">
        <thead>
        <tr>
            <Th class="p-0"></Th>
            <th class="p-0 font-weight-bolder"><b>Item</b></th>
            <th class="p-0 font-weight-bolder"><b>Qty</b></th>
            <th class="p-0 font-weight-bolder"><b>Unit</b></th>
            <th class="p-0 font-weight-bolder"><b>Amount</b></th>
        </tr>
        </thead>
        <tbody>
        <?php $init_total = 0; $i = 1;?>
        <?php foreach($allTransInfo as $get):?>
        <tr>
            <td class="p-0"><?=$i++?></td>
            <td class="p-0"><?=ellipsize($get['itemName'], 10);?></td>
            <td class="p-0"><?=$get['quantity']?></td>
            <td class="p-0"><?=number_format($get['unitPrice'], 1)?></td>
            <td class="p-0"><?=number_format($get['totalPrice'], 1)?>/-</td>
        </tr>
            <?php $init_total += $get['totalPrice'];?>
        <?php endforeach; ?>
        <tr>
            <td class="p-0"></td>
            <td colspan="4" class="text-end">TOTAL: <b><?=isset($init_total) ? number_format($init_total, 1) : 0?>/-</b></td>
        </tr>
        </tbody>
    </table>
    <div class="row border-top border-secondary" style="margin-top: -15px">
        <div class="col-xs-12 text-end">
            Discount(<?=$discountPercentage?>%): <?=isset($discountAmount) ? number_format($discountAmount, 1) : 0?>/-
        </div>
    </div>       
    <div class="row">
        <div class="col-xs-12 text-end">
            <?php if($vatPercentage > 0): ?>
            VAT(<?=$vatPercentage?>%): <?=isset($vatAmount) ? number_format($vatAmount, 1) : ""?>/-
            <?php else: ?>
                <i>VAT inclusive</i>
            <?php endif; ?>
        </div>
    </div>      
    <div class="row">
        <div class="col-xs-12 text-end">
            <b>FINAL TOTAL: <?=isset($cumAmount) ? number_format($cumAmount, 1) : ""?>/-</b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0'>
    <div class="row">
        <table class="col-xs-12 mx-auto">
            <thead>
            <tr><th class="p-0">Paid with</th><th class="p-0">Tendered</th><th class="p-0">Change</th></tr>
            </thead>
            <tbody>
            <tr>
                <td class="p-0"><?=isset($_mop) ? str_replace("_", " ", $_mop) : ""?></td>
                <td class="p-0"><?=isset($amountTendered) ? number_format($amountTendered, 1) : ""?>/-</td>
                <td class="p-0"><?=isset($changeDue) ? number_format($changeDue, 1) : ""?>/-</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">Thanks for shopping with us. <br> </div>
    </div>
</div>
<br class="hidden-print">
<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="printDiv('transReceipt')">
                <i class="fa fa-print"></i> Print Receipt
            </button>
            
            <button type="button" data-bs-dismiss='modal' class="btn btn-danger">
                <i class="fa fa-close"></i> Close
            </button>
        </div>
    </div>
</div>
<br class="hidden-print">
<?php endif;?>