
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">

    <title><?= URI; ?></title>
</head>
<body class="p-0">
    <!-- <h1>Hello</h1> -->
    <div class="container-fluid d-flex min-vh-100">

        <div class="tree w-25 p-4">
            <!-- <a href="../"><i class="fa fa-undo" aria-hidden="true"></i> Back</a><br> -->
            <?php $h5ai->tree($ourArr); ?>
        </div>
        <div class="test">

        </div>
        <div class="center w-75 bg-light p-4">
            <?php echo "<p class='fw-bold text-white bg-dark p-3'><a class='text-white text-decoration-underline' href='/'>HOME</a> $ariane</p>"; ?>

            <table class="table">
                <thead>
                    <a href="../"><i class="fa fa-undo" aria-hidden="true"></i> Back</a><br>
                    <tr>
                        <th scope="col">File</th>
                        <th scope="col">size</th>
                        <th scope="col">Last change</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $centerSec->table($mainArr, $sizefolder, $dateArr, $Newurl); ?>
                    
                </tbody>
            </table>
         </div>
    </div>



    <script src="/js/script.js"></script>
</body>
</html>