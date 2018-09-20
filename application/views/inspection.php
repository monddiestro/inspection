<div class="container">
  <div class="page-mtop">
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
