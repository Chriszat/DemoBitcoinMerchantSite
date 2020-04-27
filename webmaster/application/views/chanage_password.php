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

        <div class="col-lg-12">
            <?php echo form_open(); ?>
            <div class="card">
                <div class="card-header">
                    <strong>Change Login Settings</strong>
                </div>

                <div class="card-body card-block">
<div class="alert alert-info">
    Leave the password field blank if you dont want to change it.
</div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_username" class=" form-control-label">Username</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_username" value="<?php echo set_value('username'); ?>" name="username" class="form-control">
                            <?php echo form_error("username"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_old_password" class=" form-control-label">Old Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_old_password" name="old_password" class="form-control">
                            <?php echo form_error("old_password"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_new_password" class=" form-control-label">New Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_new_password" name="new_password" class="form-control">
                            <?php echo form_error("new_password"); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_confirm_new_password" class=" form-control-label">Confirm New Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_confirm_new_password" name="confirm_new_password" class="form-control">
                            <?php echo form_error("confirm_new_password"); ?>
                        </div>
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-dot-circle-o"></i> Update Password
                    </button>

                </div>
            </div>
            </form>
        </div>
    </div>