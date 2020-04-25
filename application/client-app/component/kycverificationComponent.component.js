
angular.module("appCore")

    .component("kycverificationComponent", {
        templateUrl: "api/api.py.php?_=Profile&a=kycVerificationView",
        controller: ["element", "request", "listen", "isEmpty", "$routeParams", "wait", "$route", function (element, request, listen, isEmpty, $routeParams, wait, $route) {

            let validateImage = function(file){
                
                let allowed_file_ext = ["jpg", "png", "jpeg"];
               
                if (file === undefined) {
                    element("upload_btn").setAttribute("disabled", "disabled");
                    return false
                }
                if (allowed_file_ext.indexOf(file['type'].split("/")[1]) === -1) {
                    alertify.error("<span style='color:#fff' >Unsupported file type</span>");
                    element("upload_btn").setAttribute("disabled", "disabled");
                    return false
                }

                return file;
            }

            let previewSelectedImage = function (evt) {
                let file = evt.target.files[0];
                x = validateImage(file);
                if(x !== false){
                    let filereader = new FileReader();
                    filereader.onload = function (evt) {
                        element("preview").src = filereader.result
                        element("upload_btn").removeAttribute("disabled");
                    }
                    filereader.readAsDataURL(file);
                }
            
            }

            listen("file", "change", previewSelectedImage)
           
            let uploadKycDocuments = function (evt) {
                evt.preventDefault();
                evt.stopPropagation();
                file = element("kyc_form").file.files[0];
                if(validateImage(file) === false){
                    alertify.error("<span style='color:#fff' >Unsupported file type</span>");
                    return 
                }
                formdata = new FormData(element("kyc_form"));

                request({
                    method: "POST",
                    url: "api/api.py.php?_=profile&a=uploadKYCDocuments",
                    formdata: true, 
                    data:formdata
                }).then(function (response) {
                    response = JSON.parse(response)
                    if (response.status == "success") {
                        element("view").innerHTML = `<div class="card" style="margin: 0 auto; width:700px; max-width:100%">
                        <div class="card-content">
                            <div class="head-content">
                                <div class="center">
                                    <br>
                                    <p style="font-size:20px; font-family: 'Open Sans', sans-serif; color:green"><b>
                                       KYC DOCUMENTS SUBMITTED </b></p>
                    
                                </div>
                            </div>
                            <br>
                            <div class="card-body" style="user-select:none;padding:10px; text-align:center;" id="bt">
                                <div style="width:100px; margin:0 auto; max-width:100%">
                                    <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/mark2.png" alt="" style="width:100%" draggable="false">
                                </div><br>
                                <h4><span >
                               Your kyc documents has been submitted for review. We shall notify you once it has been approved.
                            </h4>
                                <br><br>
                                
                            </div>
                        </div>
                    </div>`
                    }
                })
            }

            listen("kyc_form", "submit", uploadKycDocuments)

        }]
    })

