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
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">3. Riwayat Pekerjaan</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(100, 100, 100)">4. Anggota Keluarga</td>
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
						<span class="caption-subject bold uppercase">Anggota</span>
						<span class="caption-helper">Keluarga</span>
					</div>
					<div class="actions">
						<a title="Fullscreen" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
						<a title="Tambah Baru" class="btn btn-circle btn-icon-only btn-default" href="#modal-add" data-toggle="modal" role="button"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<div class="portlet-body">
						<div class="col-md-12">
							<p>Silahkan mengisi anggota keluarga Anda dengan sesuai.</p>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					          <thead>
					            <tr>
					              <th width="5%">No.</th>
					              <th width="25%">Nama</th>
					              <th width="15%">Hubungan</th>
					              <th width="5%">Usia</th>
					              <th width="10">Pekerjaan</th>
					              <th width="10%">Opsi</th>
					            </tr>
					          </thead>
					          <tbody>
					            <?php
					            $no = 1;
					            foreach($anggota_keluarga as $j) { ?>
					            <tr>
					              <td style="text-align: right;width: 10%;"><?php echo $no; ?>.</td>
					              <td><?php echo $j->NAMA; ?></td>
					              <td><?php echo $j->HUBUNGAN_KELUARGA; ?></td>
					              <td><?php echo $j->USIA; ?> Tahun</td>
					              <td><?php echo $j->PEKERJAAN; ?></td>
					              <td style="text-align: center;width: 20%;">
					                <div class="hidden-sm hidden-xs action-buttons">
					                  <a class="btn btn-xs btn-success" href="#modal-edit" data-toggle="modal" role="button" onclick="edit('<?php echo $j->ID; ?>', 
					                  '<?php echo $j->NAMA; ?>', '<?php echo $j->HUBUNGAN_KELUARGA; ?>', '<?php echo $j->USIA; ?>', 
					                  '<?php echo $j->PEKERJAAN; ?>')">
					                    <i class="ace-icon fa fa-pencil"></i> Ubah
					                  </a>

					                  <a class="btn btn-xs btn-danger" href="<?php echo base_url().'index.php/page/anggota_keluarga_act/'.$pendaftar->NO_PENDAFTARAN.'/hapus/'.$j->ID; ?>" 
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
						
						<a href="<?php echo base_url().'index.php/page/evaluasi_diri/'.$pendaftar->NO_PENDAFTARAN; ?>" class="btn grey">Lewati</a>
						<a href="<?php echo base_url().'index.php/page/evaluasi_diri/'.$pendaftar->NO_PENDAFTARAN; ?>" class="btn green pull-right">Lanjut</a>
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
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/page/anggota_keluarga_act/".$pendaftar->NO_PENDAFTARAN."/tambah"; ?>' method='post' enctype="multipart/form-data">
      <div class='modal-body no-padding'>
        <input type='hidden' id='id' name="id" class='form-control' readonly="" required="" value="<?php echo $id; ?>" />
        
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
          <div class='col-sm-9'>
            <input type="text" id='nama' name="nama" placeholder='Nama Anggota Keluarga' class='form-control' required="" />
          </div>
        </div>

        <div class="form-group">
			<label class="col-md-3 control-label" for="hubungan-alt">Hubungan Keluarga</label>
			<div class="col-md-9">
				<select class="form-control form-control-inline input-medium" id="hubungan-alt">
					<option>Ayah</option>
					<option>Ibu</option>
					<option>Kakak</option>
					<option>Adik</option>
					<option>Lainnya</option>
				</select>
			</div>
		</div>

		<div class="form-group" id="txthubungan">
			<div class="col-md-offset-3 col-md-9">
				<input class="form-control form-control-inline input-medium" name="hubungan" type="text" id="hubungan" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="usia">Usia</label>
			<div class="col-md-9">
				<input class="form-control form-control-inline input-medium" id="usia" name="usia" type="number" value="0" max="100" />
			</div>
		</div>

		<div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='pekerjaan'>Pekerjaan</label>
          <div class='col-sm-9'>
            <input type="text" id='pekerjaan' name="pekerjaan" placeholder='Pekerjaan' class='form-control' />
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
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/page/anggota_keluarga_act/".$pendaftar->NO_PENDAFTARAN."/ubah"; ?>' method='post' enctype="multipart/form-data">
      <div class='modal-body no-padding'>
        <input type='hidden' id='id-u' name="id-u" class='form-control' readonly="" required="" value="<?php echo $id; ?>" />
        
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama-u'>Nama</label>
          <div class='col-sm-9'>
            <input type="text" id='nama-u' name="nama-u" placeholder='Nama Anggota Keluarga' class='form-control' required="" />
          </div>
        </div>

        <div class="form-group">
			<label class="col-md-3 control-label" for="hubungan-alt-u">Hubungan Keluarga</label>
			<div class="col-md-9">
				<select class="form-control form-control-inline input-medium" id="hubungan-alt-u">
					<option>Ayah</option>
					<option>Ibu</option>
					<option>Kakak</option>
					<option>Adik</option>
					<option>Lainnya</option>
				</select>
			</div>
		</div>

		<div class="form-group" id="txthubungan-u">
			<div class="col-md-offset-3 col-md-9">
				<input class="form-control form-control-inline input-medium" name="hubungan-u" type="text" id="hubungan-u" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="usia-u">Usia</label>
			<div class="col-md-9">
				<input class="form-control form-control-inline input-medium" id="usia-u" name="usia-u" type="number" value="0" max="100" />
			</div>
		</div>

		<div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='pekerjaan-u'>Pekerjaan</label>
          <div class='col-sm-9'>
            <input type="text" id='pekerjaan-u' name="pekerjaan-u" placeholder='Pekerjaan' class='form-control' />
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
	function edit(id, nama, hubungan, usia, pekerjaan) {
		$("#id-u").val(id);
		$("#nama-u").val(nama);
		$("#hubungan-u").val(hubungan);
		$("#usia-u").val(usia);
		$("#pekerjaan-u").val(pekerjaan);
	}

	$(document).ready(function() {
		// add new
		$("#txthubungan").hide();
		var hubungan = $("#hubungan-alt").val();
		$("#hubungan").val(hubungan);

		$("#hubungan-alt").change(function() {
			var hubungan = $(this).val();
			if(hubungan === "Lainnya") {
				$("#txthubungan").show();
				$("#hubungan").val("");
				$("#hubungan").focus();
			} else {
				$("#txthubungan").hide();
				$("#hubungan").val(hubungan);
			}
		});

		// edit
		$("#txthubungan-u").hide();
		var hubungan = $("#hubungan-alt-u").val();
		$("#hubungan-u").val(hubungan);

		$("#hubungan-alt-u").change(function() {
			var hubungan = $(this).val();
			if(hubungan === "Lainnya") {
				$("#txthubungan-u").show();
				$("#hubungan-u").val("");
				$("#hubungan-u").focus();
			} else {
				$("#txthubungan-u").hide();
				$("#hubungan-u").val(hubungan);
			}
		});
	});
</script>
