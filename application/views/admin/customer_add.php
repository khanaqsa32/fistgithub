    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/Customer/save_customer', 'id="doAction" class="m-t" role="form"');
            echo '<div class="form-group row"><div class="col-sm-4"></div>
                    <div class="col-sm-8"><p class="text-navy m-b-none"><span class="text-danger font-bold">*</span> Image size should be max 500kb.</p>
                        <p class="text-navy"><span class="text-danger font-bold">*</span> Image dimension must be exactly 1350 x 500 in px</p></div></div>';
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Customer Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="customer_name" name="customer_name">
                        <p class="text-danger" id="customer_name_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Address</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="address" name="address">
                        <p class="text-danger" id="address_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Area</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="area" name="area">
                        <p class="text-danger" id="area_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">City</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="city" name="city">
                        <p class="text-danger" id="city_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Phone</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="phone" name="phone">
                        <p class="text-danger" id="phone_err"></p>
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
                    <input type="file" class="form-control" id="image" name="image">
                        <p class="text-danger" id="image_err"></p>
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