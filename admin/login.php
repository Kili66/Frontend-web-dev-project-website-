<?php
session_start();
 if( isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}



if(isset($_POST['username']) && isset($_POST['password'])  ){
    require('db/dbConnect.php');
    $q = $db->prepare("SELECT * FROM users WHERE username=:user AND password=:pass");
    $q->execute(array(
        'user'=> $_POST['username'],
        'pass'=>md5($_POST['password'])
    ));

   
    $ctl= $q->rowCount();
    if($ctl){
        $user=$q->fetch();
        
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        header("Location: index.php");
        exit;
    }else{

        header("Location: login.php?msg=2");
        exit;
    }

   
 
}



?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Access</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                                <div class="form-group">
                                                    
                                                    <?php   
                                                    if(isset($_GET['msg'])){

                                                        if($_GET['msg']==1){
                                                            echo "<h6 style='color:red'> <b> Please login! </b> </h6>";
                                                        }
                                                        elseif($_GET['msg']==2){
                                                            echo "<h6 style='color:red'> <b> Wrong password or username! </b> </h6>";
                                                        }

                                                    }?>         
                                                
                                                    <label class="small mb-1" for="inputEmailAddress">Username : </label>
                                                    <input class="form-control py-4" name="username" id="inputEmailAddress" type="text" placeholder="username" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password: </label>
                                                    <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="password" />
                                                </div>
                                                <div class="form-group">
                                        
                                                </div>
                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                    <button class="btn btn-primary">Login</button>
                                                </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
