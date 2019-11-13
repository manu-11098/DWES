<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
        $array = [rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400),rand(1,400)];

        foreach ($array as $key => $value) {
            echo "$value ";
        }

    ?>
    
</body>
</html>