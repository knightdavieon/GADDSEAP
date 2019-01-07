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
                <li class="<?php if($_SESSION['account_type'] == "staff"){ echo "disabled"; }?>"> <a href="accounts" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Accounts </span></a>
                </li>

            </ul>
        </nav>
                <!-- End Sidebar navigation -->
    </div>
            <!-- End Sidebar scroll-->
</div>
