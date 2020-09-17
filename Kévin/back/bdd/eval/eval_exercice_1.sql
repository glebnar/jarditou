DROP DATABASE if EXISTS eval;
CREATE DATABASE eval;
USE eval;

create TABLE CLIENT(
cli_num INT NOT NULL,
cli_nom VARCHAR(50) NOT NULL,
cli_adresse VARCHAR(50),
cli_tel VARCHAR(30),
CONSTRAINT client_PK PRIMARY KEY (cli_num)
);

CREATE INDEX index_client ON CLIENT (cli_nom);


CREATE TABLE produit(
pro_num INT NOT NULL,
pro_libelle VARCHAR(50) NOT NULL,
pro_description VARCHAR(50) NOT NULL,
CONSTRAINT produit_PK PRIMARY KEY (pro_num) 
);

CREATE TABLE commande (
com_num INT NOT NULL,
cli_num INT NOT NULL,
com_date DATETIME NOT null,
com_obs VARCHAR(50),
CONSTRAINT commande_PK PRIMARY KEY (com_num),
CONSTRAINT commande_client_FK FOREIGN KEY (cli_num) REFERENCES client(cli_num)
);

CREATE TABLE est_compose(
com_num INT NOT NULL,
pro_num INT NOT NULL,
est_qte INT NOT NULL,
CONSTRAINT est_compose_PK PRIMARY KEY (com_num,pro_num),
CONSTRAINT est_compose_commande_FK FOREIGN KEY (com_num) REFERENCES commande(com_num),
CONSTRAINT est_compose_produit_FK FOREIGN KEY (pro_num) REFERENCES produit(pro_num)
);

