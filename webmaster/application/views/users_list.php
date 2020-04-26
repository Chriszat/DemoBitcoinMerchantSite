<div class="card">
    <div class="card-body">
        <h4 class="card-title">Users on the platform</h4>
        
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
                    <?php foreach($object_list as $data): ?>
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
                            <a href="<?php echo base_url("/users/$data[id]/"); ?>">
                            <button class="btn btn-success">User Details</button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
