  <?php $title = "Error 404 | Todos"; ?>

  <?php ob_start(); ?>
  <div class="container-sm">
      <h1 class="text-muted mt-5">Error 404</h1>
      <span>
          <?= $errorMessage ?>
      </span>
  </div>
  <?php $content = ob_get_clean(); ?> <?php require('./template/layout.php') ?>