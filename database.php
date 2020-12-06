<?php

    $link = mysqli_connect("localhost","root","","project");
    if (!$link)
    {
        echo "MySQL Error: " . mysqli_connect_error();
    }


?>