<?php

namespace PortlandLabs\Concrete5\MigrationTool\Inspector\Block;

use Concrete\Core\Backup\ContentImporter\ValueInspector\ValueInspector;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\BlockValue;
use PortlandLabs\Concrete5\MigrationTool\Inspector\InspectorInterface;

defined('C5_EXECUTE') or die("Access Denied.");

class StandardInspector implements InspectorInterface
{

    protected $value;

    public function __construct(BlockValue $value)
    {
        $this->value = $value;
    }

    public function getMatchedItems()
    {
        $inspector = \Core::make('import/value_inspector');
        $content = $this->value->getRecords();
        $items = array();
        foreach($content as $record) {
            $data = $record->getData();
            foreach($data as $value) {
                $result = $inspector->inspect($value);
                $items = array_merge($items, $result->getMatchedItems());
            }
        }
        return $items;
    }
}