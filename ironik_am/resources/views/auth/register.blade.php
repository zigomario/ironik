

<head>


    <meta charset="utf-8">
    <title>@section('title') @show</title>
    <meta name="description" content="">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


@section('css')
    @parent

        <link href="{{asset ('css/js/datepicker/css/datepicker.css')}}" rel="stylesheet">

@endsection


@section('js')

        @parent

            <link href="{{asset ('css/js/datepicker/js/bootstrap-datepicker.js')}}" rel="stylesheet">

            <script>
                $(function() {
                    $( "#datepicker" ).datepicker({

                        changeYear: true,
                    yearRange: "1900:2008",
                        dateFormat: "yy-mm-dd"

                    });
                });
            </script>

@endsection


@include('Partial/_navbar_social')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Inscription </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Nom </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Prénom</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Pseudo </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Ville </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date de Naissance</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="naissance" id="datepicker" value="{{ old('naissance') }}">

                                @if ($errors->has('naissance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('naissance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Mot de passe </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmation Mot de passe</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{$errors->has('genre') ? 'has-error' : '' }}">

                            <label class="col-md-4 control-label">Sexe</label>

                            <div class="col-md-6">

                                <div class="radio">
                                    <label>
                                        <input type="radio" class="" name="genre" value="0"/>
                                        Homme
                                    </label>
                                </div>

                                <div class="radio">
                                    <label>
                                        <input type="radio" class="" name="genre" value="1"/>
                                            Femme
                                    </label>
                                </div>


                            </div>
                        </div>







                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> S'inscrire
                                </button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@include('Partial/_footer')