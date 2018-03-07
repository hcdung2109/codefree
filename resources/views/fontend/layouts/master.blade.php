<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> SmartAdmin </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}public/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/font-awesome.min.css">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/smartadmin-production-plugins.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/smartadmin-production.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/smartadmin-skins.min.css">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/smartadmin-rtl.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/your_style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="fontend/css/my_fontend.css">


    <!-- FAVICONS -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

</head>
<body class="desktop-detected menu-on-top pace-done smart-style-2" style="background: #ebebeb;">
<div class="container">

<!-- Start Header-menu-->
@include('fontend.layouts.header')

<!--Start sidebar-menu-->
@include('fontend.layouts.topbar')

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- Message Success -->
        @if(session('msgSuccess'))
            <div class="alert alert-success fade in">
                <button class="close" data-dismiss="alert">×</button>
                <i class="fa-fw fa fa-check"></i> {{session('msgSuccess')}}
            </div>
        @endif

        <!-- Message Error -->
        @if(session('msgError'))
            <div class="alert alert-danger fade in">
                <button class="close" data-dismiss="alert">×</button>
                <i class="fa-fw fa fa-times"></i> {{session('msgError')}}
            </div>
        @endif

        <div class="row blog">

            @yield('content')

            <div class="col-sm-2 col-md-2 padding-right-0">
                <!-- Search Blog -->
                @include('fontend.blog.widgets.search')

                <!-- List category -->
                @include('fontend.blog.widgets.category')

                <!-- Tags -->
                @include('fontend.blog.widgets.tags')
            </div>

        </div>

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="fontend/js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="fontend/js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="fontend/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="fontend/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="fontend/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="fontend/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="fontend/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="fontend/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="fontend/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="fontend/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="fontend/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="fontend/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="fontend/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="fontend/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="fontend/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="fontend/js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="fontend/js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="fontend/js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="fontend/js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="fontend/js/smart-chat-ui/smart.chat.manager.min.js"></script>
<!-- PAGE RELATED PLUGIN(S) -->
<script src="fontend/js/plugin/ckeditor/ckeditor.js"></script>

<!-- javascript -->
<script src="fontend/js/your_javascript.js"></script>

<!-- PAGE RELATED PLUGIN(S)
<script src="..."></script>-->



<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {

        pageSetUp();

    });

</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>


@yield('script')

</div>
</body>
</html>
