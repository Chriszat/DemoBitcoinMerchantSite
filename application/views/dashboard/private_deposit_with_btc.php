<div class="card">
    <div class="card-content">
        <div class="head-content">
            <div class="center" style="padding:20px;">
                <p style="font-size:20px; font-family: 'Open Sans', sans-serif;">
                    Deposit With BTC
                </p>
                <span style="color:green; font-size:20px">
                    Send your BTC to this address and upload a proof of payment, we will verify your payment in 1hr.
                </span>
            </div>
        </div>
        <div align="center">
            <div style="width:150px; max-width:100%; margin:0 auto">
                <img src="<?php echo $data['settings']['btc_qrcode']; ?>" style="width:100%">
            </div>


            <p style="text-align: center ; font-size:18px; padding-top:10px; color:black">
                Address: <br> <span style="color:green; font-weight:bold"><?php echo $data['settings']['btc_receiving_address']; ?></span>
            </p>

           <?php
           include("fragments/upload_deposit_proof_dialog.php");
           ?>
        </div>
    </div>
    <div id="overlay"></div>
    <br><br>
</div>
<div class="text-center"><button class="btn" style="background:#e74c3c" id="back_btn"><i class="fa fa-arrow-left"></i> Cancel</button></div>