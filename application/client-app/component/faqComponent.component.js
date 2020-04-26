angular.module("appCore")
    .component("faqComponent", {

        templateUrl: "api/api.py.php?_=dashboard&a=faqIndex",
        controller: ["element", "request", function (element, request) {

            let clipboard = new ClipboardJS('.bb');
            clipboard.on('success', function (e) {
                alertify.success("<span style='color:#fff'>Copied!</span>").dismissOthers()
            });


        }]

    })
