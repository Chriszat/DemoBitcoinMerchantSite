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
                            <p style="font-size:20px; font-family: 'Open Sans', sans-serif;"><b>Configuration </b></p>
                          
                        </div>
                    </div>
                    <br>
                    <form id="32f059f2d62f9935792445f3066e9176">
                        <div class="card-body" style="user-select:none;padding:10px" id="bt">
                            <div class="btc-content" style="margin:0 auto; width:400px; max-width:100%">


                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="btc_address">Bitcoin Recieving Address <i class="text-danger">*</i></label> <a href="wallet/accounts/btc/?tab=address">Your BTC Address</a>
                                        <fieldset class="form-label-group">

                                            <select name="btc_address" required id="btc_address" class="form-control">
                                                <option value="" disabled selected>Choose</option>
                                                <?php foreach ($data["btc_addresses"] as $address) : ?>
                                                    <option value="<?php echo $address['address']; ?>" <?php if($data['mining_info']['btc_address_id'] == $address['address']): echo "selected"; endif; ?>><?php echo $address['address']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small>This will be the address your bitcoin will be mined to</small>

                                        </fieldset>

                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <label for="btc_address">Hash Rate <i class="text-danger">*</i></label>
                                        <fieldset class="form-label-group">
                                            <select name="" id="" class="form-control" disabled>
                                                <option value="5">5H/s</option>
                                                <option value="10">10H/s</option>
                                                <option value="15" selected>15H/s</option>
                                            </select>
                                            <small>Default mining hash is <b>15H/s</b>. You cant edit this.</small>

                                        </fieldset>
                                    </div>
                                    <br>
                                </div>
                                <br><br>
                                <div>
                                    <p><b>Your BTC Recieving Address cant be changed once set</b></p>
                                </div><br>
                                <?php if($data['mining_info']['btc_address_id'] == ""): ?>
                                <div class="text-center"><button id="68e9688ad3f2cfcf74ef8d29bcb92c2b" class="btn" style="width:250px; max-width:100%" id="check_on">Save Configurations</button>
                                <br><br>
                                </div>
                                <?php endif; ?>

                            </div>


                        </div>
                    </form>
                </div>
                <div id="overlay"></div>
                <?php if($data['mining_info']['btc_address_id'] != ""): ?>
                <div style="background: #fff; opacity:0.8; top:0; left:0; position:absolute; width:100%; height:100%;">
                
                <span style="font-size:20px; color:red; position:absolute; top:50%; left:50%; transform:translate(-50%, -50%)">Not Editable</span>
                </div>
                <?php endif; ?>
            </div>
        </div>


    </div>


</div>
</div>
</div>
</div>
</div><br>

<div class="text-center"><a href="wallet/mining/"><button class="btn" id="back_btn" style="background:#eb3b5a"><span class="fa fa-arrow-left"></span> &nbsp;Back</button></a></div>
