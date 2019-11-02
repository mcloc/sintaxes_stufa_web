drop database if exists vger;
create database vger;
grant all PRIVILEGES on vger.* to 'vger'@'localhost' IDENTIFIED BY '12345678';
FLUSH PRIVILEGES;
