
angular.module("appCore")
.factory("element", function(){
    return function(ele){
        return document.getElementById(ele)
    }
})
.factory("listen", ["element", function(element){
    return function(ele, event, func){
        return element(ele).addEventListener(event, func) 
    }
}])
.factory("isEmpty", [function(){
    return function isEmpty(obj) {
        for(var key in obj) {
            if(obj.hasOwnProperty(key))
                return false;
        }
        return true;
    }
}])
.factory("wait", [function(){
    return function wait(time, func){
        setTimeout(func, time)
    }
}])