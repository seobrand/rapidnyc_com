<? $this->element('scripts_for_layout'); ?>



<h1>About Us</h1>	


<!-- subMenu -->
<?
$options = array(
	'menu' => 'about'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_1">&nbsp;</div>
<div class="grid_7">
<div class="round_medium blue inline-block" style="padding-top: 6px;">
  <object width="360" height="240">
    <param name="movie" value="http://www.youtube.com/v/jZV3Pypacss" />
    </param>
    <embed src="http://www.youtube.com/v/jZV3Pypacss" type="application/x-shockwave-flash" width="360" height="240"> </embed>
  </object>
</div>
</div>

<div class="grid_7">
<h2>Our Mission is Simple:<br />Match You with Your Ideal Property</h2>
<p>Let's be honest, we don't make money unless we find you a place AND get you approved by the landlord/owner. From the moment that you <?=$this->Html->link('call us', array('controller' => 'about', 'action' => 'contact')); ?> to the moment that we hand you the keys to your new apartment or commercial space, we are fighting for you! We want you to find the right property as much as you do, and our goal is to make the process as FAST and SIMPLE as possible. Ready to <?=$this->Html->link('Find an Apartment', array('controller' => 'listings', 'action' => 'search')); ?>?</p>
</div>

<div class="grid_1">&nbsp;</div>
<div class="clear"></div>

<hr />

<div class="grid_1">&nbsp;</div>
<div class="grid_14">
<h2>No Hidden Fees! Our Apartments are Low Fee or NO Fee!</h2>
<p>As a New York real estate brokerage, we know that we have to overcome some pretty negative stereotypes. You might expect us to be pushy or always trying to sneak in some hidden fees. Well, we've got nothing to hide: <?=$this->Html->link('Learn About Our Fees', array('controller'=>'services', 'action'=>'fees')); ?>. We are a No Fee apartment leader in New York. We have hundreds of no fee apartments and thousands of low-fee apartments. We also offer competitive fees on our commercial spaces for lease.</p>
<p>If you want more information about No Fee Apartments, read the <?=$this->Html->link('What is a No Fee Apartment?', array('controller'=>'services', 'action'=>'no_fee')); ?> section.</p>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>

<hr />

<div class="grid_1">&nbsp;</div>
<div class="grid_14">
<h2>We've Been Around the Block</h2>
<?=$this->Html->image('rapid/about-rapid-realty-staff-small.png', array('alt'=>'New York Real Estate Brokers', 'class'=>'round_large blue', 'id'=>'staffPhoto')); ?>
<p>We've been in the New York real estate game for more than a decade. No other brokerage has built strong relationships with as many landlords and management companies throughout the Greater New York Area. That means we have more listings to choose from and we can get you approved faster. With over 700 rental agents and thousands of apartments and commercial spaces for rent all over the city, our team is well-equipped to find you the perfect property to lease. We know that you have a lot of options when it comes to choosing a real estate agency, but here are some of the things that set us apart from the competition: a massive inventory of listings that's updated every day, the desire to negotiate and fight for you, great technology solutions, a dedicated closing team who specializes in getting you approved, and an up-front, no-hidden-fees approach. <?=$this->Html->link('Find an Agent', array('controller'=>'offices','action'=>'agents')); ?>.</p>
<p>If that's not enough, we're also New York's most convenient real estate company. We know you're busy, and searching for an apartment can be a hassle. That's why we've made it easier than ever to drop by on your lunch break, between classes, or on your way home from work.</p>
<p>We opened our first franchise in Bay Ridge in 2009, and we've been spreading like wildfire ever since. Today we have more than 50 locations throughout the city, which means no matter where you are, there's always a Rapid Realty just around the corner. And since most of our offices are open from 10 AM-10 PM, 7 days a week, we can accommodate any schedule.</p> 
<p>Want to start your own Rapid Realty? Check out our <?=$this->Html->link('Franchise Opportunities', array('controller'=>'franchise', 'action'=>'index')); ?>.</p>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>


<hr />

<div class="grid_1">&nbsp;</div>
<div class="grid_5"><?=$this->Html->image('rapid/about-executive-magazine-cover-flow.png', array('alt'=>'Anthony Lolli', 'url'=>'http://www.anthonylolli.com', 'target'=>'_blank')); ?></div>
<div class="grid_9">
<h2>Our CEO, Anthony Lolli, is the Real Deal</h2>
<p>Anthony Lolli is the CEO of Rapid Realty and the Broker of our South Park Slope office. Unlike a lot of real estate brokers, Anthony doesn't just sit around all day and collect a cut of the commission -- he gets involved. With more than a decade of real estate experience, Anthony knows the ins and outs of the industry, and he's not afraid to roll his sleeves up and help you get into an apartment. <?=$this->Html->link('Learn More About Anthony Lolli','http://www.anthonylolli.com',array('target'=>'_blank')); ?>.</p>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>


<hr />

<h3><?=$this->Html->link('Find an Apartment', array('controller' => 'listings', 'action' => 'search')); ?></h3>
<h3><?=$this->Html->link('Customer Reviews', array('controller'=>'about', 'action'=>'testimonials')); ?></h3>

