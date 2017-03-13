<?php if($result!=NULL && count($result) > 0) { ?>
  <div class="clear20"></div>
  <div class="total-records">
    Total Logs: <?php echo $total_count; ?>
  </div>
  <div class="table-responsive">

    <table class="table table-bordered">
      <thead>
        <tr>
          <td class="col-xs-1">Line No.</td>
          <td>Description</td>
        </tr>
        
      </thead>
      <tbody>
      <?php foreach($result as $key => $value) { ?>
        <tr>
          <td class="text-right"><?php echo $value["line_no"]; ?></td>
          <td><?php echo $value["content"]; ?></td>
        </tr>
      <?php } ?>
        
        
      </tbody>
    </table>
  </div>  

  <div class="pagination"><?php echo $links; ?></div>
  
  <!--
  <div class="btn-group btn-group-justified form-file-group">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">|<</button>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary"><</button>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary">></button>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary">>|</button>
      </div>
  </div>-->
<?php } else { ?>
  <div></div>
<?php } ?>
