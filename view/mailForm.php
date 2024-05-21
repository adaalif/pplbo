<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hubungi Admin</title>
    <link rel="stylesheet" href="yes.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Kirim Pesan</h2>
                <?php echo $message ?? ''; ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subjek" required>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Tulis pertanyaanmu" required></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="send" value="Kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
