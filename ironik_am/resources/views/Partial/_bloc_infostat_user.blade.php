


<!-- ==============================================
  BANDEAU USER
=============================================== -->

<div class="header" style="" >


    <div class="row ">

        <div class="col-md-4 col-md-offset-2  col-sm-5 col-sm-offset-2  ">





            <div class="media">
                <a class="rond_1" href="#">
                    <img class="media-object dp img-circle" src="{{$userprofil->avatar}}" style="width: 100px;height:100px;">
                </a>



                <div class="media-body">
                    <h4 class="media-heading">{{$userprofil->username}} <small>{{$userprofil->city}}</small></h4>

                    <span class="label label-default  header_stats"> {{$getpublic->nbpublie}} Publications </span>
                    <span class="label label-default header_stats"> {{$nblikes}} Likes </span>
                    <span class="label label-info header_stats"> {{$getnbfollower}} Abonnés </span>
                    <span class="label label-default header_stats"> {{$getNbFollowing}} Abonnements </span>


                </div>
            </div>

        </div><!--end cold md4-->

    </div><!--end  row-->

</div>
