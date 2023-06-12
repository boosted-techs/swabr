<?php
defined('BASEPATH') OR exit('');
?>
<div class="border-0 hidden-print">
    <div class="row p-3">
            <div class="col-sm-2 form-inline form-group-sm">
                <button class="btn btn-primary btn-sm" id='createItem'>Add New Item</button>
            </div>
            <div class="col-md-3 form-inline form-group-sm">
                <div class="input-group">
                    <span for="itemsListPerPage" class="input-group-text">Show</span>
                    <select id="itemsListPerPage" class="form-control rounded-0">
                        <option value="1">1</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500" selected>500</option>
                        <option value="1000">1000</option>
                    </select>
                    <span class="input-group-text">per page</span>
                </div>
            </div>
            <div class="col-sm-4 form-group-sm form-inline">
                <div class="input-group">
                    <span class="input-group-text" for="itemsListSortBy">Sort by</span>
                    <select id="itemsListSortBy" class="form-control rounded-0">
                        <option value="name-ASC">Item Name (A-Z)</option>
                        <option value="code-ASC" selected>Item Code (Ascending)</option>
                        <option value="unitPrice-DESC">Unit Price (Highest first)</option>
                        <option value="quantity-DESC">Quantity (Highest first)</option>
                        <option value="name-DESC">Item Name (Z-A)</option>
                        <option value="code-DESC">Item Code (Descending)</option>
                        <option value="unitPrice-ASC">Unit Price (lowest first)</option>
                        <option value="quantity-ASC">Quantity (lowest first)</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 form-inline form-group-sm">
                <div class="input-group">
                    <span class="input-group-text" for='itemSearch'><i class="fa fa-search"></i></span>
                    <input type="search" id="itemSearch" class="form-control rounded-0" placeholder="Search Items">
                </div>
            </div>
    </div>
    <!-- end of sort and co div-->
    <hr>
    
    <!-- row of adding new item form and items list table-->
    <div class="row">
            <!--Form to add/update an item-->
            <div class="col-sm-4 hidden" id='createNewItemDiv'>
                <div class="shadow-sm p-4">
<!--                    <button class="btn btn-info btn-xs pull-left" id="useBarcodeScanner">Use Scanner</button>-->
                    <button class="btn btn-danger float-end close cancelAddItem">&times;</button><br>
                    <form name="addNewItemForm" id="addNewItemForm" role="form">
                        <div class="text-center errMsg" id='addCustErrMsg'></div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <div class="input-group">
                                    <label class="input-group-text" for="itemCode">Item Code</label>
                                    <input type="text" id="itemCode" name="itemCode" placeholder="Item Code" maxlength="80"
                                           class="form-control" onchange="checkField(this.value, 'itemCodeErr')" autofocus>
                                    <!--<span class="help-block"><input type="checkbox" id="gen4me"> auto-generate</span>-->
                                </div>
                                <span class="help-block errMsg" id="itemCodeErr"></span>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-sm-12 form-group-sm">
                                <div class="input-group">
                                    <label for="itemName" class="input-group-text">Item Name</label>
                                    <input type="text" id="itemName" name="itemName" placeholder="Item Name" maxlength="80"
                                           class="form-control" onchange="checkField(this.value, 'itemNameErr')">
                                </div>
                                <span class="help-block errMsg" id="itemNameErr"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm mt-2">
                                <div class="input-group">
                                    <label for="itemQuantity" class="input-group-text">Quantity</label>
                                    <input type="number" id="itemQuantity" name="itemQuantity" placeholder="Available Quantity"
                                           class="form-control" min="0" onchange="checkField(this.value, 'itemQuantityErr')">
                                </div>
                                <span class="help-block errMsg" id="itemQuantityErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group-sm mt-2">
                            <div class="input-group">
                                <label for="dateAdded" class="input-group-text rounded-0">Date Stocked</label>
                                <input type="date" id="dateAdded" value="" class="form-control rounded-0">
                            </div>
                            <script>
                                document.getElementById('dateAdded').valueAsDate = new Date();
                            </script>
                            <span class="help-block errMsg" id="dateAdded"></span>
                        </div>
                        <div class="col-sm-12 form-group-sm mt-2">
                            <div class="input-group">
                                <label for="supplier" class="input-group-text rounded-0">Supplier</label>
                                <input type="text" id="supplier" class="form-control rounded-0" placeholder="Supplier's name">
                            </div>
                            <span class="help-block errMsg" id="supplier"></span>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm mt-2">
                                <div class="input-group">
                                    <label for="unitPrice" class="input-group-text">(shs)Unit Price</label>
                                    <input type="text" id="itemPrice" name="itemPrice" placeholder="(shs)Unit Price" class="form-control"
                                           onchange="checkField(this.value, 'itemPriceErr')">
                                </div>
                                <span class="help-block errMsg" id="itemPriceErr"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemDescription" class="">Description (Optional)</label>
                                <textarea class="form-control" id="itemDescription" name="itemDescription" rows='4'
                                    placeholder="Optional Item Description"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-sm-6 form-group-sm">
                                <button class="btn btn-primary btn-sm" id="addNewItem">Add Item</button>
                            </div>

                            <div class="col-sm-6 form-group-sm">
                                <button type="reset" id="cancelAddItem" class="btn btn-danger btn-sm cancelAddItem" form='addNewItemForm'>Cancel</button>
                            </div>
                        </div>
                    </form><!-- end of form-->
                </div>
            </div>
            <!--- Item list div-->
            <div class="col-md-12" id="itemsListDiv">
                <!-- Item list Table-->
                <div class="row">
                    <div class="col-md-12" id="itemsListTable"></div>
                </div>
                <!--end of table-->
            </div>
            <!--- End of item list div-->


    </div>
    <!-- End of row of adding new item form and items list table-->
</div>

<!--modal to update stock-->
<div id="updateStockModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center float-start">Update Stock</h4>
                <button class="btn-close float-end" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="stockUpdateFMsg" class="text-center"></div>
                <form name="updateStockForm" id="updateStockForm" role="form">
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <div class="input-group">
                                <label class="input-group-text rounded-0">Item Name</label>
                                <input type="text" readonly id="stockUpdateItemName" class="form-control bg-secondary text-white rounded-0">
                            </div>
                        </div>
                        
                        <div class="col-sm-12 form-group-sm mt-2">
                            <div class="input-group">
                                <label class="input-group-text rounded-0">Code</label>
                                <input type="text" readonly id="stockUpdateItemCode" class="form-control rounded-0 border-0 bg-secondary text-white">
                            </div>
                        </div>
                        
                        <div class="col-sm-12 form-group-sm mt-2">
                            <div class="input-group">
                                <label class="input-group-text rounded-0">Quantity in Stock</label>
                                <input type="text" readonly id="stockUpdateItemQInStock" class="form-control rounded-0 border-0 bg-secondary text-white">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="input-group">
                                <label for="supplierUpdate" class="input-group-text">Supplier</label>
                                <input type="text" id="supplierUpdate" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="input-group">
                                <label for="dateOfSupplyUpdate" class="input-group-text">Date</label>
                                <input type="date" id="dateOfSupplyUpdate" value="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group-sm">
                            <label for="stockUpdateType">Update Type</label>
                            <select id="stockUpdateType" class="form-control checkField rounded-0 border-0 border-bottom border-secondary">
                                <option value="">---</option>
                                <option value="newStock">New Stock</option>
                                <option value="deficit">Deficit</option>
                            </select>
                            <span class="help-block errMsg" id="stockUpdateTypeErr"></span>
                        </div>
                        
                        <div class="col-sm-6 form-group-sm">
                            <label for="stockUpdateQuantity">Quantity</label>
                            <input type="number" id="stockUpdateQuantity" placeholder="Update Quantity"
                                class="form-control checkField rounded-0 border-0 border-bottom border-secondary" min="0">
                            <span class="help-block errMsg" id="stockUpdateQuantityErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="stockUpdateDescription" class="">Description</label>
                            <textarea class="form-control checkField rounded-0 border-0 border-bottom border-secondary" id="stockUpdateDescription" placeholder="Update Description"></textarea>
                            <span class="help-block errMsg" id="stockUpdateDescriptionErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="stockUpdateItemId">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="stockUpdateSubmit">Update</button>
                <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->



<!--modal to edit item-->
<div id="editItemModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Item</h4>
                <button class="btn-close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body bg-light">
                <div id="editItemFMsg" class="text-center"></div>
                <form role="form">
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <div class="input-group">
                                <label for="itemNameEdit" class="input-group-text rounded-0">Item Name</label>
                                <input type="text" id="itemNameEdit" placeholder="Item Name" autofocus class="form-control rounded-0 checkField">
                            </div>
                            <span class="help-block errMsg" id="itemNameEditErr"></span>
                        </div>
                        
                        <div class="col-sm-6 form-group-sm mt-2">
                            <div class="input-group">
                                <label for="itemCode" class="input-group-text rounded-0">Item Code</label>
                                <input type="text" id="itemCodeEdit" class="form-control rounded-0">
                            </div>
                            <span class="help-block errMsg" id="itemCodeEditErr"></span>
                        </div>
                        <div class="col-sm-6 mt-2 form-group-sm">
                            <div class="input-group">
                                <label for="unitPrice" class="input-group-text rounded-0">Unit Price</label>
                                <input type="text" id="itemPriceEdit" name="itemPrice" placeholder="Unit Price" class="form-control rounded-0 checkField">
                            </div>
                            <span class="help-block errMsg" id="itemPriceEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="itemDescriptionEdit" class="p-2">Description (Optional)</label>
                            <textarea class="form-control rounded-0" id="itemDescriptionEdit" placeholder="Optional Item Description"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="itemIdEdit">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="editItemSubmit">Save</button>
                <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->
<script src="/public/js/items.js?v=28"></script>