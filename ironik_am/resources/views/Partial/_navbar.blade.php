
<!-- ==============================================
         NAVBAR
=============================================== -->



<header class=" clearfix">

    <div class="container-fluid">
        <div class="row blacknav">

            <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="header-left clearfix">
                    <!-- logo -->
                    <div id="logo" class="logo">
                        <a href="{{route('home_index')}}"><img id="logo_img" src="/img/logo.png" alt="The Project"></a>
                    </div>

                </div>
            </div><!-- end col md 3-->



            <div class="col-md-9 col-sm-9 col-xs-12">

                <!-- header-right start -->
                <!-- ================ -->
                <div class="header-right clearfix">


                    <!-- ================ -->
                    <div class="main-navigation  animated with-dropdown-buttons">

                        <!-- navbar start -->
                        <!-- ================ -->
                        <nav class="navbar" role="navigation">
                            <div class="container-fluid">

                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle button_toggle_navbar collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar icon_bar1"></span>
                                        <span class="icon-bar icon_bar1"></span>
                                        <span class="icon-bar icon_bar1"></span>
                                    </button>

                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="navbar-collapse collapse" id="navbar-collapse-1" aria-expanded="false" style="height: 1px;">
                                    <!-- main-menu -->


                                    <!-- header buttons -->
                                    <div class="header-dropdown-buttons">

                                        <ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm hidden-xs btn_login" data-toggle="dropdown">Login</a>
                                                    <a href="" class="dropdown-toggle btn btn-lg visible-xs btn_login btn-block" data-toggle="dropdown">Login </a>
                                                    <ul id="login-dp" class="dropdown-menu">
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    Se connecter avec
                                                                    <div class="social-buttons">
                                                                        <a href="auth/facebook" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                                                        <a href="auth/twitter" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                                                    </div>
                                                                    ou
                                                                    <form class="form" role="form" method="post" action="{{ url('/login') }}" accept-charset="UTF-8" id="login-nav">
                                                                        {!! csrf_field() !!}

                                                                        <div class="form-group">
                                                                            <label class="sr-only" for="exampleInputEmail2"> Adresse Email </label>
                                                                            <input type="email" class="form-control" id="exampleInputEmail2" name="email"  placeholder="Adresse Email" required>


                                                                        </div>

                                                                        <div class="form-group">

                                                                            <label class="sr-only" for="exampleInputPassword2"> Mot de passe</label>
                                                                            <input type="password" class="form-control" id="exampleInputPassword2" name="password" placeholder="Mot de passe" required>



                                                                            <div class="help-block text-right"><a href="{{ url('/password/reset') }}">Mot de passe oublié ?</a></div>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary btn-block "> Connexion</button>
                                                                        </div>

                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" name="remember"> Rester connecté
                                                                            </label>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="bottom text-center">
                                                                    Nouveau ici ? <a href="{{url('/register')}}"><b class="beige"> Créez votre compte</b></a>
                                                                </div>



                                                            </div>
                                                        </li>
                                                    </ul>
                                            </li>
                                        </ul>



                                    </div>
                                    <!-- header buttons end-->

                                    <!-- bouton créer en double (hidden xs ou visible....)-->
                                    <div class="header-dropdown-buttons-1">

                                        <a href="{{ route('meme_read') }}" class="btn btn-sm btn_creer hidden-xs"> <span class="glyphicon btn-glyphicon glyphicon-pencil img-circle icon_creer"></span>  Créer</a>

                                        <a href="{{ route('meme_read') }}" class="btn btn-lg btn_creer visible-xs btn-block"> <span class="glyphicon btn-glyphicon glyphicon-pencil img-circle icon_creer"></span>  Créer</a>


                                        @if(Auth::guest())

                                            <div class=" menu_categorie_xs "  >


                                                @foreach($categories as $categorie)

                                                    <div class="visible-xs col-xs-4 col_menu_catego_xs ">
                                                        <a href="{{route('categories_index', ['id'=>$categorie->id])}}"><img src="{{$categorie->image}}" alt="..." ></a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif



                                    </div>

                                    <div style="color:red; font-size:25px">

                                        <a href="{{route('fil_rouge')}}" style="color:red; font-size:25px" >fil rouge beta_dev</a>

                                    </div>




                                    <!-- end bouton créer -->


                                </div> <!--end navbar-collapse-->
                            </div><!--end container fluid-->
                        </nav>

                    </div><!--end main-navigation-->
                </div><!--end header-right-->


            </div><!--end col md 9-->

        </div><!--end row -->
    </div><!--end container-->
    </header>