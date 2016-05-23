<?php

namespace App\Presenters;

use Nette;

/**
 * Base presenter for all application presenters.
 */
abstract class BaseSmartCmpPresenter extends Nette\Application\UI\Presenter
{
    use \initTrait;
//    use \dbCmpsParamsTrait;
//    use \staticCmpsParamsTrait;

    protected $editMode = false;
    public $ajaxOn = true; //aktivuje/deaktivuje nette.ajax.js
    public $cmpsCache;
    
    public function startup() {
	parent::startup();
	
	if(!file_exists('../temp/cache/cmps'))
	    mkdir('../temp/cache/cmps');
	$storage = new \Nette\Caching\Storages\FileStorage('../temp/cache/cmps');
	$this->cmpsCache = new \Nette\Caching\Cache($storage);
	
	\InitSmartCmps::init($this);
//	\InitSmartCmps::getAttrsOfCmpsFromDb($this); //create/update dbCmpParamsTrait
		
	if($this->user->isAllowed("sprava-obsahu"))
	    $this->editMode = true;
        
        $this->template->editmode=$this->editMode;
    }
    
    public function templatePrepareFilters($template)
    {
	\LatteMacros::install($template->getLatte()->getCompiler());
    }
    
    public function beforeRender() {
	parent::beforeRender();
	
	$this->template->ajaxOn = $this->ajaxOn;
    }
    
    protected function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
	
	$template->registerHelper('cmp', $this->createSmartCmp);
	$template->addFilter(NULL, '\App\MyFunctions\Filters::common');
	
        return $template;
    }
    public function createSmartCmp($name, array $params){
	$c=$this[$name];
	foreach($params as $param=>$val)
	    $c->$param=$val;
	
//	dump($name,$params,$c);
//	return "ahoj: $name, {$params['width']} x {$params['height']}";
	return $c;
    }
    
    /**
    * @param string $module
    * @return boolean
    */
    public function isModuleCurrent($module)
    {
        return ltrim($module, ':') === $this->getModuleName();
    }
    
    public function getModuleName(){
	if (!$a = strrpos($this->name, ':')) { // not in module
	    return false;
        }

        return substr($this->name, 0, $a);
    }
}
