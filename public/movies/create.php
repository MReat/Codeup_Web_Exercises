
<?php 
session_start();
if(!empty($_POST['title']) && !empty($_POST['description'])) {
   $title = ($_POST['title']);
   $description = ($_POST['description']);
} else {
    echo "Please Enter Movie Title and Description";
}






?>

<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
    <style>
    body {

        font-family: Verdana;
        font-size: 1.5em;
        background-color: #FAF0F5;
    }

    p {
        font-weight: bolder;
    }

    .container {
        margin: auto;
        border: double black 5px;
        padding: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>MOVIE INFORMATION</h1>
        <form method="POST" action="/movies/show.php">
            <label>Movie Title</label>
            <input type="text" name="title"><br>
            <label>Movie Description</label>
            <textarea type="text" name="description"></textarea>
            <input type="submit">
        </form>
    </div>
</body>
</html>

