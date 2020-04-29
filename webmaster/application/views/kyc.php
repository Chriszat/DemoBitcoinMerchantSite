<div class="card">
    <div class="card-body">
        <h4 class="card-title">KYC DOCUMENT</h4>
        
  <?php  if(!empty($object)): ?>
    <img src="<?php echo $base_site_url.'uploads/'.$object['doc'] ?>" alt="">
    <hr>
    <form action="" method="POST">
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  <?php else: ?> 
    <p><b>No KYC Document exists for this user</b></p>
  <?php endif; ?>
    </div>
</div>
