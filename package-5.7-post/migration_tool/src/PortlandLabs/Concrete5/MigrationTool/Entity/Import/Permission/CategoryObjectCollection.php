<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import\Permission;

use Doctrine\Common\Collections\ArrayCollection;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\ObjectCollection;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\AttributeKeyCategoryFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\BlockTypeFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\ConversationEditorFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\PageTemplateFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\PermissionKeyCategoryFormatter;

/**
 * @Entity
 */
class CategoryObjectCollection extends ObjectCollection
{

    /**
     * @OneToMany(targetEntity="Category", mappedBy="collection", cascade={"persist", "remove"})
     **/
    public $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getFormatter()
    {
        return new PermissionKeyCategoryFormatter($this);
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getType()
    {
        return 'permission_key_category';
    }

    public function hasRecords()
    {
        return count($this->getCategories());
    }

    public function getRecords()
    {
        return $this->getCategories();
    }

    public function getTreeFormatter()
    {
        return false;
    }

    public function getRecordValidator()
    {
        return false;
    }





}