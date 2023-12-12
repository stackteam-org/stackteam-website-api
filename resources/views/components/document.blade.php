<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="{{ $locale }}" @if($rtl) direction="rtl" dir="rtl" style="direction: rtl" @endif>
{{--<html lang="en">--}}
<!--begin::Head-->
<head><base href=""/>
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    
    @vite('resources/css/app.css')
    <x-style source="fonts/yekan/style.css" />

    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <x-style source="plugins/custom/fullcalendar/fullcalendar.bundle.css" />
    <x-style source="plugins/custom/datatables/datatables.bundle.css" />

    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <x-style source="plugins/global/plugins.bundle.css" />
    <x-style source="css/style.bundle.css" />

    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
{{ $slot }}

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }} "></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/index.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/xy.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/percent.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/radar.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/themes/Animated.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/map.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/geodata/worldLow.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/geodata/continentsLow.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/geodata/usaLow.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }} "></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
@stack('custom-scripts')

<script src="{{ asset('assets/js/widgets.bundle.js') }} "></script>
<script src="{{ asset('assets/js/custom/widgets.js') }} "></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }} "></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }} "></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }} "></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }} "></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }} "></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
