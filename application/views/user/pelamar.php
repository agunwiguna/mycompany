 <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelamar</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?=base_url('');?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data Pelamar</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail Data Pelamar</h4>
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
                      <table class="table table-striped" id="users">
                        <tbody>
                        <?php foreach($pelamar as $row){?>                 
                            <tr>                    
                                <td width="200px">Posisi yang dilamar</td>
                                <td width="50px">:</td>
                                <td><?=$row['posisi'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Nama</td>
                                <td width="50px">:</td>
                                <td><?=$row['nama'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">No. KTP</td>
                                <td width="50px">:</td>
                                <td><?=$row['no_ktp'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Tempat Lahir</td>
                                <td width="50px">:</td>
                                <td><?=$row['tempat_lahir'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Tanggal Lahir</td>
                                <td width="50px">:</td>
                                <td><?=$row['tanggal_lahir'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Jenis Kelamin</td>
                                <td width="50px">:</td>
                                <td><?=$row['jk'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Agama</td>
                                <td width="50px">:</td>
                                <td><?=$row['agama'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Golongan Darah</td>
                                <td width="50px">:</td>
                                <td><?=$row['golongan_darah'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Status</td>
                                <td width="50px">:</td>
                                <td><?=$row['status'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Alamat KTP</td>
                                <td width="50px">:</td>
                                <td><?=$row['alamat_ktp'] ?></td>
                            </tr>
                             <tr>                    
                                <td width="100px">Alamat Tinggal</td>
                                <td width="50px">:</td>
                                <td><?=$row['alamat_tinggal'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Telepon</td>
                                <td width="50px">:</td>
                                <td><?=$row['no_tlp'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Orang terdekat yang dapat dihubungi</td>
                                <td width="50px">:</td>
                                <td><?=$row['orang_terdekat'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Skilss</td>
                                <td width="50px">:</td>
                                <td><?=$row['skilss'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Kesediaan ditempatkan di perusahaan lain</td>
                                <td width="50px">:</td>
                                <td><?=$row['kesediaan'] ?></td>
                            </tr>
                            <tr>                    
                                <td width="100px">Penghasilan yang diharapkan</td>
                                <td width="50px">:</td>
                                <td><?=$row['penghasilan'] ?></td>
                            </tr>
                            
                        <?php } ?>     
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>