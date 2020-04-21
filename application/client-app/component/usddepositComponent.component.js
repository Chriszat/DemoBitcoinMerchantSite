
angular.module("appCore")
    .component("usddepositComponent", {
        templateUrl: "api/api.py.php?_=Deposit&a=index",
        controller: ["$scope", "element", "request", "listen", "isEmpty", "$routeParams", "wait", "$route", "overlay", function ($scope, element, request, listen, isEmpty, $routeParams, wait, $route, overlay) {

            let deposit_views = {};

            let clipboard = new ClipboardJS('.bb');
            clipboard.on('success', function (e) {
                alertify.success("<span style='color:#fff'>Copied!</span>").dismissOthers()
            });

            let payWithPayPal = function () {
                element("aee7c9526a25377b601ed2507bab6839").click();
                overlay.show();
            }

            let uploadDepositProof = function () {
                let form = element("acf44741545a0312c5495282d1ded087");
                if (form.file.files.length === 0) {
                    alertify.error("<span style='color:#fff'>Select an image file</span>").dismissOthers()
                    return false
                }
                let file = form.file.files[0];
                let file_ext = file.type.split("/")[1];
                let allowed_exts = ["jpeg", "jpg", "png"];
                if (allowed_exts.indexOf(file_ext) == -1) {
                    alertify.error("<span style='color:#fff'>Unsupported file. Must be *.jpg, *.png, *.jpeg only</span>").dismissOthers()
                    return false
                }

                let formdata = new FormData(form);

                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=uploadDepositProof",
                    formdata: true,
                    data: formdata
                }).then(function (res) {
                    let response = JSON.parse(res);
                    if (response.status == "success") {
                        alertify.success(`<span style='color:#fff'>${response.message}</span>`).dismissOthers()
                        form.reset();
                        element('16SGeKxYVUxB6u7sHChqA6nNMcpPMDFW1z').classList.toggle('displaypanel')
                    } else {
                        alertify.error(`<span style='color:#fff'>${response.message}</span>`).dismissOthers()
                        return;
                    }

                })

            }

            let payWithBTC = function () {
                if(deposit_views.hasOwnProperty("with_btc")){
                    replaceMainView("with_btc");
                    listen("upload", "click", uploadDepositProof)
                    return;
                }
                overlay.show();
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=withBTCView",
                    formdata: true,

                }).then(function (res) {
                    overlay.hide();
                    deposit_views["with_btc"] = res;
                    replaceMainView("with_btc");
                    listen("upload", "click", uploadDepositProof)
                })
            }

            let processStripeDeposit = function(evt){
                evt.preventDefault();
                evt.stopPropagation();
                let formdata = new FormData(element("payment-form"));
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=processStripeDeposit",
                    formdata: true,
                    data: formdata
                }).then(function (res) {
                   
                    let response  = JSON.parse(res);
                    alertify.error(`<span style='color:#fff'>${response.message}</span>`).dismissOthers()
                    // element("payment-form").reset()
                    return;
                })
            }

            let payWithStripe = function(){
                if(deposit_views.hasOwnProperty("with_stripe")){
                    replaceMainView("with_stripe");
                    return;
                }
                overlay.show();
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=withStripeView",
                    formdata: true,

                }).then(function (res) {
                    overlay.hide();
                    deposit_views["with_stripe"] = res;
                    replaceMainView("with_stripe");
                    listen("payment-form", "submit", processStripeDeposit)
                    listen("amount", "input", function(evt){
                        if(evt.target.value != ""){
                            element("amount_").innerHTML = `$${evt.target.value}`;
                        }else{
                            element("amount_").innerHTML = "";
                        }
                    })
                })
            }

            let processWeChatDeposit = function(evt, method="processWeChatDeposit"){
                evt.preventDefault();
                evt.stopPropagation();
                let formdata = new FormData(element("payment-form"));
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a="+method,
                    formdata: true,
                    data: formdata
                }).then(function (res) {
                    let response  = JSON.parse(res);
                    if(response.status == "success"){
                        alertify.success(`<span style='color:#fff'>${response.message}</span>`).dismissOthers()
                        element("amount").value = ""
                    }else{
                        alertify.error(`<span style='color:#fff'>${response.message}</span>`).dismissOthers()

                    }
                    // element("payment-form").reset()
                    return;
                })
            }

            let payWithWeChat = function(){
                if(deposit_views.hasOwnProperty("with_wechat")){
                    replaceMainView("with_wechat");
                    return;
                }
                overlay.show();
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=withWeChatView",
                    formdata: true,

                }).then(function (res) {
                    overlay.hide();
                    deposit_views["with_wechat"] = res;
                    replaceMainView("with_wechat");
                    listen("payment-form", "submit", processWeChatDeposit)
                    listen("upload", "click", uploadDepositProof)
                })
            }

            let payWithAliPay = function(){
                if(deposit_views.hasOwnProperty("with_alipay")){
                    replaceMainView("with_alipay");
                    return;
                }
                overlay.show();
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=withAliPayView",
                    formdata: true,

                }).then(function (res) {
                    overlay.hide();
                    deposit_views["with_alipay"] = res;
                    replaceMainView("with_alipay");
                    listen("payment-form", "submit", processWeChatDeposit)
                    listen("upload", "click", uploadDepositProof)
                })
            }

            let payWithWesternUnion = function(){
                if(deposit_views.hasOwnProperty("with_western_union")){
                    replaceMainView("with_western_union");
                    return;
                }
                overlay.show();
                request({
                    method: "POST",
                    url: "api/api.py.php?_=Deposit&a=withAliPayView",
                    formdata: true,

                }).then(function (res) {
                    overlay.hide();
                    deposit_views["with_western_union"] = res;
                    replaceMainView("with_western_union");
                    listen("payment-form", "submit", processWeChatDeposit)
                    listen("upload", "click", uploadDepositProof)
                })
            }

            let applicationWindowEventListeners = function () {
                listen("pay_with_paypal", "click", payWithPayPal);
                listen("pay_with_btc", "click", payWithBTC);
                listen("pay_with_stripe", "click", payWithStripe)
                listen("pay_with_wechat", "click", payWithWeChat)
                listen("pay_with_wechat", "click", payWithWeChat)
                listen("pay_with_alipay", "click", payWithAliPay)
                listen("pay_with_western_union", "click", payWithWesternUnion)
            }

            let replaceMainView = function (view) {
                element("b0f30e832a9fd20b97eb3ec227db30ff").innerHTML = deposit_views[view];
                listen("back_btn", "click", showMainView)
                
            }

            let showMainView = function () {
                element("b0f30e832a9fd20b97eb3ec227db30ff").innerHTML = deposit_views["main_view"];
                applicationWindowEventListeners();
            }

            

            $scope.init = function () {
                deposit_views["main_view"] = element("b0f30e832a9fd20b97eb3ec227db30ff").innerHTML;
                applicationWindowEventListeners();
            }

            $scope.init();
        }]
    }) 