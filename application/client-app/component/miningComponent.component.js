angular.module("appCore")
    .component("miningComponent", {

        templateUrl: "api/api.py.php?_=BitcoinMine&a=index",
        controller: ["$scope", "element", "request", "$routeParams", "isEmpty", "listen", "overlay", "$route", function ($scope, element, request, $routeParams, isEmpty, listen, overlay, $route) {


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
    
                    })
                 },function () { alertify.error('Cancel') });
               
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