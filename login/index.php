<!DOCTYPE html>
<html>

<head>
    <title>Kecamatan Pahandut</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    .tombol_kembali {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f1f1f1;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        text-align: center;
    }

    .tombol_kembali:hover {
        background-color: #ccc;
    }
    </style>
    <link rel="manifest" href="../web.webmanifest" />
</head>

<body>
    <div class="background-image"></div>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "belum_login") {
            echo "<div class='alert'>Anda Belum Login !</div>";
        }
    }
    ?>
    <div class="content">


        <div class="kotak_login">
            <div class="tulisan_login">
                <i class="fas fa-user icon-login"></i>
            </div>
            <form action="cek_login.php" method="post">
                <label>
                    <h4>Username :</h4>
                </label>
                <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

                <label>
                    <h4>Password :</h4>
                </label>
                <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

                <input type="submit" class="tombol_login" value="LOGIN">
            </form>
            <!-- Tombol Kembali -->
            <a href="../" class="tombol_kembali">Kembali</a>
        </div>
    </div>
    </div>
</body>

</html>