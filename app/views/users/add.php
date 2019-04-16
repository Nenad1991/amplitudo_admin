<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dodaj korisnika
    
      </h1>
  
    </section>

    <!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        
       <form action="<?php echo URLROOT; ?>/users/add" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Korisničko ime: <sup>*</sup></label>
                <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Lozinka: <sup>*</sup></label>
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Potvrdi lozinku: <sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
            </div>
              
           <div class="form-group">
                <label for="firstname">Ime: <sup>*</sup></label>
                <input type="text" name="firstname" class="form-control form-control-lg <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
                <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
            </div>
              
            <div class="form-group">
                <label for="lastname">Prezime: <sup>*</sup></label>
                <input type="text" name="lastname" class="form-control form-control-lg <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
                <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
            </div>
              
            <div class="form-group">
                <label for="profession">Zanimanje: <sup>*</sup></label>
                <input type="text" name="profession" class="form-control form-control-lg <?php echo (!empty($data['profession_err'])) ? 's-invalid' : ''; ?>" value="<?php echo $data['profession']; ?>">
                <span class="invalid-feedback"><?php echo $data['profession_err']; ?></span>
            </div>
              
            <div class="form-group">
                <label for="power">Uloga: <sup>*</sup></label>
                <select name="power" class="form-control form-control-lg">
                    <option value="administrator">Administrator</option>
                    <option value="moderator">Moderator</option>
                </select>
            </div>
    <!--        <div class="form-group">
                <label for="img">Slika: <sup>*</sup></label>
                <input type="file" name="img" class="form-control form-control-lg <?php echo (!empty($data['img_err'])) ? 's-invalid' : ''; ?>" value="<?php echo $data['img']; ?>">
                <span class="invalid-feedback"><?php echo $data['img_err']; ?></span>
            </div>-->
           
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
                    <img id="image" src="../img/user-icon.png" alt="your image" style="height:200px" />
                </div>
            </div>

            <div class="form-group">
                <div class="col">
                  <input type="submit" value="Dodaj korisnika" class="btn btn-success btn-block">
                </div>
            </div>
          
          </form>
        </div>
    </div>
  </div>
 </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->     
<?php require APPROOT . '/views/inc/footer.php'; ?>