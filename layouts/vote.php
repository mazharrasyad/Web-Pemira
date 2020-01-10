<?php
    session_start();

    if(!isset($_SESSION['nim'])){
        session_destroy();
        header("location: ../index.php");
    }
    else if($_SESSION['status'] == 1){
        session_destroy();
        header("location: ../index.php");        
    }
?>

<html>
    <head>
        <title>Vote</title>

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
        <a href="auth/logout.php">Logout</a>
        <form action="vote.php" method="post">
            <table>
                <tr> 
                    <td><input type="text" name="pemilih_id" value="<?php echo $_SESSION['id']; ?>"></td>                    
                    <td><button name="submit" value="1">Vote 1</button></td>
                    <td><button name="submit" value="2">Vote 2</button></td>
                </tr>
            </table>
        </form>

        <?php
            if (isset($_POST['submit'])){            
                include_once("../database/connection.php");

                $pemilih_id = $_POST['pemilih_id'];
                $peserta_id = $_POST['submit'];                

                mysqli_query($connect, "INSERT INTO voting (pemilih_id, peserta_id, waktu) VALUES('$pemilih_id','$peserta_id', now())");
                mysqli_query($connect, "UPDATE pemilih SET status = 1 where id = $pemilih_id");
                mysqli_query($connect, "UPDATE peserta SET suara = suara + 1 where id = $peserta_id");
                
                echo "Sukses";            

                header("location: auth/logout.php");        
            }
        ?>
    </body>
</html>