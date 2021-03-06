<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database', 'email', 'session', 'encrypt','upload','tanggal');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url', 'file', 'html', 'form', 'directory', 'array');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
	'M_Jurusan' 			=> 'm_jurusan', 
	'M_Security' 			=> 'security_check', 
	'M_Akun_Admin' 			=> 'user_admin',
	'M_Pendaftar' 			=> 'tbl_pendaftar',
	'M_Pilihan_Jurusan'		=> 'tbl_pilihan',
	'M_Pewawancara'			=> 'tbl_pewawancara',
	'M_Bidang_Soal'			=> 'tbl_bidang_soal_akademik',
	'M_Soal_Akademik'		=> 'tbl_soal_akademik',
	'M_Jawaban_Akademik'	=> 'tbl_jawaban_akademik',
	'M_Soal_Minat_Bakat'	=> 'tbl_soal_minat_bakat',
	'M_Jawaban_Minat_Bakat'	=> 'tbl_jawaban_minat_bakat',
	'M_Gambar_Akademik'		=> 'tbl_gambar_akademik',
	'M_Kriteria_Wawancara'	=> 'tbl_kriteria_wawancara',
	'M_Riwayat_Pendidikan'	=> 'tbl_riwayat_pendidikan',
	'M_Riwayat_Pekerjaan'	=> 'tbl_riwayat_pekerjaan',
	'M_Anggota_Keluarga'	=> 'tbl_anggota_keluarga',
	'M_Jadwal_Tes'			=> 'tbl_jadwal_tes',
	'M_Peserta'				=> 'tbl_peserta',
	'M_Tes_Wawancara'		=> 'tbl_tes_wawancara',
	'M_Tes_Akademik'		=> 'tbl_tes_akademik',
	'M_Tes_Minat_Bakat'		=> 'tbl_tes_minat_bakat',
	'M_Detail_Tes_Wawancara'=> 'tbl_detail_tes_wawancara',
	'M_Detail_Tes_Akademik' => 'tbl_detail_tes_akademik',
	'M_Detail_Tes_Minat_Bakat' => 'tbl_detail_tes_minat_bakat',
	'M_Bukti' 				=> 'tbl_bukti',
	'M_Sms' 				=> 'tbl_sms'

);
