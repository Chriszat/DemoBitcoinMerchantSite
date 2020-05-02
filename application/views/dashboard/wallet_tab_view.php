
<?php
if($data["show"] == "btc"){
?>
<span class="card-text">Balance</span>
<span class="card-link" style="color:black; font-weight:bold">&nbsp;&nbsp;&nbsp;BTC <?php echo $data["btc"] ?></span><br><br>
<span class="card-text">Available</span>
<span class="card-link" style="color:black">&nbsp;&nbsp;&nbsp;BTC <?php echo $data["btc"] ?></span>
<br><br>

<p><a href='wallet/buy/?quote=b'><button class="btn" style="width:200px; max-width:100%">BUY BITCOIN</button></a></p>
<p><a href="wallet/sell/?quote=b"><button class="btn" style="background:#f7f1e3; color:black">SELL BITCOIN</button></a></p>
<p><a href="wallet/send/btc/"><button class="btn" style="background:#f7f1e3; color:black">SEND BITCOIN</button></a></p>

<?php } ?>

<?php
if($data["show"] == "eth"){
?>
<span class="card-text">Balance</span>
<span class="card-link" style="color:black; font-weight:bold">&nbsp;&nbsp;&nbsp;ETH <?php echo $data["eth"] ?></span><br><br>
<span class="card-text">Available</span>
<span class="card-link" style="color:black">&nbsp;&nbsp;&nbsp;ETH <?php echo $data["eth"] ?></span>
<br><br>

<p><a href='wallet/buy/?quote=e'><button class="btn" style="width:200px; max-width:100%">BUY ETHEREUM</button></a></p>
<p><a href="wallet/sell/?quote=e"><button class="btn" style="background:#f7f1e3; color:black">SELL ETHEREUM</button></a></p>
<p><a href="wallet/send/eth/"><button class="btn" style="background:#f7f1e3; color:black">SEND ETHEREUM</button></a></p>

<?php } ?>


<?php
if($data["show"] == "usd"){
?>

<span class="card-text">Balance</span>
<span class="card-link" style="color:black; font-weight:bold">&nbsp;&nbsp;&nbsp;USD <?php echo number_format($data["usd"], 2) ?></span><br><br>
<span class="card-text">Available</span>
<span class="card-link" style="color:black">&nbsp;&nbsp;&nbsp;USD <?php echo number_format($data["usd"], 2) ?></span>
<br><br>

<p>
    <a href="wallet/accounts/usd/deposit/"><button class="btn" style="width:200px; max-width:100%">DEPOSIT MONEY</button></a>
</p>

<p><button class="btn" style="background:#f7f1e3; color:black" id="withdraw_btn">WITHDRAW MONEY</button></p>
<p>
    <a href="wallet/accounts/usd/history/"><button class="btn" style="background:#f7f1e3; color:black">WITHDRAW HISTORY</button></a>
</p>
<?php } ?>