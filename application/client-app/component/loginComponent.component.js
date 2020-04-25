
angular.module("login")
.controller("loginCtrl", ["element", "overlay", "request", function(element, overlay, request){
    element("login_form").addEventListener("submit", function(event){
        event.preventDefault()
        login()
    })

    login = function (){
        overlay.show();
        form = element("login_form");
        data = new FormData(form)
        window.scrollTo(0,0)
        
        request({
            method:"POST",
            url : "../api/api.py.php?_=log&a=login",
            formdata:true,
            data:data

        }).then(function(response){
            overlay.hide();
            response = JSON.parse(response)
            if(response.status == "success"){
                window.location = response.redirect
            }else if(response.status == 'error'){
                
                element("error").innerHTML= response.message;
                element("error").style.padding="3px"
            }
        }, function(error){

        })
    }
    
    resend_email = function(email){
        overlay.show()
        data = new FormData()
        data.append("email", email);
        btn = document.getElementById("resend");
        spin = document.getElementById("spinner")
        btn.setAttribute("disabled", "disabled")
        spin.style.display="inline-block"
        request({
            method:'POST',
            url: "../api/api.py.php?_=reg&a=resend_link",
            formdata:true,
            data: data
        }).then(function(response){
            overlay.hide();
            btn = document.getElementById("resend");
            spin = document.getElementById("spinner")
            setTimeout(function(){
                btn.removeAttribute("disabled")
            }, 5000)
            spin.style.display="none"
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