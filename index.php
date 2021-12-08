<?php
session_start();
require_once "Libraries/connect.php";
require('libraries/fpdf.php');
class PDF extends FPDF
{
    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        // Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    // Better table
    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(40, 35, 40, 45);
        // Header
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Data
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR');
            $this->Cell($w[1], 6, $row[1], 'LR');
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R');
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(70, 80, 40);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        while ($row = mysqli_fetch_assoc($data)) {
            $this->Cell($w[0], 6, $row['comic_title'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['comic_description'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['comic_release'], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
if (isset($_GET["page"])) {
    if ($_GET["page"] == 'comic_pdf') {
        $pdf = new PDF();
        $header = array('Title', 'Description', 'Release Date');
        // $data = $pdf->LoadData('libraries/countries.txt');
        $results = mysqli_query($connection, "SELECT comic_title,comic_description,comic_release FROM comic_list");
        // $data = mysqli_fetch_row($results);
        // var_dump($data);
        // die;
        $pdf->SetFont('Arial', '', 14);
        // $pdf->AddPage();
        // $pdf->BasicTable($header, $data);
        // $pdf->AddPage();
        // $pdf->ImprovedTable($header, $data);
        $pdf->AddPage();
        $pdf->FancyTable($header, $results);
        $pdf->Output();
    }
}
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = 3;
}
if ($_SESSION['login'] == 3) {
    $_SESSION['id'] = "Blocked";
    $_SESSION['username'] = "Blocked";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>finance aplication</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    <!-- Bootsrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    * {
        font-family: 'Roboto', sans-serif !important;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    a {
        text-decoration: none;
        color: #DC3545;
    }

    a:hover {
        color: white;
    }


    * {
        font-family: 'Roboto', sans-serif !important;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    body {
        background-color: #000000;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/home.css" rel="stylesheet">

    <link href="assets/css/form.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="global.css"> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a href="#" class="text-decoration-none"><i
                    class="bi bi-file-earmark-image fs-2 text-white">UnLOad&nbsp;&nbsp;</i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=bookmarks">Bookmarks</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="?page=genre">Genre</a></li>
                            <li><a class="dropdown-item" href="?page=author">Author</a></li>
                        </ul>
                    </li>

                    <?php if ($_SESSION['login'] == 1) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Add</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" aria-current="page" href="?page=add_author">Author</a></li>
                            <li><a class="dropdown-item" aria-current="page" href="?page=add_comic">Comic</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
                <div class="search-container">
                    <form class="d-flex" action="" method="get">
                        <input type="text" name="page" value="filter_genre" hidden>
                        <input class="me-2" type="text" name="keyword" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light btn-outline-secondary" type="submit"><i
                                class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2">
                <?php if ($_SESSION['login'] == 1) { ?>
                <li class="nav-item">
                    <a href="?page=chart" class="text-white">Chart</a>
                    <a href="?page=comic_pdf" class="text-white">Print PDF</a>
                </li>
                <?php } ?>
            </ul>
            <?php if ($_SESSION['login'] != 3) { ?>
            <div class="btn-group dropstart">
                <a class="dropdown-toggle fs-5 text-white" style="text-decoration:none" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <?php echo $_SESSION['username']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="nav-link active text-white fs-6" aria-current="page" href="?page=logout">Logout</a>
                    </li>
                </ul>
            </div>
            <?php } else { ?>
            <span>
                <a class="nav-link active text-white" aria-current="page" href="?page=login">Login</a>
            </span>
            <span>
                <a class="nav-link active text-white" aria-current="page" href="?page=sign_up">Sign Up</a>
            </span>
            <?php } ?>
        </div>
    </nav>

    <main class="container-fluid">
        <?php
        ini_set("display_errors", 1);

        define("GELANG", true);

        //Connect dengan database
        require_once "Libraries/fungsi.php";

        // kalau index page tidak ditemukan
        if (isset($_GET['page']) == false) {
            //page tidak ditemukan
            $halaman = "pages/home";
        } else {
            //jika page ditemukan/ada
            $halaman = "pages/" . $_GET['page'];

            //apakah halaman ada atau tidak
            if (file_exists($halaman . ".php") == false) {
                //jika file tidak ada diarahkan ke mana
                $halaman = "pages/404";
                if ($_GET['page'] == 'comic_pdf') {
                    $halaman = "pages/home";
                }
                else{
                    $halaman = "pages/404";
                }
            }
        }
        include $halaman . ".php";
        ?>
    </main>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> -->
    <script src="assets/js/dashboard.js"></script>
</body>

</html>