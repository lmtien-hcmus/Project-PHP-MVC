<h3 class="title1">Thêm sản phẩm</h3>
<div class="form-three widget-shadow">
    <form class="form-horizontal" data-toggle="validator" required method = "POST" enctype = "multipart/form-data" id="formThemSanPham">
        <div class="form-group has-feedback">
            <label for="proName" class="col-sm-2 control-label">Tên sản phẩm</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="proName" placeholder="Tên sản phẩm ..." required data-error="Tên sản phẩm không được trống!">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="moTaSanPham" class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-8">
                <textarea name="moTaSanPham" id="txtarea1" cols="50" rows="5" class="form-control1" placeholder="Mô tả sản phẩm..." data-error="Mô tả sản phẩm không được trống!" required></textarea>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Loại sản phẩm</label>
            <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                    <option selected value="quanaonam">Quần áo nam.</option>
                    <option>Quần áo nữ</option>
                    <option>Phụ kiện</option>
                </select></div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nhóm sản phẩm</label>
            <div class="col-sm-8">
                <select multiple="" class="form-control1">
                    <option selected value="nhom1">Nhóm 1</option>
                    <option>Nhóm 2</option>
                    <option>Nhóm 3</option>
                    <option>Nhóm 4</option>
                    <option>Nhóm 5</option>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-6 has-feedback">
            <label for="giaTien" class="col-sm-4 control-label label-input-sm">Giá tiền</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="giaTien" name="giaTien" placeholder="Giá ..." required data-error="Giá không được trống!"/>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="form-group col-sm-5 has-feedback">
            <label for="khuyenMai" class="col-sm-4 control-label label-input-sm">Khuyến mãi</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="khuyenMai" placeholder="0 hoặc giá ..." required data-error="Giá khuyến mãi không được trống!">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group has-feedback">
            <label for="product_thumb" class="col-sm-2 control-label label-input-sm">Ảnh đại diện</label>
            <div class="col-sm-8">
                <input type="file" class="form-control1" id="product_thumb" name="product_thumb" required data-error="Chọn ảnh đại diện!">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="danhSachAnh" class="col-sm-2 control-label label-input-sm">Ảnh sản phẩm</label>
            <div class="col-sm-8">
                <input type="file" class="form-control1" name="img_file[]" multiple="true" id="danhSachAnh" name="product_thumb" accept="image/*" 
                       required data-error="Chọn danh sách ảnh sản phẩm!"/>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span class="help-block with-errors"></span>
            </div>
            <div class="box-preview-img"></div>
        </div>
        <div class="form-group has-feedback">
            <label for="moTaSanPham" class="col-sm-2 control-label">Nội dung sản phẩm</label>
            <div class="col-sm-8">
                <textarea name="moTaSanPham" id="txtarea1" class="form-control1 textarea-addpro" placeholder="Mô tả sản phẩm..." data-error="Nội dung sản phẩm không được trống!" required></textarea>
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
<script type="text/javascript">
    $(document).ready(function(){
       $("#btnThemSanPham").click(function(){
          var input = $("#formThemSanPham").serializeArray();
          console.log(input);
       });
   
    });
</script>