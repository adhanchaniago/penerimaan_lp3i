<form action="<?= base_url() ?>peserta/ujian/jawaban_bakat" method="POST" id="form_soal_akademik" onsubmit="return konfirmasi()">
<input type="hidden" name="no_tes" value="<?= $bakat ?>">

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
	      	<div class="portlet-title">
		        <div class="caption caption-md font-red-sunglo">
					<i class="fa fa-calendar-o font-red-sunglo"></i>
					<span class="caption-subject theme-font bold uppercase">SOAL MINAT BAKAT</span>
				</div>
		        <div class="actions">
		          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
		        </div>
	      	</div>
	      	<div class="portlet-body">
				<div  data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
					<div class="general-item-list">
						<div class="panel-group accordion" id="accordion3">
							<?php $no_soal = 1; ?>
							<?php foreach ($soal as $s): ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_<?= $s->ID_SOAL ?>">
											<b><?= $no_soal++ ?>). <?= $s->TEKS_SOAL ?></b><span id="soal_<?= $s->ID_SOAL ?>" class="badge badge-success" style="margin-left:15px"></span>
										</a>
										</h4>
									</div>
									<div id="collapse_3_<?= $s->ID_SOAL ?>" class="panel-collapse collapse">
										<div class="row">
											<div class="col-md-11" style="margin-left:20px;">
												<?php $jawaban = $this->tbl_jawaban_minat_bakat->get_soal($s->ID_SOAL); ?>
												<div class="form-group form-md-radios">
												<?php foreach ($jawaban as $j): ?>
													<div class="md-radio-list">
														<div class="md-radio">
															<input type="radio" id="jawaban<?= $j->ID_JAWABAN ?>" name="soal[<?= $s->ID_SOAL ?>]" class="md-radiobtn" value="<?= $j->ID_JAWABAN ?>" onclick="tandai(<?= $s->ID_SOAL ?>)">
															<label for="jawaban<?= $j->ID_JAWABAN ?>">
															<span></span>
															<span class="check"></span>
															<span class="box"></span>
															<?= $j->JAWABAN ?> </label>
														</div>
													</div>
												<?php endforeach ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
		<button type="submit" class="btn btn-primary" id="btn_selesai"><i class="fa fa-save"></i> Selesai</button>
		</div>
	</div>
</div>
</form>
<br>
<div class="row">
	<div class="col-md-12">
	<a title="Kembali" data-original-title="Kembali" class="btn btn-default" href="javascript:history.go(-1);"><i class="fa fa-chevron-left"></i></a>
	</div>
</div>
<script>
	function konfirmasi()
	{
		var konfirmasi = confirm("Apakah anda yakin ?\nPastikan tidak ada soal yang belum anda jawab. Jawaban anda akan di simpan oleh sistem dan tidak bisa di ulangi.");
		if (konfirmasi)
		{
			return true;
		}else{
			return false;
		}
	}


	function tandai(id)
	{
		$("#soal_"+id).html('<i class="fa fa-check"></i>');
	}
</script>