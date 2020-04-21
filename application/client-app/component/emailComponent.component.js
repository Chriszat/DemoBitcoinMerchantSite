angular.module("appCore")
.component("emailComponent", {
    templateUrl:"api/api.py.php?_=profile&a=add_email",
    controller:["element", "request", "listen", "overlay","$route", function(element, request, listen, overlay, $route){

        request_name_change = function(type){
            request({
                method:"POST",
                url:"api/api.py.php?_=profile&a=request_change&t="+type,
                formdata:false
            }).then(function(response){
                element("view").innerHTML=response
                update_new_email();
                request_add_new_email()
                if(element("back")){
                    listen("back", "click", function(event){
                        // var currentPageTemplate = $route.current.locals.$template;
                        // console.log($route)
                        // console.log($templateCache)
                        // $templateCache.remove(currentPageTemplate);
                        $route.reload();
                    })
                }
            }, function(error){

            })
        }

        add_new_email = function(){
            data = new FormData()
            data.append("email", element("email_new").value)
            overlay.show()
            request({
                method : "POST",
                url : "api/api.py.php?_=profile&a=add_new_email",
                formdata:true,
                data:data
            }).then(function(response){
                response = JSON.parse(response)
                overlay.hide()
                if(response.status == 'success'){
                    $route.reload();
                    alertify.success(response.message).dismissOthers()
                }
            }, function(error){

            })
        }

        request_add_new_email = function(){
            if(element("add_new_email")){
                listen("add_new_email", "click", function(event){
                    alertify.confirm('<h3>Please Confirm</h3>', "You're about to add <b>"+element("email_new").value+"</b>", function(){ add_new_email() }
                , function(){ }).set({'closableByDimmer': false, transition:'fade'})
                })
            }
        }

         /**
         * Launches the new email input field view
         */
        update_new_email = function(){
            if(element("update_new_email")){
                listen("update_new_email", "click", function(event){
                    request_name_change("new_email");
                })
            }

        }

        /**
         * Deletes email 
         */
        remove = function(id,email){
            
            alertify.confirm('<h3>Please Confirm</h3>', "You're about to delete <b>"+email+"</b>", function(){
                parent = document.getElementById("email_table");
                child = document.getElementById(id)
                parent.removeChild(child)
                data = new FormData()
                data.append("id", id)
                request({
                    method:"POST",
                    url:"api/api.py.php?_=profile&a=remove",
                    formdata:true,
                    data:data
                }).then(function(respnose){

                }, function(error){})
            }
            , function(){ }).set({'closableByDimmer': false, transition:'fade'})
        }
        

        update_new_email()
    }]
})