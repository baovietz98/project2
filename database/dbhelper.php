<?php
require_once('config.php');
// insert , update , delete , select
// SQL: insert , update , delete
function excute($sql){
    //open connection
    $conn = mysqli_connect(HOST, DATABASE, USERNAME, PASSWORD);
    mysqli_set_charset($conn, 'utf8');
    //query
    mysqli_query($conn, $sql);
    //close connection
    mysqli_close($conn);
}
//SQL: select -> lay du lieu dau ra
function excuteResult($sql){
    $data = [];
    //open connection
    $conn = mysqli_connect(HOST, DATABASE, USERNAME, PASSWORD);
    mysqli_set_charset($conn, 'utf8');
    //query
    $resultset = mysqli_query($conn, $sql);
    while(($row = mysqli_fetch_array($resultset,1)) != null){
        $data[] = $row;
    }
    //close connection
    mysqli_close($conn);
    return $data;
}