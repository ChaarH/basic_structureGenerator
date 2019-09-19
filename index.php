<?php

/*
*
* Run this example and check the directories "Controllers" and "Views" to
* verify that the files were created
*/

require "htmlGenerator.php";

$filesToCreate = ['users', 'clients', 'pacients'];

$form = new htmlGenerator($filesToCreate);