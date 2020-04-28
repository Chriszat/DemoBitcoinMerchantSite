<div class="card">
    <div class="card-body">
        <?php if (isset($updated)) : ?>
            <div class="alert alert-success">Updated successfully</div>
        <?php endif; ?>

        <br>
        <h3>Update Wallet Balance</h3>
        <hr>

        <form class="forms-sample" action="" method="POST">
            <div class="form-group">
                <label for="btc">BTC Wallet</label>
                <input type="text" value="<?php echo $object['btc']; ?>" id="btc" name="btc" class="form-control">
            </div>

            <div class="form-group">
                <label for="eth">ETH Wallet</label>
                <input type="text" value="<?php echo $object['eth']; ?>" id="eth" name="eth" class="form-control">
            </div>

            <div class="form-group">
                <label for="usd">USD Wallet</label>
                <input type="text" value="<?php echo $object['usd']; ?>" id="usd" name="usd" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary mr-2">Update Information</button>

        </form>

    </div>
</div>