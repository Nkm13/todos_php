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
      <?php require('../template/nav_bar.php') ?>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active mt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Content</th>
                          <th scope="col">Date d'ajout</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach ($todos as $todo) {
                        ?>
                          <tr>
                              <th scope="row"><?= $todo["id"] ?></th>
                              <td>
                                  <?= $todo["title"] ?>
                              </td>
                              <td><?= $todo["content"] ?></td>
                              <td><?= $todo["date_formated"] ?></td>
                          </tr>
                      <?php
                        }
                        ?>
                  </tbody>
              </table>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
              Profile
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
              Profile
          </div>
      </div>
  </div>
  <?php $content = ob_get_clean(); ?> <?php require('../template/layout.php') ?>