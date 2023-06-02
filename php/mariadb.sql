#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        Mail           Varchar (250) NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        date_naissance Date NOT NULL ,
        mdp            Varchar (250) NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (Mail)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: style
#------------------------------------------------------------

CREATE TABLE style(
        style Varchar (50) NOT NULL
	,CONSTRAINT style_PK PRIMARY KEY (style)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Artiste
#------------------------------------------------------------

CREATE TABLE Artiste(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (50) NOT NULL
	,CONSTRAINT Artiste_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: album
#------------------------------------------------------------

CREATE TABLE album(
        Titre Varchar (50) NOT NULL ,
        Date  Date NOT NULL ,
        image Varchar (50) NOT NULL ,
        style Varchar (50) NOT NULL ,
        id    Int NOT NULL
	,CONSTRAINT album_PK PRIMARY KEY (Titre)

	,CONSTRAINT album_style_FK FOREIGN KEY (style) REFERENCES style(style)
	,CONSTRAINT album_Artiste0_FK FOREIGN KEY (id) REFERENCES Artiste(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type
#------------------------------------------------------------

CREATE TABLE type(
        type Varchar (50) NOT NULL
	,CONSTRAINT type_PK PRIMARY KEY (type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: morceau
#------------------------------------------------------------

CREATE TABLE morceau(
        id           Int  Auto_increment  NOT NULL ,
        titre        Varchar (50) NOT NULL ,
        duree        Int NOT NULL ,
        lien_musique Varchar (50) NOT NULL ,
        Titre_album  Varchar (50) NOT NULL ,
        id_Artiste   Int NOT NULL ,
        type         Varchar (50) NOT NULL
	,CONSTRAINT morceau_PK PRIMARY KEY (id)

	,CONSTRAINT morceau_album_FK FOREIGN KEY (Titre_album) REFERENCES album(Titre)
	,CONSTRAINT morceau_Artiste0_FK FOREIGN KEY (id_Artiste) REFERENCES Artiste(id)
	,CONSTRAINT morceau_type1_FK FOREIGN KEY (type) REFERENCES type(type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: liste
#------------------------------------------------------------

CREATE TABLE liste(
        titre Varchar (50) NOT NULL ,
        date  Date NOT NULL ,
        Mail  Varchar (250) NOT NULL
	,CONSTRAINT liste_PK PRIMARY KEY (titre)

	,CONSTRAINT liste_utilisateur_FK FOREIGN KEY (Mail) REFERENCES utilisateur(Mail)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fait parti
#------------------------------------------------------------

CREATE TABLE fait_parti(
        id         Int NOT NULL ,
        titre      Varchar (50) NOT NULL ,
        date_ajout Date NOT NULL
	,CONSTRAINT fait_parti_PK PRIMARY KEY (id,titre)

	,CONSTRAINT fait_parti_morceau_FK FOREIGN KEY (id) REFERENCES morceau(id)
	,CONSTRAINT fait_parti_liste0_FK FOREIGN KEY (titre) REFERENCES liste(titre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ecoute_le
#------------------------------------------------------------

CREATE TABLE ecoute_le(
        id          Int NOT NULL ,
        Mail        Varchar (250) NOT NULL ,
        date_ecoute Date NOT NULL
	,CONSTRAINT ecoute_le_PK PRIMARY KEY (id,Mail)

	,CONSTRAINT ecoute_le_morceau_FK FOREIGN KEY (id) REFERENCES morceau(id)
	,CONSTRAINT ecoute_le_utilisateur0_FK FOREIGN KEY (Mail) REFERENCES utilisateur(Mail)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: favori
#------------------------------------------------------------

CREATE TABLE favori(
        id   Int NOT NULL ,
        Mail Varchar (250) NOT NULL
	,CONSTRAINT favori_PK PRIMARY KEY (id,Mail)

	,CONSTRAINT favori_morceau_FK FOREIGN KEY (id) REFERENCES morceau(id)
	,CONSTRAINT favori_utilisateur0_FK FOREIGN KEY (Mail) REFERENCES utilisateur(Mail)
)ENGINE=InnoDB;

