    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/Student/save_student', 'id="doAction" class="m-t" role="form"');
            echo '<div class="form-group row"><div class="col-sm-4"></div>
                    <div class="col-sm-8"><p class="text-navy m-b-none"><span class="text-danger font-bold">*</span> Image size should be max 500kb.</p>
                        <p class="text-navy"><span class="text-danger font-bold">*</span> Image dimension must be exactly 1350 x 500 in px</p></div></div>';
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">First Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="first_name" name="first_name">
                        <p class="text-danger" id="first_name_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Last Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="last_name" name="last_name">
                        <p class="text-danger" id="last_name_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Address</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="saddress" name="saddress">
                        <p class="text-danger" id="saddress_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mobile</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="mobile" name="mobile">
                        <p class="text-danger" id="mobile_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Email</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="email" name="email">
                        <p class="text-danger" id="email_err"></p>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Image</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" id="student_image" name="student_image">
                        <p class="text-danger" id="student_image_err"></p>
                    </div>
                </div>
                                                                           
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="result_box"><p class="text-danger" id="resp_err"></p></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-lg m-b">Submit</button>
                    </div>
                </div>
            </form>';
        ?>
        </div>
    </div>