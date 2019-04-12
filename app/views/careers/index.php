<?php require APPROOT . '/views/inc/header_index.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class='col-md-6'>
                <h1>
                    Administracija konkursa
                </h1>
            </div>
            <div class="col-md-6">
                <a href="careers/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Dodaj konkurs
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
                <th>Naslov konkursa</th>
                <th>Pocetak konkursa</th>
                <th>Kraj konkursa</th>
                <th>Status konkursa</th>
                <th>Opcija Izmjeni</th>
                <th>Opcija deaktiviraj</th>
                <th>Opcija Izbrisi</th>
            </tr>
        </thead>
                
        <tbody>    
        
        
    <?php foreach($data['careers'] as $career) : ?>
      <tr>
          <td><?php echo $career->id; ?></td> 
          <td><?php echo $career->title; ?></td>
          <td>
             <?php
             $date_start = DateTime::createFromFormat('Y-m-d', $career->date_start);
             $formatDateStart = $date_start->format('d/m/Y'); 
             echo $formatDateStart;
              
             ?>
          
          </td>
          <td>
             <?php
             $date_finish = DateTime::createFromFormat('Y-m-d', $career->date_finish);
             $formatDateFinish = $date_finish->format('d/m/Y'); 
             echo $formatDateFinish;
              
             ?>
          
          </td>
          <td>
              <?php
              
              $exp_date = $date_finish->format('Y/m/d'); 
              $today_date = date('Y/m/d');
            
              $exp = strtotime($exp_date);
              $td = strtotime($today_date);
              
             if($td > $exp){
                  echo "Završen";
              }else{
                  echo "U toku";
              }
              ?>
          </td>
          <td><a class='btn btn-info' href='careers/edit/<?php echo $career->id;?>'>Izmjeni</a></td>
          <td><?php echo ($career->status == 'available') ? 'Aktivan' : 'Neaktivan' ?></td>
          <td><button type="button" rel="<?php echo $career->id ?>" class="btn btn-danger delete_career_link" data-dismiss="modal">Izbriši</button></td>
          
            
      </tr>
      
      
    
  <?php endforeach; ?>
            
         </tbody>
    </table>     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require APPROOT . '/views/inc/footer_index.php'; ?> 