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
          <span class="caption-subject bold uppercase">Tambah Akun</span>
          <span class="caption-helper uppercase">Admin</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/admin/tambah' ?>">
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
              <label class='col-md-3 control-label' for='password'>Password</label>
              <div class='col-sm-9'>
                <input type='password' id='password' name="password" placeholder='Password' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-3 control-label' for='role'>Hak Akses</label>
              <div class='col-sm-9'>
                <select id='role' name="role" class='form-control'>
                  <option value="1">Akses Penuh</option>
                  <option value="2">Master Data</option>
                  <option value="3">Informan</option>
                </select>
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
          <span class="caption-subject bold uppercase">Daftar Akun</span>
          <span class="caption-helper uppercase">Admin</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
        </div>
      </div>
      <div class="portlet-body">
        <table id="sample_1" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>
                No.
              </th>
              <th>
                ID
              </th>
              <th>
                Nama
              </th>
              <th>
                Hak Akses
              </th>
              <th>
                Opsi
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($admin as $j) { 
              $role = ''; if($j->ROLE_ADMIN == '1') { $role = 'Akses Penuh'; } elseif($j->ROLE_ADMIN == '2') { $role = 'Master Data'; } else { $role = 'Informan'; } 
              echo "<tr>
              <td style='text-align: right;width: 10%;''>".$no."</td>
              <td>".$j->ID_ADMIN."</td>
              <td>".$j->NAMA_ADMIN."</td>
              <td>".$role."</td>
              <td style='text-align: center;width: 20%;'>
                <div class='hidden-sm hidden-xs action-buttons'>
                  <a class='btn btn-xs btn-success' href='#modal-edit' data-toggle='modal' role='button' onclick='edit(\"".$j->ID_ADMIN."\", \"".$j->NAMA_ADMIN."\", \"".$j->PASS_ADMIN."\", \"".$j->ROLE_ADMIN."\")'>
                    <i class='ace-icon fa fa-pencil'></i> Ubah
                  </a>

                  <a class='btn btn-xs btn-danger' href='".base_url().'admin/hapus/'.$j->ID_ADMIN."' onclick='return confirm(\"Anda yakin?\");'>
                    <i class='ace-icon fa fa-trash-o'></i> Hapus
                  </a>
                </div>
              </td>
            </tr>";
            $no++; } ?>
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
					Ubah Admin
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/admin/ubah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div class="form-group">
          <label class='col-sm-3 control-label' for='id'>ID</label>
          <div class='col-sm-9'>
            <input type='text' id='id-u' name="id-u" placeholder='ID' class='form-control' readonly="" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-md-3 control-label' for='nama'>Nama</label>
          <div class='col-sm-9'>
            <input type='text' id='nama-u' name="nama-u" placeholder='Nama' class='form-control' required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-md-3 control-label' for='password'>Password</label>
          <div class='col-sm-9'>
            <input type='password' id='password-u' name="password-u" placeholder='Password' class='form-control' <?php if($_SESSION['role_admin'] != '1') { echo "required readonly"; } ?> />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label' for='role'>Hak Akses</label>
          <div class='col-sm-9'>
            <select id='role-u' name="role-u" class='form-control'>
              <option value="1">Akses Penuh</option>
              <option value="2">Master Data</option>
              <option value="3">Informan</option>
            </select>
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
  function edit(id, nama, password, role) {
    $('#id-u').val(id);
    $('#nama-u').val(nama);
    $('#password-u').val(password);
    $('#role-u').val(role);
  }
</script>
