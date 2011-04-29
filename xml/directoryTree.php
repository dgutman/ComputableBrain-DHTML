<?php 
	require_once("../config.php");
	if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) { 
		header("Content-type: application/xhtml+xml"); 
	} else { 
		header("Content-type: text/xml"); 
	} 
	
	$gl_cur_dir = "";
	
	function cmp($a, $b){
		global $gl_cur_dir;
		if (is_dir($gl_cur_dir."/".$a) && is_file($gl_cur_dir."/".$b))
			return -1;
		else if(is_file($gl_cur_dir."/".$a) && is_dir($gl_cur_dir."/".$b))
			return 1;
		else 
			return 0;
	}
	
	function outputDir($dirPath){
		global $gl_starting_directory;
		//set parent id to 0 for top level or dir path related to starting directory for others 
		if($dirPath=="")
			echo "<tree id='0'>";
		else
			echo "<tree id='$dirPath'>";
		
		//output level
		$dirContent = scandir($gl_starting_directory."".$dirPath);
		foreach($dirContent as $file){
			if($file!=".." && $file!="." && is_dir($gl_starting_directory."".$dirPath."/".$file)){
				$children = hasDirsInside($gl_starting_directory."".$dirPath."/".$file)?1:0;
				echo "<item id='".$dirPath."/".$file."' text='".$file."' child='".$children."' im0='folderClosed.gif' im1='folderOpen.gif' im2='folderClosed.gif'/>";
			}
				
		}
		echo "</tree>";
	}
	
	function hasDirsInside($dir){
		global $gl_cur_dir;
		$gl_cur_dir = $dir;
		$dirContent = scandir($dir);
		usort($dirContent, "cmp");
		foreach($dirContent as $file){
			if($file!=".." && $file!="." && is_dir($dir."/".$file))
				return true;
			else if($file!=".." && $file!="." && is_file($dir."/".$file))
				return false;
		}
	}
	
	echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n"); 
?>

<?php
	if(!isset($_GET["id"])){
		outputDir("");
	}else{
		outputDir($_GET["id"]);
	}
?>