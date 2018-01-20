<?php
include_once("connection.php");
if($_REQUEST['submit'] !='')
{
 $number = $_POST['number'];
 $file = $_FILES["file"]["name"];
//if($number !='' and $file !='')
//{
		
		 
$allowedExts = array("gif","jpeg", "jpg", "png","doc", "odt", "pdf", "txt","xls","xlsx","ppt","pptx","docx","indd","psd");
//"application/doc", "application/pdf", "another/type");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$allowedCompressedTypes = array("application/x-rar-compressed", "application/zip", "application/x-zip", "application/octet-stream", "application/x-zip-compressed","image/vnd.adobe.photoshop","application/x-indesign");
$allowedExts1 = array("zip", "rar","psd");
$extension1 = end(explode(".", $_FILES["file"]["name"]));

//$psdfileTypes = array("application/psd","application/x-photoshop","image/photoshop"," image/psd","image/x-photoshop","image/x-psd");
//$allowedExts2 = array("psd","PSD");
//$extension2 = end(explode(".", $_FILES["file"]["name"]));



$dir ="uploadfiles/".$number;

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/vnd.oasis.opendocument.text")
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
|| ($_FILES["file"]["type"] == "application/vnd.ms-powerpoint")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["file"]["type"] == "application/x-indesign")
|| ($_FILES["file"]["type"] == "image/vnd.adobe.photoshop"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
     "Upload: " . $_FILES["file"]["name"] . "<br>";
     "Type: " . $_FILES["file"]["type"] . "<br>";
    "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("uploadfiles/".$number."/".$_FILES["file"]["name"])) {
      $msg = $_FILES["file"]["name"] . " already exists. ";
    } else {
		
		if ( ! is_dir($dir)) {
     mkdir($dir);
	}
		
       move_uploaded_file($_FILES["file"]["tmp_name"], "$dir/". $_FILES["file"]["name"]);
	  
	   mysql_query("UPDATE `contacts` SET uploadfiles='".$dir."/".$_FILES['file']['name']."' WHERE contact='".$number."'") or mysql_error();
	    $msg = "File Upload Successfully";
		
     
    }
  }
  header('location:upload.php?s='.$msg);
}
elseif(in_array($_FILES["file"]["type"], $allowedCompressedTypes)
&& in_array($extension1, $allowedExts1))
{

  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    "Upload: " . $_FILES["file"]["name"] . "<br>";
    "Type: " . $_FILES["file"]["type"] . "<br>";
    "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("uploadfiles/".$number."/".$_FILES["file"]["name"])) {
      $msg = $_FILES["file"]["name"] . " already exists. ";
    } else {
		if ( ! is_dir($dir)) {
     mkdir($dir);
	}

      move_uploaded_file($_FILES["file"]["tmp_name"], "$dir/" . $_FILES["file"]["name"]);
       "Stored in: " . "uploadfiles/" . $_FILES["file"]["name"];
	   mysql_query("UPDATE `contacts` SET uploadfiles='".$dir."/".$_FILES['file']['name']."' WHERE contact='".$number."'") or mysql_error();
	     $msg = "File Upload Successfully";
		
    }
  }
header('location:upload.php?s='.$msg); 
	
	
}



 else {
   $msg ="You are uploaded Invalid file";
 header('location:upload.php?s='.$msg); 
}
		
		
	}
    ?>