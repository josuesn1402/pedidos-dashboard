<?php include ('../config/session_check.php'); ?>
<?php include ('../components/header.php'); ?>

<div class="main-content">
  <?php include ('../components/sidebar.php'); ?>
  <div id="main-content-right" class="main-content-right">
    <div id="section-listar" class="section-content" style="display: block;">
      <?php include ('listar.php'); ?>
    </div>
    <div id="section-registrar" class="section-content" style="display: none;">
      <?php include ('registrar.php'); ?>
    </div>
    <div id="section-modificar" class="section-content" style="display: none;">
      <?php include ('modificar.php'); ?>
    </div>
  </div>
</div>

<?php include ('../components/footer.php'); ?>