<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="generateall">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="actions/reports/printall.php" method="post">
        <div class="modal-header">
          <h4>Generate all?</h4>
        </div>
        <div class="modal-body">

          <div style="text-align:center;"><font size="30px"><span class="fa fa-info" style="color: blue;"><h3>Are You Sure?</h3></span></font></div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Generate</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="generateschool">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="actions/reports/printschool.php" method="post">
        <div class="modal-header">
          <h4>Generate Per School?</h4>
        </div>
        <div class="modal-body">


          <div class="container" style=" text-align:center;">
					Select School:
					<br />
					<select class="form-control" style="text-align:center;" name = "school">
            <option value=" " selected>--SELECT SCHOOL--</option>
						<?php
            $selectdistinctschool = $conn->query("SELECT DISTINCT school from personal_info");
            $i='1';
            While($rowschool = $selectdistinctschool->fetch(PDO::FETCH_ASSOC)){


             ?>
             	<option value="<?php echo $rowschool['school']; ?>" ><?php echo $rowschool['school']; ?></option>
             <?php }  ?>
					</select>
					</div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Generate</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="generatemunicipality">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="actions/reports/printmunicipality.php" method="post">
        <div class="modal-header">
          <h4>Generate Per Municipality?</h4>
        </div>
        <div class="modal-body">



          <div class="container" style=" text-align:center;">
					Select Municipality:
					<br />
					<select class="form-control" style="text-align:center;" name="municipality" >
            <option value=" " SELECTED >--SELECT Municipality--</option>
						<?php
            $selectdistinctmunicipality = $conn->query("SELECT DISTINCT address_mun from personal_info");
            $i='1';
            While($rowmunicipality = $selectdistinctmunicipality->fetch(PDO::FETCH_ASSOC)){


             ?>
             	<option value="<?php echo $rowmunicipality['address_mun']; ?>" ><?php echo $rowmunicipality['address_mun']; ?></option>
             <?php }  ?>
					</select>
					</div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Generate</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
