<?php
$username = "Mister_Fix";
$data = json_encode(array("name"=>$username, "agent"=>"minecraft"));
$ch = curl_init();
$options = array(CURLOPT_URL => 'https://api.mojang.com/profiles/page/1', //API URL
                       CURLOPT_POST => true, //request must be made through POST
                       CURLOPT_RETURNTRANSFER => 1, //return transfer
                       CURLOPT_POSTFIELDS => $data, //POST the data declered earlier
                       CURLOPT_HTTPHEADER => array('Content-type: application/json'), //Header must look like JSON content type or else request fails
                       CURLOPT_SSL_VERIFYPEER => false
                      );
curl_setopt_array($ch, $options);
$res = curl_exec($ch);

if(curl_getinfo($ch, CURLINFO_HTTP_CODE) != '200'){
echo "Failed to connect to mojang!";
}
curl_close($ch);
$dec = json_decode($res, true);
?>
