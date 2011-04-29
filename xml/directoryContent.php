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
		global $gl_starting_directory,$gl_file_types,$gl_cur_dir;
		$gl_cur_dir = $gl_starting_directory."".$dirPath;
		//set parent id to 0 for top level or dir path related to starting directory for others 
		echo "<rows>";
		
		//output level
		$dirContent = scandir($gl_starting_directory."".$dirPath);
		usort($dirContent, "cmp");
		foreach($dirContent as $file){
			if($file!=".." && $file!="."){
				echo "<row id='".$dirPath."/".$file."'>";
					if(is_file($gl_starting_directory."".$dirPath."/".$file)){
						$ext = substr(strrchr($file,"."),1);
						print("::".$ext."::");
						if(array_key_exists($ext,$gl_file_types)){
							$icon = $ext.".gif";
							$type = $gl_file_types[$ext];
						}else{
							$icon = "unknown.gif";
							$type = "Unknown File";
						}
						$size = filesize($gl_starting_directory."".$dirPath."/".$file);
					}else{
						$icon = "folder.gif";
						$size = "";
						$type = "File Folder";
					}
					$modif = date("Y-m-d H:i",filemtime($gl_starting_directory."".$dirPath."/".$file));
					
					echo "<cell>$icon</cell>";
					echo "<cell>$file</cell>";
					echo "<cell>$size</cell>";
					echo "<cell>$type</cell>";
					echo "<cell>$modif</cell>";
				echo "</row>";
			}
				
		}
		echo "</rows>";
	}
	
	
	
	echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n"); 
	outputDir($_GET["dir"]);
?>