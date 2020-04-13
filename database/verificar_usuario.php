<?php
   include 'db_connection.php';
   $con=OpenCon();
   if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   if(isset($_POST['username'])){
      $username =  mysqli_real_escape_string($con,$_POST['username']);
      $query = "SELECT COUNT(*) as cntUser from usuario_comum where USUARIO='".$username."'";

      $result = mysqli_query($con,$query);
      $response = "<span style='color: green;'>Disponivel.</span><input type='hidden' name='disponibilidadeUsuario' value='1'>";
      if(mysqli_num_rows($result)){
         $row = mysqli_fetch_array($result);

         $count = $row['cntUser'];
       
         if($count > 0){
             $response = "<span style='color: red;'>Nome de Usuario ja esta em uso.</span><input type='hidden' name='disponibilidadeUsuario' value='0'>";
         }
      
      }

      echo $response;
      die;
   }
?>
