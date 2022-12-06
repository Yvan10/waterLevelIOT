<<<<<<< HEAD
CREATE DATABASE test;
GRANT ALL PRIVILEGES ON DATABASE test to dev
=======
SET search_path TO public;

create table "user"
(
    id       serial
        constraint user_pk
            primary key,
    email    varchar(255) not null,
    username varchar(255) not null,
    password varchar(255) not null
);

alter table "user"
    owner to dev;

create unique index user_id_uindex
    on "user" (id);

create table "waterLevel"
(
    id   serial
        constraint waterlevel_pk
            primary key,
    data varchar(255) not null
);

alter table "waterLevel"
    owner to dev;

create unique index waterlevel_id_uindex
    on "waterLevel" (id);

>>>>>>> 790c9eb27630fb1f0211f4a4fdd86d7d7d158aa2
