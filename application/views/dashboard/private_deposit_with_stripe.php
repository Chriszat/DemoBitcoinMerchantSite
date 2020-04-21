<br><br>
<div id="blog" class="section card">

    <div class="container ">

        <div class="row">
        
            <div class="container">
                <div class="" style="margin:0 auto; width:500px; max-width:100%; margin-top:40px">
                 
                    <div class="">


                        <!-- CREDIT CARD FORM STARTS HERE -->
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                            <div style="width:200px; margin:0 auto; max-width:100%">
                                        <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/stripe_secure.jpg" alt="" style="width:100%" draggable="false">
                                    </div>
                                <div class="row display-tr" style="margin:0 auto; width:200px; max-width:100%">

                                   
                                    <div class="display-td">
                                        <img class="img-responsive pull-right" draggable="false" src="http://i76.imgup.net/accepted_c22e0.png">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <form role="form" id="payment-form" method="POST" action="">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="amount">AMOUNT TO DEPOSIT</label>
                                                <input type="text" id="amount" class="form-control" placeholder="Amount" required autofocus />
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cardNumber">CARD NAME</label>
                                                <input type="text" class="form-control" name="card_name" placeholder="Card Name" required autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cardNumber">CARD NUMBER</label>
                                                <input type="tel" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-md-6" style="margin-bottom:30px;">
                                            <div class="form-group">
                                                <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                <input type="tel" class="form-control" name="expiration_date" placeholder="MM / YY" autocomplete="cc-exp" required />
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-md-6 pull-right" style="margin-bottom:30px;">
                                            <div class="form-group">
                                                <label for="cardCVC">CV CODE</label>
                                                <input type="tel" class="form-control" name="cv_code" placeholder="CVC" autocomplete="cc-csc" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">ADDRESS LINE</label>
                                                <div class="">
                                                    <input type="tel" class="form-control" name="address" id="address" placeholder="Address Line" autocomplete="address" required autofocus />

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-md-6 pull-right">
                                            <div class="form-group">
                                                <label for="city">CITY</label>
                                                <input type="text" class="form-control" name="city" placeholder="CITY" id="city" required />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <div class="form-group">
                                                <label for="state"><span class="hidden-xs">STATE/PROVICE</span></label>
                                                <input type="text" class="form-control" name="state" placeholder="STATE" autocomplete="state" required />
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col-xs-6 col-md-6 pull-right">
                                            <div class="form-group">
                                                <label for="country">COUNTRY</label>
                                                <div class="">
                                                    <select class="form-control" name="country" id="country">
                                                        <?php echo $data['countries']; ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <div class="form-group">
                                                <label for="zip_code"><span class="hidden-xs">ZIP CODE</span></label>
                                                <input type="text" class="form-control" name="zip_code" placeholder="ZIP CODE" autocomplete="" required />
                                            </div>
                                        </div>

                                    </div>



                                    <button class="subscribe btn btn-success btn-lg btn-block" type="submit" style="width:100%">
                                                Deposit <span id="amount_"></span>
                                            </button>
                                            <br><br>

                                    <div class="row" style="display:none;">
                                        <div class="col-xs-12">
                                            <p class="payment-errors"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- CREDIT CARD FORM ENDS HERE -->


                    </div>

                    <div style="width:200px; max-width:100%; margin:0 auto; margin-bottom:50px;">
                        <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/stripe-secure.png" draggable="false" alt="" style="width:100%">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="text-center"><button class="btn" style="background:#e74c3c" id="back_btn"><i class="fa fa-arrow-left"></i> Cancel</button></div>