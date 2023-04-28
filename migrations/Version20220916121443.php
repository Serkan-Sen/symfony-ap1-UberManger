<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220916121443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix NUMERIC(10, 5) NOT NULL, INDEX IDX_7D053A93B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, longitude NUMERIC(20, 20) DEFAULT NULL, latitude NUMERIC(20, 20) DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse_postale VARCHAR(255) NOT NULL, tel INT NOT NULL, img VARCHAR(255) NOT NULL,logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql("INSERT INTO restaurant (id, nom, adresse_postale, tel, img, logo) VALUES
        (1, 1.257322906, 45.810166193, 'KFC Limoges Sud', '1 Imp.de la Ribière, 87000 Limoges', 555095186, 'KFCimg.jpg', 'kuakata-logo.png'),
        (2, 1.257734089, 45.811215204, 'McDonald\'s Limoges Sud', '8 Rue de Nexon, 87000 Limoges', 555702932, 'mcdonald-s.png', 'mcdonalds.png'),
        (3, 1.257409645, 45.829922402, 'Subway Limoges Centre', '26 Pl. de la Motte, 87000 Limoges', 961059230, 'sub-sandwich.jpg', 'donut-hut-logo.png'),
        (4, 1.231066648, 45.820255801, 'Burger King Limoges Sud', '19 Rue Camille Guérin, 87000 Limoges', 544241899, 'burgerKing.jpeg', 'burger-king.png'),
        (5, 1.259033863, 45.831007679, 'Quick Centre ville', '1 Rue du Clocher, 87000 Limoges', 555320891, 'Quick.jpeg', 'S.jpg'),
        (6, NULL, NULL, 'Quu', '9 Rue de Nexon, 87000 Limoges', 5555555, 'crispy-sandwiches.png', 'food-world-logo.png')");

        $this->addSql("INSERT INTO user (id, username, roles, password, nom, prenom, email, adresse) VALUES
        (1, 'Momo', '[\"ROLE_ADMIN\"]', '\$2y\$13\$Aupi3.evDkVRDY8.RgJSHu8KMV1tPB5kq/U47MpTtjXqJ6iPCtO3q', 'Sen', 'Serkan', 'serkan2001.sen@gmail.com', ''),
        (3, 'Bastien', '[\"ROLE_ADMIN\"]', '\$2y\$13\$anEOr.dVfkX8iYQeZWnVJOAAR2ALztsLB9RgQP8LuZ52tX/WbpEcS', 'Dugard', 'Bastien', 'bastien.dugard@gmail.com', ''),
        (5, 'Yanis', '[]', '\$2y\$13\$oIWbjFoZoE3gd/H4812sOecHvoxTIvYFKJkasd4yL7YuK9GPtKfTy', 'Saidi', 'Yanis', 'yaya@gmail.com', ''),
        (6, 'YAYA', '[]', '\$2y\$13\$OvLwua1zmGuJKaPyw1QL9ulMZ5R6DTt9bChVpytqy0DFMYTeiYwzO', 'Sen', 'Yashar', 'yashar.sen@gmail.com', ''),
        (7, 'Yani', '[]', '\$2y\$13\$bkSzGHU0EAjFJd55JXlNDOvFi0MdHsPNunDTqDzQC785lpjWYRr26', 'Sen', 'Damien', 'ddos@gmail.com', ''),
        (8, 'LouisR6s', '[]', '\$2y\$13\$cAY7pmP0sZMfOZgjpOuw.eSLtxSgAGacvWNCGSwFwmBhJnDxgZH3y', 'Jouhannet', 'Louis', 'JD.Louis@gmail.com', ''),
        (9, 'DDD', '[]', '\$2y\$13\$DTal37BizOufKLb00l8LdedakDZvPwqIb/bAgO6/3Cn3/rG2/Duw6', 'NNN', 'CCC', 'ddo@gmail.com', ''),
        (10, 'LOLO', '[]', '\$2y\$13\$QGQhsq4zx0W5AB0RzQt5XOs9DtWyWa074XXS0hfXAuHLy5qJBWWP.', 'L', 'R', 'itoua@gmail.com', '3 rue des potiers'),
        (11, 'Dams', '[]', '\$2y\$13\$JSXv4VoA9ul.DJl0PtfqsunbrvNXELLkk5whbT/8cGPSiORiQWE.a', 'y', 'y', 'ddi@gmail.com', '3 rue des potier')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B1E7706E');
    }
}
