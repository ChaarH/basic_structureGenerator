<?php

/*
*
* Run this example and check the directories "Controllers" and "Views" to
* verify that the files were created
*/

require "basic_structureGenerator.php";

$filesToCreate = ['users', 'clients', 'pacients'];

$form = new basic_structureGenerator($filesToCreate);