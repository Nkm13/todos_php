  <?php $title = "Todo | Edit"; ?>

  <?php ob_start(); ?>
  <div class="container-sm">
      <div class="d-flex mb-3 mt-3">
          <div class="me-auto p-2">
              <h3 class="text-muted">Todos App - edit </h3>
          </div>
      </div>
      <form action="save" method="post" class="row g-3 mt-3">
          <div class="col-auto">
              <label for="title" class="visually-hidden">Titre</label>
              <input type="text" value="<?= $oldTitle  ?>" required class="form-control" name="title" id="title" placeholder="Titre">
          </div>
          <div class="col-auto">
              <label for="content" class="visually-hidden">Contenu</label>
              <input type="text" value="<?= $oldContent  ?>" required class="form-control" name="content" id="content" placeholder="Contenu">
          </div>
          <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Modifier</button>
          </div>
      </form>
  </div>
  <?php $content = ob_get_clean(); ?> <?php require('./template/layout.php') ?>