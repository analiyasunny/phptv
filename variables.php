<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>
    <h1>Experimenting with php variables</h1>
    <?php
    // number vars
    $x=20;
    $y=10;
    $z=$x+$y;
    echo $z.'<br />';

    //string vars
    $firstname='Some';
    $lastname='Person';
    echo '<p>Welcome'. $firstname . '' .$lastname;
    echo "<p>Welcome $firstname $lastname</p>";
    ?>
    </main>
</body>
</html>