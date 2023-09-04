<!-- <html lang="en-US" class="hide-scroll"><script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-T7WWB0T53W&amp;l=dataLayer&amp;cx=c"></script><script type="text/javascript" integrity="sha384-d/yhnowERvm+7eCU79T/bYjOiMmq4F11ElWYLmt0ktvYEVgqLDazh4+gW9CKMpYW" crossorigin="anonymous" async="" src="https://cdn.amplitude.com/libs/amplitude-5.2.2-min.gz.js"></script><script src="https://connect.facebook.net/signals/config/251025992170426?v=2.9.120&amp;r=stable" async=""></script><script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script><head> 
    <title>Web developer job profile HTML Template Live Demo</title>
    <meta name="Keywords">
    <meta name="Description">
    



    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no,width=device-width">
    <link href="//fonts.googleapis.com/css?family=Roboto|Open+Sans:200,300,400,700,800,900&amp;subset=latin" rel="preload" as="font">





<script>
    window.isAuthenticated = 0;
    window.clientUserId = 0;
    window.clientUserName = '';
    window.userCountryCode = '';
    window.logPageEvent = 1;
    window.userHasAdsParams = 1;
    window.utmSourceFromReferrer = 0;
    window.currentLang = '';
    window.baseUrl = 'html-templates';
    window.currentUrl = 'html-templates';
    window.np_userId = '';
    window.isAmplitudeInitialized = false;
    window.sha256Email = '';

    function sendAnalyticsData(eventType, props, cb) {
        var json = { data: {} };
        json.userToken = np_userId;
        json.data.adsParams = $.cookie('AdsParameters');
        json.data.ga = $.cookie('_ga');
        json.data.gac = $.cookie('_gac_UA-88868916-2');
        json.data.userAgent = navigator.userAgent;
        json.data.eventType = eventType;
        json.data.props = props;
        $.ajax({
            'type': 'POST',
            'url': '/Feedback/SendAdsLog',
            'contentType': 'application/json; charset=utf-8',
            'data': JSON.stringify(json),
            'dataType': 'json',
            'complete': cb || function() {}
        });
    }

    function initializeAmplitudeUser() {
        if (isAmplitudeInitialized) {
            return;
        }
        isAmplitudeInitialized = true;

        if (clientUserId > 0)
        {
            identifyAmplitudeUser(clientUserId, clientUserName);
        }
        else
        {
            identifyAmplitudeUser(null);
        }
    }

    function sendAmplitudeAnalyticsData(eventName, eventProperties, userProperties, callback_function) {
        initializeAmplitudeUser();

        if (userProperties) {
            if(userProperties.utm_source || userProperties.utm_campaign) {
                var identify = new amplitude.Identify();
                identify.setOnce("utm_campaign", userProperties.utm_campaign);
                identify.setOnce("utm_source", userProperties.utm_source);
                identify.setOnce("utm_content", userProperties.utm_content);
                identify.setOnce("utm_term", userProperties.utm_term);
                identify.setOnce("utm_page", userProperties.utm_page);
                identify.setOnce("utm_page2", userProperties.utm_page);
                identify.setOnce("referrer", userProperties.referrer);

                amplitude.getInstance().identify(identify);

                userProperties.utm_source_last = userProperties.utm_source;
                userProperties.utm_campaign_last = userProperties.utm_campaign;
                userProperties.utm_content_last = userProperties.utm_content;
                userProperties.utm_term_last = userProperties.utm_term;
                userProperties.utm_page_last = userProperties.utm_page;
            }

            var userProps = objectWithoutProperties(userProperties, ["utm_campaign", "utm_source","utm_content", "utm_term", "utm_page", "referrer"]);
            amplitude.getInstance().setUserProperties(userProps);
        }

        eventProperties.WebSite = 'true';
        eventProperties.IsAuthenticated = window.isAuthenticated;
        eventProperties.country_code = getCountryCode();
        eventProperties.lang = window.currentLang || '';

        var fullPageUrl = window.location.pathname.split('?')[0];
        eventProperties.full_page_url = fullPageUrl;
        eventProperties.page_url = clearPageUrl(fullPageUrl);

        if (typeof callback_function === 'function') {
            amplitude.getInstance().logEvent(eventName, eventProperties, callback_function);
        } else {
            amplitude.getInstance().logEvent(eventName, eventProperties);
        }
    }

    function identifyAmplitudeUser(userId, token) {
        if (userId) {
            amplitude.getInstance().setUserProperties({
                "Token": token,
                "UserId": userId
            });
        }

        var identify = new amplitude.Identify();
        amplitude.getInstance().identify(identify);
        if (userId) {
            amplitude.getInstance().setUserId(userId);
        }
    }

    function sendAnalyticsFromUrl(referrer, pageType) {
        var hash = window.location.hash;

        var urlIsAvailable = typeof URL === "function" || (navigator.userAgent.indexOf('MSIE') !== -1 && typeof URL === 'object');
        if (!urlIsAvailable) {
            return;
        }

        var url = new URL(window.location.href);
        if (hash && hash.indexOf('utm_') >= 0) {
            url = new URL(window.location.origin + window.location.pathname + hash.replace('#', '?'));
        }

        if (!url.searchParams) {
            return;
        }

        var utmParams = getUtmParams(url);
        var gclidFromUrl = utmParams.gclid;
        var utmParamsFromUrl = !!utmParams.utmSource || !!utmParams.utmCampaign || !!utmParams.gclid;
        if (!utmParamsFromUrl && userHasAdsParams)
        {
            utmParams = getUtmParamsFromCookie();
        }

        var canLog = canLogToAmplitude();
        if (utmParamsFromUrl || utmSourceFromReferrer) {
            var fullPageUrl = window.location.pathname.split('?')[0];
            var pageUrl = clearPageUrl(fullPageUrl);
            var userProps = {
                "utm_source": utmParams.utmSource,
                "utm_campaign": utmParams.utmCampaign,
                "utm_content": utmParams.utmContent,
                "utm_term": utmParams.utmTerm,
                "utm_page": getUtmPageValue(pageUrl),
                "utm_lang": window.currentLang || '',
                "referrer": referrer
            };

            if (gclidFromUrl) {
                var landingUrl = pageUrl.startsWith('/') && pageUrl !== '/' ? pageUrl.substr(1) : pageUrl;
                userProps.landing_page = landingUrl;

                var event = {
                    'Page': landingUrl,
                    'Url': window.location.href,
                    'utm_campaign_event': utmParams.utmCampaign
                }
                sendAmplitudeAnalyticsData('Landing Page', event, userProps);
            } else {
                var eventProps = {
                    "utm_source": utmParams.utmSource,
                    "utm_campaign": utmParams.utmCampaign,
                    "utm_content": utmParams.utmContent,
                    "utm_term": utmParams.utmTerm
                };

                if (utmParams.utmSource === "elastic") {
                    sendAmplitudeAnalyticsData('Email Click', eventProps);
                }

                if (canLog) {
                    sendAmplitudeAnalyticsData('Campaign', eventProps, userProps);
                }
            }
        }

        if (logPageEvent && canLog || (pageType === 'Pricing Page' && !window.isForbiddenCountry())) {
            var pageEventProps = {
                'type': pageType,
                'accepted_country': isValidCountry(),
                'force_log': !canLog
            };

            sendAmplitudeAnalyticsData('Page View', pageEventProps);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        setCountryCode('https://location.nicepagesrv.com/country');
        setUserIdCookie();
        updatePageViewCounter();

        if (typeof gtag === 'function' && typeof canSendViewConversion === 'function' && window.isAuthenticated && canSendViewConversion()) {
            if (sha256Email) {
                gtag('set', 'user_data', { 'sha256_email_address': sha256Email });
            }
            //Event snippet for 2 Page View conversion page
            gtag('event', 'conversion', { 'send_to': 'AW-797221335/GbWrCJ6Ht5wYENfDkvwC', 'transaction_id': clientUserId });

            setAdsPageViewCookie();
        }

        var referrer = '';
        var pageType = 'Template Page Preview';
        sendAnalyticsFromUrl(referrer, pageType);

        if (location.href.indexOf('/frame/') === -1) {
            PureCookie.initCookieConsent({
                description: 'By using this website, you automatically accept that we use cookies. Learn more about our ',
                link: '<a href="https://nicepage.com/Privacy" target="_blank"> privacy and cookies policy</a>.',
                buttonCaption: "Accept",
                opacity: 0.88,
            });
        }
    });
</script> -->

<!--
<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-KGP3NM3':true});</script>
-->    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=AW-797221335"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        var options = {};
        var awOptions = { 'allow_enhanced_conversions': true };
        if (clientUserId > 0) {
            options.user_id = clientUserId;
            awOptions.user_id = clientUserId;
        }
        // gtag('config', 'GA_TRACKING_ID', { 'optimize_id': 'OPT_CONTAINER_ID'});
        gtag('config', 'AW-797221335', awOptions);
        gtag('config', 'G-T7WWB0T53W', options);
    </script>
        Facebook Pixel Code -->
        <!-- <script>
            if(window.hideFacebookPixelCode !== true) {
                !function (f, b, e, v, n, t, s) {
                    if (f.fbq) return; n = f.fbq = function () {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
                    n.queue = []; t = b.createElement(e); t.async = !0;
                    t.src = v; s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '251025992170426', {
                    em: ''
                });
                fbq('track', 'PageView');
            }
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=251025992170426&ev=PageView&noscript=1" /></noscript>
        End Facebook Pixel Code -->

<!-- Amplitude Code -->
<!-- <script type="text/javascript">
    (function(e,t){var n=e.amplitude||{_q:[],_iq:{}};var r=t.createElement("script")
            ;r.type="text/javascript"
            ;r.integrity="sha384-d/yhnowERvm+7eCU79T/bYjOiMmq4F11ElWYLmt0ktvYEVgqLDazh4+gW9CKMpYW"
            ;r.crossOrigin="anonymous";r.async=true
            ;r.src="https://cdn.amplitude.com/libs/amplitude-5.2.2-min.gz.js"
            ;r.onload=function(){if(!e.amplitude.runQueuedFunctions){
                console.log("[Amplitude] Error: could not load SDK")}}
            ;var i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)
            ;function s(e,t){e.prototype[t]=function(){
            this._q.push([t].concat(Array.prototype.slice.call(arguments,0)));return this}}
        var o=function(){this._q=[];return this}
            ;var a=["add","append","clearAll","prepend","set","setOnce","unset"]
            ;for(var u=0;u<a.length;u++){s(o,a[u])}n.Identify=o;var c=function(){this._q=[]
                ;return this}
            ;var l=["setProductId","setQuantity","setPrice","setRevenueType","setEventProperties"]
            ;for(var p=0;p<l.length;p++){s(c,l[p])}n.Revenue=c
            ;var d=["init","logEvent","logRevenue","setUserId","setUserProperties","setOptOut","setVersionName","setDomain","setDeviceId","setGlobalUserProperties","identify","clearUserProperties","setGroup","logRevenueV2","regenerateDeviceId","groupIdentify","onInit","logEventWithTimestamp","logEventWithGroups","setSessionId","resetSessionId"]
            ;function v(e){function t(t){e[t]=function(){
                e._q.push([t].concat(Array.prototype.slice.call(arguments,0)))}}
            for(var n=0;n<d.length;n++){t(d[n])}}v(n);n.getInstance=function(e){
                e=(!e||e.length===0?"$default_instance":e).toLowerCase()
                    ;if(!n._iq.hasOwnProperty(e)){n._iq[e]={_q:[]};v(n._iq[e])}return n._iq[e]}
            ;e.amplitude=n})(window,document);
    amplitude.getInstance().init("878f4709123a5451aff838c1f870b849");
</script>

<script>
var shareasaleSSCID=shareasaleGetParameterByName("sscid");function shareasaleSetCookie(e,a,r,s,t){if(e&&a){var o,n=s?"; path="+s:"",i=t?"; domain="+t:"",S="";r&&((o=new Date).setTime(o.getTime()+r),S="; expires="+o.toUTCString()),document.cookie=e+"="+a+S+n+i+"; SameSite=None;Secure"}}function shareasaleGetParameterByName(e,a){a||(a=window.location.href),e=e.replace(/[\[\]]/g,"\\$&");var r=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(a);return r?r[2]?decodeURIComponent(r[2].replace(/\+/g," ")):"":null}shareasaleSSCID&&shareasaleSetCookie("shareasaleSSCID",shareasaleSSCID,94670778e4,"/");
</script>






<script src="//capp.nicepage.com/9f3c9ae516acfc74c24483c7e511ab90658c5545/main-libs.js"></script><style type="text/css" id="operaUserStyle"></style>
<link href="//capp.nicepage.com/9f3c9ae516acfc74c24483c7e511ab90658c5545/main-libs.css" rel="stylesheet"> -->


<!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- 



    
    <meta name="robots" content="noindex, nofollow">
    <script type="text/javascript">
        var device = 'desktop';
        function init($) {
            $('#previewDesktopBtn').click(function (e) {
                setLivePreviewFrameSize($(this));
                setActiveResponsiveButton(this);
                e.preventDefault();
            });

            $('#previewLaptopBtn').click(function (e) {
                setLivePreviewFrameSize($(this));
                setActiveResponsiveButton(this);
                e.preventDefault();
            });
            $('#previewTabletBtn').click(function (e) {
                setLivePreviewFrameSize($(this));
                setActiveResponsiveButton(this);
                e.preventDefault();
            });
            $('#previewPhoneHorizontalBtn').click(function (e) {
                setLivePreviewFrameSize($(this));
                setActiveResponsiveButton(this);
                e.preventDefault();
            });
            $('#previewPhoneBtn').click(function (e) {
                setLivePreviewFrameSize($(this));
                setActiveResponsiveButton(this);
                e.preventDefault();
            });

            detectActiveResponsiveButton();
        }

        if (jQuery.isReady) {
            init(jQuery);
        } else {
            jQuery(function ($) {
                init($);
            });
        }

        function setActiveResponsiveButton(btn) {
            $(".page-preview-header > a").removeClass("active");
            $(btn).addClass("active");
        }

        function detectActiveResponsiveButton() {
            var d = device;
            if (!d) {
                d = 'desktop';
            }
            $("#preview" + d.charAt(0).toUpperCase() + d.substr(1) + "Btn").click();
        }

        function getDataPreviewSizeAttr(el) {
            return el.closest("[data-preview-size]").attr("data-preview-size");
        }

        function setLivePreviewFrameSize(srcEl) {
            var getScrollbarWidth = function () {
                var s = $('<div style="width:100px;height:100px;overflow:scroll;visibility:hidden;position:absolute;top:-99999px"><div style="height:200px;"></div></div>')
                    .appendTo("body");
                var res = s.width() - s.find("div").last().width();
                s.remove();
                return res;
            };
            var attr = getDataPreviewSizeAttr(srcEl);
            $('#livePreviewFrame').width(attr.indexOf("%") !== -1 ? attr : parseInt(attr, 10) + getScrollbarWidth());
        }

    </script>
    <style>
        .dialog-wrapper {
            display: none !important;
        }

        .wrap,
        #main {
            height: 100vh;
            margin: 0 !important;
        }

        iframe {
            display: none;
        }


        html,
        body {
            height: 100%;
        }

        .page-preview {
            border-radius: 0;
            height: 100%;
        }

        .page-preview-header {
            background: #f2f2f2;
            border: none;
            height: 70px;
            position: relative;
            text-align: center;
        }

        .page-preview-header > a {
            display: inline-block;
            margin-top: 15px;
            padding: 4px;
        }

        .page-preview-header > a:hover {
            background: #e2f0fc;
            text-decoration: none;
        }

        .page-preview-header > a.active {
            background: #c9e4f9;
        }

        .page-preview-header > .close {
            float: right;
            margin-right: 10px;
        }

        .page-preview-body {
            height: calc(100% - 70px);
            overflow: hidden;
            text-align: center;
        }

        .page-preview-body iframe {
            border: none;
            display: inline-block;
            height: 100%;
        }
    </style>

<meta http-equiv="origin-trial" content="AymqwRC7u88Y4JPvfIF2F37QKylC04248hLCdJAsh8xgOfe/dVJPV3XS3wLFca1ZMVOtnBfVjaCMTVudWM//5g4AAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjk1MTY3OTk5LCJpc1RoaXJkUGFydHkiOnRydWV9"><meta http-equiv="origin-trial" content="A+xK4jmZTgh1KBVry/UZKUE3h6Dr9HPPioFS4KNCzify+KEoOii7z/goKS2zgbAOwhpZ1GZllpdz7XviivJM9gcAAACFeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiQXR0cmlidXRpb25SZXBvcnRpbmdDcm9zc0FwcFdlYiIsImV4cGlyeSI6MTcwNzI2Mzk5OSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ=="><meta http-equiv="origin-trial" content="AymqwRC7u88Y4JPvfIF2F37QKylC04248hLCdJAsh8xgOfe/dVJPV3XS3wLFca1ZMVOtnBfVjaCMTVudWM//5g4AAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjk1MTY3OTk5LCJpc1RoaXJkUGFydHkiOnRydWV9"></head>
    <body>
        



    <div class="page-preview-body">
        <iframe id="livePreviewFrame" src="https://website341703.nicepage.io/Page-7.html?version=e39dd85a-4171-46b2-9fca-b502a9d24b57" width="1057" height="640" style="width:100%;"></iframe>
    </div>
</div>
<a style="position:absolute;top:17px;left:10px;" href="/"><img alt="NicePage.com" src="//csite.nicepage.com/Images/logo-w.png"></a>

        <script>
            if (window.parent) {
                var _w = 0, _h = 0;
                var updateFormSize = function () {
                    var form = $('form.shaped-form-extended,form.shaped-form');
                    var w = form.outerWidth(true);
                    var h = form.outerHeight(true);
                    if (Math.abs(_w - w) > 5 || Math.abs(_h - h) > 5) {
                        _w = w;
                        _h = h;
                        var msg = { key: 'login-frame-size', width: w, height: h };
                        window.parent.postMessage(msg, "*");
                    }
                    setTimeout(updateFormSize, 300);
                }
                updateFormSize();
            }
        </script>
    
<div id="np-cookie-consent" style="opacity: 0.88; display: block;"><div class="cookieDesc"><p>By using this website, you automatically accept that we use cookies. Learn more about our  <a href="https://nicepage.com/Privacy" target="_blank"> privacy and cookies policy</a>.</p></div><div class="cookieButton"><a onclick="PureCookie.dismiss();">Accept</a></div></div></body><script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/797221335/?random=1690925992988&amp;cv=11&amp;fst=1690925992988&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be37v0&amp;u_w=1536&amp;u_h=864&amp;url=https%3A%2F%2Fnicepage.com%2Fhtml-templates%2Fpreview%2Fweb-developer-job-profile-343452%3Fdevice%3Ddesktop&amp;ref=https%3A%2F%2Fnicepage.com%2Fht%2F343452%2Fweb-developer-job-profile-html-template&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Web%20developer%20job%20profile%20HTML%20Template%20Live%20Demo&amp;auid=800024406.1690925514&amp;uamb=0&amp;uaw=0&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script></html> --><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <style>
         /* div{
		
        width: 30%;
        border:1px solid red;
        float:right;
        text-align:center;
        
        
    } */

    </style>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
        <img src=https://dynamic.brandcrowd.com/asset/logo/344f974a-eac5-43c2-b014-f66d7a24c923/logo-search-grid-2x?logoTemplateVersion=1&v=637882835663670000&text=Hire.ps alt="N"width="50" height="50">
          <a class="navbar-brand" href="http://127.0.0.1:8000/home">Hire.ps</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/company">Company</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Rint</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Courses</a>
              </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/profile">Profile</a>
                </li>
              </li>
            </form>
          </div>
        </div>
    </nav>
    <!-- <style type=”text/css”>
table {
    margin: 8px;
}

th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
    background: #666;
    color: #FFF;
    padding: 2px 6px;
    border-collapse: separate;
    border: 1px solid #000;
}

td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
    border: 1px solid #DDD;
}
</style> -->
    <?php
    
    // Replace these variables with your actual profile information
    $name = Auth::user()->name  ;
    $email = Auth::user()->email;
    $phone_number = Auth::user()->phone_number;
    
    // $age = 30;
    // $bio = "I am a web developer with a passion for programming.";

    // Function to display user profile
    function displayProfile($name, $email, $phone_number) {
        echo "<h2>Name: $name</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone_number</p>";
        // echo "<p>Age: $age</p>";
        // echo "<p>Bio: $bio</p>";
    }

    // Call the function to display the profile
    displayProfile($name, $email,$phone_number );
    ?>
    <!-- $age, $bio -->
    
    <!-- --------------------------------------------profile page--------------------------------------------------- -->
        
</body>
</html>