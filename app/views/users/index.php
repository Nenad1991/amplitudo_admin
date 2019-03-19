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
                    Administracija korisnika
                </h1>
            </div>
            <div class="col-md-6">
                <a href="users/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Dodaj korisnika
                </a>
            
            </div>
            
        
        </div>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <?php flash('post_message'); ?>
     <table class="table table-bordered table-hover">  
              
        
        <thead>
            <tr>
                <th>Redni broj korisnika</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Korisnicko ime</th>
                <th>Uloga</th>
                <th>Opcija izmjeni</th>
                <th>Opcija izbrisi</th>
            </tr>
        </thead>
                
        <tbody>    
        
        
            <?php foreach($data['users'] as $user) : ?>
              <tr>
                 <td><?php echo $user->id; ?></td> 
                 <td><?php echo $user->firstname; ?></td>
                 <td><?php echo $user->lastname; ?></td>
                 <td><?php echo $user->username; ?></td>
                 <td><?php echo $user->power; ?></td>
                 <td><a class='btn btn-info' href='users/edit/<?php echo $user->id;?>'>Izmjeni</a></td>
                 <td><button type="button" rel="<?php echo $user->id ?>" class="btn btn-danger delete_user_link" data-dismiss="modal">Izbriši</button></td>
             </tr>



            <?php endforeach; ?>
            
         </tbody>
    </table>     
        
  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php require APPROOT . '/views/inc/footer_index.php'; ?>
<?php endif; ?>
