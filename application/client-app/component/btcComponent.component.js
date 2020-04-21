
angular.module("appCore")

.component("btcComponent", {
    templateUrl:"api/api.py.php?_=account&a=btc",
    controller:["element", "request", "listen", "isEmpty", "$routeParams", "wait", "$route", function(element, request, listen, isEmpty, $routeParams, wait, $route){
       quote = "btc";
       if(!isEmpty($routeParams)){
           quote = $routeParams.quote
       }
       var wallet_view ='';
       var trans_view = '';
       var address_view = '';
       var bitcoin_address = '';
       var qrcode_path  = '';
        request({
            method:"POST",
            url:"api/api.py.php?_=account&a=btc&t",
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
            
                
        
        }, function(error){

        })

        add_bitcoin_address = function(){
            request({
                method:"POST",
                url:"api/api.py.php?_=account&a=request_change&t=add&b=Bitcoin",
                formdata:false
            }).then(function(response){
                response = JSON.parse(response)
                element("view").innerHTML=response.view
                listen("create", "click", function(event){
                    create_address();
                })
               
                listen("cancel", "click", function(event){
                    $route.reload();
                    wait(1000, function(){
                        element("tab_view").innerHTML = address_view
                        element("address").style="background:#bdc3c7; "
                        element("wallet").style="background:#2c3e50; "
                        element("trans").style="background:#2c3e50; "
                        
                    })
                    
                })
                
            }, function(error){})
        }

        create_address = function(){
            data = new FormData()
            data.append("label", element("label").value)
            if(data.get("label") == ""){
                return;
            }
            request({
                method:"POST",
                url:"api/api.py.php?_=account&a=add_address",
                formdata:true,
                data:data
            }).then(function(response){
                response = JSON.parse(response)
                if(response.status == "success"){
                    address = response.address 
                    $route.reload()
                    wait(100, function(){
                        element("address").click()

                        // element("tab_view").innerHTML = address_view
                        element("address").style="background:#bdc3c7; "
                        element("wallet").style="background:#2c3e50; "
                        element("trans").style="background:#2c3e50; "
                    })
                    // wait(1000, function(){
                    //     element("address_table").innerHTML += response.data

                    // })
                }else if(response.status =='error'){
                    alertify.error(response.message)
                }
            }, function(error){

            })
        }

        bitcoin_pan_view = function(id){
            data = new FormData()
            data.append("bit_id", id)
            request({
                method:"POST",
                url:"api/api.py.php?_=account&a=bit_pan_view",
                formdata:true,
                data:data
            }).then(function(response){
                response = JSON.parse(response)
                element("tab_view").innerHTML= response.view;
                listen("goback", "click", function(){
                    tab_view.innerHTML = address_view;
                })
                let clipboard= new ClipboardJS('.bb');
                    clipboard.on('success', function(e) {
                        alertify.success("<span style='color:#fff'>Copied!</span>").dismissOthers()
                    });
                bitcoin_address = response.address;
                qrcode_path = response.qrcode_image
                listen("amount", "input", function(event){
                    value = element("amount").value
                    if(value !=""){
                        bitcoin_qrcode(value)
                    }else{
                        // element("qrimg").removeAttribute("style")
                        element("qrimg").src=response.qrcode_image;
                    }
                })
                
            }, function(error){})
        }

        bitcoin_qrcode = function(amount){
            qcode = amount;
            var qr = new QRious({value:qcode, size:200});
            dataurl= qr.toDataURL();
            element("qrimg").src=dataurl

        }
       
    }]
})