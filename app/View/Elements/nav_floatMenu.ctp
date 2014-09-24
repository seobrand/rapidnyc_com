<?php 
	$secenddate=strtotime("01/17/2014 00:00:00");
	$sectodaysdate=time();
	$diff=$secenddate-$sectodaysdate;
	$days=sprintf("%02s",round((($diff/24)/60)/60));
	$hours= sprintf("%02s",floor($diff%(24*60*60) / (60*60)), 0);
	$minutes=sprintf("%02s", floor( (($diff%(24*60*60)) % (60*60) ) / 60));
?>

<style>.error{ color: red; font-size: 12px; padding: 5px 0 0 0; margin-left:120px;}</style>

<?php if(isset($openPopup) && $openPopup==1){ ?>
	<a class="fancybox" href="#inline1" title="" style="text-align:center;display: none;"></a>
	<div  class="float_counter_pop" id="inline1" style="width:584px;display: none;">
	<div class="pop_title_heading">
		<?=$this->Html->image('grassSky/almost-text.png', array('alt'=>'THE NEW  RAPIDNYC WEBSITE  IS ALMOST HERE...')); ?>
	</div>
	<div class="count_all_wrap">
		<strong id="days1" class="countdown"><?php echo $days; ?></strong>:<strong id="hours1"><?php echo $hours; ?></strong>:<strong id="mins1"><?php echo $minutes; ?></strong>:<strong id="sec1">00</strong>
	</div>
	<div class="pop_logo_img">
		<?=$this->Html->image('grassSky/rapid_pop_logo.png', array('alt'=>'RAPIDNYC')); ?>
	</div>
	
	<div class="pop_newsletter">
		<p>If you'd like to receive updates on the launch of the new RapidNYC.com website,<br /> 
		or stay up to date with Rapid News , Subscribe Now!</p>
		
		<?php echo $this->Form->create('newsletter', array('class' =>'formee') ); ?>
		<span id="val_err" class="error"></span>
		<div class="pop_news_inner">
			<?php echo $this->Form->input('email_input', array('id' => 'email_input', 'div' => false, 'label' => false, 'class' => 'email_input_pop', 'placeholder' => 'Enter Your Email Address Here') ); ?>
			<a id="submit" class="newsletter_submit">Submit</a>
		</div>
		<?php $this->Form->end(); ?>
	</div>
	</div>

	<div  class="float_counter_pop2" id="inline2" style="display: none;">
		<div class="pop_title_heading">
			<?=$this->Html->image('grassSky/almost-text.png', array('alt'=>'THE NEW  RAPIDNYC WEBSITE  IS ALMOST HERE...')); ?>
		</div>
		
		<div class="pop_thanks">Thank you for submitting your email we'll  definitely keep you posted</div>
		
		<div class="pop_logo_img">
			<?=$this->Html->image('grassSky/rapid_pop_logo.png', array('alt'=>'RAPIDNYC')); ?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox({
				wrapCSS   	: 'fancybox-custom-timer',
				closeClick	: false,
				openEffect	: 'none',
				helpers 	: { 
								title : {
									type : 'inside'
								},
								overlay : {
									css : { 	}
								}
							  }
				}).trigger('click');
				
				
				
			
			$('#submit').live('click', function() { 
					$('#val_err').html('<?php echo $this->Html->image('ajax-loader-1.gif'); ?>');
					var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
					if (pattern.test($('#email_input').val())) 
					{
						$.ajax({
						  type: "POST",
						  url: '<?php echo $this->Html->url( array('controller' => 'about', 'action' => 'newsletter'), true ); ?>',
						  data: { email: $('#email_input').val() , test: "str" },
						  success: function(data) { 
										$.fancybox({ 
											href : '#inline2', 
											wrapCSS    : 'fancybox-custom-timer2',
											closeClick : false 
										});
										return false;
							  }
						});
					}
					else
					{
						$('#val_err').html('Please fill a valid Email Id');						
					}
					return false;
				});
			
			
		});
	</script>
<?php }?>


<div id="floatMenuWrapper">
<div id="floatMenu">
<div class="float_counter">
<strong id="days0"><?php echo $days; ?></strong>:<strong id="hours0"><?php echo $hours; ?></strong>:<strong id="mins0"><?php echo $minutes; ?></strong>:<strong id="sec0">00</strong>

</div>



  <ul class="menuHome">
    <li><?=$this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home'), array('title'=>'Rapid Realty')); ?></li>
  </ul>
  <ul class="menuListings">
	<li><?=$this->Html->link('Search Apartments', array('controller'=>'listings', 'action'=>'search'), array('title'=>'New York Apartments')); ?></li>
  </ul>
  <ul class="menuServices">
  	<li><?=$this->Html->link('How it Works', array('controller' => 'services', 'action' => 'why_use_a_broker'), array('title'=>'How it Works')); ?></li>
  </ul>
  <ul class="menuAbout">
  	<li><?=$this->Html->link('About Us', array('controller' => 'about', 'action' => 'about_us'), array('title'=>'About Us')); ?></li>
  </ul>
  <ul class="menuLandlords">
  	<li><?=$this->Html->link('Landlords', array('controller' => 'landlords', 'action' => 'reasons'), array('title'=>'Landlords')); ?></li>
  </ul>
 <ul class="menuContact">
  	<li><?=$this->Html->link('Affiliates', array('controller' => 'landlords', 'action'=>'affiliates'), array('title'=>'Affiliates')); ?></li>
  </ul>
  <ul class="menuCareers">
  	<li><?=$this->Html->link('Real Estate Jobs', array('controller' => 'careers', 'action' => 'index'), array('title'=>'Careers')); ?></li>
  </ul>
  <ul class="menuContact">
  	<li><?=$this->Html->link('Contact Us', array('controller' => 'about', 'action'=>'contact'), array('title'=>'Contact Us')); ?></li>
  </ul>
   
</div>
</div>
