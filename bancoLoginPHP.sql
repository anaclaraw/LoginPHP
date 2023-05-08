create database bd_login;
use bd_login;

create table if not exists bd_login.tb_usuario(
usuario_id integer auto_increment not null,
usuario_senha varchar(64) not null,
usuario_email varchar(128) not null,
usuario_data datetime not null,
usuario_nome varchar(128) not null,
primary key (usuario_id));

insert into tb_usuario(`usuario_senha`,`usuario_email`,`usuario_data`,`usuario_nome`) values ('ana','ana','2000-03-02','anaaaa clara');

select * from tb_usuario;

SELECT usuario_id,usuario_email,usuario_senha FROM `bd_login`.`tb_usuario` WHERE usuario_email = '$email' AND usuario_senha ='$senha' ;

drop database bd_login;
INSERT INTO bd_login.tb_usuario(usuario_nome,usuario_email,usuario_senha,usuario_data) VALUES ('$nome','$email','$senha',NOW() )