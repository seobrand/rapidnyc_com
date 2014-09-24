<!--start about_sidebar_right -->
      <section id="about_animate_menu">
        <ul class="clearfix">
          <li> <a href="search_rent.php"> <span class="rapid_rent"></span>
            <div class="rapid_spe_text">
              <h2 class="rap_ani_heading">RENT<strong>RAPID</strong></h2>
            </div>
            </a> </li>
          <li> <a href="list_appartments.php"> <span class="list_rapid"></span>
            <div class="rapid_spe_text">
              <h2 class="rap_ani_heading">LIST<strong>RAPID</strong></h2>
            </div>
            </a> </li>
          <li> <a href="#"> <span class="franchise_rapid"></span>
            <div class="rapid_spe_text">
              <h2 class="rap_ani_heading">FRANCHISE<strong>RAPID</strong></h2>
            </div>
            </a> </li>
          <li> <a href="join_rapid.php"> <span class="join_rapid"></span>
            <div class="rapid_spe_text">
              <h2 class="rap_ani_heading">JOIN<strong>RAPID</strong></h2>
            </div>
            </a> </li>
        </ul>
      </section>
      
      <div class="facebook_box">
		  <div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like-box"
				data-href="http://www.facebook.com/rapidrealty" data-width="290"
				data-show-faces="true" data-border-color="#fff" data-stream="true"
				data-header="false"></div>
	</div>
	
       <div class="advertise_box">
		   <?php echo $this->Html->image('new_img/advertise-banner.jpg', array('alt' => 'Rapid Realty NYC')); ?>
	</div>
    <!--end of about_sidebar_right --> 
