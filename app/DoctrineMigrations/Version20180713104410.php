<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180713104410 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images ADD component_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AE2ABAFFF FOREIGN KEY (component_id) REFERENCES components (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AE2ABAFFF ON images (component_id)');
        $this->addSql('ALTER TABLE texts ADD component_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE texts ADD CONSTRAINT FK_1E3513BFE2ABAFFF FOREIGN KEY (component_id) REFERENCES components (id)');
        $this->addSql('CREATE INDEX IDX_1E3513BFE2ABAFFF ON texts (component_id)');
        $this->addSql('ALTER TABLE videos ADD component_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videos ADD CONSTRAINT FK_29AA6432E2ABAFFF FOREIGN KEY (component_id) REFERENCES components (id)');
        $this->addSql('CREATE INDEX IDX_29AA6432E2ABAFFF ON videos (component_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AE2ABAFFF');
        $this->addSql('DROP INDEX IDX_E01FBE6AE2ABAFFF ON images');
        $this->addSql('ALTER TABLE images DROP component_id');
        $this->addSql('ALTER TABLE texts DROP FOREIGN KEY FK_1E3513BFE2ABAFFF');
        $this->addSql('DROP INDEX IDX_1E3513BFE2ABAFFF ON texts');
        $this->addSql('ALTER TABLE texts DROP component_id');
        $this->addSql('ALTER TABLE videos DROP FOREIGN KEY FK_29AA6432E2ABAFFF');
        $this->addSql('DROP INDEX IDX_29AA6432E2ABAFFF ON videos');
        $this->addSql('ALTER TABLE videos DROP component_id');
    }
}
