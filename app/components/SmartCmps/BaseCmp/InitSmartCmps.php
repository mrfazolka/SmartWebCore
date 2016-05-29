<?php
class InitSmartCmps extends \Nette\Object{
    //Pro správnou funkčnost je třeba existence souboru s traitou "initTrait" ve stejné složce jako je tato třída. (traita může být naprosto prázdná)
    public static function init(\Nette\Application\UI\Presenter $presenter)
    {
	//TODO - check if class exist - if no, create it
	$actualCmpClasses = array();
	if(self::isRefreshNeeded($actualCmpClasses, $presenter))
	{
	    $trait = new Nette\PhpGenerator\ClassType("initTrait", new \Nette\PhpGenerator\PhpNamespace("Namespace"));
	    foreach($actualCmpClasses as $cmpFactoryClassName=>$cmpInfo){
		$trait->addMethod("createComponent".$cmpInfo["cmpFullName"])->setBody('return $this->context->getByType("'.$cmpFactoryClassName.'")->create();');
	    }
	    $phpFilePath = __DIR__."/initTrait.php";
	    $trait->setType(Nette\PhpGenerator\ClassType::TYPE_TRAIT);
	    $trait->addDocument($phpFilePath);
//	    $trait->addProperty("lastCmpClasses", $actualCmpClasses);
//	    dump($trait);exit;
	    \Nette\Utils\FileSystem::write($phpFilePath, "<?php\n".$trait);

	    $presenter->cmpsCache->save("lastCmpClasses", $actualCmpClasses);
	}
    }
    
    private static function isRefreshNeeded(&$actualCmpClasses, \Nette\Application\UI\Presenter $presenter)
    {
	//get all registred classes
	$actualCmpClasses = array();
	foreach($presenter->context->getService('robotLoader')->getIndexedClasses() as $cmpFactoryClassName => $filePath)
	{
	    //filtre only smartCmps factories classes - check if classes are not abstract and smartCmpsFactories
	    $class = new \ReflectionClass($cmpFactoryClassName);
	    if(!$class->isAbstract() && \Nette\Utils\Strings::contains($cmpFactoryClassName, "CmpFactory") && \Nette\Utils\Strings::contains("$cmpFactoryClassName", "App\Components\\"))
	    {
		$cmpFactory = $presenter->context->getByType($cmpFactoryClassName);
		$cmpFullName = \Nette\Utils\Strings::replace(str_replace("\\","",strrchr($cmpFactoryClassName,"\\")), array("[Factory]"=>""));
		$actualCmpClasses[$cmpFactoryClassName]["cmpFullName"]=$cmpFullName;
		$actualCmpClasses[$cmpFactoryClassName]["inQuickAddMenu"]=$cmpFactoryClassName::inQuickAddMenu;
		$actualCmpClasses[$cmpFactoryClassName]["title"]=$cmpFactoryClassName::title;
	    }
	}

	if(!isset($presenter->lastCmpClasses))
	    return true;
	else
	    return !($actualCmpClasses == $presenter->cmpsCache->load("lastCmpClasses"));
    }
    
    
    
    //GET ATTRIBUTES of all cmps FROM DB
    //TODO: ukládat pole atributů do cache
    public static function getAttrsOfCmpsFromDb($presenter)
    {
//	$phpFilePath = __DIR__."\\dbCmpsDbParamsTrait.php";
	
	$dbCmpsAttributes = array();
	foreach($pages = $presenter->context->getByType("\App\Components\BaseStandardCmp\Model\Stranky")->findAll() as $page){ //je aktuální stránka v db?
	    foreach($komponenty = $presenter->context->getByType("\App\Components\BaseStandardCmp\Model\Komponenty")->findAll() as $komponenta){
		try{
		    if($komponentaSablona = $page->cmpbase_sablony->related("cmpbase_sablony_komponenty", "cmpbase_sablony_id")->where("cmpbase_komponenty_id", $komponenta->id)->limit(1)->fetch()){
			$komponentaSablonaAtributy = $komponentaSablona->related("cmpbase_hodnoty_atributu", "cmpbase_sablony_komponenty_id");
			foreach($komponentaSablonaAtributy as $attr)
			    $dbCmpsAttributes[$page->slug][$komponenta->name]["{$attr->cmpbase_atributy->nazev}"] = $attr->hodnota;
		    }
		}
		catch(\Exception $e){
		    dump("v databázi nejsou korektně zadány parametry komponenty pro danou stránku");
		}
	    }
	}

//	$trait = new Nette\PhpGenerator\ClassType("dbCmpsParamsTrait", new \Nette\PhpGenerator\PhpNamespace("Namespace"));
//	$trait->setType(Nette\PhpGenerator\ClassType::TYPE_TRAIT);
//	$trait->addDocument($phpFilePath);
//	$trait->addProperty("dbCmpsParams", $dbCmpsAttributes);
//	\Nette\Utils\FileSystem::write($phpFilePath, "<?php\n".$trait);
	
	$presenter->cmpsCache->save("dbCmpsParams", $dbCmpsAttributes);
    }
    
    public static function saveStaticParams($params, &$presenter)
    {
//	$phpFilePath = __DIR__."\\staticCmpsParamsTrait.php";
//	$trait = new \Nette\PhpGenerator\ClassType("staticCmpsParamsTrait", new \Nette\PhpGenerator\PhpNamespace("Namespace"));
//	$trait->setType(\Nette\PhpGenerator\ClassType::TYPE_TRAIT);
//	$trait->addDocument($phpFilePath);
//	$trait->addProperty("staticCmpsParams", $params);
//	\Nette\Utils\FileSystem::write($phpFilePath, "<?php\n".$trait);
	
	$presenter->cmpsCache->save("staticCmpsParams", $params);
    }
}