<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleCollectionUpdateProcessor extends sampleModuleUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';
}

return 'sampleCollectionUpdateProcessor';
