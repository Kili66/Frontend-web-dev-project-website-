<?php 
    $page_title = "Contact";
    // require("dependencies/head.php");


    if(isset($_POST['fullname']) &&  isset($_POST['email']) &&  isset($_POST['subject']) &&  isset($_POST['message']) ){
        require("admin/db/dbConnect.php");
        $fullname = $_POST['fullname'];
        $mail =  $_POST['email'];
        $subject =  $_POST['subject'];
        $message =  $_POST['message'];

        $q = $db->prepare("INSERT INTO messages SET fullname=:fullname, subject=:subject,message=:message, email=:email");
        $insert = $q->execute(array( 
             "fullname" =>$fullname,
             "email"=>$mail ,
             "subject"=>$subject,
             "message"=>$message
        ));
        if($insert){
          header("Location: contact.php?msg=1");
          exit;  
        }else{
            header("Location: contact.php?msg=2");
            exit;
        }

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
    
	<div class="about-me" >
		<h1>Join me on:</h1>
		<br> <br>
		<ul>
			<li><a href="mailto:mariamkilibech@gmail.com">mariamkilibech@gmail.com</a></li>
			<li>LinkedIN:<a href="https://www.linkedin.com/in/mariam-kili-bechir-867108203/">Mariam Kili Bechir</a></li>
			<li>Twitter:<a href="https://twitter.com/MariamKili">MariamKili</a></li>
			<li>Instagram: <a href="https://www.instagram.com/mariamkilibechir/">mariamkilibechir</a></li>
		</ul>
	</div>
    <div class="contact-wrapper">
        <div class="container mt-4">
            <div class="contact-container">
                <div class="contact-top-title">
                    Contact Form
                </div>
                <div class="contact-form">
                    <form action="contact.php" method="POST">
                                <div class="fullname-input">
                                    <input type="text" name="fullname" id="" placeholder="Name Surname" >
                                </div>
                                <div class="email-input">
                                    <input type="email" name="email" id="" placeholder="E-mail address">
                                </div>
                                <div class="subject-input">
                                    <input type="text" name="subject" id="" placeholder="your subject">
                                </div> 
                                <div class="message-input">
                                    <textarea name="message" id="" cols="60" rows="5" placeholder="your Mesaj"></textarea>
                                </div>
                                <div class="button-input">
                                    <button type="submit">Send form</button>
                                </div>  
                                
                                <!-- <?php   
                                    if(isset($_GET['msg'])){

                                        if($_GET['msg']==1){
                                            echo "<h6 style='color:blue'> <b>Mesajınız Gönderildi! </b> </h6>";
                                        }elseif($_GET['msg']==2){
                                            echo "<h6 style='color:red'> <b> Mesajınız Gönderilemedi! </b> </h6>";

                                        }
                                        

                                    }
                                ?> -->



                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>