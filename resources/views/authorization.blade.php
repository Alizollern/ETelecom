<DOCTYPE! HTML>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
		<title>ETELECOM</title>
		<link rel="stylesheet" href="css/style.css">
    </head>    
    <body>
<div class="container" id="container1">
	<div class="form-container sign-in-container" >
		<form action="index.php" method="POST">
            <a href="/Users/kadyrovkuanysh/Desktop/project.html" class="social" ><i class="far fa-angle-left" style="font-size: 40px ; margin-bottom: 40px;margin-right: 300px"></i></a>
			<h1>Sign in</h1>
			<span>log in using Login</span>
			<input type="login" name="login" placeholder="LOGIN" />
			<input type="password" name="password" placeholder="PASSWORD" />
			<a href="#">Forgot your password?</a>
			<input type="submit"></input>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1 class="header__logo">
    <a>
      <div class="mcard">
        <div class="mcard__part red">&#x2708</div>
        <div class="mcard__copy">
          <span class="js-letters" style="font-size: 40px">ETELECOM</span>
        </div>
      </div>
    </a>
  </h1>
                <p>Welcome to the future
                </p>
			</div>
		</div>
	</div>
</div>


    </body>
</html>
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'etelecom';
$connect = mysqli_connect($host,$user,$pass,$dbName) or die(mysqli_error($connect));
mysqli_query($connect,"SET NAMES 'utf8'");


$login = $password ="";
 if (empty($_POST["login"])){
	 echo "Name is required";
 }else{
	 $login = test_input($_POST["login"]);
 }
 if (empty($_POST["password"])){
	 echo "empty";
 }else{
	 $password = test_input($_POST["password"]);
 }
 $query = "SELECT * FROM EMPLOYEE WHERE login ='$login' AND password = '$password'";
 $result= mysqli_query($connect,$query) or die(mysqli_error($connect));

 while($users = mysqli_fetch_array($result)){
	//if(count($users) == 0){
	//echo "Такой пользователь не найден.";
	//exit();
	//}
  //else if(count($users) == 1){
	//echo "Логин или пароль введены неверно";
	//exit();
  //}
  if($users == null){
	  echo "Такой пользователь не найден.";
	  exit();
  }

	if($users['ROLE_ID'] == 1){
		header("location:html/admin.html");
		exit();
	}
	else if($users['ROLE_ID'] == 2){
		header("location:html/seler.html");
		exit();
	}
	else if($users['ROLE_ID'] == 3){
		header("location:html/admin.html");
		exit();
	}
header("location:html/welcome.html");
//setcookie('user', $users['login'], time() + 3600, "/");
 }
 $connect ->close();
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>