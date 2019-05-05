<?php

    if( isset($_FILES['image']) ){
        $errors     = array();
        $imgPath    = 'images/';
        
        // file info
        $file_name  = $_FILES['image']['name'];
        $file_size  = $_FILES['image']['size'];
        $file_tmp   = $_FILES['image']['tmp_name'];
        $file_type  = $_FILES['image']['type'];
        
        // File extension
        $file_ext   = explode('.', $file_name);
        $file_ext   = strtolower(end($file_ext));

        $extensions = array("jpeg","jpg","png");
        
        if( in_array( $file_ext, $extensions ) === false ){
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if( $file_size > 2097152 ){
            $errors[] ='File size must be excately 2 MB';
        }
        
        if( empty($errors) == true){
            if (!file_exists($imgPath)) mkdir( $imgPath, 0777, true);

            move_uploaded_file( $file_tmp, $imgPath.$file_name );
            echo "Success";
        }else{
            print_r($errors);
        }
    }