
angular.module("siteIndex")
.component("siteIndex", {
    templateUrl:"api/api.py.php?_=MainSite&a=gs",
    controller:["data", function(data){
        this.baseurl = data.baseurl
        this.redirect_login = function(){
            window.location.replace("login/")
        }
    }]
})

