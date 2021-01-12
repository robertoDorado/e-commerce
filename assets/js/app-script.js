
$(function() {
    "use strict";
     
// metismenu

$(function() {

  $('#menu').metisMenu();
  
  });
  
	
	$(".search-btn-mobile").on("click", function(){
        $(".search-bar").addClass("full-search-bar");
    });	
	
	$(".search-arrow-back").on("click", function(){
        $(".search-bar").removeClass("full-search-bar");
    });
	
	$(".overlay").on("click", function(){
        $("#wrapper").removeClass("toggled");
    });
	
	$(".close-btn").on("click", function(){
        $("#wrapper").removeClass("toggled");
    });
	
	
	// toggle menu button
	
    $(".toggle-menu").click(function () {
        if ($("#wrapper").hasClass("toggled")) {
            // unpin sidebar when hovered
            $("#wrapper").removeClass("toggled");
            $("#sidebar-wrapper").unbind( "hover");
        } else {
            $("#wrapper").addClass("toggled");
            $("#sidebar-wrapper").hover(
                function () {
                    $("#wrapper").addClass("sidebar-hovered");
                },
                function () {
                    $("#wrapper").removeClass("sidebar-hovered");
                }
            )

        }
    });
	
	
	   
// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".metismenu li a").filter(function() {
            return this.href == i;
        }).addClass("").parent().addClass("mm-active"); ;) {
            if (!o.is("li")) break;
            o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
        }
    }), 	



/* Back To Top */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 300) { 
            $('.back-to-top').fadeIn(); 
        } else { 
            $('.back-to-top').fadeOut(); 
        } 
    }); 

    $('.back-to-top').on("click", function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});	   
	
	
	
$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


	 // theme setting
	 $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });
	
	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    
    function theme1() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme1');
      $('.brand-logo').attr('class', 'brand-logo bg-theme1');
    }

    function theme2() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme2');
	  $('.brand-logo').attr('class', 'brand-logo bg-theme2');
    }

    function theme3() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme3');
	  $('.brand-logo').attr('class', 'brand-logo bg-theme3');
    }

    function theme4() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme4');
	  $('.brand-logo').attr('class', 'brand-logo bg-theme4');
    }
	
	function theme5() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme5');
	  $('.brand-logo').attr('class', 'brand-logo bg-theme5');
    }
	
	function theme6() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme6');
	  $('.brand-logo').attr('class', 'brand-logo bg-theme6');
    }

   
    // header setting 
	
	$('#header1').click(header1);
    $('#header2').click(header2);
	$('#header3').click(header3);
	$('#header4').click(header4);
	$('#header5').click(header5);
	$('#header6').click(header6);
	
	function header1() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme1');
    }
	
	function header2() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme2');
    }
	
	function header3() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme3');
    }
	
	function header4() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme4');
    }
	
	function header5() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme5');
    }
	
	function header6() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme6');
    }
	
	
	
	// default header & sidebar
	
	$(document).ready(function(){
		
	   $("#default-header").click(function(){
		  
		 $("#header-setting").removeClass("color-header bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
		
	  });
	  
	  
	  $("#default-sidebar").click(function(){
		  
		 $("#sidebar-wrapper").removeClass("bg-theme bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
		 $(".brand-logo").removeClass("bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
		
	  });
	  
	  
	  
	});
	
	
	
	
	
	
	
	
	

});