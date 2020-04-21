<?php
if ($data["show"] == "btc") {

?>
    <a href="javascript:void(0)" style="color:#fff!important" class="btn" onclick="add_bitcoin_address()" id="add_address"><b><span class="fa fa-plus"></span> <span>Add address</span></span></b></a>
    <br><br>
    <div style="height:300px; overflow-y:scroll">
        <div class="table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="color:black"><b>RECEIVE ADDRESS</b></th>

                        <th style="color:black"><b>AMOUNT RECEIVED</b></th>
                        <th style="color:black"><b>FINAL BALANCE</b></th>
                    </tr>
                </thead>
                <tbody id="address_table">
                    <?php
                    $address = $data["btc_address"];
                    foreach ($address as $data) {
                    ?>
                        <tr style="cursor:pointer" title="<?php echo $data["address"]; ?>" onclick="bitcoin_pan_view('<?php echo $data['id'] ?>')">
                            <td><span style='color:black; font-weight:bolder; cursor:pointer'><?php echo $data["address"]; ?></span><br><?php echo $data["label"]; ?></td>
                            <td style='color:green'>BTC <?php echo number_format($data['amount_received'], 8) ?></td>
                            <td>BTC <span id=""><?php echo number_format($data['balance'], 8) ?></span></td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
            <div>
            </div>

        </div>

    </div>
    <a href="javascript:void(0)" onclick="add_bitcoin_address()" id="add_address"><b><span class="fa fa-plus"></span> <span>Add address</span></span></b></a>
<?php } ?>


<?php
if (isset($data['show'])) {
    if ($data["show"] == "eth") {
?>
        <a href="javascript:void(0)" style="color:#fff!important" class="btn" onclick="add_bitcoin_address()" id="add_address"><b><span class="fa fa-plus"></span> <span>Add address</span></span></b></a>
        <br><br>
        <div class="table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="color:black"><b>RECEIVE ADDRESS</b></th>

                        <th style="color:black"><b>TOTAL RECEIVED</b></th>
                        <th style="color:black"><b>FINAL BALANCE</b></th>
                    </tr>
                </thead>
                <tbody id="address_table">
                    <?php
                    $address = $data["eth_address"];
                    foreach ($address as $data) {
                    ?>
                        <tr style="cursor:pointer" title="<?php echo $data["address"]; ?>" onclick="ethereum_pan_view('<?php echo $data['id'] ?>')">
                            <td><span style='color:black; font-weight:bolder; cursor:pointer'><?php echo $data["address"]; ?></span><br><?php echo $data["label"]; ?></td>
                            <td style='color:green'>ETH <?php echo number_format($data['amount_received'], 8) ?></td>
                            <td>ETH <?php echo number_format($data['balance'], 8) ?></td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
            <div>

            </div>

        </div>
        <a href="javascript:void(0)" onclick="add_bitcoin_address()" id="add_address"><b><span class="fa fa-plus"></span> <span>Add address</span></span></b></a>
<?php }
} ?>


<?php
if (isset($data['show'])) {
    if ($data["show"] == "usd") {
        
?>
        <div style="text-align:left">
            <div class="form-group">
                <label for="to" style="color:black">To:</label>
                <select class="form-control" id='to'>
                    <option>Diamond Bank x6699 via Bank Transfer</option>
                </select>
            </div>
            <br><br>
            <div class="form-group">
                <label for="amount" style="color:black">USD Amount:</label>
                <input class="form-control" id="amount">
            </div>

            <div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Your available balance:</td>
                            <td><span style="float:right; color:black;">USD <b><?php echo number_format($data['usd'], 2); ?></b></span></td>
                        </tr>
                        <tr>
                            <td>Withdrawal fee:</td>
                            <td><span style="float:right; color:black;">USD 2.00</span></td>
                        </tr>
                        <tr>
                            <td>Minimum withdrawal (including fee):</td>
                            <td><span style="float:right; color:black;">USD 30.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

<?php }
} ?>