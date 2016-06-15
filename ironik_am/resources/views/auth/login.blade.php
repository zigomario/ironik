

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

    <div class="row top-panel-log">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-info">

                <div class="panel-heading">

                    Cette action demande d'avoir un compte et d'être connecté.

                </div>

            </div>


        </div>

    </div>



    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Adresse Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Connection
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}"> Mot de passe oublié </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-warning">

                <div class="panel-heading">

                    Pas encore de compte ? Démarre l'aventure Ironiq <a href="{{url('/register')}}">ici</a>

                </div>

            </div>


        </div>

    </div>


</div>



@include('Partial/_footer')