<?php
if(isset($_SESSION['id_user']))
{
  header('location:prof.php');
}


 





include ('conxbd.php');
if(isset($_POST['cache']))
{
     $username              = $_POST['username'];
     $password              = $_POST['password'];

     $requette = mysql_query("SELECT * FROM user WHERE username = '$username'  AND password = '$password' ");

  if   (mysql_num_rows($requette) > 0) 
  
      {
        
         $_SESSION['role']=mysql_result($requette,0,'role');
         $_SESSION['id_user']=mysql_result($requette,0,'id');
         $_SESSION['username']=mysql_result($requette,0,'username');
         //echo ($role);
         switch ($_SESSION['role']) {
              
              case "E":
                   header("location:users/prof_dashboard.php");
                  break;
              case "A":
                  header("location:users/admin.php");
                  break;
             case "S":
                  header("location:users/sec_dashboard.php");
                  break;
          }
        
       }
   else
        $message="user not existe : ".$username;
      
 
    
    
    mysql_close($conn);  
}

  







?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
  

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="login.css"
    
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>LogIN</title>
</head>


<body>

    
    <div class="container"> 
       <form method="POST" action="" id="myform">
        <img src="./Group 22.png">


      <input id="user" type="text" name="username" placeholder="Username" autocomplete="off" required>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
      <input id="password" type="password" name="password" placeholder="password" autocomplete="off" required>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
              </svg>
      <input type="button" value="Log In" onclick="document.getElementById('myform').submit();"  >
      <input type="hidden" name="cache" value="cache">
<?
if(isset($message))
{
?>
    <p style="color: white;"><? echo $message; ?></p>
<?
}
?>
    </form>

       

  </div>

    
</body>
</html>



