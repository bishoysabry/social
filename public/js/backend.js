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
	// pop up
	$(".message").show();
setTimeout(function() { $(".message").hide(); }, 5000);
//modal view
var  postId= 0;
var postBodyElement= null;
$('.post').find('#edit').on('click',function(event){
	event.preventDefault();
	postBodyElement=event.target.parentNode.parentNode.childNodes[1];
	var postBody =postBodyElement.textContent;
 postId=event.target.parentNode.parentNode.dataset['postid'];
//	console.log(postBody);
$('#post-body').val(postBody);
	$('#myModal').modal();
});

//ajax Edit
$('#modal-save').on('click',function () {

	$.ajax({
		method:'POST',
		url:urlEdit,
		data:{body:$('#post-body').val(),id:postId,_token:token}
	})
	.done(function (msg){
		$(postBodyElement).text(msg['new_body']);
		$('#myModal').modal('hide');
	});
});
$('.like').on('click', function(event) {
    event.preventDefault();
    post_Id = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, post_id: post_Id, _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});
