angular.module("appCore")
    .component("faqComponent", {

        templateUrl: "api/api.py.php?_=dashboard&a=faqIndex",
        controller: ["element", "request", "overlay", function (element, request, overlay) {

            let clipboard = new ClipboardJS('.bb');
            clipboard.on('success', function (e) {
                alertify.success("<span style='color:#fff'>Copied!</span>").dismissOthers()
            });

            loadQuestions = function(id){
                overlay.show();
                formdata = new FormData();
                formdata.append("id", id);
                request({
                    method:"POST",
                    url:"api/api.py.php?_=dashboard&a=loadFaqQuestions",
                    formdata:true,
                    data:formdata
                }).then(function(response){
                    overlay.hide();
                    element("accordion").innerHTML = response
                })
            }


        }]

    })
