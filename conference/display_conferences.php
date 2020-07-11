<?php
include_once '../database/database.php';
$stmt = $conn->prepare('SELECT * FROM conferences');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
$conn = null
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
    <!-- Navbar Search-->
<!--    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">-->
<!--        <div class="input-group">-->
<!--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />-->
<!--            <div class="input-group-append">-->
<!--                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
    <!-- Navbar-->
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
<!--                    <div class="sb-sidenav-menu-heading">Core</div>-->
<!--                    <a class="nav-link" href="display_conferences.php">-->
<!--                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>-->
<!--                        Dashboard-->
<!--                    </a>-->
<!--                    <div class="sb-sidenav-menu-heading">Interface</div>-->
<!--                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">-->
<!--                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>-->
<!--                        Layouts-->
<!--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                    </a>-->
<!--                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">-->
<!--                        <nav class="sb-sidenav-menu-nested nav">-->
<!--                            <a class="nav-link" href="layout-static.html">Static Navigation</a>-->
<!--                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>-->
<!--                        </nav>-->
<!--                    </div>-->
<!--                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">-->
<!--                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>-->
<!--                        Pages-->
<!--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                    </a>-->
<!--                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">-->
<!--                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">-->
<!--                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">-->
<!--                                Authentication-->
<!--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                            </a>-->
<!--                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">-->
<!--                                <nav class="sb-sidenav-menu-nested nav">-->
<!--                                    <a class="nav-link" href="login.html">Login</a>-->
<!--                                    <a class="nav-link" href="register.html">Register</a>-->
<!--                                    <a class="nav-link" href="password.html">Forgot Password</a>-->
<!--                                </nav>-->
<!--                            </div>-->
<!--                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">-->
<!--                                Error-->
<!--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                            </a>-->
<!--                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">-->
<!--                                <nav class="sb-sidenav-menu-nested nav">-->
<!--                                    <a class="nav-link" href="401.html">401 Page</a>-->
<!--                                    <a class="nav-link" href="404.html">404 Page</a>-->
<!--                                    <a class="nav-link" href="500.html">500 Page</a>-->
<!--                                </nav>-->
<!--                            </div>-->
<!--                        </nav>-->
<!--                    </div>-->
                    <div class="sb-sidenav-menu-heading">Danh sách</div>
                    <a class="nav-link" href="http://localhost/conference/conference/display_conferences.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Các cuộc hội thảo
                    </a>
                    <a class="nav-link" href="../customer/display_customers.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Người tham gia
                    </a>
                    <a class="nav-link" href="../request/request_add_customer.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Yêu cầu tham gia
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Đăng nhập với quyền:</div>
                Admin
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Danh sách</h1>
                <ol class="breadcrumb mb-4">
<!--                    <li class="breadcrumb-item"><a href='http://localhost/conference/conference/display_conferences.php'>Dashboard</a></li>-->
                    <li class="breadcrumb-item active">Hội thảo</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header" class="col-9">
                        <i class="fas fa-table mr-1"></i>
                        Danh sách hội thảo
                    </div>
                    <div class="col-3">

                        <a class="nav-link" href="add_conference.php">
                            <button class="btn btn-primary">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>

                                Thêm hội thảo</button>
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Nội dung</th>
                                    <th>Địa chỉ</th>
                                    <th>Sô lượng tham gia</th>
                                    <th>Thời gian</th>
                                    <th>Ảnh</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $item): ?>
                                    <tr>
                                        <td><?php echo $item['id']?></td>
                                        <td>
                                            <a href="../conference_customer/display.php?id=<?php echo $item['id']?>">
                                                <?php echo $item['name']?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="../html/cotent_<?php echo $item['id']?>.html">
                                                <?php echo $item['content']?>
                                            </a>
                                        </td>
                                        <td><?php echo $item['address']?></td>
                                        <td><?php echo $item['amount']?></td>
                                        <td><?php echo $item['time']?></td>
                                        <td>
                                            <img src="<?php echo $item['img']?>" width="300" height="200"/>
                                        </td>
                                        <td>
                                            <span><a href="edit_conference.php?id=<?php echo $item['id']?>">Update</a></span>
                                            <span><a href="delete_conference.php?id=<?php echo $item['id']?>">Delete</a></span>
                                        </td>
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
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
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
