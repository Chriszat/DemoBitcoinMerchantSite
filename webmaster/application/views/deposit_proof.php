<div class="card">
    <div class="card-body">
        <h4 class="card-title">Payment/Deposit Proof</h4>
        <p>This is a list of proff of deposit from users  </p>
        <?php if (isset($deleted)) : ?>
            <div class="alert alert-danger">Deleted Successfully</div>
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
                            Deposit
                        </th>
                        <th>
                            User ID
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Date Submitted
                        </th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($object_list as $data) : ?>
                        <tr>
                            <td >
                            <?php echo strtoupper($data['deposit_type']); ?>
                            </td>
                            <td>
                                <?php echo $data["user"]; ?> (<b><a href="<?php echo base_url('/users/'.$data['user'].'/'); ?>">View User</a></b>)
                            </td>
                            <td>
                               <a href="<?php echo $base_site_url.$data["image"] ?>" target="_blank">View Image</a>
                            </td>
                            <td>
                                <?php echo $data['date']; ?>
                            </td>
                           
                            <td>


                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                                    
                                        <a class="dropdown-item"  href='<?php echo base_url("/payments-proof/$data[id]/delete/"); ?>'>Delete</a>
                                        
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
