    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/News/save_news', 'id="doAction" class="m-t" role="form"');
            echo '<div class="form-group row"><div class="col-sm-4"></div>
                    <div class="col-sm-8"><p class="text-navy m-b-none"><span class="text-danger font-bold">*</span> Image size should be max 500kb.</p>
                        <p class="text-navy"><span class="text-danger font-bold">*</span> Image dimension must be exactly 1350 x 500 in px</p></div></div>';
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">News Title</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="nTitle" name="nTitle">
                        <p class="text-danger" id="nTitle_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">News Description</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="n_des" name="n_des">
                        <p class="text-danger" id="n_des_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Image</label>
                    <div class="col-lg-8">
                    <input type="file" class="form-control" id="NewsPic" name="NewsPic">
                        <p class="text-danger" id="NewsPic_err"></p>
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