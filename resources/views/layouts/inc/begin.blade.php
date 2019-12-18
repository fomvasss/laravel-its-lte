<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('its-lte.title') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/vendor/its-lte/img/favicon.png" type="image/x-icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Styles Admin LTE -->

    <link rel="stylesheet" href="{{ mix('css/main.css', 'vendor/its-lte') }}">
    <link rel="stylesheet" href="{{ mix('css/dashboard.css', 'vendor/its-lte') }}">

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini
    {{ config('its-lte.default.skin', 'skin-purple') }}
    {{ config('its-lte.default.layout_boxed') ? 'layout-boxed' : '' }}
    {{ config('its-lte.default.fixed') ? 'fixed' : '' }}
    {{ config('its-lte.default.sidebar_collapse') ? 'sidebar-collapse' : '' }}
">
    