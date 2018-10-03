<div class="container">
  <?php
    $flash = $this->session->flashdata('result');
    if(!empty($flash)) {
      $display = 'block';
      $class = $this->session->flashdata('result');
      $message = $this->session->flashdata('result_message');
    } else {
      $display = 'none';
      $class = '';
      $message = '';
    }
  ?>
  <!-- table section -->
  <div class="page-mtop">
    <div class="alert alert-<?php echo $class ?>" style="display:<?php echo $display ?>">
        <?php echo $message; ?>
    </div>
    <div class="card">
      <div class="table-header">
        <div class="row">
          <div class="col-md-offset-8 col-md-4">
            <div class="table-filter text-right" id="table_filter">
              <label><input type="search" class="form-control" id="search_id" placeholder="Search"  ></labe;>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="flip-scroll">
              <table class="table" id="listing_tbl">
                <thead>
                  <th>Listing ID</th>
                  <th>URL</th>
                  <th>Dealer Name</th>
                  <th>Unit</th>
                  <th>Date Created</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php foreach ($list as $d): ?>
                    <tr>
                      <td>
                        <a href="<?php echo base_url('inspection/config?id='.$d->inspected_id."&listing_id=".$d->listing_id) ?>">
                          <?php echo $d->listing_id ?>
                        </a>
                      </td>
                      <td><?php echo $d->listing_uri ?></td>
                      <td><?php echo $d->dealer_name ?></td>
                      <td><?php echo $d->unit ?></td>
                      <td><?php echo $d->date_created ?></td>
                      <td>
                        <a href="#" id="main" data-toggle="modal" data-target="#mod_<?php echo $d->inspected_id ?>"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('inspection/remove_inspected?id='.$d->inspected_id) ?>"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <ul class="pagination">
          <li class="page-item disabled">
            <a href="#" class="page-link" tabindex="1">Previous</a>
          </li>
          <li class="page-item active">
            <a href="#" class="page-link">1 <span class="sr-only">(active)</span> </a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link">2</a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<?php foreach ($list as $d): ?>
  <?php echo form_open_multipart('inspection/modify'); ?>
  <div class="modal fade" id="mod_<?php echo $d->inspected_id ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Inspected Vehicle</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <input type="hidden" name="id" value="<?php echo $d->inspected_id ?>">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Listing ID" name="listing_id" value="<?php echo $d->listing_id ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Listing Link" name="listing_uri" value="<?php echo $d->listing_uri ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Dealer Name" name="dealer_name" value="<?php echo $d->dealer_name ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Unit" name="unit" value="<?php echo $d->unit ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
<?php endforeach; ?>
