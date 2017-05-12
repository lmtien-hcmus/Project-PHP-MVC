<?php var_dump($data);?>
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h4 class="style">Đăng ký</h4>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="login_left">
                <a name="register"></a>
                <h3>Dăng nhập</h3>
                <p>Nếu bạn có tài khoản, vui lòng đăng nhập.</p>
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
                            <form id="frmLogin" name="frmLogin" method="post">
                                <div>
                                    <label>
                                        <input placeholder="Tên đăng nhập" type="text" tabindex="3" required="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input placeholder="Mật khẩu" type="password" tabindex="4" required="">
                                    </label>
                                </div>						
                                <div>
                                    <input type="submit" value="Đăng nhập" id="btnLogin" name="btnLogin">
                                </div>
                                <div class="forget">
                                    <a href="#">Quên mật khẩu ?</a>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
                <!-- end registration -->
            </div>
            <div class="login_left">
                <h3>Tạo tài khoản mới</h3>
                <?php
                if (isset($_POST['btnRegister']) && $data == null) {
                    ?>
                    <div class = "alert alert-danger" role = "alert">
                        <strong>Error!</strong> Username hoặc Email đã tồn tại.
                    </div>
                    <?php
                }
                ?>
                <p>Với tài khoản được tạo bạn có thể thanh toán mua hàng nhanh, quản lý đơn hàng, giỏ hàng, lưu trữ thông tin và nhiều hơn nữa.</p>
                <div class="registration_left">
                    
                    <div class="registration_form">
                        <!-- Form -->
                        <form id="frmRegister" name="frmRegister" method="post">
                            <div>
                                <label>
                                    <input placeholder="First name" type="text" tabindex="1" name="firstName" required="" autofocus="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="Last name" type="text" tabindex="2" name="lastName" required="" autofocus="">
                                </label>
                            </div>
                            <div class="sky_form">
                                <ul>
                                    <li><label class="radio left"><input type="radio" name="rdSex" value="1" checked=""><i>Nam</i></label></li>
                                    <li><label class="radio"><input type="radio" name="rdSex" value="0"><i>Nữ</i></label></li>
                                </ul>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="email address:" name="txtEmail" type="email" tabindex="3" required="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="username:" name="txtUsername" type="text" tabindex="4" required="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="password" type="password" name="txtPassword" tabindex="5" required="">
                                </label>
                            </div>						
                            <div>
                                <label>
                                    <input placeholder="retype password" type="password" name="txtRePassword" tabindex="4" required="">
                                </label>
                            </div>	
                            <div>
                                <label>
                                    <input placeholder="Address" type="text" name="txtAddress" tabindex="6" required="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="Phone" type="text" name="txtPhone" tabindex="7" required="">
                                </label>
                            </div>
                            <div>
                                <input type="submit" value="Đăng ký" id="btnRegister" name="btnRegister">
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>