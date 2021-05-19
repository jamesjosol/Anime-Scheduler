<?php
session_start();
include "../db.php";

if(isset($_POST['add_manga'])) {
    $hasErr = false; // flag, error checker

    $name               = $_POST['name'];
    $current_chapter    = $_POST['current_chapter'];
    $release_date       = $_POST['release_date'];
    $release_type       = $_POST['release_type'];
    $url                = $_POST['url'];

    /** storing all session of users field info incase if there's error, 
     *  so that the user dont need to type/input again
     */
    $_SESSION['manga_info'] = [
        'name'              => $name,
        'current_chapter'   => $current_chapter,
        'release_date'      => $release_date,
        'release_type'      => $release_type,
        'url'               => $url
    ];

    if(!$hasErr) {
        $stm = $pdo->prepare("INSERT INTO manga (`name`, `current_chapter`, `release_date`, `release_type`, `url`)
        VALUES(:name, :current_chapter, :release_date, :release_type, :url)");

        $stm->execute([
            ':name'             =>  $name,
            ':current_chapter'  =>  $current_chapter,
            ':release_date'     =>  $release_date,
            ':release_type'     =>  $release_type,
            ':url'              =>  $url
        ]);
        
        $_SESSION['success_msg'] = "New Manga " . $name . " has been added.";
        unset($_SESSION['manga_info']);
        header("location: ./"); //GO BACK TO users INDEX
    }
}