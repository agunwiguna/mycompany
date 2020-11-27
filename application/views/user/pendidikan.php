 <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pendidikan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?=base_url('dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Master</a></div>
              <div class="breadcrumb-item">Data Mapel</div>
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
                            <th>Jenjang</th>
                            <th>Institusi</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($pendidikan as $row) {?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['jenjang'];?></td>
                            <td><?=$row['nama_institusi'];?></td>
                            <td><?=$row['jurusan'];?></td>
                            <td><?=$row['tahun_lulus'];?></td>
                            <td><?=$row['ipk'];?></td>
                            <td>
                                <a href="<?=base_url('pendidikan/hapus/'.$row['id'])?>" class="btn btn-sm btn-icon btn-danger tombol-hapus">
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
                    <h5 class="modal-title">Tambah Pendidikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
                <form action="<?=base_url('pendidikan/simpan');?>" method="post" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="jenjang" class="col-sm-3 col-form-label">Jenjang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jenjang" id="jenjang" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_institusi" class="col-sm-3 col-form-label">Nama Institusi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_institusi" id="nama_institusi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jurusan" id="jurusan" required> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun_lulus" class="col-sm-3 col-form-label">Tahun Lulus</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ipk" class="col-sm-3 col-form-label">IPK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ipk" id="ipk" required>
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