<?php
$api_url = "http://localhost:40973/phpapi/api/controller.php?action=fetch_all";

$client = curl_init($api_url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);

$output = '';

if($result)
{
 foreach($result as $row)
 {
  $output .= '
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card mb-5">
        <div class="card-body">
          Name   : '.$row->name.'<br />
          Year   : '.$row->year.'<br />
          Dept   : '.$row->dept.'<br />
          Mobile : '.$row->mobile.'<br />
          Email  : '.$row->email.'<br />
          Aoi    : '.$row->aoi.'<br />
        </div>
      </div>
    </div>
  ';
 }
}
else
{
 $output .= 'No records';
}

echo $output;

?>
