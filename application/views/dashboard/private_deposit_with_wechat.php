<div class="card">
    <div class="card-content">
        <div class="head-content">
            <div class="center" style="padding:20px;">
            <div style="width:150px; max-width:100%; margin: 0 auto">
            <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/wechat-pay-logo.png" style="width:100%" draggable="false">
        </div>
                <span style="color:green; font-size:15px">
                    We will send details on how to pay with WeChat to your provided email
                </span>
            </div>
        </div>

      

        <form id="payment-form" style="margin-left:20px; margin-right:20px;">
            <div class="form-group">
                <label for="amount">AMOUNT TO DEPOSIT</label>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" required autofocus />

            </div>
            <input type="hidden" name="type" value="<?php echo $data['deposit_type'] ?>">
            <div class="form-group">
                <label for="cardNumber">EMAIL TO RECEIVE PAYMENT DETAILS</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>" name="email" placeholder="Email" required autofocus />
            </div>

            <button class="btn text-white" style="background:green" ><i class="fa fa-send"></i> Send Me Payment Details</button>
        </form>
        <br><br>
        <div align="center">



            <hr>
            <h3>Already payed via WeChat? Upload Verification</h3>
            <?php
            include("fragments/upload_deposit_proof_dialog.php");
            ?>
        </div>
    </div>
    <div id="overlay"></div>
    <br><br>
</div>
<div class="text-center"><button class="btn" style="background:#e74c3c" id="back_btn"><i class="fa fa-arrow-left"></i> Cancel</button></div>