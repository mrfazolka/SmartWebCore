<?php
namespace App\Components\BaseCmp;

/*
 * Každá komponenta by měla dědit tuto třídu.
 * Třída implementuje metodu create, která zajistí jedinečnou instanci komponenty na stránce (i v případě vícenásobného použití) a správný komponentový přístup.
 * Aby mohlo být této třídy využito při tvorbě komponent, je třeba dodržet jmennou konvenci takovou, že název třídy továrničky komponenty je shodný s názvem třídy komponenty samotné a za ním je připojeno "Factory".
 * Konkrétně to znamená, že pro komponentu třídy KompTest implementujeme továrničku třídy KompTestFactory.
 * 
 * Tímto přístupem dosáhneme toho, že závislosti předáme pouze továrničce a ta je sama předá komponentě tak, že předá sama sebe. Komponenta tak má přístup k závislostem přes předanou továrničku.
 * Tím nemusíme předávat závislosti jak továrničce a pak z továrničky komponentě a duplikovat kód.
 */
abstract class BaseCmpFactory{
    
    const inQuickAddMenu = false;
    const title = null;
    public $hasInsertForm = true;
    
    //create multi - s využítím multiplieru můžeme zakládat komponenty, kterým za pomlčku napíšeme jejich jméno a oni se vytvoří cždy jako nový objekt
    function create()
    {
        $thisFact = $this;
	return new \Nette\Application\UI\Multiplier(function ($komponentName) use ($thisFact) {
            $cmpClassName = str_replace("Factory", "", get_class($this)); //získej jméno třídy, jejíž komponentu vytváříme (tzn. aby automatizace pomocí BaseCmpFactory fungovala, musíme dodržovat jmennou konvenci, že jméno factory třídy komponenty se jmenuje stejně jako samotná třída komponenty, jen za názvem náselduje "Factory"
	    return new $cmpClassName($thisFact);
	});
    }
    
//    //standartní vytvoření komponenty
//    function createNormal()
//    {
//        $cmpClassName = str_replace("Factory", "", get_class($this));
//        return new $cmpClassName($this);
//    }
}


/*
 * Příklad použití:
 * 
 * 
 
 
   class TextControlTestFactory extends \App\Components\BaseCmp\BaseCmpFactory
   {

        public $modelKomponenty;
        public $modelTexty;

        public function __construct(Model\Komponenty $komponenty, Model\Texty $texty)
        {
            $this->modelKomponenty = $komponenty;
            $this->modelTexty = $texty;
        }
    }
  
    class TextControlTest extends \App\Components\BaseCmp\BaseCmp
    {
        /** @var TextControlTestFactory factory  *

        public function render()
        {
            $this->template->setFile(dirname(__FILE__) . '/templates/default.latte');
            $this->template->render();
        }
    }
 *  
 */