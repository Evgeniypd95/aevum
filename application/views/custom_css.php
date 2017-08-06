<?php
    header("Content-type: text/css; charset: UTF-8");



$test = 50;



?>

.progressbar {
  border: solid 1px black;
  width: 100%;
  height: 25px;
  position: relative;
}

.progressbar2 {
  border: solid 0px ;
  background-color: green;
  width:<?= $test; ?>%;
  height: inherit;
  z-index: 10;
}