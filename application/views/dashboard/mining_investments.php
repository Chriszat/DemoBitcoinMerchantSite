<div class="container" id="view">
    <div class="" style="margin:0 auto; width:900px; max-width:100%; user-select:none">
        <!-- User Profile -->
        <?php //print_r($data) 
        ?>
        <section class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="">
                        <div class="">
                        <h2 align="center">Your Bitcoin Mining Investments</h2>
                        <button class="btn" style="background:green; color:#fff" onclick="refreshView()">
                               <i class="icon-reload"></i>
                        </button>
                            <div class="">
                                
                                <div class="table-responsive">

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Mining Plan</b></th>
                                                <th><b>Receiving BTC Address</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Total Time Mined</b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="email_table">

                                            <?php
                                            $investments = $data["investments"];
                                            
                                            foreach ($investments as $res) {
                                                $plan_info = mysqli_fetch_assoc(mysqli_query($data['con'], "SELECT * FROM mining_plans WHERE id='$res[mining_plans_id]' "));
                                               
                                                $status = $res['status'];
                                               
                                                if($status =="running"){
                                                    $status = "<span style='color:green; font-weight:600'>Running</span";
                                                }elseif($status == "paused"){
                                                    $status = "<span style='color:orange; font-weight:600'>Paused</span";
                                                }elseif($status == "completed"){
                                                    $status = "<span style='color:blue; font-weight:600'>Completed</span";
                                                }elseif($status == "active"){
                                                    $status = "<span style='color:purple; font-weight:600'>Active</span";
                                                }
                                            ?>
                                                <tr id="<?php echo $res['id']; ?>">
                                                <td><?php echo strtoupper($plan_info['plan']); ?></td>
                                                    <td><?php echo $res['btc_address_id'] ?></td>
                                                    <td><?php echo $status ?></td>
                                                    <td><?php echo $res['full_mined_time'] ?></td>
                                                    <td>
                                                        <a href="wallet/mining/pool/config/<?php echo $res['id_hash'] ?>/" title="Configuration">
                                                        <span class="icon-settings" style="font-size:20px; cursor:pointer"></span>
&nbsp;<br><br>
<?php if($res['btc_address_id'] != ""): ?>
                                                        <a href="wallet/mining/pool/<?php echo $res['id_hash']; ?>/" title="Start Mining">
                                                            <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/mining-icon-4.png" alt="" style="width:30px; border-radius:50%; border:1px solid grey; box-shadow:1px 1px 0px 0px">
                                                        </a>

<?php else: ?>
    <span class="badge badge-danger">Configure a <br>receiving address</span>
<?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                   
                                   
                                </div>

<br>
                                <div>
                                        <a  id="new_plan" class="btn " style="background:green;color:#fff; cursor:pointer"><b><span class="fa fa-plus"></span> <span>New Mining Pool</span></span></b></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
    </div>