<?php require APPROOT . '/views/inc/header_edit.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Izmjeni blog
     
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

  <div class="card card-body bg-light mt-5">

    <form action="../../posts/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
          <div class="form-group">
            <label for="author">Autor: <sup>*</sup></label>
            <input type="text" name="author" class="form-control form-control-lg <?php echo (!empty($data['author_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['author']; ?>">
            <span class="invalid-feedback"><?php echo $data['author_err']; ?></span>
          </div>
          <div class="form-group">
               <label for="img_cover">Fotografija: <sup>*</sup></label>
                <div id="dropFileForm" onsubmit="uploadFiles(event)">
                    <input type="file" name="img" id="fileInput" multiple onchange="addFiles(event)" class="form-control form-control-lg <?php echo (!empty($data['img_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $data['img_err']; ?></span>
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
                    <img id="image" src="../../public/img/<?php echo $data['img']; ?>" alt="your image" style="height:200px" />
                </div>
          </div>  
          <div class="form-group">
            <label for="date">Datum kreiranja: <sup>*</sup></label>
            <input type="text" name="date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php
             $date = DateTime::createFromFormat("Y-m-d", $data['date']);
             $formatDate = $date->format('d/m/Y'); 
             echo $formatDate;
             ?>">
            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
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
        <label for="text_short">Uvodni text: <sup>*</sup></label>
        <textarea name="text_short" class="form-control form-control-lg <?php echo (!empty($data['text_short_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_short']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_short_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="text_long">Text bloga: <sup>*</sup></label>
        <textarea name="text_long" class="form-control form-control-lg <?php echo (!empty($data['text_long_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_long']; ?></textarea>
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
        <label for="title_en">Naslov: <sup>*</sup></label>
        <input type="text" name="title_en" class="form-control form-control-lg <?php echo (!empty($data['title_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_en_err']; ?></span>
      </div>
     
      
    
      <div class="form-group">
        <label for="text_short_en">Uvodni text: <sup>*</sup></label>
        <textarea name="text_short_en" class="form-control form-control-lg <?php echo (!empty($data['text_short_en_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_short_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_short_en_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="text_long_en">Text bloga: <sup>*</sup></label>
        <textarea name="text_long_en" class="form-control form-control-lg <?php echo (!empty($data['text_long_en_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text_long_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_long_en_err']; ?></span>
      </div>
        
        
        
      <div class="form-group">
        <label for="alt_tag_en">Alt tag: <sup>*</sup></label>
        <input type="text" name="alt_tag_en" class="form-control form-control-lg <?php echo (!empty($data['alt_tag_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['alt_tag_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['alt_tag_en_err']; ?></span>
      </div>
        
      <div class="form-group">
        <label for="tags_en">Tagovi: <sup>*</sup></label>
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
  
 <!-- Footer --> 

<?php require APPROOT . '/views/inc/footer_edit.php'; ?>