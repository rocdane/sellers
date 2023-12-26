<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/bootstrap.min.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/fonts/font-awesome/css/font-awesome.min.css")}}>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href={{asset("assets/img/favicon.ico")}} type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/style.css")}}>
</head>
<body>

<main>
    <div class="invoice-4 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-invoice :$order :$seller :$document/>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="bi bi-download"></i> Download Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src={{asset("assets/js/jquery.min.js")}}></script>
<script src={{asset("assets/js/jspdf.min.js")}}></script>
<script src={{asset("assets/js/html2canvas.js")}}></script>
<script src={{asset("assets/js/app.js")}}></script>
</body>
</html>
