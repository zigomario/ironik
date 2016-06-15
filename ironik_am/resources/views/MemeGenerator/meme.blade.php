@extends('layout')
@section('css')
    @parent
    <link href="{{asset ('css/bloc_infostat_user.css')}}" rel="stylesheet" >
    <link href="{{asset ('css/meme-gen.css')}}" rel="stylesheet" >
    <link href="{{asset('js/memegenerator/jquery.memegenerator.min.css')}}" rel="stylesheet">

    <style>
    h2 {
    display: block;
    text-align: center;
    }

    .example {
    margin: 0 0 10% 0;

    }



    .save button {
    display: block;
    width: 100%;
    margin-bottom: 15px;
    font-size: 24px;
    }

    /*css du loader indicator*/

    .jq-fa-loading.icon-only .fa-loading-icon
    {
        color: #F1D783;
    font-size: 8em;
    margin-top: 4em;
    margin-left:1em;
    }


    </style>

@endsection
@section('title')
    Meme
@endsection



    @section('js')
    @parent


            <!--==================
DiverseS FonctionS autour du meme
      ===================--->
    <script src="{{asset('js/load-image/load-image.all.min.js')}}"></script>

    <!--Au clic de save : envoie de l'image en ajax au serveur distant -->
    <script type="text/javascript">

        $("#publier").click(function(e) {
            e.preventDefault();

            var imageDataUrl = $(".mg-image  img").memeGenerator("save");
            var title = $('#title').val();
            var categories_id = $('#categories_id').val();
            var user = '{{Auth::user()->id}}';


            $.ajax({
                url: "/meme/store",
                type: "POST",
                data: {
                    image: imageDataUrl,
                    title: title,
                    user: user,
                    categories_id: categories_id,
                    '_token': '{!! csrf_token() !!}'

                },

                success: function () {


                    document.location.replace("{!! route('home_index') !!}");
                }

            });
        });


    // Fonction pour lire l image de l''input files,
      //                  fixer la taille de l'image
        //                  L'injecter dans la div d  plugin meme  -->


        function readURL(input) {
            if (input.files && input.files[0]) {
                var current_file = input.files[0];
                var reader = new FileReader();

                    reader.onload = function (event) {
                        var image = new Image();
                        image.src = event.target.result;

                        image.onload = function () {
                            var maxWidth = 1200,
                                    maxHeight = 630,
                                    imageWidth = image.width,
                                    imageHeight = image.height;


//                            if (imageWidth > imageHeight) {
//                                if (imageWidth > maxWidth) {
//                                    imageHeight *= maxWidth / imageWidth;
//                                    imageWidth = maxWidth;
//                                }
//                            }
//                            else {
//                                if (imageHeight > maxHeight) {
//                                    imageWidth *= maxHeight / imageHeight;
//                                    imageHeight = maxHeight;
//                                }
//                            }
                            imageWidth= maxWidth;
                            imageHeight=maxHeight;


                            var canvas = document.createElement('canvas');
                            canvas.width = imageWidth;
                            canvas.height = imageHeight;
                            image.width = imageWidth;
                            image.height = imageHeight;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(this, 0, 0, imageWidth, imageHeight);

                            $('#example-save').attr('src', canvas.toDataURL(current_file.type));
                        }
                    }
                    reader.readAsDataURL(input.files[0]);
            }
        }
                        $("#image").change(function(){
                            readURL(this);
                        });



        // Initialise le plugin meme gen ( sur balise img )
        // Voir option pour le css/modifier
        // voir option draw qui deconne
        $("#example-save").memeGenerator({

            useBootstrap: true,

        });





    </script>






    @endsection



    @section('content')




            <!-- ==============================================
                  BANDEAU USER
      =============================================== -->



            <!-- ==============================================
                PARTIE MEME GENERATOR
    =============================================== -->


    <!--meme gene section-->
    <section>




        <div  class="container content-section text-center">






            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel_meme">

                    <div class="panel-body">
                    <!-- Div plugin meme-->

                        <div class="example save" >

                            <h2>Créer ton même</h2>
                            <img id="example-save" src="{{asset('img/fondtest.png')}}" >


                        </div>

                    <!-- Début input perso (title, categorie-->

                    <form role="form" class="">




                        <div class="form-group ">
                            <label for="image" class="">   Choisir une image et la modifier</label>


                                <input required onchange="document.getElementById('image').value = this.value;" accept="image/*" capture="capture" type="file" id="image" name="image" class="form-control">


                        </div>





                        <div class="form-group">
                            <label for="categories_id">Lui attribuer une catégorie</label>
                            <select name="categories_id" id="categories_id"  class="form-control text-center">
                                @foreach($categories as $categorie)
                                    <option  value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                @endforeach
                            </select>
                        </div>




                        <button   class="btn btn-success" id="publier">Publier</button>




                    </form>

                    </div>

                    </div><!--end panel-->

                </div><!--en col gene-->


            </div><!--end row gen-->



        </div><!--end container-->



    </section>










@endsection