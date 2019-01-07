<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="editaccount<?php echo $i;?>">
    <div class="modal-dialog" style="top:40%;" role="document">
        <div class="modal-content">
            <form action="actions/accounts/updateaccount" method="post">
                <div class="modal-header" style="padding-top: 0; padding-bottom: 0;">
                    <h4>Update Account</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account ID</label>
                                <input type="text" class="form-control" style="border-color: rgb(41, 41, 41);color:#424141;" autocomplete="off" value="<?php echo $row['account_id']?>" REQUIRED placeholder="First Name" name="id" READONLY/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Name</label>
                                <input type="text" class="form-control"style="border-color: rgb(41, 41, 41);color:#424141;" autocomplete="off" value="<?php echo $row['account_name'];?>" REQUIRED placeholder="Last Name" name="accountnem" READONLY/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" style="border-color: rgb(41, 41, 41);color:#424141;" autocomplete="off" value="<?php echo $row['user_firstname']?>" onkeypress="return restrictCharacters(this, event, alphaOnly);" REQUIRED placeholder="First Name"  name="firstname" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" style="border-color: rgb(41, 41, 41);color:#424141;" autocomplete="off" value="<?php echo $row['user_lastname'];?>" onkeypress="return restrictCharacters(this, event, alphaOnly);" REQUIRED placeholder="Last Name"  name="lastname" />
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                           <div class="form-group">
                                <label>Contact #</label>
                                <input type="text" class="form-control" style="border-color: rgb(41, 41, 41);color:#424141;" autocomplete="off" value="<?php echo $row['user_contact']?>" onkeypress="return restrictCharacters(this, event, digitsOnly);" REQUIRED placeholder="Contact #"  name="contact" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Type #</label>
                                <select class="form-control" name="acctype" style="border-color: rgb(41, 41, 41);color:#424141;">
                                    <option value="admin" <?php if($row['account_type'] == "admin"){echo "SELECTED"; } ?> >Admin</option>
                                    <option value="adminsec" <?php if($row['account_type'] == "adminsec"){echo "SELECTED"; } ?> >Admin Sec</option>
                                    <option value="it" <?php if($row['account_type'] == "it"){echo "SELECTED"; } ?> >IT</option>
                                    <option value="staff" <?php if($row['account_type'] == "staff"){echo "SELECTED"; } ?> >Staff</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="form-group">
                                <label><input type="checkbox" class="bs-checkbox"style="border-color: rgb(41, 41, 41);color:#424141;" id="chckbox<?php echo $i; ?>" name="chckbox" value="checked"> Change Password</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="showcont" id="showcont<?php echo $i; ?>" style="display:none;">
                        <div class="row" >

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <input type="password" class="form-control"style="border-color: rgb(41, 41, 41);color:#424141;" placeholder="Password" value="" name="password" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control"style="border-color: rgb(41, 41, 41);color:#424141;" placeholder="Password" value=""  name="repassword" />
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="userid" value="<?php echo $row['account_id']; ?>" />
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="deactivateaccount<?php echo $i;?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="actions/accounts/deactivateaccount" method="post">
                <div class="modal-header">
                    <h4>Deactivate account</h4>
                </div>
                <div class="modal-body">

                    <div style="text-align:center;"><font size="30px"><span class="fa fa-warning" style="color: red;"><h3>Are You Sure?</h3></span></font></div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="accountid" value="<?php echo $row['account_id']; ?>" />
                    <button type="submit" class="btn btn-primary">Deactivate</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="activateaccount<?php echo $i;?>">
    <div class="modal-dialog" style="align-content: center;" role="document">
        <div class="modal-content">
            <form action="actions/accounts/activateaccount" method="post">
                <div class="modal-header">
                    <h4>Activate account</h4>
                </div>
                <div class="modal-body">

                    <div style="text-align:center;"><font size="30px"><span class="fa fa-exclamation" style="color: yellow;"><h3>Are You Sure?</h3></span></font></div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="accountid" value="<?php echo $row['account_id']; ?>" />
                    <button type="submit" class="btn btn-primary">Activate</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="deleteaccount<?php echo $i;?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="actions/accounts/deleteaccount" method="post">
                <div class="modal-header">
                    <h4>Delete account</h4>
                </div>
                <div class="modal-body">

                    <div style="text-align:center;"><font size="30px"><span class="fa fa-warning" style="color: red;"><h3>Are You Sure?</h3></span></font></div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="accountid" value="<?php echo $row['account_id']; ?>" />
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>






    <!-- All Jquery -->
    <script src="../resources/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../resources/js/lib/bootstrap/js/popper.min.js"></script>


<script>
$(document).ready(function(){
$('#chckbox<?php echo $i; ?>').change(function(){
if(this.checked)
$('#showcont<?php echo $i; ?>').fadeIn('slow');
else
$('#showcont<?php echo $i; ?>').fadeOut('slow');

});
});
</script>
