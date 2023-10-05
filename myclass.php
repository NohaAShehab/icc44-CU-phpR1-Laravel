<?php


class Person{

}

$p= new Person();

var_dump($p);


function printInfo(Person $obj){
    var_dump($obj);
}


//printInfo("Noha");
printInfo($p);
