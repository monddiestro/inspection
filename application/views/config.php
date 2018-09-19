<div class="container">
  <!-- breadcrumbs -->
  <div class="row">
    <div class="col-sm-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Inspected</a></li>
        <li><?php echo $listing_id ?></li>
      </ol>
    </div>
  </div>
  <!-- main -->
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <h4>VEHICLE DETAILS</h4>
      <hr>
      <div class="form-group">
        <label>Dealer Name</label>
        <input type="text" class="form-control" name="dealer_name" value="<?php echo $dealer_name ?>"/>
      </div>
      <div class="form-group">
        <label>Unit</label>
        <input type="text" name="unit" value="<?php echo $unit ?>" class="form-control"/>
      </div>
      <div class="form-group">
        <label>Listing ID</label>
        <input type="text" class="form-control" name="listing_id" value="<?php echo $listing_id ?>"/>
      </div>
      <div class="form-group">
        <label>Listing URL</label>
        <input type="text" class="form-control" name="listing_uri" value="<?php echo $listing_uri ?>"/>
      </div>
      <div class="form-group">
        <label>PDF Link</label>
        <input type="text" name="" class="form-control" value="<?php echo base_url('uploads/'.$file_path) ?>">
      </div>
    </div>
    <div class="col-sm-12 col-md-6">
      <h4>LISTING DETAILS</h4>
      <hr>
      <div class="form-group">
        <label>Description Code</label>
        <textarea class="form-control" name="code" rows="15" cols="80"><?php echo $code ?></textarea>
      </div>
    </div>
  </div>
</div>
