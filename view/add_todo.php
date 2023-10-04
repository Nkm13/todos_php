  <?php $title = "Add Todos "; ?>

  <?php ob_start(); ?>
  <div class="container-sm">
      <div class="d-flex mb-3 mt-3">
          <div class="me-auto p-2">
              <h1 class="text-muted">Todos App</h1>
          </div>
      </div>
      <form action="add-todo/save" method="post" class="row g-3 mt-3">
          <div class="col-auto">
              <label for="title" class="visually-hidden">Titre</label>
              <input type="text" class="form-control" id="title" placeholder="Titre">
          </div>
          <div class="col-auto">
              <label for="content" class="visually-hidden">Contenu</label>
              <input type="text" class="form-control" id="content" placeholder="Contenu">
          </div>
          <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
          </div>
      </form>
  </div>
  <?php $content = ob_get_clean(); ?> <?php require('../template/layout.php') ?>