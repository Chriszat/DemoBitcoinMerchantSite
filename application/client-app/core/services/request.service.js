
angular.module("appCore")
.factory("request", function(){
    return function(param={async:true, formdata:false}){
        var promise = new Promise(function(resolve, reject){
            var ajax = new XMLHttpRequest()
            ajax.open(param.method, param.url, true)
            if(param.formdata == true){
                ajax.send(param.data)
            }else{
                ajax.send()
            }
            ajax.onreadystatechange= function(){
                if(ajax.readyState==4 && ajax.status==200){
                    resolve(ajax.responseText)
                }
            }
            // console.log(ajax);
        })
        
        return promise
        
    }
})