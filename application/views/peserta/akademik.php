
<?php foreach ($bidang as $b): ?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
	      	<div class="portlet-title">
		        <div class="caption caption-md font-red-sunglo">
					<i class="fa fa-calendar-o font-red-sunglo"></i>
					<span class="caption-subject theme-font bold uppercase">Bidang <?= $b->NAMA_BIDANG_SOAL ?></span>
				</div>
		        <div class="actions">
		          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
		        </div>
	      	</div>
	      	<div class="portlet-body">
				<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
					<div class="general-item-list">
						<div class="panel-group accordion" id="accordion3">
							<?php $soal = $this->tbl_soal_akademik->get_by_bidang($b->ID_BIDANG_SOAL); ?>
							<?php if (count($soal) > 0): ?>
							<?php $no_soal = 1; ?>
							<?php foreach ($soal as $s): ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_<?= $s->ID_SOAL ?>">
											<b><?= $no_soal++ ?>). <?= $s->TEKS_SOAL ?></b>
										</a>
										</h4>
									</div>
									<div id="collapse_3_<?= $s->ID_SOAL ?>" class="panel-collapse collapse">
										<div class="row">
											<div class="col-md-11" style="margin-left:20px;">
												<?php $jawaban = $this->tbl_jawaban_akademik->get_soal($s->ID_SOAL); ?>
												<div class="form-group form-md-radios">
												<?php foreach ($jawaban as $j): ?>
													<div class="md-radio-list">
														<div class="md-radio">
															<input type="radio" id="jawaban<?= $j->ID_JAWABAN ?>" name="soal[<?= $s->ID_SOAL ?>]" class="md-radiobtn">
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
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>
<div>
	<a title="Kembali" data-original-title="Kembali" class="btn btn-default" href="javascript:history.go(-1);"><i class="fa fa-chevron-left"></i></a>
</div>