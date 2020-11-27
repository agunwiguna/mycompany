  <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Biodata Pelamar</h1>
    </div>
    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>
    <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>
    <?php 
      if (($this->session->userdata('role')=="User")) { ?>
         <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Isi Form dibawah ini</h4>
            </div>
            <div class="card-body">
              <div class="text-center">
                <h4>Data Diri Pelamar</h4>
              </div>
              <?php
                $users_id = $this->session->userdata('id'); 
                $sql = "SELECT * FROM pelamar WHERE user_id='$users_id'";
                $cek = $this->db->query($sql)->result_array();
                if (count($cek) > 0) {?>
                  <div class="alert alert-success" role="alert">
                    Kamu sudah mengisi form lamaran
                  </div>
                <?php } else {?>
                  <form action="<?=base_url('pelamar-store')?>" method="POST">
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Posisi yang dilamar</label>
                  <div class="col-sm-10">
                    <input type="text" name="posisi" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">No. KTP</label>
                  <div class="col-sm-10">
                    <input type="number" name="no_ktp" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir.." required>
                  </div>
                    <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select name="jk" id="jk" class="form-control">
                      <option value="">-- Pilih --</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <input type="text" name="agama" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Golongan Darah</label>
                  <div class="col-sm-10">
                    <input type="text" name="golongan_darah" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" name="status" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Alamat KTP</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat_ktp" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Tinggal</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat_tinggal" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="<?= $this->session->userdata('email');?>" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">No. TLP</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_tlp" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Orang Terdekat yang dapat dihubungi</label>
                  <div class="col-sm-10">
                    <input type="text" name="orang_terdekat" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                  <div class="col-sm-10">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Jenjang</th>
                            <th>Institusi</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>IPK</th>
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
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Riwayat Pelatihan</label>
                  <div class="col-sm-10">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama Kursus/Seminar</th>
                            <th>Sertifikat</th>
                            <th>Tahun</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($pelatihan as $row) {?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_kursus'];?></td>
                            <td><?=$row['sertifikat'];?></td>
                            <td><?=$row['tahun'];?></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Riwayat Pekerjaan</label>
                  <div class="col-sm-10">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Perusahaan</th>
                            <th>Posisi</th>
                            <th>Pendapatan</th>
                            <th>Tahun</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($pekerjaan as $row) {?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_perusahaan'];?></td>
                            <td><?=$row['posisi_terakhir'];?></td>
                            <td><?=$row['pendapatan_terakhir'];?></td>
                            <td><?=$row['tahun'];?></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Skills</label>
                  <div class="col-sm-10">
                    <input type="text" name="skilss" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Bersedia ditempatkan diseluruh kantor perusahaan</label>
                  <div class="col-sm-10">
                    <select name="kesediaan" class="form-control" id="kesediaan" required>
                        <option value="">-- Pilih --</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Penghasilan yang diharapkan</label>
                  <div class="col-sm-10">
                      <input type="number" name="penghasilan" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
                <?php }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php } else {?>

      <?php } ?>
    

  </section>
</div>