
angular.module("appCore")
.component("withdrawbtcComponent", {
    templateUrl: "api/api.py.php?_=BitcoinAction&a=placeBTCWithdrawIndex",
    controller: ["$scope", "element", "request", "listen", "isEmpty", "$routeParams", "wait", "$route", "overlay", function ($scope, element, request, listen, isEmpty, $routeParams, wait, $route, overlay) {

        let placeWithdraw = function(evt){
            evt.preventDefault()
            evt.stopPropagation();
            formdata = new FormData(element("32f059f2d62f9935792445f3066e9176"))
            request({
                method:"POST",
                url:"api/api.py.php?_=BitcoinAction&a=placeBTCWithdraw",
                formdata:true,
                data : formdata
            }).then(function(response){
                response = JSON.parse(response)
                if(response.status == 'success'){
                    element("32f059f2d62f9935792445f3066e9176").reset()
                    alertify.success(`<span style='color:#fff' >${response.message}</span>`);
                }else{
                    alertify.error(`<span style='color:#fff' >${response.message}</span>`);
                }
               
            }, function(error){})
        }

        listen("68e9688ad3f2cfcf74ef8d29bcb92c2b", "click", placeWithdraw)


    }]
}) 