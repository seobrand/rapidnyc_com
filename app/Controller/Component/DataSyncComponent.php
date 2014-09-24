<?php 

//include rackspace cloud files api
App::import("Vendor", "Cloudfiles/cloudfiles");



class DataSyncComponent extends Component {

	function initialize($controller) {
		//load necessary models
		$this->Agent = ClassRegistry::init('Agent');
		$this->Listing = ClassRegistry::init('Listing');
		$this->ListingPhoto = ClassRegistry::init('ListingPhoto');
		$this->ListingVideo = ClassRegistry::init('ListingVideo');
		$this->Neighborhood = ClassRegistry::init('Neighborhood');
		$this->Region = ClassRegistry::init('Region');
		$this->Office = ClassRegistry::init('Office');
	}
	
	
	
	
	
	//import data from rapid database feed
	function importDatabase($category) {
		
		//which file are we looking for?
		$files_by_category = array(
			'agents'=>'rapidnyc_agents.json',
			'listings'=>'rapidnyc_listings.json',
			'photos'=>'rapidnyc_photos.json'			
		);
		$useFile = $files_by_category[$category];
		if (!$useFile) { exit; }
		
		//expand our time limit
		//ini_set('memory_limit', '150M');
		set_time_limit(300);
				
		//download the latest feed from cloud sites
		//Now lets create a new instance of the authentication Class.
		$auth = new CF_Authentication('alolli','ad44fbd40fe0a0d2e9cdf95ee2249d97');
		//Calling the Authenticate method returns a valid storage token and allows you to connect to the CloudFiles Platform.
		$auth->authenticate();
		//The Connection Class Allows us to connect to CloudFiles and make changes to containers; Create, Delete, Return existing containers. 
		$conn = new CF_Connection($auth);
		//Get our container and object
		//$cont = $conn->get_container('Rapid_DatabaseSync');
		$cont = $conn->get_container('Rapid_ListingsPhotos_Deleted');
		$obj  = $cont->get_object($useFile);
		//now stream into a local file
		$path = TMP . $useFile;
		header("Content-Type: " . $obj->content_type);
		$output = fopen($path, 'w');
		$obj->stream($output); # stream object content to PHP's output buffer
		fclose($output);
		
		//open and decode our local file
		$data = file_get_contents($path);
		$data = json_decode($data, true);
		//echo '<pre>'; print_r($data); die;
		//delete our feed file
		unlink($path);
				
		//get import counts
		$agents_count = count($data['Agents']);
		$listings_count = count($data['Listings']);
		$listingPhotos_count = count($data['ListingPhotos']);
		$listingVideos_count = count($data['ListingVideos']);
		$neighborhoods_count = count($data['Neighborhoods']);
		$regions_count = count($data['Regions']);
		$offices_count = count($data['Offices']);
		
		if($data['Agents']){
			//AGENTS
			if ($agents_count>10) {
				$this->Agent->query("TRUNCATE TABLE agents");
			}
			//break up into chunks and save
			$chunks = array_chunk($data['Agents'],100);
			unset($data['Agents']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->Agent->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}			
				
		if($data['Listings']){
			//LISTINGS
			if ($listings_count>30) { 
				$this->Listing->query("TRUNCATE TABLE listings"); 
			}
			//break up into chunks and save
			$chunks = array_chunk($data['Listings'],100);
			unset($data['Listings']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->Listing->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}
		
		if($data['ListingPhotos']){
			//LISTING PHOTOS
			if ($listingPhotos_count>20) {
				$this->ListingPhoto->query("TRUNCATE TABLE listing_photos");
			}
			//break up into chunks and save
			$chunks = array_chunk($data['ListingPhotos'],200);
			unset($data['ListingPhotos']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->ListingPhoto->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}
		
		
		if($data['ListingVideos']){
			//LISTING VIDEOS
			if ($listingVideos_count) {
				$this->Listing->query("TRUNCATE TABLE listing_videos");
			}
			//break up into chunks and save
			$chunks = array_chunk($data['ListingVideos'],200);
			unset($data['ListingVideos']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->ListingVideo->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}
		
		if($data['Neighborhoods']){
			//NEIGHBORHOODS
			if ($neighborhoods_count>10) {
				$this->Neighborhood->query("TRUNCATE TABLE neighborhoods");
			}
			//break up into chunks and save
			$chunks = array_chunk($data['Neighborhoods'],100);
			unset($data['Neighborhoods']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->Neighborhood->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}	
				
		
		if($data['Regions']){
			//REGIONS
			if ($regions_count>2) {
				$this->Region->query("TRUNCATE TABLE regions");
			}
			//break up into chunks and save
			$chunks = array_chunk($data['Regions'],100);
			unset($data['Regions']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->Region->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}
			
		
		if($data['Offices']){
			//OFFICES
			if ($offices_count>5) {
				$this->Office->query("TRUNCATE TABLE offices");
			}
			//break up into chunks and save
			$chunks = array_chunk($data['Offices'],100);
			unset($data['Offices']);
			foreach ($chunks as $chunk_k=>$chunk) {
				//save
				$this->Office->saveMany($chunk);
				unset($chunks[$chunk_k]);
			}
		}	
			
		
		
		//setup results array
		$results = array(
			'Agents' => $agents_count,
			'Listings' => $listings_count,
			'Listing Photos' => $listingPhotos_count,
			'Listing Videos' => $listingVideos_count,
			'Neighborhoods' => $neighborhoods_count,
			'Regions' => $regions_count,
			'Offices' => $offices_count
		);
		return $results;
		
	}


	
	
	
	
	public function checkCloudPhotos() {
		/*
		//connect to remote database
		//sync database photos with cloud (maybe faster, becauwe we're on rackspace server) 
		$_mysql['db'] = "rapidnyc_db";
		$_mysql['user'] = "rapidnyc_rapid";
		$_mysql['pass'] = "kc6yrguL3Kuv7L";
		$_mysql['host'] = "216.157.34.118";
		$link = mysql_connect($_mysql['host'], $_mysql['user'], $_mysql['pass']);
		mysql_select_db($_mysql['db'],$link);
		
		//update our rackspace photo and container names
		mysql_query("UPDATE listings_photos SET rackspace_container=CONCAT('Rapid_listingsPhotos_',LEFT(photo_directory,4)), rackspace_name=CONCAT(listing_id,'_',photo_filename) WHERE rackspace_name=''");
		
		//get container names
		$container_names = array(
			'Rapid_ListingsPhotos_2007',
			'Rapid_ListingsPhotos_2008',
			'Rapid_ListingsPhotos_2009',
			'Rapid_ListingsPhotos_2010',
			'Rapid_ListingsPhotos_2011',
			'Rapid_ListingsPhotos_2012'
		);
		
		//connect to cloud
		$auth = new CF_Authentication('alolli','ad44fbd40fe0a0d2e9cdf95ee2249d97');
		$auth->authenticate();
		$conn = new CF_Connection($auth);
		
		//get our containers
		$results = array();
		foreach ($container_names as $container_name) { 
			//get a starting point -- we're likely to time out, so get the name of one of the last objects that we reviewed
			$starting_point = mysql_fetch_array(mysql_query("SELECT rackspace_name FROM listings_photos WHERE rackspace_container='$container_name' AND rackspace_name>'' ORDER BY rackspace_verified DESC LIMIT 1"));
			$starting_point = $starting_point['rackspace_name'];
			
			//get container info
			$cont = $conn->get_container($container_name);
			$object_count = $cont->object_count;
			//loop through objects in container, and retrieve an array of all file names and an array of files that seem to be empty (run in batches)
			$batch_size = 1000;
			while ($i<$object_count) {			
				$now = time();
				$i = $i+$batch_size;
				$objects = $cont->get_objects($batch_size, $starting_point);
				$starting_point = $objects[count($objects)-1]->name; //set the next starting point as the last item from this batch
				//store object name and flag if it's empty
				$names = array();
				$empty = array();
				foreach ($objects as $object) {
					$names[] = $object->name;
					if ($object->content_length<1) {
						$empty[] = $object->name;
					}
				}
				//take this batch, and update our database to show verified and empty
				//sub-batch this, so our queries don't get too long
				if ($names) { 
					$chunks = array_chunk($names,200);
					foreach ($chunks as $names) {
						$q = "";
						foreach ($names as $name) {
							$q .= "rackspace_name='$name' OR ";
						}
						$q = substr($q,0,-3);
						mysql_query("UPDATE listings_photos SET rackspace_verified='$now' WHERE ($q)");
					}
				}
				if ($empty) {
					$chunks = array_chunk($empty,200);
					foreach ($chunks as $empty) {
						$q = "";
						foreach ($names as $name) {
							$q .= "rackspace_name='$name' OR ";
						}
						$q = substr($q,0,-3);
						mysql_query("UPDATE listings_photos SET rackspace_empty='$now' WHERE ($q)");
					}
				}
			}
		}
		
		return $results;		
		*/
	}
	
	
	
	
	public function syncCloudPhotos() {
		/*
		function mysqlQueryString ($ids, $field, $and_or) {
			$q = "";
			if (strtoupper($and_or)!=="AND") { $and_or="OR"; }
			if ($ids) {
				foreach ($ids as $id) {
					$q .= $field . "='".$id."' " . $and_or . " ";
				} 
				$q = substr($q, 0, 0-strlen($and_or . " "));
			}
			return $q;
		}
	
		//sync database photos with cloud (maybe faster, becauwe we're on rackspace server) 
		$_mysql['db'] = "rapidnyc_db";
		$_mysql['user'] = "rapidnyc_rapid";
		$_mysql['pass'] = "kc6yrguL3Kuv7L";
		$_mysql['host'] = "216.157.34.118";
		$link = mysql_connect($_mysql['host'], $_mysql['user'], $_mysql['pass']);
		mysql_select_db($_mysql['db'],$link);
				
		
		$auth = new CF_Authentication('alolli','ad44fbd40fe0a0d2e9cdf95ee2249d97');
		$auth->authenticate();
		$conn = new CF_Connection($auth);
		
		$rand = time() . "_" . rand(0, 9999);
		mysql_query("UPDATE listings_photos SET batched='$rand' WHERE transferred='' AND missing1='' AND missing2='' AND batched='' LIMIT 60");
		
		
		$round_i = 0; 
		$missing1 = array();
		$missing2 = array();
		$uploaded = array();

		$photos_q = mysql_query("SELECT * FROM listings_photos WHERE transferred='' AND batched='$rand'");
		while ($photo = mysql_fetch_array($photos_q)) {
				
			//if we've done 10 then batch our progress
			if ($round_i==10) {
				echo "<Br><br>Batched 10 of " . count($photos) . "<Br>" . count($missing1) . " Missing (pass 1)<br>" . count($missing2) . " Missing (pass 2)<br>" . count($uploaded) . " Uploaded<br>";
				if ($missing1) { 
					$query = "UPDATE listings_photos SET missing1='1' WHERE (" . mysqlQueryString($missing1,'photo_id','OR') . ")";
					mysql_query($query);
				} 
				if ($missing2) { 
					$query = "UPDATE listings_photos SET missing2='1' WHERE (" . mysqlQueryString($missing2,'photo_id','OR') . ")";
					mysql_query($query);
				} 
				if ($uploaded) { 
					$query = "UPDATE listings_photos SET transferred='1' WHERE (" . mysqlQueryString($uploaded,'photo_id','OR') . ")";
					mysql_query($query);
				} 
				//reset
				$round_i = 0; 
				$missing1 = array();
				$missing2 = array();
				$uploaded = array();
			}
			$round_i++; //increment
			
			$filename = "http://www.rapidnyc.net/listings_photos/" . $photo['photo_directory'] . $photo['listing_id'] . "/" . $photo['photo_filename'];
			
			//get file to temorary file
			$temp = tempnam(TMP, 'cloud');
			$fp = fopen($temp, "w");
			$ch = curl_init($filename);			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FILE, $fp);
//			curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
//			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 500);
			$test = curl_exec($ch);
	        $curl_errno = curl_errno($ch);
    	    $curl_error = curl_error($ch);
			curl_close($ch);
			fclose($fp);

    	    if ($curl_errno > 0) {
        		echo "cURL Error ($curl_errno): $curl_error\n";
        		
        		if (!$photo['missing1']) {
					$missing1[] = $photo['photo_id'];
				} else {
					$missing2[] = $photo['photo_id'];
				}
				
	        } else {
    							
				$container_name = 'Rapid_ListingsPhotos_' . substr($photo['photo_directory'],0,4);
				if (!$last_container || ($last_container && $last_container!==$container_name)) {
					$last_container = $container_name;
					$cont = $conn->create_container($container_name);
				} elseif ($last_container==$container_name) {
					$cont = $conn->get_container($container_name);
				}
		
				//Now lets make a new Object
				$obj = $cont->create_object($photo['listing_id'] . "_" . $photo['photo_filename']);
				//now upload our feed temp file
				$obj->load_from_filename($temp);
				
				$uploaded[] = $photo['photo_id'];
				
			}
			
			unlink($temp); 
		}
			
			
		//any leftovers?
		if ($missing1) {
			$q = substr($q, 0, -3);
			$query = "UPDATE listings_photos SET missing1='1' WHERE (" . mysqlQueryString($missing1,'photo_id','OR') . ")";
			mysql_query($query);
		} 
		if ($missing2) { 
			$query = "UPDATE listings_photos SET missing2='1' WHERE (" . mysqlQueryString($missing2,'photo_id','OR') . ")";
			mysql_query($query);
		} 
		if ($uploaded) { 
			$query = "UPDATE listings_photos SET transferred='1' WHERE (" . mysqlQueryString($uploaded,'photo_id','OR') . ")";
			mysql_query($query);
		} 
		
		return true;
		*/
	}

}
