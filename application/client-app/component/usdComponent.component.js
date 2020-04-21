
angular.module("appCore")

.component("usdComponent", {
    templateUrl:"api/api.py.php?_=account&a=usd",
    controller:["element", "request", "listen", "isEmpty", "$routeParams", function(element, request, listen, isEmpty, $routeParams){
        console.log($routeParams)
       quote = "btc";
       if(!isEmpty($routeParams)){
           quote = $routeParams.quote
       }
        request({
            method:"POST",
            url:"api/api.py.php?_=account&a=usd&t",
            formdata:false
        }).then(function(response){
            response = JSON.parse(response)
            wallet_view = response.wallet_view
            trans_view = response.trans_view
            address_view = response.address_view
            element("tab_view").innerHTML=wallet_view
            listen("wallet", "click", function(event){
                element("tab_view").innerHTML = wallet_view
                element("wallet").style="background:#bdc3c7; "
                element("trans").style="background:#2c3e50; "
                element("address").style="background:#2c3e50; "
                listen("withdraw_btn", "click", function(event){
                    element("address").click()
                })
            })
            listen("trans", "click", function(event){
                element("tab_view").innerHTML = trans_view
                element("trans").style="background:#bdc3c7; "
                element("wallet").style="background:#2c3e50; "
                element("address").style="background:#2c3e50; "
                
            })
            listen("address", "click", function(event){
                element("tab_view").innerHTML = address_view
                element("address").style="background:#bdc3c7; "
                element("wallet").style="background:#2c3e50; "
                element("trans").style="background:#2c3e50; "
                listen("add_address", "click", function(event){
                    add_bitcoin_address()
                })
            })
            element("wallet").click()
        }, function(error){

        })

        add_bitcoin_address = function(){
            request({
                method:"POST",
                url:"api/api.py.php?_=account&a=request_change&t=add",
                formdata:false
            }).then(function(response){
                response = JSON.parse(response)
                element("view").innerHTML=response.view
            }, function(error){})
        }
        
    }]
    
})
