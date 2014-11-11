<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', 'getIp');
$app->get('(/:computer)', 'getIp');

function getIp($computer = 1) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d G:i:s");
    if($computer == 1){
        header('Content-Type: application/json');
        echo json_encode($ip);
    } else {
        $sql = "INSERT INTO findme (ip,computer,check_in) VALUES (:ip,:computer,:check_in)";
        $db = getConnection();
        $count = checkDuplicate($computer, $ip);
        if($count == 0){
          $stmt = $db->prepare($sql);
          $stmt->bindParam("ip", $ip);
          $stmt->bindParam("computer",$computer);
          $stmt->bindParam("check_in",$date);
          $stmt->execute();
          header("Content-Type: application/json");
          echo json_encode(array('title'=>'Success'));
        } else {
          header('Content-Type: application/json');
          echo json_encode($ip);
        }
    }
}


$app->run();

function checkDuplicate($computer,$ip) {
  $sqlCheck = "SELECT COUNT(*) FROM findme WHERE ip='$ip' AND computer='$computer'";
  $dbh = getConnection();
  $stmt = $dbh->query($sqlCheck);

  return $stmt->fetchColumn();
}

function getConnection() {
    $dbhost="localhost";
    $dbuser="user";
    $dbpass="password";
    $dbname="checkin";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
