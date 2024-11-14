/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     14/11/2024 10:27:31                          */
/*==============================================================*/


drop table if exists ADMIN;

drop table if exists MAHASISWA;

drop table if exists POIN;

drop table if exists PRESTASI;

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   ID_ADMIN             varchar(10) not null,
   USERNAME             varchar(50),
   PASSWORD_ADMIN       varchar(30),
   NAMA_ADMIN           varchar(50),
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: MAHASISWA                                             */
/*==============================================================*/
create table MAHASISWA
(
   NIM                  varchar(12) not null,
   ID_ADMIN             varchar(10),
   NAMA                 varchar(100),
   PRODI                varchar(30),
   EMAIL                varchar(30),
   NO_TELP              varchar(15),
   PASSWORD             varchar(30),
   primary key (NIM)
);

/*==============================================================*/
/* Table: POIN                                                  */
/*==============================================================*/
create table POIN
(
   ID_TINGKAT           varchar(10) not null,
   TINGKATAN            varchar(100),
   POIN                 int,
   primary key (ID_TINGKAT)
);

/*==============================================================*/
/* Table: PRESTASI                                              */
/*==============================================================*/
create table PRESTASI
(
   ID_PRESTASI          varchar(20) not null,
   NIM                  varchar(12),
   ID_ADMIN             varchar(10),
   ID_TINGKAT           varchar(10),
   JENIS_PRESTASI       varchar(100),
   NAMA_LOMBA           varchar(150),
   PERINGKAT            varchar(100),
   PENYELENGGARA        varchar(100),
   BUKTI_PRESTASI       varchar(200),
   STATUS               varchar(100),
   primary key (ID_PRESTASI)
);

alter table MAHASISWA add constraint FK_MEMASUKKAN foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete cascade on update cascade;

alter table PRESTASI add constraint FK_DIMILIKI foreign key (ID_TINGKAT)
      references POIN (ID_TINGKAT) on delete cascade on update cascade;

alter table PRESTASI add constraint FK_MEMVALIDASI foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete cascade on update cascade;

alter table PRESTASI add constraint FK_MENGINPUTKAN foreign key (NIM)
      references MAHASISWA (NIM) on delete cascade on update cascade;

