 
 <body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-compact-menu" data-col="1-column" ng-app="register" ng-controller="registerCtrl">
 <link rel="stylesheet" href="<?php echo baseurl ?>application/views/user/country-select-js-master/build/css/countrySelect.css">
 <!-- ////////////////////////////////////////////////////////////////////////////-->
 <div class="app-content content">
   <div class="content-wrapper">
     <div class="content-header row">
     </div>

     <div class="content-body">
       <!-- Demo options menu -->

<!--/ Demo fullscreen-overlay --><section id="account-login" class="flexbox-container"> 
       
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
                        <p class="text-center h5 text-capitalize">Sign Up</p>
                        
                        <form class="form-horizontal form-signin" action="" method="POST" id="register_form">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>" />
                            <fieldset class="form-label-group">
                                <input type="email" class="form-control" name="email" id="user-password" placeholder="Your Email" required="" autofocus="">
                                <label for="user-password">Email address</label>
                            </fieldset>             
                            <fieldset class="form-label-group">
                                <input type="password" class="form-control"  name="password" id="user-name" placeholder="Your Password" required="" autofocus="">
                                <label for="user-name">Password</label>
                            </fieldset>

                            <fieldset class="form-label-group" >
                                <input type="text" name="country" class="form-control" id="country" placeholder="Country" value="<?php echo $data['country'] ?>" required="" autofocus="" style="width:250px; max-width:100%">
                                <!-- <label for="country">Password</label> -->
                            </fieldset>
                           
                            <div class="form-group row">
                                <div class="col-12 text-center text-sm-left">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" name="agree" class="chk-remember">
                                        <label for="remember-me"> I agree to <?php echo "<b>".$sitename."</b>" ?> terms</label>
                                    </fieldset>
                                </div>                                
                            </div>
                            <button type="submit" class="btn-gradient-primary btn-block my-1">Sign Up</button>
                            <p class="text-center"><a href="<?php echo baseurl ?>login/" class="card-link">Log In</a></p>
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
 
 