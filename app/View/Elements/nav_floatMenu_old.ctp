<div id="floatMenuWrapper">
<div id="floatMenu">
  <ul class="menuHome">
    <li><?=$this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home'), array('title'=>'Rapid Realty')); ?></li>
  </ul>
  <ul class="menuListings">
	<li><?=$this->Html->link('Search Apartments', array('controller'=>'listings', 'action'=>'search'), array('title'=>'New York Apartments')); ?></li>
  </ul>
  <ul class="menuServices">
  	<li><?=$this->Html->link('How it Works', array('controller' => 'services', 'action' => 'why_use_a_broker'), array('title'=>'How it Works')); ?></li>
  </ul>
  <ul class="menuAbout">
  	<li><?=$this->Html->link('About Us', array('controller' => 'about', 'action' => 'about_us'), array('title'=>'About Us')); ?></li>
  </ul>
  <ul class="menuLandlords">
  	<li><?=$this->Html->link('Landlords', array('controller' => 'landlords', 'action' => 'reasons'), array('title'=>'Landlords')); ?></li>
  </ul>
  <ul class="menuCareers">
  	<li><?=$this->Html->link('Real Estate Jobs', array('controller' => 'careers', 'action' => 'index'), array('title'=>'Careers')); ?></li>
  </ul>
  <ul class="menuContact">
  	<li><?=$this->Html->link('Contact Us', array('controller' => 'about', 'action'=>'contact'), array('title'=>'Contact Us')); ?></li>
  </ul>
</div>
</div>