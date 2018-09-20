<div class="container">
  <div class="page-mtop">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <th>Name</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Listing ID</th>
              <th>Date Access</th>
            </thead>
            <tbody>
              <?php foreach ($list as $d): ?>
                <tr>
                  <td><?php echo $d->name; ?></td>
                  <td><?php echo $d->contact ?></td>
                  <td><?php echo $d->email ?></td>
                  <td>
                    <a href="<?php echo base_url('uploads/'.$d->file_path); ?>" target="_blank">
                      <?php echo $d->listing_id ?>
                    </a>
                  </td>
                  <td><?php echo $d->date_access ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
