<?php

include_once 'db_configuration.php';

    // Initialize variables        
    echo "HERE";
	//$ID = mysqli_real_escape_string($db,$_POST['ID']);
    $Names = mysqli_real_escape_string($db,$_POST['Names']);
    $Type = mysqli_real_escape_string($db,$_POST['Type']);
    $State = mysqli_real_escape_string($db,$_POST['State']);
    $Country = mysqli_real_escape_string($db,$_POST['Country']);
	$Description = mysqli_real_escape_string($db,$_POST['Description']);
	//$Recipe_links = basename($_FILES["puzzleFileToUpload"]["Recipe_links"]);
   // $Video_links = basename($_FILES["solutionFileToUpload"]["Video_links"]);
    //$Recipelinks = basename($_FILES["recipelinksFileToUpload"]["Recipe links"]);
    //$Videolinks = basename($_FILES["videolinksFileToUpload"]["Video links"]);
	//$Status = mysqli_real_escape_string($db,$_POST['Status']);
   // $Notes = mysqli_real_escape_string($db,$_POST['Notes']);
    $validate = true;    
    
    if($validate){
        // ====================== Puzzle image =====================
        $target_dir = "Images/abcd_db_images/";
        $target_file = $target_dir . basename($_FILES["puzzleFileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["puzzleFileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                header('location: createDish.php?createDish=fileRealFailed');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location: createDish.php?createDish=fileExistFailed');
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: createDish.php?createDish=fileTypeFailed');
            $uploadOk = 0;
        }

        // ====================== Solution image =====================

        $target_dir = "Images/solution_images/";
        $target_file1 = $target_dir . basename($_FILES["solutionFileToUpload"]["name"]);        
        $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["solutionFileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                header('location: createDish.php?createDish=fileRealFailed');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file1)) {
            header('location: createDish.php?createDish=fileExistFailed');
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: createDish.php?createDish=fileTypeFailed');
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {            

        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["puzzleFileToUpload"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["solutionFileToUpload"]["tmp_name"], $target_file1)) {
                
                $sql = "INSERT INTO dishes(ID, Names, Type, State, Country, Description, Recipe_links, Video_links, Status, Notes)
                VALUES ('$ID','$Names','$Type','$State','$Country','$Description','$RecipelinksFileToUploadName','$VideolinksileToUploadName','$Status','$Notes')
                ";

                mysqli_query($db, $sql);
                header('location: list.php?createDish=Success');
                }
            }
        }else{
            header('location: createPuzzle.php?createPuzzle=answerFailed'); 
    }        