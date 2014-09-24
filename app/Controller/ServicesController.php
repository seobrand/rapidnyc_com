<?php

class ServicesController extends AppController {
	public $name = "Services";
	public $helpers = array('Youtube');
	
	
	//Fees
	public function fees() {
	
		//page title and meta
		$this->set('title_for_layout', "Apartment Rental Fees");
	
	}
	
	

	
	//No Fee
	public function no_fee() {
	
		//page title and meta
		$this->set('title_for_layout', "No Broker Fee");

	
	}
	



	//Why Use a Broker	
	public function why_use_a_broker() {
	
		//page title and meta
		$this->set('title_for_layout', "Why Use a Broker");
	
		$reasons = array(
			"It's Competitive Out There" => "The New York real estate market is tough. Good apartments at decent prices are hard to find, and if you find one, you'll probably be competing with dozens of other applicants. Rapid Realty will work with landlords to get your name on the top of the list, so you're not lost in the shuffle.",
			"No One Rents Faster Than Us" =>
			"The New York rental market moves FAST! A good listing can be gone in just a couple of hours, so getting through all the red tape quickly is critical. We know how the system works, and our dedicated closing team pushes to close every deal quickly, before your apartment is snatched up by someone else!",
			"More Exclusive Inventory" => "Rapid Realty has an entire department dedicated to bringing in new listings every day. So, we get all the best apartments in the area and put them in one database. At any time, we have thousands of listings posted online and hundreds more that just came in.",
			"Our Landlords Trust Us" => "To a landlord, you're probably just another name on an application, but they know us. We work with the same landlords for years, and they trust us to find the best tenants for their listings. So, if you're a match, we can make your name stand out.",
			"Every Deal is a BIG Deal" => "No matter what your budget, we give high priority to every deal. Let's face it -- we don't get paid unless we can get you approved and into an apartment, so we'll fight hard to find the right place for every client, and to get the deal closed. We work with you through the whole process.",
			"You Benefit From Our Experience" => "Unexpected issues during the rental process are frustrating and can delay or ruin your chances of getting an apartment. We've been in the real estate game for YEARS, and we've learned how to avoid most problems before they occur. We can help make the process smooth.",
			"You Have Nothing to Lose" => "Our rental agents will find apartments that match what you're looking for and show you as many of them as you like -- for FREE! If you don't find an apartment that you want, you'll never pay a dime, and if you do find something, hundreds of our listings are NO FEE.",
			"We Work Around Your Schedule" => "It's amazing to us, but most of our competitors just don't get how your schedule works. They're open 9:00 - 5:00 or maybe 10:00 - 6:00, so you have to leave work or school to see an apartment. At Rapid Realty, we can help you from 10:00 - 10:00 everyday."
		);
		$this->set('reasons',$reasons);
		


		
	}

}