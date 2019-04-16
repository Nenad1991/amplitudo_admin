<?php require APPROOT . '/views/inc/header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class='col-md-6'>
                <h1>
                    Administracija proizvoda
                </h1>
            </div>
            <div class="col-md-6">
                <a href="products/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Dodaj proizvod
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
                <th>Redni broj proizvoda</th>
                <th>Naslov proizvoda</th>
                <th>Datum unosa proizvoda</th>
                <th>Opcija Izmjeni</th>
                <th>Opcija deaktiviraj</th>
                <th>Opcija Izbrisi</th>
            </tr>
        </thead>
                
        <tbody>    
        
        
    <?php foreach($data['products'] as $product) : ?>
      <tr>
          <td><?php echo $product->id; ?></td> 
          <td><?php echo $product->title; ?></td>
          <td>
          
            <?php
             
             $date = DateTime::createFromFormat("Y-m-d H:i:s", $product->created_at);
             $formatDate = $date->format('d/m/Y'); 
             echo $formatDate;
             ?>
          </td>
          <td><a class='btn btn-info' href='products/edit/<?php echo $product->id;?>'>Izmjeni</a></td>
          <td><?php echo ($product->status == 'available') ? 'Aktivan' : 'Neaktivan' ?></td>
          <td><button type="button" rel="<?php echo $product->id ?>" class="btn btn-danger delete_product_link" data-dismiss="modal">Izbriši</button></td>
          
            
      </tr>
      
      
    
  <?php endforeach; ?>
            
         </tbody>
    </table>     
        
        
        
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
