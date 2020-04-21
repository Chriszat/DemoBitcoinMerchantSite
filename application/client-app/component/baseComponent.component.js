angular.module("appCore")
.controller("baseController", ["element", "request", "listen", function(element, request, listen){
    listen("notification_link", "click", function(){
        request({
            method:"POST",
            url:"api/api.py.php?_=dashboard&a=get_notifications",
            formdata:false
        }).then(function(response){
            element("notification_list").innerHTML=response
        }, function(error){

        })
    })

    /**
     * Get notification count
     */
    request({
        method:"POST",
        url:"api/api.py.php?_=dashboard&a=count_notification",
        formdata:false
    }).then(function(response){
        element("count1").innerHTML=response
        element("count2").innerHTML=response+" New"
    }, function(error){

    })
}])