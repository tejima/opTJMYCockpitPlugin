<?php

include(dirname(__FILE__).'/../bootstrap/Doctrine.php');
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test();

//$t->todo("do test");
$count = Cockpit::getOP3SetupCount();
$t->ok($count > 7273);


$t->is(Cockpit::OP32Cell(),true);


