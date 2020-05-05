angular.module("appCore")
    .component("miningpoolComponent", {
        template: "<div id='page'></div>",
        controller: ["$scope", "element", "request", "$routeParams", "isEmpty", "listen", "overlay", "$route", "$location", function ($scope, element, request, $routeParams, isEmpty, listen, overlay, $route, $location) {

            let plan_info = {};
            let mining_info = {};
            let current_mining_time = "";
            let duration_mining_time = "";
            let secs_mined = 00;
            let mins_mined = 00;
            let hr_mined = 00;
            let btc_mined = 0.00000000

            console.log($route)
            console.log($route.current)

            let formdata = new FormData();
            formdata.append("hash", $routeParams.id)
            request({
                method: "POST",
                url: "api/api.py.php?_=BitcoinMine&a=miningPoolIndex",
                formdata: true,
                data: formdata
            }).then(function (response) {
                element("page").innerHTML = response
                // listen("7a667ca282aa1fd8994d98b897dc86d3627f7514", "click", startMiningEngine)
                plan_info = JSON.parse(element("365f836ce5cf50e4ad4608a5a586ce26d19df25d").innerHTML)["plan_info"]
                mining_info = JSON.parse(element("365f836ce5cf50e4ad4608a5a586ce26d19df25d").innerHTML)["data"]
                time_mined = mining_info['full_mined_time'].split(":");
                secs_mined = time_mined[2];
                mins_mined = time_mined[1]
                hr_mined=time_mined[0]
                element("total_btc_mined_value").innerHTML = mining_info["btc_mined"]
                console.log(plan_info)
                console.log(mining_info)
                if(mining_info["status"] == "active"){
                    startMiningEngine()
                }
                

            })


            let cached_views = {}
            let usd_balance;

            purchasePlan = function (type) {
                request({
                    method: "POST",
                    url: "api/api.py.php?_=BitcoinMine&a=purchasePlan&type=" + type,
                    formdata: false
                }).then(function (response) {
                    let res = JSON.parse(response)
                    console.log(res)
                    $location.path(`wallet/mining/pool/config/${res.hash}/`)
                    $route.reload();
                })
            }

            let incrementBTCValue = function(){
                let formular = (parseInt(plan_info['duration_hours']) * 60);
                let btc_reward_value = parseInt(plan_info["btc_reward"]) / formular
                console.log(btc_reward_value.toPrecision(8))
                element("total_btc_mined_value").innerHTML = parseInt(element("total_btc_mined_value").innerHTML) + btc_reward_value
            }

            let updateBTCValue = function(){
                let time_mined_string = `${hr_mined}:${mins_mined}:${secs_mined}`;
                let formdata = new FormData()
                formdata.append("full_time_mined", time_mined_string)
                formdata.append("id", mining_info.id)
                formdata.append("hash", $routeParams.id)
                request({
                    method: "POST",
                    url: "api/api.py.php?_=BitcoinMine&a=updateMiningRecord",
                    formdata: true,
                    data: formdata
                }).then(function (response) {
                    let res = JSON.parse(response);
                    element("total_btc_mined_value").innerHTML = res['reward']
                })

            }

            let generateRandomHash = function () {
                return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
            }

            let createCommand = function (command, add_line = false) {
                let p = document.createElement("p");
                p.innerHTML = ">&nbsp;"
                p.style.fontFamily = "'Roboto', sans-serif";
                let span = document.createElement("span")
                span.innerHTML = command
                p.appendChild(span)
                element("consolebody").appendChild(p)
                if (add_line) {
                    addConsoleLine();
                }
                gotoBottom("consolebody")
            }

            function gotoBottom(id) {
                var element = document.getElementById(id);
                element.scrollTop = element.scrollHeight - element.clientHeight;
            }

            let addConsoleLine = function () {
                console.log("Adding line..")
                document.getElementById("consolebody").innerHTML += '<p style="margin-top:-10px;"><hr style="border:0.7px dashed #63de00;"></p>'
            }

            let setAddPeriodicCommand = function (command, interval, add_line) {
                setTimeout(function () {
                    createCommand(command, add_line)
                }, interval)
            }

            let random3Bits = function () {
                return ("" + Math.random()).substring(2, 5)

            }

            let logStratumStringType = function () {
                let string1 = `Stratum from pool ${("" + Math.random()).substring(2, 3)} requested work restart `;
                let string2 = `Stratum from pool ${("" + Math.random()).substring(2, 3)} detected new block `
                let string3 = `New block size ${("" + Math.random()).substring(2, 3)}bytes added `
                let string4 = `Keep awake----- log [${("" + Math.random()).substring(2, 3)}] block `
                let arr = [string1, string2, string3, string4];
                return arr[Math.floor(Math.random() * arr.length)]
            }

            let logAcceptedStringType = function () {
                let string1 = `Accepted ${generateRandomHash()} Diff ${random3Bits()}/${random3Bits()} GPU 1 pool ${("" + Math.random()).substring(2, 3)} pool ${("" + Math.random()).substring(2, 3)}`

                let string2 = `Rejected ${generateRandomHash()} Diff ${random3Bits()}/${random3Bits()} GPU 1 pool ${("" + Math.random()).substring(2, 3)} pool ${("" + Math.random()).substring(2, 3)}`

                let arr = [string1, string2];
                return arr[Math.floor(Math.random() * arr.length)]
            }

            let selectRandomLog = function () {
                let log_arr = [logAcceptedStringType, logStratumStringType];
                return log_arr[Math.floor(Math.random() * log_arr.length)]();
            }

            let startMiningEngine = function () {
                runTime();
                let command_string = `<b>cgminer version 3.7.2 - Started [${new Date().toLocaleString()}]`
                createCommand(command_string);
                let command_string1 = `<5s>: 1.390M <avg>:1.132Mh/s : A:1792 R:0 HW:0 WU:981.6/m SI:2 SS:0 NB:3 LW: 35 GF: 0 RF: 0`

                let command_string2 = `Connected to eu2.multpool.us diff 256 with stratum as user workerdisk.23`
                let command_string3 = `Block ${generateRandomHash().substring(0, 8)}... Diff: 1.26kK Started [${new Date().toLocaleString()}] Best share: 3.21K`

                let command_string4 = `[Plool management [G]PU management [S]ettings [D]isplay options [Q]uit]`

                let command_string5 = `GPU 0: 66.OC 343RPM : 32.3K/599.9Kh/s : A:112 R:0 AW:0 WU:8.9/n 1.13`

                let command_string6 = `GPU 1: 64.OC 2563RPM : 432.3K/599.9Kh/s : A:1024 R:0 AW:0 WU:548.9/n 1.13`
                let command_string7 = ` [${new Date().toLocaleString()}] Switching to pool 0 stratun+tcp://cu2.multipool.us:7777`
                let command_string8 = `Network diff set to 1.26K`
                let command_string9 = `Accepted ${generateRandomHash ()} Diff ${random3Bits()}/${random3Bits()} GPU 1 pool ${("" + Math.random()).substring(2, 3)} pool ${("" + Math.random()).substring(2, 3)}`
                let command_string10 = `Stratum from pool ${("" + Math.random()).substring(2, 3)} requested work restart `

                let time_interval = [3000, 6000, 9000];


                setAddPeriodicCommand(command_string1, 2000)
                setAddPeriodicCommand(command_string2, 3000)
                setAddPeriodicCommand(command_string3, 4000, true)
                setAddPeriodicCommand(command_string4, 5000)
                setAddPeriodicCommand(command_string5, 6000)
                setAddPeriodicCommand(command_string6, 7000, true)
                setAddPeriodicCommand(command_string7, 8000)
                setAddPeriodicCommand(command_string8, 9000)
                setAddPeriodicCommand(command_string9, 10000)
                setAddPeriodicCommand(command_string10, 11000)

                setTimeout(function () {

                    let mainInterval = setInterval(function () {
                        if(!$route.current.params.hasOwnProperty('id')){
                            clearInterval(mainInterval)
                        }
                        let interval = setTimeout(function () {
                            if(!$route.current.params.hasOwnProperty('id')){
                                clearTimeout(interval)
                            }
                            command_string11 = selectRandomLog()
                            createCommand(command_string11)
                            clearTimeout(interval)
                        }, time_interval[Math.floor(Math.random() * time_interval.length)])
                    }, 2000)
                }, 13000)
            }


            let runTime = function () {
                let sec = element("sec");
                let hr = element("hr");
                let mins = element("mins");

                let interval = setInterval(function () {
                    if(!$route.current.params.hasOwnProperty('id')){
                        clearInterval(interval)
                    }
                    if (parseInt(sec.innerHTML) == 59) {
                        updateBTCValue()
                        if (parseInt(mins.innerHTML) < 9) {
                            element("minszero").style.display = "inline"
                        } else {
                            element("minszero").style.display = "none"
                        }

                        sec.innerHTML = "00";
                        // element("minszero").style.display = "inline"
                        if (parseInt(mins.innerHTML) == 59) {
                            if(parseInt(hr.innerHTML) < 9){
                                element("hrzero").style.display = "inline"
                            }else{
                                element("hrzero").style.display = "none"
                            }
                            mins.innerHTML = "00";
                            
                            hr.innerHTML = parseInt(hr.innerHTML) + 1
                            hr_mined = parseInt(hr.innerHTML);
                        } else {
                        
                        }
                        mins.innerHTML = parseInt(mins.innerHTML) + 1
                        mins_mined = parseInt(mins.innerHTML);
                    }



                    if (parseInt(sec.innerHTML) < 9) {
                        element("seczero").style.display = "inline"
                    } else {
                        element("seczero").style.display = "none"
                    }

                    sec.innerHTML = parseInt(sec.innerHTML) + 1
                    secs_mined = parseInt(sec.innerHTML);


                }, 100)
            }



        }]

    })