<?php
            $database = "db_sekolah";
            $host = "localhost";
            $user = "root";
            $password = ""; 

            $conn = new mysqli($host,$user,$password,$database);
            // Check connection
            if ($conn -> connect_error) {
              die( "Failed to connect to MySQL: " . $conn -> connect_error);
            } 
