<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" ng-app="appCore" ng-controller="baseController">
  
<!-- Mirrored from pixinvent.com/demo/crypto-ico-admin/html/ltr/vertical-menu/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Nov 2018 19:59:17 GMT -->
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Crypto ICO admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, crypto ico admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>BaseWallet Dashboard - Cryptocurrency </title>

    <base href="<?php echo baseurl ?>" />
  
    <link rel="apple-touch-icon" href="application/views/user/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/crypto-ico-admin/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="application/shared/css/alertify.css" />
    <link rel="stylesheet" href="application/shared/css/themes/semantic.min">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" href="application/views/user/country-select-js-master/build/css/countrySelect.css">

    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/css/app.min.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/css/core/menu/menu-types/vertical-compact-menu.min.css">
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/css/pages/timeline.min.css">
    <link rel="stylesheet" type="text/css" href="application/views/user/app-assets/css/pages/dashboard-ico.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="application/views/user/assets/css/style.css">
    <!-- END Custom CSS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>


    <!-- angular core -->
    <script type="text/javascript" src="<?php echo baseurl ?>application/shared/angular/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/shared/angular/angular-route.min.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/module/user.app.module.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/config/user.app.config.js"></script>

    <!--angular modules-->

    <!--angular services -->
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/core/services/dom.service.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/core/services/request.service.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/core/services/overlay.service.js"></script>

    <!--angular component -->
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/dashboardComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/accountsComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/transactionsComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/buyComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/profileComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/emailComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/sellComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/btcComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/ethComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/usdComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/baseComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/sendbtcComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/sendEthComponent.component.js"></script>
    <script type="text/javascript" src="<?php echo baseurl ?>application/client-app/component/usddepositComponent.component.js"></script>

    

    <link href="https://fonts.googleapis.com/css?family=Anton|Black+Han+Sans" rel="stylesheet">
    <link rel="stylesheet" href="application/shared/css/cards.css">
<link rel="stylesheet" href="application/shared/css/file.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

     <style>
       .card{
         border-radius:0;
       }
     </style>

  </head>
  

 <body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">

<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
  <div class="navbar-wrapper">
    <div class="navbar-header d-md-none">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item d-md-none"><a class="navbar-brand" href="index-2.html"><img class="brand-logo d-none d-md-block" alt="crypto ico admin logo" src="application/views/user/app-assets/images/logo/logo.png"><img class="brand-logo d-sm-block d-md-none" alt="crypto ico admin logo sm" src="application/views/user/app-assets/images/logo/logo-sm.png"></a></li>
        <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v">   </i></a></li>
      </ul>
    </div>
    <div class="navbar-container">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
            <div class="search-input">
              <input class="input" type="text" placeholder="Explore Crypto ICO...">
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav float-right">         
          <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a></div>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"  id="notification_link"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow" id="count1"></span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-default badge-danger float-right m-0" id="count2"></span>
              </li>
              <div >
              <li class="scrollable-container media-list w-100" id="notification_list">
              
              
              <!-- <a href="javascript:void(0)">
                  <div class="media">
                    <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                    <div class="media-body">
                      <h6 class="media-heading">Generate monthly report</h6><small>
                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                    </div>
                  </div></a> -->
                  </li>
                  </div>

              <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="<?php echo baseurl ?>wallet/accounts/"><i class="ficon icon-wallet"></i></a></li>
          <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="application/views/user/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"></span><span class="mr-1">BTC<span class="user-name text-bold-700" id="current_btc"><?php echo $data["current_btc"] ?></span></span></a>
            <div class="dropdown-menu dropdown-menu-right">             <a class="dropdown-item" href="wallet/profile/"><i class="ft-award"></i><?php echo $data['user_email'] ?></a>
              <div class="dropdown-divider"></div>        </a>
              <a class="dropdown-item" href="account-login.html"><i class="ft-power"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- application/views/user/app-assets/images/logo/logo.png -->

<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
  <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="index-2.html"><img class="brand-logo" alt="crypto ico admin logo" src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/basecoin_ico.png"/></a>
    <ul class="navigation " id="main-menu-navigation" data-menu="menu-navigation">
      <li class="active"><a ng-href="wallet/"><i class="icon-grid"></i>Dashboard<span class="menu-title" data-i18n=""></span></a>
      
      </li>
      <!-- <li class="nav-item"><a href="buy-ico.html"><i class="icon-layers"></i>Buy ICO<span class="menu-title" data-i18n=""></span></a>
      </li> -->
      <li class="nav-item"><a href="wallet/accounts/"><i class="icon-wallet"></i>Wallet<span class="menu-title" data-i18n=""></span></a>
      </li>
      <li class=" nav-item"><a href="wallet/transactions/"><i class="icon-shuffle"></i>Transactions<span class="menu-title" data-i18n=""></span></a>
      </li>
      <li class=" nav-item"><a href="faq.html"><i class="icon-support"></i>FAQ<span class="menu-title" data-i18n=""></span></a>
      </li>
      <li class=" nav-item"><a href="wallet/profile/"><i class="icon-user-following"></i>Account<span class="menu-title" data-i18n=""></span></a>
       
      </li>
    </ul>
  </div>
</div>


      <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
<div ng-view>
