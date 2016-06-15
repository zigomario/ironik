




<!-- ==============================================
    FOOTER
    =============================================== -->


<footer>
    <div class="row">
        <div class="col-md-12">
            <div class="panel text-center footer">

                <p>@Copyright 2016</p>
            </div>

        </div>



    </div>


</footer>


</div><!--end wrappercontainer (general pour sidebar)-->





@section('js')
<!-- ==============================================
    SCRIPTS
    =============================================== -->

<!--Load Jquery-->

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script><!-- pour le meme generatoir j'ai du retirer la dernière librairie de jquery....voir si conséquence !!!-->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


<!--Load Bootstrap JS-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<!--=============plugin divers=========================-->

<!--caroussel 3d-->
<script src="{{asset('js/3dcarousel.js')}}"></script>

<!--plug meme gen-->
<script type="text/javascript" src="{{asset('js/memegenerator/jquery.memegenerator.min.js')}}"></script>

<!-- plug option pour meme gen-->
<script src="{{asset('js/colorpicker/spectrum.js')}}"></script>

<!--loader indicator-->

<script src="{{asset('js/load_Indicator/jquery.faloading.js')}}"></script>

<!--========================js perso =========================-->
<script type="text/javascript" src="{{ asset('js/ironiq.js') }}"></script>

@show

</body>



</html>