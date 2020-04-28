<a href="create-topic/">
<button class="btn btn-info">Create New Topic</button>
</a>

<div class="card mt-5">
<?php print_r($object_list); if(isset($created)): ?>
    <div class="alert alert-success">Created Successfully</div>
<?php endif; ?>
<?php if(isset($deleted)): ?>
    <div class="alert alert-success">Deleted Successfully</div>
<?php endif; ?>
    <div class="card-content">
   
    <table class="table table-condensed w-100">
    <thead>
        <tr>
            <th>Topic</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($object_list as $data): ?>
        <tr>
            <td><?php echo ucwords($data['topic']); ?></td>
            <td>
            <a href="<?php echo base_url('faq/'.$data['id'].'/questions/'); ?>">
            <button class="btn btn-success">View Questions</button>
            </a>
            <a href="<?php echo base_url('faq/'.$data['id'].'/delete/'); ?>">
            <button class="btn btn-danger">Delete Topic</button>
            </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</div>