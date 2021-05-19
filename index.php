<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/darkstyle.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Anime Scheduler</title>
    <style>
        .button_{   
            border: none;
            padding: 14px 20px;
            transition: all 0.4s ease 0s;
            text: center;
            background-color: rgba(0, 0, 0, 0.2) !important;
        }

        .button_:hover{
            background-color: rgba(0, 0, 0, 0.5) !important;
            
            text-shadow: 0px 0px 8px rgb(255, 255, 255);
            -webkit-box-shadow: 0px 5px 40px -10px rgba(255,255,255,0.10);
            -moz-box-shadow: 0px 5px 40px -10px rgba(255,255,255,0.10);
            transition: all 0.4s ease 0s;
            
        }
        
        .clearfix a{
            text-decoration:none;
        }
    </style>
</head>
<body class="dark">
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card card-dark" style="margin-top: 40%; border-radius:0 !important">
                    <div class="card-header text-center">
                        <h4>Anime Scheduler</h4>
                    </div>
                    <div class="card-body clearfix text-center">
                        <table>
                            <tr><a href="./anime" class="button_ btn-info btn-block">Anime</a></tr>
                            <tr><a href="./manga" class="button_ btn-info btn-block">Manga</a></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>