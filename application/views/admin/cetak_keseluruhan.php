	<table width="100%" height="102px">
		<tr>
			<td width="100%" style="text-align:center; background:url('././assets/global/img/logo.jpg') no-repeat left;">
				<h4><b>LP3I SURABAYA</b></h4>
				Jl. Manyar 43 A Surabaya, Jawa timur , Indonesia
			</td>
		</tr>
	</table>
	<hr>
	<br>
	<table style="width:100%;">
		<tr>
			<td style="text-align:center;">
				<b><u>PENGUMUMAN PMB</u></b>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;">
				Periode penerimaan : 2016/2017
			</td>
		</tr>
	</table>

	<br>
	<table style="width:100%" border="1px" cellspacing="0" cellpadding="4px">
		<thead>
			<tr>
				<th width="5%" style="text-align:center;">NO.</th>
				<th width="20%" style="text-align:center;">NAMA</th>
				<th width="25%" style="text-align:center;">ALAMAT</th>
				<th width="15%" style="text-align:center;">No. HP</th>
				<th width="25%" style="text-align:center;">DITERIMA DI JURUSAN</th>
				<th width="10%" style="text-align:center;">TOTAL NILAI</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($pendaftar as $pendaftar): ?>
			<tr>
				<td style="text-align:center;"><?= $no++ ?></td>
				<td><?= $pendaftar->NAMA ?></td>
				<td><?= $pendaftar->ALAMAT_TETAP?></td>
				<td style="text-align:center;"><?= $pendaftar->NO_HANDPHONE ?></td>
				<td style="text-align:center;">
					<?php 
						$jurusan = $this->tbl_peserta->join_jurusan(array('peserta.NO_PENDAFTARAN' => $pendaftar->NO_PENDAFTARAN));
						echo count($jurusan)>0?$jurusan[0]->NAMA_JURUSAN:'';
					?>
				</td>
				<td style="text-align:center;"><?= $pendaftar->KEPUTUSAN?></td>
			</tr>	
			<?php endforeach ?>
		</tbody>
	</table>

	<br>
	<table style="width:100%;">
		<tr>
			<td style="width:70%;text-align:center;"></td>
			<td style="width:30%;text-align:center;">
				<p>Surabaya, <?= date("d M Y") ?></p>
				<p>Menyetujui,</p>
				<p>Ketua LP3I Surabaya</p>
				<br>
				<br>
				<br>
				<p><b><u>........................................</u></b></p>
				<p></p>
			</td>
		</tr>
	</table>
