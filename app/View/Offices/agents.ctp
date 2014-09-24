<? $this->element('scripts_for_layout'); ?>



<?
//show agents?
if ($office) {
?>
<h1><? echo $office['Office']['name']; ?> Brokers &amp; Agents</h1>


<!-- subMenu -->
<?
$options = array(
	'menu' => 'about',
	'active' => '/offices/agents'
);
echo $this->element('nav_subMenu', $options); 
?>


<div class="grid_3">&nbsp;</div>
<div class="grid_10">

	<? foreach ($office['Agent'] as $agent) { 	?>
	
	<div class="agentDiv round_large gray border" agent_website="<? echo $agent['website_alias']; ?>">
	<?= $this->element('agent_card', array('agent'=>$agent)); ?>
	</div>
	
	<? } ?>
	
</div>		
<div class="grid_3">&nbsp;</div>
<div class="clear"></div>

<div class="grid_2">&nbsp;</div>
<div class="grid_12">
	<div class="round_large green border officeDisclaimer">
	This agents shown above are Licensed Real Estate Salespersons, licensed in the State of New York.
The Salespeople are affiliated with a Rapid Realty franchise, owned and operated by <?= $office['Office']['legal_name']; ?>, <?= $office['Office']['address_street'] . ", " . $office['Office']['address_city'] . ", " . $office['Office']['address_state'] . " " . $office['Office']['address_zip'] . ". " . $office['Office']['phone']; ?>
	</div>
</div>	
<div class="grid_2">&nbsp;</div>
<div class="clear"></div>

	







<? 
//otherwise, show offices
} else { 
?>	

<h1>Apartment Rental Experts</h1>


<!-- subMenu -->
<?
$options = array(
	'menu' => 'about'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_4">&nbsp;</div>
<div class="grid_8">

	<div class="officeList">
	<p>There are hundreds of Rapid Realty agents in the New York area.<br>Choose an office below to find the agents near you.</p>
		
	<? foreach ($offices_by_region as $region) { ?>
		<div class="dashTop">
		<h3><?= $region['name']; ?></h3>
		
			<? foreach ($region['offices'] as $office) { ?>
		
				<p><?= $this->Html->link($office['Office']['name'], array('controller'=>'offices', 'action'=>'agents', $office['Office']['id'])); ?></p>
			
			<? } ?>
		
		</div>	
	<? } ?>	
	</div>

<div class="grid_4">&nbsp;</div>
<div class="clear"></div>
<? } ?>


