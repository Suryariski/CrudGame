<!-- partial -->
<div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Edit Game</h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-5">Form Edit Game</h4>
										<?php if($this->session->flashdata('error')): ?>
											<div class="alert alert-danger">
												<?= $this->session->flashdata('error') ?>
											</div>
										<?php endif ?>
                    <form class="forms-sample" action="<?= base_url('admin/Game/editProcess') ?>" method="POST">
											<input type="hidden" value="<?= $game['id_game'] ?>" name="id_game">
											<div class="form-group">
												<label for="nama_game">Nama Game</label>
												<input type="text" class="form-control" id="nama_game" name="nama_game" value="<?= $game['nama_game'] ?>" placeholder="Masukkan Nama Game" required />
											</div>
											<div class="form-group">
												<label for="id_kategori">Kategori Game</label>
												<select name="id_kategori" id="id_kategori" class="form-control">
													<option value="" disabled selected>- Pilih Kategori -</option>
													<?php
														foreach($kategori->result_array() as $kategori){
															$selected = ($kategori['id_kategori'] == $game['id_game']) ? 'selected' : '';
															?>
																<option value="<?= $kategori['id_kategori'] ?>"<?= $selected ?>><?= $kategori['nama_kategori'] ?></option>
															<?php
														}
													?>
												</select>
											</div>
                                            
                      <div class="form-group">
												<label for="tahunrilis">Tahun Liris Game</label>
												<input type="text" class="form-control" id="tahunrilis" name="tahunrilis" value="<?= $game['tahunrilis'] ?>" placeholder="Masukkan Tahun Rilis Game" required />
											</div>
											<div class="form-group">
												<label for="ukuran_game">Ukuran Game</label>
												<input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $game['ukuran'] ?>" placeholder="Masukkan Ukuran Game" required />
											</div>
						
                      <button type="submit" class="btn btn-primary me-2"> Simpan </button>
                    </form>
										<a href="<?= base_url('admin/Game') ?>"><button class="btn btn-info mt-2">Kembali</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
