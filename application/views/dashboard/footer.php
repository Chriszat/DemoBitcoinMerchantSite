</div>
<script>
   window.mobileCheck = function() {
    let check = false;
    (function(a) {
      if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
    
  };

  window.mobileAndTabletCheck = function() {
  let check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};
if(mobileAndTabletCheck()){
  let a_tags = document.getElementsByClassName("nav_item")
  for (let index in a_tags) {
    a_tags[index].addEventListener("click", function(e) {
      if (e.target.id !== "none_link1" || e.target.id !== "none_link2") {
        console.log("Linked clicked")
        console.log(e)
        document.getElementById("tog_nav").click();
      }

    })
  }
}
  

 
</script>
<!-- <footer class="footer footer-static footer-transparent">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer> -->
<script type="text/javascript" src="application/shared/alertify.js"></script>
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
    autoReset: true,
    basic: false,
    closable: true,
    closableByDimmer: true,
    frameless: false,
    maintainFocus: true, // <== global default not per instance, applies to all dialogs
    maximizable: true,
    modal: true,
    movable: true,
    moveBounded: false,
    overflow: true,
    padding: true,
    pinnable: true,
    pinned: true,
    preventBodyShift: false, // <== global default not per instance, applies to all dialogs
    resizable: true,
    startMaximized: false,
    transition: 'pulse',

    // notifier defaults
    notifier: {
      // auto-dismiss wait time (in seconds)  
      delay: 4,
      // default position
      position: 'bottom-center',
      // adds a close button to notifier messages
      closeButton: false
    },

    // language resources 
    glossary: {
      // dialogs default title
      title: 'AlertifyJS',
      // ok button text
      ok: 'OK',
      // cancel button text
      cancel: 'Cancel'
    },

    // theme settings
    theme: {
      // class name attached to prompt dialog input textbox.
      input: 'ajs-input',
      // class name attached to ok button
      ok: 'btn',
      // class name attached to cancel button     
      cancel: 'btn'
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