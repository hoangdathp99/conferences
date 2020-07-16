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
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="post" action="display_search.php">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search"/>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="display_conferences.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../">Đăng xuất</a>
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
                    <!--                    <li class="breadcrumb-item"><a href='http://localhost/conference/conference/display_conferences.php'>Dashboard</a></li>-->
                    <li class="breadcrumb-item active">Conferences</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header" class="col-9">
                        <i class="fas fa-table mr-1"></i>
                        Danh sách hội thảo
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
                                    <th>Sô lượng tối đa</th>
                                    <th>Thời gian</th>
                                    <th>Ảnh</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $item): ?>
                                    <tr>
                                        <td><?php echo $item['id']?></td>
                                        <td>
                                            <a href="../guest/display_guest.php?id=<?php echo $item['id']?>">
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
