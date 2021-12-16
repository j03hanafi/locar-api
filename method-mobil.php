<?php
require_once "koneksi.php";
class User 
{
 
   public  function get_users()
   {
      global $mysqli;
      $query="SELECT * FROM mobil";
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
      $query="SELECT * FROM mobil";
      if($id != 0)
      {
         $query.=" WHERE id_car=".$id." LIMIT 1";
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
         $arrcheckpost = array('name' => '', 'type' => '', 'color' => '', 'year' => '', 'plat'   => '', 'picture' => '', 'stok' => '', 'trf_12jam' => '', 'trf_24jam' => '', 'trf_harian' => '', 'trf_driver' => '', 'status' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO mobil SET
               `name` = '$_POST[name]',
               `type` = '$_POST[type]',
               `color` = '$_POST[color]',
               `year` = '$_POST[year]',
               `pla` = '$_POST[pla]',
               `picture` = '$_POST[picture]',
               `stok` = '$_POST[stok]',
               `trf_12jam` = '$_POST[trf_12jam]',
               `trf_24jam` = '$_POST[trf_24jam]',
               `trf_harian` = '$_POST[trf_harian]',
               `trf_driver` = '$_POST[trf_driver]',
               `status` = '$_POST[status]'");
                
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
         $arrcheckpost = array('name' => '', 'type' => '', 'color' => '', 'year' => '', 'plat'   => '', 'picture' => '', 'stok' => '', 'trf_12jam' => '', 'trf_24jam' => '', 'trf_harian' => '', 'trf_driver' => '', 'status' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE mobil SET
              `name` = '$_POST[name]',
               `type` = '$_POST[type]',
               `color` = '$_POST[color]',
               `year` = '$_POST[year]',
               `pla` = '$_POST[pla]',
               `picture` = '$_POST[picture]',
               `stok` = '$_POST[stok]',
               `trf_12jam` = '$_POST[trf_12jam]',
               `trf_24jam` = '$_POST[trf_24jam]',
               `trf_harian` = '$_POST[trf_harian]',
               `trf_driver` = '$_POST[trf_driver]',
               `status` = '$_POST[status]'
              WHERE id_car='$id'");
          
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
      $query="DELETE FROM mobil WHERE id_car=".$id;
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