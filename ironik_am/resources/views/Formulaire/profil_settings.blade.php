@extends('layout')

@section('title')
    Page Edition Profil
@endsection



@section('css')
    @parent

    <link href="{{asset ('css/bloc_infostat_user.css')}}" rel="stylesheet" >
    <link href="{{asset ('css/loginregister.css')}}" rel="stylesheet">

@endsection

@section('js')
    @parent

        <!-- pour injecter l'image du bouton files dans le meme-->
    <script>

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){
            readURL(this);
        });

    </script>


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







@section('content')





    <div class="container">

        <div class="panel panel-warning top-panel-log">

            <div class="panel-heading"> Si ça te botte, tu peux ici coller ta tronche et raconter ta vie</div>

            <div class="panel-body">


                <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="{{ route('profil_setting_store' ) }}">
                    {!! csrf_field() !!}
                    <div class="row">

                        <div class="col-md-7">



                            <div class="form-group has-info">
                                <label for="description" class="control-label" >Description</label>
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                                    <textarea name="description" class="form-control">Une petite phrase pour te décrire ?</textarea>
                                </div>
                            </div>





                            </br>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Actualiser profil
                            </button>


                        </div> <!-- FIN DIV PARTIE PSEUDO NOM PRENOM -->


                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{Auth::user()->avatar}}" id="blah" alt="...">
                                    <div class="caption">
                                        <h3>Une petite photo ?</h3>

                                        <input onchange="document.getElementById('image').value = this.value;" accept="image/*" capture="capture" type="file" id="image" name="image" class="gui-file">
                                    </div>
                                </div>
                            </div>



                    </div> <!-- DIV ROW -->
                </form>

                </div> <!-- FIN PANEL BODY -->

        </div><!--fin panel-->

        <div class="panel panel-warning top-panel-log">

            <div class="panel-heading"> Et ici tu peux modifier les informations de ton compte.</div>

            <div class="panel-body">


                <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="{{ route('profil_setting_store') }}">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="{{auth::user()->name}}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">lastname</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" placeholder="{{auth::user()->lastname}}" >

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">username</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="{{auth::user()->username}}" >

                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="{{auth::user()->email}}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">city</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="city" placeholder="{{auth::user()->city}}" >

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Date Naissance</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="naissance" id="datepicker" placeholder="{{auth::user()->naissance}}" >

                            @if ($errors->has('naissance'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('naissance') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" placeholder="{{auth::user()->password}}" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="{{auth::user()->password_confirmation}}">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>




                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Actualiser compte
                    </button>



                </form>

            </div> <!-- FIN PANEL BODY -->

        </div><!--fin panel-->



    </div> <!-- FIN DIV CONTAINER -->


@endsection
