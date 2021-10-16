<?php
ob_start();
// include('../config/security.php');
// include('../../config/header.php');
require_once('../../config/connection.php');
?>
<?php
      $username = $password = '';
      $usernameErr = $passwordErr = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Management System</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="Css/all.min.css">
    <script src="Css/all.min.js"></script>

    <style>
   /** @format */

* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background-color: white;
}
#nav-top {
  background-color: rgb(3, 3, 49);
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
  padding: 0.3em 0.2em;
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
    /* .toggle.show {
      display: none;
    } */
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

/* ===========  TESTIMONIAL SECTIONS =======
============================================ */
/* #testmonial {
  display: grid;
  align-items: center;
  grid-template-columns: repeat(auto-fit, minmax(320, 1fr));
} */
/* .testmonials > ul {
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

/* ====== FOOTER SECTION   
#footer-container {
  background-color: black;
  color: white;
  display: grid;
  grid-gap: 2em 1em;
  align-items: center;
  margin-left: 20%;
  padding-left: 0.5em;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  /* grid-template-rows: 1fr auto; 
}
/* #bottom-footer {
  grid-column: span 3;
  align-items: center;
} 
#icon {
  color: orangered;
  padding: 0.5em;
  font-size: 1.8em;
  /* align-items: center; 
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
} */

/* =====================================================
 =============== TESTING SIDE BAR NAVIGATION   ======== */
#nav {
  background-color: teal;
  color: white;
  width: 20%;
  padding: 0.4em;
  display: flex;
  height: 100%;
  position: fixed;
  overflow: auto;
  justify-content: center;
}
/* #nav {
  position: sticky;
  top: 80px;
  z-index: 2;
} */
/* .hide {
  display: none;
} */
a {
  text-decoration: none;
  color: white;
}
#nav > ul {
  list-style: none;
}
#nav > ul > li {
  padding: 0.6em 0.2em;
  margin: 1em 0.02em;
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
}

.btn1 {
  padding: 0.5em 1.5em;
  background-color: transparent;
  color: white;
  border: 1px solid teal;
  outline: none;
  margin: 0.3em 0.5em;
  border-radius: 5px;
}
.btn1:hover{
  background: orangered;
  border: none;
}
#inner-btn {
  padding: 0.5em 1.5em;
  background-color: blue;
  color: white;
  border: none;
  outline: none;
  margin: 0 0.2em;
  border-radius: 5px;
}

/* ============== LOGIN FORM ==================== */

    </style>
</head>
<body>
    <div id="nav-container">
        <!-- ================ FETCHING INSTITUTION DETAIL FROM THE DATABASE    =====================  -->
      <?php
           $select_query = "SELECT * FROM institution WHERE inst_id = '1'";
           $result = mysqli_query($conn, $select_query);
           if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_assoc($result)){
               $church_name = $row['inst_name'];
             }
           }


           if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            
            $select_query = "SELECT * FROM members WHERE email= '$username'";
            $result = mysqli_query($conn, $select_query);
            foreach($result as $row){
               $user_profile = $row['photo'];
               
            }
          }
      ?>

      
        <!-- <nav>
            <h3 id="logo">Church Ministry</h3>
        </nav> -->
            <nav id="nav-top">
                <ul class="menu" id="menu">
                <li class="logo"><a href="../pages/index.php"><i class="fa fa-home" aria-hidden="true"></i><?php echo $church_name ;?> </a></li>
                <!-- <li id="item" class="item link show"><a href="#">Home</a></li>
                <li id="item" class="item link show"><a href="#">Pages</a></li>
                <li id="item" class="item link show"><a href="#">Sermons</a></li>
                <li id="item" class="item link show"><a href="#">Ministries</a></li>
                <li id="item" class="item link show"><a href="#">Blog</a></li>
                <li id="item" class="item link show"><a href="#">Contacts</a></li> -->
                <li style="color: white;"><?php echo "<h4 style='color:orangered;'>Loged in as </h4>". $_SESSION['username'] ;?> </li>
                 
                <li>   <form action="../../config/logout.php" method="post">
        <button onClick="javascript: return confirm('You want to logout');" id="save-btn" class="btn1" name="logout">Logout</button> </form> </li>
        <a href="#">  <?php
               echo '<img style="border-radius: 50%; border: 1px solid teal;" src="../phpFolder/images/'.$row['photo'].'"  width="60;" height="60;" alt=""> <br>'?> 
               </a></li>


                <!-- <li>
                 
                </li>
                <li>
               
                </li> -->
                <!-- <li id="item" class="item link button col"><a href="#">Login</a></li>
                <li id="item" class="item link  button secondary trans"><a href="#">Sign Up</a></li> -->
                <!-- <li id="toggle" class="toggle show"><span class="bars"></span></li> -->
            </ul>
            </nav>
      <nav id="nav">
      <ul class="hide" id="side-bar">
     
        <li><a href="index.php"><i class="fas fa-chart-line"></i> Dashboard</a></li>
        <!-- <li class="dropbtn"
          ><a href="#"> <i class="fa fa-user-circle" aria-hidden="true"></i> Users </a>
          <div class="dropdown-content">
            <ul>
              <li><a href="ddUser.php"> + Add Users</a> </li>
              <li><a href="#"> + Manage Users</a> </li></ul
            >
          </div>
        </li> -->
        <!-- <li class="dropbtn"
          ><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Groups</a>
          <div class="dropdown-content">
            <ul>
              <li><a href="index.php?PageName=addGroup"> + Add Group</a> </li>
              <li><a href="#"> + Manage Group</a> </li></ul
            >
          </div>
        </li> -->

        <li class="dropbtn"
          ><a href="branches.php"><i class="fa fa-tags" aria-hidden="true"></i> Branches</a> </li>
          <!-- <div class="dropdown-content">
            <ul>
              <li><a href="#"> + Add Branch</a> </li>
              <li><a href="#"> + Manage Branches</a> </li></ul
            >
          </div> -->
        <!-- </li> -->

        <!-- <li class="dropbtn"><a href="index.php?PageName=departmentHead"><i class="fa fa-certificate" aria-hidden="true"></i> Department Head</a>
            <div class="dropdown-content">
                <ul>
                <li><a href="#"> + Add Department Head</a></li>
                <li><a href="#"> + Manage Department Head</a></li>
                </ul>
            </div> -->
        <!-- </li>
        <li class="dropbtn"><a href="index.php?PageName=department"><i class="fa fa-certificate" aria-hidden="true"></i> Department</a> -->
            <!-- <div class="dropdown-content">
                <ul>
                <li><a href="#"> + Add Department</a></li>
                <li><a href="#"> + Manage Department</a></li>
                </ul>
            </div> -->
        <!-- </li>  -->
        <li class="dropbtn"><a href="addMember.php"><i class="fa fa-users" aria-hidden="true"></i> Members</a>
            <!-- <div class="dropdown-content">
                <ul>
                <li><a href="addMember.php"> + Add Member</a></li>
                    <li><a href="#"> + Add Family</a></li>
                <li><a href="#"> + Manage Members</a></li>
                </ul>
            </div> -->
        </li>
        <li class="dropbtn"><a href="takeAttendance.php"><i class="fa fa-check-circle" aria-hidden="true"></i> Attendance</a>
            <!-- <div class="dropdown-content">
                <ul>
                <li><a href="takeAttendance.php"> + Take Attendance</a></li>
                <li><a href="attendanceReport.php"> + Attendance Report</a></li>
                </ul>
            </div> -->
           </li>

           <li class="dropbtn"><a href="#"><i class="fas fa-money-check-alt"></i> Accounting</a>
            <div class="dropdown-content">
                <ul>
                <li><a href="deposit.php"> + Deposit</a></li>
                <!-- <li><a href="#"> + Manage Payment</a></li> -->
                <li><a href="expenses.php"> + Expenses</a></li>
                <li><a href="income.php"> + Income</a></li>
                </ul>
            </div>
        </li>

        <li class="dropbtn"><a href="institution.php"><i class="fa fa-certificate" aria-hidden="true"></i> Institution</a> </li>

        <!-- <li class="dropbtn"><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>
            Events</a>
            <div class="dropdown-content">
                <ul>
                <li><a href="#"> + Plan Events</a></li>
                <li><a href="#"> + Manage Events</a></li>
                </ul>
            </div>
        </li> -->
        <!-- <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i> Import</a></li> -->
        <!-- <li><a href="branch.php"><i class="fa fa-signal" aria-hidden="true"></i> Report</a></li> -->
        <!-- <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li> -->
        <li><a href="about.php"><i class="far fa-flag"></i> Posts</a></li>
        <li><a href="comments.php"><i class="fas fa-comment-alt"></i> Comments</a></li>
        <li><a href="profileEdit.php"><i class="fas fa-user-circle"></i> Profile</a></li>

        <!-- <li><a href="../pages/index.php"><i class="fa fa-cog" aria-hidden="true"></i> Visit Site</a></li> -->
        <!-- <li class="dropbtn"><a href=""><i class="fa fa-calendar-o" aria-hidden="true"></i>
            Posts</a>
            <div class="dropdown-content">
                <ul>
                <li><a href=""> + Posts</a></li>
                <li><a href=""> + Comments</a></li>
                <li><a href="#"> + Ministries</a></li>
                <li><a href="#"> + Contacts</a></li>
                <li><a href="#"> + News</a></li>
                </ul>
            </div>
        </li> -->
       
      </ul>
    </nav>
    <main id="main" style="margin-left:20%;">
 
</body>
</html>
<?php
ob_flush();
?>