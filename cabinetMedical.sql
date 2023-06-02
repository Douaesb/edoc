/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  30/05/2023 23:06:23                      */
/*==============================================================*/


drop table if exists chats;

drop table if exists docteur;

drop table if exists patient;

drop table if exists rendezvous;

drop table if exists secretaire;

drop table if exists suivre;

drop table if exists utilisateurs;

drop table if exists webuser;

/*==============================================================*/
/* Table : chats                                                */
/*==============================================================*/
create table chats
(
   chat_id              time not null,
   docid                int(10) not null,
   pid                  int(10) not null,
   idsec                int(10) not null,
   from_id              int(10),
   to_id                int(10),
   message              text,
   opened               int,
   created_at           datetime,
   primary key (chat_id)
);

/*==============================================================*/
/* Table : docteur                                              */
/*==============================================================*/
create table docteur
(
   docid              int(10) not null AUTO_INCREMENT,
   docemail               varchar(70),
   docname                 text(50),
   docprenom               text(50),
   docpassword             varchar(50),
   doctel                  int(10),
   diplome                 text(200),
   primary key (docid)
);
INSERT INTO `docteur` (`docid`,`docemail`, `docpassword`) VALUES
(1,'docteur@edoc.com', '123');

/*==============================================================*/
/* Table : patient                                              */
/*==============================================================*/
create table patient
(
   pid                  int(10) not null AUTO_INCREMENT,
   pemail               varchar(70),
   pname                text(50),
   pprenom              text(50),
   ppassword            varchar(50),
   pnic                 int(10),
   pdob                 date,
   ptel                 int(10),
   primary key (pid)
);
INSERT INTO `patient` (`pid`,`pemail`, `ppassword`) VALUES
(1,'patient@edoc.com', '123');

/*==============================================================*/
/* Table : rendezvous                                          */
/*==============================================================*/
create table rendezvous
(
   idrdv                int(10) not null AUTO_INCREMENT,
   pid                  int(10) not null ,
   idsec                int(10) not null ,
   docid                int(10) not null ,
   typerdv              text(50),
   daterdv              date,
   heurerdv             time(4),
   primary key (idrdv)
);

/*==============================================================*/
/* Table : secretaire                                           */
/*==============================================================*/
create table secretaire
(
   idsec                   int(10) not null AUTO_INCREMENT,
   emailsec                varchar(70),
   nomsec                  text(50),
   prenomsec               text(50),
   passwordsec             varchar(50),
   telsec                  int(10),
   primary key (idsec)
);
INSERT INTO `secretaire` (`idsec`,`emailsec`, `passwordsec`) VALUES
(1,'secretaire@edoc.com', '123');

/*==============================================================*/
/* Table : suivre                                               */
/*==============================================================*/
create table suivre
(
   pid                  int(10) not null ,
   docid              int(10) not null ,
   primary key (pid, docid)
);

/*==============================================================*/
/* Table : utilisateurs                                         */
/*==============================================================*/
create table utilisateurs
(
   user_id              int(10) not null,
   name                 text(50),
   username             text(50),
   password             text(50),
   last_seen            datetime,
   email_user           text(70),
   image                text(80),
   gender               text(50),
   date                 date,
   primary key (user_id)
);

/*==============================================================*/
/* Table : webuser                                              */
/*==============================================================*/
create table webuser
(
   email                varchar(50) not null,
   usertype             char(10),
   primary key (email)
);

alter table chats add constraint fk_envoyer foreign key (docid)
      references docteur (docid) on delete restrict on update restrict;

alter table chats add constraint fk_recevoir foreign key (pid)
      references patient (pid) on delete restrict on update restrict;

alter table chats add constraint fk_trasferer foreign key (idsec)
      references secretaire (idsec) on delete restrict on update restrict;

alter table rendezvous add constraint fk_gerer foreign key (idsec)
      references secretaire (idsec) on delete restrict on update restrict;

alter table rendezvous add constraint fk_prendre foreign key (pid)
      references patient (pid) on delete restrict on update restrict;

alter table rendezvous add constraint fk_voir foreign key (docid)
      references docteur (docid) on delete restrict on update restrict;     

alter table suivre add constraint fk_suivre foreign key (docid)
      references docteur (docid) on delete restrict on update restrict;

alter table suivre add constraint fk_suivre2 foreign key (pid)
      references patient (pid) on delete restrict on update restrict;


INSERT INTO `webuser` (`email`, `usertype`) VALUES
('secretaire@edoc.com', 'a'),
('doctor@edoc.com', 'd'),
('patient@edoc.com', 'p')
