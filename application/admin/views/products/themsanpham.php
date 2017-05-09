<?php
require 'controllers/categories.php';
$categories = new categories();
$danhSachCategories = $categories->xuatTatCaChuyenMuc();
?>
<h3 class="title1">Thêm sản phẩm</h3>
<div class="form-three widget-shadow">
    <?php
    if ($this->content !== '') {
        ?>
        <div class = "alert alert-success alert-dismissible" role = "alert">
        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true">&times;
        </span></button>
        <strong>Success!</strong> Thêm sản phẩm thành công.
        </div>
    <?php
    }
        ?>
    <form class="form-horizontal" data-toggle="validator" required method = "POST"
          enctype = "multipart/form-data" id="formThemSanPham">
        <div class="form-group has-feedback">
            <label for="tenSanPham" class="col-sm-2 control-label">Tên sản phẩm</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="tenSanPham" 
                       name="tenSanPham" placeholder="Tên sản phẩm ..." 
                       required data-error="Tên sản phẩm không được trống!">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="moTaSanPham" class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-8">
                <textarea name="moTaSanPham" id="moTaSanPham" cols="50" rows="5" class="form-control1" placeholder="Mô tả sản phẩm..." data-error="Mô tả sản phẩm không được trống!" required></textarea>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="loaiSanPham" class="col-sm-2 control-label">Loại sản phẩm</label>
            <div class="col-sm-8">
                <select name="loaiSanPham" id="loaiSanPham" class="form-control1">
                    <option value="-1">--Chọn loại sản phẩm--</option>
                    <?php
                    $size = count($danhSachCategories);
                    for ($i = 0; $i < $size; $i++) {
                        ?>
                        <option value="<?php echo $danhSachCategories[$i]->CatID; ?>"><?php echo $danhSachCategories[$i]->CatName; ?></option>
                        <?php
                    }
                    ?>
                </select>
               
                <span class="help-block with-errors" id="sltLoai">Chọn loại sản phẩm!</span>
            </div>
        </div>

        <div class="form-group">
            <label for="nhomSanPham" class="col-sm-2 control-label">Nhóm sản phẩm</label>
            <div class="col-sm-8">
                <select name="nhomSanPham" id="nhomSanPham" class="form-control1">

                </select>
            </div>
        </div>

        <div class="form-group col-sm-6 has-feedback">
            <label for="giaTien" class="col-sm-4 control-label label-input-sm">Giá tiền</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="giaTien" name="giaTien" placeholder="Giá ..." required data-error="Giá không được trống!"/>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="form-group col-sm-5 has-feedback">
            <label for="giaKhuyenMai" class="col-sm-4 control-label label-input-sm">Khuyến mãi</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="giaKhuyenMai" id="giaKhuyenMai" placeholder="0 hoặc giá ..." required data-error="Giá khuyến mãi không được trống!">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group has-feedback">
            <label for="anhDaiDien" class="col-sm-2 control-label label-input-sm">Ảnh đại diện</label>
            <div class="col-sm-8">
                <input type="file" class="form-control1" id="anhDaiDien" name="anhDaiDien" required data-error="Chọn ảnh đại diện!">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="danhSachAnh" class="col-sm-2 control-label label-input-sm">Ảnh sản phẩm</label>
            <div class="col-sm-8">

                <input type="file" class="form-control1" name="danhSachAnh[]" multiple="true" id="danhSachAnh" name="danhSachAnh" accept="image/*" onchange="previewImg(event);" required data-error="Chọn 5 ảnh sản phẩm!"/>
                <span class="glyphicon form-control-feedback" id="input-files" aria-hidden="true"></span>
                <span class="help-block with-errors" id="multiple-file">Tối đa 5 ảnh sản phẩm</span>
                <div class="box-preview-img"></div>
            </div>

        </div>
        <div class="form-group has-feedback">
            <label for="noiDungSanPham" class="col-sm-2 control-label">Nội dung sản phẩm</label>
            <div class="col-sm-8">
                <textarea name="noiDungSanPham" id="noiDungSanPham" class="form-control1 textarea-addpro" placeholder="Mô tả sản phẩm..." data-error="Nội dung sản phẩm không được trống!" required></textarea>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2 text-right">
                <button type="reset" class="btn btn-danger" id="btnReset" name="btnReset">Reset</button>
                <button type="submit" class="btn btn-success" id="btnThemSanPham" name="btnThemSanPham">Add</button>
            </div>
        </div>
    </form>
</div>
<script src="public/js/validator.min.js" type="text/javascript"></script>
<script src="public/js/previewUpload.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#loaiSanPham").val();
            if(id === '-1'){
                $("#btnThemSanPham").addClass("disabled");
            }
        $("#btnThemSanPham").click(function(){
            if(id === '-1'){
                $('#sltLoai').css('display', 'block'); 
            }
        });
        $("#loaiSanPham").change(function () {
            id = $("#loaiSanPham").val();
            if(id === '-1'){
                $('#sltLoai').css('display','block');
                $("#btnThemSanPham").attr("disabled", true);
                return false;
            }
            else{  
                $('#sltLoai').css('display','none');
                $("#btnThemSanPham").attr("disabled", false);
                $('#nhomSanPham').empty();
                $.ajax({
                    url: "handle/handle_ajax.php",
                    type: "POST",
                    data: "id=" + id + "&action=getSubcategories",
                    async: true,
                    success: function (data) {
                        data = $.parseJSON(data);
                        var textHTML = '';
                        if (data !== null) {
                            $.each(data, function (key, value) {
                                textHTML += '<option value=' + value.SubCatID + '>' + value.SubCatName + '</option>';
                            });
                        }
                        else{
                            textHTML = "<option value='-1'>Không có nhóm sản phẩm</option>";
                        }
                        $('#nhomSanPham').html(textHTML);
                    }
                });
            }
            return false;
        });
        
        
    });
</script>