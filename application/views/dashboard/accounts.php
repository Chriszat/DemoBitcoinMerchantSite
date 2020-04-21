
<link rel="stylesheet" href="application/shared/css/cards.css" >
<div class="container" style="user-select:none">

            <div class="row match-height">
    <div class="col-xl-6 col-lg-12">
       
        <div class="card">
            <div class="card-content">
                <div class="head-content" >
                    <div class="lev-1" style="padding:20px">
                    <span style="font-size:19px"><b>BTC WALLET</b></span>
                    <div style="width:50px; height:50px; float:right">
                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/XBT.png" style="width:100%">
                    </div>
                    </div>
                </div>
                <div class="card-body" style="user-select:none">
                    <span class="card-text">Balance</span><br>
                    <a href="wallet/accounts/btc/" class="card-link">BTC <?php echo $data["btc"] ?></a><br><br>
                    <span class="card-text">Available</span><br>
                    <a href="wallet/accounts/btc/" class="card-link">BTC <?php echo $data["btc"] ?></a>
                </div>
            </div>
            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted" style="user-select:none">
                
                <span class="float-right">
                <a href="wallet/sell/?quote=b"><button class="btn">SELL</button></a>&nbsp;&nbsp;&nbsp;
                    <a href="wallet/buy/?quote=b"><button class="btn">BUY</button></a>
                  </span>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-12">
       
    <div class="card">
            <div class="card-content">
                <div class="head-content" >
                    <div class="lev-1" style="padding:20px">
                    <span style="font-size:19px"><b>ETH WALLET</b></span>
                    <div style="width:50px; height:50px; float:right">
                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/ETH.png" style="width:100%">
                    </div>
                    </div>
                </div>
                <div class="card-body" style="user-select:none">
                    <span class="card-text">Balance</span><br>
                    <a href="wallet/accounts/eth/" class="card-link">ETH <?php echo round($data["eth"], 8) ?></a><br><br>
                    <span class="card-text">Available</span><br>
                    <a href="wallet/accounts/eth/" class="card-link">ETH <?php echo round($data["eth"], 8) ?></a>
                </div>
            </div>
            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted" style="user-select:none">
               
                <span class="float-right">
                <a href="wallet/sell/?quote=e"><button class="btn">SELL</button></a>&nbsp;&nbsp;&nbsp;
                    <a href="wallet/buy/?quote=e"><button class="btn">BUY</button></a>
                  </span>
            </div>
        </div>
   </div>

   <div class="col-xl-6 col-lg-12">
       
   <div class="card">
            <div class="card-content">
                <div class="head-content" >
                    <div class="lev-1" style="padding:20px">
                    <span style="font-size:19px"><b>USD WALLET</b></span>
                    <div style="width:50px; height:50px; float:right">
                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/usd.jpg" style="width:100%">
                    </div>
                    </div>
                </div>
                <div class="card-body" style="user-select:none">
                    <span class="card-text">Balance</span><br>
                    <a href="wallet/accounts/usd/" class="card-link">USD <?php echo number_format($data["usd"], 2) ?></a><br><br>
                    <span class="card-text">Available</span><br>
                    <a href="wallet/accounts/usd/" class="card-link">USD <?php echo number_format($data["usd"], 2) ?></a>
                </div>
            </div>
            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted" style="user-select:none">
               
                <span class="float-right">
                    <button class="btn">WITHDRAW</button>&nbsp;&nbsp;&nbsp;
                    <a href="wallet/deposit/"><button class="btn">DEPOSIT</button></a>
                  </span>
            </div>
        </div>
   </div>



   




</div>


        </div>
    </div>
</div>
</div>
</div>
<div class="text-center">
<button class="btn" disabled>ADD WALLET</button>
</div>