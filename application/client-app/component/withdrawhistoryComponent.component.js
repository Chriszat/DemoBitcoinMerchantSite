
angular.module("appCore")
.component("withdrawhistoryComponent", {
    templateUrl: "api/api.py.php?_=Transactions&a=withdraw_history",
    controller: ["$scope", "element", "request", "listen", "isEmpty", "$routeParams", "wait", "$route", "overlay", function ($scope, element, request, listen, isEmpty, $routeParams, wait, $route, overlay) {

    }]
}) 