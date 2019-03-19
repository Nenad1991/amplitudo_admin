<?php if(!isset($_SESSION['user_id'])) : ?>

<?php redirect('users/login'); ?>

<?php else: ?>

<?php require APPROOT . '/views/inc/header_index.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
            <div class='col-md-6'>
                <h1>
                    Administracija
                </h1>
            </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
          <div class="jumbotron jumbotron-flud text-center">
            <div class="container">
                <h1 class="display-3"><?php echo $data['title']; ?></h1>
                <p class="lead"><?php echo $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname']; ?></p>
          </div>
          </div> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php require APPROOT . '/views/inc/footer_index.php'; ?> 

<?php endif; ?>