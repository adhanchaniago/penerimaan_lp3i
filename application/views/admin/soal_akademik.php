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
          <a class="btn btn-default" href="<?php echo base_url('soal_akademik'); ?>"><i class="fa fa-chevron-left"></i></a>
          <span class="caption-subject bold uppercase">Daftar</span>
          <span class="caption-helper uppercase">Soal Akademik</span>
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
              <th>Opsi A</th>
              <th>Opsi B</th>
              <th>Opsi C</th>
              <th>Opsi D</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($soal_akademik as $j) { ?>
            <tr>
              <td style="text-align: right;width: 5%;"><?php echo $no; ?>.</td>
              <td><?php echo $j->TEKS_SOAL; ?></td>
              <!-- kumpulkan jawaban dari masing2 soal -->
              <?php $jawaban = $this->tbl_jawaban_akademik->get_soal($j->ID_SOAL); ?>
              <?php foreach ($jawaban as $jawab) { ?>
              <td><?php echo $jawab->JAWABAN; ?><?php echo $jawab->NILAI==1?" <strong>(Benar)</strong>":""; ?></td>
              <?php } ?>
              
              <td style="text-align: center;width: 10%;">
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="btn btn-xs btn-success" href="#modal-edit" data-toggle="modal" role="button" onclick="edit('<?php echo $j->ID_SOAL; ?>')">
                    <i class="ace-icon fa fa-pencil"></i> Ubah
                  </a>

                  <a class="btn btn-xs btn-danger" href="<?php echo base_url().'index.php/soal_akademik/hapus/'.$j->ID_SOAL; ?>" onclick="return confirm('Anda yakin?');">
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
          Tambah Soal Akademik
        </div>
      </div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/soal_akademik/tambah"; ?>' method='post' enctype="multipart/form-data">
      <div class='modal-body no-padding'>
        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Soal</div>
        <input type='hidden' id='id' name="id" placeholder='ID' class='form-control' readonly="" required="" value="<?php echo $id; ?>" />
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='bidang'>Bidang</label>
          <div class='col-sm-9'>
            <select id='bidang' name="bidang" placeholder='Bidang' class='form-control' required="" >
              <option></option>
              <?php foreach($bidang_soal as $bidang) { ?>
              <option value="<?php echo $bidang->ID_BIDANG_SOAL; ?>"><?php echo $bidang->NAMA_BIDANG_SOAL; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='teks'>Teks Soal</label>
          <div class='col-sm-9'>
            <textarea id='teks' name="teks" placeholder='Teks Soal...' class='form-control' required=""></textarea>
          </div>
        </div>

        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Gambar Bantuan</div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='gambar'>Gambar Bantuan</label>
          <div class='col-sm-9'>
            <input type="file" id='gambar' name="gambar[]" placeholder='Pilih Gambar...' class='form-control' accept=".jpg,.png,.bmp" multiple />
          </div>
        </div>

        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Jawaban</div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban1'>Opsi A</label>
          <div class='col-sm-9'>
            <textarea id='jawaban1' name="jawaban1" placeholder='Opsi A' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban2'>Opsi B</label>
          <div class='col-sm-9'>
            <textarea id='jawaban2' name="jawaban2" placeholder='Opsi B' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban3'>Opsi C</label>
          <div class='col-sm-9'>
            <textarea id='jawaban3' name="jawaban3" placeholder='Opsi C' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban4'>Opsi D</label>
          <div class='col-sm-9'>
            <textarea id='jawaban4' name="jawaban4" placeholder='Opsi D' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='benar'>Opsi Benar</label>
          <div class='col-sm-3'>
            <select id="benar" name="benar" class="form-control" required>
              <option></option>
              <option value="a">Opsi A</option>
              <option value="b">Opsi B</option>
              <option value="c">Opsi C</option>
              <option value="d">Opsi D</option>
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

<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Ubah Soal Akademik
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/soal_akademik/ubah"; ?>' method='post' enctype="multipart/form-data">
      <div class='modal-body no-padding'>
        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Soal</div>
        <input type='hidden' id='id-u' name="id-u" placeholder='ID' class='form-control' readonly="" required="" />
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='bidang-u'>Bidang</label>
          <div class='col-sm-9'>
            <select id='bidang-u' name="bidang-u" placeholder='Bidang' class='form-control' required="" >
              <option></option>
              <?php foreach($bidang_soal as $bidang) { ?>
              <option value="<?php echo $bidang->ID_BIDANG_SOAL; ?>"><?php echo $bidang->NAMA_BIDANG_SOAL; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='teks-u'>Teks Soal</label>
          <div class='col-sm-9'>
            <textarea id='teks-u' name="teks-u" placeholder='Teks Soal...' class='form-control' required=""></textarea>
          </div>
        </div>

        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Gambar Bantuan</div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right'>Gambar</label>
          <div class='col-sm-9' id="list-gambar">
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='gambar-u'>Tambah Gambar</label>
          <div class='col-sm-9'>
            <input type="file" id='gambar-u' name="gambar-u[]" placeholder='Pilih Gambar...' class='form-control' accept=".jpg,.png,.bmp" multiple />
          </div>
        </div>

        <div style="font-weight: bold;font-weight: 12pt;border-bottom: 1px solid #ececec;margin-bottom: 10px;">Jawaban</div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u1'>Opsi A</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u1" name="idjawaban-u1" />
            <textarea id='jawaban-u1' name="jawaban-u1" placeholder='Opsi A' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u2'>Opsi B</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u2" name="idjawaban-u2" />
            <textarea id='jawaban-u2' name="jawaban-u2" placeholder='Opsi B' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u3'>Opsi C</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u3" name="idjawaban-u3" />
            <textarea id='jawaban-u3' name="jawaban-u3" placeholder='Opsi C' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jawaban-u4'>Opsi D</label>
          <div class='col-sm-9'>
            <input type="hidden" id="idjawaban-u4" name="idjawaban-u4" />
            <textarea id='jawaban-u4' name="jawaban-u4" placeholder='Opsi D' class='form-control' required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='benar-u'>Opsi Benar</label>
          <div class='col-sm-3'>
            <select id="benar-u" name="benar-u" class="form-control" required>
              <option></option>
              <option value="a">Opsi A</option>
              <option value="b">Opsi B</option>
              <option value="c">Opsi C</option>
              <option value="d">Opsi D</option>
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
  function edit(id_soal) {
    $.ajax({
      url: 'soal_akademik/get_detil',
      type: 'POST',
      data: {'id_soal': id_soal},
      dataType: 'json',
      chace: false,
      success: function(result) {
        var soal = result.SOAL;
        var jawaban = result.JAWABAN;
        var gambar = result.GAMBAR;

        // soal
        $('#id-u').val(soal[0].ID_SOAL);
        $('#bidang-u').val(soal[0].ID_BIDANG_SOAL);
        $('#teks-u').val(soal[0].TEKS_SOAL);

        // jawaban
        $('#idjawaban-u1').val(jawaban[0].ID_JAWABAN);
        $('#jawaban-u1').val(jawaban[0].JAWABAN);
        $('#idjawaban-u2').val(jawaban[1].ID_JAWABAN);
        $('#jawaban-u2').val(jawaban[1].JAWABAN);
        $('#idjawaban-u3').val(jawaban[2].ID_JAWABAN);
        $('#jawaban-u3').val(jawaban[2].JAWABAN);
        $('#idjawaban-u4').val(jawaban[3].ID_JAWABAN);
        $('#jawaban-u4').val(jawaban[3].JAWABAN);

        // jawaban benar
        var idxBenar = 0;
        var jawabBenar = '';
        for (var i = 0; i < jawaban.length; i++) {
          if (jawaban[i].NILAI > 0) {
            idxBenar = i;
          };
        };
        if (idxBenar == 0) jawabBenar = 'a';
        else if(idxBenar == 1) jawabBenar = 'b';
        else if(idxBenar == 2) jawabBenar = 'c';
        else jawabBenar = 'd';
        $('#benar-u').val(jawabBenar);

        // list gambar
        var listGambar = "<span>Tidak ada.</span>";
        if(gambar.length > 0) {
          listGambar = "";
          var hostname = window.location.host + "/penerimaan_lp3i";
          for(var j = 0; j < gambar.length; j++) {
            listGambar += (j+1) + ". <a href='http://" + hostname + gambar[j].LOKASI_FILE.replace('.', '') + gambar[j].NAMA_FILE + "' target='_blank'>" + 
              gambar[j].NAMA_FILE + "</a> [<a href='soal_akademik/hapus_gambar/" + gambar[j].ID + 
              "' onclick='return confirm(\"Anda yakin?\")' style='color: red;'>Hapus</a>]&nbsp;";
            if(j != gambar.length - 1) listGambar += "<br>";
          }
          if(gambar.length > 1) listGambar += "<br>Opsi: <a href='soal_akademik/hapus_gambar_soal/" + gambar[0].ID_SOAL + "' style='color: red;' onclick='return confirm(\"Anda yakin?\")'>Hapus Semua</a>" ;
        }
        $('#list-gambar').html(listGambar);
      },
      error: function(xhr, status, error) {
        console.log(error);
        alert(error);
      }
    });
  }
</script>
