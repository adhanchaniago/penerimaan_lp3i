/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/6/2016 9:39:58 PM                          */
/*==============================================================*/


drop table if exists AKUN_ADMIN;

drop table if exists ANGGOTA_KELUARGA;

drop table if exists BIDANG_SOAL_AKADEMIK;

drop table if exists BUKTI_PEMBAYARAN;

drop table if exists DETIL_TES_AKADEMIK;

drop table if exists DETIL_TES_MINAT_BAKAT;

drop table if exists JADWAL_TES;

drop table if exists JAWABAN_AKADEMIK;

drop table if exists JAWABAN_MINAT_BAKAT;

drop table if exists JURUSAN;

drop table if exists PENDAFTAR;

drop table if exists PESERTA;

drop table if exists PEWAWANCARA;

drop table if exists PILIHAN_JURUSAN;

drop table if exists RIWAYAT_KERJA;

drop table if exists RIWAYAT_PENDIDIKAN;

drop table if exists SOAL_AKADEMIK;

drop table if exists SOAL_MINAT_BAKAT;

drop table if exists TES_AKADEMIK;

drop table if exists TES_MINAT_BAKAT;

drop table if exists TES_WAWANCARA;

/*==============================================================*/
/* Table: AKUN_ADMIN                                            */
/*==============================================================*/
create table AKUN_ADMIN
(
   ID_ADMIN             varchar(5) not null,
   NAMA_ADMIN           varchar(50),
   PASS_ADMIN           varchar(50),
   ROLE_ADMIN           int,
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: ANGGOTA_KELUARGA                                      */
/*==============================================================*/
create table ANGGOTA_KELUARGA
(
   ID                   int not null,
   NO_PENDAFTARAN       varchar(10),
   NAMA                 varchar(50),
   HUBUNGAN_KELUARGA    varchar(50),
   USIA                 int,
   PEKERJAAN            varchar(50),
   primary key (ID)
);

/*==============================================================*/
/* Table: BIDANG_SOAL_AKADEMIK                                  */
/*==============================================================*/
create table BIDANG_SOAL_AKADEMIK
(
   ID_BIDANG_SOAL       int not null,
   NAMA_BIDANG_SOAL     varchar(20),
   BOBOT_BIDANG_SOAL    decimal(9,2),
   primary key (ID_BIDANG_SOAL)
);

/*==============================================================*/
/* Table: BUKTI_PEMBAYARAN                                      */
/*==============================================================*/
create table BUKTI_PEMBAYARAN
(
   ID_BUKTI             int not null,
   NO_PENDAFTARAN       varchar(10),
   TANGGAL_UPLOAD       date,
   KETERANGAN           varchar(150),
   primary key (ID_BUKTI)
);

/*==============================================================*/
/* Table: DETIL_TES_AKADEMIK                                    */
/*==============================================================*/
create table DETIL_TES_AKADEMIK
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID                   int not null,
   ID_SOAL              int not null,
   ID_JAWABAN           int not null,
   primary key (NO_PENDAFTARAN, ID, ID_SOAL, ID_JAWABAN)
);

/*==============================================================*/
/* Table: DETIL_TES_MINAT_BAKAT                                 */
/*==============================================================*/
create table DETIL_TES_MINAT_BAKAT
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID                   int not null,
   ID_SOAL              int not null,
   ID_JAWABAN           int not null,
   primary key (NO_PENDAFTARAN, ID, ID_SOAL, ID_JAWABAN)
);

/*==============================================================*/
/* Table: JADWAL_TES                                            */
/*==============================================================*/
create table JADWAL_TES
(
   ID                   int not null,
   TAHAP                varchar(15),
   TANGGAL              date,
   TEMPAT               varchar(30),
   RUANG                varchar(15),
   primary key (ID)
);

/*==============================================================*/
/* Table: JAWABAN_AKADEMIK                                      */
/*==============================================================*/
create table JAWABAN_AKADEMIK
(
   ID_JAWABAN           int not null,
   ID_SOAL              int,
   JAWABAN              varchar(255),
   NILAI                int,
   primary key (ID_JAWABAN)
);

/*==============================================================*/
/* Table: JAWABAN_MINAT_BAKAT                                   */
/*==============================================================*/
create table JAWABAN_MINAT_BAKAT
(
   ID_JAWABAN           int not null,
   ID_SOAL              int,
   JAWABAN              varchar(255),
   KARAKTER             varchar(30),
   primary key (ID_JAWABAN)
);

/*==============================================================*/
/* Table: JURUSAN                                               */
/*==============================================================*/
create table JURUSAN
(
   ID_JURUSAN           varchar(10) not null,
   NAMA_JURUSAN         varchar(50),
   SARAN_KARAKTER       varchar(100),
   KETERANGAN           varchar(50),
   primary key (ID_JURUSAN)
);

/*==============================================================*/
/* Table: PENDAFTAR                                             */
/*==============================================================*/
create table PENDAFTAR
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID_ADMIN             varchar(5),
   NAMA                 varchar(50),
   TEMPAT_LAHIR         varchar(50),
   TANGGAL_LAHIR        date,
   AGAMA                varchar(30),
   STATUS_PERNIKAHAN    bool,
   PEKERJAAN            varchar(50),
   KEWARGANEGARAAN      varchar(50),
   NO_IDENTITAS         varchar(30),
   ALAMAT_TETAP         varchar(255),
   ALAMAT_SEKARANG      varchar(255),
   ALAMAT_KANTOR        varchar(255),
   NO_HANDPHONE         varchar(15),
   NO_TELEPON           varchar(15),
   EMAIL                varchar(50),
   EVALUASI_DIRI        text,
   PASSWORD             varchar(50),
   VALID                bool,
   TANGGAL_DAFTAR       date,
   primary key (NO_PENDAFTARAN)
);

/*==============================================================*/
/* Table: PESERTA                                               */
/*==============================================================*/
create table PESERTA
(
   ID                   int not null,
   NO_PENDAFTARAN       varchar(10) not null,
   TOTAL_NILAI          int,
   KETERANGAN           varchar(20),
   KEPUTUSAN            int,
   CATATAN              varchar(50),
   primary key (NO_PENDAFTARAN, ID)
);

/*==============================================================*/
/* Table: PEWAWANCARA                                           */
/*==============================================================*/
create table PEWAWANCARA
(
   ID_PEWAWANCARA       varchar(10) not null,
   NAMA                 varchar(50),
   PASSWORD             varchar(50),
   KETERANGAN           varchar(255),
   primary key (ID_PEWAWANCARA)
);

/*==============================================================*/
/* Table: PILIHAN_JURUSAN                                       */
/*==============================================================*/
create table PILIHAN_JURUSAN
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID_JURUSAN           varchar(10) not null,
   primary key (NO_PENDAFTARAN, ID_JURUSAN)
);

/*==============================================================*/
/* Table: RIWAYAT_KERJA                                         */
/*==============================================================*/
create table RIWAYAT_KERJA
(
   ID                   int not null,
   NO_PENDAFTARAN       varchar(10),
   NAMA_PERUSAHAAN      varchar(50),
   TANGGAL_MULAI        date,
   TANGGAL_SELESAI      date,
   JABATAN_AKHIR        varchar(50),
   GAJI_PERBULAN        varchar(50),
   primary key (ID)
);

/*==============================================================*/
/* Table: RIWAYAT_PENDIDIKAN                                    */
/*==============================================================*/
create table RIWAYAT_PENDIDIKAN
(
   ID                   int not null,
   NO_PENDAFTARAN       varchar(10),
   JENIS                varchar(10),
   NAMA_LEMBAGA         varchar(50),
   ALAMAT_LEMBAGA       varchar(255),
   TANGGAL_MULAI        date,
   TANGGAL_SELESAI      date,
   SERTIFIKAT           char(30),
   primary key (ID)
);

/*==============================================================*/
/* Table: SOAL_AKADEMIK                                         */
/*==============================================================*/
create table SOAL_AKADEMIK
(
   ID_SOAL              int not null,
   ID_BIDANG_SOAL       int,
   TEKS_SOAL            text,
   primary key (ID_SOAL)
);

/*==============================================================*/
/* Table: SOAL_MINAT_BAKAT                                      */
/*==============================================================*/
create table SOAL_MINAT_BAKAT
(
   ID_SOAL              int not null,
   TEKS_SOAL            text,
   primary key (ID_SOAL)
);

/*==============================================================*/
/* Table: TES_AKADEMIK                                          */
/*==============================================================*/
create table TES_AKADEMIK
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID                   int not null,
   TANGGAL_TES          date,
   TOTAL_NILAI          int,
   KETERANGAN           varchar(20),
   primary key (NO_PENDAFTARAN, ID)
);

/*==============================================================*/
/* Table: TES_MINAT_BAKAT                                       */
/*==============================================================*/
create table TES_MINAT_BAKAT
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID                   int not null,
   TANGGAL_TES          date,
   KARAKTER_DOMINAN     varchar(30),
   KARAKTER_SEKUNDER    varchar(30),
   KETERANGAN           varchar(255),
   primary key (NO_PENDAFTARAN, ID)
);

/*==============================================================*/
/* Table: TES_WAWANCARA                                         */
/*==============================================================*/
create table TES_WAWANCARA
(
   NO_PENDAFTARAN       varchar(10) not null,
   ID                   int not null,
   ID_PEWAWANCARA       varchar(10),
   TANGGAL_TES          date,
   SKOR_KOMUNIKASI      int,
   SKOR_INTELEKTUAL     int,
   SKOR_MOTIVASI        int,
   SKOR_KEDEWASAAN      int,
   SKOR_KERJASAMA       int,
   SKOR_PERCAYA_DIRI    int,
   SKOR_PEMAHAMAN_LP3I  int,
   SKOR_BAHASA_INGGRIS  int,
   KETERANGAN           varchar(255),
   primary key (NO_PENDAFTARAN, ID)
);

alter table ANGGOTA_KELUARGA add constraint FK_ANGGOTA_KELUARGA_PENDAFTAR foreign key (NO_PENDAFTARAN)
      references PENDAFTAR (NO_PENDAFTARAN) on delete restrict on update restrict;

alter table BUKTI_PEMBAYARAN add constraint FK_PEMBAYARAN foreign key (NO_PENDAFTARAN)
      references PENDAFTAR (NO_PENDAFTARAN) on delete restrict on update restrict;

alter table DETIL_TES_AKADEMIK add constraint FK_DETIL_TES_SOAL foreign key (ID_SOAL)
      references SOAL_AKADEMIK (ID_SOAL) on delete restrict on update restrict;

alter table DETIL_TES_AKADEMIK add constraint FK_DETIL_TES_TPA foreign key (NO_PENDAFTARAN, ID)
      references TES_AKADEMIK (NO_PENDAFTARAN, ID) on delete restrict on update restrict;

alter table DETIL_TES_AKADEMIK add constraint FK_NILAI_JAWABAN_AKADEMIK foreign key (ID_JAWABAN)
      references JAWABAN_AKADEMIK (ID_JAWABAN) on delete restrict on update restrict;

alter table DETIL_TES_MINAT_BAKAT add constraint FK_DETIL_TES_MINAT_BAKAT foreign key (NO_PENDAFTARAN, ID)
      references TES_MINAT_BAKAT (NO_PENDAFTARAN, ID) on delete restrict on update restrict;

alter table DETIL_TES_MINAT_BAKAT add constraint FK_DETIL_TES_SOAL_MINAT_BAKAT foreign key (ID_SOAL)
      references SOAL_MINAT_BAKAT (ID_SOAL) on delete restrict on update restrict;

alter table DETIL_TES_MINAT_BAKAT add constraint FK_NILAI_SOAL_JAWABAN foreign key (ID_JAWABAN)
      references JAWABAN_MINAT_BAKAT (ID_JAWABAN) on delete restrict on update restrict;

alter table JAWABAN_AKADEMIK add constraint FK_JAWABAN_SOAL foreign key (ID_SOAL)
      references SOAL_AKADEMIK (ID_SOAL) on delete restrict on update restrict;

alter table JAWABAN_MINAT_BAKAT add constraint FK_JAWABAN_SOAL_MINAT foreign key (ID_SOAL)
      references SOAL_MINAT_BAKAT (ID_SOAL) on delete restrict on update restrict;

alter table PENDAFTAR add constraint FK_VALIDASI foreign key (ID_ADMIN)
      references AKUN_ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table PESERTA add constraint FK_JADWAL_TES_PESERTA foreign key (ID)
      references JADWAL_TES (ID) on delete restrict on update restrict;

alter table PESERTA add constraint FK_PESERTA_PENDAFTAR foreign key (NO_PENDAFTARAN)
      references PENDAFTAR (NO_PENDAFTARAN) on delete restrict on update restrict;

alter table PILIHAN_JURUSAN add constraint FK_JURUSAN_PILIHAN foreign key (ID_JURUSAN)
      references JURUSAN (ID_JURUSAN) on delete restrict on update restrict;

alter table PILIHAN_JURUSAN add constraint FK_PILIHAN_JURUSAN_PENDAFTAR foreign key (NO_PENDAFTARAN)
      references PENDAFTAR (NO_PENDAFTARAN) on delete restrict on update restrict;

alter table RIWAYAT_KERJA add constraint FK_RIWAYAT_KERJA_PENDAFTAR foreign key (NO_PENDAFTARAN)
      references PENDAFTAR (NO_PENDAFTARAN) on delete restrict on update restrict;

alter table RIWAYAT_PENDIDIKAN add constraint FK_RIWAYAT_PENDIDIKAN_PENDAFTAR foreign key (NO_PENDAFTARAN)
      references PENDAFTAR (NO_PENDAFTARAN) on delete restrict on update restrict;

alter table SOAL_AKADEMIK add constraint FK_BIDANG_SOAL foreign key (ID_BIDANG_SOAL)
      references BIDANG_SOAL_AKADEMIK (ID_BIDANG_SOAL) on delete restrict on update restrict;

alter table TES_AKADEMIK add constraint FK_TPA_PESERTA foreign key (NO_PENDAFTARAN, ID)
      references PESERTA (NO_PENDAFTARAN, ID) on delete restrict on update restrict;

alter table TES_MINAT_BAKAT add constraint FK_MINAT_BAKAT_PESERTA foreign key (NO_PENDAFTARAN, ID)
      references PESERTA (NO_PENDAFTARAN, ID) on delete restrict on update restrict;

alter table TES_WAWANCARA add constraint FK_PEWAWANCARA foreign key (ID_PEWAWANCARA)
      references PEWAWANCARA (ID_PEWAWANCARA) on delete restrict on update restrict;

alter table TES_WAWANCARA add constraint FK_WAWANCARA_PESERTA foreign key (NO_PENDAFTARAN, ID)
      references PESERTA (NO_PENDAFTARAN, ID) on delete restrict on update restrict;

-- insert data
insert into AKUN_ADMIN(ID_ADMIN, NAMA_ADMIN, PASS_ADMIN, ROLE_ADMIN) values('ADM01', 'admin_online', md5('123'), 1);
insert into AKUN_ADMIN(ID_ADMIN, NAMA_ADMIN, PASS_ADMIN, ROLE_ADMIN) values('ADM02', 'admin', md5('123'), 1);