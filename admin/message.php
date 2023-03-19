<?php
    require('dependencies/head.php');
    require('dependencies/layoutSidenav.php');
    require('db/dbConnect.php');

    $q = $db->prepare("SELECT * FROM messages ORDER BY id DESC");
    $q->execute();

    $messages= $q->fetchAll(PDO::FETCH_ASSOC);

?> 
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">MESSAGES</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                            <li class="breadcrumb-item active">My messages</li>
                        </ol>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                MESSAGES
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name& Surname</th>
                                                <th>Email address</th>
                                                <th>Message</th>
                                                <th>Message</th>
                                             
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                            <?php
                                                    foreach ($messages as $message) {
                                                        
                                                        echo "<tr>";
                                                        echo "<td>".$message['id']."</td>";
                                                        echo "<td>".$message['fullname']."</td>";
                                                        echo "<td>".$message['email']."</td>";
                                                        echo "<td>".$message['subject']."</td>";
                                                        echo "<td>".$message['message']."</td>";
                                                        echo "</tr>";
                                                    }

                                            ?>
                                         
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php require('dependencies/footer.php'); ?>