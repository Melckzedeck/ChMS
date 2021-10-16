<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Management System</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/all.min.css">
    <script src="css/all.min.js"></script>

    <style>
        /** @format */
/* 
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* background-color: red; 
}
#nav-top {
  background-color:rgb(10, 10, 41);
  padding: 0.1em 0.5em;
  z-index: 2;
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
  /* color: white; 
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

/* mobile menu  
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
  /* order: 3; 
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

/* for tablet menu  

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

  /* for desktop  
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
} */

/* ====== FOOTER SECTION   */
#footer-container {
  /* background-color: rgb(10, 10, 41); */
  background-color: navy;
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
/* /* =====================================================
 =============== TESTING SIDE BAR NAVIGATION   ======== */
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

    </style>
</head>
<body>
    
    <footer id="footer-container">
        <!-- <div id="footer-conatiner"> -->

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

                <div id="bottom-footer">
         &copy  <?php echo date("Y");?> Church Ministry  ||  All rights are reserved
        </div>
            </form>
        </div>
        <!-- <div id="bottom-footer">
         &copy  <?php echo date("Y");?> Church Ministry  ||  All rights are reserved
        </div> -->
    </footer>
    <script src="javascript/javascript.js"></script>
</body>
</html>