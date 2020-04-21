angular.module("appCore")
.component("buyComponent", {
    templateUrl:"api/api.py.php?_=buy&a=index",
    controller:["element", "request", "listen", "overlay", "$route", "$routeParams", "isEmpty", function(element, request, listen,overlay, $route, $routeParams, isEmpty){
       if(!isEmpty($routeParams)){
           if($routeParams.quote == "e"){
               element("c1").style="display:none;"

           }else if($routeParams.quote == "b"){
               element("c2").style="display:none;"
           }
       }
       listen("bt", "click", function(event){
           if(element("c1").style.display=="none"){
               element("c1").style="display:block;"
           }else{
               element("c1").style="display:none;"
           }
           
       })

       listen("bt2", "click", function(event){
           if(element("c2").style.display=="none"){
               element("c2").style="display:block;"
            }else{
                element("c2").style="display:none;"
            }
        })

        listen("buy_bitcoin_eth", "click", function(event){
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=buy_bitcoin_eth&t=eth&x=b&y=e",
                formdata:false
            }).then(function(response){
                response = JSON.parse(response)
               element("view").innerHTML=response.view
            
               listen("check_on", "click", function(event){
                validate_bitcoin_wallet(response.t)
               });
               listen("back_btn", "click", function(event){
                   $route.reload()
               })
                
            }, function(error){

            })
        })

        listen("buy_bitcoin_usd", "click", function(event){
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=buy_bitcoin_eth&t=usd&x=b&y=u",
                formdata:false
            }).then(function(response){
                response = JSON.parse(response)
               element("view").innerHTML=response.view
            
               listen("check_on", "click", function(event){
                validate_bitcoin_wallet(response.t)
               });
               listen("back_btn", "click", function(event){
                   $route.reload()
               })
                
            }, function(error){

            })
        })

        /**
         * Ethereum Purchase
         */
        listen("buy_ethereum_usd", "click", function(event){
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=buy_bitcoin_eth&t=usd&x=e",
                formdata:false
            }).then(function(response){
                response = JSON.parse(response)
               element("view").innerHTML=response.view
               listen("check_on_eth", "click", function(event){
                validate_ethereum_wallet(response.t)
               });
               listen("back_btn", "click", function(event){
                   $route.reload()
               })
                
            }, function(error){

            })
        })

        /**
         * Ethereum Purchase with btc
         */
        listen("buy_ethereum_btc", "click", function(event){
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=buy_bitcoin_eth&t=btc&x=e",
                formdata:false
            }).then(function(response){
                response = JSON.parse(response)
               element("view").innerHTML=response.view
               listen("check_on_eth", "click", function(event){
                validate_ethereum_wallet(response.t)
               });
               listen("back_btn", "click", function(event){
                   $route.reload()
               })
                
            }, function(error){

            })
        })

        /**
         * Processes and validate bitcoin buying.
         */
        validate_bitcoin_wallet = function(type){
            form = element("Btc_form");
            data = new FormData(form)
            data.append("amount", element("amount").value)
            if(isNaN(data.get("amount")) || data.get("amount") == ""){
                return false;
            }
            
            overlay.show();
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=check_bitcoin&t="+type,
                formdata:true,
                data:data
            }).then(function(response){
                overlay.hide()
                response = JSON.parse(response)
                if(response.status == 'success' && response.bool == 'true'){
                    element("view").innerHTML = response.view;
                    listen("cancel", "click", function(event){
                        cancel_purchase()
                    })
                    listen("confirm", "click", function(event){
                        confirm_purchase()
                    })
                }else{
                    alertify.error(response.message).dismissOthers() ;
                }
            }, function(error){

            })
        }


         /**
         * Processes and ethereum bitcoin buying.
         */
        validate_ethereum_wallet = function(type){
            form = element("Btc_form");
            data = new FormData(form)
            
            data.append("amount", element("amount").value)
            if(isNaN(data.get("amount")) || data.get("amount") == ""){
                return false;
            }
            
            overlay.show();
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=check_ethereum&t="+type,
                formdata:true,
                data:data
            }).then(function(response){
                overlay.hide()
                response = JSON.parse(response)
                if(response.status == 'success' && response.bool == 'true'){
                    element("view").innerHTML = response.view;
                    listen("cancel", "click", function(event){
                        cancel_purchase()
                    })
                    listen("confirm", "click", function(event){
                        confirm_purchase()
                    })
                }else{
                    alertify.error(response.message).dismissOthers() ;
                }
            }, function(error){

            })
        }

        confirm_purchase = function(){
            request({
                method:"POST",
                url:"api/api.py.php?_=buy&a=purchase",
                formdata:false,
            }).then(function(response){
                response = JSON.parse(response)
                element("view").innerHTML = response.view;
                element("current_btc").innerHTML=response.t
                listen("done", "click", function(event){
                    $route.reload()
                })
            }, function(error){

            })
        }
        
        
        cancel_purchase = function(){
            $route.reload()            
        }


    }]
})