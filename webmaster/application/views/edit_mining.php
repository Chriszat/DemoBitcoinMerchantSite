<div class="card">
    <div class="card-body">
        <h3>Edit Mining Investment</h3>
        <hr>
        <?php if (isset($updated)) : ?>
            <div class="alert alert-success">Updated Successfully</div>
        <?php endif; ?>
        <form class="forms-sample" action="" method="POST">
            <div class="form-group">
                <label for="mining_plans_id">Mining Plans</label>
                <select name="mining_plans_id" id="mining_plans_id" class="form-control">
                    <option value="1"  <?php if(set_value('mining_plans_id') == '1'): echo "selected='selected'"; endif; ?>>Gold</option>
                    <option value="2" <?php if(set_value('mining_plans_id') == '2'): echo "selected='selected'"; endif; ?>>Premium</option>
                    <option value="3" <?php if(set_value('mining_plans_id') == '3'): echo "selected='selected'"; endif; ?>>Starter </option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="running"  <?php if(set_value('status') == 'running'): echo "selected='selected'"; endif; ?>>Running</option>
                    <option value="completed"   <?php if(set_value('status') == 'completed'): echo "selected='selected'"; endif; ?>>Completed</option>
                    <!-- <option value="paused">Paused </option> -->
                </select>
            </div>

            <div class="form-group">
                <label for="btc_balance">Hours Mined</label>
                <input type="text" name="time_mined" value="<?php echo set_value("time_mined") ?>" class="form-control" id="time_mined">
            </div>

            <div class="form-group">
                <label for="btc_mined">BTC Mined</label>
                <input type="text" name="btc_mined" value="<?php echo set_value("btc_mined") ?>" class="form-control" id="btc_mined">
            </div>




            <button type="submit" class="btn btn-primary mr-2">Update Balance</button>

        </form>
        <hr>
    </div>
</div>