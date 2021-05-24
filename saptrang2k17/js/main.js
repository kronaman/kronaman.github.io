$(document).ready(function () {

document.body.style.zoom = 1.0;
	var wWidth = $(window).innerWidth(),
		wHeight = $(window).innerHeight(),
		posX,
		posY,
		a,
		multiplier = 10;

	$('.page').mousemove(function (event) {

		posX = (event.pageX / wWidth) * multiplier;
        posY = (event.pageY / wHeight) * multiplier;

        $('.rocks-front').css('background-position' ,
			(posX * 10) + 'px ' + (posY * 10) + 'px');

		$('.rocks-mid').css('background-position' ,
		 	(posX * 4) + 'px ' + (posY * 4) + 'px');

		$('.rocks-back').css('background-position' ,
		 (posX * 2)+ 'px' + (posY * 2) + 'px');
	});

	// Scroll
	$(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scrollup').fadeIn();
        } else {
            $('#scrollup').fadeOut();
        }
    });

	$('#scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

  //     Form Page
  $('.button1').click(function(){
    var $btn = $(this),
        $step = $btn.parents('.modal-body'),
        stepIndex = $step.index(),
        $pag = $('.modal-header span').eq(stepIndex);

    if(stepIndex === 0 || stepIndex === 1) { step1($step, $pag); }
    else { step3($step, $pag); }

  });


  function step1($step, $pag){
    console.log('step1');
    // animate the step out
    $step.addClass('animate-out');

    // animate the step in
    setTimeout(function(){
      $step.removeClass('animate-out is-showing');
      $step.next().next().addClass('animate-in');
    }, 600);

  }


  function step3($step, $pag){
    console.log('3');

    // animate the step out
    $step.parents('.modal-wrap').addClass('animate-up');

    setTimeout(function(){
      $('.rerun-button').css('display', 'inline-block');
    }, 300);
  }

  $('.rerun-button').click(function(){
    $('.modal-wrap').removeClass('animate-up')
      .find('.modal-body')
      .first().addClass('is-showing')
      .siblings().removeClass('is-showing');

  });


  $('.modal-body-step-1 a').click(function(){
//    $('.modal-body-step-1').removeClass('is-showing');


    setTimeout(function(){
      $('.modal-body-step-1').addClass('animate-up').hide();
      $('.modal-body-step-2').addClass('animate-in').show();
//      $('.rerun-button').css('display', 'inline-block');
    }, 500);

  });

  $('.modal-body-step-2 a').click(function(){
    //    $('.modal-body-step-1').removeClass('is-showing');


    setTimeout(function(){
      $('.modal-body-step-2').addClass('animate-up').hide();
      $('.modal-body-step-1').addClass('animate-in').show();
    }, 500);

  });
// // Moblie navigation

  $('.times').click(function (e) {

    $('.sidebar').css('width','0px');
  });
  $('.ham').click(function (e) {

    $('.sidebar').fadeIn(300).css('width','100vw');
  });

  // $('.column_line_up_areas').find('h1').click(function(){
  //   console.log('buk');
  //   $('.content1').slideDown(300);
  // });

  function showSnippet(x) {

  for(var i=1;i<=6;i++) {

    var div = $('#' + 'content' + i);
      console.log(div);
    // div.classList.add("showMe");
    // div.classList.toggleClass("hideMe");
    if(i == x) {
      // document.getElementById(arr[x]).style.borderBottom = "solid 2px lightgreen";
      div.slideDown(1000);
    }

    else {
      // document.getElementById(arr[x]).style.borderBottom = "none";
      div.slideUp(500).delay(1500);
    }

  }

}


// Loader

var $load = $('.loading');
setTimeout(function () {
  $load.fadeOut();
  $load.remove();
  console.log("I'm faded");
  $(".dates").addClass("tada");
}, 6000);

//Horizontal scrolling

$(".left-arrow").click(function(e){
        console.log("lmove");
        e.preventDefault();
        $('#l_box').animate({
            scrollLeft: -1000
        }, 600);
        return false;
    });

$(".right-arrow").click(function(e){
        console.log("rmove");
        e.preventDefault();
        $('#l_box').animate({
            scrollLeft: 1000
        }, 600);
    });

});
