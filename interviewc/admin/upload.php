<?php

if(isset($_FILES['up_file']) && $_FILES['up_file']['error'] == 0){


	$errors= array();

	$extension = pathinfo($_FILES['up_file']['name'], PATHINFO_EXTENSION);

	$extensions = array("jpeg","jpg","png","txt","zip","indd","pdf","psd","swf","fla");
    if(in_array($extension,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG or text or zip file.";
    }

	if(!file_exists('uploads/'.$_POST['phone'])||!is_dir('uploads/'.$_POST['phone']))
	{
		mkdir('uploads/'.$_POST['phone']);
	}
	if(!file_exists('uploads/'.$_POST['phone'].'/files/')||!is_dir('uploads/'.$_POST['phone'].'/files/'))
	{
		mkdir('uploads/'.$_POST['phone'].'/files/');
	}

	if(empty($errors)==true){
		echo 'uploads/'.$_POST['phone'].'/files/'.$_FILES['up_file']['name'];
		move_uploaded_file($_FILES['up_file']['tmp_name'], 'uploads/'.$_POST['phone'].'/files/'.$_FILES['up_file']['name']);
	}
	else{
        print_r($errors);
    }

}
else if(isset($_FILES['up_resume']) && $_FILES['up_resume']['error'] == 0){

	$extension = pathinfo($_FILES['up_resume']['name'], PATHINFO_EXTENSION);
	if(!file_exists('uploads/'.$_POST['phone'])||!is_dir('uploads/'.$_POST['phone']))
	{
		mkdir('uploads/'.$_POST['phone']);
	}
	if(!file_exists('uploads/'.$_POST['phone'].'/resume/')||!is_dir('uploads/'.$_POST['phone'].'/resume/'))
	{
		mkdir('uploads/'.$_POST['phone'].'/resume/');
	}
	if(move_uploaded_file($_FILES['up_resume']['tmp_name'], 'uploads/'.$_POST['phone'].'/resume/'.$_FILES['up_resume']['name'])){

	}
}
header('location:/interviewc/admin/success.php');
