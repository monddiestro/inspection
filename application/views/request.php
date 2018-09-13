<div class="container">
  <div class="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th>Name</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Unit</th>
              <th>Year</th>
              <th>Listing ID</th>
              <th>Date Request</th>
            </thead>
            <tbody>
              <?php foreach ($list as $d): ?>
                <tr>
                  <td><?php echo $d->name; ?></td>
                  <td><?php echo $d->contact ?></td>
                  <td><?php echo $d->email ?></td>
                  <td><?php echo $d->unit ?></td>
                  <td><?php echo $d->year ?></td>
                  <td><?php echo $d->listing_id ?></td>
                  <td><?php echo $d->date_request ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
