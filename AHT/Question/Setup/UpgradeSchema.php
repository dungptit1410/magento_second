<?php
namespace AHT\Question\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
 
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.9') < 0) {
            $setup->startSetup();
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('AHT_Question'),
                'product_id',
                [
                    'type' => Table::TYPE_INTEGER,
                    'nullable' => false,
                    'comment' => 'Product Id'
                ]
            );
            $setup->endSetup();
        }
    }
}
