<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['book'])) {

   // Sanitize inputs
   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);
   $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
   $time = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
   $guests = filter_var($_POST['guests'], FILTER_SANITIZE_NUMBER_INT);

   // Check for empty or invalid fields
   if (empty($name) || empty($email) || empty($number) || empty($date) || empty($time) || empty($guests)) {
       $message[] = 'Please fill in all fields!';
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $message[] = 'Invalid email format!';
   } elseif (strlen($number) > 10 || strlen($number) < 10) {
       $message[] = 'Invalid phone number! It should be exactly 10 digits.';
   } elseif ($guests < 1) {
       $message[] = 'Number of guests must be at least 1.';
   } else {
       // Prepare and execute SQL statement
       try {
           $select_reservation = $conn->prepare("SELECT * FROM reservations WHERE name = ? AND email = ? AND number = ? AND date = ? AND time = ?");
           $select_reservation->execute([$name, $email, $number, $date, $time]);

           if ($select_reservation->rowCount() > 0) {
               $message[] = 'Reservation already made!';
           } else {
               $insert_reservation = $conn->prepare("INSERT INTO reservations(user_id, name, email, number, date, time, guests) VALUES(?,?,?,?,?,?,?)");
               $insert_reservation->execute([$user_id, $name, $email, $number, $date, $time, $guests]);
               $message[] = 'Reservation made successfully!';
           }
       } catch (PDOException $e) {
           $message[] = 'Error: ' . $e->getMessage();
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
   <title>Book a Table</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/reservation.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/reStyle.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>Book a Table</h3>
   <p><a href="home.php">Home</a> <span> / Book a Table</span></p>
</div>

<!-- booking section starts  -->
<section class="booking">

   <div class="row">

      <div class="image">
         <img src="images/bookingmy.png" alt="Booking Image">
      </div>

      <form action="" method="post">
         <h3>Reserve your table!</h3>
         <input type="text" name="name" maxlength="50" class="box" placeholder="Enter your name" required>
         <input type="text" name="number" maxlength="10" class="box" placeholder="Enter your number" required pattern="\d{10}">
         <input type="email" name="email" maxlength="50" class="box" placeholder="Enter your email" required>
         <input type="date" name="date" class="box" required>
         <input type="time" name="time" class="box" required>
         <input type="text" name="guests" min="1" class="box" placeholder="Number of guests" required>
         <input type="submit" value="Book Now" name="book" class="btn">
      </form>

   </div>

   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '<div class="message">' . $msg . '</div>';
      }
   }
   ?>

</section>
<!-- booking section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
