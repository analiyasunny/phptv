<?php 
$title='Saving a new show';
include('shared/header.php'); 

//capture form inputs into vars
$name=$_POST['name'];
echo $name;
$releaseYear=$_POST['releaseYear'];
$genre=$_POST['genre'];
$service=$_POST['service'];
$ok=true;

//input validation before save
if(empty($name)){
    echo 'Name is required</br>';
    $ok=false;
}
if(empty($releaseYear)){
    echo 'Releseyear is required</br>';
    $ok=false;
}
else {
    if (is_numeric($releaseYear)) {
        if ($releaseYear < 1970) {
            echo 'Release Year must be later than 1969';
            $ok = false;
        }
    }
    else {
        echo 'Release Year must be a number > 1969';
        $ok = false;
    }
}
if(empty($genre)){
    echo 'required</br>';
    $ok=false;
}
if(empty($service)){
    echo 'service required</br>';
    $ok=false;
}

if($ok==true){
//Connect to db 
//$db=new PDO('mysql:host=127.0.0.1;dbname=comp1006','root','A+30012010sunny');
$db=new PDO('mysql:host=172.31.22.43;dbname=Analiya200562203','Analiya200562203','rP_ywozYAv');
//$db->setAttribute(PDO::ATTR_ERRMODE< PDO::ERRMODE_EXCEPTION);

//Never inject variables directly into SQL vurnal

// set up SQL INSERT command 
$sql="INSERT INTO shows (name, releaseYear, genre, service) VALUES (:name, :releaseYear, :genre, :service)";

//link db connection w/SQL command we want to run
$cmd = $db->prepare($sql);

//map each input to a column in the show table 
$cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
$cmd->bindParam(':releaseYear', $releaseYear, PDO::PARAM_INT);
$cmd->bindParam(':genre', $genre, PDO::PARAM_STR, 20);
$cmd->bindParam(':service', $service, PDO::PARAM_STR, 100);

//execute the INSERT (Which saves to the db)
$cmd->execute();
//Disconnect
$db = null;
//show msg to user 
echo 'Show saved';
}
?>
</body>
</html>