<?php

require_once dirname(__DIR__) . '/default.class.php';

class sampleModuleMgrMainManagerController extends sampleModuleMgrDefaultController
{
    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'samplemodule';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:collection',
        'samplemodule:item',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/panel.default.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/panel.collections.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/window.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/panel.items.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.property.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/default.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-default',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.load(' . $configJs . '); });</script>');
    }
}