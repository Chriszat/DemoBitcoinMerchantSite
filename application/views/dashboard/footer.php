
</div>
<!-- <footer class="footer footer-static footer-transparent">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer> -->
    <script type="text/javascript" src="application/shared/alertify.js" ></script>
    <!-- BEGIN VENDOR JS-->
    <script src="application/views/user/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- <script src="application/views/user/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script> -->
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- <script src="application/views/user/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="application/views/user/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script> -->
    <script src="application/views/user/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    

    <script src="application/views/user/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="application/views/user/app-assets/js/core/app.min.js" type="text/javascript"></script>
   
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- <script src="application/views/user/app-assets/js/scripts/pages/dashboard-ico.min.js" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL JS-->

     <!-- BEGIN PAGE LEVEL JS-->
     <script src="application/views/user/app-assets/js/scripts/forms/account-profile.min.js" type="text/javascript"></script>
     <script src="application/shared/qrious-master/dist/qrious.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="<?php echo baseurl ?>application/views/user/country-select-js-master/build/js/countrySelect.min.js"></script> 

    <script>

    alertify.defaults = {
        // dialogs defaults
        autoReset:true,
        basic:false,
        closable:true,
        closableByDimmer:true,
        frameless:false,
        maintainFocus:true, // <== global default not per instance, applies to all dialogs
        maximizable:true,
        modal:true,
        movable:true,
        moveBounded:false,
        overflow:true,
        padding: true,
        pinnable:true,
        pinned:true,
        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
        resizable:true,
        startMaximized:false,
        transition:'pulse',

        // notifier defaults
        notifier:{
            // auto-dismiss wait time (in seconds)  
            delay:4,
            // default position
            position:'bottom-center',
            // adds a close button to notifier messages
            closeButton: false
        },

        // language resources 
        glossary:{
            // dialogs default title
            title:'AlertifyJS',
            // ok button text
            ok: 'OK',
            // cancel button text
            cancel: 'Cancel'            
        },

        // theme settings
        theme:{
            // class name attached to prompt dialog input textbox.
            input:'ajs-input',
            // class name attached to ok button
            ok:'btn',
            // class name attached to cancel button     
            cancel:'btn'
        }
    };

    </script>

    <script>
  $("#country").countrySelect();
  var countryData = $("#country").countrySelect("getSelectedCountryData");
 
</script>
<!-- <div id="qrcodes" style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%)"></div> -->
<script type="text/javascript">
// new QRCode(document.getElementById("qrcodes"), "http://jindo.dev.naver.com/collie");
</script>
  </body>

<!-- Mirrored from pixinvent.com/demo/crypto-ico-admin/html/ltr/vertical-menu/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Nov 2018 19:59:31 GMT -->
</html>