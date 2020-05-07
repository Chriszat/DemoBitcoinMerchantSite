<div class="card">
    <div class="card-body">
        <?php if (isset($updated)) : ?>
            <div class="alert alert-success">Updated successfully</div>
        <?php endif; ?>

        <br>
        <h3>Edit Cash Withdraw Request</h3>
        <hr>

        <form class="forms-sample" action="" method="POST">
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text"  value="<?php echo set_value("amount") ?>" id="amount" name="amount" class="form-control">
            </div>

            <div class="form-group">
                <label for="Amount">BTC Address</label>
                <input type="text" value="<?php echo set_value("address"); ?>" id="Amount" name="address" class="form-control">
            </div>


            <div class="form-group">
                <label for="usd">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="approved" <?php if(set_value("status") == "approved"): echo "selected='selected'"; endif; ?>>Approved</option>
                    <option value="pending" <?php if(set_value("status") == "pending"): echo "selected='selected'"; endif; ?>>Pending</option>
                    <option value="rejected" <?php if(set_value("status") == "rejected"): echo "selected='selected'"; endif; ?>>Rejected</option>
                </select>
            </div>

           
            <br>
                <label for="">Add to user transaction</label>
                <input type="checkbox" name="add_transaction">
                <small style="color:red; display:block">checking this box will add this update to the user transaction. Dont check the box if you want to make a silent update</small><br>

            <button type="submit" class="btn btn-primary mr-2">Update Information</button>

        </form>

    </div>
</div>