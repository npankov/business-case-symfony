<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413113050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, line1 VARCHAR(50) NOT NULL, line2 VARCHAR(50) DEFAULT NULL, line3 VARCHAR(50) DEFAULT NULL, postal_code VARCHAR(15) DEFAULT NULL, town VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advantage (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_product (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, client_id INT NOT NULL, body VARCHAR(500) NOT NULL, number_stars INT NOT NULL, INDEX IDX_F84994AB4584665A (product_id), INDEX IDX_F84994AB19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE characteristic (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(500) NOT NULL, INDEX IDX_522FA9504584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, telephone VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_address (client_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_5F732BFC19EB6921 (client_id), INDEX IDX_5F732BFCF5B7AF75 (address_id), PRIMARY KEY(client_id, address_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, types_delivery_id INT NOT NULL, status_commandes_id INT DEFAULT NULL, types_payment_id INT NOT NULL, factures_id INT NOT NULL, livraisons_id INT NOT NULL, clients_id INT NOT NULL, date_realization DATE NOT NULL, INDEX IDX_F5299398E22993D4 (types_delivery_id), INDEX IDX_F5299398414BDA19 (status_commandes_id), INDEX IDX_F529939831AA122B (types_payment_id), INDEX IDX_F5299398E9D518F9 (factures_id), INDEX IDX_F5299398ACFB3D99 (livraisons_id), INDEX IDX_F5299398AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, brands_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, price_ht NUMERIC(5, 2) NOT NULL, in_stock TINYINT(1) NOT NULL, is_actif TINYINT(1) NOT NULL, INDEX IDX_D34A04ADE9EEC0C7 (brands_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_advantage (product_id INT NOT NULL, advantage_id INT NOT NULL, INDEX IDX_472E972C4584665A (product_id), INDEX IDX_472E972C3864498A (advantage_id), PRIMARY KEY(product_id, advantage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_image (product_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_64617F034584665A (product_id), INDEX IDX_64617F033DA5256D (image_id), PRIMARY KEY(product_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (product_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_CDFC73564584665A (product_id), INDEX IDX_CDFC735612469DE2 (category_id), PRIMARY KEY(product_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_order (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, myorder_id INT NOT NULL, quantity SMALLINT NOT NULL, INDEX IDX_5475E8C44584665A (product_id), INDEX IDX_5475E8C4732E2069 (myorder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_delivery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_payment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis_product ADD CONSTRAINT FK_F84994AB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE avis_product ADD CONSTRAINT FK_F84994AB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE characteristic ADD CONSTRAINT FK_522FA9504584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_address ADD CONSTRAINT FK_5F732BFC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_address ADD CONSTRAINT FK_5F732BFCF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E22993D4 FOREIGN KEY (types_delivery_id) REFERENCES type_delivery (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398414BDA19 FOREIGN KEY (status_commandes_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939831AA122B FOREIGN KEY (types_payment_id) REFERENCES type_payment (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E9D518F9 FOREIGN KEY (factures_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398ACFB3D99 FOREIGN KEY (livraisons_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398AB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE9EEC0C7 FOREIGN KEY (brands_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product_advantage ADD CONSTRAINT FK_472E972C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_advantage ADD CONSTRAINT FK_472E972C3864498A FOREIGN KEY (advantage_id) REFERENCES advantage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F034584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F033DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC73564584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC735612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C44584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C4732E2069 FOREIGN KEY (myorder_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_address DROP FOREIGN KEY FK_5F732BFCF5B7AF75');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398E9D518F9');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398ACFB3D99');
        $this->addSql('ALTER TABLE product_advantage DROP FOREIGN KEY FK_472E972C3864498A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE9EEC0C7');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC735612469DE2');
        $this->addSql('ALTER TABLE avis_product DROP FOREIGN KEY FK_F84994AB19EB6921');
        $this->addSql('ALTER TABLE client_address DROP FOREIGN KEY FK_5F732BFC19EB6921');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398AB014612');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F033DA5256D');
        $this->addSql('ALTER TABLE product_order DROP FOREIGN KEY FK_5475E8C4732E2069');
        $this->addSql('ALTER TABLE avis_product DROP FOREIGN KEY FK_F84994AB4584665A');
        $this->addSql('ALTER TABLE characteristic DROP FOREIGN KEY FK_522FA9504584665A');
        $this->addSql('ALTER TABLE product_advantage DROP FOREIGN KEY FK_472E972C4584665A');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F034584665A');
        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC73564584665A');
        $this->addSql('ALTER TABLE product_order DROP FOREIGN KEY FK_5475E8C44584665A');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398414BDA19');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398E22993D4');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939831AA122B');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BF396750');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE advantage');
        $this->addSql('DROP TABLE avis_product');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE characteristic');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_address');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_advantage');
        $this->addSql('DROP TABLE product_image');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE product_order');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE type_delivery');
        $this->addSql('DROP TABLE type_payment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
