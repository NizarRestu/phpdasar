<?php
            $database = "db_sekolah";
            $host = "localhost";
            $user = "root";
            $password = ""; 

            $mysqli = new mysqli($host,$user,$password,$database);
            // Check connection
            if ($mysqli -> connect_error) {
              die( "Failed to connect to MySQL: " . $mysqli -> connect_error);
            } else{
              echo "Koneksi database berhasil";
            }
?> 