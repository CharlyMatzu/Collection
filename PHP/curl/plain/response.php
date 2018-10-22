<?php

    if( isset($_GET['test']) )
        echo "GET: ".$_GET['test'];
    else if( isset($_POST['test']) )
        echo "POST: ".$_POST['test'];
    else
        echo "NA";