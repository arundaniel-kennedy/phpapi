<?php

$form_data = array(
 'name'    =>  $_POST['name'],
 'year'    =>  $_POST['year'],
 'dept'    =>  $_POST['dept'],
 'mobile'  =>  $_POST['mobile'],
 'email'   =>  $_POST['email'],
 'aoi'     =>  $_POST['aoi']
);

$api_url = "http://localhost:40973/phpapi/api/controller.php?action=insert";
$client = curl_init($api_url);
curl_setopt($client, CURLOPT_POST, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
curl_close($client);
$result = json_decode($response, true);

foreach($result as $keys => $values)
{
 if($result[$keys]['success'] == '1')
 {
  echo 'insert';
 }
 else
 {
  echo 'error';
 }
}
?>
