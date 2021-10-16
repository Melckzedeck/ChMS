<?php
 include('../../config/security.php');
 include('../../config/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Management System</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="../Css/all.min.css">
    <script src="../Css/all.min.js"></script>

    <style>
        /** @format */

* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* background-color: red; */
}
#nav-top {
  background-color:rgb(10, 10, 41);
  /* background: navy; */
  padding: 0.1em 0.5em;
  z-index: 2;
  position: sticky;
  top: 0;
}

ul {
  list-style: none;
}
a {
  text-decoration: none;
  color: white;
}
a:hover {
  /* background-color: blue; */
  /* color: white; */
  text-decoration: underline;
}
.menu li {
  font-size: 1em;
  padding: 0.5em 0.2em;
  display: block;
}
.logo a {
  font-size: 1.8em;
  font-weight: 600;
  color: orangered;
  text-decoration: none;
  font-weight: 500;
}
.button.secondary {
  border-bottom: 1px solid #444;
}

/* mobile menu  */
.menu {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.toggle {
  order: 1;
}
.item.button {
  order: 2;
}
.item.link {
  width: 100%;
  text-align: center;
  /* order: 3; */
  display: none;
}
.item.show {
  order: 3;
}
.item.active {
  display: block;
}

.toggle {
  cursor: pointer;
}
.bars {
  background-color: orangered;
  display: inline-block;
  height: 2px;
  position: relative;
  width: 18px;
}
.bars::before,
.bars::after {
  background-color: orangered;
  display: inline-block;
  content: "";
  height: 2px;
  position: absolute;
  width: 18px;
}
.bars::before {
  top: 5px;
}
.bars::after {
  top: -5px;
}

/* for tablet menu  */

@media all and (min-width: 468px) {
  .menu {
    justify-content: center;
  }
  .logo {
    flex: 1;
  }
  .item.button {
    display: block;
    order: 1;
    width: auto;
  }
  .toggle {
    order: 2;
  }
  .button.secondary {
    border: none;
  }
  .button.col a {
    padding: 0.3em 0.58em;
    background-color: teal;
    border: 1px solid #006d6d;
    border-radius: 50em;
  }
  .button.secondary {
    background: transparent;
    padding: 0.3em 0.4em;
    border-radius: 50em;
  }
  .button a:hover {
    transition: all 0.25s;
    text-decoration: none;
  }
  .button:not(.secondary) a:hover {
    background-color: orangered;
    border-color: #005959;
    padding: 0.3em 0.58em;
  }
  .button.secondary :hover {
    border: 2px solid #005959;
    color: white;
    padding: 0.3em 0.52em;
    border-radius: 50em;
  }

  /* for desktop  */
  @media all and (min-width: 768px) {
    .item.show {
      display: block;
      width: auto;
      order: 1;
    }
    .toggle.show {
      display: none;
    }
    .logo {
      order: 0;
    }
    .item {
      order: 1;
    }
    .button {
      order: 2;
    }
    .menu li {
      padding: 0.8em 0.5em;
    }
    .menu li.button {
      padding-right: 0;
    }
  }
}

/* =================MAIN SECTION =====================
==================================================== */
/* #main {
  margin-left: 26%;
} */

/* ===========  TESTIMONIAL SECTIONS =======
============================================ */
/* #testmonial {
  display: grid;
  align-items: center;
  grid-template-columns: repeat(auto-fit, minmax(320, 1fr));
} */
.testmonials > ul {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  grid-gap: 1rem;
  color: white;
  margin: 0.1em 0.5em 0.5em 0.4em;
}

.testmonials > ul > li {
  border: 1px solid #e2e2e2;
  border-radius: 0.5rem;
}

.testmonials > ul > li > figure {
  max-height: 220px;
  overflow: hidden;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
  position: relative;
}
.testmonials > ul > li > figure > figcaption {
  position: absolute;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.7);
  box-shadow: 2px 2px 3px grey;
  width: 100%;
}

.testmonials > ul > li > figure > figcaption > h3 {
  color: black;
  padding: 0.75rem;
  font-size: 1.25rem;
}

.testmonials > ul > li > p {
  font-size: 1rem;
  line-height: 1.5;
  padding: 1rem 0.75rem;
  color: black;
  box-shadow: 3px 4px 4px 3px grey;
}

/* ====== FOOTER SECTION   */
#footer-container {
  background-color: rgb(10, 10, 41);
  /* background: navy; */
  color: white;
  display: grid;
  grid-gap: 2em 1em;
  align-items: center;
  padding-left: 0.5em;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  /* grid-template-rows: 1fr auto; */
}
/* #bottom-footer {
  grid-column: span 3;
  align-items: center;
} */
#icon {
  color: orangered;
  padding: 0.5em;
  font-size: 1.8em;
  /* align-items: center; */
}
.social {
  margin: 2em 0.5em;
}
.inner-news {
  display: flex;
  margin: 0.3em;
  padding: 0.2em;
}
.inner-news img {
  margin-right: 0.3em;
}
.left {
  margin-left: 0.5em;
  padding: 0.05em 0.05em 1em 0.05em;
}
.links-footer {
  margin-right: 0;
  list-style: none;
}
.links-footer > li {
  list-style: none;
}
.comment {
  padding: 0.5em;
  border-radius: 5px;
  width: 70%;
}
.btn-comment {
  background-color: orangered;
  color: white;
  padding: 0.5em 0.5em;
  border: none;
  outline: none;
  border-radius: 5px;
  width: 25%;
}
#bottom-footer {
  text-align: center;
  margin: 1em;
}

.btn1 {
  padding: 0.5em 1.5em;
  background-color: transparent;
  color: white;
  border: 1px solid teal;
  outline: none;
  margin: 1em 0.5em;
  border-radius: 5px;
}
.btn1:hover{
 border: none;
 background: orangered;
}
.btn{
  padding: 0.5em 1.5em;
  background-color: orangered;
  color: white;
  border: none;
  outline: none;
  /* margin: 1em 0.5em; */
  border-radius: 5px;
}
#inner-btn {
  padding: 0.5em 1.5em;
  background-color: orangered;
  color: white;
  border: none;
  outline: none;
  margin: 0 0.2em;
  border-radius: 5px;
}
.about{
  box-shadow: 2px 1px 2px 2px grey;
  /* border: 1px solid teal; */
  letter-spacing: 1.2;
  padding: 0.3em;
  font-size: 1.1em;
  width: 99%; 
  color: black;
  margin: auto;
  margin-bottom: 1em;
  margin-top: 1em;
}
/* /* =====================================================
 =============== TESTING PROFILE  ======== */
.content{
  width: 93%;
  margin:auto;
}
 .content > ul {
	position:relative;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  grid-gap: 1rem;
  color: black;
  margin: 0.1em 0.5em 0.5em 0.4em;
  padding-bottom: 1em;
}
.content img{
	width:100%;
  height: 280px;
	box-shadow:2px 3px 6px grey;
}
.texter{
  /* background: navy; */
  box-shadow:2px 3px 6px grey;
  text-align: center;
  padding-bottom: 1em;
}

.profileCard{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  grid-gap: 1rem;
  color: navy;
  grid-gap: 1em;
  width: 98%;
  margin: auto;
  /* margin: 0.1em 0.5em 0.5em 0.4em; */
}
.single-box{
  position:relative;
  display: flex;
  flex-direction: column;
  align-items:center; 
  box-shadow:2px 3px 6px grey;
  border-radius: 10px;
   margin: 1em 0.2em;
   z-index: 1;
}
.header-area.img1{
  background-image : url(../phpFolder/images/cback8.jpg);
}
.header-area.img2{
  background-image : url(../phpFolder/images/cback6.jpg);
}
.header-area.img3{
  background-image : url(../phpFolder/images/cback12.jpg);
}
.header-area.img4{
  background-image : url(../phpFolder/images/DSC_0614a.png);
}
.header-area{
  border-radius: 10px 10px 50% 0;
  padding: 30% 50%;
  background-size: cover;
  background-position: center center;
  /* background: white; */
}

.body-area{
  padding: 0.5em;
}
.body-area >h4{
  font-family: roboto;
  color: orangered;
  /* font-size: em; */
} 
.icon{
  /* background: navy; */
  background-color: rgb(10, 10, 41);
  border-radius: 5px;
}
.pro-text{
  padding: 0.4em 0.1em;
}
.team{
  letter-spacing: 1.2;
  padding: 0.3em;
  font-size: 1.1em;
  width: 95%; 
  margin: auto;
  /* margin-bottom: 0.5em; */
  margin-top: 1em;
}
 


.home-section > ul{
  /* display: grid;
  grid-template-columns: 65% 33%;
  grid-gap: 1rem;
  color: navy;
  grid-gap: 1em; */
  width: 96%;
  margin: auto; 
}
.home-section > ul > li > h5{
 font-family: verdana;
 color: yellow;
}
.updates{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  grid-gap: 1rem;
  color: navy;
  grid-gap: 1em;
  width: 96%;
  margin: auto; 
}
.post{
  box-shadow: 2px 3px 2px 3px grey;
  padding: 1em;
}
.notice-side{
  /* background: navy:
  color: white; */
  color: black;
}
.notice{
  /* background: navy; */
  /* box-shadow: 3px 3px 3px 4px grey; */
   color: black; 
   margin: 1em 0.2em;
   padding: 0.4em;
   padding-bottom: 1em;
}
.desc{
  /* box-shadow: 3px 3px 3px 2px grey; */
  border: 1px solid grey;
  padding: 1em 0.5em;
}
.about-churc{
  color: black;
  width: 96%;
  margin: auto;
}

.cont{
  position: relative;
   z-index: 4; 
   width: 25%;
   margin: auto; 
   text-align: center;
   padding: 1em;
   border-radius: 8px;
   margin-top: -2em; 
   box-shadow: 2px 3px 3px grey; 
   background: white;
}
.success{
  background: green;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 70%;
  margin: auto;
}
.error{
  background: red;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 80%;
  margin: auto ;
}

/*
#nav {
  background-color: teal;
  color: white;
  width: 25%;
  padding: 0.4em;
  display: flex;
 position: fixed;
  overflow: auto; 
  justify-content: center;
}
.hide {
  display: none;
}
a {
  text-decoration: none;
  color: white;
}
#nav > ul {
  list-style: none;
}
#nav > ul > li {
  padding: 0.8em 0.2em;
  /* margin: 1em 0.02em; 
}
#nav > ul > li:hover {
  background-color: rgba(1, 1, 1, 0.3);
}
.dropdown-content > ul {
  list-style: none;
}

.dropdown-content > ul > li:hover {
  background-color: rgba(1, 1, 1, 0.3);
  padding: 0.2em 0;
  color: white;
}
.dropdown-content {
  font-size: 0.8em;
  padding: 0.2em;
  box-shadow: 0 8px 16px 0 rgba(1, 1, 1, 0.3);
  display: none;
}
.dropbtn {
  position: relative;
}
.dropbtn:hover .dropdown-content {
  display: block;
} */
/* img{
  width: 100%;
height: 500px;
z-index: -2;
} */
    </style>
</head>
<body>
    <div id="nav-container">
      
        <!-- <nav>
            <h3 id="logo">Church Ministry</h3>
        </nav> -->
            <nav id="nav-top">
                <ul class="menu" id="menu">
                <li class="logo"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Christ Ministry</a></li>
                <li style="color: white;"><?php echo "<h4 style='color:orangered;'>Loged in as </h4>". $_SESSION['username'];?></li>
                <li id="item" class="item link show"><a href="index.php">Home</a></li>
                <li id="item" class="item link show"><a href="about.php">About</a></li>
                <li id="item" class="item link show"><a href="sermons.php">Sermons</a></li>
                <!-- <li id="item" class="item link show"><a href="#">Ministries</a></li> -->
                <li id="item" class="item link show"><a href="gallery.php">Gallery</a></li>
                <li id="item" class="item link show"><a href="userProfile.php">profile</a></li>
                <!-- <li id="item" class="item link  button secondary trans"><a href="#">Sign Up</a></li> -->
                <form action="../../config/logout.php" method="post">
                <li id="item" class="item link button col"><button onClick="javascript: return confirm('You want to leave this page')" class="btn1" name="logout_user"> Logout</button></li>
                </form>
                <!-- <li id="item" class="item link button col"><a href="">logout</a></li> -->
                <li id="toggle" class="toggle show"><span class="bars"></span></li>
            </ul>
            </nav>

    <main id="main">
   
        <h1 style="position: absolute; top:50%; left:35%; color:white;">Welcome to the church Ministry</h1>
        <img style="z-index: -3; width: 100%; top: 0;" src="../phpFolder/posts/calvary4.jpg" alt="" width="98%" height="500">
    
        <!-- <div  class="about">
          <div>
          <h2 style="text-align: center; color:rgb(10, 10, 41);">About Our Church </h2>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste aut minus quidem provident tenetur, ullam quod magnam voluptatibus necessitatibus animi quam numquam inventore dolorum voluptate recusandae consectetur magni esse placeat.</p> <br>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates itaque eaque, similique qui eveniet illum placeat, amet consequuntur, vero perspiciatis magni voluptatibus reiciendis perferendis pariatur praesentium asperiores? Aperiam, eos assumenda! </p> <br>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum non amet voluptate molestias delectus. Reprehenderit eaque quia dolore sequi corrupti eius vel amet voluptates, labore non eligendi repellat, tempora maxime. </p> <br>
          </div>
          <div>
           <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe, fuga odio aut quidem, itaque earum similique ad cumque minima perferendis maxime quod eos sed hic laborum est exercitationem deserunt? </p>
          </div>
        </div> -->


        
        <div class="home-section">
       
          <ul>
            <li>
            <div  class="about">
          <div>
          <h2 style="text-align: center; color:rgb(10, 10, 41);">About Our Church </h2>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste aut minus quidem provident tenetur, ullam quod magnam voluptatibus necessitatibus animi quam numquam inventore dolorum voluptate recusandae consectetur magni esse placeat.</p> <br>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates itaque eaque, similique qui eveniet illum placeat, amet consequuntur, vero perspiciatis magni voluptatibus reiciendis perferendis pariatur praesentium asperiores? Aperiam, eos assumenda! </p> <br>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum non amet voluptate molestias delectus. Reprehenderit eaque quia dolore sequi corrupti eius vel amet voluptates, labore non eligendi repellat, tempora maxime. </p> <br>
          </div>
          <div>
           <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe, fuga odio aut quidem, itaque earum similique ad cumque minima perferendis maxime quod eos sed hic laborum est exercitationem deserunt? </p> <br>

           <div class="vision">
             <!-- <h1 style="text-align: center; color:rgb(10, 10, 41);">Our Vision</h1>
             <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur corporis repudiandae ad nam velit quam consequuntur deleniti quasi inventore repellendus provident   omnis, quasi   omnis, quasi  vel! Amet expedita esse id doloribus?</P> <br>
             <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates veniam voluptatem ea, error, quo animi maiores nam eveniet consequuntur deleniti quasi inventore odit reiciendis dolorum! Culpa accusantium repellendus iste! Natus, maxime vero.</p> <br>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aut nostrum expedita laudantium consectetur, tenetur accusantium ab quia eaque repellat porro distinctio eveniet recusandae unde aliquid, dolorem quo, error officia.</p> <br>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, accusantium architecto hic at est, ullam quidem praesentium consequuntur deleniti quasi inventore veritatis id sequi dignissimos aspernatur maxime eum ad debitis consequuntur deleniti quasi inventore.</p> <br> <br> -->
               
             <?php
                // ========= FETCHING ALL POSTS FROM THE DATABASE ======== 
                $get_post = "SELECT *  FROM post WHERE category = 'about us'";
                $post_result = mysqli_query($conn, $get_post);
                if(mysqli_num_rows($post_result) > 0){
                  while($row = mysqli_fetch_assoc($post_result)){
                    $title =  $row['title'];
                    $subtitle = $row['subtitle'];
                    $description = $row['description'];
                    $image = $row['images'];
                    $date = $row['date_created'];
                    ?>
                            <div class="post1">
               <h3><i><?= $title ?></i></h3>
               <h5><i><?= $subtitle ?></i></h5> <br>
               <?php
               echo '<img src="../phpFolder/posts/'.$image.'" alt="" width="100%" height="420"> <br>';
               ?>
               
                 <p><?= $description ?></p>
                 <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione odio enim sunt, aliquid iste id, temporibus sapiente explicabo dignissimos ab quod placeat tempora. Earum necessitatibus officiis ipsam vero magnam incidunt!</p>

                 <!-- <button id="save-btn" class="btn" name="update">Read More >></button> -->
             </div>
                    <?php
                  }
                }
             ?>
             



           </div>
          </div>
        </div>
            </li>
           
        </div>


        
              <div  class="notice-side">
                 
                  <div class="notice">
                  <h2 style="text-align:center; background-color :rgb(10, 10, 41); center; color:white;">Recent Updates</h2>
                  <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='success'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='error'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>

                  <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio quam ut aperiam? Nisi aliquid magnam minima placeat quod, accusamus in! Iure possimus dolorem ipsam voluptates veniam aspernatur quo consequuntur eveniet.</p> <br>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae id possimus recusandae eius facilis enim ut modi? Enim, magnam magni ex, sint animi nihil optio aliquam amet cum exercitationem necessitatibus!
                 <p>
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis hic commodi nostrum distinctio repellat.
                 </p> <br>
                 <p>
                 magni earum consequuntur exercitationem error ex. Illo nostrum similique libero praesentium. Quisquam deleniti asperiores accusamus nam!
                 </p> <br>

                 <p>
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis hic commodi nostrum distinctio repellat.
                 </p> <br>
                 <p>
                 magni earum consequuntur exercitationem error ex. Illo nostrum similique libero praesentium. Quisquam deleniti asperiores accusamus nam!
                 </p> <br> -->
                 <div class="updates">
                 
                 
                 <?php
                // ========= FETCHING ALL POSTS FROM THE DATABASE ======== 
                $get_post = "SELECT *  FROM post WHERE category = 'notice'";
                $post_result = mysqli_query($conn, $get_post);
                if(mysqli_num_rows($post_result) > 0){
                  while($row = mysqli_fetch_assoc($post_result)){
                    $title =  $row['title'];
                    $subtitle = $row['subtitle'];
                    $description = $row['description'];
                    $image = $row['images'];
                    $date = $row['event_date'];
                    ?>
                            <div class="post"> <br>
               <h3 style="color: white; background:teal; border-radius 1px; padding: 0.3em; font-size: 1.2em;"><i><?= $title ?></i></h3>
               <h5 style="color: orangered; font-size: 1.1em;"><i><?= $subtitle ?></i></h5> 
               <p style=" background:orangered; color: white; width: 40%; border-radius: 6px; padding: 0.3em; font-size: 1em;"><i><?= $date ?></i></p> <br>
               <?php
               echo '<img src="../phpFolder/posts/'.$image.'" alt="" width="96%" height="190"> <br>';
               ?>
               
                 <p><?= $description ?></p> <br>
                 <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione odio enim sunt, aliquid iste id, temporibus sapiente explicabo dignissimos ab quod placeat tempora. Earum necessitatibus officiis ipsam vero magnam incidunt!</p> -->

                 <?php
                      // DISPLAYING COMMENTS RELATED TO POST 
                      $select_post = "SELECT post.post_id FROM post JOIN comments ON post.post_id = comments.post_id";
                      $post_id = $row['post_id'];

                      $select_comment = "SELECT * FROM comments WHERE post_id  = '$post_id' AND status = 'approved'";
                       $comment_result =mysqli_query($conn,  $select_comment);
                      //  if(mysqli_num_rows($comment_result) > 0){
                      //    while($row = mysqli_fetch_assoc($comment_result)){
                          
                      //    }
                  // }
                          $num = mysqli_num_rows($comment_result);
                          echo "<b><i> Comments: </i></b>". $num;

                 ?>
                   <form action="post.php" method="post">
                      <input type="hidden" name="read_post" value="<?= $row['post_id'] ;?>">
                      <input type="hidden" name="post_cat" value="<?= $row['category'] ;?>">
                     <button id="save-btn" class="btn" name="read">Read More >></button>
                   </form>
                  
             
             </div>
                    <?php
                  }
                }
             ?>
                      
                 </div>
              </div>
             </div>

              
            


          </ul>



               <div class="events">
                 <h2 style="color: white; text-align: center; background:teal; border-radius 1px; padding: 0.3em; font-size: 1.2em; width: 30%; margin: auto;">Upcoming Events</h2> <br>
           
                 <div id="our-team">
          <div class="content">
            <ul>
             
                 <?php
                // ========= FETCHING ALL POSTS FROM THE DATABASE ======== 
                $get_post = "SELECT *  FROM post WHERE category = 'event'";
                $post_result = mysqli_query($conn, $get_post);
                if(mysqli_num_rows($post_result) > 0){
                  while($row = mysqli_fetch_assoc($post_result)){
                    $title =  $row['title'];
                    $subtitle = $row['subtitle'];
                    $description = $row['description'];
                    $image = $row['images'];
                    $date = $row['event_date'];
                    ?>
 <li>
              <div class="inner">

              <?php
               echo '<img src="../phpFolder/posts/'.$image.'" alt="" width="96%" height="290">';
               ?>
               <!-- <div style="" class="cont">
                 <h3>Dec 03</h3>
                  <p style="background: orangered; color: white;">4:00pm</p>
               </div> -->
            <div class="texter">
            <h4 style="color: white; background:teal; border-radius 1px; padding: 0.3em; font-size: 1.2em;"><i><?= $title ?></i></h4>
               <h6 style="color: orangered; font-size: 1.1em;"><i><?= $subtitle ?></i></h6> 
               <p  style=" background:orangered; color: white; width: 40%; border-radius: 6px; padding: 0.3em;margin-left:0.3em; font-size: 1em;"><i><?= $date ?></i></p> <br>
                <p><?= $description ?></p> <br>

                <?php
                      // DISPLAYING COMMENTS RELATED TO POST 
                      $select_post = "SELECT post.post_id FROM post JOIN comments ON post.post_id = comments.post_id";
                      $post_id = $row['post_id'];

                      $select_comment = "SELECT * FROM comments WHERE post_id  = '$post_id' AND status = 'approved'";
                       $comment_result =mysqli_query($conn,  $select_comment);
                      //  if(mysqli_num_rows($comment_result) > 0){
                      //    while($row = mysqli_fetch_assoc($comment_result)){
                          
                      //    }
                  // }
                          $num = mysqli_num_rows($comment_result);
                          echo "<b><i> Comments: </i></b>". $num;

                 ?>      
                 
                <form action="post.php" method="post">
                      <input type="hidden" name="read_post" value="<?= $row['post_id'] ;?>">
                      <input type="hidden" name="post_cat" value="<?= $row['category'] ;?>">
                     <button id="save-btn" class="btn" name="read">Read More >></button>
                   </form>
            </div>
           </div>
              </li>
            
               <?php
                  }
                }
             ?>
               </ul> 
          </div>
        </div>
               </div>


        <section class="testmonials">
            <!-- <ul>
                <li>
                    <figure>
                    <img src="./images/church.jfif" alt="" width="100%" height="300">
                        <figcaption>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br><br>
                        </figcaption>
                        <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, incidunt? Voluptate, blanditiis excepturi. Alias hic sunt eveniet voluptatum enim, repellendus quos laboriosam delectus perspiciatis eius deleniti odit aperiam possimus repudiandae.
                        </p>
                        </figure>
                </li>
                
             -->
        </section>
                 
        <!-- <div id="our-team">
          <div class="content">
            <ul>
              <li>
              <div class="inner">
            <img src="../phpFolder/images/cback8.jpg" height="300px">
            <div class="texter">
                Grumeti hotel
            </div>
           </div>
              </li>

              <li>
              <div class="inner">
            <img src="../phpFolder/images/cback8.jpg" height="300px">
            <div class="texter">
                Grumeti hotel
            </div>
           </div>
              </li>
              <li>
              <div class="inner">
            <img src="../phpFolder/images/cback6.jpg" height="300px">
            <div class="texter">
                Grumeti hotel
            </div>
           </div>
              </li>
              <li>
              <div class="inner">
            <img src="../phpFolder/images/cback6.jpg" height="300px">
            <div class="texter">
                Grumeti hotel
            </div>
           </div>
              </li>
            </ul>
          </div>
        </div> -->


        
      <div class="team">
        <h1 style="color: white; text-align: center; background:teal; border-radius 1px; padding: 0.3em; font-size: 1.2em; width: 30%; margin: auto;">Church Pastors</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit earum ut dolores eveniet in labore quis ratione, quae cupiditate quaerat iste atque animi laudantium, recusandae excepturi repudiandae veniam, eligendi porro.</p> <br>
        </div>
        <div class="profileCard"> 
        <div class="single-box">
          <div class="header-area img1"> </div>
            <div class="body-area">
              <h3>Person One</h3>
              <h4>Pastor</h4>
              <p class="pro-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum enim saepe quibusdam fuga rem quod magnam.</p>
              <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
            </div>
          
          </div>
          <div class="single-box">
          <div class="header-area img2"> </div>
            <div class="body-area">
              <h3>Person Two</h3>
              <h4>Pastor</h4>
              <p  class="pro-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque aut cupiditate ratione eligendi odit, consectetur natus.</p>
              <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
            
          </div>
          </div>
          <div class="single-box">
          <div class="header-area profile img3"> </div>
            <div class="body-area">
              <h3>Person Three</h3>
              <h4>Pastor</h4>
              <p  class="pro-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus minus maxime exercitationem rerum fugiat iure culpa.</p>
              <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
          </div>
        </div>
        <div class="single-box">
          <div class="header-area profile img4"> </div>
            <div class="body-area">
              <h3>Melckzedeck</h3>
              <h4>Evangelist</h4>
              <p  class="pro-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt omnis voluptates.</p>
              <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
          </div>
        </div>
        </div>
        </main>

    <!--<footer id="footer-container">
         <div id="footer-conatiner"> 

        <div class="left">
            <h3 class="footer">About Church Ministry</h3>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam totam pariatur, odio commodi natus accusamus laudantium quas. Quaerat dolor ab hic, assumenda impedit voluptate est odit iste quisquam rerum dolores?
            <div class="socials">
                    <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-dribbble-square"></i></a>   
                 </div> 
        </div>
        <div class="links-footer">
            <h3 class="footer">Useful Links</h3>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">amet consectetur adipisicing elitr</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">amet consectetur adipisicing elit</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">amet consectetur adipisicing elit</a></li>
        </div>
        <div class="news">
            <h3 class="footer">Latest News</h3>
            <div class="inner-news">
                <img src="./images/animal.jpg" alt="" width="100px" height="80px">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi quisquam cupiditate  
            </div>
            <div  class="inner-news">
                <img src="./images/animal.jpg" alt="" width="100px" height="80px">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi quisquam cupiditate  
            </div>
            <div  class="inner-news">
                <img src="./images/animal.jpg" alt="" width="100px" height="80px">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi quisquam cupiditate 
            </div>
        </div>

        <div class="contacts-footer">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, illum perspiciatis deserunt 

            <form action="">
                <input type="text" name="comment" placeholder="Email Address" class="comment">
                <button  class="btn-comment">Login</button>

               
            </form>
        
    </footer> -->
    <script>
  const menu = document.getElementById('toggle');
let item =  document.querySelectorAll('.item');
let left_menu = document.getElementById('side-bar');
// let left_menu = document.querySelector('.side-bar');


menu.addEventListener('click', function(){
    for(let i=0; i < item.length; i++){
        item[i].classList.toggle('active');
        // console.log('hello');
    }
  //  left_menu.classList.toggle('hide');
  //  console.log(left_menu);
})
</script>
</body>
</html>
<?php
   include('../../config/user_footer.php');
?>