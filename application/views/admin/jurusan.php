<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="row">
  <div class="col-md-5">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <span class="caption-subject bold uppercase">Tambah</span>
          <span class="caption-helper uppercase">Jurusan</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/jurusan/tambah' ?>">
            <div class="form-group">
              <label class='col-sm-3 control-label' for='id'>ID</label>
              <div class='col-sm-9'>
                <input type='text' id='id' name="id" placeholder='ID' class='form-control' value="<?php echo $id; ?>" readonly="" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-md-3 control-label' for='nama'>Nama</label>
              <div class='col-sm-9'>
                <input type='text' id='nama' name="nama" placeholder='Nama' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-3 control-label' for='keterangan'>Keterangan</label>
              <div class='col-sm-9'>
                <textarea id='keterangan' name="keterangan" placeholder='Keterangan' class='form-control'></textarea>
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

  <div class="col-md-7">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <span class="caption-subject bold uppercase">Daftar</span>
          <span class="caption-helper uppercase">jurusan</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($jurusan as $j) { ?>
            <tr>
              <td style="text-align: right;width: 10%;"><?php echo $no; ?>.</td>
              <td><?php echo $j->NAMA_JURUSAN; ?></td>
              <td><?php echo $j->KETERANGAN; ?></td>
              <td style="text-align: center;width: 20%;">
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="btn btn-xs btn-success" href="#modal-edit" data-toggle="modal" role="button" onclick="edit('<?php echo $j->ID_JURUSAN; ?>', '<?php echo $j->NAMA_JURUSAN; ?>', '<?php echo $j->KETERANGAN; ?>')">
                    <i class="ace-icon fa fa-pencil"></i> Ubah
                  </a>

                  <a class="btn btn-xs btn-danger" href="<?php echo base_url().'index.php/jurusan/hapus/'.$j->ID_JURUSAN; ?>" onclick="return confirm('Anda yakin?');">
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
					Ubah Jurusan
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/jurusan/ubah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='id-u'>ID</label>
          <div class='col-sm-9'>
            <input type='text' id='id-u' name="id-u" placeholder='ID' class='form-control' readonly="" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama-u'>Nama</label>
          <div class='col-sm-9'>
            <input type='text' id='nama-u' name="nama-u" placeholder='Nama' class='form-control' required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label' for='keterangan-u'>Keterangan</label>
          <div class='col-sm-9'>
            <textarea id='keterangan-u' name="keterangan-u" placeholder='Keterangan' class='form-control'></textarea>
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
  function edit(id, nama, keterangan) {
    $('#id-u').val(id);
    $('#nama-u').val(nama);
    $('#keterangan-u').val(keterangan);
  }
</script>
