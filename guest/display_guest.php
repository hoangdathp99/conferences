<?php
$conference_id = '';
$customer_id ='';
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    include '../database/database.php';
    if(isset($_GET['id'])) {
        $conference_id = $_GET['id'];
    }
    $stmt_check_amount = $conn->prepare("SELECT COUNT(id) FROM conference_customer WHERE conference_id = $conference_id");
    $stmt_check_amount->execute();
    $stmt_check_amount->setFetchMode(PDO::FETCH_ASSOC);
    $amount = $stmt_check_amount->fetch();

    $stmt_conference = $conn->prepare("SELECT * FROM conferences WHERE id = $conference_id");
    $stmt_conference->execute();
    $stmt_conference->setFetchMode(PDO::FETCH_ASSOC);
    $conference = $stmt_conference->fetch();

//        var_dump($conference);

    $stmt_customers = $conn->prepare("SELECT * FROM conference_customer WHERE conference_id = $conference_id");
    $stmt_customers->execute();
    $stmt_customers->setFetchMode(PDO::FETCH_ASSOC);
    $list_customer_of_conference = $stmt_customers->fetchAll();
//            $customer_id = 'customer_id';
//        var_dump($list_customer_of_conference);
//        $conn = null;
    $stmt = $conn->prepare("SELECT * FROM customers INNER JOIN conference_customer ON customers.id = conference_customer.customer_id AND conference_id = $conference_id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
//        var_dump($result);
    $conn = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="../layout/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="display_conferences.php">Quản lý cuộc hội thảo</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="display_conferences.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!--                <a class="dropdown-item" href="#">Settings</a>-->
                <!--                <a class="dropdown-item" href="#">Activity Log</a>-->
                <!--                <div class="dropdown-divider"></div>-->
                <a class="dropdown-item" href="../login.php">Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Danh sách</div>
                    <a class="nav-link" href="http://localhost/conference/guest/display_conferences_guest.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Các cuộc hội thảo
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Đăng nhập với quyền:</div>
                Guest
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Danh sách</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="http://localhost/conference/guest/display_conferences_guest.php">Conferences</a></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header" class="col-9">
                        <i class="fas fa-table mr-1"></i>
                        Danh sách khách tham dự
                    </div>
                    <div class="col-3">

                        <a class="nav-link" href="add_customer_guest.php">
                            <button class="btn btn-primary">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>

                                Đăng ký tham gia</button>
                        </a>


                    </div>
                    <div class="col-9">
                        <h2>Số lượng tham gia : <?php echo $amount['COUNT(id)']?></h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $item): ?>
                                    <tr>
                                        <td><?php echo $item['id']?></td>
                                        <td><?php echo $item['name']?></td>
                                        <td><?php echo $item['email']?></td>
<!--                                        <td>-->
<!--                                            <span><a href="../customer/edit_customer.php?id=--><?php //echo $item['id']?><!--">Update</a></span>-->
<!--                                            <span><a href="../customer/delete_customer.php?id=--><?php //echo $item['id']?><!--">Delete</a></span>-->
<!--                                        </td>-->
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <?php include '../layout/footer.php'?>
<!--            <div class="container-fluid">-->
<!--                <div class="d-flex align-items-center justify-content-between small">-->
<!--                    <div class="text-muted">Copyright &copy; Your Website 2020</div>-->
<!--                    <div>-->
<!--                        <a href="#">Privacy Policy</a>-->
<!--                        &middot;-->
<!--                        <a href="#">Terms &amp; Conditions</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../layout/js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
