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
    <title>About Us</title>
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
.about{
  box-shadow: 3px 3px 4px 3px grey;
  letter-spacing: 1.2;
  padding: 0.3em;
  font-size: 1.1em;
  width: 95%; 
  margin: auto;
  margin-bottom: 1em;
  margin-top: 1em;
}
/* /* =====================================================
 =============== PROFILE CARD  ======== */
 .our-team{
   width: 95%;
   margin: auto;
   font-size: 1.1em;
   padding: 0.5em;
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 }
 .profile-card{
   /* display: flex; */
   /* justify-content: center;
   align-items: center;
   height: 100vh;
   flex-direction: row;
   flex-wrap: wrap; */
   /* background: bisque; */
  }
  .profile > ul {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
   grid-gap: 0.5rem;
   /* color: white; */
   margin: 0.1em 0.5em 0.5em 0.4em;
 }

.team{
    /* position: relative;
    cursor: pointer; */
}
.box{
    /* width: 350px; */
    width: 95%;
    height: 220px;
    border-radius: 5px;
    transition: 0.6s;
}
.img1{
    background-image: url(../phpFolder/images/cback11.jpg);
}
.img2{
    background-image: url(../phpFolder/images/cback12.jpg);
}
.img3{
    background-image: url(../phpFolder/images/cback8.jpg);
}
.img4{
    background-image: url(../phpFolder/images/cback6.jpg);
}
.img5{
    background-image: url(../phpFolder/images/DSC_0614a.png);
}
.img1, .img2, .img3,.img4,.img5{
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(110px);
}
.team:hover .img1{
    transform: translateY(0);
}
.team:hover .img2{
    transform: translateY(0);
}
.team:hover .img3{
    transform: translateY(0);
}
.team:hover .img4{
    transform: translateY(0);
}
.team:hover .img5{
    transform: translateY(0);
}
.imgText{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1em;
    background: teal;
    color:white;
    box-sizing: border-box;
    box-shadow: 0 10px 10px grey;
    transform: translateY(-110px);
    position: relative;
}
.team:hover .imgText{
    transform: translateY(0);
}
.text-area > h2{
  color: white;
}
.text-area > h3{
  color: navy;
}

.icon{
  /* background: navy; */
  background-color: rgb(10, 10, 41);
  border-radius: 5px;
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


            <h1 style="text-align: center; font-size: 2em;">Our Team</h1>
            <div class="our-team">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cum officia iste voluptas ipsa. Velit odio consequuntur debitis, sapiente repellendus, repellat ab facere asperiores molestias ad, necessitatibus doloribus vero magni dolor sit amet consectetur!</p> <br>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt modi laudantium, odio nobis,  suscipit molestiae facilis ad quod earum vel ea libero nemo officiis quasi placeat corporis.</p> <br>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos adipisci obcaecati sint, laboriosam at cupiditate. Omnis eos, consectetur maxime ab impedit saepe, mollitia quaerat soluta similique eveniet sunt! Quos, nemo dolor sit amet!</p>

              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cum officia iste voluptas ipsa. Velit odio consequuntur debitis, sapiente repellendus, repellat ab facere asperiores molestias ad, necessitatibus doloribus vero magni dolor sit amet consectetur!</p> <br>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt modi laudantium, odio nobis,  suscipit molestiae facilis ad quod earum vel ea libero nemo officiis quasi placeat corporis.</p> <br>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos adipisci obcaecati sint, laboriosam at cupiditate. Omnis eos, consectetur maxime ab impedit saepe, mollitia quaerat soluta similique eveniet sunt! Quos, nemo dolor sit amet!</p>

              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cum officia iste voluptas ipsa. Velit odio consequuntur debitis, sapiente repellendus, repellat ab facere asperiores molestias ad, necessitatibus doloribus vero magni dolor sit amet consectetur!</p> <br>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt modi laudantium, odio nobis,  suscipit molestiae facilis ad quod earum vel ea libero nemo officiis quasi placeat corporis.</p> <br>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos adipisci obcaecati sint, laboriosam at cupiditate. Omnis eos, consectetur maxime ab impedit saepe, mollitia quaerat soluta similique eveniet sunt! Quos, nemo dolor sit amet!</p>

            </div>
   <div class="profile-card">
     <div class="profile">
     <ul>

     <li>
      <div class="team">
          <div class="box img1"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Alpha Ayoub</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
          
      </div>
      </li>

      <li>
      <div class="team">
          <div class="box img2"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Boniphace</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
          
      </div>
      </li>

      <li>
      <div class="team">
          <div class="box img3"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Joseph</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
        
      </div>
      </li>

        <li>
      <div class="team">
          <div class="box img4"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Madaraka</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
            </div>
          </li>

         <li>
      <div class="team">
          <div class="box img5"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Melckzedeck</h2>
                      <h3>Evangelist</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  
              </div>
          </div>
      </div>
    </li>
 
     <li>
      <div class="team">
          <div class="box img4"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Madaraka</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
            </div>
          </li>
    
          <li>
      <div class="team">
          <div class="box img2"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Boniphace</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
          
      </div>
      </li>

      <li>
      <div class="team">
          <div class="box img3"> </div>
              <div class="box imgText">
                  <div class="text-area">
                      <h2>Joseph</h2>
                      <h3>Designer</h3>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque veritatis non modi numquam porro odit  inventore temporibus quidem voluptatibus aliquid.</p> <br>
                      <p class="icon">
                      <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a  id="icon" href="#"><i class="fab fa-youtube"></i></a>
                      </p>
                  </div>
              </div>
        
      </div>
      </li>


  </ul>
</div>
    </div>

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