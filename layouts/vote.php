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
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: #eff8f9ff">
        <form action="vote.php" method="post" onSubmit="return confirm('Apakah Anda Yakin?') ">
            <input hidden type="text" name="pemilih_id" value="<?php echo $_SESSION['id']; ?>">                        
            <div class="card-group col-md-12" align="center">

                <div class="card col-md-6" style="border: 0; background-color: #eff8f9ff">
                    <img class="card-img-top" style="padding-left: 30%; padding-right: 30%; padding-top: 20%;" src="../image/paslon1.png">
                    <div class="card-body">
                    <h5 class="card-title">Chairil Hilman Syah & Aditya Fitriadi</h5>
                    <p class="card-text"><b>Nomor Urut 1</b></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #eff8f9ff">
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#visi1">Visi</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#misi1">Misi</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#program1">Program</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-body">
                        <button name="submit" class="btn btn-danger btn-lg btn-block" value="1"><b>Vote 1kutserta</b></button>
                    </div>
                    </div>
                </div>

                <div class="card col-md-6" style="border: 0; background-color: #eff8f9ff">
                    <img class="card-img-top" style="padding-left: 30%; padding-right: 30%; padding-top: 22%" src="../image/paslon2.png">
                    <div class="card-body">
                    <h5 class="card-title">Shidqi Anshori Rabbani & Silmi Rizqi Ramadhani</h5>
                    <p class="card-text"><b>Nomor Urut 2</b></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #eff8f9ff">
                            <div class="row" style="background-color: #eff8f9ff">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#visi2">Visi</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#misi2">Misi</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#program2">Program</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-body">
                        <button name="submit" class="btn btn-danger btn-lg btn-block" value="2"><b>Vote Simi-Simi</b></button>
                    </div>
                    </div>
                </div>
                
            </div>
        </form>

        <?php
            if (isset($_POST['submit'])){            
                include_once("../database/connection.php");

                $pemilih_id = $_POST['pemilih_id'];
                $peserta_id = password_hash($_POST['submit'], PASSWORD_DEFAULT); 
                $peserta = $_POST['submit'];               

                mysqli_query($connect, "INSERT INTO voting (pemilih_id, peserta_id, waktu) VALUES('$pemilih_id','$peserta_id', now())");
                mysqli_query($connect, "UPDATE pemilih SET status = 1 where id = $pemilih_id");
                mysqli_query($connect, "UPDATE peserta SET suara = suara + 1 where id = $peserta");
                
                setcookie("message", "Selamat Anda Telah Memilih", time()+3600, '/');            

                header("location: auth/logout.php");        
            }
        ?>

        <!-- Visi 1 -->
        <div class="modal fade" id="visi1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="color: #FDF3F1; background-color: #0A837E">
                <h5 class="modal-title"><b>Visi 1kutserta</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center" style="background-color: #FDF3F1">      
                <i>"Terwujudnya BEM STT NF sebagai <b>Inovator</b> perubahan yang <b>Menginspirasi</b> untuk <b>STT NF</b> dan <b>Indonesia</b>"</i>
            </div>
            </div>
        </div>
        </div>

        <!-- Visi 2 -->
        <div class="modal fade" id="visi2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="color: #FDF3F1; background-color: #0A837E">
                <h5 class="modal-title"><b>Visi Simi-Simi</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center" style="background-color: #FDF3F1"> 
                <i>"Menjadikan BEM STT Terpadu NF yang <b>Progresif</b> dalam setiap pergerakan sehingga menciptakan STT Terpadu NF yang <b>Aktif</b> dan <b>Menginovasi</b>"</i>
            </div>
            </div>
        </div>
        </div>

        <!-- Misi 1 -->
        <div class="modal fade" id="misi1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header" style="color: #FDF3F1; background-color: #0A837E">
                <h5 class="modal-title"><b>Misi 1kutserta</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #FDF3F1; margin-right: 5%">   
                <ol>
                    <li><p align="justify">Membentuk BEM STT NF yang <b>Profesional</b> dan <b>Bermoral</b> dengan berlandaskan semangat <b>Ukhuwah Islamiyah</b></p></li>                    
                    <li><p align="justify">Menciptakan <b>Sinergi Berkualitas</b> Antar Lembaga dan Masyarakat dengan Semangat <b>Persaudaraan</b></p></li>                    
                    <li><p align="justify">Menciptakan <b>Inovasi</b> yang Bersifat <b>Fleksibel</b> dan <b>Solutif</b> dengan Memanfaatkan <b>Teknologi</b> serta <b>Peluang</b> yang Ada</p></li>                    
                    <li><p align="justify">Melayani Kebutuhan Mahasiswa STT NF dalam Bentuk <b>Advokasi</b> yang Aktif dan <b>Berintegrasi</b></p></li>                    
                    <li><p align="justify">Membangun Iklim <b>Pergerakan</b> Mahasiswa yang <b>Kritis dan Berkelanjutan</b> untuk Perubahan STT NF dan Indonesia</p></li>
                </ol>
            </div>
            </div>
        </div>
        </div>

        <!-- Misi 2 -->
        <div class="modal fade" id="misi2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header" style="color: #FDF3F1; background-color: #0A837E">
                <h5 class="modal-title"><b>Misi Simi-Simi</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #FDF3F1; margin-right: 5%">   
                <ol>
                    <li><p align="justify">Terwujudnya BEM STT Terpadu NF yang <b>bersinergi</b> dengan seluruh SDM dan civitas akademika STT Terpadu NF</p></li>                    
                    <li><p align="justify">Mengoptimalkan minat dan bakat mahasiswa STT Terpadu NF agar terciptanya STT Terpadu NF yang <b>aktif dan progresif</b></p></li>                    
                    <li><p align="justify">Mengoptimalkan sumber daya manusia dari BEM STT Terpadu NF yang <b>responsif dan aktif</b></p></li>                    
                </ol>
            </div>
            </div>
        </div>
        </div>

        <!-- Program 1 -->
        <div class="modal fade" id="program1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="color: #FDF3F1; background-color: #0A837E">
                <h5 class="modal-title"><b>Program 1kutserta</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #FDF3F1; margin-right: 5%">  
                <table class="col-md-12" style="margin-left: 3%;">
                    <tr>
                        <td align="center"><b><i class="fa fa-address-book" aria-hidden="true"></i>NF Critism</b></td>
                    </tr>   
                    <tr>
                        <td></td>
                        <td align="center"><b>Sekolah Pemuda</b></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center"><b>Inkubator Prestasi</b></td>                        
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><b>NF Mengabdi</b></td>
                    </tr>
                </table>                   
            </div>
            </div>
        </div>
        </div>

        <!-- Program 2 -->
        <div class="modal fade" id="program2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="color: #FDF3F1; background-color: #0A837E">
                <h5 class="modal-title"><b>Program Simi-Simi</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #FDF3F1; margin-right: 5%">  
                <table class="col-md-12" style="margin-left: 3%;">
                    <tr>
                        <td align="center"><b><i class="fa fa-address-book" aria-hidden="true"></i>Ngopi (Ngobrol Politik)</b></td>
                    </tr>   
                    <tr>
                        <td></td>
                        <td align="center"><b>NF Mengabdi</b></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center"><b>Pintas (Pintu Advokasi)</b></td>                        
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><b>One Day With BEM</b></td>
                    </tr>
                </table>                   
            </div>
            </div>
        </div>
        </div>
    </body>
</html>
