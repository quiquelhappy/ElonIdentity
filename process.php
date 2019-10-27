<?php

include_once("person.php");
include_once("random.php");
include_once("vendor/autoload.php");

$randomInstance = new RandomElon(17, 20);
$count = count($randomInstance->jsonstr);
for ($i = 13; $i < $count; $i++) {
    sleep(10);
    $persons = $randomInstance->getFromIndex($i);
    foreach ($persons as $key => $person) {
        try {
            $person->shareTweet();
            sleep(5);
        } catch (\Throwable $th) {
            print($th->getMessage());
        }
    }
}
