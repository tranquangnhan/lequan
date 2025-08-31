

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
                                    <!-- <div class="boxform boxshowimg ">
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
                                            
                                        </div> -->
                                        <div class="form-group">
                                            <label for="">Tên danh mục</label>
                                            <input type="text" name="name_category" value="<?=$oneRecode['name']?>"  parsley-trigger="change" required
                                                   placeholder="Nhập tên danh mục" class="form-control" id="userName">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kiểu</label>
                                            <select name="kieu_menu" class="custom-select" id="">
                                                <?php
                                                    if($oneRecode['style'] == 0){
                                                        echo '<option value="0" selected>Ngang</option>
                                                        <option value="1">Dọc</option>';
                                                    }else{
                                                        echo '<option value="0" >Ngang</option>
                                                        <option value="1" selected>Dọc</option>';
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                    <div class="checkbox">
                                                        <input id="remember-2" type="checkbox" name="cosan" value="" <?=($oneRecode['hangcosan']==0) ? 'checked' : '';?> data-parsley-multiple="remember-2">
                                                        <label for="remember-2">Có sẵn </label>
                                                    </div>
                                                </div> 
                                        
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea id="editor1" style="height: 300px;width:100%" name="des_category" >
                                            <?=$oneRecode['description']?>
                                        </textarea>
                                       
                                            
                                        </div>
                                        <label for="">Thuộc</label>
                                        <select class="custom-select form-group" name="IDcate">
                                            
                                            <?php
                                                if($oneRecode['parent']==0){
                                                    if($row['style'] == 1) $style= " (dọc)";
                                                    echo '<option value="0" selected>Không thuộc</option>';
                                                    foreach ($listchild as $row) {
                                                            echo '<option value='.$row['id'].'>'.$row['name'].''.$style.'</option>';
                                                    } 
                                                }
                                                if($oneRecode['parent']!=0){                                                    
                                                    foreach ($listchild as $row) {
                                                        $name_Cate= $this->model->showOneProducer($row['parent']);
                                                        if($row['style'] == 1) $style= " - (dọc)(".$name_Cate['name'].")";
                                                        else{
                                                            if($name_Cate['name']) $style = " - (".$name_Cate['name'].")";
                                                            else $style = "";
                                                        } 
                                                        if($row['id'] == $oneRecode['parent'] && $row['style'] == $oneRecode['style']){
                                                            if($row['style'] == 1){
                                                                echo '<option value='.$row['id'].' selected>'.$row['name'].''.$style.'</option>';
                                                            }else{
                                                                echo '<option value='.$row['id'].' selected>'.$row['name'].'</option>';
                                                            }
                                                            
                                                        }else{
                                                            echo '<option value='.$row['id'].'>'.$row['name'].''.$style.'</option>';
                                                        }
                                                    } 
                                                }
                                                    
                                                     
                                                    
                                                
                                            ?>
                                            
                                        </select>
                                       
                                        <div class="form-group text-right mb-0 ">
                                            <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Cập nhật">
                                            <a href="<?=ROOT_URL?>/admin/?ctrl=categories" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>