<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.dis_img{
			width: 40%;
			height: 40%;
			margin-left: 20%; 
			border: 1px solid black;
		}
		.dis_video{
			width: 40%;
			height: 40%;
			border: 1px solid black;
		}
		body{
			color: brown;
			font-size:20px;
		}
		.delete{
			color:brown;
			font-size:20px;
		}
	</style>
</head>
<body>

</body>
</html>
<?php

$dir_path="images/";
$img_expensions= array("jpeg","jpg","png","gif");
$vid_expensions=array("mp4","3gp","mov","mpeg","avi");
$c=1;
echo "<a href='index.php'>Add more files</a><br><hr>";
if(is_dir($dir_path))
{
	$files=scandir($dir_path);$a=count($files);

	for($i=0;$i<count($files);$i++)
	{	
		if($files[$i]!='.' && $files[$i]!='..')
		{
			 $file_ext = pathinfo($files[$i], PATHINFO_EXTENSION);
			echo "<div class='display_img'>
				($c)<br>
				File Name: $files[$i] <br><br>
				File extension : $file_ext<br><br>
				


			</div>"; $c++;
		if(in_array($file_ext, $img_expensions))
		{
			echo"<img src='$dir_path$files[$i]' class='dis_img'><br><br>";  

		}

		if(in_array($file_ext, $vid_expensions))
		{
			
			echo"<video controls class='dis_vid'>
			<source src='$dir_path$files[$i]' type='video/mp4'>
			</video><br><br>";  

		}
		echo " <form method='post' action='	'>
		<input type='hidden' name='name' value='$files[$i]'>
		<input type='submit' name='delete_file' value='Delete This File' class='delete'> <hr><br></form>";
		}

	}
}
if(isset($_POST['delete_file']))
{
	$name=$_POST['name'];
	if(unlink($dir_path.''.$name))
	header('location: display.php');
}

$fi = new FilesystemIterator($dir_path, FilesystemIterator::SKIP_DOTS);
if(iterator_count($fi)==0){
	echo "No files to display.Add some";
	echo "<br><br><a href='index.php'>Go to main page</a>";
}

?>
