<?php

error_reporting(E_ALL);  
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1'; 
$version = '1.0.0';  
$appid = 'chanduiv-1959-4032-b1f0-133f017b83f9';  
$globalid = 'EBAY-US';  
$query = 'sony mobiles'; 
$safequery = urlencode($query);  
$i = '0';  

$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '25',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => 'FreeShippingOnly',
    'value' => 'true',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice','StoreInventory'),
    'paramName' => '',
    'paramValue' => ''),
  );

function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  foreach($filterarray as $itemfilter) {
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { 
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} 

buildURLArray($filterarray);

$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&sortOrder=PricePlusShippingHighest";

$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=6";
$apicall .= "$urlfilter";
$apicall .= "&itemFilter.name=PaymentMethod";
$apicall .= "&itemFilter.value=PayPal";
$apicall .= "&itemFilter.name=HideDuplicateItems";
$apicall .= "&itemFilter.value=true";
$apicall .= "&itemFilter(0).name=MaxPrice";
$apicall .= "&itemFilter(0).value=75.00";
$apicall .= "&itemFilter(0).paramValue=USD";
$apicall .= "&itemFilter(1).name=MinPrice";
$apicall .= "&itemFilter(1).value=50.00";
$apicall .= "&itemFilter(1).paramName=Currency";
$apicall .= "&itemFilter(1).paramValue=USD";




$resp = simplexml_load_file($apicall);

if ($resp->ack == "Success") {
  $results = '';
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
    $title = $item->price;
  
    $results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
  }
}
else {
  $results  = "<h3>Invalid request";
  $results .= "</h3>";
}
?>

<html>
<head>
<title>eBay Search Results for <?php echo $query; ?></title>
<style type="text/css">body { font-family: arial,sans-serif;} </style>
</head>
<body>

<h1>eBay Search Results for <?php echo $query; ?></h1>

<table>
<tr>
  <td>
    <?php echo $results;?>
  </td>
</tr>
</table>

</body>
</html>