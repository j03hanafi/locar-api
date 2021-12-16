<?php
require_once "koneksi.php";
class User 
{
 
   public  function get_users()
   {
      global $mysqli;
      $query="SELECT * FROM pelanggan";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Users Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function get_user($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM pelanggan";
      if($id != 0)
      {
         $query.=" WHERE id_user=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get User Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   public function insert_user()
      {
         global $mysqli;
         $arrcheckpost = array('first_name' => '', 'last_name' => '', 'phone' => '', 'email' => '', 'password'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO pelanggan SET
               `first_name` = '$_POST[first_name]',
               `last_name` = '$_POST[last_name]',
               `phone` = '$_POST[phone]',
               `email` = '$_POST[email]',
               `password` = '$_POST[password]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'User Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'User Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_user($id)
      {
         global $mysqli;
         $arrcheckpost = array('first_name' => '', 'last_name' => '', 'phone' => '', 'email' => '', 'password'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE pelanggan SET
              `first_name` = '$_POST[first_name]',
               `last_name` = '$_POST[last_name]',
               `phone` = '$_POST[phone]',
               `email` = '$_POST[email]',
               `password` = '$_POST[password]'
              WHERE id_user='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'User Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'User Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_user($id)
   {
      global $mysqli;
      $query="DELETE FROM pelanggan WHERE id_user=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'User Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'User Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
 
 ?>