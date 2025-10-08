

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

                                    <h4 class="header-title mt-0 mb-3">Sản phẩm</h4>

                                    <form data-parsley-validate id="formadd" novalidate onsubmit="return submitForm()"  method="post" enctype="multipart/form-data">
                                   <div class="form-group">
                                        <label for="">Ảnh sản phẩm</label>
                                        <div id="current-images" style="display:flex;flex-wrap:wrap;">
                                            <?php
                                            $images = explode(",", $oneRecode['image_list']);
                                            foreach ($images as $idx => $imgName):
                                                $imgPath = PATH_IMG_SITE . $imgName;
                                            ?>
                                                <div style="position:relative; margin:5px;">
                                                    <img src="<?= $imgPath ?>" width="100" height="100" style="object-fit:cover;">
                                                    <button type="button" class="btn-delete-img" data-index="<?= $idx ?>" style="position:absolute;top:2px;right:2px;background:red;color:white;border:none;border-radius:50%;width:24px;height:24px;cursor:pointer;">X</button>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <input type="hidden" name="old_images" id="old_images" value="<?= htmlspecialchars($oneRecode['image_list']) ?>">
                                        <br>
                                        <label>Thêm ảnh mới:</label>
                                        <input class="mt-2" type="file" name="img[]" multiple>
                                    </div>

                                    <div class="form-group">
                                        <label for="videoLinks">Link Video (YouTube/TikTok)</label>
                                        <div class="video-input-container">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control video-link" placeholder="Dán link YouTube hoặc TikTok vào đây">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary add-video-link">Thêm</button>
                                                </div>
                                            </div>
                                            <small class="text-muted">Hỗ trợ link YouTube (youtube.com hoặc youtu.be) và TikTok</small>
                                            <div id="videoPreview" class="mt-2">
                                                <!-- Video previews will be added here -->
                                            </div>
                                            <input type="hidden" name="videoLinks" id="videoLinksInput" value="<?= htmlspecialchars($oneRecode['videoLinks'] ?? '') ?>">
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Tên sản phẩm</label><span style="color:red;"> (*)</span>
                                                    <input type="text" name="name_product"  parsley-trigger="change" required
                                                        placeholder="Nhập tên sản phẩm" value="<?=$oneRecode['name']?>" class="form-control" id="userName">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label for="">Giá</label>
                                                    <input  type="number" name="price" parsley-trigger="change" id="discount"
                                                        placeholder="Type rice" value="<?=$oneRecode['price']?>" class="form-control" >
                                                </div>    
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Giảm giá</label>
                                                    <input  type="number" name="discount" parsley-trigger="change" 
                                                        placeholder="Type discount (%)" value="<?=$oneRecode['discount']?>" class="form-control" id="emailAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Màu</label>
                                                    <div class="color-picker-container">
                                                        <input type="color" id="colorPicker" class="form-control" style="height: 40px;">
                                                        <button type="button" class="btn btn-primary ml-2" id="addColor">Thêm màu</button>
                                                    </div>
                                                    <div id="selectedColors" class="mt-2 d-flex flex-wrap">
                                                        <!-- Selected colors will appear here -->
                                                    </div>
                                                    <input type="hidden" name="color" id="colorInput" value="<?=$oneRecode['color']?>">
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Danh mục</label><span style="color:red;"> (*)</span>
                                                    <select class="form-control" name="IDCate">
                                                        <?php 
                                                            foreach ($producer as $row) {
                                                                if($row['id'] == $oneRecode['catalog_id']){
                                                                    echo '<option value='.$row['id'].' selected>'.$row['name'].'</option>';
                                                                }else{
                                                                    echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                                                                }
                                                            }   
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Kích cỡ</label>
                                                    <input type="text" class="form-control" value="<?=$oneRecode['size']?>" name="size" >
                                                </div> 
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Nhãn hiệu</label><span style="color:red;"> (*)</span>
                                                    <select class="form-control" name="brand">
                                                    <?php 
                                                            foreach ($listcate as $row) {
                                                                $brand2 =$this->modelCate->getCateBrand2($row['id']);
                                                                foreach ($brand2 as $key) {
                                                                    if($key['hangcosan'] == 1) $co = ' - ('.$row['name'].') - (ORDER)'; else $co = "";
                                                                if ($key['slug'].'-'.$key['hangcosan'] == $oneRecode['Brand'] && $key['hangcosan'] == $oneRecode['cosan']) {
                                                                    if($key['hangcosan'] == 0){
                                                                        echo '<option value="'.$key['name'].'" selected>'.$key['name'].'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$key['name'].'" selected>'.$key['name'].''.$co.'</option>';
                                                                    }
                                                                }else{
                                                                    echo '<option value="'.$key['name'].'">'.$key['name'].''.$co.'</option>';
                                                                }
                                                                }
                                                                
                                                                
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <input id="remember-1" type="checkbox" name="hot" value="" <?=($oneRecode['hot']==1) ? 'checked' : '';?> data-parsley-multiple="remember-1">
                                                        <label for="remember-1">Nổi bật ? </label>
                                                    </div>
                                                </div>          
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <input id="remember-2" type="checkbox" name="cosan" value="" <?=($oneRecode['cosan']==0) ? 'checked' : '';?> data-parsley-multiple="remember-2">
                                                        <label for="remember-2">Có sẵn </label>
                                                    </div>
                                                </div>          
                                            </div>
                                            
                                            
                                        </div>
                                        <label for="">Mô tả</label>
                                        <textarea id="editor1"  style="height: 300px;width:100%" name="Description" >
                                        
                                        <?=$oneRecode["description"]?>
                                        </textarea>
                                        

                                        <div class="form-group text-right mb-0 mt-5">
                                           <a href="<?=ROOT_URL?>/admin/?ctrl=product&act=index" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                                           <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Sửa">
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
<link href="<?=ROOT_URL?>/admin/views/assets/css/color-picker.css" rel="stylesheet" type="text/css" />
<script src="<?=ROOT_URL?>/admin/views/assets/js/custom_editproduct.js"></script>
<script src="<?=ROOT_URL?>/admin/views/assets/js/color-picker.js"></script>
<script src="<?=ROOT_URL?>/admin/views/assets/js/product-media.js"></script>