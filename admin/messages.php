<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_reservation = $conn->prepare("DELETE FROM reservations WHERE id = ?");
    $delete_reservation->execute([$delete_id]);
    header('location:reservations.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reservations</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
  

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- reservations section starts  -->

<section class="reservations">

   <h1 class="heading">Reservations</h1>

   <div class="box-containers">

   <?php
      $select_reservations = $conn->prepare("SELECT * FROM reservations");
      $select_reservations->execute();
      if ($select_reservations->rowCount() > 0) {
         while ($fetch_reservations = $select_reservations->fetch(PDO::FETCH_ASSOC)) {
   ?>
   <div class="box">
      <p> Name: <span><?= htmlspecialchars($fetch_reservations['name']); ?></span> </p>
      <p> Number: <span><?= htmlspecialchars($fetch_reservations['number']); ?></span> </p>
      <p> Email: <span><?= htmlspecialchars($fetch_reservations['email']); ?></span> </p>
      <p> Date: <span><?= htmlspecialchars($fetch_reservations['date']); ?></span> </p>
      <p> Time: <span><?= htmlspecialchars($fetch_reservations['time']); ?></span> </p>
      <p> Guests: <span><?= htmlspecialchars($fetch_reservations['guests']); ?></span> </p>
      <a href="reservations.php?delete=<?= $fetch_reservations['id']; ?>" class="delete-btn" onclick="return confirm('Delete this reservation?');">Delete</a>
   </div>
   <?php
         }
      } else {
         echo '<p class="empty">You have no reservations</p>';
      }
   ?>

   </div>

</section>

<!-- reservations section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>