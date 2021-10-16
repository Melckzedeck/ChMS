






<?php
ob_start();
// session_start();
include('../../config/security.php');
include('../../config/admin.php');
include('../../config/header.php');
require_once('../../config/connection.php');
// include('institutionEdit.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>institution</title>
</head>
<body>

<style>
        /** @format */

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* padding-left: 0.6em; */
  /* text-align: center; */
}
.form-content {
  width: 55%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  /* position: absolute; */
  left: 55%;
  top : 55%;
  /* transform : translate(-50%, -50%); */
  /* background-image: url(../../images/church5.jpg); */
  background: white;
  background-size: cover;
  background-repeat: no-repeat;
  margin-bottom: 1em;
}
.branch{
    font-size: 1.2em;
    font-weight:600;
}
.top {
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
}
input,textarea {
  width: 90%;
  padding: 0.5em;
  margin: 0.4em;
  border-radius: 5px;
  border: 1px solid grey;
  outline: none;
}
.alert {
  padding: 0.5em;
  margin: auto;
  border-radius: 5px;
  width: 50%;
  margin-bottom: 0.4em;
}
.success {
  background-color: green;
  color: white;
}
.err {
  background-color: red;
  color: white;
}
.btn {
  padding: 0.5em 1.5em;
  background-color: orangered;
  color: white;
  border: none;
  outline: none;
  margin: 1em 0.5em;
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
.form-container > p,
.table-container > p {
  background-color:teal;
  color:white;
  margin-bottom: 0.8em;
  /* padding: 0.5; */
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.table-container {
  text-align: center;
  overflow-x: auto;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
table {
  width: 95%;
  margin: auto;
  margin-bottom:1em;
}
table,
td,
th {
  border: 1px solid gray;
  border-collapse: collapse;
  padding: 0.5em 0.1em;
}
.bottom-footer{
  background-color:teal;
  /* margin-bottom: 0.8em; */
  width: 100%;
  /* padding: 0.5; */
  padding: 0.5em;
  color: white;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.Err{
  color: red;
}
.success{
  background: green;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 40%;
  margin: auto;
}
.error{
  background: red;
  color: white;
  text-align: center;
  padding: 0.3em;
  border-radius: 5px;
  width: 40%;
  margin: auto ;
}

    </style>
</head>
<body>

<?php
                if(isset($_POST['edit'])){
                 $post_edit = $_POST['edit_id'];
                   
                //     $title = $_POST['title'];
                //     $subtitle = $_POST['subtitle'];
                //     $description = $_POST['description'];
                //     // $links = $_POST['links'];
                //     $category = $_POST['category'];
                //     $images = $_FILES['images']['name'];
                //     $state = $_POST['state'];

                //     $author = $_SESSION['username'];
                //     $select_id = "SELECT member_id FROM members WHERE email = '$author'";
                //     $result = mysqli_query($conn, $select_id);
                //      if(mysqli_num_rows($result) > 0 ){
                //        while($row = mysqli_fetch_assoc($result)){
                //          $author_id = $row['member_id'];
                //        }
                //      }
                            
                //     $insert_query = "INSERT INTO post (title,subtitle,description,category,images,state, author_id) 
                //     VALUES ('$title', '$subtitle', '$description', '$category','$images','$state', '$author_id')";

                //     $result = mysqli_query($conn, $insert_query);
                //     if($result == TRUE){
                //       move_uploaded_file($_FILES['images']['tmp_name'], "posts/".$_FILES['images']['name']);
                //         $_SESSION['success'] = "New  post created succesfully";
                //         header('Location: about.php');
                //     }
                //     else{
                //         $_SESSION['status'] = "Failed to upload post";
                //         header('Location: about.php');
                //     }
                // }
                         
                    
                         $fetch_query = "SELECT * FROM post WHERE post_id = '$post_edit'";
                         $output = mysqli_query($conn, $fetch_query);

                         if(mysqli_num_rows($output) > 0){
                           while($row=mysqli_fetch_assoc($output)){

                            //    ' <img src="../phpFolder/images/'.$row['images'].'""width="90;" height="60;" alt="Image"> '
                           ?>
                             
                            <div class="form-container">
    <p><b>Manage: About Us Information</b> </p>
          
      <form method="POST" action="" class="hidden form-content" enctype="multipart/form-data">
      <p class="branch">Create Post</p> <br>
        Title <br>
        <input type="text" name="title_edit" value="<?= $row['title'] ;?>" placeholder="title of the post" id="inst-name" required> <br>
        
        Subtitle <br>
        <input type="text" name="subtitle_edit"  value="<?= $row['subtitle'] ;?>" placeholder="post subtitle" id="inst-add" required> <br>
        
         Description <br>
         <input type="text"  name="description_edit"  value="<?= $row['description'] ;?>" > <br>

         Category <br>
         <input list="category" name="category_edit"  value="<?= $row['category'] ;?>" placeholder="Select post category">
         <datalist id="category">
             <option value="notice"></option>
             <option value="post"></option>
             <option value="sermon"></option>
             <option value="about us"></option>
             <option value="event"></option>
        </datalist> <br>
        Event Date <br>
         <input type="text" name="date_edit"  value="<?= $row['event_date'];?>"> <br>
         Post Option <br>
         <input list="state" name="state_edit"  value="<?= $row['state'] ;?>" placeholder="select action" required> <br>
         Post Image <br>
         <input type="file" name="images_edit"> 
         <?= ' <img src="posts/'.$row['images'].'""width="220;" height="90;" alt="Image"> '?> <br>
         
            <button id="close-btn" class="btn"  name="close"><a style="color: white;" href="about.php">Cancel</a></button>
            <form action="" method="post">
                <input type="hidden" name="update_post" value="<?= $row['post_id'] ?>">
               <button id="save-btn" class="btn" name="update">Upload</button>
               </form>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
        
      <?php

                           }
                        }
                    }
                                  ?>
                            
                            
                            <?php
                            
                            if(isset($_POST['update'])){
                               $post_update = $_POST['update_post'];
                               
                            $post_title = $_POST['title_edit'];
                             $subtitle = $_POST['subtitle_edit'] ;
                            $description = $_POST['description_edit'] ;
                              $category =   $_POST['category_edit'] ;
                              $state  =  $_POST['state_edit'] ;
                              $date = $_POST['date-edit'];
                              $images = $_FILES['images_edit']['name'];
                               
                              $author_name = $_SESSION['username'];
                            
                              $select_author ="SELECT * FROM members WHERE email = '$author_name'";
                              $author_result = mysqli_query($conn, $select_author);
                              if(mysqli_num_rows($author_result) > 0){
                                  while($row = mysqli_fetch_assoc($author_result)){
                                      $author_id = $row['member_id'];
                                     
                                  }
                              }
                             
                                 $update_query ="UPDATE post SET title='$post_title', subtitle='$subtitle', description='$description', category='$category',images='$images', state='$state', author_id='$author_id', event_date = '$date'  WHERE post_id = '$post_update'";
                                     $update_result = mysqli_query($conn, $update_query);
                    if($update_result == TRUE){
                      move_uploaded_file($_FILES['images_edit']['tmp_name'], "posts/".$_FILES['images_edit']['name']);
                        $_SESSION['success'] = "post  succesfully updated";
                        header('Location: about.php');
                    }
                    else{
                        $_SESSION['status'] = "Failed to update post";
                        header('Location: about.php');
                    }
                }
                            


                             ?>
                        

                    






      

    
    <main>




         

   

<!-- </div> -->
<script>
const open = document.getElementById('add-data-btn');
const close = document.getElementById('close-btn');
let save = document.getElementById('save-btn');
let form = document.querySelector('.form-content');
let edit = document.querySelector('.edit');

open.addEventListener('click', () => {
    form.classList.remove('hidden');
})

close.addEventListener('click', () => {
    form.classList.add('hidden');
})
edit.addEventListener('click', () => {
  // form.classList.remove('hidden');
})


</script>
</body>
</html>
<?php
ob_flush();
include('../../config/footer.php');
?>