<?php
namespace App\MyExtensions;

use Nette;

class CmpsExtension extends Nette\DI\CompilerExtension
{
    public $defaults = array(
    );
    
    public function loadConfiguration()
    {
	$builder = $this->getContainerBuilder(); //umožňuje to stejné, jako zápis služby v konfiguračním souboru
	$config = $this->getConfig(); //získá konfiguraci z konf. souboru. (config.neon) (konfiguraci extensiony)
	
	// načtení konfiguračního souboru pro komponenty
	foreach (Nette\Utils\Finder::findFiles('cfg.neon')->from("../app/components") as $file) {
	    $this->compiler->parseServices($builder, $this->loadFromFile($file));
	}
    }
    
    public function afterCompile(\Nette\PhpGenerator\ClassType $class)
    {
	
    }
}