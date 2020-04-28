<div class="card text-left">
    
    <div class="card-body">
        <h4 class="card-title">Confirm Delete Action</h4>
        <p class="card-text">
            <b>Do you really want to delete this user account?</b>
        </p>
        <hr>
        <form action="" method="POST">
        <button class="btn btn-danger" type="submit">Yes Delete</button>
        <button class="btn btn-default" type="button">Cancel</button>
        </form>
        
        <hr>
        <details>
            <summary>User Details:</summary>
            <br>
            <p><b>Email</b></p>
            <p><i><?php echo $user_details['email'] ?></i> </p>
            <section>
            <p><b>Image:</b></p>
                <div style="width:100px;">
                    <img src="<?php echo $base_site_url.$user_details['image']; ?>" alt="" style="width:100%">
                </div>
            </section>
        </details>
    </div>
</div>