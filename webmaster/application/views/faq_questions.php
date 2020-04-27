<h4>Topic Name: <?php echo $topic_details['topic']; ?></h4><hr>
<a href="add/">
<button class="btn btn-success">Add New Question </button>
</a>
<hr>
<?php $i=0; foreach($object_list as $data): $i++;?>
<div style="display:flex; justify-content:space-between">
<h3>Question <?php echo $i; ?></h3>
<div>
    <a href="<?php echo $data['id']; ?>/delete/"><button class="btn btn-danger">Delete</button></a>
    <button class="btn btn-success">Edit</button>
</div>
</div>
<hr>
    <div class="card" style="max-height:400px; overflow:auto; margin-bottom:50px;">
        <div class="card-body">
            <p><b>Question</b></p>
            <p><i><?php echo $data['question'] ?></i> </p>

            <p><b>Answer:</b></p>
            <section>
                <?php echo $data['answer']; ?>
            </section>
        </div>
    </div>
<?php endforeach; ?>