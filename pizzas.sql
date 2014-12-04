/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     28-11-2014 21:03:26                          */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists ENCOMENDA;

drop table if exists INGREDIENTE;

drop table if exists PIZZA;

drop table if exists PIZZA_HAS_INGREDIENTE;

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   ID_CLIENTE           int not null,
   NOME                 varchar(45) not null,
   MORADA               varchar(45) not null,
   TELEFONE             numeric(9,0) not null,
   EMAIL                varchar(45) not null,
   USERNAME             varchar(45) not null,
   PASSWORD             varchar(45) not null,
   primary key (ID_CLIENTE)
);

/*==============================================================*/
/* Table: ENCOMENDA                                             */
/*==============================================================*/
create table ENCOMENDA
(
   ID_ENC               int not null,
   CLI_ID_CLIENTE       int not null,
   ID_CLIENTE           int not null,
   DATA                 datetime not null,
   ESTADO               int not null,
   PRECO                int not null,
   primary key (ID_ENC)
);

/*==============================================================*/
/* Table: INGREDIENTE                                           */
/*==============================================================*/
create table INGREDIENTE
(
   ID_INGREDIENTE       int not null,
   QUANTIDADE           int not null,
   PRECO                int not null,
   primary key (ID_INGREDIENTE)
);

/*==============================================================*/
/* Table: PIZZA                                                 */
/*==============================================================*/
create table PIZZA
(
   ID_PIZZA             int not null,
   ID_ENC               int not null,
   ESTADO               int not null,
   TAMANHO              varchar(45) not null,
   MASSA                varchar(45) not null,
   TOMATE               bool not null,
   QUEIJO               bool not null,
   DATA                 datetime not null,
   PRECO                int not null,
   primary key (ID_PIZZA)
);

/*==============================================================*/
/* Table: PIZZA_HAS_INGREDIENTE                                 */
/*==============================================================*/
create table PIZZA_HAS_INGREDIENTE
(
   ID_INGREDIENTE       int not null,
   ID_PIZZA             int not null,
   primary key (ID_INGREDIENTE, ID_PIZZA)
);

alter table ENCOMENDA add constraint FK_FAZ foreign key (CLI_ID_CLIENTE)
      references CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table PIZZA add constraint FK_TEM foreign key (ID_ENC)
      references ENCOMENDA (ID_ENC) on delete restrict on update restrict;

alter table PIZZA_HAS_INGREDIENTE add constraint FK_ESTA_NUMA foreign key (ID_INGREDIENTE)
      references INGREDIENTE (ID_INGREDIENTE) on delete restrict on update restrict;

alter table PIZZA_HAS_INGREDIENTE add constraint FK_LEVA_UM foreign key (ID_PIZZA)
      references PIZZA (ID_PIZZA) on delete restrict on update restrict;

