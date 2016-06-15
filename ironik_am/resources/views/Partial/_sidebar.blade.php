<div id="wrapper" class="">
    <div id="sidebar-wrapper">



        <div class="row categorie_sidebar">


            @foreach($categories as $categorie)

            <div class="col-md-4 col-sm-4 col-xs-4 col_categorie_sidebar">
                <a href="{{route('categories_index', ['id'=>$categorie->id])}}"><img src="{{$categorie->image}}" alt="..." class="img-responsive"></a>
            </div>
            @endforeach


        </div>

        <ul class="sidebar-nav">

            <li  >
                <a href="{{route('newsfeed_index', ['id'=>auth::user()->id])}}"><i class="fa fa-newspaper-o"></i>  NewsFeed</a>
            </li>

            <li  >
                <a href="{{route('users_index', ['id'=>auth::user()->id])}}"><i class="fa fa-newspaper-o"></i>  Users</a>
            </li>

            <li >
                <a href="{{route('home_index')}}#top_prof_home"><i class="fa fa-trophy"></i> Top User</a>
            </li>
            <li>
                <a href="{{route('home_index')}}#check_that"><i class="fa fa-hashtag"></i>Check_that</a>
            </li>

            <li  class="charibote_li">
                <a href="{{ route('meme_read') }}" class="charibote_a">Charibotes ! </a>
            </li>

            <li>

                <figure class="profil_figure_sidebar">

                    <a href="{{route('users_index', ['id'=>auth::user()->id])}}"><img src="{{ Auth::user()->avatar }}" alt="..." class="img-responsive"/></a>


                </figure>
                <div class="name_auth_side">{{ Auth::user()->username }}</div>

            </li>

            <li>
                <a href="{{ route('user_private_read') }}"  class=""><i class="fa fa-user"></i>  Mon espace</a>
            </li>
            <li>
                <a href="{{ route('profil_setting_index') }}"><i class="fa fa-cog"></i>  Mon profil</a>
            </li>

            <li>
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Deconnexion</a>
            </li>


        </ul>
    </div>
</div>

<!--===============
         BOUTON TOGGLE SIDE
         =============================-->

<div id="toggle_button_side" class="view_full">

    <a href="#menu-toggle"  id="menu-toggle"><i class="fa fa-user iconnav"></i></a>

</div>
