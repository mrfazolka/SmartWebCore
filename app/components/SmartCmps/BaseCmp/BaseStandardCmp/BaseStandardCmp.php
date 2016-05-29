<?php
namespace App\Components\BaseStandardCmp;

/*
 * Třída slouží k tomu, abychom nemuseli u každé komponenty, která využívá továrničku implementující BaseCmpFactory implementovat metodu construct, která pouze předává svojí továrničku komponentě
 * - když je v názvu komponenty na konci napsáno_Id..., kde "..." je id z db, se kterým komponenta pracuje, je toto id použito pro načtení do property $id komponenty
 */
abstract class BaseStandardCmp extends \App\Components\BaseCmp\BaseCmp implements IBaseStandardCmp
{    
    /** @var string $uniqueId*/
    /** @var int */
    public $id;
    public $templateSet; //sada templatů pro komponentu (název sady např. oranzovySet, obsahuje templaty oranzovySetDefault, oranzovySetEdit, oranzovySetQuickAdmin, ... - pro všechny mody komponenty je zde template, když není , je načten template shodující se s názvem $mode
    const idSig = "_Id";
    public $cmpFullDbName; //název, pod kterým je komponenta v databázy
    
    /* @var Model\Komponenty **/
    private $modelKomponenty;
    /* @var Model\Stranky **/
    private $modelStranky;
    /* @var array **/
    public $dbParams;
    public $staticParams;
    
    const urlParamToDetectPage = "smartSlug"; //název parametru v url podle nastavení v routeru
    
    public function attached($presenter) {
	parent::attached($presenter);
	
	if(($idPos = strpos($this->cmpFullName, self::idSig)) !== false){ //když je id komponentě předáno přes její název pomocí _Id...
	    $id = \Nette\Utils\Strings::substring($this->cmpFullName, $idPos+strlen(self::idSig)); //vytáhni id z názvu
	    if(!isset($this->id)){ //ochrana aby když vypisuju již existující objekt komponenty, tak se mi k id nepřiřadilo null - render se voláznova a když znova nepředám parametr, přepíše se id s jakým byla komponenta vytvořena
		$this->id = $id;
	    }
	}
	
	//TODO: změnit regex tak, aby místo "_Id\číslo\pomlčka" nastavil "-"
	$this->cmpFullDbName = \Nette\Utils\Strings::replace($this->getUniqueId(), "~[_Id\d]+~i", ""); //nastav cmpFullDbName na název komponenty bez suffixu _Id... - odstraň _Id... i z názvů podkomponent
	//params z db
	$dbCmpsParams = $this->presenter->cmpsCache->load("dbCmpsParams");
	$this->dbParams = isset($dbCmpsParams[$this->getCurrentPageSlug()][$this->cmpFullDbName]) ? $dbCmpsParams[$this->getCurrentPageSlug()][$this->cmpFullDbName] : null;
	
	$this->modelKomponenty = $presenter->context->getByType("\App\Components\BaseStandardCmp\Model\Komponenty");
	$this->modelStranky = $presenter->context->getByType("\App\Components\BaseStandardCmp\Model\Stranky");
    }
    
    protected function setOnRender(){
	if($this->templateSet===null){ //když nezadám parametry ručně - načtu je z databáze
	    //$this->getAttributes();
	    $this->templateSet = isset($this->dbParams["templateSet"]) ? $this->dbParams["templateSet"] : null;
	    
	    $id = $this->id;
	}
	
	$this->uniqueId = $this->getUniqueId();
        $this->template->uniqueId = $this->uniqueId;
	$this->template->id = $this->id;
    }
    protected function setCmpMode(){
	if(!$this->presenter->user->isAllowed("sprava-obsahu"))
	    $this->mode = self::modeDefault;
	elseif($this->presenter->isModuleCurrent('Admin') && $this->getParent()->getParent() instanceof \Nette\Application\UI\Presenter) //když jde o main(přímou) komponentu v adminu
	    $this->mode = self::modeAdmin;
	elseif($this->getParent()->getParent() instanceof \App\Components\QuickAdminMenu\QuickAdminMenuControl) //$this->getParent()->getParent()->getName() == "quickAdminMenu"
	    $this->mode = self::modeQuickAdmin;
    }
    protected function selectRender(&$methodName){
	if(!$this->mode)
	    $this->mode = self::modeDefault;
	$methodName = "render".ucfirst($this->mode["modeName"]);
	$this->$methodName();
    }

    public function render()
    {
	//TODO: editovat traitu a přeuložit proměnnou
	$this->setOnRender();
	if(!$this->mode)
	    $this->setCmpMode();
	
//	dump("staticP:",$this->staticParams, "presenterStaticP", $this->presenter->staticCmpsParams);
	//TODO: zajistit, aby žádná komponenta nemohla na stejné stránce mít stejné jméno - aby se nepřepisovali parametry
	if($this->staticParams != null){ //ajaxově při rendrování jsou params null, proto nepřenastavujeme, když je hodnota null
	    $staticCmpsParams = $this->presenter->cmpsCache->load("staticCmpsParams");
	    if(isset($this->staticParams[0]) && $this->staticParams[0] == null) //když jsou parametry předané z templatu 0, znamená to, že komponenta nemá definované statické parametry a nastavíme tak její parametry na prázdné pole
		$staticCmpsParams[$this->getCurrentPageSlug()][$this->getUniqueId()] = array();
	    else
		$staticCmpsParams[$this->getCurrentPageSlug()][$this->getUniqueId()] = $this->staticParams; //uložím parametry komponenty předané z templatu do proměnné, která je následně zapsána do souboru a načtena při příštím načtení stránky
	    \InitSmartCmps::saveStaticParams($staticCmpsParams, $this->presenter);
	}
	$this->setPropertiesByParams(); //nastavím properties komponenty objektu komponenty podle načtených parametrů z databáze a na pevno zadaných z templatu
	
	$renderLifeCyclus = array();
	$this->selectRender($methodName); //v method name se mi uloží název renderMethody()
	$renderLifeCyclus[] = array("renderMethod" => $methodName); //přidat renderMethodName do infu o metodách volaných v životním cyklu renderu komponenty
	
	if($this->templateSet!==null){
	    $templateSetMethodName = "templateSet".ucfirst($this->templateSet);
	    //jestliže jsou definovány metody pro templateSet ve všech modech (pr. templateSetNazevDefault/Edit/Admin/QuickAdmin()) nemusí být definována metoda templateSetMethodName() (metoda, která proběhne pro každou šablonu templateSatu
	    $allTemplateSetMethodsModesDefined = true;
	    $oClass = new \ReflectionClass(__CLASS__);
	    foreach($oClass->getConstants() as $constantName => $constantValue){
		if(substr($constantName, 0, strlen("mode")) === "mode") //jde o konstantu s údajem o modu komponenty
		    if(!method_exists($this, "render".ucfirst($constantValue["modeName"]))){
			$allTemplateSetMethodsModesDefined = false;
			break;
		    }
	    }
	    if($allTemplateSetMethodsModesDefined) //když jsou definovány metody pro všechny mody daného templateSatu
	    {
		if(method_exists($this, $templateSetMethodName)){
		    $this->$templateSetMethodName();
		    $renderLifeCyclus[] = array("templateSetMethod" => $templateSetMethodName);
		}
	    }
	    else{
		$this->$templateSetMethodName();
		$renderLifeCyclus[] = array("templateSetMethod" => $templateSetMethodName);
	    }
	    
	    //když je definovaná metoda pro templaSetNazev v daném modu - templateSetNameMode()
	    if(method_exists($this, $templateSetInModeMethodName=$templateSetMethodName.ucfirst(strtolower($this->mode["modeName"])))){
		$this->$templateSetInModeMethodName();
		$renderLifeCyclus[] = array("templateSetInModeMethod" => $templateSetInModeMethodName);
	    }
	}
	
//	dump($renderLifeCyclus);
	$this->template->render();
    }
    
    public function handleEdit()
    {
        if($this->presenter->user->isAllowed("sprava-obsahu")){
	    $this->mode=self::modeEdit;
	}
        
	if ($this->presenter->isAjax()){
//	    $this->presenter->redrawControl($this->uniqueId);
	   
	    if(isset($this->presenter["quickAdminMenu"])){
		$this->presenter["quickAdminMenu"]->redrawControl();
	    }
	    
	    $this->redrawControl();
        }
	
	//nastav do qaMenu komponentu, která byla nakliklá k editaci
	if(isset($this->presenter["quickAdminMenu"]))
	    $this->presenter["quickAdminMenu"]->template->quickAdminCurrEditCmp = $this;
	
	//poslední editovanou komponentu vrať to výchozího stavu (modeDefault)
	if(null !== $this->presenter->cmpsCache->load("lastEditedCmpName") && $this->getUniqueId()!=$this->presenter->cmpsCache->load("lastEditedCmpName")){ //když je v session nastavená minulá editované komponenta a současně se nejedná o aktuálná nakliklou komponentu (minulá a aktuálně nakliklá editovaná cmp nejsou jedna a tatáž)
	    $this->presenter[$this->presenter->cmpsCache->load("lastEditedCmpName")]->mode = self::modeDefault;
	    $this->presenter[$this->presenter->cmpsCache->load("lastEditedCmpName")]->redrawControl();
	}
	$this->presenter->cmpsCache->save("lastEditedCmpName", $this->getUniqueId()); //do cache ulož jméno poslední komponenty, kterou jsem editoval. (jméno aktuálně nakliklé komponenty k editaci)
    }
    
    /**
     * nastaví templateFile na soubor stejného názvu jako je název metody odkud je tato metoda volána, nebo na název jaký je předán v parametru templateSet
     */
    protected function setTemplate()
    {
	if(!$this->template->getFile()){ //když není nastaven jiný template, nastav automaticky
	    $trace = debug_backtrace();
	    $caller = $trace[1];
	    $reflector = new \ReflectionClass(get_class($caller["object"]));
	    $callerClassFile = $reflector->getFileName();
	    $templatesDir = dirname($callerClassFile) . '/templates/';

    //	dump($caller, $trace);exit;

	    $name = $caller['function']; //jméno render metody
	    $renderName = lcfirst(str_replace("render", "", $name)).".latte"; //od ní odvozené jméno templatu - odstraním render a zbyde název templatu
	    //$renderName = $renderName == "Default" ? "" : $renderName; //když je fileName default, nastav ho na "" - default template nemusí mí t na konci "Default (templateNameDefault)

    //	dump($caller["class"],get_class($caller["object"]),$callerClassFile,$templatesDir,$this->templateSet, $renderName);

	    if(!$this->templateSet){
		$this->template->setFile($templatesDir.$renderName);
	    }
	    else{
		if(!is_dir($templatesDir."templateSets")){ //check if templateSets dir exists
		    dump($exStr="Složka 'templateSets' v komponentě třídy ".get_class($this)." neexistuje");
		    throw new \Exception($exStr);
		}

		$filePath = $templatesDir."templateSets/".$this->templateSet."/".$renderName;
    //	    dump($filePath);
		is_file($filePath) ? $this->template->setFile($filePath) : $this->template->setFile($templatesDir.$renderName);
	    }
	}
    }
    
    /** 
     * @return array or bool return false if components has no attributes
     * otherwise return array of attributes where key is attribute name
     * and value is attribute value
     */
    private function getMyAttributesFromDb()
    {
	/* 
	 * TODO: do db uložit všechny linky - pages (smart links) tam budou, v adminu při volbě menu/linků se vypíší všechny standard links (module:presenter:view), pak možnost uložit absolut links...?
	 *  - smartLink generuji pomoci $presenter->link(":Public:Homepage:smartPage, $pageSlug"); [format: $pageSlug = "slugStranky"]
	 *  - standardLink generuji pomoci $presenter->link($pageSlug); [format: $pageSlug = ":Module:Presenter:View"]
	 **/
	//smartCmps (komponenty) načítají svoje atributy pro danou stránku - rozlišíme, jestli jde o stránku dostupnou na standard, nebo smart linku

	//sablony u sebe mají uvedeno u jaké mohou být stránky - každá šablona má přiřazený jednu stránku; pak findAll sablony where stranka_id == $strId vrátí seznam všech šablon použitelných/nastavitelných pro danou stránku
	//každá stránka u sebe má svojí aktuálně používající šablonu

	//GET ATTRIBUTES FROM DB
	$attributes = array();
	if($page = $this->modelStranky->findOneBySlug($pageSlug)){ //je aktuální stránka v db?
	    if(count($komponenty = $this->modelKomponenty->findByName($this->cmpFullDbName))>0){ //jestli komponenta je zadaná v db
		$komponentyIds = $komponenty->fetchPairs("id");
		try{
		    $komponentaSablonaAtributy = $page->cmpbase_sablony->related("cmpbase_sablony_komponenty", "cmpbase_sablony_id")->where("cmpbase_komponenty_id IN", $komponentyIds)->limit(1)->fetch()->related("cmpbase_hodnoty_atributu", "cmpbase_sablony_komponenty_id");
		    foreach($komponentaSablonaAtributy as $attr)
			$attributes["{$attr->cmpbase_atributy->nazev}"] = $attr->hodnota;
		    $this->dbParams = $attributes;
//		    dump($this->dbParams);

		    $this->templateSet = isset($this->dbParams["templateSet"]) ? $this->dbParams["templateSet"] : null;
		}
		catch(\Exception $e)
		{
		    dump("v databázi nejsou korektně zadány parametry komponenty pro danou stránku");
		}
	    }
	    else{
		//dump("komponenta není zadaná v db");
	    }
	}
	else{
	    //dump("stránka v db nenalezena");
	}
	
        return $attributes;
    }
    
    public function getCurrentPageSlug(){
	if($pageSlugFromUrl = $this->presenter->getParameter(self::urlParamToDetectPage, false)){ //smart link; v url je param $urlParamToDetectPage, který detekuje stránku //pageSmartSlug	    dump()
	    $pageSlug = "/".$pageSlugFromUrl;
//	    dump($this->presenter->link(":Public:Homepage:smartPage, $pageSlug"));exit;
	}
	else{ //standard link; jde o stránku, renderovanou standardně nette - :Model:Presenter:Action //pageStandardSlug
	    $pageSlug = $this->getCurrentStandardPageSlug();
//	    dump($this->presenter->link($pageSlug));exit;
	}
	
	return $pageSlug;
    }
    
    //slug, který má v db uložena stránka - pro standard page je to :Module:Presenter:View, pro smart page je to /slug
    protected function getCurrentStandardPageSlug(){
	if(!$this->presenter->getModuleName()) //bez modulu
	    return $this->presenter->getName().":".$this->presenter->getAction();
	else
	    return ":".$this->presenter->getModuleName().":".$this->presenter->getName().":".$this->presenter->getAction();
    }
    
    protected function setPropertiesByParams()
    {
	//nastavím prop. podle dbParams
	if(count($this->dbParams)>0){
	    foreach($this->dbParams as $dbParamKey => $dbParamValue){
		if(property_exists($this, $dbParamKey)){
		    $this->$dbParamKey = $dbParamValue;
		}else{
		    throw new \Exception("Property $dbParamKey doesn't exist in ".get_class($this)." or has not enought access grants!");
		}
	    }
	}
	
	//nastavím prop. podle staticParams, případné prop. shodné s hodnotami v dbParams budou přepsány - staticParams jsou tak nadřazené dbParams
	$staticCmpsParams = $this->presenter->cmpsCache->load("staticCmpsParams");
	if(isset($staticCmpsParams[$this->getCurrentPageSlug()][$this->getUniqueId()]) && count($staticCmpsParams[$this->getCurrentPageSlug()][$this->getUniqueId()])>0){
	    foreach($staticCmpsParams[$this->getCurrentPageSlug()][$this->getUniqueId()] as $staticParamKey => $staticParamValue){
		if(property_exists($this, $staticParamKey)){
		    if($this->$staticParamKey == null) //když už je param nastavený (např. jsem ho nastavil v handle metodě), tak ho neměň
			$this->$staticParamKey = $staticParamValue;
		}else{
		    throw new \Exception("Property $staticParamKey doesn't exist in ".get_class($this)." or has not enought access grants!");
		}
	    }
	}
    }
}