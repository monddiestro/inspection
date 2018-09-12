<div class="container-fluid">
  <div class="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>Listing ID</th>
              <th>URL</th>
              <th>Dealer Name</th>
              <th>Unit</th>
              <th></th>
              <th>Date Created</th>
            </thead>
            <tbody>
              <?php foreach ($list as $d): ?>
                <tr>
                  <td><?php echo $d->listing_id ?></td>
                  <td><?php echo $d->listing_uri ?></td>
                  <td><?php echo $d->dealer_name ?></td>
                  <td><?php echo $d->unit ?></td>
                  <td>
                    <a href="<?php echo base_url('inspection/config?id='.$d->inspected_id."&listing_id=".$d->listing_id) ?>">
                      <i class="material-icons">settings</i>
                    </a>
                  </td>
                  <td><?php echo $d->date_created ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
