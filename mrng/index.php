<?php

require_once 'Computer.php';
// 3.
$my_computer = new Computer;

$my_computer->model = 'acer aspire 30';
$my_computer->operating_system = 'windows 11';
$my_computer->is_portable =  true;
$my_computer->status = ' on';


var_dump(computer :: $nr_of_computers );

var_dump(computer :: $nr_of_computers);

var_dump(computer :: $nr_of_computers);

$my_computer->switchoff();
$my_computer->togggleswitch();
$my_computer->togggleswitch();
$my_computer->togggleswitch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 5 -->
<h1>My computer</h1>
<table>
    <tr><th>Model:</th><td><?= $my_computer->model ?> </td></tr>
    <tr><th>OS:</th><td><?= $my_computer->operating_system  ?></td></tr>
    <tr><th>Portable:</th><td><?= $my_computer->is_portable  ?></td></tr>
    <tr><th>Status:</th><td> <?= $my_computer->status  ?></td></tr>
</table>
    
</body>
</html>