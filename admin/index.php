<?php
    require('dependencies/head.php');
    require('dependencies/layoutSidenav.php');
?>        
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Welcome <?=  $_SESSION['name'] ?> </h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sosyal Medya</li>
                        </ol> -->
                         <img src="img/web.jpg" width="400" height="300" style="margin-left: 270px;"/>
                         <br> <br>
                         <p>Cybersecurity is the practice of protecting systems, networks, and programs
                        from digital attacks. These cyberattacks are usually aimed at accessing, changing, 
                        or destroying sensitive information; extorting money from users; or interrupting normal
                         business processes. Implementing effective cybersecurity measures is particularly challenging
                          today because there are more devices than people, and attackers are becoming more innovative</p>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">About me</li>
                        </ol> -->
            
                            
                            </div>
                        </div>
                    </div>
                </main>

 <?php
    require('dependencies/footer.php');
?>
