<?php

class CareersController extends AppController {
	public $name = "Careers";
	public $helpers = array('Youtube');
	
	
	//index
	public function index($update_cached_videos=null) {

		$videos = $this->getYouTubeCache($update_cached_videos);
		
		//clean up the ids to usable ids
		foreach ($videos as $k=>$v) {
			$id = explode('/',$v['id']);
			$id = array_pop($id);
			$videos[$k]['video_id'] = $id;
		}
		
		$this->set('videos',$videos);
		
		
		//page title and meta
		$this->set('title_for_layout', "Real Estate Jobs");
		
	}
	


	//apply
	public function apply() {
	
	
		//page title and meta
		$this->set('title_for_layout', "Apply for a Real Estate Job");

	}


	
	//FAQ
	public function faq() {
	
		//page title and meta
		$this->set('title_for_layout', "Real Estate FAQ");
	
	}
	
	
	
	//Why Rapid Realty
	public function why_rapid() {
	
		$reasons = array(		
			"Get the Best Training in the Industry"=>"We're obsessive about support and training. Rapid agents attend regular training seminars to ensure that all of our agents know the latest strategies and techniques. No secrets - We teach success!",
			"We Pay for your Real Estate School"=>"To work as a Real Estate Salesperson, you need to be certified by the State of New York. This process takes two to three weeks, and if you work for us, we'll pay for your real estate education classes!",
			"Earn Competitive Commissions"=>"In most offices, you have to find and rent your own listings in order to make a living. At Rapid, our process is different. You just have to show apartments -- no listing, no closing. We make it easy to succeed. If you show apartments, you can make up to 40% of the commission. If you list, you can make an additional 20%.",
			"We Believe in Working as a Team"=>"Real Estate is known as a cut-throat industry. Unfortunately, this mentality prevails within most of our competitors' offices. At other firms, agents are lying to each other and cheating to get ahead. At Rapid Realty, we don't stab each other in the back; we work as a team. There's plenty of pie for everyone!",
			"Gain Access to a HUGE Inventory"=>"Our database is massive, and constantly growing. We represent thousands of Brooklyn listings, every month. As a Rapid Realty agent, you'll be able to find the right property for every client.",
			"Today's Money is in Rentals"=>"The economy is weak, so real estate sales are suffering -- and so is our competition. On the other hand, rentals are staying strong. Rapid Realty specializes in rentals, and we can make you a pro, too.",
			"Work Side-by-Side With Our Brokers"=>"Unlike other firms, our Brokers don't just sit around getting rich off of your sweat. We recognize that company success is dependent on your success, so our Brokers work with you to get the job done.",
			"Benefit From Our Years of Experience"=>"At Rapid, we learn from our mistakes. We've been in this business for a long time, so we can teach our agents to avoid pitfalls before they encounter them. You don't have to re-invent the wheel.",
			"Join a Team that People Recognize"=>"Rapid Realty closes hundreds of deals every month. We have thousands of website visitors every day, and dozens of billboards all over town. People know our name, and when they're ready to move, they come to us first. It's a lot easier to rent apartments when the leads are calling you.",
			"We're Big and Getting Bigger"=>"With around 100 Real Estate Agents all over Brooklyn, Rapid Realty is already one of the biggest names in town, but now we're getting even bigger. Rapid Realty is franchising itself into locations all over New York. When you join Rapid, you're joining a larger network with real Brand Power!"
		);
		$this->set('reasons',$reasons);	
		
		
		//page title and meta
		$this->set('title_for_layout', "Work for Rapid Realty");

	}
	



	
	//Download XML of videos from YouTube and update our cache
	function updateYouTubeCache () {
		//get XML from YouTube via CURL
		$url = 'http://gdata.youtube.com/feeds/api/users/newyorkrealestatejob/uploads';
		$fp = fopen(TMP . 'Careers_Videos.xml', 'w');
        $cp = curl_init($url);
        curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cp, CURLOPT_FILE, $fp);
        $buffer = curl_exec($cp);
        curl_close($cp);
        fclose($fp);
    }
		
	function getYouTubeCache($update=NULL) {
		if ($update) {
			$this->updateYouTubeCache();
		}
		//xml file of videos
		$xml = Xml::build(TMP . 'Careers_Videos.xml');
		//convert to array
		$xml = Set::reverse($xml); 
		$videos = $xml['feed']['entry'];
		return $videos;
	}

}