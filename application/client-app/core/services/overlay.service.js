
angular.module("appCore")
.factory("overlay", ["element", function(element){
    return {

        show:function(dom = "overlay"){
            overlays = element(dom);
            overlays.innerHTML=' <!--overlay--><div style="position: absolute; z-index:99999999; top:0; left:0; background:#fff; opacity:0.85; width:100%; height:100%"> <div style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%)"><div class="lds-ring" style="" id="spinner"><div></div><div></div><div></div><div></div></div></div></div><!--end overlay-->'
        },

        hide:function(dom = "overlay"){
            overlays = element(dom)
            overlays.innerHTML = "";
        }
        
    }
}])
.factory("randomId", function(){
    return function(){
        return Math.round(Math.random(100000)*1000000);
    }
})
.factory("show_response", ["element", function(element){
    return {

        show:function(data="", dom = "response"){
            overlays = element(dom);
            if(data.status == "success"){
                overlays.innerHTML=' <!--response--><div class="z-depth-2" style="height:30px; text-align:center; display:flex; justify-content:center; align-items:center; color:green; margin-bottom:20px">'+data.message+'</div><!--end response-->'
            }else{
                overlays.innerHTML=' <!--response--><div class="z-depth-2" style="height:30px; text-align:center; display:flex; justify-content:center; align-items:center; color:red">'+data.message+'</div><!--end response-->'
            }
            
        },

        hide:function(dom = "response"){
            overlays = element(dom)
            overlays.innerHTML += "";
        }
        
    }
}])
.factory("feed", function(){
    return function feeds(data){
        var file;
        switch (data.type){
            case "image":
            file='<img src="'+data.image+'" alt="">';
            break;
            case "video":
            file ='<video src="'+data.image+'" alt="" controls style="width:100%"></video>';
        }
        
       return '<!--Feeds--><div class="feed-content"><div class="feeds z-depth-2"><div class="feeds-media">'+file+'</div><div class="feed-text">'+data.text+'</div><!-- floating --><div style="position:relative"><div style="position:relative!important"><div class="fixed-action-btn" style="position:absolute!important"><a class="btn-floating red"><i class=" material-icons">mode_edit</i></a><ul><li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li><li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li><li><a class="btn-floating green"><i class="material-icons">publish</i></a></li><li><a class="btn-floating blue"><i class="material-icons">attach_file</i></</div></div><!--end floating--></div></div><!-- end feeds -->';
    }
})

.factory("count", function(){
    return function count(obj){
        increment = 0;
        for (var i in obj){
            increment++
        }
        return increment;
    }
})

.factory("get_feeds", ["element", function(element){
    
    return function get_feeds(data){
        var file;
        switch (data.type){
            case "image":
            file='<img src="uploads/'+data.image+'" alt="">';
            break;
            case "video":
            file ='<video src="uploads/'+data.image+'" alt="" controls style="width:100%"></video>';
        }
        if(data.type == undefined){
            return;
            
        }
       return '<!--Feeds--><div class="feed-content"><div class="feeds z-depth-2"><div class="feeds-media">'+file+'</div><div class="feed-text">'+data.text+'</div><!-- floating --><div style="position:relative"><div style="position:relative!important"><div class="fixed-action-btn" style="position:absolute!important"><a class="btn-floating red"><i class=" material-icons">mode_edit</i></a><ul><li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li><li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li><li><a class="btn-floating green"><i class="material-icons">publish</i></a></li><li><a class="btn-floating blue"><i class="material-icons">attach_file</i></</div></div><!--end floating--></div></div><!-- end feeds -->';
    }
}])

.factory("getLastId", function(){
    return function(obj){
        for(var i in obj){
            if(i=='lid'){
                return obj[i];
            }else if(i == 'no_result'){
                return 'no_data';
            }
        }
    }
})