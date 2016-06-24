<?php
$l = "77054";
$r = "7";
$k = "br84n9pnw7";
$t = "car repair";
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
	echo $count."<br>";
	if($count >50)
		{
			$pagenumber = $count/50;
			echo $pagenumber;
			$roundpnumber = ceil($pagenumber);
			echo $roundpnumber;
				for ($x=1; $x<=$roundpnumber; $x++) {
					echo $x."<br>";


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
	echo "Name;".$Listing['businessName']."<br>Lat:".$Listing['latitude']."<br>Long:".$Listing['longitude']."<br/><br/>";
}

				}
		}
	else
		{
			$pagenumber = 1;
			echo $pagenumber."<br>";
		}
	
?>