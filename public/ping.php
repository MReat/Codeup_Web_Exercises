<?php
var_dump($_GET);


function pageController()
{
$data = [];

$data['counter'] = 0;

if(isset($_GET['direction'])){
    if ($_GET['direction'] == 'ping'){
        $_GET['count']++;
        $data['counter'] = $_GET['count'];
    } else if ($_GET['direction'] == 'pong'){
        $data['counter'] = "Game Over";
    }
}
return $data;    
}
extract(pageController());

?>

<!doctype html>
<html>
    <head>
        <title>Ping</title>
    </head>
    <body>
        <h1>PING</h1>
            <h2><?= $counter ?></h2>
        
        <a href="pong.php?direction=ping&count=<?= $counter ?>">HIT</a>
        <a href="?direction=pong&count=<?= $counter ?>">MISS</a>

    </body>
</html>