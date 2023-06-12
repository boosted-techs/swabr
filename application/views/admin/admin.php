<?php
defined('BASEPATH') OR exit('');
?>

<div class="row hidden-print">
    <div class="col-sm-12">
        <?php if (isset($_GET['reset'])): ?>
            <Div class="alert alert-success rounded-0">Password reset done. New password <b><?=$_GET['pwd']?></b> was sent to admin's corresponding email address.</Div>
        <?php endif;?>
        <?php if (isset($_GET['error'])): ?>
            <Div class="alert alert-danger rounded-0">An error occurred.</Div>
        <?php endif;?>
        <div class="">
            <!-- Header (add new admin, sort order etc.) -->
            <div class="row">
                <div class="row">
                    <div class="col-sm-2 fa fa-user-plus pointer" style="color:#337ab7" data-bs-toggle="modal" data-bs-target="#addNewAdminModal">
                        New Admin
                    </div>
                    <div class="col-sm-3 form-inline form-group-sm">
                        <div class="input-group">
                            <label for="adminListPerPage" class="input-group-text rounded-0">Show</label>
                            <select id="adminListPerPage" class="form-control rounded-0">
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <label for="adminListPerPage" class="input-group-text rounded-0">per page</label>
                        </div>
                    </div>
                    <div class="col-sm-4 form-inline form-group-sm">
                        <div class="input-group">
                            <label for="adminListSortBy" class="control-label input-group-text rounded-0">Sort by</label>
                            <select id="adminListSortBy" class="form-control rounded-0">
                                <option value="first_name-ASC" selected>Name (A to Z)</option>
                                <option value="first_name-DESC">Name (Z to A)</option>
                                <option value="created_on-ASC">Date Created (older first)</option>
                                <option value="created_on-DESC">Date Created (recent first)</option>
                                <option value="email-ASC">E-mail - ascending</option>
                                <option value="email-DESC">E-mail - descending</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 form-inline form-group-sm">
                        <div class="input-group">
                            <label for="adminSearch" class="input-group-text rounded-0"><i class="fa fa-search"></i></label>
                            <input type="search" id="adminSearch" placeholder="Search...." class="form-control rounded-0">
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            <!-- Header (sort order etc.) ends -->
            
            <!-- Admin list -->
            <div class="row">
                <div class="col-sm-12" id="allAdmin"></div>
            </div>
            <!-- Admin list ends -->
        </div>
    </div>
</div>


<!--- Modal to add new admin --->
<div class='modal fade' id='addNewAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <h4 class="text-center">Add New Admin</h4>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i id="fMsgIcon"></i><span id="fMsg"></span>
                </div>
                <form id='addNewAdminForm' name='addNewAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-12">
                            <div class="input-group">
                                <label for='firstName' class="control-label input-group-text rounded-0">First Name</label>
                                <input type="text" id='firstName' class="form-control checkField rounded-0" placeholder="First Name">
                            </div>
                            <span class="help-block errMsg" id="firstNameErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-12 mt-2">
                            <div class="input-group">
                                <label for='lastName' class="control-label input-group-text rounded-0">Last Name</label>
                                <input type="text" id='lastName' class="form-control checkField rounded-0" placeholder="Last Name">
                            </div>
                            <span class="help-block errMsg" id="lastNameErr"></span>
                        </div>
                    </div>
                    
                    
                    <div class="row mt-2">
                        <div class="form-group-sm col-sm-6">
                            <div class="input-group">
                                <label for='email' class="control-label input-group-text rounded-0">Email</label>
                                <input type="email" id='email' class="form-control checkField rounded-0" placeholder="Email">
                            </div>
                            <span class="help-block errMsg" id="emailErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <div class="input-group">
                                <label for='role' class="control-label input-group-text rounded-0">Role</label>
                                <select class="form-control checkField rounded-0" id='role'>
                                    <option value=''>Role</option>
                                    <option value='Super'>Super</option>
                                    <option value='Basic'>Basic</option>
                                </select>
                            </div>
                            <span class="help-block errMsg" id="roleErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-12 mt-2">
                            <div class="input-group">
                                <label for='mobile1' class="control-label input-group-text rounded-0">Phone Number</label>
                                <input type="tel" id='mobile1' class="form-control checkField rounded-0" placeholder="Phone Number">
                            </div>
                            <span class="help-block errMsg" id="mobile1Err"></span>
                        </div>
                        <div class="form-group-sm col-sm-12 mt-2">
                            <div class="input-group">
                                <label for='mobile2' class="control-label input-group-text rounded-0">Other Number</label>
                                <input type="tel" id='mobile2' class="form-control rounded-0" placeholder="Other Number (optional)">
                            </div>
                            <span class="help-block errMsg" id="mobile2Err"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6 mt-2">
                            <label for="passwordOrig" class="control-label mb-1">Password:</label>
                            <input type="password" class="form-control checkField rounded-0" id="passwordOrig" placeholder="Password">
                            <span class="help-block errMsg" id="passwordOrigErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6 mt-2">
                            <label for="passwordDup" class="control-label mb-1">Retype Password:</label>
                            <input type="password" class="form-control checkField rounded-0" id="passwordDup" placeholder="Retype Password">
                            <span class="help-block errMsg" id="passwordDupErr"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="addNewAdminForm" class="btn btn-warning pull-left">Reset Form</button>
                <button type='button' id='addAdminSubmit' class="btn btn-primary">Add Admin</button>
                <button type='button' class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to add new admin --->


<!--- Modal for editing admin details --->
<div class='modal fade' id='editAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <h4 class="text-center">Edit Admin Info</h4>
                <button class="btn-close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i id="fMsgEditIcon"></i>
                    <span id="fMsgEdit"></span>
                </div>
                <form id='editAdminForm' name='editAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstNameEdit' class="control-label">First Name</label>
                            <input type="text" id='firstNameEdit' class="form-control checkField rounded-0" placeholder="First Name">
                            <span class="help-block errMsg" id="firstNameEditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastNameEdit' class="control-label">Last Name</label>
                            <input type="text" id='lastNameEdit' class="form-control checkField rounded-0" placeholder="Last Name">
                            <span class="help-block errMsg" id="lastNameEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='emailEdit' class="control-label">Email</label>
                            <input type="email" id='emailEdit' class="form-control checkField rounded-0" placeholder="Email">
                            <span class="help-block errMsg" id="emailEditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='roleEdit' class="control-label">Role</label>
                            <select class="form-control checkField rounded-0" id='roleEdit'>
                                <option value=''>Role</option>
                                <option value='Super'>Super</option>
                                <option value='Basic'>Basic</option>
                            </select>
                            <span class="help-block errMsg" id="roleEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1Edit' class="control-label">Phone Number</label>
                            <input type="tel" id='mobile1Edit' class="form-control checkField rounded-0" placeholder="Phone Number">
                            <span class="help-block errMsg" id="mobile1EditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile2Edit' class="control-label">Other Number</label>
                            <input type="tel" id='mobile2Edit' class="form-control rounded-0" placeholder="Other Number (optional)">
                            <span class="help-block errMsg" id="mobile2EditErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="adminId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="editAdminForm" class="btn btn-warning pull-left rounded-0">Reset Form</button>
                <button type='button' id='editAdminSubmit' class="btn btn-primary rounded-0">Update</button>
                <button type='button' class="btn btn-danger rounded-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to edit admin details --->
<script src="/public/js/admin.js?v=21"></script>