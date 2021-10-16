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
  /* background-image: url(../phpFolder/images/church5.jpg); */
  
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

#our-team{
    width: 95%;
    margin: auto;
}
.content > ul {
	position:relative;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  grid-gap: 1rem;
  color: white;
  width: 95%;
  margin: auto;
  margin-bottom: 1em;
  margin-top: 1em;
  transition: 0.3s;
}
.content > ul > li{
    box-shadow:2px 3px 6px grey;
    /* transition: 0.3s; */

}
.content > ul:hover{
  transform: translateY(-15px);
  color: white;
  background: teal;
}
.content img{
	width:100%;
  height: 320px;
	box-shadow:2px 3px 6px grey;
}
.texter{
  background: teal;
  /* box-shadow:2px 3px 6px grey; */
  text-align: center;
}
.textery{
    padding: 1em;
    color: black;
    transition: 0.3s;
}
.textery:hover{
    transform: translateY(-15px);
    color:white;
}
.Err{
  color: red;
}


.btn {
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
.hidden {
  /* display: none; */
}


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
    <img src="../phpFolder/images/cback6.jpg" height="300px" width="100%">
    <div class="sermon">
    <div id="our-team">
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
            <!-- <img src="../phpFolder/images/cback8.jpg" height="300px"> -->
            <div class="textery">
             <h2 style="text-align: center; color: orangered; margin: 1em;"> Spiritually Reborn As God’s Children </h2>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate hic voluptas, ab dignissimos quisquam illo inventore saepe vel quidem sit ad, similique quae expedita aut minus qui. Consequuntur, quo fuga. <br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni tempore omnis unde nesciunt ipsam sint voluptatibus quasi amet impedit possimus dolores sequi et similique iste atque, necessitatibus, vero molestiae soluta? <br>

              
               
            </div>
           </div>
              </li>
    </div>

    <div class="content">
            <ul>
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
            <!-- <img src="../phpFolder/images/cback8.jpg" height="300px"> -->
            <div class="textery">
             <h2 style="text-align: center; color: orangered; margin: 1em;">Preaching Worship An Online Family </h2>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate hic voluptas, ab dignissimos quisquam illo inventore saepe vel quidem sit ad, similique quae expedita aut minus qui. Consequuntur, quo fuga. <br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni tempore omnis unde nesciunt ipsam sint voluptatibus quasi amet impedit possimus dolores sequi et similique iste atque, necessitatibus, vero molestiae soluta? <br>

              <h5>Comments</h5>
               

            </div>
           </div>
              </li>
    </div>

    <div class="content">
            <ul>
              <li>
              <div class="inner">
            <img src="../phpFolder/images/church5.jpg" height="300px">
            <div class="texter">
                Grumeti hotel
            </div>

           </div>
              </li>

              <li>
              <div class="inner">
            <!-- <img src="../phpFolder/images/cback8.jpg" height="300px"> -->
            <div class="textery">
             <h2 style="text-align: center; color: orangered; margin: 1em;"> Sunday Sermon from the Church </h2>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate hic voluptas, ab dignissimos quisquam illo inventore saepe vel quidem sit ad, similique quae expedita aut minus qui. Consequuntur, quo fuga. <br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni tempore omnis unde nesciunt ipsam sint voluptatibus quasi amet impedit possimus dolores sequi et similique iste atque, necessitatibus, vero molestiae soluta? <br>


             <h5>Comments</h5>
               
            </div>
           </div>
              </li>
    </div>

    <div class="content">
            <ul>
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
            <!-- <img src="../phpFolder/images/cback8.jpg" height="300px"> -->
            <div class="textery">
             <h2 style="text-align: center; color: orangered; margin: 1em;">Preaching Worship An Online Family </h2>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate hic voluptas, ab dignissimos quisquam illo inventore saepe vel quidem sit ad, similique quae expedita aut minus qui. Consequuntur, quo fuga. <br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni tempore omnis unde nesciunt ipsam sint voluptatibus quasi amet impedit possimus dolores sequi et similique iste atque, necessitatibus, vero molestiae soluta?

                <h5>Comments</h5>
               
            </div>
           </div>
              </li>
    </div>

    <div class="content">
            <ul>
              <li>
              <div class="inner">
            <img src="../phpFolder/images/church5.jpg" height="300px">
            <div class="texter">
                Grumeti hotel
            </div>
       
           </div>
              </li>

              <li>
              <div class="inner">
            <!-- <img src="../phpFolder/images/cback8.jpg" height="300px"> -->
            <div class="textery">
             <h2 style="text-align: center; color: orangered; margin: 1em;"> Sunday Sermon from the Church </h2>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate hic voluptas, ab dignissimos quisquam illo inventore saepe vel quidem sit ad, similique quae expedita aut minus qui. Consequuntur, quo fuga. <br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni tempore omnis unde nesciunt ipsam sint voluptatibus quasi amet impedit possimus dolores sequi et similique iste atque, necessitatibus, vero molestiae soluta? <br>
               <h5>Comments</h5>


            </div>
           </div>
              </li>
    </div>


    </div>
 
     
       
        </main>

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