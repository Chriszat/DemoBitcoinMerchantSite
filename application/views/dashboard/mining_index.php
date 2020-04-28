<div id="page">
    <!-- Page content -->
<style>
    .text-yellow {
        color: #ffd600 !important;
        font-weight: 600;
    }

    .xx-btn {
        position: relative;
        transition: all .15s ease;
        letter-spacing: .025em;
        text-transform: none;
       
        font-size: 20px;
        line-height: 1.5;
        padding: .25rem .5rem;
        border-radius: .25rem;
    
    }

    .btn-white {
        color: #212529;
        border-color: #fff;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08)
    }

    .card-pricing .list-unstyled li {
    padding: .5rem 0;
    color: #8898aa;
    font-size:20px;
}
</style>

<div class="">
    <br><br>
    <h1 align="center">Choose Investment Plan</h1>
   
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="pricing card-group flex-column flex-md-row mb-3">
                    <div class="card card-pricing border-0 bg-dark text-center mb-4">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-7">
                                    <!-- Title -->
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0 text-left" style="color:#ffd600!important">Gold pack</h4>
                                </div>
                                <div class="col-lg-8 col-12 text-right">
                                   
                                    <a href="#" data-toggle="modal" onclick="purchasePlan('gold')" data-target="#buy10" class=" xx-btn btn-white" style="background:green!important; color:#fff!important; font-size:25px;!important">Purchase plan</a>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-lg-7">
                            <?php if($data['settings']['show_mining_price'] == 1): ?>
                            <div class="display-4 text-yellow">$<?php echo number_format($data['plans'][0]['price'], 2); ?></div>
                            <?php else: ?>
                                <div class="display-4 text-yellow">
                                    <?php  echo $data['plans'][0]['btc_reward']; ?> BTC REWARD
                                </div>
                            <?php endif; ?>
                            <span class="text-muted">For 5 days</span>
                            <ul class="list-unstyled my-4">
                            <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">  <?php echo $data['plans'][0]['btc_reward']; ?> BTC REWARD</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">3.5% daily top up</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">1BTC max price</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Interest 110% </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Compound interest 210% </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Hashrate 15Ph/s </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">10% referral percent</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pricing card-group flex-column flex-md-row mb-3">
                    <div class="card card-pricing border-0 bg-dark text-center mb-4">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-lg-5 ">
                                    <!-- Title -->
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0 text-left" style="color:greenyellow!important">Premium pack</h4>
                                </div>
                                <div class="col-lg-7 col-12 text-right">
                              
                                    <a href="#" data-toggle="modal" data-target="#buy10" class=" xx-btn btn-white" style="background:green!important; color:#fff!important; font-size:25px;!important" onclick="purchasePlan('premium')">Purchase plan</a>
                                    <div class="modal fade" id="calculate7" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card bg-secondary border-0 mb-0">
                                                        <div class="card-header bg-transparent pb-5">
                                                            <div class="text-muted text-center mt-2 mb-3"><small>Calculate profit</small></div>
                                                            <div class="btn-wrapper text-center">
                                                                <h4 class="text-uppercase ls-1 text-default py-3 mb-0">Premium pack</h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body px-lg-5 py-lg-5">
                                                            <form role="form" action="https://boomchart.com.ng/bitmine/user/calculate" method="post">
                                                                <input type="hidden" name="_token" value="2unR9UBCzULtFbRmxR1ddl7G9LETyDPLsY9qffYV">
                                                                <div class="form-group mb-3">
                                                                    <div class="input-group input-group-merge input-group-alternative">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">BTC</span>
                                                                        </div>
                                                                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                                                        <input type="hidden" name="plan_id" value="7">
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-default my-4">Calculate</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="buy7" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-secondary border-0 mb-0">
                                                    <div class="card-header bg-transparent pb-5">
                                                        <div class="text-muted text-center mt-2 mb-3"><small>Purchase plan</small></div>
                                                        <div class="btn-wrapper text-center">
                                                            <h4 class="text-uppercase ls-1 text-default py-3 mb-0">Premium pack</h4>
                                                        </div>
                                                    </div>
                                                    <div class="card-body px-lg-5 py-lg-5">
                                                        <form role="form" action="https://boomchart.com.ng/bitmine/user/buy" method="post">
                                                            <input type="hidden" name="_token" value="2unR9UBCzULtFbRmxR1ddl7G9LETyDPLsY9qffYV">
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-merge input-group-alternative">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">BTC</span>
                                                                    </div>
                                                                    <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                                                    <input type="hidden" name="plan" value="7">
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-default my-4">Purchase</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-lg-7">
                        <?php if($data['settings']['show_mining_price'] == 1): ?>
                            <div class="display-4 text-yellow">$<?php echo number_format($data['plans'][1]['price'], 2); ?></div>
                            <?php else: ?>
                                <div class="display-4 text-yellow">
                                    <?php echo $data['plans'][1]['btc_reward']; ?> BTC REWARD
                                </div>
                            <?php endif; ?>
                            <span class="text-muted">For 48hrs</span>
                            <ul class="list-unstyled my-4">
                            <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">  <?php echo $data['plans'][1]['btc_reward']; ?> BTC REWARD</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">0.01BTC max price</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Interest 80% </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Compound interest 180% </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Hashrate 10Ph/s </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">2% referral percent</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pricing card-group flex-column flex-md-row mb-3">
                    <div class="card card-pricing border-0 bg-dark text-center mb-4">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-7">
                                    <!-- Title -->
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0 text-left">Starter pack</h4>
                                </div>
                                <div class="col-lg-7 col-12 text-right">
                                
                                    <a href="#" data-toggle="modal" data-target="#buy10" class=" xx-btn btn-white" style="background:green!important; color:#fff!important; font-size:25px;!important" onclick="purchasePlan('starter')">Purchase plan</a>
                                    <div class="modal fade" id="calculate6" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card bg-secondary border-0 mb-0">
                                                        <div class="card-header bg-transparent pb-5">
                                                            <div class="text-muted text-center mt-2 mb-3"><small>Calculate profit</small></div>
                                                            <div class="btn-wrapper text-center">
                                                                <h4 class="text-uppercase ls-1 text-default py-3 mb-0">Starter pack</h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body px-lg-5 py-lg-5">
                                                            <form role="form" action="https://boomchart.com.ng/bitmine/user/calculate" method="post">
                                                                <input type="hidden" name="_token" value="2unR9UBCzULtFbRmxR1ddl7G9LETyDPLsY9qffYV">
                                                                <div class="form-group mb-3">
                                                                    <div class="input-group input-group-merge input-group-alternative">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">BTC</span>
                                                                        </div>
                                                                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                                                        <input type="hidden" name="plan_id" value="6">
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-default my-4">Calculate</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="buy6" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-secondary border-0 mb-0">
                                                    <div class="card-header bg-transparent pb-5">
                                                        <div class="text-muted text-center mt-2 mb-3"><small>Purchase plan</small></div>
                                                        <div class="btn-wrapper text-center">
                                                            <h4 class="text-uppercase ls-1 text-default py-3 mb-0">Starter pack</h4>
                                                        </div>
                                                    </div>
                                                    <div class="card-body px-lg-5 py-lg-5">
                                                        <form role="form" action="https://boomchart.com.ng/bitmine/user/buy" method="post">
                                                            <input type="hidden" name="_token" value="2unR9UBCzULtFbRmxR1ddl7G9LETyDPLsY9qffYV">
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-merge input-group-alternative">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">BTC</span>
                                                                    </div>
                                                                    <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                                                    <input type="hidden" name="plan" value="6">
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-default my-4">Purchase</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-lg-7">
                            
                        <?php if($data['settings']['show_mining_price'] == 1): ?>
                            <div class="display-4 text-yellow">$<?php echo number_format($data['plans'][2]['price'], 2); ?></div>
                            <?php else: ?>
                                <div class="display-4 text-yellow">
                                    <?php echo $data['plans'][0]['btc_reward']; ?> BTC REWARD
                                </div>
                            <?php endif; ?>
                            <span class="text-muted">For 24hrs</span>
                            <ul class="list-unstyled my-4">
                            <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">  <?php echo $data['plans'][2]['btc_reward']; ?> BTC REWARD</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">0.001BTC max price</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Interest -25% </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Compound interest 75% </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Hashrate 5Ph/s </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">2% referral percent</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="text-center">
<button class="btn" style="background:#e74c3c" id="back"><i class="fa fa-arrow-left"></i> Back</button>
</div>

<script type="application/json" id="a5709a2a08d00e295c4977b030ce8aa0feb8bc4f">
{"usd":"<?php echo $data['usd_wallet']; ?>"}
</script>