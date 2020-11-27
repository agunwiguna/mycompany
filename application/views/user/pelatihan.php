 <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelatihan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?=base_url('');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Pelatihan</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        Tambah Data
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>
                    <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>
                    <?php if ($this->session->flashdata('failed')) { ?>
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          <?= $this->session->flashdata('failed') ?>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama Kursus/Seminar</th>
                            <th>Sertifikat</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($pelatihan as $row) {?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_kursus'];?></td>
                            <td><?=$row['sertifikat'];?></td>
                            <td><?=$row['tahun'];?></td>
                            <td>
                                <a href="<?=base_url('pelatihan/hapus/'.$row['id'])?>" class="btn btn-sm btn-icon btn-danger tombol-hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- Modal Tambah -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pelatihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
                <form action="<?=base_url('pelatihan/simpan');?>" method="post" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama_kursus" class="col-sm-3 col-form-label">Nama Kursus/Seminar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_kursus" id="nama_kursus" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_institusi" class="col-sm-3 col-form-label">Sertifikat</label>
                            <div class="col-sm-9">
                                <select name="sertifikat" class="form-control" id="sertifikat" required>
                                  <option value="">-- Pilih --</option>
                                  <option value="Ya">Ya</option>
                                  <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="tahun" id="tahun" required> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>