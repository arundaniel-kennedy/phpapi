<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'database.php';

class API {
  public function select(){
    $database = new Database();
    $db = $database->getConnection();
    $users = array();
    $query = $db->prepare("select * from users");
    $query->execute();
    while ($out = $query->fetch(PDO::FETCH_ASSOC)) {
      $users[$out['id']] = array(
        'id'      =>  $out['id'],
        'name'    =>  $out['name'],
        'year'    =>  $out['year'],
        'dept'    =>  $out['dept'],
        'mobile'  =>  $out['mobile'],
        'email'   =>  $out['email'],
        'aoi'    =>  $out['aoi']
      );
    }
    return json_encode($users);
  }

  function insert()
 {
   $database = new Database();
   $db = $database->getConnection();
   $form_data = array(
    ':name'    =>  $_POST['name'],
    ':year'    =>  $_POST['year'],
    ':dept'    =>  $_POST['dept'],
    ':mobile'  =>  $_POST['mobile'],
    ':email'   =>  $_POST['email'],
    ':aoi'     =>  $_POST['aoi']
   );
   $query = "INSERT INTO `users` (`id`, `name`, `year`, `dept`, `mobile`, `email`, `aoi`) VALUES (NULL, :name, :year, :dept, :mobile, :email, :aoi)";
   $statement = $db->prepare($query);
   if($statement->execute($form_data))
   {
    $data[] = array(
     'success' => '1'
    );
   }
   else
   {
    $data[] = array(
     'success' => '0'
    );
   }
  }

}

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
 echo $api_object->select();
}else{
  echo $api_object->insert();
}

?>
