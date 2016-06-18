<div class="container-fluid">
	<div class="page-content page-content-popup">
		<!-- BEGIN PAGE CONTENT FIXED -->
		<div class="page-content-fixed-header">
			<h2><?php echo $judul; ?></h2>					
		</div>

		<div class="col-md-12">
			<table height="100px" width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px; margin-bottom: 10px;">
				<tr style="text-align: center;font-size: 14pt;font-weight: bold;color: rgb(100, 100, 100)">
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">1. Data Pribadi</td>
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">2. Riwayat Pendidikan</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(100, 100, 100)">3. Riwayat Pekerjaan</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">4. Anggota Keluarga</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">5. Evaluasi Diri</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">6. Selesai</td>
				</tr>
			</table>
		</div>
		
		<div class="col-md-12">
			<?php if (isset($_SESSION['pesan'])) { ?>
			<div class="alert alert-block alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<?php echo $this->session->flashdata('pesan'); ?>
			</div>
			<?php } ?>
		</div>

		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-dark">
						<span class="caption-subject bold uppercase">Riwayat</span>
						<span class="caption-helper">Pekerjaan</span>
					</div>
					<div class="actions">
						<a title="Fullscreen" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
						<a title="Tambah Baru" class="btn btn-circle btn-icon-only btn-default" href="#modal-add" data-toggle="modal" role="button"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<div class="portlet-body">
						<div class="col-md-12">
							<a class="btn btn-success pull-right" href="#modal-add" data-toggle="modal" role="button"><i class="fa fa-plus"> Tambah</i></a><br>
							<p>Silahkan mengisi riwayat pekerjaan Anda sesuai dengan yang pernah Anda tempuh.</p>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					          <thead>
					            <tr>
					              <th width="5%">No.</th>
					              <th width="25%">Nama</th>
					              <th width="15%">Periode</th>
					              <th width="15%">Jabatan Akhir</th>
					              <th width="15%">Gaji Per Bulan</th>
					              <th width="10%">Opsi</th>
					            </tr>
					          </thead>
					          <tbody>
					            <?php
					            $no = 1;
					            foreach($pekerjaan as $j) { ?>
					            <tr>
					              <td style="text-align: right;width: 10%;"><?php echo $no; ?>.</td>
					              <td><?php echo $j->NAMA_PERUSAHAAN; ?></td>
					              <?php
					              $tahun = explode("-", $j->TANGGAL_SELESAI)[0];
					              if($tahun == 9999) $tahun = "Sekarang";
					              else $tahun = date("Y", strtotime($j->TANGGAL_SELESAI));
					              ?>
					              <td><?php echo date("Y", strtotime($j->TANGGAL_MULAI))." - ".$tahun; ?></td>
					              <td><?php echo $j->JABATAN_AKHIR; ?></td>
					              <td><?php echo "Rp".str_replace(",", ".", number_format($j->GAJI_PERBULAN)); ?></td>
					              <td style="text-align: center;width: 20%;">
					                <div class="hidden-sm hidden-xs action-buttons">
					                  <a class="btn btn-xs btn-success" href="#modal-edit" data-toggle="modal" role="button" onclick="edit('<?php echo $j->ID; ?>', 
					                  '<?php echo $j->NAMA_PERUSAHAAN; ?>', '<?php echo $j->TANGGAL_MULAI; ?>', '<?php echo $j->TANGGAL_SELESAI; ?>', 
					                  '<?php echo $j->JABATAN_AKHIR; ?>', '<?php echo $j->GAJI_PERBULAN; ?>')">
					                    <i class="ace-icon fa fa-pencil"></i> Ubah
					                  </a>

					                  <a class="btn btn-xs btn-danger" href="<?php echo base_url().'index.php/page/riwayat_pekerjaan_act/'.$pendaftar->NO_PENDAFTARAN.'/hapus/'.$j->ID; ?>" 
					                  onclick="return confirm('Anda yakin?');">
					                    <i class="ace-icon fa fa-trash-o"></i> Hapus
					                  </a>
					                </div>
					              </td>
					            </tr>
					            <?php $no++; } ?>
					          </tbody>
					        </table>
						</div>
						
						<a href="<?php echo base_url().'index.php/page/anggota_keluarga/'.$pendaftar->NO_PENDAFTARAN; ?>" class="btn grey">Lewati</a>
						<a href="<?php echo base_url().'index.php/page/anggota_keluarga/'.$pendaftar->NO_PENDAFTARAN; ?>" class="btn green pull-right">Lanjut</a>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT FIXED -->

		<!-- Copyright BEGIN -->
		<p class="copyright-v2">2016 © PMB LP3I Surabaya by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a></p>
		<!-- Copyright END -->
	</div>
</div>    

<div id="modal-add" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <span class="white">&times;</span>
          </button>
          Tambah Riwayat Pekerjaan
        </div>
      </div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/page/riwayat_pekerjaan_act/".$pendaftar->NO_PENDAFTARAN."/tambah"; ?>' method='post' enctype="multipart/form-data">
      <div class='modal-body no-padding'>
        <input type='hidden' id='id' name="id" class='form-control' readonly="" required="" value="<?php echo $id; ?>" />
        
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama Perusahaan</label>
          <div class='col-sm-9'>
            <input type="text" id='nama' name="nama" placeholder='Contoh: PT. ABDI BERKAH CAHAYA' class='form-control' required="" />
          </div>
        </div>

        <div class="form-group">
			<label class="col-md-3 control-label" for="mulai">Mulai/Masuk</label>
			<div class="col-md-9">
				<input class="form-control form-control-inline input-medium date-picker" id="mulai" name="mulai" size="16" type="date" placeholder="DD/MM/YYYY" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="selesai">Selesai/Keluar</label>
			<div class="col-md-9">
				<input class="form-control form-control-inline input-medium date-picker" id="selesai" name="selesai" size="16" type="date" placeholder="DD/MM/YYYY" />
			</div>
		</div>

		<div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jabatan'>Jabatan Terakhir</label>
          <div class='col-sm-9'>
            <input type="text" id='jabatan' name="jabatan" placeholder='Jabatan' class='form-control' />
          </div>
        </div>

        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='gaji'>Gaji Per Bulan</label>
          <div class='col-sm-9'>
            <input type="number" id='gaji' name="gaji" placeholder='1000000' class='form-control' />
          </div>
        </div>

      </div>
      <div class='modal-footer no-margin-top'>
        <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
          <i class='ace-icon fa fa-times'></i> Tutup
        </button>&nbsp;
        <button class='btn btn-primary btn-sm' type='submit'>
          <i class='ace-icon fa fa-check'></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal-edit" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <span class="white">&times;</span>
          </button>
          Ubah Riwayat Pekerjaan
        </div>
      </div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/page/riwayat_pekerjaan_act/".$pendaftar->NO_PENDAFTARAN."/ubah"; ?>' method='post' enctype="multipart/form-data">
      <div class='modal-body no-padding'>
        <input type='hidden' id='id-u' name="id-u" class='form-control' readonly="" required="" value="<?php echo $id; ?>" />
        
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama-u'>Nama Perusahaan</label>
          <div class='col-sm-9'>
            <input type="text" id='nama-u' name="nama-u" placeholder='Contoh: PT. ABDI BERKAH CAHAYA' class='form-control' required="" />
          </div>
        </div>

        <div class="form-group">
			<label class="col-md-3 control-label" for="mulai-u">Mulai/Masuk</label>
			<div class="col-md-9">
				<input class="form-control form-control-inline input-medium date-picker" id="mulai-u" name="mulai-u" size="16" type="date" placeholder="DD/MM/YYYY" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="selesai-u">Selesai/Keluar</label>
			<div class="col-md-9">
				<input class="form-control form-control-inline input-medium date-picker" id="selesai-u" name="selesai-u" size="16" type="date" placeholder="DD/MM/YYYY" />
			</div>
		</div>

		<div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jabatan-u'>Jabatan Terakhir</label>
          <div class='col-sm-9'>
            <input type="text" id='jabatan-u' name="jabatan-u" placeholder='Jabatan' class='form-control' />
          </div>
        </div>

        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='gaji-u'>Gaji Per Bulan</label>
          <div class='col-sm-9'>
            <input type="number" id='gaji-u' name="gaji-u" placeholder='1000000' class='form-control' />
          </div>
        </div>

      </div>
      <div class='modal-footer no-margin-top'>
        <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
          <i class='ace-icon fa fa-times'></i> Tutup
        </button>&nbsp;
        <button class='btn btn-primary btn-sm' type='submit'>
          <i class='ace-icon fa fa-check'></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	function edit(id, nama, mulai, selesai, jabatan, gaji) {
		$("#id-u").val(id);
		$("#nama-u").val(nama);
		$("#mulai-u").val(mulai);
		$("#selesai-u").val(selesai);
		$("#jabatan-u").val(jabatan);
		$("#gaji-u").val(gaji);
	}
</script>