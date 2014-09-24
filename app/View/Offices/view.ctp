<? $this->element('scripts_for_layout'); ?>




<h1>Rapid Realty - <? echo $office['Office']['name']; ?></h1>

<!-- subMenu -->
<?
$options = array(
	'menu' => 'about',
	'active' => '/about/contact'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_3">&nbsp;</div>

<div class="grid_6">
	<?
	//build map
	$mapOptions= array( 
		'mapId'=>'officeMap',
		'width'=>'310px',
		'height'=>'310px',
		'zoom'=>15, 
		'type'=>'ROADMAP',
		'latitude'=>$office['Office']['latitude'],
		'longitude'=>$office['Office']['longitude'],
		'localize'=>false
	);
	echo $this->GoogleMapV3->map($mapOptions); 
	
	//set marker
	$marker = array( 
		'mapId'=>'officeMap',
	    'id'=>$office['Office']['id'],                    //Id of the marker 
	    'latitude'=>$office['Office']['latitude'],        //Latitude of the marker 
	    'longitude'=>$office['Office']['longitude'],      //Longitude of the marker 
	    'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom icon 
	    'shadowIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom shadow 
	    'infoWindow'=>false

	); 
	//map the markers
	echo $this->GoogleMapV3->addMarker($marker);
	?>
</div>
<div class="grid_4">
	<p><?= $office['Office']['address_street'] . "<br>" . $office['Office']['address_city'] . ", " . $office['Office']['address_state'] . " " . $office['Office']['address_zip']; ?></p>
	<p>
		<?= "Phone: " . $office['Office']['phone']; ?>
		<? if ($office['Office']['fax']) { echo "<br>Fax: " . $office['Office']['fax']; } ?>
		<? if ($office['Office']['email']) { echo "<br>" . $this->Html->link($office['Office']['email'], "mailto:".$office['Office']['email']); } ?>
	</p>
	<p><em><?= "Hours of Operation:<br>" . $office['Office']['hours']; ?></em></p>
	<p><?= $this->Html->link("View " . $office['Office']['name'] . " Agents", array('controller'=>'offices','action'=>'agents',$office['Office']['id'])); ?></p>
</div>
<div class="grid_3">&nbsp;</div>
<div class="clear"></div>


<div class="grid_3">&nbsp;</div>
<div class="grid_10">
	<div class="round_large gray border officeDisclaimer">
	This location is a <?= $this->Html->link('Rapid Realty Franchise', array('controller'=>'franchise')); ?>, independently owned and operated by <?= $office['Office']['legal_name']; ?>.
	</div>
</div>
<div class="grid_3">&nbsp;</div>
<div class="clear"></div>
