<?php
    require('dependencies/head.php');
    require('dependencies/layoutSidenav.php');
    require('db/dbConnect.php');


    if( isset($_POST['title']) && isset($_POST['description']) ){
        // DOSYA YÜKLEME START
        $tmpName= $_FILES['image']['tmp_name'];

        $fileName= $_FILES['image']['name'];
        
        $fileType =  pathinfo($fileName)['extension'];
        $types= array('png','jpeg','jpg');
        
        if( ! in_array(strtolower($fileType) , $types )   ){
            header("Location: articleAdd.php?msg=1");
            exit;
        }
        date_default_timezone_set('Europe/Istanbul');
        $fileName = md5(date('d.m.y H:i:s')).".".$fileType ;
        $uploadFile="../cdn/".$fileName;
        $uploadDbUrl = "cdn/".$fileName;
        @move_uploaded_file( $tmpName ,$uploadFile );
        // DOSYA YÜKLEME END
        // DATABASE KAYIT START
        session_start();

        $title = $_POST['title'];
        $description = $_POST['description'];
        $img_url = $uploadDbUrl;
        $date =  date('d.m.y');
        $user_id = $_SESSION['user_id'];

        $q= $db->prepare("INSERT INTO articles SET tittle=:tittle, 
                            description=:description, date=:date, user_id=:user_id, img_url=:img_url ");
        $insert = $q->execute(array(  
            "tittle"=>$title,
            "description"=>$description,
            "date"=>$date,
            "user_id"=>$user_id,
            "img_url"=>$img_url
          ));

        if ($insert) {
            header("Location: articleAdd.php?msg=2");
            exit;
        }else {
            header("Location: articleAdd.php?msg=3");
            exit;
        }



        // DATABASE KAYIT END


    }   

?>        

<script src="ckeditor/ckeditor.js"></script>
<style>
.ck-editor__editable {min-height: 200px;}
</style>
                <main>
                    <div class="container-fluid">
                      <h1 class="mt-4">Yazı Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Yazı Ekle</li>
                        
                        <?php   
                                                    if(isset($_GET['msg'])){

                                                        if($_GET['msg']==1){
                                                            echo "<li><h6 style='color:red'> <b> DOSYA UZANTISI HATALI!! </b> </h6> </li>";
                                                        }
                                                        elseif ($_GET['msg']==2){
                                                            echo "<li><h6 style='color:green'> <b> YAZI KAYIT EDİLDİ VE YAYINLANDI! </b> </h6> </li>";
                                                        }elseif ($_GET['msg']==3){
                                                            echo "<li><h6 style='color:RED'> <b> ! YAZI KAYIT EDİLEMEDİ! </b> </h6> </li>";
                                                        }
                                                    }
                            ?>  
                      
                        </ol>

                        <form action="articleAdd.php" method="post" enctype="multipart/form-data" >

                        <label for="title"><b> Yazı Başlığı :</b> </label>
                        <input class="form-control py-4" type="text" name="title" id="title">

                        <label for="editor"><b> Yazı İçerik :</b> </label><br>
                        <textarea name="description" id="editor"  ></textarea>

                        <label for="image" >  <b> Yazı Resmi :</b></label>
                        <input type="file" name="image" id="image" class="form-control-file"> <br>
                        <button class="btn btn-primary mt-2" >Kayıt Et</button>
                        </form>
                                        
                            </div>
                        </div>
                    </div>
                </main>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


 <?php
    require('dependencies/footer.php');
?>
