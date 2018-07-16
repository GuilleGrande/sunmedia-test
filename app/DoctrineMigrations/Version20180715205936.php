<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180715205936 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE creative_component (creative_id INT NOT NULL, component_id INT NOT NULL, INDEX IDX_15BAD0EB8E0ED468 (creative_id), INDEX IDX_15BAD0EBE2ABAFFF (component_id), PRIMARY KEY(creative_id, component_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creative_component ADD CONSTRAINT FK_15BAD0EB8E0ED468 FOREIGN KEY (creative_id) REFERENCES creatives (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE creative_component ADD CONSTRAINT FK_15BAD0EBE2ABAFFF FOREIGN KEY (component_id) REFERENCES components (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE creative_component');
    }
}
