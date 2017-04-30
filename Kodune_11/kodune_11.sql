CREATE TABLE test.10153154_loomaaed (
    id integer PRIMARY KEY auto_increment,
    nimi varchar, 
    vanus integer,
    liik varchar, 
    puur integer
);

INSERT INTO test.10153154_loomaaed (nimi, vanus, liik, puur) VALUES 
    ('Veiko', 3, 'hamster', 1), 
    ('Taavi', 2, 'hiir', 1), 
    ('Martin', 20, 'rott', 1), 
    ('Valeri', 6, 'vares', 2), 
    ('Vitali', 1, 'ronk', 2), 
    ('Monika', 9, 'karu', 3), 
    ('Viivika', 7, 'hunt', 4), 
    ('Malle', 5, 'rebane', 4);
    
SELECT nimi,
	puur 
FROM test.10153154_loomaaed 
WHERE puur=1;

SELECT max(vanus) AS max_vanus,
	min(vanus) AS min_vanus
FROM test.10153154_loomaaed; 

SELECT puur,
	count(*) AS loomi_puuris
FROM test.10153154_loomaaed
GROUP BY puur; 

UPDATE test.10153154_loomaaed 
SET vanus=vanus+1;