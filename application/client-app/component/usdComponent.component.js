
angular.module("appCore")

.component("usdComponent", {
    templateUrl:"api/api.py.php?_=account&a=usd",
    controller:["element", "request", "listen", "isEmpty", "$routeParams", function(element, request, listen, isEmpty, $routeParams){
        console.log($routeParams)
       quote = "btc";
      
       
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
                if(element("add_address")){
                    listen("add_address", "click", function(event){
                        add_bitcoin_address()
                    })
                }
               
                listen("6051019cc4f58b2d132c3323d37636cb", "submit", placeWithdraw)
            })
            element("wallet").click()

            if(!isEmpty($routeParams)){
                quote = $routeParams.quote
                if($routeParams.hasOwnProperty("tab")){
                    switch($routeParams["tab"]){
                        case "withdraw":
                            element("address").click();
                         break;
                    }
                }
            }
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

        let placeWithdraw = function(evt){
            evt.preventDefault()
            evt.stopPropagation();
            formdata = new FormData(element("6051019cc4f58b2d132c3323d37636cb"))
            request({
                method:"POST",
                url:"api/api.py.php?_=account&a=placeWithdraw",
                formdata:true,
                data : formdata
            }).then(function(response){
                response = JSON.parse(response)
                if(response.status == 'success'){
                    element("6051019cc4f58b2d132c3323d37636cb").reset()
                    alertify.success(`<span style='color:#fff' >${response.message}</span>`);
                }else{
                    alertify.error(`<span style='color:#fff' >${response.message}</span>`);
                }
               
            }, function(error){})
        }

        
        
    }]
    
})
