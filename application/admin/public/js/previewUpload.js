/* global URL */

function previewImg(event) {
    // Gán giá trị các file vào biến files
    var files = document.getElementById('danhSachAnh').files;
    if (files.length > 5) {
        $('#multiple-file').css('display', 'block');
        $("#btnThemSanPham").attr("disabled", true);
        return false;
    } else {
        $('#multiple-file').css('display', 'none');
        var id = $("#loaiSanPham").val();
        if (id !== '-1') {
            $("#btnThemSanPham").attr("disabled", false);
        }
    }
    // Show khung chứa ảnh xem trước
    $('.box-preview-img').show();

    // Thêm chữ "Xem trước" vào khung
    $('.box-preview-img').html('<p>Xem trước</p>');

    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
        // Thêm thẻ img theo i
        $('.box-preview-img').append('<img src="" id="' + i + '">');

        // Thêm src vào mỗi thẻ img theo id = i
        $('.box-preview-img img:eq(' + i + ')').attr('src', URL.createObjectURL(event.target.files[i]));
    }
}