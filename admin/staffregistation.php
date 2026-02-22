<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
//    header('location:admin_login.php');
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_staff = $conn->prepare("SELECT * FROM staff WHERE name = ?");
   $select_staff->execute([$name]);
   
   if($select_staff->rowCount() > 0){
      $message[] = 'username already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm passowrd not matched!';
      }else{
         $insert_admin = $conn->prepare("INSERT INTO staff(name, password) VALUES(?,?)");
         $insert_admin->execute([$name, $cpass]);
         $message[] = 'new admin registered!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <style>
   /* body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         /* background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%); */
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
         background-color: beige; 
        
      } */
      .form-container {
         background: white;
         padding: 30px;
         border-radius: 15px;
         box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
         max-width: 400px;
         width: 100%;
         text-align: center;
      }
      .form-container h3 {
         color: #333;
         margin-bottom: 20px;
         font-size: 24px;
      }
      .form-container p {
         color: #555;
         margin-bottom: 30px;
         font-size: 14px;
      }
      .form-container p span {
         color: #e67e22;
         font-weight: bold;
      }
      .form-container .box {
         width: 100%;
         padding: 15px;
         margin: 10px 0;
         border: 2px solid #ddd;
         border-radius: 10px;
         box-sizing: border-box;
         font-size: 16px;
         transition: border-color 0.3s ease, background-color 0.3s ease;
      }
      .form-container .box:focus {
         border-color: #e67e22;
         background-color: #fff5e6;
         outline: none;
      }
      .form-container .btn {
         width: 100%;
         padding: 15px;
         background: linear-gradient(135deg, #55efc4, #00b894);
         border: none;
         border-radius: 10px;
         color: white;
         font-size: 18px;
         cursor: pointer;
         transition: background 0.3s ease;
         margin-top: 10px;
      }
      .form-container .btn:hover {
         background: linear-gradient(135deg, #00b894, #55efc4);
      }
   </style>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- register admin section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>register new Staff</h3>
      <input type="text" name="name" maxlength="20" required placeholder="enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" maxlength="20" required placeholder="confirm your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register admin section ends -->
















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>