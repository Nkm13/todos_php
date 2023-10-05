  <?php $title = "Todos | Page d'acceuil"; ?>

  <?php ob_start(); ?>
  <div class="container-sm">
      <div class="d-flex mb-3 mt-3">
          <div class="me-auto p-2">
              <h1 class="text-muted">Todos App</h1>
          </div>
          <div class="p-2">
              <a href="/add-todo">
                  <button type="button" class="btn btn-primary">
                      <i class="bi bi-plus-circle"></i>
                      Add todo
                  </button>
              </a>
          </div>
      </div>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active mt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Date added</th>
                          <th scope="col">Title</th>
                          <th scope="col">Content</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach ($allTodos as $todo) {
                        ?>
                          <tr>
                              <th scope="row"><?= $todo["id"] ?></th>
                              <td><?= $todo["date_formated"] ?></td>
                              <td>
                                  <?= $todo["title"] ?>
                              </td>
                              <td><?= $todo["content"] ?></td>
                              <td>

                                  <a href="/todo/<?= $todo["id"] ?>/edit" type="button" class="btn btn-warning">
                                      Edit
                                  </a>
                                  <a href="/todo/<?= $todo["id"] ?>/delete" type="button" class="btn btn-danger">
                                      Delete
                                  </a>
                              </td>
                          </tr>
                      <?php
                        }
                        ?>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
  <?php $content = ob_get_clean(); ?> <?php require('./template/layout.php') ?>