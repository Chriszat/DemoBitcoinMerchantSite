
angular.module("appCore")
.factory("data", function(){
    return {
        baseurl:location.origin+location.pathname
    }
})