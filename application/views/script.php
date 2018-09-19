<div class="btn-group">
  <a href="#" class="btn btn-danger btn-fab" id="main" data-toggle="modal" data-target="#new">
    <i class="material-icons">add</i>
  </a>
</div>
<?php echo form_open_multipart('inspection/create'); ?>
<div class="modal fade" id="new" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Inspected Vehicle</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Listing ID" name="listing_id" value="" required>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Listing Link" name="listing_uri" value="" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Dealer Name" name="dealer_name" value="">
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Unit" name="unit" value="">
            </div>
          </div>
          <div class="col-sm-12 col-md-12">
            <label class="btn btn-default btn-icon">
              <input type="file" name="inspection_report" id="inspection_report" accept="application/pdf" style="display:none;">
              <i class="material-icons">attach_file</i>&nbsp;&nbsp;&nbsp;<span>Report</span>
            </label>
            <span class="text-muted" id="filename">No File Selected</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <center>
          <input type="submit" name="submit" value="Upload" class="btn btn-primary"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </center>  
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('utilities/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
  $('#new').on('change',':file',function() {
    var input = $(this);
    numFiles = input.get(0).files ? input.get(0).files.length : 1;
    label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
    input.trigger('fileselect',[numFiles,label]);
    $('#filename').text(label);
  });
</script>
