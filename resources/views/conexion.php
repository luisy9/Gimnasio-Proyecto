<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar Conexion</title>
</head>

<body>
    <?php
    use Illuminate\Support\Facades\DB;
    $dbname = DB::connection()->getDatabaseName();
    echo $dbname;
    ?>
</body>

</html>