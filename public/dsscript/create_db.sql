drop database dart;

create database dart;
create user 'dart'@'localhost' identified by 'sienna';
grant all privileges on dart.* to 'dart'@'localhost' with grant option;
flush privileges;

