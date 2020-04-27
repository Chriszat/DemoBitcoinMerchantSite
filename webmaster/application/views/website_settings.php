<div class="page-container">
    <div class="main-content" style="padding-top:30px!important">
    <?php if (isset($updated)) : ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
               Updated Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (isset($image_error)) : ?>
            <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Error</span>
              Error in image's selected. <b>Must be a valid image type</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        
        <div class="col-lg-12">
            <?php echo form_open_multipart('/settings/website-settings/'); ?>
            <div class="card">
                <div class="card-header">
                    <strong>Website Settings</strong>
                </div>
              
                <div class="card-body card-block">

                <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_about_us" class=" form-control-label">Confirm Accounts Manually</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="checkbox" name="confirm_accounts" value="1" <?php if(set_value("confirm_accounts") == 1){ echo "checked='checked'";} ?>><br>
                            <small>If you check this, it means when users register, you would have to confirm their account manually in order for them to have access</small>
                        </div>
                        
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="show_mining_price" class=" form-control-label">Show Mining Plans Prices</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="checkbox" name="show_mining_price" value="1" <?php if(set_value("show_mining_price") == 1){ echo "checked='checked'";} ?>><br>
                           
                        </div>
                        
                    </div>
                    

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_about_us" class=" form-control-label">About Us</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="about_us" class="form-control" id="" cols="30" rows="10"><?php echo set_value("about_us"); ?></textarea>
                            <?php echo form_error("about_us"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_phone" class=" form-control-label">Phone</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_phone" value="<?php echo set_value("phone"); ?>" name="phone" class="form-control">
                            <?php echo form_error("phone"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_email" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_email" value="<?php echo set_value("email"); ?>" name="email" class="form-control">
                            <?php echo form_error("email"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_facebook" class=" form-control-label">Facebook</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_facebook" value="<?php echo set_value("facebook"); ?>" name="facebook" class="form-control">
                            <?php echo form_error("facebook"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_instagram" class=" form-control-label">Instagram</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_instagram" value="<?php echo set_value("instagram"); ?>" name="instagram" class="form-control">
                            <?php echo form_error("instagram"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_website" class=" form-control-label">Website</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_website" value="<?php echo set_value("website"); ?>" name="website" class="form-control">
                            <?php echo form_error("website"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_linkedin" class=" form-control-label">Linkedin</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_linkedin" value="<?php echo set_value("linkedin"); ?>" name="linkedin" class="form-control">
                            <?php echo form_error("linkedin"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_opening_hours" class=" form-control-label">Opening Hours</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_opening_hours" value="<?php echo set_value("opening_hours"); ?>" name="opening_hours" class="form-control">
                            <?php echo form_error("opening_hours"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_website_title" class=" form-control-label">Website Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_website_title" value="<?php echo set_value("website_title"); ?>" name="website_title" class="form-control">
                            <?php echo form_error("website_title"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_sitename" class=" form-control-label">Website Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_sitename" value="<?php echo set_value("sitename"); ?>" name="sitename" class="form-control">
                            <?php echo form_error("sitename"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_website_description" class=" form-control-label">Website Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="website_description" class="form-control"  id="id_website_description" cols="30" rows="10"><?php echo set_value("website_description"); ?></textarea>
                            <?php echo form_error("website_description"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_website_keywords" class=" form-control-label">Website Keywords</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_website_keywords" value="<?php echo set_value("website_keywords"); ?>" name="website_keywords" class="form-control">
                            <?php echo form_error("website_keywords"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_web_logo" class=" form-control-label">Website Logo</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="file" name="logo">
                            <?php echo form_error("logo"); ?>
                        </div>
                    </div>
                    <b>Current Logo</b>
                    <a class="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('/uploads/'); ?><?php echo set_value('logo'); ?>" alt="logo"></a>
<hr>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_mini_logo" class=" form-control-label">Website Logo (Small)</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="file" name="mini_logo">
                            <?php echo form_error("mini_logo"); ?>
                        </div>
                    </div>

                    <b>Current Small Logo</b>
                    <a class="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('/uploads/'); ?><?php echo set_value('mini_logo'); ?>" alt="logo"></a>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-dot-circle-o"></i> Update Settings
                    </button>
                
                </div>
            </div>
            </form>
        </div>
    </div>