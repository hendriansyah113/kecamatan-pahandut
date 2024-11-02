<!DOCTYPE html>
<html>
<head>
    <title>Kecamatan Pahandut</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="background-image"></div>
    <div class="content">
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
                echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
            }
        }
        ?>
    
        <div class="kotak_login">
            <div class="tulisan_login">
                <i class="fas fa-user icon-login"></i>
            </div>
            <form action="cek_login.php" method="post">
                <label><h4>Username :</h4></label>
                <input type="text" name="username" class="form_login" placeholder="Username .." required="required">
    
                <label><h4>Password :</h4></label>
                <input type="password" name="password" class="form_login" placeholder="Password .." required="required">
    
                <input type="submit" class="tombol_login" value="LOGIN">
            </form>
        </div>
    </div>
</body>
</html>