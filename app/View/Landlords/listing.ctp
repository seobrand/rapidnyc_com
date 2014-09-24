<? 
$options = array();
$options['cssFiles'] = array('formee/css/formee-structure.css', 'formee/css/formee-style.css', 'form.css'); //reincluded form.css, where we can override formee styles
$options['jsFiles'] = array('formee.js');
//Dynamic JS and CSS content
$this->element('scripts_for_layout', $options);
?>


<h1>List Your Property</h1>


<div class="grid_3">&nbsp;</div>
<div class="grid_10">
	<div class="round_large yellow border thick pad15">
	Just a few quick questions, and our army of rental agents will contact you and start showing your property pronto!  Submit the form below, to get started.
	</div>

</div>
<div class="grid_3">&nbsp;</div>
<div class="clear"></div>


<hr />


<div class="grid_3">&nbsp;</div>
<div class="grid_10">


	<?= $this->Form->create('Landlord', array('class'=>'formee')); ?>
	
	<div class="property_information">
		
		<h2>Property Information</h2>
	
		<div class="grid-12-12">
		<?= $this->Form->input('address_street'); ?>
		</div>
		<div class="clear"></div>	
		
		<div class="grid-6-12">
			<?= $this->Form->input('address_city', array('label'=>'City')); ?> 
		</div>
		<div class="grid-2-12">
			<?= $this->Form->input('address_state', array('label'=>'State')); ?>
		</div>
		<div class="grid-4-12">
			<?= $this->Form->input('address_zip', array('label'=>'Zip Code')); ?>
		</div>
		<div class="clear"></div>
		
		<div class="grid-3-12">
			<?= $this->Form->input('bedrooms', array('empty'=>true)); ?> 
		</div>
		<div class="grid-3-12">
			<?= $this->Form->input('bathrooms', array('empty'=>true)); ?> 
		</div>
		<div class="clear"></div>
	
		<div class="grid-6-12">
			<?= $this->Form->input('rent', array('type'=>'text', 'label'=>'Monthly Rent')); ?>
		</div>
		<div class="clear"></div>
	
		<div class="grid-7-12">
			<?= $this->Form->input('date_available', array(
				'label' => 'Date Available',
			    'dateFormat' => 'MDY',
			    'minYear' => date('Y'),
			    'maxYear' => date('Y') + 1,
			    'timeFormat' => false,
			    'separator' => ' ',
			    'class' => 'formee-small'
			)); ?>
		</div>
		<div class="clear"></div>
	
		<div class="grid-12-12">
			<?= $this->Form->input('notes', array('label'=>'Property or Other Notes')); ?>
		</div>
		<div class="clear"></div>

	
	</div> <!-- end .property_information -->

	<hr />

	<div class="landlord_information">		
		
		<h2>Landlord Information</h2>
	
	
		<div class="grid-6-12">
			<?= $this->Form->input('first_name'); ?> 
		</div>
		<div class="grid-6-12">
			<?= $this->Form->input('last_name'); ?> 
		</div>
		<div class="clear"></div>
		
		<div class="grid-6-12">
			<?= $this->Form->input('phone'); ?> 
		</div>
		<div class="grid-6-12">
			<?= $this->Form->input('email'); ?> 
		</div>
		<div class="clear"></div>

		<div class="grid-12-12">
		<?= $this->Form->submit('Submit My Listing!'); ?>
		</div>
		<div class="clear"></div>

	</div> <!-- end .landlord_information -->


	<?= $this->Form->end(); ?>

</div>
<div class="grid_3">&nbsp;</div>
<div class="clear"></div>


<hr />

<div class="signupButton">
	<?= $this->Html->link('Top Reasons to Make Us Your Broker', array('controller'=>'landlords', 'action'=>'reasons'), array('class'=>'button huge')); ?>
</div>