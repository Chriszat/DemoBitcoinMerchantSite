<a href="create-topic/">
    <button class="btn btn-info">Create New Topic</button>
</a>

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
                    <th>People Refered</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($object_list as $data) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo base_url('/users/' . $data["info"]["id"] . "/"); ?>"><?php echo ucwords($data["info"]["name"]); ?>&nbsp;<?php echo ucwords($data["info"]["email"]); ?></a>
                        </td>
                        <td><?php echo $data["date"]; ?></td>
                        <td>
                            <a href="<?php echo base_url('users/' . $data['user_by'] . '/referals/'.$data['id'].'/delete/'); ?>">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>