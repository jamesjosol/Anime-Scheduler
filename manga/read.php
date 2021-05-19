<?php

include "../db.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $st = $pdo->prepare("SELECT * FROM manga WHERE id=:id");
    $st->execute([':id' => $id]);
    $manga = $st->fetch();

    
        $current_chapter = $manga->current_chapter;
        $release_date = $manga->release_date;

        $current_chapter += 1;
        if($manga->release_type == "Weekly") $newDate = date("Y-m-d" , strtotime($release_date."+ 7 days"));
        else if($manga->release_type == "Monthly") $newDate = date("Y-m-d" , strtotime($release_date."+ 1 months"));
        
        //die(date('F d (l)', strtotime($newDate)));
        

        $stm = $pdo->prepare("UPDATE manga SET 
        `current_chapter`  =   :current_chapter,
        `release_date`     =   :release_date
        WHERE id           =   :id");

        $stm->execute([
            ':current_chapter'     =>  $current_chapter,
            ':release_date'        =>  $newDate,
            ':id'                  => $id
        ]);

        header("location: $manga->url");
    

}