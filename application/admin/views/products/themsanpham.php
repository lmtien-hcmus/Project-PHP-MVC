<h3 class="title1">Thêm sản phẩm</h3>
<div class="form-three widget-shadow">
    <form class="form-horizontal" method = "POST" enctype = "multipart/form-data">
        <div class="form-group">
            <label for="proName" class="col-sm-2 control-label">Tên sản phẩm</label>
            <div class="col-sm-8">
                <input type="text" class="form-control1" id="proName" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="col-sm-4 col-md-offset-2">
                <p class="help-block">Your help text!</p>
            </div>
        </div>
        <div class="form-group">
            <label for="moTaSanPham" class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-8"><textarea name="moTaSanPham" id="txtarea1" cols="50" rows="5" class="form-control1" placeholder="Mô tả sản phẩm..."></textarea></div>
            <div class="col-sm-4 col-md-offset-2">
                <p class="help-block">Your help text!</p>
            </div>
        </div>
        <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Loại sản phẩm</label>
            <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                    <option>Quần áo nam.</option>
                    <option>Quần áo nữ</option>
                    <option>Phụ kiện</option>
                </select></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nhóm sản phẩm</label>
            <div class="col-sm-8">
                <select multiple="" class="form-control1">
                    <option>Nhóm 1</option>
                    <option>Nhóm 2</option>
                    <option>Nhóm 3</option>
                    <option>Nhóm 4</option>
                    <option>Nhóm 5</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="smallinput" class="col-sm-2 control-label label-input-sm">Giá tiền</label>
            <div class="col-sm-3">
                <input type="text" class="form-control1 input-sm" id="smallinput" placeholder="Giá ...">
            </div>
            <label for="smallinput" class="col-sm-2 control-label label-input-sm">Khuyến mãi</label>
            <div class="col-sm-3">
                <input type="text" class="form-control1 input-sm" id="smallinput" placeholder="0 hoặc giá khuyến mãi">
            </div>
        </div>
        <div class="form-group">
            <label for="smallinput" class="col-sm-2 control-label label-input-sm">Ảnh đại diện</label>
            <div class="col-sm-8">
                <input type="file" class="form-control1 input-sm" id="smallinput" placeholder="Small Input">
            </div>
        </div>
        <div class="form-group">
            <label for="smallinput" class="col-sm-2 control-label label-input-sm">Ảnh sản phẩm</label>
            <div class="col-sm-8">
                <input type="file" class="form-control1" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*"/>
            </div>
            <div class="box-preview-img"></div>
        </div>
        <div class="form-group ">
            <label for="moTaSanPham" class="col-sm-2 control-label">Nội dung sản phẩm</label>
            <div class="col-sm-8">
                <textarea name="moTaSanPham" id="txtarea1" class="form-control1 noidung" placeholder="Mô tả sản phẩm..."></textarea>
            </div>
            <div class="col-sm-4 col-md-offset-2">
                <p class="help-block">Error!</p>
            </div>
        </div>
    </form>
</div>
