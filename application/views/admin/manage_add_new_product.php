<!DOCTYPE html>
<html lang="en">

    <!--Head-->
    <?php
    $this->load->view('admin/head');
    ?>
    <div>
        <div>



            <div id="spinner"></div>

            <!--Header-->
            <?php
            $this->load->view('admin/header');
            ?>

            <!--menu-->
            <?php
            $this->load->view('admin/menu');
            ?>

            <div class="app-content">
                <section class="section">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Product</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Add New Product</a></li>
                    </ol>
                    <?php 
                        if($this->session->userdata('product_form') == 1)
                        {
                    ?>
                    <div class="row">                        
                        <div class="col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Product Details</h4>
                                    <i class="fa fa-cloud-upload-alt"></i>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="" novalidate="" class="myform" name="form1" >
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Main Category</label>
                                                        <select class="form-control myform <?php
                                                            if (form_error('main')) {
                                                                echo "err-border";
                                                            }
                                                            ?> " required="" name="main" onchange="set_combo('sub',this.value);">
                                                            <option value="">Select Main Category</option>
                                                            <?php 
                                                                foreach($main as $data)
                                                                {
                                                                ?>    
                                                             <option value="<?php echo $data->category_id; ?>" <?php 
                                                                if(!isset($success) && set_select('main',$data->category_id))
                                                                {
                                                                    echo set_select('main',$data->category_id);
                                                                }
                                                                else
                                                                {
                                                                    if( isset($productdetail) && $productdetail->main_id == $data->category_id)
                                                                    {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                             ?>  ><?php echo $data->name; ?></option>
                                                             <?php 
                                                                }
                                                             ?>
                                                        
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('main');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub Category</label>
                                                        <select class="form-control myform <?php
                                                            if (form_error('sub')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" id="sub" name="sub" required="" onchange="set_combo('peta',this.value);">
                                                            <option value="">Select Sub Category</option>
                                                            <?php 
                                                                if($this->input->post('main'))
                                                                {
                                                                    $wh['parent_id'] = $this->input->post('main');
                                                                    $sub = $this->md->my_select('tbl_category','*',$wh);
                                                                    
                                                                    foreach ($sub as $data)
                                                                    {
                                                                 
                                                            ?>
                                                        <option value="<?php echo $data->category_id; ?>" <?php 
                                                            if(!isset($success) && set_select('sub',$data->category_id))
                                                            {
                                                                echo set_select('sub',$data->category_id);
                                                            }
                                                            
                                                        ?>><?php echo $data->name; ?></option>
                                                          <?php 
                                                                    }
                                                                }
                                                                else if(isset($productdetail))
                                                                {
                                                                    $wh['parent_id'] = $productdetail->main_id;
                                                                    $sub = $this->md->my_select('tbl_category','*',$wh);
                                                                    
                                                                    foreach ($sub as $data)
                                                                    {
                                                                 
                                                            ?>
                                                        <option value="<?php echo $data->category_id; ?>" <?php 
                                                            if(!isset($success) && set_select('sub',$data->category_id))
                                                            {
                                                                echo set_select('sub',$data->category_id);
                                                            }
                                                            else if(isset($productdetail))
                                                            {
                                                                if($productdetail->sub_id == $data->category_id)
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            
                                                        ?>><?php echo $data->name; ?></option>
                                                          <?php 
                                                                    } 
                                                                }
                                                          ?>  
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('sub');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Peta Category</label>
                                                        <select class="form-control myform <?php
                                                            if (form_error('peta')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" required="" name="peta" id="peta">
                                                            <option value="">Select Peta Category</option>
                                                        <?php 
                                                        if($this->input->post('sub'))
                                                        {
                                                            $wh['parent_id']=$this->input->post('sub');
                                                            $peta=$this->md->my_select('tbl_category','*',$wh);
                                                            foreach($peta as $data)
                                                            {
                                                              
                                                        ?>
                                                         <option value="<?php echo $data->category_id; ?>" <?php 
                                                            if(!isset($success) && set_select('peta',$data->category_id))
                                                            {
                                                                echo set_select('peta',$data->category_id);
                                                            }
                                                         ?> ><?php echo $data->name; ?></option> 
                                                         <?php 
                                                            }
                                                           }
                                                           else if(isset($productdetail))
                                                           {
                                                            $wh['parent_id']= $productdetail->sub_id;
                                                            $peta = $this->md->my_select('tbl_category','*',$wh);
                                                            foreach($peta as $data)
                                                            {
                                                              
                                                        ?>
                                                         <option value="<?php echo $data->category_id; ?>" <?php 
                                                            if(!isset($success) && set_select('peta',$data->category_id))
                                                            {
                                                                echo set_select('peta',$data->category_id);
                                                            }
                                                            else if(isset($productdetail))
                                                            {
                                                                if($productdetail->peta_id == $data->category_id)
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                         ?> ><?php echo $data->name; ?></option> 
                                                         <?php 
                                                            }
                                                           }
                                                         ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('peta');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group" >
                                                            <label>Product Description</label>
                                                        </div>
                                                        <textarea id="editor1" required="" name="description"><?php 
                                                            if(!isset($success) && set_value('description'))
                                                            {
                                                                echo set_value('description');
                                                            }
                                                            else if(isset($productdetail))
                                                                {
                                                                    echo $productdetail->description;
                                                                }
                                                        ?></textarea>
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('description');
                                                            ?>
                                                        </p>
                                                        
                                                    </div>
                                                    <br>
                                                    <button type="submit" name="next" value="yes" v class="btn btn-primary mt-1 mb-0">Next <i class="fa fa-chevron-right"></i></button>
                                                    <button type="reset" class="btn btn-danger mt-1 mb-0">Clear</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card-body ">                                                
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Name</label>
                                                        <input type="text" class="form-control myform <?php
                                                            if (form_error('name')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" value="<?php 
                                                                if(!isset($success) && set_value('name'))
                                                                {
                                                                    echo set_value('name');
                                                                }
                                                                else if(isset($productdetail))
                                                                {
                                                                    echo $productdetail->name;
                                                                }
                                                            ?>" name="name" required="" placeholder="Product Name">
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('name');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Code</label>
                                                        <input type="text" name="code" required="" class="form-control myform <?php
                                                            if (form_error('code')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" value="<?php 
                                                                if(!isset($success) && set_value('code'))
                                                                {
                                                                    echo set_value('code');
                                                                }
                                                                else if(isset($productdetail))
                                                                {
                                                                    echo $productdetail->code;
                                                                }
                                                            ?>" placeholder="Product Code">
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('code');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Price</label>
                                                        <input type="text" name="price" required="" pattern="^[0-9]+$" class="form-control myform <?php
                                                            if (form_error('price')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" value="<?php 
                                                                if(!isset($success) && set_value('price'))
                                                                {
                                                                    echo set_value('price');
                                                                }
                                                                else if(isset($productdetail))
                                                                {
                                                                    echo $productdetail->price;
                                                                }
                                                            ?>" placeholder="Product Price">
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('price');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <br>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>Product Specification</label>
                                                        </div>
                                                        <textarea id="editor2" required="" name="specification"><?php 
                                                            if(!isset($success) && set_value('specification'))
                                                            {
                                                                echo set_value('specification');
                                                            }
                                                            else if(isset($productdetail))
                                                             {
                                                               echo $productdetail->specification;
                                                             }
                                                        ?></textarea>
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('specification');
                                                            ?>
                                                        </p>
                                                    </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                        else if($this->session->userdata('product_form') == 2)
                        {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add New Product Image Details</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action=""  novalidate="" class="myform" enctype="multipart/form-data">
                                    <div class="row">                                        
                                        <div class="col-lg-6">
                                            <div class="card-body">                                                
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Name</label>
                                                        <input type="email" class="form-control" value="<?php 
                                                            echo $productdetail->name;
                                                            ?>" id="exampleInputEmail1" disabled="" placeholder="Product Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Color</label>
                                                        <select required="" style="background : "  class="form-control myform <?php
                                                            if (form_error('color')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" name="color">
                                                            <option  value="">Select Color</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Black'))
                                                                {
                                                                    echo set_select('color','Black');
                                                                }
                                                            ?>>Black</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Red'))
                                                                {
                                                                    echo set_select('color','Red');
                                                                }
                                                            ?>>Red</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Blue'))
                                                                {
                                                                    echo set_select('color','Blue');
                                                                }
                                                            ?>>Blue</option>
                                                            <option  <?php 
                                                                if(!isset($psuccess) && set_select('color','Orange'))
                                                                {
                                                                    echo set_select('color','Orange');
                                                                }
                                                            ?>>Orange</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Yellow'))
                                                                {
                                                                    echo set_select('color','Yellow');
                                                                }
                                                            ?>>Yellow</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','White'))
                                                                {
                                                                    echo set_select('color','White');
                                                                }
                                                            ?>>White</option>  
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Green'))
                                                                {
                                                                    echo set_select('color','Green');
                                                                }
                                                            ?>>Green</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Purple'))
                                                                {
                                                                    echo set_select('color','Purple');
                                                                }
                                                            ?>>Purple</option>
                                                            <option  <?php 
                                                                if(!isset($psuccess) && set_select('color','Silver'))
                                                                {
                                                                    echo set_select('color','Silver');
                                                                }
                                                            ?>>Silver</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Gray'))
                                                                {
                                                                    echo set_select('color','Gray');
                                                                }
                                                            ?>>Gray</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Gold'))
                                                                {
                                                                    echo set_select('color','Gold');
                                                                }
                                                            ?>>Gold</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Pink'))
                                                                {
                                                                    echo set_select('color','Pink');
                                                                }
                                                            ?>>Pink</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','rosy brown'))
                                                                {
                                                                    echo set_select('color','rosy brown');
                                                                }
                                                            ?>>rosy brown</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','darkred'))
                                                                {
                                                                    echo set_select('color','darkred');
                                                                }
                                                            ?>>darkred</option>
                                                            <option <?php 
                                                                if(!isset($psuccess) && set_select('color','Dark Blue'))
                                                                {
                                                                    echo set_select('color','Dark Blue');
                                                                }
                                                            ?>>Dark Blue</option>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('color');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Qty</label>
                                                        <input required="" type="text" name="qty" class="form-control myform <?php
                                                            if (form_error('qty')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" value="<?php 
                                                                if(!isset($psuccess) && set_value('qty'))
                                                                {
                                                                    echo set_value('qty');
                                                                }
                                                            ?>" id="exampleInputEmail1" placeholder="Product Qty">
                                                        <p class="err-msg">
                                                            <?php 
                                                                echo form_error('qty');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <br>
                                                    <button type="submit" name="back" value="yes" class="btn btn-primary mt-1 mb-0"><i class="fa fa-chevron-left"></i> Back</button>
                                                    <button type="submit" name="add_image" value="yes"  class="btn btn-primary mt-1 mb-0">Add</button>
                                                    <button type="submit" name="finish" value="yes" class="btn btn-primary mt-1 mb-0">Finish</button>
                                                    <button type="reset" class="btn btn-danger mt-1 mb-0">Clear</button>
                                                    <button type="submit" name="cancel" value="yes" class="btn btn-danger mt-1 mb-0">Cancel Upload</button><br><br>
                                                    
                                                    <?php 
                                                         if (isset($error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong>Oops! </strong><?php echo $error; ?> 
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($psuccess)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <strong>Ok! </strong><?php echo $psuccess; ?> 
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            
                                            <div class="card-body ">                                                    
                                                    <div class="form-group   mb-lg-0">
                                                        <label for="exampleInputEmail1">Product Photos</label>
                                                        
                                                        <input type="file" name="photo[]" id="gallery-photo-add" multiple="" style="display:none" />
                                                        
                                                        <label for="gallery-photo-add" style="width:100%;padding: 90px;text-align: center;border: 2px solid grey">
                                                            <div class="dropzone" > 
                                                                <div class="gallery dz-message needsclick">
                                                                    <i class="fa fa-cloud-upload" style="font-size: 25px"></i>
                                                                    <h6>Drop file here to upload</h6>
                                                                </div>
                                                            </div>    
                                                        </label>
                                                        <?php 
                                                            if (isset($photo_error)) {
                                                                $c = 0;
                                                        ?>
                                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                            <?php 
                                                                foreach($photo_error as $single)
                                                                {
                                                                    $c++;
                                                                    echo "<br>$c. $single";
                                                                }
                                                            ?> 
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                        <!--<input type="file" id="setPhoto" class="form-control1" multiple="">-->
                                                    </div>
                                                    
                                                    <div style="margin-top: 10px" class="ml-2">
                                                        <img style="display: none" id="preview" class="img-thumbnail" width="100px">
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                       }
                    ?>
                </section>
            </div>
            <!--Footer-->
            <?php
            $this->load->view('admin/footer');
            ?>
        </div>
    </div>

    <!--Footer script-->
    <?php
    $this->load->view('admin/footer_script');
    ?>
    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>
    
    <!--image preview-->
    <script>
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        
        $(".gallery").html("");
        
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="150">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
    </script>
</html>