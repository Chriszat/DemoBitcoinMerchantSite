<div class="card">
    <div class="card-body">
       <h3><?php echo $type; ?> Address</h3>
        <hr>
<?php if(isset($updated)): ?>
    <div class="alert alert-success">Updated Successfully</div>
<?php endif; ?>
        <form class="forms-sample" action="" method="POST">
            <div class="form-group">
                <label for="btc_address">Address</label>
                <input type="text" value="<?php echo $object['address']; ?>" class="form-control" disabled id="btc_address">
            </div>
      
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">QRCODE</label>
                <div style="width:200px;">
                    <img src="<?php echo $base_site_url . '81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/' . $object['barcode_path']; ?>" style="width:100%" alt="">
                </div>
            </div>

            <div class="form-group">
                <label for="btc_balance">Balance</label>
                <input type="text" name="balance" value="<?php echo $object['balance']; ?>" class="form-control"  id="btc_balance">
            </div>


            <div class="form-group">
                <label for="amount_received">Amount Received</label>
                <input type="text" name="amount_received" value="<?php echo $object['amount_received']; ?>" class="form-control"  id="amount_received">
            </div>
      


            <button type="submit" class="btn btn-primary mr-2">Update Balance</button>
            
        </form>
        <hr>
    </div>
</div>
