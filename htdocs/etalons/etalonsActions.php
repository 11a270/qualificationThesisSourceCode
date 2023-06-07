<?php
$mysql = new mysqli('localhost', 'root', '', 'etalons');
function edit() {
    echo "no edit... yet";
}
function top() {
    echo "wait paitiently for that functionality...";
}
function block() {
    echo "CONGRATS!!! YOU'VE BLOCKED THAT eTalons!!!";
}
function remove($sql, $id) {
    $query = "DELETE FROM `useraccount` WHERE `serialN` = '$id'";
    $result = mysqli_query($sql, $query);
    echo "as it never been there";
}
if(array_key_exists('button1', $_POST)) {
    remove($mysql, $row['serialN']);
}
/*else if(array_key_exists('button2', $_POST)) {
    button2();
}*/



?>