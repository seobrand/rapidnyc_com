<?
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>


<h1>Contact Us</h1>


<?
$options = array(
	'menu' => 'about'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="contact_buttons">
<div class="grid_1">&nbsp;</div>
<div class="grid_14">
	<div class="leadButton first round_medium gray border">
	<?= $this->Html->link('Have an Agent Contact Me!', array('controller'=>'leads', 'action'=>'add','listing'=>$listing['Listing']['id']), array('class'=>'leadsLink fancybox.iframe')); ?>
	</div>
	<div class="leadButton round_medium gray border">
	Call us at <?= $_phone; ?>
	</div>
	<div class="leadButton round_medium gray border">
	<?= $this->Html->link($_email, 'mailto:'.$_email); ?>
	</div>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>
</div>


<hr />

<div class="offices_title">
<div class="grid_1">&nbsp;</div>
<div class="grid_14">
<h2>Find a Rapid Realty Office Near You</h2>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>
</div>


<div class="grid_1">&nbsp;</div>
<div class="grid_4">
	<div id="navListWrapper">
	<div id="navList">	
		<h3>Select a Region</h3>
		<ul>
		<? foreach ($offices_by_region as $region_id=>$region) { ?>
		<li>
			<a class="showOfficesLink" href="#" region="<? echo $region_id; ?>">
			<? echo $region['name']; ?>
			</a>
		</li>
		<? } ?>
		</ul>
	</div>
	</div>
</div> <!-- end .grid_4 -->


<div class="grid_10">
	<!-- offices map -->
		<?
		$map_id = "offices_map";
		//build map
		$mapOptions= array( 
			'mapId'=>$map_id,
			'width'=>'575px',
			'height'=>'450px',
			'zoom'=>10, 
			'type'=>'ROADMAP',
			'latitude'=>40.662552,
			'longitude'=>-73.995846,
			'localize'=>false
		);
		echo $this->GoogleMapV3->map($mapOptions); 

		//map the markers
		foreach ($offices_by_region as $region_id=>$region) {
			foreach ($region['offices'] as $office) { 
				
				//setup info window
				$windowText = "<p><strong>" . $office['Office']['name'] . "</strong></p>";
				$windowText .= "<p>" . $office['Office']['address_street'] . "<br>" . $office['Office']['address_city'] . ", " . $office['Office']['address_state'] . " " . $office['Office']['address_zip'] . "</p>";
				$windowText .= "<p>";
				$windowText .= "p. " . $office['Office']['phone'] . "<br>";
				$windowText .= $office['Office']['fax'] ? "f. " . $office['Office']['fax'] . "<br>" : "";
				$windowText .= $office['Office']['email'] ? "e. " . $this->Html->link($office['Office']['email'], "mailto:".$office['Office']['email']) . "<br>" : "";
				$windowText .= "</p>";
				$windowText .= "<p>" . $this->Html->link('More Information',array('controller'=>'offices','action'=>'view',$office['Office']['id']), array('target'=>'_blank')) . "</p>"; 
			
				$marker = array( 
					'mapId'=>$map_id,
				    'id'=>$office['Office']['id'],                    //Id of the marker 
				    'latitude'=>$office['Office']['latitude'],        //Latitude of the marker 
				    'longitude'=>$office['Office']['longitude'],      //Longitude of the marker 
				    'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom icon 
				    'shadowIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom shadow 
				    'infoWindow'=>true,            //Boolean to show an information window when you click the marker or not
				    'windowText'=>$windowText,         //Default text inside the information window 
				    'markerParams'=>array(
				    	'region_id'=>$region_id,
				    	'office_id'=>$office['Office']['id']
				    )
				); 
				//map the markers
				echo $this->GoogleMapV3->addMarker($marker);
			}
		}		
				
		//clear the map 		
		//echo $this->GoogleMapV3->clearMap($map_id);
		
		?>

	<? foreach ($offices_by_region as $region_id=>$region) { ?>
	<div id="neighborhoods_region_<?= $region_id; ?>" class="office_list" region_id="<?= $region_id; ?>">
		<h2><?= $region['name'] . " Offices"; ?></h2>
		<? foreach ($region['offices'] as $office) { ?>
			<div class="officeDiv dashTop">
				<h3><?= $office['Office']['name']; ?></h3>
				<div class="addressBlock">
					<p><?= $office['Office']['address_street'] . "<br>" . $office['Office']['address_city'] . ", " . $office['Office']['address_state'] . " " . $office['Office']['address_zip']; ?></p>
					<p>
					<?= "Phone: " . $office['Office']['phone']; ?>
					<? if ($office['Office']['fax']) { echo "<br>Fax: " . $office['Office']['fax']; } ?>
					<? if ($office['Office']['email']) { echo "<br>" . $this->Html->link($office['Office']['email'], "mailto:".$office['Office']['email']); } ?>
					</p>
				</div>				
				<div class="hoursBlock">
					<p><em><?= "Hours of Operation:<br>" . $office['Office']['hours']; ?></em></p>
					<p><?= $this->Html->link('View Agents & Photos',array('controller'=>'offices','action'=>'view',$office['Office']['id']), array('target'=>'_blank')); ?></p>
				</div>
				<div class="clear"></div>
			</div>
		<? } ?>
	</div>
	<? } ?>
	
</div><!-- end .grid_10 -->


<div class="grid_1">&nbsp;</div>
<div class="clear"></div>




<div class="otherContact">
<div class="grid_1">&nbsp;</div>
<div class="grid_14">
	
	<h2>Other Ways to Contact Rapid Realty</h2>

	<h3>Want to Schedule an Appointment to See an Apartment?</h3>
	<p>Call our appointment scheduling office at (347) 404-5202 or email <?= $this->Html->link('sales@rapidnyc.com', 'mailto:sales@rapidnyc.com'); ?></p>
	
	<!--<h3>Want to Check the Status of Your Deposit?</h3>
	<p>Call our Client Services Manager at (718) 395-7629 or email <?= $this->Html->link('status@rapidnyc.com', 'mailto:status@rapidnyc.com'); ?></p>-->
	
	<h3>Want to Speak to Customer Service?</h3>
	<p>We aim to satisfy all of our clients, and recognize that finding an apartment in New York isn't always a simple process. If you have an issue that requires extra attention, please contact our Customer Service Manager at (888) 439-4999 x150 or  <?= $this->Html->link('customerservice@rapidnyc.com', 'mailto:customerservice@rapidnyc.com'); ?></p>

</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>
</div>
