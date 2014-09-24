<?
//standard agent card
if ($agent) {
?>

<div class="agentCard">
	<div class="agentPhoto">
	<? 
	if ($agent['photo']) {
		echo $this->Html->image(
			$agent['photo'],
			array(
				'alt'=>$agent['first_name'] . " " . $agent['last_name'],
				'class'=>'agentCardPhoto round_medium gray border'
			)
		);
	}
	?>
	</div> <!-- end .agentPhoto -->


	<div class="agentData">
		
		<div class="firstName"><?= $agent['first_name']; ?></div>
		<div class="lastName"><?= $agent['last_name']; ?></div>
		
		<div class="title"><?= nl2br($agent['title']); ?></div>

		<div class="phone dashTop"><?= $agent['phone'] ? 'Ph: ' . $agent['phone'] : ''; ?></div>
		<div class="email"><?= $agent['email'] ? $this->Html->link($agent['email'], 'mailto:'.$agent['email'] . ($listing['Listing']['id'] ? '?subject=Interested%20in%20Listing%20ID%20' . $listing['Listing']['id'] : '')) : ''; ?></div>
		
		<div class="signature"><?= nl2br($agent['signature']); ?></div>
		
	</div> <!-- end .agentData -->
	
	<div class="clear"></div>
</div> <!-- end .agentCard -->











<?
//office card
} else {
?>


<div class="agentCard">

	<!-- otherwise, show office card -->
	<div class="agentPhoto">
		<?= $this->Html->image('rapid/logo-agentCard.png', array('class'=>'agentCardPhoto round_large gray border')); ?>
	</div>
	
	<div class="officeData">
		<div class="officeName">Contact Us Anytime!</div>
		<div class="officeTitle">Call us now for more information on this listing!</div>
		<div class="officePhone dashTop">Call us <? echo $_phone; ?></div>
		<div class="officeEmail">or email us at <?=  $this->Html->link($_email, 'mailto:' . $_email . ($listing['Listing']['id'] ? '?subject=Interested%20in%20Listing%20ID%20' . $listing['Listing']['id'] : ($this->request->named['listing'] ? '?subject=Interested%20in%20Listing%20ID%20' . $this->request->named['listing'] : ''))); ?></div>
	</div>
		
	<div class="clear"></div>	
</div> <!-- end .agentCard -->

<? } ?>