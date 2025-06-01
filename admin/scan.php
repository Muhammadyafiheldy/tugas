<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>scan</title>
    <script type="text/javascript" src="instascan.min.js"></script>

</head>
<body>
    <div class="wrapper">
            <div class="scanner"></div>
            <video id="preview"></video>
        </div>
   
        
        <form action="tambah/storeAbsen.php" method="POST" id="form">
           

            <input type="hidden" name="id_member" id="member_id">
        </form>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
        scanner.addListener('scan', function(c) {
            document.getElementById('member_id').value = c;
            document.getElementById('form').submit();
        })
    </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</body>
</html>