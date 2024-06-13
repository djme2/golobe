<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240613144917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, booking_id INT DEFAULT NULL, name_activity VARCHAR(255) NOT NULL, price_activity INT NOT NULL, INDEX IDX_AC74095A3301C60 (booking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, date_booking DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, booking_id INT DEFAULT NULL, name_destination VARCHAR(255) NOT NULL, price_destination INT NOT NULL, INDEX IDX_3EC63EAA3301C60 (booking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, booking_id INT DEFAULT NULL, address_hotel VARCHAR(255) NOT NULL, price_hotel INT NOT NULL, name_hotel VARCHAR(255) NOT NULL, INDEX IDX_3535ED93301C60 (booking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role_user_id INT DEFAULT NULL, name_role VARCHAR(255) NOT NULL, INDEX IDX_57698A6A1BA3766E (role_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, role_user_id INT DEFAULT NULL, booking_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, INDEX IDX_1483A5E91BA3766E (role_user_id), INDEX IDX_1483A5E93301C60 (booking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A3301C60 FOREIGN KEY (booking_id) REFERENCES booking (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA3301C60 FOREIGN KEY (booking_id) REFERENCES booking (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED93301C60 FOREIGN KEY (booking_id) REFERENCES booking (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A1BA3766E FOREIGN KEY (role_user_id) REFERENCES role_user (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E91BA3766E FOREIGN KEY (role_user_id) REFERENCES role_user (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E93301C60 FOREIGN KEY (booking_id) REFERENCES booking (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A3301C60');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA3301C60');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED93301C60');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A1BA3766E');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E91BA3766E');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E93301C60');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
