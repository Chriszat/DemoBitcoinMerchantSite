
angular.module("appCore")
.component("sendethComponent", {
    templateUrl: "api/api.py.php?_=BitcoinAction&a=sendBtcIndexView",
    controller: ["$scope", "element", "request", "listen", "isEmpty", "$routeParams", "wait", "$route", function ($scope, element, request, listen, isEmpty, $routeParams, wait, $route) {
        let clipboard= new ClipboardJS('.bb');
        clipboard.on('success', function(e) {
            alertify.success("<span style='color:#fff'>Copied!</span>").dismissOthers()
        });

        $scope.btcBalanceObject;

        let initiateSendETH = function () {
            let form = element("32f059f2d62f9935792445f3066e9176");
            if(!validateSendInput()){
                return false;
            }

            let formdata = new FormData(element("32f059f2d62f9935792445f3066e9176"));

            request({
                method:"POST",
                url:"api/api.py.php?_=BitcoinAction&a=sendEth",
                formdata:true,
                data:formdata
            }).then(function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    element("918238279a7bdaac6a29fbb67f46b55e").innerHTML = response.btc_balance

                    let html_view = `<div class="card">
                    <div class="card-content">
                        <div class="head-content">
                            <div class="center">
                                <br>
                                <p style="font-size:20px; font-family: 'Open Sans', sans-serif;"><b>
                                        Transfer Successfull </b></p>
                
                            </div>
                        </div>
                        <br>
                        <div class="card-body" style="user-select:none;padding:10px; text-align:center;" id="bt">
                            <div style="width:100px; margin:0 auto; max-width:100%">
                                <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/mark2.png" alt="" style="width:100%">
                            </div><br>
                            <h4><span style="color:green">ETH ${response.btc_trasferred}</span> has been transfered to address <span style="color:green">${response.transaction_address}</span></h4>
                            <br><br>
                                <p><a href="wallet/accounts/eth/?tab=transactions"><button class="btn text-white">View Transactions</button></a></p>
                        </div>
                    </div>
                </div>`;
                element("384004ddf67b7c514ca6275a741d29cb").innerHTML = html_view;
                }
            })
        }

        let windowEventListeners = function () {
            listen("68e9688ad3f2cfcf74ef8d29bcb92c2b", "click", initiateSendETH)
            listen("32f059f2d62f9935792445f3066e9176", "submit", initiateSendETH)
        }

        let validateSendInput = function(){
            let form = element("32f059f2d62f9935792445f3066e9176");
            if(form.eth_address.value.length < 42){
                alertify.error("<span style='color:#fff'>Incorrect BTC Address</span>").dismissOthers()
                return false
            }
           
            if(form.amount.value == ""){
                alertify.error("<span style='color:#fff'>Enter BTC amount to send</span>").dismissOthers()
                return false
            }

            if(parseInt(form.amount.value) > $scope.btcBalanceObject['eth_balance']){
                alertify.error("<span style='color:#fff'>Insufficent BTC</span>").dismissOthers()
                return false
            }

            return true
        }

        $scope.init = function () {
            let btcJsonBody = element("4ac174730d4143a119037d9fda81c7a9").innerHTML;
            $scope.btcBalanceObject = JSON.parse(btcJsonBody);
            console.log($scope.btcBalanceObject);
            windowEventListeners();

        }

        $scope.init();
    }]
}) 