<div class="container" id="view">
    <style>
         .text-yellow {
        color: #ffd600 !important;
        font-weight: 600;
    }
        .start-btn {
            display: inline-block;
            text-decoration: none;
            background: #8cd460;
            color: #fff;
            font-weight: bold;
            width: 120px;
            height: 120px;
            line-height: 120px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            box-shadow: 0px 0px 0px 5px #8cd460;
            border: solid 2px rgba(255, 255, 255, 0.47);
            transition: .4s;
            cursor: pointer
        }

        .start-btn:hover {
            border-style: dashed;
        }

        .console {
            font-family: 'Fira Mono';
            width: 700px;
            height: 450px;
            box-sizing: border-box;
            margin: auto;
            max-width: 100%
        }

        .console header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background-color: #555;
            height: 45px;
            line-height: 45px;
            text-align: center;
            color: #DDD;
        }

        .console .consolebody {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            box-sizing: border-box;
            padding: 20px;
            height: calc(100% - 40px);
            overflow: scroll;
            background-color: #000;
            color: #63de00;
        }

        .console .consolebody p {
            line-height: 1.5rem;
        }
    </style>
    <div class="" style="margin:0 auto; width:800px; max-width:100%; user-select:none">

        <section class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="">
                        <div class="">

                            <div class="">
                                <i class="icon-settings" style="font-size:30px; cursor:pointer; color:grey"></i>
                                &nbsp;&nbsp;
                                <i class="material-icons" style="font-size:35px; cursor:pointer; ">pause</i>

                                <hr>
                                <div style="text-align:center">
                                    <button class="start-btn" id="7a667ca282aa1fd8994d98b897dc86d3627f7514" style="outline:none">START MINING</button>
                                </div>
                                <br>
                                <?php
                                $d = explode(':', $data['mining_info']['full_mined_time']);
                               
                                ?>
                                <div align="center">
                                    <span style="font-size:20px; display:block"><b>Current Mining Time</b></span>
                                    <div style="color:green">
                                    <span id="hrzero" style="font-size:30px; font-weight:bold; display:none ">0</span><span style="font-size:30px; font-weight:bold; " id="hr"> <?php echo $d[0]; ?> </span><span style="font-size:30px; font-weight:bold; ">:</span>
                                    <span id="minszero" style="font-size:30px; font-weight:bold; display:none">0</span><span style="font-size:30px; font-weight:bold; " id="mins"> <?php echo $d[1]; ?> </span><span style="font-size:30px; font-weight:bold; ">:</span>
                                    <span id="seczero" style="font-size:30px; font-weight:bold; display:none">0</span><span style="font-size:30px; font-weight:bold; " id="sec"> <?php echo $d[2]; ?> </span>
                                    </div>
                                </div>
                                <hr>
                                <div class="console">

                                    <header>
                                        <p><b>(<?php echo $data['mining_info']['btc_address_id']; ?>)</b> POOL INDEX</p>
                                    </header>
                                    <div class="consolebody" id="consolebody" style="font-family: 'Roboto', sans-serif">

                                        <p style="margin-top:-10px;">> CGMINER HALTED</p>
                                        <p style="margin-top:-10px;">
                                            <hr style="border:0.7px dashed #63de00;">
                                        </p>
                                    </div>
                                </div>
                                <div align="center">
                                    <div class=" text-yellow mt-2" style="font-size:30px; font-weight:bolder"><span id="total_btc_mined_value"></span> BTC MINED</div>
                                </div>
                                
                                <br><br>
                                <p>Receiving Address: </p>
                                <div style="background:lightgray; padding:10px;">
                                    <?php echo $data['mining_info']['btc_address_id']; ?>
                                </div>
                                <br>
                                <p>Total BTC Mined: </p>
                                <div style="background:lightgray; padding:10px;">
                                    <b>
                                        0.005BTC

                                    </b>
                                </div>
<br>
                                <p>Mining Time: </p>
                                <div style="background:lightgray; padding:10px;">
                                    <b>
                                    <?php echo $data['mining_plan_info']['duration_hours']; ?>Hrs
                                    </b>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="margin:0 auto; text-align:center">

            <p></p>
        </section>

        <br><br>
        <div class="text-center"><a href="wallet/profile/"><button class="btn" style="background:#e74c3c" id="back"><i class="fa fa-arrow-left"></i> Back</button></a></div>
    </div>

    <script type="application/json" id="365f836ce5cf50e4ad4608a5a586ce26d19df25d">
        {"data":<?php echo json_encode($data['mining_info']); ?>, "plan_info":<?php echo json_encode($data['mining_plan_info']); ?>}
</script>