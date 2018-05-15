<?php  
	include('config.php');
    if (isset($_POST['btn-save'])){
      $text = "I Say Yes to " . $text = $_POST['phrase_1'] . " " . $_POST['phrase_2'] ."" . $_POST['name'] . "!" . "\n";
      // file_put_contents($filename, $text, FILE_APPEND);
      $link = mysqli_connect($db_host, $db_user, $db_password, $db_name);  
      $db_query = "INSERT INTO `phrases` (`ID`, `phrase`, `recipient`) VALUES (NULL, '" . $text . "', NOW());";
      //echo $db_query; 
      $result = $link->query($db_query);
      header("Location:phrase_read.php");
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
        <div class="jumbotron jumbotron-fluid" style="background-color: #031a4c">
          <div class="container">
                <h1 class="display-3" style="color: white">I say YES! to ...</h1>            
              <form method="post">
                <select name="phrase_1">
                  <option value="Chicken Nuggets">Chicken Nuggets</option>
                  <option value="Ketchup">Ketchup</option>
                  <option value="Schnittlauch">Schnittlauch</option>
                  <option value="HdM">HdM</option>
                </select>
                <select name="phrase_2">
                  <option value="mit S&uuml;&szlig;sauer, ">mit S&uuml;&szlig;sauer</option>
                  <option value="mit Zwiebeln, ">mit Zwiebeln</option>
                  <option value="mit Pommes, ">mit Pommes</option>
                  <option value="mit allem und viel scharf, ">mit allem und viel scharf</option>
                </select>
                <label> 
                    <input type="text" name="name">
                </label>
                <button type="submit" class="btn btn-default" name="btn-save" value="1" style="background-color: yellow" link>Say YES!</button>
              </form>
          </div>
          <?php include('footer.php') ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>    </body>
  </body>
</html>
