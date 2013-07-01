<?php

/*

I replace the original file found in C:\xampp\htdocs to this one.
I don't really like the redirect to the /xampp directory; I want to see MY projects.
This code is easy to add extra directories.  
I have just included the two that I use XAMPP with.

*/

function getFolders($target_folder) {
	$root_folder = $target_folder;
	$list_dir = '';
	$folder_dir = "\n";
	//Directory list
	if(!$open = @opendir($root_folder))
	   die('The directory is not valid!');

	while(($namearq = readdir($open)) !== false) {

	   if($namearq == "." or $namearq == "..") continue;
	   
	   $dir = $root_folder . "/" . $namearq;
	   
	   if(is_dir($dir)){
		  $folder_dir .= "\t\t\t\t<li><img src=\"folder.png\" width=\"18\" height=\"15\" alt=\"\"><a href=\"/$namearq\" target=\"top\">$namearq<br></a></li>\n";
	   } 
	}
	return $folder_dir;
}

$list_github_folders = getFolders('C:/Users/steveo/Documents/GitHub');
$list_htdocs_folders = getFolders('C:/xampp/htdocs');

echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<title>XAMPP PROJECT DIRECTORIES</title>
		<style>
		.directory {
			width: 50%; 
			float: left;
			height: auto;
		}
		</style>
	</head>
	<body>
		<div class="directory">
			<h1>Localhost:</h1>
			<ul>
				$list_htdocs_folders
			</ul>
		</div>
		<div class="directory">
			<h1>Github:</h1>
			<ul>
				$list_github_folders
			</ul>
		</div>

	</body>
</html>
EOT;
?>