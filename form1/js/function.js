$(function(){

	// 横幅取得
	var w = $(window).width();


	/*=======================================
	スムーズスクロール
	=========================================*/
	$('a[href^="#"]').click(function(){
		$('html,body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 500, 'swing');
		return false;
	});
	
	var gotop = $('.pagetop');
	gotop.hide();
	$(window).scroll(function(){
		if ($(window).scrollTop() > 500) gotop.fadeIn();
		else gotop.fadeOut();
	});
	
	var separate;
	if(w>640){ separate = 30; }
	else { separate = 10; }

	$(window).on('scroll', function(){
		scrollHeight = $(document).height();
		scrollPosition = $(window).height() + $(window).scrollTop();
		footHeight = $('.footer').innerHeight();
		//console.log(footHeight);
		if (scrollHeight - scrollPosition <= footHeight) gotop.css({'position':'absolute','bottom':footHeight + separate});
		else gotop.css({'position':'fixed','bottom':separate+'px'});
	});




	
	if(w>640){// PCでの処理



	} else {// SPでの処理



	}


});




$(window).on('load', function(){// ロード完了時に処理



	// 横幅取得
	var w = $(window).width();
	

	
	if(w>640){// PCでの処理



	} else {// SPでの処理



	}




});




$(window).on('load resize', function(){// ロード完了、リサイズ時に処理


	// 横幅取得
	var w = $(window).width();


	if(w>640){// PCでの処理



	} else {// SPでの処理



	}


});