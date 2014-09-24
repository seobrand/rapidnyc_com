<? 
$options = array();
$options['cssFiles'] = array('formee/css/formee-structure.css', 'formee/css/formee-style.css', 'form.css'); //reincluded form.css, where we can override formee styles
$options['jsFiles'] = array('formee.js');
//Dynamic JS and CSS content
$this->element('scripts_for_layout', $options);
?>


<div class="addLeadWrapper">

<h1>Have Someone Contact Me</h1>


<?= $this->Form->create('Lead', array('class'=>'formee')); ?>

<div class="grid-7-12">
	<?= $this->Form->input('first_name'); ?>
	<?= $this->Form->input('last_name'); ?>
	<?= $this->Form->input('email'); ?>
	<?= $this->Form->input('phone'); ?>
	
	<?= $this->Form->input('move_date', array(
		'label' => 'Desired Move Date',
	    'dateFormat' => 'MDY',
	    'minYear' => date('Y'),
	    'maxYear' => date('Y') + 1,
	    'timeFormat' => false,
	    'separator' => ' ',
	    'class' => 'formee-small'
	)); ?>

</div>



<div class="grid-5-12">
	
		
	<?= $this->Form->input('bedrooms', array('label'=>'Desired Bedrooms', 'empty'=>true)); ?>
	
	<div class="input select">
	<label for="LeadBudget">Max Rent Budget</label>
	<?
	$options = array(); $i=1000; while($i<12000) { $options[$i] = "$" .$i . " per month"; $i=$i+250; }
	echo $this->Form->select('budget', $options); ?>
	</div>
	
	<?= $this->Form->input('lease', array('label'=>'Lease Situation', 'empty'=>true)); ?>
	<?= $this->Form->input('credit', array('label'=>'Estimated Credit')); ?>
	
	
</div>

<div class="clear"></div>

<div class="grid-12-12">
<?= $this->Form->submit('Contact Me!'); ?>
</div>


<?= $this->Form->end(); ?>


</div>
