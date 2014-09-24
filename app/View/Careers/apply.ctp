<? 
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>

<h1>Work for Rapid Realty</h1>


<?
$options = array(
	'menu' => 'careers'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_2">&nbsp;</div>
<div class="grid_6">
	
	<h2>Where Do I Sign Up?</h2>
	
	<p>Joining the Rapid Realty team all starts with a phone call to our Human Resources department. It'll only take a second, and we'll be happy to answer all of your questions. Call anytime:</p>
	
	<p>
	Carlos Angelucci<br />
	Human Resources Director<br />
	(888) 439-4999 Ext 705<br />
	<?= $this->Html->link('careers@rapidnyc.com', 'mailto:careers@rapidnyc.com?subject=Interested%20in%20a%20Real%20Estate%20Career'); ?>
	</p>
	
</div>
<div class="grid_6">
	<p>&nbsp;</p>
	<?=$this->Html->image('rapid/about-rapid-realty-staff-small.png', array('alt'=>'New York Real Estate Brokers', 'class'=>'round_large blue right')); ?>
</div>
<div class="grid_2">&nbsp;</div>
<div class="clear"></div>


<div class="grid_1">&nbsp;</div>
<div class="grid_14"><hr /></div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>


<div class="grid_2">&nbsp;</div>
<div class="grid_12">
	
	<h2>Why Join Our Team?</h2>
	
	<ul class="careerReasons">
	<li>Unlimited income potential through generous commissions and bonuses!</li>
	<li>Access to the largest database of listings in Brooklyn!</li>
	<li>No experience necessary! We will teach you all you need to know about real estate.</li>
	<li>Fun and informative ongoing training will keep you at the top of your game!</li>
	<li>Flexible scheduling!</li>
	<li>Conveniently located office in South Park Slope!</li>
	<li>Be your own boss and reap the rewards of your own work!</li>
	</ul>
	
</div>
<div class="grid_2">&nbsp;</div>
<div class="clear"></div>



<div class="grid_1">&nbsp;</div>
<div class="grid_14"><hr /></div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>

<div class="signupButton">
<?= $this->Html->link('Learn More About What Makes Rapid Realty Different', array('controller'=>'careers', 'action'=>'why_rapid'), array('class'=>'button huge')); ?>
</div>