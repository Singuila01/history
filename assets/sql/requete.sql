-- Création de la table utilisateurs
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    mail VARCHAR(50),
    date_creation DATETIME
)

-- Création de la table histoire
CREATE TABLE histoires (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    libelle_histoire VARCHAR(50),
    description VARCHAR(500),
    id_type_histoire INT,
    date_ajout DATETIME,
    FOREIGN KEY id_type_histoire REFERENCES type_histoires(id_type)
)
-- Création de la table type histoire
CREATE TABLE type_histoires (
    id_type INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    libelle_type_histoire VARCHAR(50)
)