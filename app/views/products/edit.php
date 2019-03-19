<?php if(!isset($_SESSION['user_id'])) : ?>

<?php redirect('../../users/login'); ?>

<?php else: ?>

<?php require APPROOT . '/views/inc/header_edit.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Izmjeni proizvod
       
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        
 
  <div class="card card-body bg-light mt-5">
    
    <form action="../../products/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
     <div class="col-md-12">
            <label for="img_cover">Cover fotografija: <sup>*</sup></label>
            <div class="form-group">
                <div id="dropFileForm" onsubmit="uploadFiles(event)">
                    <input type="file" name="img_cover" id="fileInput" multiple onchange="addFiles(event)" class="form-control form-control-lg <?php echo (!empty($data['img_cover_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $data['img_cover_err']; ?></span>
                    <label for="fileInput" id="fileLabel" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
                            addFiles(event);">
                        <i class="fa fa-download fa-5x"></i>
                        <br>
                        <p>UPLOAD</p>
                        <span id="fileLabelText">
                          Izaberite fotografiju ili je prevucite ovdje
                        </span>
                        <br>
                        <span id="uploadStatus"></span>
                    </label>
                    <img id="image" src="../../public/img/<?php echo $data['img_cover']; ?>" alt="your image" style="height:200px" />
                   
                </div>
              </div>    
            <div class="form-group">
                <label for="img">Uvodna fotografija: <sup>*</sup></label>
                <div id="dropFileForm1" onsubmit="uploadFiles1(event)">
                    <input type="file" name="img" id="fileInput1" multiple onchange="addFiles1(event)" class="form-control form-control-lg <?php echo (!empty($data['img_err'])) ? 'is-invalid' : ''; ?>">
                     <span class="invalid-feedback"><?php echo $data['img_err']; ?></span>
                    <label for="fileInput1" id="fileLabel" ondragover="overrideDefault1(event);fileHover1();" ondragenter="overrideDefault1(event);fileHover1();" ondragleave="overrideDefault1(event);fileHoverEnd1();" ondrop="overrideDefault1(event);fileHoverEnd1();
                            addFiles1(event);">
                        <i class="fa fa-download fa-5x"></i>
                        <br>
                        <p>UPLOAD</p>
                        <span id="fileLabelText1">
                          Izaberite fotografiju ili je prevucite ovdje
                        </span>
                        <br>
                        <span id="uploadStatus1"></span>
                    </label>
                     <img id="image1" src="../../public/img/<?php echo $data['img']; ?>" alt="your image" style="height:200px" />
                  
                </div>
            </div>
    
          <div class="form-group">
                <label for="status">Status: <sup>*</sup></label>
                <select name="status" class="form-control form-control-lg">
                 
                    <option value="<?php echo $data['status'] ?>"><?php echo ($data['status']=='available') ? 'Aktivan' : 'Neaktivan'; ?></option>
                    <?php if($data['status'] != "available") : ?>
                        <option value='available'>Aktivan</option>
                    <?php else : ?>
                        <option value='hidden'>Neaktivan</option>
                    
                    <?php endif; ?>
                </select>
            </div>
        
      </div>    
    
    <div class="col-md-6">
        
      <div class="form-group">
        <label for="title">Naslov: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
        
       <div class="form-group">
        <label for="about">Kratki opis: <sup>*</sup></label>
        <textarea name="about" class="form-control form-control-lg <?php echo (!empty($data['about_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['about']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['about_err']; ?></span>
      </div>
    

      <div class="form-group">
        <label for="text_short">Uvodni text: <sup>*</sup></label>
        <textarea name="text_short" class="form-control form-control-lg <?php echo (!empty($data['text_short_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_short']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_short_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="text_long">Text proizvoda: <sup>*</sup></label>
        <textarea name="text_long" class="form-control form-control-lg <?php echo (!empty($data['text_long_err'])) ? 'is-invalid' : ''; ?>" rows="15"><?php echo $data['text_long']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_long_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="alt_tag">Alt tag: <sup>*</sup></label>
        <input type="text" name="alt_tag" class="form-control form-control-lg <?php echo (!empty($data['alt_tag_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['alt_tag']; ?>">
        <span class="invalid-feedback"><?php echo $data['alt_tag_err']; ?></span>
      </div>
   </div>
        
        
    <div class="col-md-6">
        
      <div class="form-group">
        <label for="title_en">Naslov (engleski): <sup>*</sup></label>
        <input type="text" name="title_en" class="form-control form-control-lg <?php echo (!empty($data['title_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_en_err']; ?></span>
      </div>
        
         
      <div class="form-group">
        <label for="about_en">Kratki opis (engleski): <sup>*</sup></label>
        <textarea name="about_en" class="form-control form-control-lg <?php echo (!empty($data['about_en_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['about_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['about_en_err']; ?></span>
      </div>     
      <div class="form-group">
        <label for="text_short_en">Uvodni text (engleski): <sup>*</sup></label>
        <textarea name="text_short_en" class="form-control form-control-lg <?php echo (!empty($data['text_short_en_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_short_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_short_en_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="text_long_en">Text proizvoda (engleski): <sup>*</sup></label>
        <textarea name="text_long_en" class="form-control form-control-lg <?php echo (!empty($data['text_long_en_err'])) ? 'is-invalid' : ''; ?>" rows="15"><?php echo $data['text_long_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_long_en_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="alt_tag_en">Alt tag (engleski): <sup>*</sup></label>
        <input type="text" name="alt_tag_en" class="form-control form-control-lg <?php echo (!empty($data['alt_tag_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['alt_tag_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['alt_tag_en_err']; ?></span>
      </div>
        
    
        
    </div>
      
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>


</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require APPROOT . '/views/inc/footer_edit.php'; ?>  
<?php endif; ?>