$(document).ready(function() {
	//thumbnail links
	$('.careerVideoThumb a').click(function() {

		//stop active video
		var active_video_id = $('.careerVideo.active').attr('video_id');
		var oldPlayer = document.getElementById('careerVideo_'+active_video_id); //use old skool javascript to get the object
		oldPlayer.stopVideo();
		
		//fade out active video, fade in new video, add active class to new video
		var new_video_id = $(this).attr('video_id');
		$('.careerVideo.active').fadeOut(
			'fast', 
			function() { 
				$(this).removeClass('active');
				$('#careerVideoWrapper_'+new_video_id).fadeIn(
					'fast', 
					function() { 
						$(this).addClass('active'); 
					}
				);
			}
		);
		
		//play new video with YouTube API 
		var newPlayer = document.getElementById('careerVideo_'+new_video_id); //use old skool javascript to get the object
		setTimeout(function() {
			newPlayer.playVideo();
		}, 1000);
		
		return false;			
	});
});