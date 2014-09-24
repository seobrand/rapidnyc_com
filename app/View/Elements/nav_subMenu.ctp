<?
/* 
array of variables should be passed through
-----------------------------------------------
	
	"menu"
		name of menu you want to display
		
	"active" (optional)
		filename of page to make active
*/

//setup active filename (make it the current Action, if the variable isn't already set
$active = $active ? $active : $this->request->here; 



//ABOUT MENU
if ($menu=="about") {
	$pages = array(
		'/about/about_us'=>'About Us',
		'/offices/agents'=>'Our Agents',
		'/services/why_use_a_broker' => 'Why Use Us?',
		'/about/testimonials'=>'Testimonials',
		'/about/contact'=>'Contact Us'
	);
}




//CAREERS MENU
if ($menu=="careers") {
	$pages = array(
		'/careers'=>'Career Videos',
		'/careers/apply'=>'How to Apply',
		'/careers/why_rapid'=>'Why Work for Rapid?',
		'/careers/faq' => 'FAQ',
		'/about/contact'=>'Contact Us'
	);
}




//SERVICES
if ($menu=="services") {
	$pages = array(
		'/services/why_use_a_broker'=>'Why Use Us?',
		'/services/no_fee'=>'What is No Fee?',
		'/services/fees'=>'About Our Fees',
		'/about/about_us'=>'About Us'
	);
}




?>



<ul class="navBar">
	<? if ($pages) { foreach ($pages as $filename=>$title) { ?>
		<li <? if ($active==$filename) echo "class=\"active\""; ?>><a href="<?= $filename; ?>"><?= $title; ?></a></li>
	<? }} ?>
</ul>

