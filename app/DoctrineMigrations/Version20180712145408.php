<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180712145408 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE components (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, height DOUBLE PRECISION NOT NULL, width DOUBLE PRECISION NOT NULL, coor_x DOUBLE PRECISION NOT NULL, coor_y DOUBLE PRECISION NOT NULL, coor_z DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creatives (id INT AUTO_INCREMENT NOT NULL, advertiser_id INT NOT NULL, name VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_BC32D59FBA2FCBC2 (advertiser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, size DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE texts (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(140) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, size DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creatives ADD CONSTRAINT FK_BC32D59FBA2FCBC2 FOREIGN KEY (advertiser_id) REFERENCES advertisers (id)');
        $this->addSql('DROP TABLE component');
        $this->addSql('DROP TABLE creative');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE text');
        $this->addSql('DROP TABLE video');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE component (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, height DOUBLE PRECISION NOT NULL, width DOUBLE PRECISION NOT NULL, coor_x DOUBLE PRECISION NOT NULL, coor_y DOUBLE PRECISION NOT NULL, coor_z DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creative (id INT AUTO_INCREMENT NOT NULL, advertiser_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, status TINYINT(1) NOT NULL, INDEX IDX_5B3CF5E4BA2FCBC2 (advertiser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, format VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, size DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(140) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, format VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, size DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creative ADD CONSTRAINT FK_5B3CF5E4BA2FCBC2 FOREIGN KEY (advertiser_id) REFERENCES advertisers (id)');
        $this->addSql('DROP TABLE components');
        $this->addSql('DROP TABLE creatives');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE texts');
        $this->addSql('DROP TABLE videos');
    }
}
