<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
    html,body{
        height: 100%;
    }
    body{
        margin: 0;
        padding: 0;
        width: 100%;
        color: white;
        display: table;
        font-family: 'Roboto';
        background-image: url('https://picsum.photos/500/500?image=1048');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .container{
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }
    .content{
        text-align: center;
        display: inline-block;
    }
    .title{
        font-size: 72px;
        margin-bottom: 40px;
        color: black;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="title">{{$error}}</div>
        </div>
    </div>
</body>
</html>