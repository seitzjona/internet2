<?php  
	include('../config.php');
	  $update_result = 0;
      $link = mysqli_connect($db_host, $db_user, $db_password, $db_name); 
  $db_query = "SELECT * FROM `phrases` WHERE `ID` = " . $_GET['edit-id'] ;
  $result = $link->query($db_query); 
  $row = mysqli_fetch_row($result); 
  $text = $row[1];
  
  if (isset($_GET['btn-save'])){
    $db_query = "UPDATE `phrases` SET `phrase` = '" . $_GET['phrase'] . "' WHERE `ID` = " . $_GET['edit-id'] ;
     // echo $db_query; 
     $update_result = $link->query($db_query);   
  header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add phrase</title>
    <meta charset="UTF-8"></meta>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
      .container div {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
        <div class="jumbotron jumbotron-fluid" style="background-color: #031a4c; color: white">
          <div class="container">
                <h1 class="display-3" style="color: white">EDIT</h1>            
            <form>
                <input type="hidden" name="edit-id" value="<?php echo $_GET['edit-id']?>" >
                <input type="text" name="phrase" value="<?php echo $text ?>"></input>
                <button type="submit" name="btn-save" value="1">Update</button>                
            </form>
           
          </div>
         
                  <?php include('../footer.php') ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>    </body>
  </body>
</html>
