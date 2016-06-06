<div class="row">
  <div class="col-md-5">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <span class="caption-subject bold uppercase">Data</span>
          <span class="caption-helper uppercase">Peserta</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <table width="100%">
          <tr>
            <td width="30%">No. Pendaftaran</td>
            <td width="5%">:</td>
            <td width="65%">123456789</td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>Achmad ainul yaqin</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>Laki - laki</td>
          </tr>
          <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td>Pasuruan, 03-03-1993 </td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td>Islam</td>
          </tr>
          <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>Web Developer</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>JL. Raya Luwung No.28 Desa Beji , Kecamatan Beji , Kabupaten Pasuruan, Jawa Timur 67154</td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td>:</td>
            <td>085736071402</td>
          </tr>
          <tr>
            <td>Evaluasi</td>
            <td>:</td>
            <td>Gimana yah yah kayak gini inilah saya</td>
          </tr>
          <tr>
            <td>Sumber inforamasi</td>
            <td>:</td>
            <td>Website LP3i</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-7">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <span class="caption-subject bold uppercase">Penilaian</span>
          <span class="caption-helper uppercase">Peserta</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'wawancara/tambah_kriteria' ?>">
          <input type='hidden' id='id' name="id" placeholder='ID' class='form-control' value="1" readonly="" required="" />
          
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'>Komunikasi</label>
            <div class='col-sm-8'>
              <input type='text' id='nama' name="nama"  class='form-control' required="" />
            </div>
          </div>
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'>Intelektual</label>
            <div class='col-sm-8'>
              <input type='text' id='nama' name="nama"  class='form-control' required="" />
            </div>
          </div>
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'>Motivasi Diri</label>
            <div class='col-sm-8'>
              <input type='text' id='nama' name="nama" class='form-control' required="" />
            </div>
          </div>
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'>Kedewasaan</label>
            <div class='col-sm-8'>
              <input type='text' id='nama' name="nama" class='form-control' required="" />
            </div>
          </div>
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'>Kerjasama</label>
            <div class='col-sm-8'>
              <input type='text' id='nama' name="nama" class='form-control' required="" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Simpan
              </button>
              &nbsp; &nbsp;
              <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Reset
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>