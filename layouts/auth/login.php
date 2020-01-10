<?php
    session_start();

    include "../../database/connection.php";

    $nim = mysqli_real_escape_string($connect, $_POST['nim']);
    $sandi = mysqli_real_escape_string($connect, $_POST['sandi']);

    $sql = mysqli_query($connect, "SELECT * FROM pemilih WHERE nim='".$nim."' AND sandi='".$sandi."'");
    $data = mysqli_fetch_array($sql);

    if(!empty($data)){
        $_SESSION['id'] = $data['id']; 
        $_SESSION['nim'] = $data['nim']; 
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['status'] = $data['status']; 

        if($_SESSION['status'] == 0){
            setcookie("message", "delete",time()-1); 

            header("location: ../vote.php"); 
        }
        else if($_SESSION['status'] == 99){
            header("location: ../admin/dashboard.php");
        }    
        else{
            setcookie("message", "Anda Sudah Memilih", time()+3600, '/');

            header("location: ../../index.php");
        }        
    }else{        
        setcookie("message", "NIM atau Sandi Salah", time()+3600, '/');

        header("location: ../../index.php");
    }
?>