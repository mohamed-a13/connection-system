<div class="container-fluid g-0">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark g-0 p-1">
    <div class="container-fluid pl-3">
      <a class="navbar-brand" href="#">Profil: <?= $_SESSION['pseudo'] ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse pr-3" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <?php
            if (isset($_SESSION['auth'])) {
              echo "<a class='nav-link active' href='acceuil.php'>Home</a>";
            } else {
              echo "<a class='nav-link active' href='index.php'>Home</a>";
            }
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="actions/logout.php">Deconnexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="update-compte?id=<?= $_SESSION['id'] ?>.php">Modifier le compte</a>
          </li>
          <li class="nav-item">
            <button style="color: white; text-decoration: none; margin-top: 1.5px;" type="button" class="btn btn-link updateInfo" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Suprimer le compte
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vous êtes sur le point de supprimer votre compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sûr ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger"><a style="color: white; text-decoration: none;" href="actions/deleteCompteAction?id=<?= $_SESSION['id'] ?>.php">Confirmer</a></button>
      </div>
    </div>
  </div>
</div>