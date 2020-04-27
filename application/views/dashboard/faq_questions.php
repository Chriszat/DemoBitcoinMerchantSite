<?php $i=0; foreach ($object_list as $data) : $i++; ?>
    <div class="card">
        <div class="card-header" id="heading11">
            <a class="card-title lead collapsed" data-toggle="collapse" data-target="#collapse<?php echo $data['id'] ?>" aria-expanded="false" aria-controls="collapse11" href="#"><?php echo $data['question']; ?></a>
        </div>
        <div id="collapse<?php echo $data['id'] ?>" class="collapse <?php if($i==1): echo 'show'; endif; ?>" aria-labelledby="heading11" data-parent="#accordion">
            <div class="card-body">
            <?php echo $data['answer']; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>