<?php
require_once '../Input.php';

function pageController()
{
    $data = [];

    $data['counter'] = 0;

    if(Input::has('direction')){
        if (Input::get('direction') == 'ping'){
            $count = Input::get('count');
            $count++;
            $data['counter'] = $count;
        } else if (Input::get('direction') == 'pong'){
            $data['counter'] = 0;
            echo "Game Over";
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
    <link rel="stylesheet" type="text/css" href="/css/pingpong.css">
</head>
<body>
    <div class="container">
        <h1>PING</h1>
        <h2><?= $counter ?></h2>
        
        <a href="pong.php?direction=ping&count=<?= $counter ?>">HIT</a>
        <a href="?direction=pong&count=<?= $counter ?>">MISS</a>
    </div>

</body>
</html>