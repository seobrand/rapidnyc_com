<? 
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>


<h1>Rapid Realty Real Estate Jobs</h1>


<?
$options = array(
	'menu' => 'careers'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_1">&nbsp;</div>
<div class="grid_14">
	<? 
	$perRow = 2;
	$i = 1;
	foreach ($reasons as $reason=>$description) { 
	?>
		<div class="round_large orange border thick reasonDiv <? if ($i==1) { echo "first"; $i++; } elseif ($i==$perRow) { echo "last"; $i=1; } else { $i++; } ?>">
			<h3><?= $reason; ?></h3>
			<p><?= $description; ?></p>
		</div>
	<? } ?>
	<div class="clear"></div>

		
	<div class="signupButton">
		<?= $this->Html->link('Learn How to Apply for a Job at Rapid Realty', array('controller'=>'careers', 'action'=>'apply'), array('class'=>'button huge')); ?>
	</div>

</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>	




