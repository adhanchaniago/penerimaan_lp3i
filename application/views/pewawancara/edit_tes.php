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
            <td width="65%"><?= $peserta->NO_PENDAFTARAN ?></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= $peserta->NAMA ?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= $peserta->JENIS_KELAMIN=='L'?'Laki - laki':'Perempuan' ?></td>
          </tr>
          <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td><?= $peserta->TEMPAT_LAHIR ?>, <?= date("d-m-Y",strtotime($peserta->TANGGAL_LAHIR)) ?> </td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?= $peserta->AGAMA ?></td>
          </tr>
          <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?= $peserta->PEKERJAAN ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $peserta->ALAMAT_TETAP ?></td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><?= $peserta->NO_HANDPHONE ?></td>
          </tr>
          <tr>
            <td>Evaluasi</td>
            <td>:</td>
            <td><?= $peserta->EVALUASI_DIRI ?></td>
          </tr>
          <tr>
            <td>Sumber inforamasi</td>
            <td>:</td>
            <td><?= $peserta->SUMBER_INFORMASI ?></td>
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
        <?php if (isset($_SESSION['notif_error'])): ?>
        <div class="alert alert-block alert-danger fade in">
          <button type="button" class="close" data-dismiss="alert"></button>
          <p>
            <?= $_SESSION['notif_error']; ?>
          </p>
        </div><!-- end.alert -->
        <?php endif ?>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'pewawancara/pewawancara_act/update' ?>">
          <?php $keterangan = ''; ?>
          <?php foreach ($kriteria as $k): ?>
          <?php if($k->ID_KRITERIA == '1' or $k->ID_KRITERIA == '2' or $k->ID_KRITERIA == '3' or $k->ID_KRITERIA == '8'){$max = '15';}else{$max = '10';} ?>
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'><?= $k->NAMA_KRITERIA ?></label>
            <div class='col-sm-8'>
              <input type='number' id='kriteria_<?= $k->ID_KRITERIA ?>' name="kriteria[<?= $k->ID_KRITERIA ?>]"  class='form-control' max='<?= $max ?>' placeholder="nilai max <?= $max ?>" value='<?= $k->SKOR ?>' required=""/>
            </div>
          </div>
          <?php $keterangan = $k->KETERANGAN; ?>
          <?php endforeach ?>
          <div class="form-group">
            <label class='col-md-3 control-label' for='nama'>Keterangan</label>
            <div class='col-sm-8'>
              <textarea name="keterangan" id="keterangan" cols="10" rows="5" class='form-control'><?= $keterangan ?></textarea>
              <input type='hidden' id='pendaftar' name="pendaftar"  class='form-control' value="<?= $peserta->NO_PENDAFTARAN ?>"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Simpan
              </button>
              &nbsp; &nbsp;
              <button class="btn btn-default" type="reset">
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
<div class="row">
  <div class="col-md-12">
    <a title="Kembali" data-original-title="Kembali" class="btn btn-default" href="javascript:history.go(-1);"><i class="fa fa-chevron-left"></i></a>
  </div>
</div>