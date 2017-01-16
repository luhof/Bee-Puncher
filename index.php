<?php

require "classes/bee.php";
require "classes/DroneBee.php";
require "classes/QueenBee.php";
require "classes/WorkerBee.php";

echo "<h1>Bees !</h1>";

$bees = [];

$bees = $_POST['bees'];

/*array_push($bees, new QueenBee());
for($i = 0; $i<5; $i++){
  array_push($bees, new WorkerBee());
}

for($i = 0; $i<8; $i++){
  array_push($bees, new DroneBee());
}*/

foreach ($bees as $bee) {
  echo $bee->getHp()."<br/>";
}

$_POST['bees'] = $bees;

 ?>

 <form action="index.php" method="post">

 </form>
