    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            if($News === null)
            {
                echo '<p class="text-danger">Sorry!, no details found</p>';
            }
            else
            {
                $sts = $News->status;
                echo form_open('Admin/News/update_News', 'id="doAction" class="m-t" role="form"');
                echo '<input type="hidden" name="news_id" value="'.$News->news_id.'">';
                echo '<input type="hidden" name="NewsPic" value="'.$News->NewsPic.'">';
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
                        <input type="file" class="form-control" style="width:50%;display:inline-block" id="image" name="image">
                        <img src="'.base_url($Customer->image).'" alt="Customer image" width="100 px" />
                        <p class="text-danger" id="image_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Status</label>
                    <div class="col-lg-8">
                            <select class="form-control" name="status">';
                            if($sts){
                                echo '<option value="1" selected="selected">Active</option>';
                                echo '<option value="0">In-Active</option>';
                            }
                            else
                            {
                                echo '<option value="0" selected="selected">In-Active</option>';
                                echo '<option value="1">Active</option>';
                            }
                            echo '<option value="delete">Delete</option>
                            </select> 
                        <p class="text-danger" id="status_err"></p>
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
            }
        ?>
        </div>
    </div>