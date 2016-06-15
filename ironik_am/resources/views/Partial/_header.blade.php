<!DOCTYPE html>

<html lang="fr">
<!--<![endif]-->

<head>


    <meta charset="utf-8">
    <title>@section('title') @show</title>
    <meta name="description" content="">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="http://ironiq.adrididi.fr" />
    <meta property="og:title"         content="IroniQ " />
    <meta property="og:description"   content="Charibotes en toute tranquilité" />

    {{--<meta name="twitter:card" content="summary_large_image">--}}
    {{--<meta name="twitter:site" content="http://ironiq.adrididi.fr/">--}}
    {{--<meta name="twitter:creator" content="@SarahMaslinNir">--}}
    {{--<meta name="twitter:title" content="sfsfd">--}}
    {{--<meta name="twitter:image" content="http://ironiq.adrididi.fr/uploads/photos/53f0f15388c322fa6f034467b7194575.png">--}}


@section('css')
    <!-- Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Exo+2:300,500,500italic' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- jQuery UI CSS file -->
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!--bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!--cs plugin divers-->
    <link href="{{asset ('css/animate.css')}}" rel="stylesheet">

    <!-- Spectrum CSS file (optional) -->
    <link rel="stylesheet" type="text/css" href="{{asset('js/colorpicker/spectrum.css')}}">

    <!--load idicator-->

    <link  rel="stylesheet" type="text/css" src="{{asset('js/load_Indicator/jquery.faloading.js')}}">

    <!-- css perso-->
    <link href="{{asset('css/header.css')}}" rel="stylesheet" >

@show

</head>


<body>
<!--plugin in facebook pour le partage-->

<div id="fb-root"></div>
{{--<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>--}}

<script>

                // script pour sdk facebook
                //Tout code doit se faire sous FB.init()


                window.fbAsyncInit = function() {
                    FB.init({
                        appId: '1583810988597192',
                        xfbml: true,
                        version: 'v2.5'
                    });


                };
                //sdk fb
        (function(d, s, id) {


        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6&appId=1583810988597192";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


</script>
<script>

</script>

@if(Auth::check())

@include('Partial/_sidebar')


@endif

<!--==conteneur general obligatoire pour sidebar toggle / hors sidebar===-->
<div id="page-content-wrapper">


@include('Partial/_navbar_social')

@include ('Partial/_navbar')
