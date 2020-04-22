angular.module("appCore")
    .component("miningComponent", {

        templateUrl: "api/api.py.php?_=BitcoinMine&a=index",
        controller: ["$scope", "element", "request", "$routeParams", "isEmpty", "listen", "overlay", "$route", function ($scope, element, request, $routeParams, isEmpty, listen, overlay, $route) {

            let cached_views = {}
            let usd_balance;

            purchasePlan = function (type) {
                request({
                    method: "POST",
                    url: "api/api.py.php?_=BitcoinMine&a=purchasePlan&type=" + type,
                    formdata: false
                }).then(function (response) {
                    
                })
            }

            $scope.init = function () {
                let view = element("page");
                cached_views["main_view"] = view.innerHTML
                usd_balance = JSON.parse(element("a5709a2a08d00e295c4977b030ce8aa0feb8bc4f").innerHTML)["usd"];
            }

            $scope.init();
        }]

    })