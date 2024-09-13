<?php

function autocargar_controllers($classname){
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('autocargar_controllers');