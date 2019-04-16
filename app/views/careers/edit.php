<?php require APPROOT . '/views/inc/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Izmjeni konkurs
  
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
 
  <div class="card card-body bg-light mt-5">
   
    <form action="<?php echo URLROOT; ?>/careers/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
     <div class="col-md-12">
        
          <div class="form-group">
               <label for="img">Fotografija: <sup>*</sup></label>
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
                <label for="status">Status Aktivan/Neaktivan: <sup>*</sup></label>
                <select name="status" class="form-control form-control-lg">
                 
                    <option value="<?php echo $data['status'] ?>"><?php echo ($data['status']=='available') ? 'Aktivan' : 'Neaktivan'; ?></option>
                    <?php if($data['status'] != "available") : ?>
                        <option value='available'>Aktivan</option>
                    <?php else : ?>
                        <option value='hidden'>Neaktivan</option>
                    
                    <?php endif; ?>
                </select>
            </div>
           
          <div class="form-group">
            <label for="date_start">Pocetak konkursa: <sup>*</sup></label>
             <input type="text" name="date_start" class="form-control form-control-lg <?php echo (!empty($data['date_start_err'])) ? 'is-invalid' : ''; ?>" value="<?php
             $date_start = DateTime::createFromFormat("Y-m-d", $data['date_start']);
             $formatDateStart = $date_start->format('d/m/Y'); 
             echo $formatDateStart;
             ?>">
            <span class="invalid-feedback"><?php echo $data['date_start_err']; ?></span>
          </div>
           <div class="form-group">
            <label for="date_finish">Kraj konkursa: <sup>*</sup></label>
            <input type="text" name="date_finish" class="form-control form-control-lg <?php echo (!empty($data['date_finish_err'])) ? 'is-invalid' : ''; ?>" value="<?php
             $date_finish = DateTime::createFromFormat("Y-m-d", $data['date_finish']);
             $formatDateFinish = $date_finish->format('d/m/Y'); 
             echo $formatDateFinish;
             ?>">
            <span class="invalid-feedback"><?php echo $data['date_finish_err']; ?></span>
          </div>
        
      </div>    
    
    <div class="col-md-6">
        
      <div class="form-group">
        <label for="title">Naslov: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
        
       <div class="form-group">
        <label for="text">Opis konkursa: <sup>*</sup></label>
        <textarea name="text" class="form-control form-control-lg <?php echo (!empty($data['text_err'])) ? 'is-invalid' : ''; ?>" rows="15"><?php echo $data['text']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_err']; ?></span>
      </div>   

    </div>
        
        
    <div class="col-md-6">
        
      <div class="form-group">
        <label for="title_en">Naslov (engleski):<sup>*</sup></label>
        <input type="text" name="title_en" class="form-control form-control-lg <?php echo (!empty($data['title_en_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title_en']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_en_err']; ?></span>
      </div>
      
      <div class="form-group">
        <label for="text_en">Opis konkursa (engleski): <sup>*</sup></label>
        <textarea name="text_en" class="form-control form-control-lg <?php echo (!empty($data['text_en_err'])) ? 'is-invalid' : ''; ?>" rows="15"><?php echo $data['text_en']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['text_en_err']; ?></span>
      </div>
        
     
    </div>
      
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>


</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/footer.php'; ?>