<?
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>



<h1>Full Disclosure About Our Fees</h1>

<?
$options = array(
	'menu' => 'services'
);
echo $this->element('nav_subMenu', $options); 
?>


<div class="grid_2">&nbsp;</div>
<div class="grid_12">
	<h2>Here are the fees that you can expect when you come to Rapid Realty.</h2>
	
	<p>There is a lot of confusion and concern over what you should be paying when you work with a Real Estate Broker. At Rapid Realty, we understand that you're just trying to figure out what you're getting into. So, we'll make it easy for you. At Rapid Realty, you can expect these fees:</p>
	
	<div class="feeRow">
	<h3>Broker's Fee: No Fee & Fee Apartments</h3>
	<p>So, here's the truth: <em>every</em> apartment has a fee -- but <em>you</em> don't always have to pay it. At Rapid Realty, when we talk about <?= $this->Html->link('No Fee Apartments', array('controller'=>'services', 'action'=>'no_fee'), array('title'=>'New York No Fee Apartments')); ?>, we're referring to listings where the landlord is paying the fee for you so they can rent the property more quickly. Of course, we also have a large inventory of apartments that <em>do</em> carry a Broker's fee. Unfortunately, many of the best deals and hottest listings carry a fee, because the landlord knows that their apartment will rent quickly with or without a fee (this is New York, after all). In either case, we'll show you as many apartments as we can that meet your criteria, and the decision is yours. If the listing does carry a fee, your agent will fully disclose that information to you.</p>
	</div>
	
	<div class="feeRow">
	<h3>Move-In Deposit</h3>
	<p>The Deposit isn't really a fee, and Rapid Realty doesn't actually keep any of it. Rather, the Deposit is held by the landlord in case you cause any damage to their unit during your tenancy. Deposit amounts vary from landlord to landlord, but a typical Deposit is <strong>one or two months of rent</strong>. Landlords may request additional deposit amounts for tenants with risky credit history or unstable income.</p>
	</div>

	<div class="feeRow">
	<h3>Credit Check Fee</h3>
	<p>The Credit Check Fee (also known as an Application Fee) is the fee that you will be charged for checking your credit. Even if you've recently checked your own credit, we have to run it again. As your Broker, we're presenting you to the landlords, so we have to be 100% sure that all of our information is accurate and thorough. This means that we need to run our own credit check on each tenant that's applying to have their name on the lease, as well as any guarantors or co-signors. Credit checks cost <strong>fifty dollars</strong>. Occasionally, there may be an additional application fee charged by the apartment's management company, but this is fairly rare.</p>
	</div>

	<div class="feeRow">
	<h3>Debit Card Processing Fee</h3>
	<p>Sure, it's a trivial fee, but hey! we're trying to be up-front here. Many of our offices offer debit card as a payment option. They can accept all (or any portion) of your move-in fees via debit card, but there is <strong>transaction fee</strong>. This fee varies by office.</p>
	</div>

	<div class="feeRow">
	<h3>Methods of Payment</h3>
	<p>Your total balance will consist of rent payment, deposit, and applicable fees. You can pay this balance via cash, money order, certified bank check, or debit card. Personal checks are not accepted.</p>
	</div>	

</div>

<div class="grid_2">&nbsp;</div>
<div class="clear"></div>