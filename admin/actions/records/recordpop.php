<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="deleterecord<?php echo $i;?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="actions/records/deleterecord" method="post">
                <div class="modal-header">
                    <h4>Delete Student Record</h4>
                </div>
                <div class="modal-body">

                    <div style="text-align:center;"><font size="30px"><span class="fa fa-warning" style="color: red;"><h3>Are You Sure?</h3></span></font></div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="accountid" value="<?php echo $rowpersonal['record_id']; ?>" />
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
