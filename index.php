<?php 

$page_title = "Main Page";
// require("dependencies/head.php");
require("admin/db/dbConnect.php");

$q = $db->prepare("SELECT * FROM articles");
$q->execute();

$articles = $q->fetchAll(PDO::FETCH_ASSOC);

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
    <div class="container-fluid ">
        <div class="home-banner-wrapper">
            <!-- <div class="row"> -->
                <div class="home-banner-img">
                    <img src="assets/img/secure.jpg"> 
                </div>
                <div class="home-banner-text ">
                    <div class="home-text-container">
                        <h1>Hi...! I'm Mariam Kili</h1><br>
                        <h4 style="text-align: center;">Cyber security Researcher and Front end Web Developer</h4> <br>
                        <div class="home-text">
                           << Study is the surest anti-poison for grief, and that anti-poison is always within our reach. In fact, there will always remain for the man most deprived of all means of education, the resource of studying himself, and of studying man in himself: the field is immense; in vain would one say that it was harvested by many others; they did not take away our right to harvest there too.>> Citation de Stanislas de Boufflers ; Le traité sur le libre arbitre (1808)
                        </div>
                        <br> 
                <!--     </div> -->
                       <div class="container-fluid">
                       <?php  foreach ($articles as $article ) {   ?>
                        <div class="row myarticles">
                            
                        
                     
                            <h2>  <?php echo $article['tittle']; ?></h2>
                            <br> <br>
                            <div class="image-wrapper col-md-6">
                                <!-- <img src="assets/img/cybersecurity.jpg">
                             -->
                             <img src="<?php echo $article['img_url']; ?>" alt="" srcset="" style="width: 400px;">
                            
                            </div>
                            <div class="home-banner-text col-md-6">
                            <p>
                           <?php echo $article['description']; ?> <a href="signIn.html">Sign In to see more information</a></p>
                            </div>
                             <button><a href="signIn.php" style="color:white;">SIGN IN</a></button>
                        </div>
                        <?php }  ?>
                           
                       </div>

                </div>
            </div>

        </div>
    </div>
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