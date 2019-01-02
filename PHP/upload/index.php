<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" /> <br>
        <input type="submit"/>
    </form>

    <!--

        -- application/x-www-form-urlencoded --- Default. All characters are encoded before sent (spaces are converted to "+" symbols, and special characters are converted to ASCII HEX values)
        
        -- multipart/form-data ---	No characters are encoded. This value is required when you are using forms that have a file upload control
        
        -- text/plain ---	Spaces are converted to "+" symbols, but no special characters are encoded

    -->

</body>
</html>