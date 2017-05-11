<?php
$userInfo = $data;
?>
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <a name="login"></a>
            <h4 class="style">Đăng nhập hoặc đăng ký</h4>
        </div>
    </div>
</div>
<!-- start main -->

<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="login_left">
                <h3>Tạo tài khoản mới</h3>
                <p>Với tài khoản được tạo bạn có thể thanh toán mua hàng nhanh, quản lý đơn hàng, giỏ hàng, lưu trữ thông tin và nhiều hơn nữa.</p>
                <div class="btn" style="background: none;">
                    <form>
                        <input type="button"  onclick="location.href = 'index.php?con=user&act=register';" value="create an account" />
                    </form>
                </div>
            </div>
            <div class="login_left">
                <h3>Đăng nhập</h3>
                <?php
                if (isset($_POST['btnLogin']) && $userInfo == null) {
                    ?>
                    <div class = "alert alert-danger" role = "alert">
                        <strong>Error!</strong> Username hoặc password không hợp lệ.
                    </div>
                    <?php
                }
                ?>
                <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập.</p>
                <!-- start registration -->
                <div class="registration">
                    <!-- [if IE] 
                        < link rel='stylesheet' type='text/css' href='ie.css'/>  
                     [endif] -->  

                    <!-- [if lt IE 7]>  
                        < link rel='stylesheet' type='text/css' href='ie6.css'/>  
                    <! [endif] -->  
                    <script>
                        (function () {

                            // Create input element for testing
                            var inputs = document.createElement('input');

                            // Create the supports object
                            var supports = {};

                            supports.autofocus = 'autofocus' in inputs;
                            supports.required = 'required' in inputs;
                            supports.placeholder = 'placeholder' in inputs;

                            // Fallback for autofocus attribute
                            if (!supports.autofocus) {

                            }

                            // Fallback for required attribute
                            if (!supports.required) {

                            }

                            // Fallback for placeholder attribute
                            if (!supports.placeholder) {

                            }

                            // Change text inside send button on submit
                            var send = document.getElementById('register-submit');
                            if (send) {
                                send.onclick = function () {
                                    this.innerHTML = '...Sending';
                                }
                            }

                        })();
                    </script>
                    <div class="registration_left">

                        <div class="registration_form">
                            <!-- Form -->
                            <form id="frmForm" method="post">
                                <div>
                                    <label>
                                        <input placeholder="Tên đăng nhập" type="text" tabindex="3" required="" name="txtUsername">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input placeholder="password" type="password" tabindex="4" required="" name="txtPassword">
                                    </label>
                                </div>						
                                <div>
                                    <input type="submit" value="Đăng nhập" id="btnLogin" name="btnLogin">
                                </div>
                                <div class="forget">
                                    <a href="index.php?con=user&act=quenmatkhau">Quên mật khẩu ?</a>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
                <!-- end registration -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>