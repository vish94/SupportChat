$(document).ready(function() {
	//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		document.getElementById("shout_message").readOnly=true;
});

$(document).ready(function() {
	$("#shout_email").keypress(function(evt){
		document.getElementById("shout_message").readOnly=false;		
	});
});

$(document).ready(function() {	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
					document.getElementById("shout_username").readOnly=true;
					document.getElementById("shout_email").readOnly=true;
					var iemail = $("#shout_email").val();
					post_data = {'username':iusername, 'message':imessage, 'email':iemail};
		
					//send data to "shout.php" using jQuery $.post()
					$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');

					var useremail = $("#shout_email").val();
					load_data = {'fetch':1, 'email': useremail};
					window.setInterval(function(){
	 					$.post('shout.php', load_data,  function(data) {
							$('.message_box').html(data);
							var scrolltoh = $('.message_box')[0].scrollHeight;
							$('.message_box').scrollTop(scrolltoh);
	 					});
					}, 1000);
					

				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});

	
	//toggle hide/show shout box
	$(".header").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
  

});

