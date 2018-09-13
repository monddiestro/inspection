<!-- navigation  -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="https://www.carmudi.com.ph/images/relaunch/carmudi-logo-PH.svg" alt="Carmudi Philippines Inc.">
      </a>
    </div>
    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-8" aria-expanded="false" style="height: 1px;">
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php echo ($menu == 'inspected') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>">Inspected</a></li>
        <li class="<?php echo ($menu == 'request') ? 'active' : '' ?>"><a href="<?php echo base_url('inspection/request') ?>">Request</a></li>
        <li class="<?php echo ($menu == 'access') ? 'active' : '' ?>"><a href="<?php echo base_url('inspection/access') ?>">Access</a></li>
        <li><a href="#"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    </div>
  </div>
</nav>
