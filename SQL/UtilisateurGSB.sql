CREATE USER 'GSBroot'@'10.129.180.116' IDENTIFIED BY 'TheMDP';
GRANT ALL PRIVILEGES ON gsbrlm_db.* TO 'GSBroot'@'10.129.180.116';

/*Etrangement, le MySql 5.5 sur ma machine Linux a besoin de la création des utilisateurs et des grant associés sur l'ip ET le localhost*/

CREATE USER 'GSBroot'@'localhost' IDENTIFIED BY 'TheMDP';
GRANT ALL PRIVILEGES ON gsbrlm_db.* TO 'GSBroot'@'localhost'