-- Création de la base de données
CREATE DATABASE IF NOT EXISTS agence;

-- Sélection de la base de données
USE agence;

-- Création de la table "advert"
CREATE TABLE IF NOT EXISTS advert (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    type VARCHAR(50),
    rent_price DECIMAL(10, 2),
    sell_price DECIMAL(10, 2),
    img VARCHAR(255) -- Ajout de l'entité "img"
);

-- Création de la table "contact"
CREATE TABLE IF NOT EXISTS contact (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT
);

-- alimentation de la table "advert"--

-- Insertion d'exemples dans la table "advert"
INSERT INTO advert (title, description, type, rent_price, sell_price, img)
VALUES 
('Maison moderne', 'Belle maison moderne avec jardin spacieux.', 'Maison', 1200.00, 250000.00, 'img/maison1.jpg'),
('Appartement lumineux', 'Appartement lumineux avec vue sur la ville.', 'Appartement', 800.00, 150000.00, 'img/appartement1.jpg'),
('Studio cosy', 'Studio confortable au cœur de la ville.', 'Studio', 600.00, 100000.00, 'img/studio1.jpg'),
('Villa de luxe', 'Villa de luxe avec piscine privée.', 'Villa', 2500.00, 500000.00, 'img/villa1.jpg'),
('Appartement moderne', 'Appartement moderne avec balcon.', 'Appartement', 900.00, 180000.00, 'img/appartement2.jpg'),

('Maison de campagne', 'Charmante maison de campagne avec jardin.', 'Maison', 1000.00, 200000.00, 'img/maison2.jpg'),
('Appartement design', 'Appartement design avec intérieur élégant.', 'Appartement', 950.00, 190000.00, 'img/appartement3.jpg'),
('Loft spacieux', 'Loft spacieux avec vue panoramique.', 'Loft', 1100.00, 220000.00, 'img/loft1.jpg'),
('Duplex moderne', 'Duplex moderne avec deux étages.', 'Duplex', 1200.00, 240000.00, 'img/duplex1.jpg'),
('Maison de plage', 'Maison de plage avec accès direct à la mer.', 'Maison', 1800.00, 350000.00, 'img/plage1.jpg'),
('Appartement avec terrasse', 'Appartement avec grande terrasse ensoleillée.', 'Appartement', 1000.00, 200000.00, 'img/appartement4.jpg'),
('Chalet en montagne', 'Chalet confortable niché en montagne.', 'Chalet', 1500.00, 300000.00, 'img/chalet1.jpg'),
('Penthouse de luxe', 'Penthouse de luxe avec vue panoramique.', 'Penthouse', 2000.00, 400000.00, 'img/penthouse1.jpg'),
('Appartement familial', 'Spacieux appartement familial.', 'Appartement', 1100.00, 220000.00, 'img/appartement5.jpg'),
('Maison traditionnelle', 'Maison traditionnelle avec charme rustique.', 'Maison', 1300.00, 260000.00, 'img/maison3.jpg'),
('Appartement avec jardin', 'Appartement avec jardin privé.', 'Appartement', 950.00, 190000.00, 'img/appartement6.jpg'),
('Manoir historique', 'Manoir historique avec architecture préservée.', 'Manoir', 3000.00, 600000.00, 'img/manoir1.jpg'),
('Appartement avec vue mer', 'Appartement avec vue imprenable sur la mer.', 'Appartement', 1200.00, 240000.00, 'img/mer1.jpg');

