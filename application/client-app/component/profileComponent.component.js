angular.module("appCore")
    .component("profileComponent", {
        templateUrl: "api/api.py.php?_=profile&a=index",
        controller: ["element", "request", "listen", "$route", "overlay", "$templateCache", function (element, request, listen, $route, overlay, $templateCache) {

            request_name_change = function (type) {
                request({
                    method: "POST",
                    url: "api/api.py.php?_=profile&a=request_change&t=" + type,
                    formdata: false
                }).then(function (response) {
                    element("view").innerHTML = response
                    update_name();
                    update_email();
                    update_phone()
                    update_country()
                    update_new_email();
                    request_add_new_email()
                    if (element("back")) {
                        listen("back", "click", function (event) {
                            $route.reload();
                        })
                    }
                    if (element("push_note")) {
                        listen("push_note", "click", function (event) {
                            save_preferences(element("notification"), "notification");
                        })
                    }

                    if (element("push_email")) {
                        listen("push_email", "click", function (event) {
                            save_preferences(element("security_emails"), "security_emails");
                        })
                    }

                }, function (error) {

                })
            }

            update_profile = function (type) {
                data = new FormData()
                data.append(type, element(type).value)
                data.append("t", type)
                request({
                    method: "POST",
                    url: "api/api.py.php?_=profile&a=update_profile",
                    formdata: true,
                    data: data
                }).then(function (response) {
                    response = JSON.parse(response);
                    if (response.status == "error") {
                        alertify.error(response.message).dismissOthers()
                    } else if (response.status == "success") {
                        alertify.success(response.message).dismissOthers()
                        $route.reload()
                        setTimeout(function () {
                            element("display_" + type).innerHTML = response.data

                        }, 1000)
                    }
                }, function (error) {

                })
            }

            add_new_email = function () {
                data = new FormData()
                data.append("email", element("email_new").value)
                overlay.show()
                request({
                    method: "POST",
                    url: "api/api.py.php?_=profile&a=add_new_email",
                    formdata: true,
                    data: data
                }).then(function (response) {
                    response = JSON.parse(response)
                    overlay.hide()
                    if (response.status == 'success') {

                        alertify.success(response.message).dismissOthers()
                    }
                }, function (error) {

                })
            }

            update_name = function () {
                if (element("update_name")) {
                    listen("update_name", "click", function (event) {
                        update_profile("name");
                    })
                }
            }

            update_email = function () {
                if (element("update_email")) {
                    listen("update_email", "click", function (event) {
                        update_profile("email");
                    })
                }
            }

            update_phone = function () {
                if (element("update_phone")) {
                    listen("update_phone", "click", function (event) {
                        update_profile("phone");
                    })
                }
            }

            update_country = function () {
                if (element("update_country")) {
                    listen("update_country", "click", function (event) {
                        update_profile("country");
                    })
                }
            }

            request_add_new_email = function () {
                if (element("add_new_email")) {
                    listen("add_new_email", "click", function (event) {
                        alertify.confirm('<h3>Please Confirm</h3>', "You're about to add <b>" + element("email_new").value + "</b>", function () { add_new_email() }
                            , function () { }).set({ 'closableByDimmer': false, transition: 'fade' })
                    })
                }
            }

            /**
             * Launches the new email input field view
             */
            update_new_email = function () {
                if (element("update_new_email")) {
                    listen("update_new_email", "click", function (event) {
                        request_name_change("new_email");

                    })
                }

            }
            /**
             * Eventlisten for call view change
             */
            listen("name", "click", function (event) {
                request_name_change("name")
            })
            // listen("email", "click", function(event){
            //     request_name_change("email");
            // })
            listen("phone", "click", function (event) {
                request_name_change("phone");
            })
            listen("country", "click", function (event) {
                request_name_change("country");
            })
            listen("comm", "click", function (event) {
                request_name_change("comm");
            })
            listen("ver", "click", function (event) {
                request_name_change("ver");
            })

            /**
             * Save preferences for users
             */
            save_preferences = function (check_box, d_name) {
                data = new FormData()
                if (check_box.checked == true) {
                    check_box.checked = true
                    data.append(d_name, "n")
                } else if (check_box.checked == false) {
                    console.log("locked")
                    check_box.checked = false
                    data.append(d_name, "y")
                }
                request({
                    method: "POST",
                    url: "api/api.py.php?_=profile&a=preferences",
                    formdata: true,
                    data: data
                }).then(function (response) {
                    response = JSON.parse(response)
                    console.log(response)
                }, function (error) {

                })
            }


            let validateImage = function (file) {

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
                if (x !== false) {
                    let filereader = new FileReader();
                    filereader.onload = function (evt) {
                        element("preview").src = filereader.result
                        element("upload_btn").removeAttribute("disabled");
                    }
                    filereader.readAsDataURL(file);
                }

            }

            listen("file", "change", previewSelectedImage)


            let uploadIdentityPhoto = function (evt) {
                evt.preventDefault();
                evt.stopPropagation();
                file = element("identity_form").file.files[0];
                if (validateImage(file) === false) {
                    alertify.error("<span style='color:#fff' >Unsupported file type</span>");
                    return
                }
                formdata = new FormData(element("identity_form"));

                request({
                    method: "POST",
                    url: "api/api.py.php?_=profile&a=uploadIdentityPhoto",
                    formdata: true,
                    data: formdata
                }).then(function (response) {
                    response = JSON.parse(response)
                    if (response.status == "success") {
                        element("identity_pix").src=response.image
                        alertify.success("<span style='color:#fff'>Identity photo uploaded</span>");
                        return
                    } else {
                        alertify.error("<span style='color:#fff'>Could not make changes to your photo at the moment.</span>");
                        return
                    }
                })
            }

            listen("identity_form", "submit", uploadIdentityPhoto)

        }]
    })