<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase"><?php echo explode(',', $judul)[0]; ?></span>
					<span class="caption-helper uppercase"><?php echo explode(',', $judul)[1]; ?></span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div>
						<br>
						<form action="<?php echo base_url('laporan/view_keseluruhan'); ?>" class="form-horizontal" method="post">
							
						<div class="form-group">
			              <label class='col-md-2 control-label' for='periode'>Periode</label>
			              <div class='col-sm-4'>
			                <select id='periode' name="periode" class="form-control" required>
			                	<option value="">Pilih Periode</option>
			                	<?php 
			                	for ($i=date("Y"); $i > (date("Y") - 5 ); $i--) { 
			                		echo '<option value="'.$i.'">'.$i.'</option>';
			                	}
			                	?>
			                </select>
			              </div>
			              <div class='col-sm-2'>
			              	<button type="submit" class="btn btn-primary">Tampilkan</button>
			              </div>
			            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
</script>