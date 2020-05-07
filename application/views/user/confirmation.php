 
 <body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-compact-menu" data-col="1-column" ng-app="register" ng-controller="registerCtrl">
 <link rel="stylesheet" href="<?php echo baseurl ?>application/views/user/country-select-js-master/build/css/countrySelect.css">
 <!-- ////////////////////////////////////////////////////////////////////////////-->
 <style>
 .z-depth-2 {
    -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
            box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
            
  }
  </style>
  
 <div class="app-content content">
   <div class="content-wrapper">
     <div class="content-header row">
     </div>

     <div class="content-body">
       <!-- Demo options menu -->

<!--/ Demo fullscreen-overlay --><section id="account-login" class="flexbox-container"> 
       
 <div class="col-12 d-flex align-items-center justify-content-center">
    
     <!-- login form -->
     
 <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
 <div class="z-depth-2" id="e" style="background:#f2f2f2; padding:5px; display:none; cursor:pointer; user-select:none">

 </div>

            <div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-400 z-depth-2">  

                <div class="card-content">     
                                   
                    <div class="card-body">
                        
                        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center">
                        <p><img src="../81744546ec70b93f065c7321407215727ea39750f52b909dcb/confirm_email.refresh.png" /></p> 
                        <p class="text-center h5 text-capitalize">We have sent a confirmation email to your address</p>
                        <p><b>Please check your inbox or spam box for a link</b></p>
                        <a href="mailto:<?php echo $data['c_mail'] ?>"><?php echo $data['c_mail'] ?></a><br><br><br>
                       <a href="<?php echo baseurl.'login/?c=1' ?>">
                       <button class="waves-effect waves-light btn" id="validate"><div class="lds-ring" style="display:none" id="spinner"><div></div><div></div><div></div><div></div></div>&nbsp;&nbsp;&nbsp;I HAVE CONFIRMED ALREADY</button>
                       </a>
                        <hr>
                        <a href="javascript:void(0)" id="resend" onclick="resend_email()">Resend Link</a>
                        </div>
                    </div>     
                                   
                </div>
                
 <div id="overlay"></div>

            </div>

        </div> 

 </div>    
</section>
<form id="register_form"></form>

     </div>
   </div>
 </div>
 <!-- ////////////////////////////////////////////////////////////////////////////-->
 