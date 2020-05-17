<div class="card">
    <div class="card-body">
        <h4 class="card-title">Users on the platform</h4>
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
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>
                            Fullname
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Date Registered
                        </th>
                        <th>
                            Last Login
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($object_list as $data) : ?>
                        <tr>
                            <td class="py-1">
                                <img src="../../<?php echo $data['image'] ?>" alt="image" />
                            </td>
                            <td>
                                <?php echo ucwords($data['name']); ?>
                            </td>
                            <td>
                                <?php echo $data['email']; ?>
                            </td>
                            <td>
                                <?php echo $data['created']; ?>
                            </td>
                            <td>
                                <?php echo $data['last_login']; ?>
                            </td>
                            <td>


                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                                        <a class="dropdown-item" href="<?php echo base_url("/users/$data[id]/"); ?>">User Details</a>
                                        <a class="dropdown-item" href="<?php echo base_url("/users/$data[id]/mining/"); ?>">Mining Investments</a>
                                        <a class="dropdown-item" href="<?php echo base_url("/users/$data[id]/delete/"); ?>">Delete</a>
                                        <a class="dropdown-item" target="_blank" href='<?php echo base_url("/users/$data[id]/login/"); ?>'>Login Account</a>
                                        <?php if ($settings["confirm_accounts"] == 1) : ?>
                                            <?php if ($data["confirmed"] == 1) : ?>
                                                <a class="dropdown-item" onclick="alreadyConfirmed()" style="cursor:pointer; opacity:0.3"><i class="ti-check"></i> Already Confirmed</a>
                                            <?php else : ?>
                                                <a class="dropdown-item" onclick="confirmUserAccount('<?php echo base_url('/users/' . $data['id'] . '/confirm/'); ?>')" style="cursor:pointer">Confirm Account</a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a class="dropdown-item" onclick="showErrorConfirmation()" style="cursor:pointer; opacity:0.3">Confirm Account</a>
                                        <?php endif; ?>
                                        <?php if($data["account_status"] == "active"): ?>
                                        <a class="dropdown-item" href='<?php echo base_url("/users/$data[id]/block/"); ?>'>Block Account</a>
                                        <?php else: ?>
                                            
                                        <a class="dropdown-item" href='<?php echo base_url("/users/$data[id]/unblock/"); ?>'>Unblock Account</a>
                                        <?php endif; ?>
                                        <a class="dropdown-item"  href='<?php echo base_url("/users/$data[id]/referals/"); ?>'>Referals</a>
                                        <a class="dropdown-item" href='<?php echo base_url("/users/$data[id]/update-wallet/"); ?>'>Update Wallet Balance</a>
                                        <a class="dropdown-item" href='<?php echo  base_url("/users/$data[id]/kyc/") ?>'>View KYC Document</a>
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