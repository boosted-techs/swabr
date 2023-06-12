<?php
defined('BASEPATH') OR exit('');

$current_items = [];

if(isset($items) && !empty($items)){    
    foreach($items as $get){
        $current_items[$get->code] = $get->name;
    }
}
?>

<style href="/public/ext/datetimepicker/bootstrap-datepicker.min.css>" rel="stylesheet"></style>

<script>
    var currentItems = <?=json_encode($current_items)?>;
</script>

<div class="pwell border-0 shadow-none hidden-print">
    <div class="row">
        <div class="col-sm-12">
            <!--- Row to create new transaction-->
            <div class="row">
                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-info btn-sm' id='showTransForm'><i class="fa fa-plus"></i> New Transaction </button>
                    </span>
                </div>
<!--                <div class="col-sm-3">-->
<!--                    <span class="pointer text-primary">-->
<!--                        <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#reportModal'>-->
<!--                            <i class="fa fa-newspaper-o"></i> Generate Report -->
<!--                        </button>-->
<!--                    </span>-->
<!--                </div>-->
            </div>
            <br>
            <!--- End of row to create new transaction-->
            <!---form to create new transactions--->
            <div class="row collapse" id="newTransDiv">
                <!---div to display transaction form--->
                <div class="col-sm-12" id="salesTransFormDiv">
                    <div class="bg-secondary text-white p-4">
                        <form name="salesTransForm" id="salesTransForm" role="form">
                            <div class="text-center errMsg" id='newTransErrMsg'></div>
                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Cloned div comes here--->
                                    <div id="appendClonedDivHere"></div>
                                    <!--End of cloned div here--->
                                    
                                    <!--- Text to click to add another item to transaction-->
                                    <div class="row">
                                        <div class="col-sm-2 text-primary pointer mb-2">
                                            <button class="btn btn-info btn-sm" id="clickToClone"><i class="fa fa-plus"></i> Add item</button>
                                        </div>
                                        
                                        <br class="visible-xs">
                                        
                                        <div class="col-sm-12 form-group-sm">
                                            <input type="text" id="barcodeText" class="form-control rounded-0 border-0 border-bottom" placeholder="item code" autofocus>
                                            <span class="help-block errMsg" id="itemCodeNotFoundMsg"></span>
                                        </div>
                                    </div>
                                    <!-- End of text to click to add another item to transaction-->
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-sm-3 form-group-sm">
                                            <div class="input-group">
                                                <label class="input-group-text" for="vat">VAT(%)</label>
                                                <input type="number" min="0" id="vat" class="form-control rounded-0 border-0" value="0">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 form-group-sm">
                                            <div class="input-group">
                                                <label for="discount" class="input-group-text">Dis(%)</label>
                                                <input type="number" min="0" id="discount" class="form-control rounded-0 border-0" value="0">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 form-group-sm">
                                            <div class="input-group">
                                                <label for="discount" class="input-group-text">Dis(value)</label>
                                                <input type="number" min="0" id="discountValue" class="form-control rounded-0 border-0" value="0">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 form-group-sm">
                                            <div class="input-group">
                                                <label for="modeOfPayment" class="input-group-text">MoP</label>
                                                <select class="form-control checkField rounded-0 border-0" id="modeOfPayment">
                                                    <option value="">---</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="POS">POS</option>
                                                    <option value="Cash and POS">Cash and POS</option>
                                                    <option value="Credit">Credit</option>
                                                    <option value="Credit and Cash">Credit and Cash</option>
                                                </select>
                                                <span class="help-block errMsg" id="modeOfPaymentErr"></span>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row mt-3">
                                        <div class="col-sm-6 form-group-sm">
                                            <div class="input-group">
                                                <label for="cumAmount" class="input-group-text rounded-0">Cumulative Amount</label>
                                                <span id="cumAmount" class="form-control rounded-0 border-0">0.00</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 form-group-sm">
                                            <div class="row">
                                                <div class="cashAndPos hidden input-group col-md-3">
                                                    <label for="cashAmount" class="input-group-text rounded-0">Cash</label>
                                                    <input type="text" class="form-control rounded-0 border-0" id="cashAmount">
                                                    <span class="help-block errMsg"></span>
                                                </div>

                                                <div class="cashAndPos hidden input-group col-md-3 mt-2">
                                                    <label for="posAmount" class="input-group-text rounded-0" id="posAmount">POS</label>
                                                    <input type="text" class="form-control rounded-0 border-0" id="posAmount">
                                                    <span class="help-block errMsg"></span>
                                                </div>

                                                <div id="amountTenderedDiv" class="input-group col-sm-3 mt-2">
                                                    <label for="amountTendered" class="input-group-text rounded-0" id="amountTenderedLabel">Amount Tendered</label>
                                                    <input type="text" class="form-control rounded-0 border-0" id="amountTendered">
                                                    <span class="help-block errMsg" id="amountTenderedErr"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 form-group-sm mt-2">
                                            <div class="input-group">
                                                <label for="changeDue" class="input-group-text">Change Due</label>
                                                <span class="form-control rounded-0 border-0" id="changeDue">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row mt-4">
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="custName">Customer Name</label>
                                            <input type="text" id="custName" class="form-control rounded-0 border-0" placeholder="Name">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="custPhone">Customer Phone</label>
                                            <input type="tel" id="custPhone" class="form-control rounded-0 border-0" placeholder="Phone Number">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="custEmail">Customer Email</label>
                                            <input type="email" id="custEmail" class="form-control rounded-0 border-0" placeholder="E-mail Address">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <br class="visible-xs">
                                <div class="col-sm-6"></div>
                                <br class="visible-xs">
                                <div class="col-sm-4 form-group-sm">
                                    <button type="button" class="btn btn-info btn-sm" id="confirmSaleOrder">Confirm Order</button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-0 border-0" id="cancelSaleOrder">Clear Order</button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-0 border-0" id="hideTransForm">Close</button>
                                </div>
                            </div>
                        </form><!-- end of form-->
                    </div>
                </div>
                <!-- end of div to display transaction form-->
            </div>
            <!--end of form-->
    
            <br><br>
            <!-- sort and co row-->
            <div class="row">
                <div class="row">
                    <div class="col-sm-3 form-inline form-group-sm">
                        <div class="input-group">
                            <label class="input-group-text rounded-0" for="transListPerPage">Per Page</label>
                            <select id="transListPerPage" class="form-control rounded-0">
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300" selected>300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="1500">1500</option>
                                <option value="2000">2000</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-5 form-group-sm form-inline">
                        <div class="input-group">
                            <label for="transListSortBy" class="input-group-text rounded-0">Sort by</label>
                            <select id="transListSortBy" class="form-control rounded-0">
                                <option value="transId-DESC" selected>date(Latest First)</option>
                                <option value="transId-ASC">date(Oldest First)</option>
                                <option value="quantity-DESC">Quantity (Highest first)</option>
                                <option value="quantity-ASC">Quantity (Lowest first)</option>
                                <option value="totalPrice-DESC">Total Price (Highest first)</option>
                                <option value="totalPrice-ASC">Total Price (Lowest first)</option>
                                <option value="totalMoneySpent-DESC">Total Amount Spent (Highest first)</option>
                                <option value="totalMoneySpent-ASC">Total Amount Spent (Lowest first)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 form-inline form-group-sm">
                        <div class="input-group">
                            <label for='transSearch' class="input-group-text rounded-0"><i class="fa fa-search"></i></label>
                            <input type="search" id="transSearch" class="form-control rounded-0" placeholder="Search by Receipt No">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sort and co div-->
        </div>
    </div>
    
    <hr>
    
    <!-- transaction list table-->
    <div class="row">
        <!-- Transaction list div-->
        <div class="col-sm-12" id="transListTable"></div>
        <!-- End of transactions div-->
    </div>
    <!-- End of transactions list table-->
</div>


<div class="row hidden border border-warning shadow p-4 mb-2" id="divToClone">
    <div class="col-sm-12 form-group-sm">
        <div class="input-group">
            <label class="input-group-text rounded-0">Item</label>
            <select class="form-control selectedItemDefault rounded-0" onchange="selectedItem(this)"></select>
        </div>
    </div>

    <div class="col-sm-4 form-group-sm mt-2">
        <div class="input-group itemAvailQtyDiv">
            <label class="input-group-text rounded-0">Available Qty</label>
            <span class="form-control itemAvailQty">0</span>
        </div>
    </div>
    <div class="col-sm-4 form-group-sm">
        <div class="input-group">
            <label class="input-group-text rounded-0">Unit Price</label>
            <span class="form-control itemUnitPrice rounded-0">0.00</span>
        </div>
    </div>

    <div class="col-sm-4 form-group-sm">
        <div class="input-group itemTransQtyDiv">
            <label class="input-group-text rounded-0">Qty</label>
            <input type="number" min="0" class="form-control itemTransQty rounded-0" value="0">
            <span class="bg-dark help-block itemTransQtyErr errMsg"></span>
        </div>
    </div>

    <div class="col-sm-4 mt-2 mb-2 form-group-sm">
        <div class="input-group">
            <label class="rounded-0 input-group-text">Total Price</label>
            <span class="form-control itemTotalPrice">0.00</span>
        </div>
    </div>
    
    <br class="visible-xs">
    
    <div class="col-sm-1">
        <button class="btn btn-dark float-end rounded-0 close retrit">&times;</button>
    </div>
    
    <br class="visible-xs">
</div>


<div class="modal fade" id='reportModal' data-backdrop='static' role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="close" data-dismiss='modal'></div>
                <h4 class="text-center">Generate Report</h4>
            </div>
            
            <div class="modal-body">
                <div class="row" id="datePair">
                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">From Date</label>                                    
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transFrom' class="form-control date start" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transFromErr'></span>
                    </div>

                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">To Date</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transTo' class="form-control date end" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transToErr'></span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGen'>Generate</button>
                <button class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>

<!---End of copy of div to clone when adding more items to sales transaction---->
<script src="/public/js/transactions.js?v=22"></script>
<script src="/public/ext/datetimepicker/bootstrap-datepicker.min.js"></script>
<script src="/public/ext/datetimepicker/jquery.timepicker.min.js"></script>
<script src="/public/ext/datetimepicker/datepair.min.js"></script>
<script src="/public/ext/datetimepicker/jquery.datepair.min.js"></script>
<script>
    // window.addEventListener('beforeunload', (event) => {
    //     event.preventDefault();
    //     event.returnValue = 'Are you sure you want to leave this page?';
    // });
    window.onbeforeunload = function(e) {
        return 'Are you sure you want to leave this page?';
    };
    // $(window).bind("beforeunload",function(event) {
    //     return "Are you sure you want leave the transactions page?";
    // });
</script>