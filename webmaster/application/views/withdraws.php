
<div class="card mt-5">
    <?php if (isset($created)) : ?>
        <div class="alert alert-success">Created Successfully</div>
    <?php endif; ?>
    <?php if (isset($deleted)) : ?>
        <div class="alert alert-success">Deleted Successfully</div>
    <?php endif; ?>
    <div class="card-content">

        <table class="table table-condensed w-100">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Account Name</th>
                    <th>Account No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($object_list as $data) : ?>
                    <tr>
                        <td><?php echo $data['user'] ?> <a href="<?php echo base_url('/users/'.$data['user'].'/'); ?>">View User</a></td>
                        <td>
                            <?php echo $data['account_name']; ?>
                        </td>
                        <td><?php echo $data['account_no']; ?></td>
                        <td><?php echo $data['amount']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                                    <a class="dropdown-item" href='<?php echo  base_url("/withdraws/".$data['id']."/edit/") ?>'>Edit</a>
                                    <a class="dropdown-item" href='<?php echo  base_url("/withdraws/".$data['id']."/delete/") ?>'>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>