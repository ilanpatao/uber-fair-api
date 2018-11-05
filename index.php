<?php

#/////////////////////////////
// Written by: Ilan Patao //
// ilan@dangerstudio.com //
//////////////////////////#

/////// Note that Place ID's can be obtained either at:
/////// http://gmb.reviewsmaker.com
/////// https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder
/////// You'll want to use the Google Places / Maps APIs to integrate a map and/or locator in conjunction with this code


// Set the destinations with the Google Places Place ID's
$pickup_placeid = "ChIJtcaxrqlZwokRfwmmibzPsTU"; // Here's I'm passing the Place ID for the Empire State Building in NYC

$dropoff_placeid="ChIJmQJIxlVYwokRLgeuocVOGVU"; // Here's I'm passing the Place ID for the Times Square Center in NYC

// Construct the URL for the request
$url = "https://www.uber.com/api/fare-estimate-beta?pickupRef=".$pickup_placeid."&pickupRefType=google_places&destinationRef=".$dropoff_placeid."&destinationRefType=google_places";

// Init and call the Uber API service
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
curl_close($curl);

// Decode our response to some raw json
$json = json_decode($response, true);


// Display the content of the variables
echo "<pre>";
echo "<h1>Uber Estimate API Pull Sample</h1>";
echo "<p>Written by <a href='mailto:ilan@dangerstudio.com'>Ilan Patao</a> on 11/05/2018</p>";

echo "<p>This sample uses the Uber fare estimator API in conjunction with Place ID's from Google;<br>
The sample here uses the Place ID of the pick up and drop-off destinations obtained from the Google Place ID finder (or one of my tools <a href='https://gmb.reviewsmaker.com'>Reviewsmaker</a><br>
to decode real-time fare estimates for all Uber units available.<br>
This sample uses the Place ID's of The Empire State Building as a pick-up location and Times Square Center in NYC.</p>";

echo "<h1>Raw JSON Feed</h1>";
echo "<textarea>".$response."</textarea>";

echo "<h1>Parsed Results</h1>";
echo "<b>For Uber Pool</b>:<br>";
echo "Vehicle Type: " . $json["prices"][0]["vehicleViewDisplayName"] . "<br>";
echo "Tolls Apply: " . $json["prices"][0]["fare"]["tollsApply"] . "<br>";
echo "Minmum: " . $json["prices"][0]["fare"]["minimum"] . "<br>";
echo "Base: " . $json["prices"][0]["fare"]["base"] . "<br>";
echo "Per Minute: " . $json["prices"][0]["fare"]["perMinute"] . "<br>";
echo "Uber's Percentage: " . $json["prices"][0]["fare"]["uberServicePercent"] . "<br>";
echo "Cancellation: " . $json["prices"][0]["fare"]["cancellation"] . "<br>";
echo "Per Distance Unit: " . $json["prices"][0]["fare"]["perDistanceUnit"] . "<br>";
echo "<b>Total Fare: </b>" . $json["prices"][0]["fareString"] . "<hr>";

echo "<b>For Uber UberX</b>:<br>";
echo "Vehicle Type: " . $json["prices"][1]["vehicleViewDisplayName"] . "<br>";
echo "Tolls Apply: " . $json["prices"][1]["fare"]["tollsApply"] . "<br>";
echo "Minmum: " . $json["prices"][1]["fare"]["minimum"] . "<br>";
echo "Base: " . $json["prices"][1]["fare"]["base"] . "<br>";
echo "Per Minute: " . $json["prices"][1]["fare"]["perMinute"] . "<br>";
echo "Uber's Percentage: " . $json["prices"][1]["fare"]["uberServicePercent"] . "<br>";
echo "Cancellation: " . $json["prices"][1]["fare"]["cancellation"] . "<br>";
echo "Per Distance Unit: " . $json["prices"][1]["fare"]["perDistanceUnit"] . "<br>";
echo "<b>Total Fare: </b>" . $json["prices"][1]["fareString"] . "<hr>";

echo "<b>For Uber UberXL</b>:<br>";
echo "Vehicle Type: " . $json["prices"][2]["vehicleViewDisplayName"] . "<br>";
echo "Tolls Apply: " . $json["prices"][2]["fare"]["tollsApply"] . "<br>";
echo "Minmum: " . $json["prices"][2]["fare"]["minimum"] . "<br>";
echo "Base: " . $json["prices"][2]["fare"]["base"] . "<br>";
echo "Per Minute: " . $json["prices"][2]["fare"]["perMinute"] . "<br>";
echo "Uber's Percentage: " . $json["prices"][2]["fare"]["uberServicePercent"] . "<br>";
echo "Cancellation: " . $json["prices"][2]["fare"]["cancellation"] . "<br>";
echo "Per Distance Unit: " . $json["prices"][2]["fare"]["perDistanceUnit"] . "<br>";
echo "<b>Total Fare: </b>" . $json["prices"][2]["fareString"] . "<hr>";

echo "<b>For Uber Car Seat</b>:<br>";
echo "Vehicle Type: " . $json["prices"][3]["vehicleViewDisplayName"] . "<br>";
echo "Tolls Apply: " . $json["prices"][3]["fare"]["tollsApply"] . "<br>";
echo "Minmum: " . $json["prices"][3]["fare"]["minimum"] . "<br>";
echo "Base: " . $json["prices"][3]["fare"]["base"] . "<br>";
echo "Per Minute: " . $json["prices"][3]["fare"]["perMinute"] . "<br>";
echo "Uber's Percentage: " . $json["prices"][3]["fare"]["uberServicePercent"] . "<br>";
echo "Cancellation: " . $json["prices"][3]["fare"]["cancellation"] . "<br>";
echo "Per Distance Unit: " . $json["prices"][3]["fare"]["perDistanceUnit"] . "<br>";
echo "<b>Total Fare: </b>" . $json["prices"][3]["fareString"] . "<hr>";

echo "<b>For Uber Black</b>:<br>";
echo "Vehicle Type: " . $json["prices"][4]["vehicleViewDisplayName"] . "<br>";
echo "Tolls Apply: " . $json["prices"][4]["fare"]["tollsApply"] . "<br>";
echo "Minmum: " . $json["prices"][4]["fare"]["minimum"] . "<br>";
echo "Base: " . $json["prices"][4]["fare"]["base"] . "<br>";
echo "Per Minute: " . $json["prices"][4]["fare"]["perMinute"] . "<br>";
echo "Uber's Percentage: " . $json["prices"][4]["fare"]["uberServicePercent"] . "<br>";
echo "Cancellation: " . $json["prices"][4]["fare"]["cancellation"] . "<br>";
echo "Per Distance Unit: " . $json["prices"][4]["fare"]["perDistanceUnit"] . "<br>";
echo "<b>Total Fare: </b>" . $json["prices"][4]["fareString"] . "<hr>";

echo "<b>For Uber Black SUV</b>:<br>";
echo "Vehicle Type: " . $json["prices"][5]["vehicleViewDisplayName"] . "<br>";
echo "Tolls Apply: " . $json["prices"][5]["fare"]["tollsApply"] . "<br>";
echo "Minmum: " . $json["prices"][5]["fare"]["minimum"] . "<br>";
echo "Base: " . $json["prices"][5]["fare"]["base"] . "<br>";
echo "Per Minute: " . $json["prices"][5]["fare"]["perMinute"] . "<br>";
echo "Uber's Percentage: " . $json["prices"][5]["fare"]["uberServicePercent"] . "<br>";
echo "Cancellation: " . $json["prices"][5]["fare"]["cancellation"] . "<br>";
echo "Per Distance Unit: " . $json["prices"][5]["fare"]["perDistanceUnit"] . "<br>";
echo "<b>Total Fare: </b>" . $json["prices"][5]["fareString"] . "<hr>";

echo "</pre>";
