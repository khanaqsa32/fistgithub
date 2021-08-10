
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 100px ">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <?php echo form_open('Admin/Member/save_user', 'id="doAction" class="m-t" role="form"');?>
            <div class="form-group row">

              <label for="Name" class="col-md-4">Doctor Name</label>
              <div class="col-md-8">
                <input type="text" class="form-control" id="dr_name"
                 name="dr_name" placeholder="Enter name">
                <p id="name_err" class="text-danger">
                </p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" for="dr_qual">Doctor Qualification</label>
              <div class="col-md-8">
                <input type="text" class="form-control" id="dr_qual" name="dr_qual" placeholder="Enter your Qualification">
                <p id="dr_qual_err" class="text-danger"></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" for="fees">Doctor Fees</label>
              <div class="col-md-8">
               <input type="text" class="form-control" id="dr_fees" name="dr_fees" placeholder="Enter your fees">
               <p id="dr_fees_err" class="text-danger"></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" for="fees">Doctor Timing</label>
               <div class="col-md-8">
                <input type="text" class="form-control" id="dr_timing" name="dr_timing" placeholder="Enter your Timing">
                <p id="dr_timing_err" class="text-danger"></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" for="text">Doctor number</label>
              <div class="col-md-8">
               <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your number">
              <p id="mobile_err" class="text-danger"></p>
             </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" for="email">Email</label>
               <div class="col-md-8">
                 <input type="email" class="form-control" id="email"  name="email" placeholder="Enter your email">
                 <p id="email_err" class="text-danger"></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" for="password">Password</label>
              <div class="col-md-8">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <p id="password_err" class="text-danger"></p>
            </div>
            </div>
            <div class="form-group row">
              <label  class="col-md-4" for="cpassword">Cofirm password</label>
              <div class="col-md-8">
               <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Password">
              </div>
            </div>
            <div class="form-group row">
             <div id="result_box">
              <p class="text-danger" id="resp_err"></p>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
