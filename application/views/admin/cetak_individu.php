	<table width="100%" height="102px">
		<tr>
			<td width="100%" style="text-align:center; background:url('./././assets/global/img/logo.jpg') no-repeat left;">
				<h4><b>LP3I SURABAYA</b></h4>
				Jl. Manyar 43 A Surabaya, Jawa Timur, Indonesia
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
				Periode Penerimaan: <?php echo date('Y').'-'.(date('Y')+1); ?>
			</td>
		</tr>
	</table>

	<br>
	<p>
	Dengan hormat,<br>
	Bersama dengan surat ini, kami menyatakan Anda yang beridentitas di bawah ini : 
	</p>
	<table style="margin-left:50px;">
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><?php echo $pendaftar->NAMA ?></td>
		</tr>
		<tr>
			<td>Tempat, Tanggal lahir</td>
			<td>:</td>
			<td><?php echo $pendaftar->TEMPAT_LAHIR ?>, <?php echo date("d-m-Y",strtotime($pendaftar->TANGGAL_LAHIR)) ?></td>
		</tr>
		<tr>
			<td>Jenis kelamin</td>
			<td>:</td>
			<td><?php echo $pendaftar->JENIS_KELAMIN=='L'?'Laki - laki':'Perempuan' ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $pendaftar->ALAMAT_TETAP ?></td>
		</tr>
		<tr>
			<td>No. handphone</td>
			<td>:</td>
			<td><?php echo $pendaftar->NO_HANDPHONE ?></td>
		</tr>
	</table>
	<?php 
		$jurusan = $this->tbl_peserta->join_jurusan(array('peserta.NO_PENDAFTARAN' => $pendaftar->NO_PENDAFTARAN));
		$j = count($jurusan)>0?$jurusan[0]->NAMA_JURUSAN:'';
	?>
	<p>
		<?php if ($keputusan == 'DITERIMA'): ?>
			Dinyatakan <?php echo $keputusan; ?> sebagai mahasiswa pada LP3I pada jurusan <?php echo strtoupper($j); ?> dengan total nilai <?php echo $total_nilai; ?>. Berikut kami lampirkan hasil tes penerimaan anda yang telah dilakukan : 
			
		<?php else: ?>
			Dinyatakan TIDAK DITERIMA sebagai mahasiswa pada LP3I  dengan total nilai <?php echo $total_nilai; ?>. Berikut kami lampirkan hasil tes penerimaan anda yang telah dilakukan : 
		<?php endif ?>
	</p>
	<table style="width:100%" border="1px" cellspacing="0" cellpadding="4px">
		<tr>
			<th colspan="3" style="text-align:center;">AKADEMIK</th>
		</tr>
		<tr>
			<td width="5%" style="text-align:center;">NO.</td>
			<td width="80%" style="text-align:center;">BIDANG</td>
			<td width="15%" style="text-align:center;">NILAI</td>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($bidang_akademik as $akademik): ?>
		<tr>
			<td style="text-align:center;"><?php echo $no++ ?></td>
			<td><?php echo $akademik->NAMA_BIDANG_SOAL ?></td>
			<?php 
				$cond_t = array(
						'detil_tes_akademik.NO_PENDAFTARAN' => $pendaftar->NO_PENDAFTARAN,
						'jawaban_akademik.NILAI' => 1,
						'bidang_soal_akademik.ID_BIDANG_SOAL' => $akademik->ID_BIDANG_SOAL
					);
				$benar = count($this->tbl_detail_tes_akademik->join_all($cond_t));
				$nilai_benar = $benar * $bobot_nilai;
			?>
			<td style="text-align:center;"><?php echo round($nilai_benar, 0) ?></td>
		</tr>	
		<?php endforeach ?>
		<tr>
			<td colspan="2" style="text-align:right;">Total Nilai Akademik</td>
			<td style="text-align:center;"><b><?php echo $total_akademik ?></b></td>
		</tr>
	</table>
	<br>
	<table style="width:100%" border="1px" cellspacing="0" cellpadding="4px">
		<tr>
			<th colspan="3" style="text-align:center;">WAWANCARA</th>
		</tr>
		<tr>
			<td width="5%" style="text-align:center;">NO.</td>
			<td width="80%" style="text-align:center;">BIDANG</td>
			<td width="15%" style="text-align:center;">NILAI</td>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($kriteria as $kriteria): ?>
		<tr>
			<td style="text-align:center;"><?php echo $no++ ?></td>
			<td><?php echo $kriteria->NAMA_KRITERIA ?></td>
			<td style="text-align:center;"><?php echo $kriteria->SKOR ?></td>
		</tr>
		<?php endforeach ?>
		<tr>
			<td colspan="2" style="text-align:right;">Total Nilai Wawancara</td>
			<td style="text-align:center;"><b><?php echo $total_wawancara; ?></b></td>
		</tr>	
	</table>
	<br>
	<?php if ($keputusan == 'DITERIMA'): ?>
	<p style="text-align:justify">
		Keterangan lebih lanjut untuk detail Administrasi dan jadwal telah kami lampirkan bersama surat ini.
		Dengan ini kami bangga menyambut anda sebagai keluarga LP3I Surabaya yang baru.
		Demikian pemberitahuan dan ucapan selamat kami, atas perhatiannya kami ucapkan terimah kasih.
	</p>
	<?php else: ?>
	<p style="text-align:justify">
		Berdasarkan lampiran surat ini, dengan ini kami menyatakan bahwa anda belum memenuhi syarat untuk
		bergabung sebagai keluarga LP3I Surabaya.
		Demikian pemberitahuan kami sampaikan, atas perhatiannya kami ucapkan mohon maaf dan terimah kasih.
	</p>
	<?php endif ?>
	
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
