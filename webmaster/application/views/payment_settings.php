<div class="card">
    <div class="card-body">
    <?php if(isset($updated_type)): ?>
                    <div class="alert alert-success">Updated successfully</div>
                <?php endif; ?>
        <h3>BTC Payment Settings</h3>
        <hr>

        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputUsername1">BTC Receiving Address</label>
                <input type="text" value="<?php echo $settings['btc_receiving_address']; ?>" name="btc_receiving_address" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">BTC QRCODE</label>
                <div style="width:150px;">
                    <img src="<?php echo $base_site_url . $settings['btc_qrcode']; ?>" alt="" style="width:100%">
                </div>
                <input type="file" name="btc_qrcode">
                <?php if(isset($image_error)): ?>
                    <div class="alert alert-danger">Unsupported file upload</div>
                <?php endif; ?>
            </div>

            <button type="submit" name="btc_info" class="btn btn-primary mr-2">Update Information</button>

        </form>
        <br>
        <h3>PayPal Payment Settings</h3>
        <hr>

        <form class="forms-sample" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputUsername1">Paypal Payment Button Code</label>
                <textarea name="paypal_code" cols="30" rows="10" class="form-control"><?php echo $settings['paypal_code']; ?></textarea>
            </div>


            <button type="submit" name="paypal_info" class="btn btn-primary mr-2">Update Information</button>

        </form>

        <br>
        <h3>CashApp Payment Settings</h3>
        <hr>

        <form class="forms-sample" action="" method="POST">
        <div class="form-group">
                <label for="exampleInputUsername1">CashTag ID</label>
                <input type="text" value="<?php echo $settings['cashapp_tag']; ?>" name="cashapp_tag" class="form-control"  >
            </div>


            <button type="submit" name="cashapp_info" class="btn btn-primary mr-2">Update Information</button>

        </form>

    </div>
</div>