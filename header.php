<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
  <div class="container-lg">
    <a class="navbar-brand" href="."><i class="bi bi-house"></i> BeSoft</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $hasil['username']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-raised-hand"></i> Profile</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password</a></li>
            <li><a class="dropdown-item" href="logout"><i class="bi bi-door-closed"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal Ubah Password-->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
          <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required value="<?php echo $_SESSION['username_besoft'] ?>">
                <label for=" floatingInput">Username</label>
                <div class="invalid-feedback">
                  Masukkan Username.
                </div>
              </div>
            </div>
            <div class="col lg-6">
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="passwordlama" required>
                <label for=" floatingInput">Password Lama</label>
                <div class="invalid-feedback">
                  Masukkan Password Lama.
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" name="passwordbaru" required>
                <label for=" floatingInput">Password Baru</label>
                <div class="invalid-feedback">
                  Masukkan Password baru.
                </div>
              </div>
            </div>
            <div class="col lg-6">
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="repasswordbaru" required>
                <label for=" floatingInput">Ulangi Password Baru</label>
                <div class="invalid-feedback">
                  Ulangi Password baru.
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Akhir Modal Ubah Password-->