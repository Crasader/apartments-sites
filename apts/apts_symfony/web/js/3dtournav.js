$(document).ready(function() {

    (function(){

			if(nav3dtour) {
				if (typeof imageIcon == 'undefined') { imageIcon = '/images/mh_icon_dollhouse.png'; }
				if (typeof imageClose == 'undefined') { imageClose = '/images/close3d.png'; }
				if (typeof navText == 'undefined') { navText = 'view 3d tour'; }
				if (typeof navUrl == 'undefined') { navUrl = '/3dtour'; }
				var containerElement = "<div class='nav3d' ><div class='navClose'><img src='"+imageClose+"' /></div><div class='nav3dparams'><a href='"+navUrl+"' class='nav3dLink'><div class='nav3dimage'><img src='"+imageIcon+"' /></div><div class='nav3dtext'>"+navText+"</div></a></div></div>";
				$('body').append(containerElement);

				$(window).load(function() {
						$('.nav3d').toggleClass('nav3dPos');
				});

				$('.navClose').on('click', function(){
					$('.nav3d').toggleClass('nav3dPos');
					// set cookie here to prevent-reopening if they request it.
				});
			}

    })();


});
