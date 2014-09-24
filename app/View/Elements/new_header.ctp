<!--start header_main -->
  <div id="header_top"> 
    <!--start header_top -->
    <div id="header_inner"> 
      <!--start header_inner -->
      <div id="logo_img">
		  <?php echo $this->Html->link( $this->Html->image('new_img/logo.png', array('alt' => 'Rapid Realty NYC')), 
				array('controller' => 'pages', 'action' => 'display', 'home'), 
				array('title'=>'Rapid Realty NYC', 'escape'=>false)
			  );
			  ?>
		</div>
      <div id="social_box">
        <ul>
          <li class="facebook_hd"><a href="#">facebook</a></li>
          <li class="twitter_hd"><a href="#">twitter</a></li>
          <li class="youtube_hd"><a href="#">youtube</a></li>
          <li class="linkedin_hd"><a href="#">linkedin</a></li>
        </ul>
      </div>
      <div id="search_box">
        <input type="text" value="KEYWORD SEARCH" class="key_input">
        <input type="button" value="Go" class="key_button" >
      </div>
      <!--end of header_inner --> 
    </div>
    <nav id="navigation"> 
      <!--start navigation -->
      <div class="nav_logo"></div>
      <ul>
        <li><?php echo $this->Html->link( $this->Html->image('new_img/nav-logo.png', array('alt' => 'Home')), 
				array('controller' => 'pages', 'action' => 'display', 'home'), 
				array('title'=>'Rapid Realty NYC', 'escape'=>false)
			  );
			  ?></li>
        <li class="<?php if($page=='home') echo "active" ?>"><a href="index.php"><span>Home</span></a></li>
        <li class="<?php if($page=='search_pg') echo "active" ?> has-sub"><a href="javascript:void(0)"><span>Search Apartments</span></a>
          <ul>
            <li class="<?php if($page2=='search_rent') echo "active" ?>"><a href="search_rent.php"><span>To Rent</span></a></li>
            <li class="<?php if($page2=='search_buy') echo "active" ?>"><a href="search_buy.php"><span>To Buy</span></a></li>
          </ul>
        </li>
        <li class="<?php if($page=='why') echo "active" ?> has-sub"><a href="javascript:void(0)"><span>WHY RAPID?</span></a>
          <ul>
            <li  class="<?php if($page2=='use_rapid') echo "active" ?>"><a href="why_use_rapid.php"><span>WHY USE RAPID?</span></a></li>
            <li  class="<?php if($page2=='no_fees') echo "active" ?>"><a href="why_no_fee.php"><span>WHAT IS NO FEE?</span></a></li>
            <li  class="<?php if($page2=='our_fees') echo "active" ?>"><a href="why_our_fees.php"><span>ABOUT OUR FEES</span></a></li>
          </ul>
        </li>
        <li class="<?php if($page=='about') echo "active" ?> has-sub"><a href="javascript:void(0)"><span>ABOUT RAPID</span></a>
          <ul>
            <li class="<?php if($page2=='about') echo "active" ?>"><a href="aboutus.php"><span>ABOUT US</span></a></li>
            <li class="<?php if($page2=='about_executives') echo "active" ?>"><a href="about-executives.php"><span>OUR EXECUTIVES</span></a></li>
            <li class="<?php if($page2=='about_agent') echo "active" ?>"><a href="about_agent.php"><span>OUR AGENTS</span></a></li>
            <li class="<?php if($page2=='about_affiliates') echo "active" ?>"><a href="about_affiliates.php"><span>OUR AFFILIATES</span></a></li>
            <li class="<?php if($page2=='about_givingback') echo "active" ?>"><a href="about_givingback.php"><span>GIVING BACK</span></a></li>
          </ul>
        </li>
        <li class="<?php if($page=='list_appart') echo "active" ?>"><a href="list_appartments.php"><span>LIST APARTMENTS</span></a> </li>
        <li class="<?php if($page=='join') echo "active" ?> has-sub"><a  href="javascript:void(0)"><span>JOIN RAPID</span></a>
        <ul>
            <li class="<?php if($page2=='join_rapid') echo "active" ?>"><a href="join_rapid.php"><span>JOIN RAPID</span></a></li>
            <li class="<?php if($page2=='why_rapid') echo "active" ?>"><a href="join_why_rapid.php"><span>WHY RAPID?</span></a></li>
            <li class="<?php if($page2=='how_apply') echo "active" ?>"><a href="join_how_apply.php"><span>HOW TO APPLY</span></a></li>
            <li class="<?php if($page2=='join_faq') echo "active" ?>"><a href="join_faq.php"><span>FAQ</span></a></li>
          </ul>
        
        </li>
        <li class="<?php if($page=='press') echo "active" ?> has-sub"><a  href="javascript:void(0)"><span>press &amp; MEDIA</span></a>
          <ul>
            <li class="<?php if($page2=='press_media') echo "active" ?>"><a href="press_media.php"><span>PRESS &amp; MEDIA</span></a></li>
            <li class="<?php if($page2=='press_tattoo') echo "active" ?>"><a href="press_rapidtattoo.php"><span>RAPID<span>TATTOOS</span></span></a></li>
            <li class="<?php if($page2=='press_awards') echo "active" ?>"><a href="press_awards.php"><span>AWARDS</span></a></li>
            <li class="<?php if($page2=='press_releases') echo "active" ?>"><a href="press_release.php"><span>PRESS RELEASES</span></a></li>
          </ul>
        </li>
        <li class="<?php if($page=='green') echo "active" ?> has-sub"><a href="javascript:void(0)"><span>RAPID<span>GREEN</span></span></a>
          <ul>
            <li class="<?php if($page2=='green_mission') echo "active" ?>"><a href="green_mission.php"><span>OUR MISSION</span></a></li>
            <li class="<?php if($page2=='green_news') echo "active" ?>"><a href="green_news.php"><span>GREEN NEWS</span></a></li>
            <li class="<?php if($page2=='green_faq') echo "active" ?>"><a href="green_faq.php"><span>FAQ</span></a></li>
          </ul>
        </li>
        <li class="<?php if($page=='contactus') echo "active" ?> last"><a href="contactus.php"><span>Contact Us</span></a></li>
      </ul>
      <!--end navigation --> 
    </nav>
    <!--end of header_top --> 
  </div>
  <!--end of heder_main --> 
