<div class="card">
    <div class="card-body">
        <h3>Personal Details <b><?php echo $object['name']; ?></h3>
        <hr>

        <form class="forms-sample" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputUsername1">Name</label>
                <input type="text" value="<?php echo $object['name']; ?>" name="name" class="form-control" id="exampleInputUsername1" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" value="<?php echo $object['email']; ?>" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="tel" name="phone" value="<?php echo $object['phone'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Country</label>
                <select name="country" id="" class="form-control">
                    <?php echo $country_list; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">KYC Status</label>
                <select name="kyc_status" id="" class="form-control">
                    <option value="rejected" <?php echo  set_select("kyc_status", 'rejected', $object['kyc_status']); ?>>Rejected</option>
                    <option value="approved" <?php echo set_select("kyc_status", 'approved', $object['kyc_status']);  ?>>Approved</option>
                    <option value="pending" <?php echo  set_select("kyc_status", 'pending', $object['kyc_status']); ?>>Pending</option>
                    <option value="submitted" <?php echo  set_select("kyc_status", 'submitted', $object['kyc_status']); ?>>Submitted</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Identify Photo</label>
                <div style="width:150px;">
                    <img src="<?php echo $base_site_url . $object['image'] ?>" style="width:100%" alt="">
                </div>
            </div>


            <button type="submit" name="p_info" class="btn btn-primary mr-2">Update Information</button>
            <a href="<?php echo base_url("/users/"); ?>"><button type="button" class="btn btn-light">Cancel</button></a>
        </form>
        <hr>
        <h3>Wallet Details <b><?php echo $object['name']; ?></h3><br>
        <form class="forms-sample" action="" method="POST">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">BTC</span>
                    </div>
                    <input type="text" value="<?php echo $object['wallet']['btc'] ?>" name="btc" class="form-control" >
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ETH</span>
                    </div>
                    <input type="text" value="<?php echo $object['wallet']['eth'] ?>" name="eth" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">USD</span>
                    </div>
                    <input type="text" value="<?php echo $object['wallet']['usd'] ?>" name="usd" class="form-control" >
                </div>
            </div>
            <button type="submit" name="w_info" class="btn btn-primary mr-2">Update Information</button>
            <a href="<?php echo base_url("/users/"); ?>"><button type="button" class="btn btn-light">Cancel</button></a>
            <hr>
            <h3>BTC Addresses Created</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                QRCODE IMAGE
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Amount Received
                            </th>
                            <th>
                                Balance
                            </th>
                            <th>
                                Date Created
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($object['btc_address_list'] as $data) : ?>
                            <tr>
                                <td class="py-1">
                                    <img src="<?php echo $base_site_url . '81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/' . $data['barcode_path']; ?>" alt="image" />
                                </td>
                                <td>
                                    <a href=""><?php echo $data['address'] ?></a>
                                </td>
                                <td>
                                    <?php echo round($data['amount_received'], 8) ?>
                                </td>
                                <td>
                                    <?php echo round($data['balance'], 8) ?>
                                </td>
                                <td>
                                    <?php echo $data['date'] ?>
                                </td>
                                <td>
             <a href="<?php echo base_url("users/$object[id]/btc/address/$data[address]"); ?>/">
                                        <button type="button" class="btn btn-success">Edit</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <hr>
            <h3>ETHEREUM Addresses Created</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                QRCODE IMAGE
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Amount Received
                            </th>
                            <th>
                                Balance
                            </th>
                            <th>
                                Date Created
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($object['eth_address_list'] as $data) : ?>
                            <tr>
                                <td class="py-1">
                                    <img src="<?php echo $base_site_url . '81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/' . $data['barcode_path']; ?>" alt="image" />
                                </td>
                                <td>
                                    <a href=""><?php echo $data['address'] ?></a>
                                </td>
                                <td>
                                    <?php echo round($data['amount_received'], 8) ?>
                                </td>
                                <td>
                                    <?php echo round($data['balance'], 8) ?>
                                </td>
                                <td>
                                    <?php echo $data['date'] ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url("users/$object[id]/eth/address/$data[address]"); ?>/">
                                        <button type="button" class="btn btn-success">Edit</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </form>
        <hr>
    </div>
</div>