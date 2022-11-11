<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,600;1,300&display=swap');
        html,body{
            margin:0;
            padding:0;
        }
        h1{
            text-transform: capitalize;
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin:0;

        }
        span{
            font-size:1.1em;
            margin:10px 0px;
            font-weight:bold;
        }
        div#section {
            padding-right:8px;
            padding-left:8px;
            width:95%;
        }
        #div {
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
            padding:10px;
            max-width:600px;
            width:100%;
            margin:20px auto;
            background:aquamarine;
            color:black;
            border-radius:10px;
            display:flex;
            flex-direction: column;
        }
        .clear-right {
            clear:right;
        }
        h3,p {
            margin:10px 0px;
        }
        h3 {
            font-style:italic;
        }
        p {
            font-size:1.0em;
            text-align: justify;
            font-weight:200;
        }
    </style>
</head>
<body>
    <div id="section">
        <div id="div">
            <h1> {{$firstname}} {{$lastname}}  </h1>
            <span>{{$phoneNumber}}</span>
            <h3>{{$email}}</h3>
            
            <p><strong>Message: </strong>{{$body}}</p>
        </div>
    </div>
</body>
</html>