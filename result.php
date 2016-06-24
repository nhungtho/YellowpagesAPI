<?php
require_once("functions.php");
 ini_set('display_errors', 1);
 error_reporting(E_ALL ^ E_NOTICE);
 
$drop_1 = $_POST['drop_1'];
	 $r = $_POST['radius'];
	 $t = $_POST['terms'];
	
	$result = mysql_query("SELECT * FROM dealer WHERE dealernumber = '$drop_1' ") 
	or die(mysql_error());

	 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
  
		{
			$dealername=$row["dealername"];
			$address=$row["address"];	
			$city=$row["city"];	
			$zip=$row["zip"];	
		}
		
		
$l = $zip;

$k = "br84n9pnw7";

    $apiURL="http://api2.yp.com/listings/v1/search?searchloc=$l&radius=$r&term=$t&format=json&key=$k&sort=name&pagenum=1&listingCount=50";
	
	//$url = preg_replace('&amp;','&','http://pubapi.atti.com/search-api/search/devapi/search?searchloc=77054&radius=7&term=car+repair&format=json&key=br84n9pnw7&sort=name&pagenum=17&listingCount=50');


$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$apiURL);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data, true);
  
 print "<pre>";
// print_r($json);
//print_r($json['searchResult']['searchListings']);
print "</pre>";
//var_dump($data);  

/*foreach($json['searchResult']['searchListings']['searchListing'] as $Listing)
{
	echo $Listing['businessName']."<br>Lat:".$Listing['latitude']."<br>Long:".$Listing['longitude']."<br/><br/>";
}*/

	$count =  $json['searchResult']['metaProperties']['totalAvailable'];
	echo "Total:".$count."<br>";
	if($count >50)
		{
			$pagenumber = $count/50;
			echo "number of pages:".$pagenumber."<br>";
			$roundpnumber = ceil($pagenumber);
			echo $roundpnumber."<br>";
				for ($x=1; $x<=$roundpnumber; $x++) {
					echo "Page:".$x."<br>";


$p = $x;
    $apiURL="http://api2.yp.com/listings/v1/search?searchloc=$l&radius=$r&term=$t&format=json&key=$k&sort=name&pagenum=$p&listingCount=50";
	$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$apiURL);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data, true);

foreach($json['searchResult']['searchListings']['searchListing'] as $Listing)
{
	echo "Name;".$Listing['businessName']."<br>Lat:".$Listing['latitude']."<br>Long:".$Listing['longitude']."<br>Cat:".$Listing['categories']."<br>street:".$Listing['street']."<br>City:".$Listing['city']."<br>state:".$Listing['state']."<br>zip:".$Listing['zip']."<br>distance:".$Listing['distance']."<br>listingId:".$Listing['listingId']."<br>phone:".$Listing['phone']."<br>Primarycat:".$Listing['primaryCategory']."<br/><br/>";
	
	$name = $Listing['businessName'];
	$lat = $Listing['latitude'];
	$long = $Listing['longitude'];
	$categories = $Listing['categories'];
	$street = $Listing['street'];
	$city = $Listing['city'];
	$state = $Listing['state'];
	$zip = $Listing['zip'];
	$distance = $Listing['distance'];
	$listingId = $Listing['listingId'];
	$phone = $Listing['phone'];
	$primaryCategory = $Listing['primaryCategory'];
	
	
	
	///insert into database
	
	$SQL = "INSERT INTO `lists` (`dealernumber`, `name`, `category`, `address`, `city`, `state`, `zip`, `distance`, `lat`, `long`, `listingid`, `phone`, `primarycategory`)";
		$SQL .= " VALUES ";
		$SQL .= "('$drop_1','".mysql_real_escape_string($name)."', '".mysql_real_escape_string($categories)."', '".mysql_real_escape_string($street)."', '".mysql_real_escape_string($city)."', '$state', '$zip', '$distance', '$lat', '$long', '$listingId', '$phone', '".mysql_real_escape_string($primaryCategory)."')";
			// Insert the values
		if (mysql_query($SQL)) {
			
		} else {
			echo "something went wrong";
			exit;
		}
	
}

				}
		}
	else
		{
			$p = 1;
			echo $p."<br>";
			
			$apiURL="http://api2.yp.com/listings/v1/search?searchloc=$l&radius=$r&term=$t&format=json&key=$k&sort=name&pagenum=$p&listingCount=50";
	$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$apiURL);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data, true);

foreach($json['searchResult']['searchListings']['searchListing'] as $Listing)
{
	echo "Name;".$Listing['businessName']."<br>Lat:".$Listing['latitude']."<br>Long:".$Listing['longitude']."<br>Cat:".$Listing['categories']."<br>street:".$Listing['street']."<br>City:".$Listing['city']."<br>state:".$Listing['state']."<br>zip:".$Listing['zip']."<br>distance:".$Listing['distance']."<br>listingId:".$Listing['listingId']."<br>phone:".$Listing['phone']."<br>Primarycat:".$Listing['primaryCategory']."<br/><br/>";
	
	$name = $Listing['businessName'];
	$lat = $Listing['latitude'];
	$long = $Listing['longitude'];
	$categories = $Listing['categories'];
	$street = $Listing['street'];
	$city = $Listing['city'];
	$state = $Listing['state'];
	$zip = $Listing['zip'];
	$distance = $Listing['distance'];
	$listingId = $Listing['listingId'];
	$phone = $Listing['phone'];
	$primaryCategory = $Listing['primaryCategory'];
		
	
	///insert into database
	
	$SQL = "INSERT INTO `lists` (`dealernumber`, `name`, `category`, `address`, `city`, `state`, `zip`, `distance`, `lat`, `long`, `listingid`, `phone`, `primarycategory`)";
		$SQL .= " VALUES ";
		$SQL .= "('$drop_1','".mysql_real_escape_string($name)."', '".mysql_real_escape_string($categories)."', '".mysql_real_escape_string($street)."', '".mysql_real_escape_string($city)."', '$state', '$zip', '$distance', '$lat', '$long', '$listingId', '$phone', '".mysql_real_escape_string($primaryCategory)."')";
			// Insert the values
		if (mysql_query($SQL)) {
			
		} else {
			echo "something went wrong";
			exit;
		}
	
}
		
		}
	
?>