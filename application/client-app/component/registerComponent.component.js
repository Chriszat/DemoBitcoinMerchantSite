
angular.module("register")
.controller("registerCtrl", ["$scope", "$http", "request", "element", "overlay", function($scope, $http, request, element, overlay){
    
   element("register_form").addEventListener("submit", function(event){
       event.preventDefault();
       register()
   })

   if(element("validate")){
    element("validate").addEventListener("click", function(event){
        btn = document.getElementById("validate");
        spin = document.getElementById("spinner")
        btn.setAttribute("disabled", "disabled")
        spin.style.display="inline-block"
        check_mail_confirmation()
    })
   }
  

   register = function register(){
       overlay.show()
       form = element("register_form")
       data = new FormData(form)
       request({
           method:"POST",
           url:"../api/api.py.php?_=reg&a=register",
           formdata:true,
           data:data

       }).then(function(response){
           response = JSON.parse(response);
           if(response.status == "error"){
               element("error").innerHTML = response.message
               element("error").style.padding="15px;"
               overlay.hide()
           }else if(response.status =="success"){
               window.location = response.redirect;
               form.reset();
           }
       }, function(error){
           //TODO 
       })
    }

    check_mail_confirmation = function(){
        request({
            method:"POST",
            url:"../api/api.py.php?_=reg&a=is_confirmed",
            formdata:false
        }).then(function(response){
            response = JSON.parse(response);
            if(response.status == 'success'){
                window.location = location.pathname+'wallet/';
            }else if (response.status == 'error'){
                element("e").innerHTML = '<p class="text-center h5 text-capitalize red "><span class="red">X</span>&nbsp;&nbsp;&nbsp;Email Not Confirmed</p>';

                element("e").style.display="block";
                btn = document.getElementById("validate");
                spin = document.getElementById("spinner")
                setTimeout(function(){
                    btn.removeAttribute("disabled")
                }, 5000)
                spin.style.display="none"
            }
        }, function(error){

        })
    }

    resend_email = function(){
        overlay.show()
        request({
            method:'POST',
            url: "../api/api.py.php?_=reg&a=resend_link",
            formdata:false
        }).then(function(response){
            response = JSON.parse(response);
            if(response.status == 'success'){
                overlay.hide()
            }else if (response.status =='error'){
                element("e").innerHTML = '<p class="text-center h5 text-capitalize red "><span class="red">X</span>&nbsp;&nbsp;&nbsp;'+response.message+'</p>'
            }
        }, function(error){

        })
    }
   
}])