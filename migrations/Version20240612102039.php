<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240612102039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE BonLivraison DROP FOREIGN KEY BonLivraison_ibfk_1');
        $this->addSql('ALTER TABLE achete DROP FOREIGN KEY achete_ibfk_1');
        $this->addSql('ALTER TABLE achete DROP FOREIGN KEY achete_ibfk_2');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY livre_ibfk_1');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY livre_ibfk_2');
        $this->addSql('ALTER TABLE souscategorie DROP FOREIGN KEY FK_Categorie_Souscategorie');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_Fournisseur_Produit');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_Souscategorie_Produit');
        $this->addSql('ALTER TABLE Commande DROP FOREIGN KEY Commande_ibfk_1');
        $this->addSql('ALTER TABLE Commercial DROP FOREIGN KEY Commercial_ibfk_1');
        $this->addSql('DROP TABLE BonLivraison');
        $this->addSql('DROP TABLE achete');
        $this->addSql('DROP TABLE Fournisseur');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE souscategorie');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE Commande');
        $this->addSql('DROP TABLE Commercial');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE Client');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE BonLivraison (Id_BonLivraison INT AUTO_INCREMENT NOT NULL, Date_livraison DATE NOT NULL, Statut VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Suivi_commande VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Id_Commande INT NOT NULL, INDEX Id_Commande (Id_Commande), INDEX idx_id_bonlivraison (Id_BonLivraison), PRIMARY KEY(Id_BonLivraison)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE achete (Id_Produit INT NOT NULL, Id_Commande INT NOT NULL, quantite INT NOT NULL, INDEX idx_fk_id_produit_achete (Id_Produit), INDEX idx_fk_id_commande_achete (Id_Commande), PRIMARY KEY(Id_Produit, Id_Commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Fournisseur (Id_Fournisseur INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Contact VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, telephone VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX idx_id_fournisseur (Id_Fournisseur), PRIMARY KEY(Id_Fournisseur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre (Id_Produit INT NOT NULL, Id_BonLivraison INT NOT NULL, quantite INT NOT NULL, INDEX idx_fk_id_produit_livre (Id_Produit), INDEX idx_fk_id_bonlivraison_livre (Id_BonLivraison), PRIMARY KEY(Id_Produit, Id_BonLivraison)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE souscategorie (Id_Souscategorie INT AUTO_INCREMENT NOT NULL, Libelle_court VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Photo BLOB DEFAULT NULL, Id_Categorie INT NOT NULL, INDEX idx_id_souscategorie (Id_Souscategorie), INDEX FK_Categorie_Souscategorie (Id_Categorie), PRIMARY KEY(Id_Souscategorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (Id_Produit INT AUTO_INCREMENT NOT NULL, Libelle_court VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Libelle_long TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Prix_achat_HT NUMERIC(15, 2) NOT NULL, Photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, stock NUMERIC(15, 2) DEFAULT NULL, Actif VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Id_Souscategorie INT NOT NULL, Id_Fournisseur INT NOT NULL, INDEX idx_fk_id_fournisseur (Id_Fournisseur), INDEX idx_id_produit (Id_Produit), INDEX idx_fk_id_souscategorie (Id_Souscategorie), PRIMARY KEY(Id_Produit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Commande (Id_Commande INT AUTO_INCREMENT NOT NULL, Statut VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Mode_paiement VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Reduction_pro NUMERIC(15, 2) DEFAULT NULL, Total_HT NUMERIC(15, 2) NOT NULL, Total_TTC NUMERIC(15, 2) NOT NULL, Date_heure_commande DATETIME NOT NULL, Mode_differe VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, Date_facturation DATE NOT NULL, Id_Client INT NOT NULL, INDEX idx_fk_id_client_cmd (Id_Client), INDEX idx_id_commande (Id_Commande), PRIMARY KEY(Id_Commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Commercial (Id_Commercial INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, telephone VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Id_Client INT DEFAULT NULL, INDEX idx_fk_id_client (Id_Client), INDEX idx_id_commercial (Id_Commercial), PRIMARY KEY(Id_Commercial)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie (Id_Categorie INT AUTO_INCREMENT NOT NULL, Libelle_court VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX idx_id_categorie (Id_Categorie), PRIMARY KEY(Id_Categorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Client (Id_Client INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, telephone VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Adresse_livraison VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Adresse_facturation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Coefficient NUMERIC(15, 2) NOT NULL, Reduction NUMERIC(15, 2) DEFAULT NULL, Reference VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX idx_id_client (Id_Client), PRIMARY KEY(Id_Client)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE BonLivraison ADD CONSTRAINT BonLivraison_ibfk_1 FOREIGN KEY (Id_Commande) REFERENCES Commande (Id_Commande)');
        $this->addSql('ALTER TABLE achete ADD CONSTRAINT achete_ibfk_1 FOREIGN KEY (Id_Produit) REFERENCES produit (Id_Produit)');
        $this->addSql('ALTER TABLE achete ADD CONSTRAINT achete_ibfk_2 FOREIGN KEY (Id_Commande) REFERENCES Commande (Id_Commande)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT livre_ibfk_1 FOREIGN KEY (Id_Produit) REFERENCES produit (Id_Produit)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT livre_ibfk_2 FOREIGN KEY (Id_BonLivraison) REFERENCES BonLivraison (Id_BonLivraison)');
        $this->addSql('ALTER TABLE souscategorie ADD CONSTRAINT FK_Categorie_Souscategorie FOREIGN KEY (Id_Categorie) REFERENCES categorie (Id_Categorie)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_Fournisseur_Produit FOREIGN KEY (Id_Fournisseur) REFERENCES Fournisseur (Id_Fournisseur)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_Souscategorie_Produit FOREIGN KEY (Id_Souscategorie) REFERENCES souscategorie (Id_Souscategorie)');
        $this->addSql('ALTER TABLE Commande ADD CONSTRAINT Commande_ibfk_1 FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)');
        $this->addSql('ALTER TABLE Commercial ADD CONSTRAINT Commercial_ibfk_1 FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)');
    }
}