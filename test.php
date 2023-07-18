<?php

/* This file explains how to use metafields

Once the API is successful you get the metafields at here : https://prnt.sc/uobt3QaZiOsp

In liquid files & app blocks you can retrieve the metafields like this : https://prnt.sc/x-oPUt7qhvzM

This is how output will work in the store : https://prnt.sc/qxDyU7IzNy9u    */

function performShopifyRequest($shop, $token, $resource, $params = array(), $method = 'GET') {
  $url = "https://{$shop}/admin/{$resource}.json";

  $curlOptions = array(
    CURLOPT_RETURNTRANSFER => TRUE
  );

  if ($method == 'GET') {
    if (!is_null($params)) {
      $url = $url . "?" . http_build_query($params);
    }
  } else {
    $curlOptions[CURLOPT_CUSTOMREQUEST] = $method;
  }

  $curlOptions[CURLOPT_URL] = $url;

  $requestHeaders = array(
    "X-Shopify-Access-Token: ${token}",
    "Accept: application/json"
  );

 if ($method == 'POST' || $method == 'PUT' || $method == 'DELETE') {
    $requestHeaders[] = "Content-Type: application/json";

    if (!is_null($params)) {
      $curlOptions[CURLOPT_POSTFIELDS] = json_encode($params);
    }
  }

  $curlOptions[CURLOPT_HTTPHEADER] = $requestHeaders;

  $curl = curl_init();
  curl_setopt_array($curl, $curlOptions);
  $response = curl_exec($curl);
  curl_close($curl);

  return json_decode($response, TRUE);
}


$shop = "ajay-testing-demo.myshopify.com";
$accessToken = "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";



$data = [];
$data['app_enable'] = "1";
$data['msg'] = "abcd";



	$params = array('metafield' => 
        array(
            'key' => 'Settings',
            'value' => json_encode($data),
            'type' => 'json_string',               
            'namespace' => 'demo_app'
        )
   				 ); 
        $addMeta= performShopifyRequest($shop,$accessToken,"api/2023-04/metafields",$params,"POST"); 
        print_r($addMeta);


 /* This file explains how to use metafields

Once the API is successful you get the metafields at here : https://prnt.sc/uobt3QaZiOsp

In liquid files & app blocks you can retrieve the metafields like this : https://prnt.sc/x-oPUt7qhvzM

This is how output will work in the store : https://prnt.sc/qxDyU7IzNy9u    */

	?>