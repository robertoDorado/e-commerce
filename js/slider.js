

		jQuery(document).ready(function() {

						

			jQuery('.tp-banner').show().revolution(

			{

				dottedOverlay:"none",

				delay:10000,

				startwidth:1140,

				startheight:450,

				hideThumbs:200,

				

				thumbWidth:100,

				thumbHeight:50,

				thumbAmount:5,

				

				navigationType:"bullet",

				navigationArrows:"none",

				

				touchenabled:"on",

				onHoverStop:"off",

				

				swipe_velocity: 0.7,

				swipe_min_touches: 1,

				swipe_max_touches: 1,

				drag_block_vertical: false,

										

										parallax:"mouse",

				parallaxBgFreeze:"on",

				parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

										

				keyboardNavigation:"off",

				

				navigationHAlign:"center",

				navigationVAlign:"bottom",

				navigationHOffset:0,

				navigationVOffset:60,

						

				shadow:0,



				spinner:"spinner4",

				

				stopLoop:"off",

				stopAfterLoops:-1,

				stopAtSlide:-1,



				shuffle:"off",

				

				autoHeight:"off",						

				forceFullWidth:"off",						

										

										

										

				hideThumbsOnMobile:"off",

				hideNavDelayOnMobile:1500,						

				hideBulletsOnMobile:"off",

				hideArrowsOnMobile:"off",

				hideThumbsUnderResolution:0,

				

				hideSliderAtLimit:0,

				hideCaptionAtLimit:0,

				hideAllCaptionAtLilmit:0,

				startWithSlide:0,

				fullScreenOffsetContainer: ".header"	

			});

							

		});



		// skills section

		jQuery(function(){

			$('.skills-box').appear(function() {

				DevSolutionSkill.init('circle1'); 

				DevSolutionSkill.init('circle2'); 

				DevSolutionSkill.init('circle3'); 

				DevSolutionSkill.init('circle4');

				DevSolutionSkill.init('circle5');

				DevSolutionSkill.init('circle6');

			});

		});

