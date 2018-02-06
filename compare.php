
<style>

body{
background-image: url("cmp.jpg");
background-repeat:no-repeat;
background-position:right;
background-attachment:fixed;
background-size:cover;

}

#sai{
text-decoration:none;
color:cyan;
margin-left: 20px;

}
#sai:hover{
color:white;

}

</style>


<h1 style='color:cyan;font-family:cursive;'><a id='sai' href='#'>Buy Me</a></h1><hr>
 
 <link rel="stylesheet" href="bootstrap.css">
<?php
error_reporting(0);
$ch=curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Fk-Affiliate-Id: adithyaad',
    'Fk-Affiliate-Token: 24518b8a0fca445a8825b2ac27051fbd'
    ));
	if(isset($_GET['product_name']))
	{
		echo "<div class='container'>";

echo "<div class='row'>";
?>
<div class="col-md-5" style="border-right:1px solid lightgray;">

  <center><img src="flipkart.jpg" height="100px"></center><br>
  <br><br><br><br><Br><br><h3>No Matching found</h3><br><br><br><br><br><br>
</div>
<?php 
	}
	else if(isset($_GET['id'])){
	$getid=$_GET['id'];
	
	
	$rpid=str_replace(' ', '+', $getid);
curl_setopt($ch, CURLOPT_URL,"https://affiliate-api.flipkart.net/affiliate/product/json?id=$getid");
	
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$myoutput = curl_exec ($ch);

curl_close ($ch);

$hh=json_decode($myoutput);


echo "<div class='container'>";

echo "<div class='row'>";
$pimg=get_object_vars($hh->productBaseInfo->productAttributes->imageUrls);
$kk=get_object_vars($hh->productBaseInfo->productAttributes);
$pri=get_object_vars($hh->productBaseInfo->productAttributes->sellingPrice);

$desc=substr($hh->productBaseInfo->productAttributes->productDescription,0,400);

?>
<div class="col-md-5" style="border-right:1px solid lightgray;background:white;padding-bottom:30px;">

  <center>Flipkart</center><br>
  <hr>
<center><a href="<?php echo $kk['productUrl'];?>" target="_blank"><img src="<?php echo $pimg['200x200'];?>" height="200px"/><br></a><br></center>
<b style="height:100px;">Title </b><?php echo $hh->productBaseInfo->productAttributes->title;?><br><hr>


<b>Description </b><?php echo $desc;?><br><br>
<center><b class="text-success"style="font-size:1.3em;">price :<?php echo $pri['amount'];?>/-</b><br><br></center>
<center><a href="<?php echo $kk['productUrl'];?>" target="_blank"><div class="btn btn-danger">BuyNow</div></a></center>
</div>

<?php 

	}
	else{
		echo "<div class='container'>";

echo "<div class='row'>";
	}

error_reporting(0);  
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1'; 
$version = '1.0.0';  
$appid = 'chanduiv-1959-4032-b1f0-133f017b83f9';  
$globalid = 'EBAY-US'; 
 
$pric=get_object_vars($hh->productBaseInfo->productAttributes->sellingPrice);
$pri=$pric['amount']-113;
$desc=$hh->productBaseInfo->productAttributes->productDescription;
if(isset($_GET['product_name']))
{
$query = $_GET['product_name']; 


hello($query,$endpoint,$version,$appid,$globalid,$pri,$desc);
}
else if(isset($_GET['id'])) 
{
	 $query = $hh->productBaseInfo->productAttributes->title; 
	hello($query,$endpoint,$version,$appid,$globalid,$pri,$desc);
}

else {
	echo "<center><h1 class='text-warning'>No Products found</h1></center>";
}

function hello($query,$endpoint,$version,$appid,$globalid,$pri,$desc){
	
$safequery = urlencode($query);  
$i = '0';  
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";

$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=1";

$resp = simplexml_load_file($apicall);
if ($resp->ack == "Success") {
  $results = '';
 
  echo "<div class='container'>";
  
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
   $price = $item->sellingStatus->currentPrice;
    $rating = $item->sellerInfo->feedbackRatingStar;
   
  $price =round($price*66.89);
  
  ?>
  <div class="col-md-1">
  </div>
  <div class="col-md-5"style="border-left:1px solid lightgray;background:white;padding-bottom:30px;">
  <center><img src="ebay.PNG" height="80px"></center><br>
 <hr>
  
<center><a href="<?php echo $link;?>" target="_blank"><img src="<?php echo $pic;?>"height="180px"/><br></a><br></center>
 <b style="height:100px;">Title </b><?php echo $title;?><br><hr>

<b>Description </b><?php echo substr($desc,30,350);?><br><br>
<center><b class="text-success"style="font-size:1.3em;">price :<?php echo $price;?>/-</b><br><br></center>
<center><a href="<?php echo $link;?>" target="_blank"><div class="btn btn-danger">BuyNow</div></a></center>
  </div>
  <?php 

  }
  echo "</tr></table>";
}
else {
  $results  = "<h3>Invalid request";
  $results .= "</h3>";
}
	
}
?>
</div>
</div>