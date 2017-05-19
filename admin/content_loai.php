<?php
require_once("../controller.php");
$store = new bh;
$store->connect("mysql.hostinger.vn", "u485709959_snt", "12345678", "u485709959_doan");
if (isset($_GET['idCL'])) {
    $idCL = $_GET['idCL'];
    $dsl = $store->getLoaiallbyidCL($idCL);
}
?>
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th><a href="?key=theml&idCL=<?php echo $_GET['idCL']; ?>"><i class="fa fa-plus-circle"
                                                                                      aria-hidden="true"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($loai = mysql_fetch_array($dsl)) {
                        ?>
                        <tr>
                            <td><?php echo $loai['idLoai'] ?></td>
                            <td><?php echo $loai['TenLoai'] ?></td>
                            <td>
                                <?php
                                if ($loai['AnHien'])
                                    echo "Hiện";
                                else
                                    echo "Ẩn";
                                ?>
                            </td>
                            <td>
                                <a href="?key=sual&idLoai=<?php echo $loai['idLoai']; ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>&nbsp;/&nbsp;
                                <a href="xuly.php?action=xoal&idLoai=<?php echo $loai['idLoai']; ?>"><i class="fa fa-trash"
                                                                                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
