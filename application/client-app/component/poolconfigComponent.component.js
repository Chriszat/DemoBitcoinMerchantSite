angular.module("appCore")
.component("poolconfigComponent", {

    templateUrl:"api/api.py.php?_=sell&a=index",
    controller:["element", "request", "$routeParams", "isEmpty", "listen", "overlay", "$route", function(element, request, $routeParams, isEmpty, listen, overlay, $route){
      
        request({
            method : "POST",
            url : "api/api.py.php?_=BitcoinMine&a=poolConfig",
            formdata:true,
            data:data
        }).then(function(response){
            response = JSON.parse(response)
            overlay.hide()
            if(response.status == 'success'){
                
                alertify.success(response.message).dismissOthers()
            }
        }, function(error){

        })
    }]
        
})