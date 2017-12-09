$(document).ready(function(){

	'use strict';



	//switch btn login &signup
	$('.loginpage span').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.loginpage form').hide();
		$('.'+ $(this).data('class')).fadeIn(500);
	});
	//hide place holder
$('[placeholder]').focus(function(){
	$(this).attr('data-text',$(this).attr('placeholder'));
	$(this).attr('placeholder','');

}).blur(function(){
	$(this).attr('placeholder',$(this).attr('data-text'));
});

  	//select boxit
	$('select').selectBoxIt({

	autoWidth:false ,
    // Uses the jQueryUI 'shake' effect when opening the drop down
    showEffect: "shake",

    // Sets the animation speed to 'slow'
    showEffectSpeed: 'slow',

    // Sets jQueryUI options to shake 1 time when opening the drop down
    showEffectOptions: { times: 1 },

    // Uses the jQueryUI 'explode' effect when closing the drop down
    hideEffect: "explode"

  });
});
	// add asterisk on required inputs
	$("input").each(function(){

		if($(this).attr('required')==='required'){
			$(this).after('<span class="asterisk">*</span>');

		}

	});

//confirmation
	$('.confirm').click(function(){
	return confirm('Are you sure  ??');
	});
