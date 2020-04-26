<body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-compact-menu" data-col="1-column" ng-app="login" ng-controller="loginCtrl">

    <style>
        .z-depth-2 {
            -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
            box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);

        }
    </style>
    <!-- ///////////////////////////////////////////<input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>" />/////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Demo options menu -->
                <div class="z-depth-2" style="background:#d63031; color:#fff" id="error">

                </div>
                <?php if(isset($_GET['f'])): ?>
                <div class="alert alert-success ">
                   <i class="icon-check"></i> Your email has been verified, enter your details to login
                </div>
                <?php endif; ?>
                <!--/ Demo fullscreen-overlay -->
                <section id="account-login" class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <!-- image -->

                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0 text-center d-none d-md-block">
                            <div class="border-grey border-lighten-3 m-0 box-shadow-0 card-account-left height-400">
                                <img src="<?php echo baseurl ?>application/views/user/app-assets/images/pages/account-login.png" class="card-account-img width-200" alt="card-account-img">
                            </div>
                        </div>

                        <!-- login form -->
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">

                            <div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-400">

                                <div class="card-content">

                                    <div class="card-body p-3">

                                        <p class="text-center h5 text-capitalize">Welcome to <?php echo "<b>" . $data["sitename"] . "</b>" ?>!</p>
                                        <p class="mb-3 text-center">Please enter your login details</p>
                                        <form class="form-horizontal form-signin" action="" method="POST" id="login_form">
                                            <div id="e"></div>

                                            <fieldset class="form-label-group">
                                                <input type="text" class="form-control" name="email" id="user-email" placeholder="Your Email" required="" autofocus="">
                                                <label for="user-email">Email</label>
                                            </fieldset>
                                            <fieldset class="form-label-group">
                                                <input type="password" class="form-control" name="password" id="user-password" placeholder="Enter Password" required="" autofocus="">
                                                <label for="user-password">Password</label>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-sm-left">
                                                    <!-- <fieldset>
                                        <input type="checkbox" id="remember-me" name="remember" class="chk-remember">
                                        <label for="remember-me"> Remember</label>
                                    </fieldset> -->
                                                </div>
                                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn-gradient-primary btn-block my-1">Log In</button>
                                            <p class="text-center"><a href="<?php echo baseurl ?>register/" class="card-link">Register</a></p>
                                        </form>
                                    </div>
                                </div>
                                <div id="overlay"></div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->