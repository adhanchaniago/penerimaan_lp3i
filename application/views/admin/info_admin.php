<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <span class="caption-subject bold uppercase">Tambah</span>
          <span class="caption-helper uppercase">Informasi</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'informasi/tambah' ?>">
            <div class="form-group">
              <label class='col-md-2 control-label' for='judul'>Judul</label>
              <div class='col-sm-10'>
                <input type='text' id='judul' name="judul" placeholder='Judul' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-2 control-label' for='informasi'>Informasi</label>
              <div class='col-sm-10'>
                <textarea id='informasi' name="informasi" placeholder='Informasi yang akan ditulis.' class='form-control' rows="10" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-2 col-md-10">
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

  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <span class="caption-subject bold uppercase">Daftar</span>
          <span class="caption-helper uppercase">informasi</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <table id="sample_1" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Isi Informasi</th>
              <th>Tanggal</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($informasi as $info) { ?>
            <tr>
              <td style="text-align: right;width: 10%;"><?php echo $no; ?>.</td>
              <td><?php echo $info['judul']; ?></td>
              <td><?php echo $info['isi']; ?></td>
              <td><?php echo $info['tanggal']; ?></td>
              <td style="text-align: center;width: 20%;">
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="btn btn-xs btn-success" href="#modal-edit" data-toggle="modal" role="button" onclick="edit('<?php echo $info['judul']; ?>', '<?php echo $info['tanggal']; ?>', '<?php echo $info['isi']; ?>', '<?php echo $info['filename']; ?>')">
                    <i class="ace-icon fa fa-pencil"></i> Ubah
                  </a>

                  <a class="btn btn-xs btn-danger" href="<?php echo base_url().'informasi/hapus/'.$info['filename']; ?>" onclick="return confirm('Anda yakin?');">
                    <i class="ace-icon fa fa-trash-o"></i> Hapus
                  </a>
                </div>
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Ubah Informasi
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."informasi/ubah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <input type='hidden' id='filename-u' name="filename-u" class='form-control' readonly="" required="" />
        <input type='hidden' id='tanggal-u' name="tanggal-u" class='form-control' readonly="" />
        <div class="form-group">
          <label class='col-md-3 control-label' for='judul-u'>Judul</label>
          <div class='col-sm-9'>
            <input type='text' id='judul-u' name="judul-u" placeholder='Judul' class='form-control' required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label' for='informasi-u'>Informasi</label>
          <div class='col-sm-9'>
            <textarea id='informasi-u' name="informasi-u" placeholder='Informasi yang akan ditulis.' class='form-control' required></textarea>
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
  function edit(judul, tanggal, isi, filename) {
    $('#filename-u').val(filename);
    $('#judul-u').val(judul);
    $('#tanggal-u').val(tanggal);
    $('#informasi-u').val(isi);
  }
</script>