
<link rel="stylesheet" href="application/shared/css/cards.css" >
<div class="container" style="user-select:none">
<?php //print_r($data) ?>
            <div class="" style="margin:0 auto; width:700px; max-width:100%">
    <div class="">
       
        <div class="card">
            <div class="card-content">
                <div class="head-content" >
                    <div class="center" >
                        <br>
                        <p style="font-size:20px; font-family: 'Open Sans', sans-serif;"><b>Buy <?php echo $data["crypto"] ?></b></p>
                        <p style="font-size:16px; font-family: 'Open Sans', sans-serif;">How much would you like to buy?</p>

                    </div>
                </div>
               <br>
                <div class="card-body" style="user-select:none;padding:10px" id="bt">
                   <div class="btc-content" style="margin:0 auto; width:400px; max-width:100%">
                   <form id="Btc_form">
                   <div class="row">
                          <div class="col-md-4">
                          <button class="btn" style="width:100%; color:red" disabled><?php echo $data['type'] ?></button>
                             
                          </div>
                          <div class="col-md-8">
                            <fieldset class="form-label-group">
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount*"  required="" autofocus="">
                                <label for="amount">Amount*</label>
                            </fieldset>
                          </div>
                      </div>
                   </form>
                      <br><br>
                      <div>
                      <span><b>Available</b></span>   <span class="float-right"><a href=""><?php echo $data['type'] ?> <?php echo $data['balance'] ?></span></a>
                    </div><br><br><br>
                    <div class="text-center"><button class="btn" style="width:250px; max-width:100%" id="check_on">Next</button><br><br>
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
<div class="text-center"><button  class="btn" id="back_btn" style="background:#eb3b5a"><span class="fa fa-arrow-left"></span> &nbsp;Back</button></div>