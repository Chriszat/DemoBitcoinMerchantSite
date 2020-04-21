<?php //print_r($data);?>

<link rel="stylesheet" href="application/shared/css/cards.css" >
<div class="container" style="user-select:none" id="view">

            <div class="" >
                
    <div class="" >
       
        <div class="card"  style="border-radius:0; text-align:center">
            <div class="card-content">
                <div class="head-content" >
                    <div class="lev-1" style="padding:20px">
                    
                    <span style="font-size:25px; color:black"><b>USD <?php echo number_format($data["usd"], 2) ?></b></span>
                    <div style="width:50px; height:50px; margin:0 auto">
                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/usd.jpg" style="width:100%">
                    </div>
                    
                    </div>
                   
                </div>
                <div >
                    <button class="btn " style="background:#bdc3c7; color:#fff;" id="wallet">WALLET</button>
                    <button class="btn" style="background:#2c3e50; color:#fff; " id="trans">TRANSACTIONS</button>
                    <button class="btn" style="background:#2c3e50; color:#fff; " id="address">WITHDRAW</button>
                </div>
                
                <div class="card-body" style="user-select:none;" id="tab_view" >
                    
                </div>
            </div>
            
        </div>
    </div>
              


</div>

<div class="text-center">
<a href="wallet/accounts/"><button class="btn" style="background:#e74c3c"><span class="fa fa-arrow-left"></span> Back</button></a>
        </div>
