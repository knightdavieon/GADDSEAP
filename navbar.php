<nav class="navbar fixed-top navbar-light navbar-expand-md bg-faded justify-content-end nav-cust-bg1">
    <a href="index" class="navbar-logo"></a>
      <button class="btn btn-bknow" data-toggle="modal" data-target="#contactus" >Contact Us</button>

</nav>
<nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-end nav-cust-bg2" id="fixme2">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="announcements">Announcement</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="gallery">Gallery</a>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h6 class="display-7">Contact #: ###########</h6>
            </div>
            <div class="col-md-6">
              <h6 class="display-7">Contact #: ###########</h6>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <h5 class="display-6">Email Us</h5>
          </div>
          <div class="col-md-9">
            <hr />
          </div>
        </div>


        <form class="" action="index.html" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="fullname">Full Name</label>
              <input type="text" class="form-control" id="fullname" name="contactfullname" placeholder="Full Name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="contactemail" placeholder="Email">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="textarea">Message</label>
              <textarea class="form-control" id="textarea" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-bknow">Send</button>
      </div>
    </div>
  </div>
</div>
