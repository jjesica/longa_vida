create database longaa_vida;

use longaa_vida;

CREATE TABLE bd (
       Plano_codigo    INT PRIMARY KEY AUTO_INCREMENT,
       nome           VARCHAR(40),
       endereço       VARCHAR(40),
       cidade         VARCHAR(40),
       estado         VARCHAR(40),
       cep            INT       
);
       