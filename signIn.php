<?php
    // require('dependencies/head.php');
    // require('dependencies/layoutSidenav.php');
    require('admin/db/dbConnect.php');

if( isset($_POST['name']) ){
    
    $password =  $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $username =  $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    // Girilen Şifreler Doğrumu? start
    if( $password !=$confirmPassword ){
        header("Location: signIn.php?msg=1");
        exit;
    }
    // Girilen Şifreler Doğrumu? end
    //Böyle bir kullanıcı varmı? start
    $q = $db->prepare("SELECT * FROM users WHERE username=:userName");
    $q->execute(array( 
        "userName" => $username
    ));
    $ctl= $q->rowCount();
    if($ctl){
        header("Location: signIn.php?msg=2");
        exit;
    }
    //Böyle bir kullanıcı varmı? end
    //Kullanıcı Kayıt Start
    $q= $db->prepare("INSERT INTO users SET 
                        username=:UserName, name=:Name ,surname=:Surname,  password=:Password");
    $insert = $q->execute(array(
        "UserName"=>$username,
        "Name"=>$name,
        "Surname"=>$surname,
        "Password"=>md5($password)
    ));

    if($insert){
        header("Location: signIn.php?msg=3");
        exit;
    }else{
        header("Location: signIn.php?msg=4");
        exit;
    }
    
    //Kullanıcı Kayıt End



}
?>   
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Mariam</title>
    <link rel="stylesheet" href="assets/Css/mycss.css">
    <link rel="stylesheet" href="assets/Css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/Css/flaticon/flaticon.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<header>
        <div class="container">
            <div class="header-wrapper mt-5">
                <div class="row header-align">
                    <div class="header-left col-md-6">
                       <a href="index.php">Home</a>
                    </div>
                    <div class="header-right col-md-6">
                        <ul>
                            <li>
                                <a href="aboutme.php">About-me</a>
                            </li>
                            <li>
                                <a href="contact.php"> Contact </a>
                            </li>
                            <li>
                                <a href="index.php"> Blog</a>
                            </li>
                            <li>
                                <button><a href="login.php">Login</a></button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- 
     -->
     <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        
                        <div class="card-body">
                            <form action="signIn.php" method="POST" >
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Name:</label>
                                            <input class="form-control py-4" name="name" id="inputFirstName" type="text" placeholder="name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Surname:</label>
                                            <input class="form-control py-4" name="surname" id="inputLastName" type="text" placeholder="Surname"  required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="username">Username</label>
                                    <input class="form-control py-4"  name="username"  id="username"  type="text" aria-describedby="emailHelp" placeholder="Username" required />
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">password:</label>
                                            <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Password" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">confirm password</label>
                                            <input class="form-control py-4" name="confirmPassword" id="inputConfirmPassword" type="password" placeholder="confirm password"  required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" >Register</button></div>
                                <?php   
                                                    if(isset($_GET['msg'])){

                                                        if($_GET['msg']==1){
                                                            echo "<h6 style='color:red'> <b> Girilen Şifreler Eşleşmiyor </b> </h6>";
                                                        }elseif($_GET['msg']==2){
                                                            echo "<h6 style='color:red'> <b> Zaten Böyle Bİr Kullanıcı Var! </b> </h6>";

                                                        }elseif($_GET['msg']==3){
                                                            echo "<h6 style='color:blue'> <b> Kayıt Başarılı! </b> </h6>";

                                                        }elseif($_GET['msg']==4){
                                                            echo "<h6 style='color:red'> <b> Kayıt Başarısız! </b> </h6>";

                                                        }
                                                        

                                                    }?> 
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-wrapper">
        <div class="container">
            <div class="footer-social-links">
                <ul>
                    <li>
                        <a href="https://www.facebook.com" target="_blanket"> <i class="flaticon-facebook"></i> </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com" target="_blanket"><i class="flaticon-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com" target="_blanket"><i class="flaticon-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com" target="_blanket"><i class="flaticon-youtube"></i></a>
                    </li>
                </ul>
            </div>
            </div>
            <div class="container-fluid mt-5">
                <div class="text-center">
                    Copyright &copy; 2021. Mariam Kili Bechir
                </div>
            </div>
        </div>
    </footer>
</body>
</html>