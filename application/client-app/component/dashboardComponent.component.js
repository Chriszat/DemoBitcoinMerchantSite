angular.module("appCore")
.component("dashboardComponent", {

    templateUrl:"api/api.py.php?_=dashboard&a=index",
    controller:["element", "request", function(element, request){
        if(element("lets_go")){
            element("lets_go").addEventListener("click", function(){
                 request({
                     method:"POST",
                     url:"api/api.py.php?_=dashboard&a=cards",
                     formdata:false
                 }).then(function(response){
                     element("view").innerHTML=response; 
                 }, function(error){
 
                 })
             })
 
            }
    }]
    
})
