<?php

/*
* 
* @author  Carlos Aires <carlos.wecode@gmail.com>
* @version 1.0 - 2019
* 
*/

/*
*
* @ Directories should be modified as needed.
* 
*/

class basic_structureGenerator {

	private $files = [];
	private $sizeArray;

	public function __construct(Array $arrayName)
	{
		$this->files     = $arrayName;
		$this->sizeArray = count($arrayName);
		
		self::createFolders();
		self::createControllers($this->files, $this->sizeArray);
		self::createCRUD($this->files, $this->sizeArray);
	}

	private function createFolders()
	{
		if (!file_exists("Controllers")) {
			mkdir("Controllers");
		}

		if (!file_exists("Views")) {
			mkdir("Views");
		}	
	}

	private function createControllers(Array $arrayName, $sizeArray)
	{
		for ($i=0; $i < $sizeArray; $i++) { 

			$content = "<?php"
					 . PHP_EOL
					 . "class ".$arrayName[$i]."Controller {}";

			$nameFile   = $arrayName[$i]."Controller.php";

			$file       = fopen($nameFile, "w");
			$fileCreate = fwrite($file, $content);
			fclose($file);

			$origin     = $nameFile;
			$destiny    = "Controllers/".$nameFile;

			copy($origin, $destiny);
			unlink(realpath($nameFile));

		}
		echo "Controllers gerados!<br>";
	}

	public function createCRUD(Array $arrayName, $sizeArray)
	{
		$filesToCreate     = ["add_","list_","edit_","delete_"];
		$sizeFilesToCreate = count($filesToCreate);

		for ($i=0; $i < $sizeArray; $i++) { 

			for ($j=0; $j < $sizeFilesToCreate; $j++) { 

				$newFile = $filesToCreate[$j].$arrayName[$i].".php";
				$content = "<title>" . $filesToCreate[$j].$arrayName[$i] . "</title>";

				$file       = fopen($newFile, "w");
				$fileCreate = fwrite($file, $content);
				fclose($file);

				$origin     = $newFile;
				$destiny    = "Views/".$newFile;

				copy($origin, $destiny);
				unlink(realpath($newFile));
			}

		}
		echo "CRUD's gerados!<br>";
	}
}