CREATE TABLE HOTEL
(
	Codice INTEGER PRIMARY KEY,
    Nome VARCHAR(255),
    Città VARCHAR(255),
    Telefono VARCHAR(11),
    Stelle INTEGER,
    Valutazione_Media FLOAT
)Engine='InnoDB';

CREATE TABLE CLIENTE
(
	ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255),
    Cognome VARCHAR(255),
    Username VARCHAR(255),
    Pass VARCHAR(255),
    Email VARCHAR(255),
    Data_N DATE,
    Telefono VARCHAR(11)
)Engine='InnoDB';

CREATE TABLE STANZA
(
	ID_Stanza INTEGER PRIMARY KEY,
	Codice_Stanza INTEGER,
    Codice_Hotel INTEGER,
    Piano INTEGER,
    Tipo VARCHAR(255),
    Posti_Letto INTEGER,
    
    INDEX idx_CH(Codice_Hotel),
    
    FOREIGN KEY(Codice_Hotel) REFERENCES HOTEL(Codice),
    UNIQUE(Codice_Stanza,Codice_Hotel)
)Engine='InnoDB';

CREATE TABLE CARTA
(
	Codice INTEGER PRIMARY KEY,
    Tipologia VARCHAR(255)
)Engine='InnoDB';

CREATE TABLE COPIA_CARTA
(
	ID_Carta INTEGER AUTO_INCREMENT PRIMARY KEY,
	Codice_Copia INTEGER,
    Codice_HS INTEGER,
    Codice_Carta INTEGER,
    
    INDEX idx_CHS(Codice_HS),
    INDEX idx_CC(Codice_Carta),
    
    FOREIGN KEY(Codice_HS) REFERENCES STANZA(ID_Stanza),
    FOREIGN KEY(Codice_Carta) REFERENCES CARTA(Codice),
    UNIQUE(Codice_Copia,Codice_HS,Codice_Carta)
)Engine='InnoDB';

CREATE TABLE PRENOTAZIONE
(
	Codice_Prenotazione INTEGER PRIMARY KEY,
	Persona INTEGER,
    Codice_HS INTEGER,
    Data_Check_In DATE,
    Data_Check_Out DATE,
    Tipo VARCHAR(255),
    
    INDEX idx_P(Persona),
    INDEX idx_CHS(Codice_HS),
    
    FOREIGN KEY(Persona) REFERENCES CLIENTE(ID),
    FOREIGN KEY(Codice_HS) REFERENCES STANZA(ID_Stanza),
    
    UNIQUE(Persona,Codice_HS,Data_Check_In)
)Engine='InnoDB';

CREATE TABLE VALUTA
(
	Persona INTEGER,
    Codice_Hotel INTEGER,
    Voto FLOAT,
    
    INDEX idx_P(Persona),
    INDEX idx_CH(Codice_Hotel),
    
    FOREIGN KEY(Persona) REFERENCES CLIENTE(ID),
    FOREIGN KEY(Codice_Hotel) REFERENCES HOTEL(Codice),
    
    PRIMARY KEY(Persona,Codice_Hotel)
)Engine='InnoDB';

CREATE TABLE ASSEGNA
(
	Codice_K INTEGER AUTO_INCREMENT PRIMARY KEY,
	Codice_Prenotazione INTEGER,
    Codice_Carta INTEGER,
    
    INDEX idx_CP(Codice_Prenotazione),
    INDEX idx_CC(Codice_Carta),
    
    FOREIGN KEY(Codice_Prenotazione) REFERENCES PRENOTAZIONE(Codice_Prenotazione),
    FOREIGN KEY(Codice_Carta) REFERENCES COPIA_CARTA(ID_Carta),
    
		UNIQUE(Codice_Prenotazione,Codice_Carta)
)Engine='InnoDB';

CREATE TABLE PREFERITI
(
	ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    Id_Utente INTEGER,
    Nome_Hotel VARCHAR(255),
    
	INDEX idx_P(Id_Utente),
    
    FOREIGN KEY(Id_Utente) REFERENCES CLIENTE(ID)
)Engine='InnoDB';

CREATE TABLE ACCETTAZIONE
(
	ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    Id_Utente INTEGER,
    Nome_Hotel VARCHAR(255),
    Tipo_Stanza VARCHAR(255),
    Data_In DATE,    
	INDEX idx_P(Id_Utente),
    
    FOREIGN KEY(Id_Utente) REFERENCES CLIENTE(ID)
)Engine='InnoDB';



-- TRIGGER DELLA TABBELLA HOTEL(Valutazione_Media) --
DELIMITER //
CREATE TRIGGER VAL_M_H
AFTER INSERT ON VALUTA
FOR EACH ROW
BEGIN
		UPDATE HOTEL
        SET Valutazione_Media = (Valutazione_Media + NEW.Voto)/(SELECT COUNT(Persona)FROM VALUTA WHERE Codice_Hotel=NEW.Codice_Hotel)
        WHERE Codice=NEW.Codice_Hotel;

END//
DELIMITER //;


-- TRIGGER DELLA TABBELA ASSEGNA --
DELIMITER //
CREATE TRIGGER ASSEGNA_CARTA
AFTER INSERT ON PRENOTAZIONE
FOR EACH ROW
BEGIN
		IF NOT EXISTS(SELECT * FROM ASSEGNA WHERE Codice_Prenotazione = NEW.Codice_Prenotazione ) THEN
         INSERT INTO ASSEGNA VALUES(0,NEW.Codice_Prenotazione,0);
		END IF;
END //
DELIMITER ;

-- Business Rule (Un Cliente non può avere una sola prenotazione corrente per una certa data) --
DELIMITER //
CREATE TRIGGER Controllo_Prenotazione
BEFORE INSERT ON PRENOTAZIONE
FOR EACH ROW
BEGIN
		IF EXISTS (SELECT * FROM Prenotazione WHERE Persona = NEW.Persona AND Data_Check_In = NEW.Data_Check_In)
        THEN
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Il Clienete possiede già una prenotazione corrente per quella data';
         END IF;   
END //
DELIMITER ;