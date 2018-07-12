<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180712135745 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE creative ADD advertiser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE creative ADD CONSTRAINT FK_5B3CF5E4BA2FCBC2 FOREIGN KEY (advertiser_id) REFERENCES advertisers (id)');
        $this->addSql('CREATE INDEX IDX_5B3CF5E4BA2FCBC2 ON creative (advertiser_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE creative DROP FOREIGN KEY FK_5B3CF5E4BA2FCBC2');
        $this->addSql('DROP INDEX IDX_5B3CF5E4BA2FCBC2 ON creative');
        $this->addSql('ALTER TABLE creative DROP advertiser_id');
    }
}
