
<center><h1>Products - Comparision</h1><br><br></center>

 <link rel="stylesheet" href="bootstrap.css">
<?php
error_reporting(E_ALL);
$ch=curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Fk-Affiliate-Id: adithyaad',
    'Fk-Affiliate-Token: 24518b8a0fca445a8825b2ac27051fbd'
    ));
	
	$se="ACCEA5E3GPBQJ9P9";
	
	
	$see=str_replace(' ', '+', $se);
curl_setopt($ch, CURLOPT_URL,"https://affiliate-api.flipkart.net/affiliate/product/json?id=$se");
	
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$server_output = curl_exec ($ch);
//echo curl_error();
curl_close ($ch);

ECHO $server_output;
$hh=json_decode($server_output);


	

?>
</div>
</div>