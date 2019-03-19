<?php if(!isset($_SESSION['user_id'])) : ?>

<?php redirect('../../users/login'); ?>

<?php else: ?>

<?php require APPROOT . '/views/inc/header_edit.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Izmjeni korisnika
     
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
 
  <div class="card card-body bg-light mt-5">
  
    
    <form action="../../users/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
          <div class="form-group">
            <label for="username">Korisnicko ime: <sup>*</sup></label>
            <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>" <?php echo ($_SESSION['user_power']!='administrator') ? 'readonly' : ''; ?>>
            <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" <?php echo ($_SESSION['user_power']!='administrator') ? 'readonly' : ''; ?>>
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Stara lozinka: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password_new">Nova lozinka: <sup>*</sup></label>
            <input type="password" name="password_new" class="form-control form-control-lg <?php echo (!empty($data['password_new_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['password_new_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password_new_check">Potvrdite novu lozinku: <sup>*</sup></label>
            <input type="password" name="password_new_check" class="form-control form-control-lg <?php echo (!empty($data['password_new_check_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['password_new_check_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="firstname">Ime: <sup>*</sup></label>
            <input type="text" name="firstname" class="form-control form-control-lg <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>" <?php echo ($_SESSION['user_power']!='administrator') ? 'readonly' : ''; ?>>
            <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="lastname">Prezime: <sup>*</sup></label>
            <input type="text" name="lastname" class="form-control form-control-lg <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>" <?php echo ($_SESSION['user_power']!='administrator') ? 'readonly' : ''; ?>>
            <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="profession">Zanimanje: <sup>*</sup></label>
            <input type="text" name="profession" class="form-control form-control-lg <?php echo (!empty($data['profession_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['profession']; ?>" <?php echo ($_SESSION['user_power']!='administrator') ? 'readonly' : ''; ?>>
            <span class="invalid-feedback"><?php echo $data['profession_err']; ?></span>
          </div>
          <div class="form-group">
                <label for="power">Uloga: <sup>*</sup></label>
                <select name="power" class="form-control form-control-lg">
                 
                    <option value="<?php echo $data['power'] ?>"><?php echo $data['power'] ?></option>
                    <?php if($data['power'] != "administrator") : ?>
                        <option value='administrator' <?php echo ($_SESSION['user_power']!='administrator') ? 'disabled' : ''; ?>>Administrator</option>
                    <?php else : ?>
                        <option value='moderator' <?php echo ($_SESSION['user_power']!='administrator') ? 'disabled' : ''; ?>>Moderator</option>
                    
                    <?php endif; ?>
                </select>
            </div>

          
          <div class="form-group">
                <div id="dropFileForm" onsubmit="uploadFiles(event)">
                    <input type="file" name="img" id="fileInput" multiple onchange="addFiles(event)" value="<?php echo $data['img']; ?>">
                    <label for="fileInput" id="fileLabel" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
                            addFiles(event);">
                        <i class="fa fa-download fa-5x"></i>
                        <br>
                        <p>UPLOAD FOTOGRAFIJE</p>
                        <span id="fileLabelText">
                          Izaberite fotografiju ili je prevucite ovdje
                        </span>
                        <br>
                        <span id="uploadStatus"></span>
                    </label>
                    <img id="image" src="../../public/img/<?php echo $data['img']; ?>" alt="your image" style="height:200px" />
                   
                </div>
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