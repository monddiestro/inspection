<div class="container">
  <div class="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th>Listing ID</th>
              <th>URL</th>
              <th>Dealer Name</th>
              <th>Unit</th>
              <th>Date Created</th>
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
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
