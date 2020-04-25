angular.module("appCore")
.component("poolconfigComponent", {

    template:"",
    controller:["element", "request", "$routeParams", "isEmpty", "listen", "overlay", "$route", "$location", function(element, request, $routeParams, isEmpty, listen, overlay, $route, $location){
      
        let formdata = new FormData()
        formdata.append("id", $routeParams.id)
        request({
            method : "POST",
            url : "api/api.py.php?_=BitcoinMine&a=poolConfigIndex",
            formdata:true,
            data:formdata
        }).then(function(response){
            element("content_view").innerHTML = response
            listen("32f059f2d62f9935792445f3066e9176", "submit", saveConfiguration)
        }, function(error){

        })

        let saveConfiguration = function(evt){
            evt.preventDefault()
            evt.stopPropagation();
            formdata = new FormData(element("32f059f2d62f9935792445f3066e9176"))
            formdata.append("id", $routeParams.id)
            request({
                method : "POST",
                url : "api/api.py.php?_=BitcoinMine&a=savePoolConfig",
                formdata:true,
                data:formdata
            }).then(function(response){
                console.log($location);
                $location.path("/wallet/mining/")
                $route.reload();
                // element("content_view").innerHTML = response
            }, function(error){
    
            })
        } 

        
    }]
        
})