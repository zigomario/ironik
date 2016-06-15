@extends('layout')
@section('css')
    @parent
    <link href="{{asset ('css/userprivate.css')}}" rel="stylesheet" >
    <link href="{{asset ('css/bloc_infostat_user.css')}}" rel="stylesheet" >
@endsection

@section('title')
    Page User Private
@endsection



@section('content')





        <!-- ==============================================
      BANDEAU
          =============================================== -->


    @include('Partial/_bloc_infostat_user')




        <!--========================Barre Sélection double TAb Mes Tops / Mes Favoris  ======================-->

        <div class="container">





            <!--=====================Container double Tab ============================================-->

            <div class="userprivate_global">
                <div class="tab-content">

                    <!--=============Tab 1 ===================-->




                    <div class="row">

                        <!-- Filter -->
                        <ul class="filter clearfix">
                            <li class="active"><a href="#" title="#" data-filter="all"> Tous </a></li>
                            <li><a href="#" title="#" data-filter="categories"> Mes favoris</a></li>
                            <li><a href="#" title="#" data-filter="likes"> Mes Tops Création </a></li>

                        </ul>


                        <div class="col-md-2 ">
                            <div class="thumbnail thumbnail_userprivate_meme">
                                <img src="img/1.jpg" alt="...">
                                <div class="caption">
                                    <p><a href="#" class="btn btn-primary" role="button"> 12 <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>  </a> <a href="#" class="btn btn-default" role="button"> 12 <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="thumbnail thumbnail_userprivate_meme">
                                <img src="img/2.jpg" alt="...">
                                <div class="caption">
                                    <p><a href="#" class="btn btn-primary" role="button"> 12 <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>  </a> <a href="#" class="btn btn-default" role="button"> 12 <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="thumbnail thumbnail_userprivate_meme">
                                <img src="img/3.jpg" alt="...">
                                <div class="caption">
                                    <p><a href="#" class="btn btn-primary" role="button"> 12 <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>  </a> <a href="#" class="btn btn-default" role="button"> 12 <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="thumbnail thumbnail_userprivate_meme">
                                <img src="img/3.jpg" alt="...">
                                <div class="caption">
                                    <p><a href="#" class="btn btn-primary" role="button"> 12 <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>  </a> <a href="#" class="btn btn-default" role="button"> 12 <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="thumbnail thumbnail_userprivate_meme">
                                <img src="img/3.jpg" alt="...">
                                <div class="caption">
                                    <p><a href="#" class="btn btn-primary" role="button"> 12 <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>  </a> <a href="#" class="btn btn-default" role="button"> 12 <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="thumbnail thumbnail_userprivate_meme">
                                <img src="img/2.jpg" alt="...">
                                <div class="caption">
                                    <img class="fav img-circle" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQ0MnEfoPV4P3eQAzOdyluVwc9zIAdameGqM5t-MMkBW7_CdIIb" style="width: 50px;height:50px;">

                                    <a href="#" class="btn btn-primary" role="button"> 12 <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>  </a>
                                </div>
                            </div>
                        </div>




                    </div><!--end 1er row tab 1-->



                    <!--==================================================-->

                </div><!--end class content-->
            </div><!--end class userprivate_global-->








        </div> <!--end container -->














@endsection