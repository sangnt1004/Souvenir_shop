<?php
$idSK = 1;
if (isset($_GET['sk'])) {
    $idSK = $_GET['sk'];
}
?>
<div class="album">
    <!-- PRODUCT -->
    <div class="title-line" style="margin-top: 15px;">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else $page = 1;
        $kqdmsk = $store->getSukienbyidSK($idSK);
        $dsksp = mysql_fetch_array($kqdmsk);
        ?>
        <h3 class="font_5"><i class="fa fa-tree" aria-hidden="true"></i> <?php echo $dsksp['TieuDe']; ?> <i
                    class="fa fa-tree" aria-hidden="true"></i>
        </h3>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php

            $kqspsk = $store->getSanphamByidSK(1, $idSK, 20);
            $sanpham_page = 8;
            $tong_sp = mysql_num_rows($kqspsk);
            $so_page = ceil($tong_sp / $sanpham_page);
            $vitri = ($page - 1) * $sanpham_page;
            $kqsp_page = mysql_query("SELECT * FROM nn_sanpham where idSukien = $idSK limit $vitri,$sanpham_page");
            while ($dsp = mysql_fetch_array($kqsp_page)) {
                ?>
                <div class="card col-sm-3 col-xs-6">
                    <div class="thumbnail">
                        <form name="formSP" action="xulygiohang.php" method="post">
                            <a href="javascript:void(0);">
                                <img width="366" height="340"
                                     src="images/<?php echo $dsp['UrlHinh']; ?>"
                                     class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                     alt=""
                                     sizes="(max-width: 366px) 100vw, 366px">
                            </a>
                            <div class="caption">
                                <p class="font_7"><?php echo $dsp['TenSP']; ?></p>
                                <p class="font_7"><em><b><?php echo $dsp['Gia']; ?> ₫</b></em></p>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-default">Add to cart
                                    </button>
                                </div>
                                <input type="hidden" name="idSP" value="<?php echo $dsp['idSP']; ?>">
                                <input type="hidden" id="TenSP" name="TenSP" value="<?php echo $dsp['TenSP']; ?>"/>
                                <input type="hidden" id="Gia" name="Gia" value="<?php echo $dsp['Gia']; ?>"/>
                                <input type="hidden" id="soluong" name="soluong" value="1"/>
                                <input type="hidden" id="UrlHinh" name="UrlHinh"
                                       value="<?php echo $dsp['UrlHinh']; ?>"/>
                                <input type="hidden" id="addtocart" name="addtocart"/>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!--        END PRODUCT-->
</div>
<div class="pag" style="text-align: center;">
    <ul class="pagination">
        <li><a href="#">«</a></li>
        <?php
        for ($i = 1; $i <= $so_page; $i++) {
            if ($i == $page)
                echo "<li><span><b>$i</b></span></b>" . " ";
            else
                echo "<li><a href='index.php?sk=$idSK&page=$i'>$i</a></li>" . " ";
        }
        ?>
        <li><a href="#">»</a></li>
    </ul>
</div>