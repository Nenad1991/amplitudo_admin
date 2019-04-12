<?php require APPROOT . '/views/inc/header_add.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dodaj blog
    
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
 
  <div class="card card-body bg-light mt-5">
    
    <form action="../posts/add" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
          <div class="form-group">
            <label for="author">Autor: <sup>*</sup></label>
            <input type="text" name="author" class="form-control form-control-lg <?php echo (!empty($data['author_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['author']; ?>">
            <span class="invalid-feedback"><?php echo $data['author_err']; ?></span>
          </div>
          <div class="form-group">
                <label for="img">Upload fotografije: <sup>*</sup></label>
                <div id="dropFileForm" onsubmit="uploadFiles(event)">
                    <input type="file" name="img" id="fileInput" multiple onchange="addFiles(event)" class="form-control form-control-lg <?php echo (!empty($data['img_err'])) ? 'is-invalid' : ''; ?>">
                     <span class="invalid-feedback"><?php echo $data['img_err']; ?></span>
                    <label for="fileInput" id="fileLabel" ondragover="overrideDefault1(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
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
                  
                </div>
          </div>
          <div class="form-group">
            <label for="date">Datum kreiranja: <sup>*</sup></label>
            <input type="text" name="date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date']; ?>" placeholder="MM/DD/YYYY">
            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
          </div> 
        
      </div>    
    
    <div class="col-md-6">
        
      <div class="form-group">
        <label for="title">Naslov: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
     
      
    
      <div class="form-group">
        <label for="text_short">Uvodni text: <sup>*</sup></label>
        <textarea name="text_short" class="form-control form-control-lg <?php echo (!empty($data['text_short_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_short']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_short_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="text_long">Text bloga: <sup>*</sup></label>
        <textarea name="text_long" class="form-control form-control-lg <?php echo (!empty($data['text_long_err'])) ? 'is-invalid' : ''; ?>" rows="15"><?php echo $data['text_long']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_long_err']; ?></span>
      </div>
        
        
        
      <div class="form-group">
        <label for="alt_tag">Alt tag: <sup>*</sup></label>
        <input type="text" name="alt_tag" class="form-control form-control-lg <?php echo (!empty($data['alt_tag_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['alt_tag']; ?>">
        <span class="invalid-feedback"><?php echo $data['alt_tag_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="tags">Tagovi: <sup>*</sup></label>
        <input type="text" name="tags" class="form-control form-control-lg <?php echo (!empty($data['tags_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['tags']; ?>">
        <span class="invalid-feedback"><?php echo $data['tags_err']; ?></span>
      </div>
        
         
        
    </div>
        
        
    <div class="col-md-6">
        
            <div class="form-group">
        <label for="title_en">Naslov (engleski): <sup>*</sup></label>
        <input type="text" name="title_en" class="form-control form-control-lg <?php echo (!empty($data['title_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_en_err']; ?></span>
      </div>
     
      <div class="form-group">
        <label for="text_short_en">Uvodni text (engleski): <sup>*</sup></label>
        <textarea name="text_short_en" class="form-control form-control-lg <?php echo (!empty($data['text_short_en_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_short_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_short_en_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="text_long_en">Text bloga (engleski): <sup>*</sup></label>
        <textarea name="text_long_en" class="form-control form-control-lg <?php echo (!empty($data['text_long_en_err'])) ? 'is-invalid' : ''; ?>" rows="15"><?php echo $data['text_long_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_long_en_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="alt_tag_en">Alt tag (engleski): <sup>*</sup></label>
        <input type="text" name="alt_tag_en" class="form-control form-control-lg <?php echo (!empty($data['alt_tag_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['alt_tag_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['alt_tag_en_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="tags_en">Tagovi (engleski): <sup>*</sup></label>
        <input type="text" name="tags_en" class="form-control form-control-lg <?php echo (!empty($data['tags_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['tags_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['tags_en_err']; ?></span>
      </div>
        
    </div>
      
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
 </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->        
<?php require APPROOT . '/views/inc/footer_add.php'; ?>
