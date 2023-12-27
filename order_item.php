<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_order 
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
    LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
    GROUP BY id_list_order
    HAVING tb_list_order.kode_order = $_GET[order]");

$kode = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    // $kode = $record['id_order'];
    // $meja = $record['meja'];
    // $pelanggan = $record['pelanggan'];
}

$select_menu = mysqli_query($conn, "SELECT id,nama_menu FROM tb_daftar_menu");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
        <a href="order" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadFoto">Kode Order</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="meja" value="<?php echo $meja; ?>">
                        <label for="uploadFoto">Meja</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="pelanggan" value="<?php echo $pelanggan; ?>">
                        <label for="uploadFoto">Pelanggan</label>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Item Baru-->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menu" id="">
                                                <option selected hidden value="">Pilih Menu</option>
                                                <?php
                                                    foreach($select_menu as $value){
                                                        echo "<option value=$value.[id]>$value[nama_menu]</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label for="menu">Menu Makanan/Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required>
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_menu" required>
                                                <option selected hidden value="">Pilih Kategori Menu</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Makanan atau Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required>
                                            <label for="floatingInput">Stok</label>
                                            <div class="invalid-feedback">
                                                Masukkan Stok.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah Item Baru-->

            <?php
            if (empty($result)) {
                echo "Data menu makanan atau minuman tidak ada";
            } else {
                foreach ($result as $row) {
            ?>
                    <!-- Modal View-->
                    <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_menu'] ?>">
                                                    <label for="floatingInput">Nama Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Menu.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example">
                                                        <option selected hidden value="">Pilih Kategori Menu</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_menu']) {
                                                                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Makanan atau Minuman.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stok'] ?>">
                                                    <label for="floatingInput">Stok</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Stok.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Akhir Modal View-->

                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                                    <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan File Foto Menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required value="<?php echo $row['nama_menu'] ?>">
                                                    <label for="floatingInput">Nama Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Menu.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example" name="kat_menu">
                                                        <option selected hidden value="">Pilih Kategori Menu</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_menu']) {
                                                                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    </select>
                                                    <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Makanan atau Minuman.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required value="<?php echo $row['stok'] ?>">
                                                    <label for="floatingInput">Stok</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Stok.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Akhir Modal Edit-->

                    <!-- Modal Delete-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Akhir Modal Delete-->
                <?php
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['nama_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_order'] ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="3" class="fw-bold">
                                    Total harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-plus-circle-fill"></i> Item</button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Bayar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>