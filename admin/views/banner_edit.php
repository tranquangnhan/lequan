

<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-10">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Danh mục</h4>

                                    <form data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                    <img src="<?=PATH_IMG_ADMIN.$oneRecord['bannerImage']?>" width="200" height="200">
                                    <div class="boxform boxshowimg ">
                                            <div class="ouputimg">
                                                <br>
                                                <div class="output-fet"><output id="list"></output></div>
                                                <a href="#" id="clear">Xoá</a>
                                            </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="inputhinh">
                                                <label for="">Image Url</label><span style="color:red;"> (*)</span>
                                                <input type="file" name="img1[]" style=" position: absolute;" class="imagefet" id="control" multiple>
                                            </div>
                                        </div>
                                   
                                        <div class="form-group">
                                            <label for="bannerLink">Đường dẫn liên kết</label>
                                            <input type="text" name="bannerLink" id="bannerLink" class="form-control" placeholder="Nhập đường dẫn cho banner (có thể để trống)" value="<?=$oneRecord['bannerLink']?>">
                                            <small class="text-muted">Ví dụ: /san-pham/giay-nike hoặc https://example.com</small>
                                        </div>

                                       
                                        <div class="form-group text-right mb-0 ">
                                            <input type="submit" name="sua" class="btn btn-primary waves-effect waves-light mr-1" value="Cập nhật">
                                            <a href="<?=ROOT_URL?>/admin/?ctrl=banner" class="btn btn-secondary waves-effect waves-light">Hủy</a>
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>