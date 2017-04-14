<?php


if ($trangHienTai != 1) {
    ?>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=1&total=<?php echo $tongMauTin; ?>" title="Trang đầu">First</a>
    <?php
}
if ($trangHienTai > 1) {
    ?>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $trangHienTai - 1; ?> &total=<?php echo $tongMauTin; ?>" title="Trang trước"> < </a>
    <?php
}
for ($i = 1; $i < $tongSoTrang; $i++) {
    if ($i == $trangHienTai) {
        echo "<b>$i</b>";
    } else {
        ?>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $trangHienTai - 1; ?>&total=<?php echo $tongMauTin; ?>" title="Trang <?php echo $i; ?>"> <?php echo $i; ?> </a>
        <?php
    }
}
if ($trangHienTai + 1 >= $tongSoTrang) {
    ?>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo ($trangHienTai + 1); ?>&total=<?php echo $tongMauTin; ?>" title="Trang sau"> > </a>
    <?php
}
if (($trangHienTai != $tongSoTrang) && ($tongSoTrang != 0)) {
    ?>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $tongSoTrang; ?>&total=<?php echo $tongMauTin; ?>" title="trang cuối"> Last</a>
    <?php
}
?>
