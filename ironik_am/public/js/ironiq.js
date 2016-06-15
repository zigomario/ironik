$ (document) .ready (function () {






	//Déroulement sidebar


    $("#menu-toggle").click(function(e) {
    	
        e.preventDefault();
        
        $("#wrapper").toggleClass("toggled");

        if ($('#toggle_button_side').attr('class') == "view_full"){
        
	        $('#toggle_button_side').removeClass("view_full");
	        $('#toggle_button_side').addClass("view_toggled");
    		} 
    		else {
		        $('#toggle_button_side').removeClass("view_toggled");
		        $('#toggle_button_side').addClass("view_full");
		    }


    });








	/*============================================
	 Bloc meme
	 ==============================================*/

	/*pour derouler commentaires au clic du nombre de commenatire
	Je pourrais lier avec la fonction similaire en dessous concernant le deroulement des com au clic sur l'input textarea...seulement là je veux pas le focus sur le text.
	et ça permet par ailleurs de ré enrouler la section coms . Alors qu'avec la fonction pour textaera, l'input disparait et cen'est plus possible
	 */

	$(".comment-count").on('click',function(event){
		var $panel = $(this).closest('.panel-meme');
		$comment = $panel.find('.panel-meme-comment');
		$panel.toggleClass('panel-meme-show-comment');

		return false; //utile pour eviter le retour en top page a cause du href='#'


	});


	//Déroule aera comments

	$(function () {
		$('.panel-meme > .panel-footer > .input-placeholder, .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > button[type="reset"]').on('click', function(event) {
			var $panel = $(this).closest('.panel-meme');
			$comment = $panel.find('.panel-meme-comment');

			$comment.find('.btn:first-child').addClass('disabled');
			$comment.find('textarea').val('');
			console.log('test');
			$panel.toggleClass('panel-meme-show-comment');

			if ($panel.hasClass('panel-meme-show-comment')) {
				$comment.find('textarea').focus();
			}
		});
		$('.comments_textarea').on('keyup', function(event) {
			var $comment = $(this).closest('.panel-meme-comment');

			$comment.find('button[type="submit"]').addClass('disabled');
			if ($(this).val().length >= 1) {

				$comment.find('button[type="submit"]').removeClass('disabled');
			}
		});
	});


	//Partage sur FB + force scrap FB

	$(".fb_share").click(function() {

		//ajac pour scrap fb
		//$.ajax({
        //
		//	url: '/posts/reload',
		//	type: "POST",
		//	data: {
        //
		//		'_token': '{!! csrf_token() !!}'
        //
		//	},
		//});

		var thisbutton = (this);
		var imgsrc = $(this).closest(".panel-meme").find(".img_post").attr("src");
		//pour faire apparaitre boite de dialogue fb
		FB.ui({
			method: 'feed',
			caption :'http://ironiq.adrididi.fr/',
			link:'http://ironiq.adrididi.fr/',
			picture: imgsrc
//                method: 'share_open_graph',
//                action_type: 'og.likes',
//                action_properties: JSON.stringify({
//                    object : { 'og:url': 'http://ironiq.adrididi.fr/', 'og:title': 'title',
//                        'og:description': 'description',
//                        'og:og:image:width': '1200',
//                        'og:image:height': '630',
//                        'og:image': imgsrc
//                        }
//                 })


		}, function(response){});


		return false;


	});



	/*******Commentaire ++ ******//////////


		//requête ajax au clic du bouton ++ pour ajouter des commentaires
		// utilisation de this afin d'appliquer l'event à un seul post
		// closest () => le parent nommé le plus proche en remontant
		// puis find() => première occurence trouvé
		//PENSER A METHODISER POUR CHAQUE PAGE

	$(".comment_plus").click(function(){


		var thisbutton = (this)
		var last_id = $(this).closest(".panel-meme").find(".commentaires:last").attr("id");
		var posts_id = $(this).attr("value");



		$.ajax({

			url:'/comments/commentsplus/'+last_id+'/'+posts_id ,


			success: function(html){

				if(html) {

					$(thisbutton).closest(".panel-meme").find(".content_commentaires").append(html);
				}

			}



		});


	});



	/************Like button***********************/


	$(".like_button").click(function() {


		var thisbutton = this; //passer préalablement le this en variable est obligatoire pour récuperer this en ajax

		var posts_id = $(thisbutton).attr("value");
		console.log(posts_id)
		var token =  $('meta[name="csrf-token"]').attr('content')


		$.ajax({

			url: '/posts/like',
			type: "POST",
			data: {
				'posts_id': posts_id,
				'_token': token

			},

			success: function (html) {

				if (html) {

					$(thisbutton).find(".like_button_value").text(html);
				}

			}


		});



	});


	/* Partage button */


	$(".share_button").click(function() {


		var thisbutton = this; //passer préalablement le this en variable est obligatoire pour récuperer this en ajax
		var posts_id = $(thisbutton).attr("value");
		var token =  $('meta[name="csrf-token"]').attr('content')


		$.ajax({

			url: '/posts/share',
			type: "POST",
			data: {
				'posts_id': posts_id,
				'_token': token

			},

			success: function (html) {

				if (html) {

					$(thisbutton).find(".share_button_value").text(html);
				}

			}


		});



	});


/*=========
Loader indicator
 */
	var loading_time = 3000;

	$("#publier").click(function() {
		$("body").faLoading();

		setTimeout(function() {
			$("body").faLoading(false);
		},loading_time);
	});







/*============================================
	ScrollTo Links
	==============================================*/

	/*============================================
    Slider
    ==============================================*/



/*============================================
CAROUSEL

==============================================*/

    $('#carousel').carousel3d();

   

























});


