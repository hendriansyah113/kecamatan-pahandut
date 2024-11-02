<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-back {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Dokumen</h2>
        <form action="upload_foto_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="sktm">Upload SKTM :</label>
                <input type="file" name="sktm" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kk">Upload KK :</label>
                <input type="file" name="kk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ktp">Upload KTP :</label>
                <input type="file" name="ktp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <br>
            <br>
            <a href="pendidikan.php" class="btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>