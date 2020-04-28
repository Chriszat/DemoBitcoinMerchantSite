<div class="">
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BITSTAMP-BTCUSD/" rel="noopener" target="_blank"></div>
       
        <!-- ICO Token balance & sale progress -->
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h6 class="my-2">Bitcoin Wallet</h6>
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="">
                                            <div class="">
                                                <p><strong>Your balance:</strong></p>
                                                <div style="width:50px; height:50px; position:absolute; right:0; top:0">
                                                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/XBT.png" style="width:100%" draggable="false">
                                                </div>
                                                <h1><?php echo round($data['wallet']['btc'], 8) ?> BTC</h1>

                                            </div>
                                            <div class="">
                                                <a href="wallet/sell/?quote=b">
                                                    <button type="button" class="btn btn-warning round mr-1 mb-0">SELL</button>
                                                </a>

                                                <a href="wallet/buy/?quote=b">
                                                    <button type="button" class="btn btn-warning round mr-1 mb-0">BUY</button>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <h6 class="my-2">Ethereum Wallet</h6>
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="">
                                            <div class="">
                                                <p><strong>Your balance:</strong></p>
                                                <div style="width:50px; height:50px; position:absolute; right:0; top:0">
                                                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/ETH.png" style="width:100%" draggable="false">
                                                </div>
                                                <h1><?php echo round($data['wallet']['eth'], 8) ?> ETH</h1>

                                            </div>
                                            <div class="">
                                                <a href="wallet/sell/?quote=e">
                                                    <button type="button" style="background:#673fba!important" class="btn btn-warning round mr-1 mb-0 ">SELL</button>
                                                </a>
                                                <a href="wallet/buy/?quote=e">
                                                    <button type="button" style="background:#673fba!important" class="btn btn-warning round mr-1 mb-0">BUY</button>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- transactions -->

                <!-- Recent Transactions -->

                <div id="recent-transactions" class="">
                    <h6>Recent Transactions</h6>
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>

                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Transaction</th>
                                            <th class="border-top-0">Type</th>
                                            <th class="border-top-0">Amount</th>
                                            <th class="border-top-0">Currency</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['transactions_object_list'] as $transaction) : ?>
                                            <tr>
                                                <td class="text-truncate">

                                                    <?php echo date("d-m-Y", strtotime($transaction['date'])); ?>
                                                </td>
                                                <td class="text-truncate">
                                                    <?php echo $transaction['title']; ?>
                                                </td>
                                                <td class="text-truncate">
                                                    <?php echo $transaction['type']; ?>
                                                </td>
                                                <td class="text-truncate p-1">
                                                    $<?php echo number_format($transaction['amount'], 2); ?>
                                                </td>
                                                <td>

                                                    <?php
                                                    switch ($transaction['currency']):
                                                        case "USD":
                                                            echo "$ USD";
                                                            break;
                                                        case "BTC":
                                                            echo '<i class="cc ETH-alt"></i>BTC';
                                                            break;
                                                        case "ETH":
                                                            echo '<i class="cc ETH-alt"></i>ETH';
                                                            break;
                                                    endswitch;
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <br>
                        <a href="wallet/transactions/" class="w-100 btn" style="background:green; color:#fff; font-weight:600">
                            View All Transactions
                        </a>
                    </div>

                    <!--/ Recent Transactions -->
                </div>
            </div>


            <div class="col-md-4 col-12">
                <h6 class="my-2">KYC Verification</h6>
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <p><strong>Identity verification</strong></p>
                            <br>
                            <p>
                                Upload an identity document, for example, driver licence, voters card, international passport, national ID.


                            </p>
                            <div style="width:50px; height:50px; position:absolute; right:15px; top:15px">
                                <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/login.png" alt="" style="width:100%" draggable="false">
                            </div>
                            <br>
                            <div class="font-small-3 clearfix">
                                <?php if ($data['user_info']['kyc_status'] == 'pending') : ?>
                                    <a href="wallet/profile/kyc-verification/">
                                        <button style="background: green; color:#fff; padding:10px; border:1px solid #fff;  font-weight:900; outline:none; cursor:pointer; ">Upload KYC Documents</button>
                                    </a>
                                <?php elseif ($data['user_info']['kyc_status'] == 'submitted') : ?>
                                    <button style="background: lightgrey; color:#fff; padding:10px; border:1px solid #fff;  font-weight:900; outline:none; cursor:pointer; ">Already Submitted</button>
                                <?php elseif ($data['user_info']['kyc_status'] == 'approved') : ?>
                                    <span style="color:green; font-weight:600"><i class="fa fa-check"></i> KYC Approved</span>
                                <?php elseif ($data['user_info']['kyc_status'] == 'rejected') : ?>
                                    <small class="text-danger d-block">Your KYC Documents was disapproved</small>
                                    <a href="wallet/profile/kyc-verification/">
                                        <button style="background: green; color:#fff; padding:10px; border:1px solid #fff;  font-weight:900; outline:none; cursor:pointer; ">Re-Upload KYC Documents</button>
                                    </a>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <p><strong>Referal Link</strong></p>

                            <br>
                            <p>Automatically top up your account balance by sharing your referral link, Earn a percentage of whatever amount your referred user deposit to their wallet.

                            </p>
                            <form class="form-horizontal form-referral-link row mt-2" action="index.html">
                                <div class="col-12">
                                    <fieldset class="form-label-group">
                                        <input type="text" class="form-control" id="referral-link" value="<?php echo baseurl . 'referal/index/' . $data['user_info']['referal_link'] ?>" required="" autofocus="">
                                        <label for="first-name">Referral link</label>
                                    </fieldset>
                                </div>
                            </form>
                            <div style="width:40px; height:40px; position:absolute; right:15px; top:15px">
                                <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/refer.png" alt="" style="width:100%" draggable="false">
                            </div>
                            <br>
                            <div class="font-small-3 clearfix">
                                <button style="background: green; color:#fff; padding:10px; border:1px solid #fff;  font-weight:900; outline:none; cursor:pointer; " data-clipboard-text="<?php echo baseurl . 'referal/index/' . $data['user_info']['referal_link'] ?>" class="bb">Copy Link</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!--/ ICO Token balance & sale progress -->





    </div>