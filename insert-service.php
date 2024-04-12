<?php 
include('shared/auth.php');
$title='Adding favorite sport';
include('shared/header.php'); 

//capture form inputs into vars
$name=$_POST['name'];
echo $name;
$ok=true;

//input validation before save
if(empty($name)){
    echo 'Name is required</br>';
    $ok=false;
}
if($ok==true){
    try {
    //Connect to db 
    include('shared/db.php');
    
    // set up SQL INSERT command 
    $sql="INSERT INTO services (name) VALUES (:name)";
    
    //link db connection w/SQL command we want to run
    $cmd = $db->prepare($sql);
    
    //map each input to a column in the show table 
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
    
    //execute the INSERT (Which saves to the db)
    $cmd->execute();
    //Disconnect
    $db = null;
    //show msg to user 
    echo 'Show saved';
}
catch (Exception $err) {
    header('location:error.php');
    exit();
}
    }
    ?>
    </main>
    </body>
    </html>