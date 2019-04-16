<?php require APPROOT . '/views/inc/header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class='col-md-6'>
                <h1>
                    Administracija blogova
                </h1>
            </div>
            <div class="col-md-6">
                <a href="posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Dodaj blog
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
                <th>Redni broj bloga</th>
                <th>Naslov bloga</th>
                <th>Datum unosa bloga</th>
                <th>Kreator bloga</th>
                <th>Opcija Izmjeni</th>
                <th>Opcija deaktiviraj</th>
                <th>Opcija Izbrisi</th>
            </tr>
        </thead>
                
        <tbody>    
        
        
    <?php foreach($data['posts'] as $post) : ?>
      <tr>
         <td><?php echo $post->id; ?></td> 
         <td><?php echo $post->title; ?></td>
         <td>
             <?php
             $date = DateTime::createFromFormat('Y-m-d', $post->date);
             $formatDate = $date->format('d/m/Y'); 
             echo $formatDate;
             ?>
         </td>  
         <td><?php echo $post->author; ?></td>
         
          <td><a class='btn btn-info' href='posts/edit/<?php echo $post->id;?>'>Izmjeni</a></td>
          <td><?php echo ($post->status == 'available') ? 'Aktivan' : 'Neaktivan' ?></td>
          
              <td><button type="button" rel="<?php echo $post->id ?>" class="btn btn-danger delete_post_link" data-dismiss="modal">Izbriši</button></td>
              
     </tr>
      
<?php endforeach; ?>
            
         </tbody>
    </table>


    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require APPROOT . '/views/inc/footer.php'; ?>   
