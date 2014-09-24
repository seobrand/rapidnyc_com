<?
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>



	<h1>What is a No Fee Apartment?</h1>

<?
$options = array(
	'menu' => 'services'
);
echo $this->element('nav_subMenu', $options); 
?>


<div class="grid_2">&nbsp;</div>
<div class="grid_12">

	<div class="round_large blue">
	<?= $this->Youtube->video('http://www.youtube.com/watch?v=EcvOScY7Voc', array(), array('width'=>680, 'height'=>455)); ?> 
	</div>

	<div class="feeRow first">
	<h3>What is a No Fee Apartment?</h3>
	<p>A "No Fee" Apartment is an apartment where the landlord pays the fee for the tenant. Landlords are willing to pay the fee because they realize that No Fee listings are more popular and rent faster than apartments with a fee.</p>
	</div>
	
	<div class="feeRow">
	<h3>Do you only offer No Fee Apartments?</h3>
	<p>Rapid Realty offers apartments with fees and without fees. There are lots of great apartments in both categories, so keep an open mind about fees when shopping: <?= $this->Html->link('Find an Apartment', array('controller'=>'listings', 'action'=>'search'), array('title'=>'New York Apartments')); ?>.</p>
	</div>
	
	<div class="feeRow">
	<h3>Why do some apartments have fees?</h3>
	<p>It's the landlord's decision whether to offer the apartment as No Fee or not. Many landlords do not like to pay the fee because they know that their listing is hot and it will rent quickly with or without a fee. Whenever possible, we always encourage landlords to pay the fee.</p>
	</div>
	
	<div class="feeRow">
	<h3>How much does a Broker's Fee cost?</h3>
	<p>All apartments at Rapid Realty are LOW fee or No Fee. If a standard apartment does carry a fee, it will be fully disclosed to you.</p>
	</div>
	
	<div class="feeRow">
	<h3>Are there any other fees?</h3>
	<p>For an up-front breakdown of what you can expect to pay at Rapid Realty, read <?= $this->Html->link('About Our Fees', array('controller'=>'services', 'action'=>'fees'), array('title'=>'About Broker Fees')); ?>.</p>
	</div>
	
		
</div>

<div class="grid_2">&nbsp;</div>
<div class="clear"></div>