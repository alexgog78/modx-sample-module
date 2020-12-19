<?php

require_once dirname(__DIR__) . '/helpers/setboolean.trait.php';

abstract class sampleModuleCreateProcessor extends modObjectCreateProcessor
{
    use sampleModuleProcessorHelperSetBoolean;

    /** @var string */
    public $objectType = 'samplemodule';

    /** @var array */
    public $languageTopics = [
        'samplemodule:status',
    ];

    /** @var bool */
    protected $softValidate = true;

    /**
     * @return mixed
     */
    public function beforeSet()
    {
        $this->setBoolean();
        return parent::beforeSet();
    }

    /**
     * @return bool
     */
    public function beforeSave()
    {
        if ($this->softValidate) {
            $this->softValidate();
        }
        return parent::beforeSave();
    }

    private function softValidate()
    {
        if (!$this->object->validate()) {
            /** @var modValidator $validator */
            $validator = $this->object->getValidator();
            if ($validator->hasMessages()) {
                foreach ($validator->getMessages() as $message) {
                    $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
                }
            }
        }
    }
}
