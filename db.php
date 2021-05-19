
<style>
    .button_{   
        border: none;
        padding: 14px 20px;
        transition: all 0.4s ease 0s;
    }

    .button_:disabled{
        opacity: 65%;
    }

    .button_:disabled:hover{
        text-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
    }

    .button_:hover{
        text-shadow: 0px 0px 8px rgb(255, 255, 255);
        -webkit-box-shadow: 0px 5px 40px -10px rgba(255,255,255,0.10);
        -moz-box-shadow: 0px 5px 40px -10px rgba(255,255,255,0.10);
        transition: all 0.4s ease 0s;
    }

    .cancelbtn, .deletebtn, .updatebtn {
        float: left;
        width: 50%;
        margin-top: 5%;
    }
    

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .modal-content{
        -webkit-border-radius: 0px !important;
        -moz-border-radius: 0px !important;
        border-radius: 0px !important; 
    }

    .modal-body, .modal-header, .modal-footer{
        -webkit-border-radius: 0px !important;
        -moz-border-radius: 0px !important;
        border-radius: 0px !important; 
        width: 99.9%;
    }

    .has-error input {
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(255, 0, 0, 1) !important;
        padding: 3px 0px 3px 3px;
        border: 1px solid rgba(255, 0, 0, 1) !important;
    }

    .sel-err {
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(255, 0, 0, 1) !important;
        padding: 3px 0px 3px 3px;
        border: 1px solid rgba(255, 0, 0, 1) !important;
    }
    
    

    
</style>
<?php
try {

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "schedulerdb";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_OBJ
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

}catch(PDOException $ex) {
    include "_err_msg.php";
    die();
}
