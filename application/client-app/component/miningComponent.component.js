angular.module("appCore")
    .component("miningComponent", {

        templateUrl: "api/api.py.php?_=BitcoinMine&a=index",
        controller: ["$scope", "element", "request", "$routeParams", "isEmpty", "listen", "overlay", "$route", "$location", function ($scope, element, request, $routeParams, isEmpty, listen, overlay, $route, $location) {


            let cached_views = {}
            let usd_balance;

            refreshView = function () {
                request({
                    method: "POST",
                    url: "api/api.py.php?_=BitcoinMine&a=index",
                    formdata: false
                }).then(function (response) {
                    element("content_view").innerHTML = response
                    listen("new_plan", "click", loadMiningPlansView)
                    $scope.init();
                })
            }

            purchasePlan = function (type) {
                alertify.confirm('Confirm Purchase', '<b>Do you wish to proceed in purchasing this mining plan?</b>', function () {
                    request({
                        method: "POST",
                        url: "api/api.py.php?_=BitcoinMine&a=purchasePlan&type=" + type,
                        formdata: false
                    }).then(function (response) {

                        let res = JSON.parse(response)
                        if(res.status == "success"){
                            $location.path(`wallet/mining/pool/config/${res.hash}/`)
                            $route.reload();
                        }else{
                            alertify.error(`<span style="color:#fff">${res.message}</span>`)
                        }
                       
                    })
                 },function () { alertify.error('Cancel') });
               
            }

          

            let e = document.getElementsByClassName("purchase_plan");
            for (let index in e) {
                if (typeof [index] == "object") {
                    console.log(e[index])
                    try {
                        e[index].addEventListener("click", function (evt) {
                            purchasePlan(e[index].getAttribute("data-plan"))
                        })
                    }catch{

                    }
                } else {
                    console.log(typeof (e[index]))
                }
            }


            let loadMiningPlansView = function () {
                if (cached_views.hasOwnProperty("plans")) {
                    element("view").innerHTML = cached_views["plans"];
                    listen("back", "click", function () {
                        element("view").innerHTML = cached_views["main_view"]
                        listen("new_plan", "click", loadMiningPlansView)
                    })
                    return
                }
                request({
                    method: "POST",
                    url: "api/api.py.php?_=BitcoinMine&a=miningPlans",
                    formdata: false
                }).then(function (response) {
                    element("view").innerHTML = response
                    cached_views["plans"] = response
                    listen("back", "click", function () {
                        element("view").innerHTML = cached_views["main_view"]
                        listen("new_plan", "click", loadMiningPlansView)
                    })
                    let e = document.getElementsByClassName("purchase_plan");
            for (let index in e) {
                if (typeof [index] == "object") {
                    console.log(e[index])
                    try {
                        e[index].addEventListener("click", function (evt) {
                            purchasePlan(e[index].getAttribute("data-plan"))
                        })
                    }catch{

                    }
                } else {
                    console.log(typeof (e[index]))
                }
            }
                })
            }

            if (element("new_plan")) {
                listen("new_plan", "click", loadMiningPlansView)
            }

            $scope.init = function () {
                let view = element("view");
                cached_views["main_view"] = view.innerHTML
                // usd_balance = JSON.parse(element("a5709a2a08d00e295c4977b030ce8aa0feb8bc4f").innerHTML)["usd"];
            }

            $scope.init();
        }]

    })