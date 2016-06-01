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
          <span class="caption-subject bold uppercase">Daftar</span>
          <span class="caption-helper uppercase">Soal Minat Bakat</span>
        </div>
        <div class="actions">
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default" href="#modal-add" data-toggle="modal" role="button"><i class="fa fa-plus"></i></a>
        </div>
      </div>
      <div class="portlet-body">
        <table id="sample_1" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th rowspan="2" width="5%">No.</th>
              <th rowspan="2">Soal</th>
              <th colspan="4">Jawaban</th>
              <th rowspan="2" width="10%">Opsi</th>
            </tr>
            <tr>
              <th>Sanguin</th>
              <th>Koleris</th>
              <th>Melankolis</th>
              <th>Phlegmatis</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($soal_minat_bakat as $j) { ?>
            <tr>
              <td style="text-align: right;width: 5%;"><?php echo $no; ?>.</td>
              <td><?php echo $j->TEKS_SOAL; ?></td>
              <!-- kumpulkan jawaban dari masing2 soal -->
              <?php $jawaban = $this->tbl_jawaban_minat_bakat->get_soal($j->ID_SOAL); ?>
              <?php foreach ($jawaban as $jawab) { ?>
              <td><?php echo $jawab->JAWABAN; ?></td>
              <?php } ?>
              
              <td style="text-align: center;width: 10%;">
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="btn btn-xs btn-success" href="#modal-edit" data-toggle="modal" role="button" onclick="edit('<?php echo $j->ID_SOAL; ?>')">
                    <i class="ace-icon fa fa-pencil"></i> Ubah
                  </a>

                  <a class="btn btn-xs btn-danger" href="<?php echo base_url().'index.php/soal_minat_bakat/hapus/'.$j->ID_SOAL; ?>" onclick="return confirm('Anda yakin?');">
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

<div id="modal-add" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <span class="white">&times;</span>
          </button>
          Tambah Soal Minat Bakat
        </div>
      </div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/soal_minat_bakat/tambah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Soal</div>
        <input type='hidden' id='id' name="id" placeholder='ID' class='form-control' readonly="" required="" value="<?php echo $id; ?>" />
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='teks'>Teks Soal</label>
          <div class='col-sm-9'>
            <textarea id='teks' name="teks" placeholder='Teks Soal...' class='form-control' required=""></textarea>
          </div>
        </div>
        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Jawaban</div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban1'>Sanguin</label>
          <div class='col-sm-9'>
            <textarea id='jawaban1' name="jawaban1" placeholder='Opsi A' class='form-control' required=""></textarea>
            <input type="hidden" name="karakter1" value="Sanguin" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban2'>Koleris</label>
          <div class='col-sm-9'>
            <textarea id='jawaban2' name="jawaban2" placeholder='Opsi B' class='form-control' required=""></textarea>
            <input type="hidden" name="karakter2" value="Koleris" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban3'>Melankolis</label>
          <div class='col-sm-9'>
            <textarea id='jawaban3' name="jawaban3" placeholder='Opsi C' class='form-control' required=""></textarea>
            <input type="hidden" name="karakter3" value="Melankolis" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban4'>Phlegmatis</label>
          <div class='col-sm-9'>
            <textarea id='jawaban4' name="jawaban4" placeholder='Opsi D' class='form-control' required=""></textarea>
            <input type="hidden" name="karakter4" value="Phlegmatis" />
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Ubah Soal Minat Bakat
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/soal_minat_bakat/ubah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Soal</div>
        <input type='hidden' id='id-u' name="id-u" placeholder='ID' class='form-control' readonly="" required="" />
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='teks-u'>Teks Soal</label>
          <div class='col-sm-9'>
            <textarea id='teks-u' name="teks-u" placeholder='Teks Soal...' class='form-control' required=""></textarea>
          </div>
        </div>
        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Jawaban</div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u1'>Sanguin</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u1" name="idjawaban-u1" />
            <textarea id='jawaban-u1' name="jawaban-u1" placeholder='Opsi A' class='form-control' required=""></textarea>
            <input type="hidden" id="karakter-u1" name="karakter-u1" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u2'>Koleris</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u2" name="idjawaban-u2" />
            <textarea id='jawaban-u2' name="jawaban-u2" placeholder='Opsi B' class='form-control' required=""></textarea>
            <input type="hidden" id="karakter-u2" name="karakter-u2" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u3'>Melankolis</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u3" name="idjawaban-u3" />
            <textarea id='jawaban-u3' name="jawaban-u3" placeholder='Opsi C' class='form-control' required=""></textarea>
            <input type="hidden" id="karakter-u3" name="karakter-u3" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u4'>Phlegmatis</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u4" name="idjawaban-u4" />
            <textarea id='jawaban-u4' name="jawaban-u4" placeholder='Opsi D' class='form-control' required=""></textarea>
            <input type="hidden" id="karakter-u4" name="karakter-u4" />
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
  function edit(id_soal) {
    $.ajax({
      url: 'soal_minat_bakat/get_detil',
      type: 'POST',
      data: {'id_soal': id_soal},
      dataType: 'json',
      chace: false,
      success: function(result) {
        var soal = result.SOAL;
        var jawaban = result.JAWABAN;

        // soal
        $('#id-u').val(soal[0].ID_SOAL);
        $('#teks-u').val(soal[0].TEKS_SOAL);

        // jawaban
        $('#idjawaban-u1').val(jawaban[0].ID_JAWABAN);
        $('#jawaban-u1').val(jawaban[0].JAWABAN);
        $('#karakter-u1').val(jawaban[0].KARAKTER);

        $('#idjawaban-u2').val(jawaban[1].ID_JAWABAN);
        $('#jawaban-u2').val(jawaban[1].JAWABAN);
        $('#karakter-u2').val(jawaban[1].KARAKTER);

        $('#idjawaban-u3').val(jawaban[2].ID_JAWABAN);
        $('#jawaban-u3').val(jawaban[2].JAWABAN);
        $('#karakter-u3').val(jawaban[2].KARAKTER);

        $('#idjawaban-u4').val(jawaban[3].ID_JAWABAN);
        $('#jawaban-u4').val(jawaban[3].JAWABAN);
        $('#karakter-u4').val(jawaban[3].KARAKTER);
      },
      error: function(xhr, status, error) {
        console.log(error);
        alert(error);
      }
    });
  }
</script>
