<div class="card">
    <div class="card-body">
        <h4 class="card-title">Mining Investments</h4>
        <?php if (isset($deleted)) : ?>
            <div class="alert alert-danger">User account deleted</div>
        <?php endif; ?>
        <?php if (isset($confirmed)) : ?>
            <div class="alert alert-success">Account has been confirmed successfully</div>
        <?php endif; ?>
        <?php if (isset($blocked)) : ?>
            <div class="alert alert-success">Account has been blocked successfully</div>
        <?php endif; ?>
        <?php if (isset($unblocked)) : ?>
            <div class="alert alert-success">Account has been unblocked successfully</div>
        <?php endif; ?>
        <?php if(isset($email_res)): ?>
            <?php  if($email_res["status"] == "success"): ?>
                <div class="alert alert-success">Mining successfull email has been sent to client</div>
            <?php else: ?>
                <div class="alert alert-error">There seemed to be an error while sending mail to client</div>
            <?php endif; endif; ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Mining Status
                        </th>
                        <th>
                            Date Started
                        </th>
                        <th>
                            BTC Reward Address
                        </th>
                        <!-- <th>
                            Expected BTC Reward
                        </th> -->
                        <th>
                            Total BTC Mined
                        </th>

                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach ($object_list as $data) : ?>
                        <tr>

                            <td>
                                <?php echo ($data['status']); ?>
                            </td>
                            <td>
                                <?php echo $data['date_started']; ?>
                            </td>
                            <td>
                                <?php echo $data['btc_address_id']; ?>
                            </td>
                           
                            <td>
                                <?php echo $data['btc_mined']; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                                        <a class="dropdown-item" href="<?php echo base_url("/users/$data[users_id]/mining/$data[id]/"); ?>">Edit Mining</a>
                                        <a class="dropdown-item" href="<?php echo base_url("/users/$data[users_id]/mining/$data[id]/send-mail/"); ?>">Send Mining Completed Email</a>
                                       

                                    </div> 
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function showErrorConfirmation() {
        alert("Enable 'Confirm Accounts Manually' under website settings, inorder to confirm account");
    }

    function confirmUserAccount(url) {
        e = confirm("Do you really want to confirm user account?");
        if (e) {
            location.assign(url)
        }
    }

    function alreadyConfirmed() {
        alert("Account has already been confirmed");
    }
</script>