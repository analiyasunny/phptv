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
    //Connect to db 
    //$db=new PDO('mysql:host=127.0.0.1;dbname=comp1006','root','A+30012010sunny');
    $db=new PDO('mysql:host=172.31.22.43;dbname=Analiya200562203','Analiya200562203','rP_ywozYAv');
    //$db->setAttribute(PDO::ATTR_ERRMODE< PDO::ERRMODE_EXCEPTION);
    
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
    ?>
    </main>
    </body>
    </html>