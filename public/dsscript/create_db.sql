drop database jf1;

create database jf1;
create user 'jf'@'localhost' identified by 'sienna';
grant all privileges on jf1.* to 'jf'@'localhost' with grant option;
flush privileges;

