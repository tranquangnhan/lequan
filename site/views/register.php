<aside id="notifications">
    <div class="container"></div>
</aside>

<section id="wrapper" class="register">
    <div class="container">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12">
                <section id="main">
                    <header class="page-header">
                        <h1 class="kk-innertitle">
                            Tạo tài khoản
                        </h1>
                    </header>

                    <section id="content" class="page-content card card-block">
                        <section class="register-form">
                            <form data-parsley-validate novalidate id="customer-form" class="js-customer-form"
                                method="post">
                                <section>
                                    <input type="hidden" name="id_customer" value="" />
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label required">
                                            Tên đầy đủ
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="name" type="text" value="" required />
                                        </div>

                                        <div class="col-md-3 form-control-comment"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label required">
                                            Email
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="email" type="email" value="" required />
                                        </div>

                                        <div class="col-md-3 form-control-comment"></div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label required">
                                           Mật khẩu
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password"
                                                    name="password" title="At least 5 characters long" type="password"
                                                    value="" pattern=".{5,}" required />
                                                <span class="input-group-btn">
                                                    <button class="btn" type="button" data-action="show-password"
                                                        data-text-show="Show" data-text-hide="Hide">
                                                        Hiện
                                                    </button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-3 form-control-comment"></div>
                                    </div>
                                    <?php
                                            if($nullerror && $nullerror!=''){
                                              echo '<span style="color:red;">'.$nullerror.'</span>';
                                          }
                                            if($emailexist && $emailexist!=''){
                                              echo '<span style="color:red;">'.$emailexist.'</span>';
                                            }
                                            ?>
                                </section>
                                Đã có tài khoản <a
                                        href="<?php echo ROOT_URL?>/dang-nhap">Đăng nhập ngay</a></p>

                                <footer class="form-footer clearfix">
                                    <input type="hidden" name="submitCreate" value="1" />

                                    <button class="btn btn-primary form-control-submit " name="register"
                                        data-link-action="save-customer" type="submit">
                                        Đăng kí
                                    </button>
                                </footer>
                            </form>
                        </section>
                    </section>

                    <footer class="page-footer">
                        <!-- Footer content -->
                    </footer>
                </section>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div id="_mobile_left_column" class=""></div>
    <div id="_mobile_right_column" class=""></div>
    <div class="clearfix"></div>
</div>