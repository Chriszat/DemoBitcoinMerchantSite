<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <h4 class="card-title">Confirm Delete Action</h4>
        <p class="card-text">
            <b>Do you really want to delete this question?</b>
        </p>
        <hr>
        <form action="" method="POST">
        <button class="btn btn-danger" type="submit">Yes Delete</button>
        <button class="btn btn-default" type="button">Cancel</button>
        </form>
        
        <hr>
        <details>
            <summary>Question Details:</summary>
            <br>
            <p><b>Question</b></p>
            <p><i><?php echo $question_details['question'] ?></i> </p>
            <section>
            <p><b>Answer:</b></p>
                <?php echo $question_details['answer']; ?>
            </section>
        </details>
    </div>
</div>