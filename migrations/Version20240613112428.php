<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240613112428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role_user (id INT AUTO_INCREMENT NOT NULL, id_role INT NOT NULL, id_users INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, t VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE roleuser DROP FOREIGN KEY roleuser_ibfk_1');
        $this->addSql('ALTER TABLE roleuser DROP FOREIGN KEY roleuser_ibfk_2');
        $this->addSql('DROP TABLE roleuser');
        $this->addSql('ALTER TABLE activity ADD id INT AUTO_INCREMENT NOT NULL, ADD name_activity VARCHAR(255) NOT NULL, DROP nameActivity, DROP priceActivity, CHANGE idActivity price_activity INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY booking_ibfk_1');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY booking_ibfk_4');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY booking_ibfk_2');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY booking_ibfk_3');
        $this->addSql('DROP INDEX idHotel ON booking');
        $this->addSql('DROP INDEX idDestination ON booking');
        $this->addSql('DROP INDEX idActivity ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDE347E6F4 ON booking');
        $this->addSql('ALTER TABLE booking ADD id INT AUTO_INCREMENT NOT NULL, ADD date_booking DATE NOT NULL, ADD id_users INT NOT NULL, ADD id_activity INT NOT NULL, ADD id_hotel INT NOT NULL, ADD id_destination INT NOT NULL, DROP idUsers, DROP idActivity, DROP idHotel, DROP idDestination, DROP dateBooking, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE destination ADD id INT AUTO_INCREMENT NOT NULL, ADD name_destination VARCHAR(255) NOT NULL, DROP nameDestination, DROP prixDestination, CHANGE idDestination price_destination INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE hotel ADD id INT AUTO_INCREMENT NOT NULL, ADD adress_hotel VARCHAR(255) NOT NULL, ADD name_hotel VARCHAR(255) NOT NULL, DROP adressHotel, DROP priceHotel, DROP nameHotel, CHANGE idHotel price_hotel INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE role ADD id INT AUTO_INCREMENT NOT NULL, ADD name_role VARCHAR(255) NOT NULL, DROP nameRole, CHANGE idRole id_role INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE users ADD id INT AUTO_INCREMENT NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP firstName, DROP lastName, DROP mail, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(255) NOT NULL, CHANGE idUsers id_users INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE roleuser (idRole INT NOT NULL, idUsers INT NOT NULL, INDEX idUsers (idUsers), INDEX IDX_749A4BC12494D4F4 (idRole), PRIMARY KEY(idRole, idUsers)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE roleuser ADD CONSTRAINT roleuser_ibfk_1 FOREIGN KEY (idRole) REFERENCES role (idRole)');
        $this->addSql('ALTER TABLE roleuser ADD CONSTRAINT roleuser_ibfk_2 FOREIGN KEY (idUsers) REFERENCES users (idUsers)');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE activity MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON activity');
        $this->addSql('ALTER TABLE activity ADD nameActivity VARCHAR(50) DEFAULT NULL, ADD priceActivity NUMERIC(15, 2) DEFAULT NULL, DROP id, DROP name_activity, CHANGE price_activity idActivity INT NOT NULL');
        $this->addSql('ALTER TABLE activity ADD PRIMARY KEY (idActivity)');
        $this->addSql('ALTER TABLE booking MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON booking');
        $this->addSql('ALTER TABLE booking ADD idUsers INT NOT NULL, ADD idActivity INT NOT NULL, ADD idHotel INT NOT NULL, ADD idDestination INT NOT NULL, ADD dateBooking DATE DEFAULT NULL, DROP id, DROP date_booking, DROP id_users, DROP id_activity, DROP id_hotel, DROP id_destination');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT booking_ibfk_1 FOREIGN KEY (idUsers) REFERENCES users (idUsers)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT booking_ibfk_4 FOREIGN KEY (idDestination) REFERENCES destination (idDestination)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT booking_ibfk_2 FOREIGN KEY (idActivity) REFERENCES activity (idActivity)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT booking_ibfk_3 FOREIGN KEY (idHotel) REFERENCES hotel (idHotel)');
        $this->addSql('CREATE INDEX idHotel ON booking (idHotel)');
        $this->addSql('CREATE INDEX idDestination ON booking (idDestination)');
        $this->addSql('CREATE INDEX idActivity ON booking (idActivity)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE347E6F4 ON booking (idUsers)');
        $this->addSql('ALTER TABLE booking ADD PRIMARY KEY (idUsers, idActivity, idHotel, idDestination)');
        $this->addSql('ALTER TABLE destination MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON destination');
        $this->addSql('ALTER TABLE destination ADD nameDestination VARCHAR(50) DEFAULT NULL, ADD prixDestination NUMERIC(15, 2) DEFAULT NULL, DROP id, DROP name_destination, CHANGE price_destination idDestination INT NOT NULL');
        $this->addSql('ALTER TABLE destination ADD PRIMARY KEY (idDestination)');
        $this->addSql('ALTER TABLE hotel MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON hotel');
        $this->addSql('ALTER TABLE hotel ADD adressHotel VARCHAR(50) DEFAULT NULL, ADD priceHotel NUMERIC(15, 2) DEFAULT NULL, ADD nameHotel VARCHAR(50) DEFAULT NULL, DROP id, DROP adress_hotel, DROP name_hotel, CHANGE price_hotel idHotel INT NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD PRIMARY KEY (idHotel)');
        $this->addSql('ALTER TABLE role MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON role');
        $this->addSql('ALTER TABLE role ADD nameRole VARCHAR(50) DEFAULT NULL, DROP id, DROP name_role, CHANGE id_role idRole INT NOT NULL');
        $this->addSql('ALTER TABLE role ADD PRIMARY KEY (idRole)');
        $this->addSql('ALTER TABLE users MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON users');
        $this->addSql('ALTER TABLE users ADD firstName VARCHAR(50) DEFAULT NULL, ADD lastName VARCHAR(50) DEFAULT NULL, ADD mail VARCHAR(50) DEFAULT NULL, DROP id, DROP first_name, DROP last_name, DROP email, DROP password, CHANGE adress adress VARCHAR(50) DEFAULT NULL, CHANGE phone phone VARCHAR(50) DEFAULT NULL, CHANGE id_users idUsers INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD PRIMARY KEY (idUsers)');
    }
}
