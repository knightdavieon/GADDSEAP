<style>
.disabled {
  pointer-events:none; //This makes it not clickable
  opacity:0.4;         //This grays it out to look disabled
  color: black;
}
</style>
<div class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li> <a href="index" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a></li>
        <li class="nav-devider"></li>
        <li> <a href="studentlist" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Student List </span></a>
        </li>
        <li class="<?php if($_SESSION['account_type'] == "staff"){ echo "disabled"; }?>" > <a href="reports" aria-expanded="false" ><i class="fa fa-file"></i><span class="hide-menu" >Reports </span></a>
        </li>
        <li class="nav-devider"></li>
        <li class="nav-label">Settings</li>
        <li class="<?php if($_SESSION['account_type'] == "staff"){ echo "disabled"; }?>"> <a href="#" data-toggle="modal" data-target="#import"><i class="fa fa-upload"></i><span class="hide-menu">Import </span></a>
        </li>
        <li class="<?php if($_SESSION['account_type'] == "staff"){ echo "disabled"; }?>"> <a href="accounts" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Accounts </span></a>
        </li>

      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</div>
<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="import">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="actions/import/index.php"  method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        <div class="modal-header" >
          <div style="text-align:center; margin-left:auto; margin-right: auto;0"><font size="30px"><h3> Import Exel Records?</h3></font></div>
        </div>
        <div class="modal-body">



              <div style="text-align:center;">
                  <label>Choose Excel
                      File</label> <input type="file" name="file"
                      id="file" accept=".xls,.xlsx">

              </div>


        </div>
        <div class="modal-footer">
          <button type="submit" name="import" class="btn btn-primary">Import</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
