<?php 
namespace SDFramework\Controllers;
use SDFramework\Controller;
use \SDFramework\Database;
use SDFramework\Environment;
use SDFramework\ExceptionHandler;
class DefaultController
{
   /**
    * welcome
    * Главная страница
    * @return void
    */
   public static function welcome()
   {
    return '
    <head>
    <link type="text/css" rel="stylesheet" href="/style.css">
    <div class="wrapper">
       <span>NEWS API WORKED</span>
    </div>';
   }

   /**
    * col_get_between
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
 

   /**
    * col_get_by
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
   public static function rq($table)
   {
      $db = (new Database())->ORM;
    
      $data = $db->getAll('SELECT * FROM '.$table.'');
    
   
      
      return json_encode($data);
   }

   public static function rqusers()
   {
      $db = (new Database())->ORM;
    
      $data = $db->getAll('SELECT * FROM users');
    
   
      
      return json_encode($data);
   }

   public static function registration()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      $users = $db->dispense('users');
      $users->login = $data['login'];
      $users->password = $data['password'];
      $users->users_name = $data['users_name'];
      $users->users_sname = $data['users_sname'];
      $users->root = $data['root'];
      $db->store($users);
      return json_encode($data);
   }

   public static function service()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      $service = $db->dispense('service');
      $service->service_id = $data['service_id'];
      $service->master = $data['master'];
      $service->service_date = $data['service_date'];
      $service->service_time = $data['service_time'];
      $service->tel_num = $data['tel_num'];
      $service->user_id = $data['user_id'];
   
      $db->store($service);
      return json_encode($data);
   }

   public static function update()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      $id = $data['id'];
      $service = $db->load('service', $id);

      $service->service_id = $data['service_id'];
      $service->master = $data['master'];
      $service->service_date = $data['service_date'];
      $service->service_time = $data['service_time'];
      $service->tel_num = $data['tel_num'];
   

      $db->store($service);
      return json_encode($data);
   }

   public static function delete()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      $id = $data['id'];
      $service = $db->load('service', $id);
   
      $db->trash($service);
      return json_encode($data);
   }

   public static function getUserByRoot($root)
   {
      $db = (new Database())->ORM;
    
      $data = $db->getAll('SELECT * FROM users where root='.$root.'');
    
      return json_encode($data);
   }



}
?>