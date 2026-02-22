<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Special Events</title>--<style>


/* Global Styles */
body {
   font-family: Arial, sans-serif;
   line-height: 1.6;
   background-color: #f8f8f8;
   margin: 0;
   padding: 0;
}

.container {
   max-width: 1200px;
   margin: 0 auto;
   padding: 0 20px;
}

/* Header Styles */
.header {
   background-color: #333;
   color: #fff;
   padding: 10px 0;
   text-align: center;
}

.header a {
   color: #fff;
   text-decoration: none;
   margin: 0 10px;
}

/* Heading Section Styles */
.heading {
   background-color: #ddd;
   padding: 20px;
   text-align: center;
   margin-bottom: 20px;
}

.heading h3 {
   font-size: 2em;
   margin-bottom: 10px;
}

.heading p {
   font-size: 1.2em;
   color: #666;
}

/* About Section Styles */
.about {
   padding: 20px;
   background-color: #fff;
   margin-bottom: 20px;
}

.about .row {
   display: flex;
   align-items: center;
}

.about .image {
   flex: 1;
   text-align: center;
}

.about .image img {
   max-width: 100%;
   height: auto;
}

.about .content {
   flex: 2;
   padding: 0 20px;
}

.about h3 {
   font-size: 1.8em;
   color: #333;
   margin-bottom: 10px;
}

.about p {
   font-size: 1.2em;
   color: #666;
   line-height: 1.6;
}

/* Steps Section Styles */
.steps {
   background-color: #f5f5f5;
   padding: 40px 20px;
   text-align: center;
}

.steps .title {
   font-size: 2.5em;
   color: #333;
   margin-bottom: 20px;
}

.steps .box-container {
   display: flex;
   justify-content: space-around;
   flex-wrap: wrap;
}

.steps .box {
   flex: 1;
   max-width: 300px;
   background-color: #fff;
   padding: 20px;
   margin: 10px;
   text-align: center;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.steps .box img {
   max-width: 100px;
   height: auto;
   margin-bottom: 20px;
}

.steps .box h3 {
   font-size: 1.5em;
   color: #333;
   margin-bottom: 10px;
}

.steps .box p {
   font-size: 1.1em;
   color: #666;
   line-height: 1.6;
}

/* Footer Section Styles */
.footer {
   background-color: #333;
   color: #fff;
   padding: 20px 0;
   text-align: center;
}

.footer p {
   margin: 0;
}

.footer a {
   color: #fff;
   text-decoration: none;
   margin: 0 10px;
}

/* Responsive Styles */
@media (max-width: 768px) {
   .about .row {
      flex-direction: column;
   }
   .steps .box {
      flex: 1 0 100%;
      max-width: none;
   }
}

   </style>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>special events</h3>
   <p><a href="home.php">home</a> <span> / special events</span></p>
</div>

<!-- events section starts  -->
<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/event1.jpg" alt="">
      </div>

      <div class="content">
         <h3>Our Grand Events</h3>
         <p>Join us for an unforgettable experience with our special events, featuring world-class entertainment, exquisite cuisine, and unique themes. Whether it's a gala, a concert, or a themed party, we have something for everyone.</p>
         <!-- <a href="sheduleevent.php" class="btn">Event Schedule</a> -->
         <!-- <input type="submit" value="Participate" name="book" class="btn"> -->
         <a href="eventregister.php" class="btn">Participate</a>
      

   </div>

</section>



<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/event2.jpg" alt="">
      </div>

      <div class="content">
         <h3>Private Parties</h3>
         <p>Host your private parties with us and enjoy a seamless experience with our dedicated event planners. From birthdays to anniversaries, we provide tailored services to make your celebrations extraordinary.</p>
         <input type="submit" value="Participate" name="book" class="btn">
        
      
      </div>


   </div>

</section>


<!-- events section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">how to book</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/add1.webp" alt="">
         <h3>Cooking Classes on Cafe Events</h3>
         <p>Select the type of event you wish to attend or host from our extensive list of offerings.</p>
      </div>

      <div class="box">
         <img src="images/add2.webp" alt="">
         <h3>Love Is In The Air on a Cafe</h3>
         <p>Reserve your spot or date for the event online through our easy-to-use booking system.</p>
      </div>

      <div class="box">
         <img src="images/add3.webp" alt="">
         <h3>Charity Night Cafe Events</h3>
         <p>Attend the event and indulge in an extraordinary experience crafted just for you.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<
<!-- reviews section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>