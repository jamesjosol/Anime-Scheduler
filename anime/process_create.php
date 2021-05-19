<?php
session_start();
include "../db.php";

if(isset($_POST['add_anime'])) {
    $hasErr = false; // flag, error checker

    $name               = $_POST['name'];
    $current_episode    = $_POST['current_episode'];
    $episodes           = $_POST['episodes'];
    $release_date       = $_POST['release_date'];
    $release_type       = $_POST['release_type'];
    $url                = $_POST['url'];

    /** storing all session of users field info incase if there's error, 
     *  so that the user dont need to type/input again
     */
    $_SESSION['anime_info'] = [
        'name'              => $name,
        'current_episode'   => $current_episode,
        'episodes'          => $episodes,
        'release_date'      => $release_date,
        'release_type'      => $release_type,
        'url'               => $url
    ];

    if(!$hasErr) {
        $stm = $pdo->prepare("INSERT INTO animes (`name`, `current_episode`, `episodes`, `release_date`, `release_type`, `url`)
        VALUES(:name, :current_episode, :episodes, :release_date, :release_type, :url)");

        $stm->execute([
            ':name'             =>  $name,
            ':current_episode'  =>  $current_episode,
            ':episodes'         =>  $episodes,
            ':release_date'     =>  $release_date,
            ':release_type'     =>  $release_type,
            ':url'              =>  $url
        ]);
        
        $_SESSION['success_msg'] = "New Anime " . $name . " has been added.";
        unset($_SESSION['anime_info']);
        header("location: ./"); //GO BACK TO users INDEX
    }
}