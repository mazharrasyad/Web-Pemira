<?php
    session_start();

    if(isset($_SESSION['nim'])){
        header("location: layouts/vote.php");
    }
?>

<html>
    <head>
        <title>Pemira</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body style="background-color: #eff8f9ff">
        <center>
            <br><br><br>
                <img src="image/logo.png" height="150px">            

            <br><br>            

            <form action="layouts/auth/login.php" method="post">
                <table>
                    <tr>
                        <td align="center">
                            <b>Verifikasi Identitas</b>
                        </td>                        
                    </tr>   
                    <tr><td><hr style="border: 1px solid #0A837E;"></td></tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="nim">Nomor Induk Mahasiswa</label>
                                <input type="text" class="form-control" name="nim">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="sandi">Sandi</label>
                                <input type="password" class="form-control" name="sandi">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <div style="color: red;margin-bottom: 15px;">
                                <?php
                                    if(isset($_COOKIE["message"])){
                                        echo $_COOKIE["message"];
                                    }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr colspan="2">
                        <td align="center">
                            <button type="submit" class="btn btn-success">Cek</button>
                        </td>
                    </tr>
                </table>            
            </form>
        </center>
    </body>
</html>