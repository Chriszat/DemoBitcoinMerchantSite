<link rel="stylesheet" href="application/shared/css/cards.css">
<div class="container" style="user-select:none">
    <?php //print_r($data) 
    ?>
    <div class="" style="margin:0 auto; width:700px; max-width:100%">
        <div class="" id="384004ddf67b7c514ca6275a741d29cb">

            <div class="card">
                <div class="card-content">
                    <div class="head-content">
                        <div class="center">
                            <br>
                            <p style="font-size:20px; font-family: 'Open Sans', sans-serif;"><b>Send </b></p>
                            <p style="font-size:16px; font-family: 'Open Sans', sans-serif;">How much would you like to buy?</p>

                        </div>
                    </div>
                    <br>
                    <div class="card-body" style="user-select:none;padding:10px" id="bt">
                        <div class="btc-content" style="margin:0 auto; width:400px; max-width:100%">
                            <form id="32f059f2d62f9935792445f3066e9176">

                                <div class="row">

                                    <div class="col-md-12">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" name="btc_address" id="btc_address" placeholder="Bitcoin Address" required="" autofocus="">
                                            <label for="btc_address">Bitcoin Address <i class="text-danger">*</i></label>
                                        </fieldset>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset class="form-label-group">
                                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" required="" autofocus="">
                                            <label for="amount">Amount <i class="text-danger">*</i></label>
                                        </fieldset>
                                    </div>
                                    <br><br><br><br>
                                    <div class="col-md-12">
                                        <label for="amount">Reference Note (optional)</label>
                                        <fieldset class="form-label-group">
                                            <textarea class="form-control" placeholder="What this transfer is for." name="note" id="" cols="30" rows="10"></textarea>

                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                            <div>
                                <span><b>Available</b></span> <span class="float-right"><a href="wallet/accounts/btc/">BTC <span id="918238279a7bdaac6a29fbb67f46b55e"><?php echo $data['btc_wallet'] ?></span></span></a>
                            </div><br><br><br>
                            <div class="text-center"><button id="68e9688ad3f2cfcf74ef8d29bcb92c2b" class="btn" style="width:250px; max-width:100%" id="check_on">Next</button><br><br>
                            </div>

                        </div>


                    </div>

                </div>
                <div id="overlay"></div>

            </div>
        </div>


    </div>


</div>
</div>
</div>
</div>
</div><br>
<div class="text-center"><a href="wallet/accounts/btc/"><button class="btn" id="back_btn" style="background:#eb3b5a"><span class="fa fa-arrow-left"></span> &nbsp;Back</button></a></div>
<script type="application/json" id="4ac174730d4143a119037d9fda81c7a9">
    {
        "btc_balance": "<?php echo $data['btc_wallet']; ?>"
    }
</script>


