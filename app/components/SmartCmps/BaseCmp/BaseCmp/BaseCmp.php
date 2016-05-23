<?php
/* u zděděných tříd dělat logiku nastavení hodnoty numOfOccur*/
namespace App\Components\BaseCmp;

/*
 * Třída slouží k tomu, abychom nemuseli u každé komponenty, která využívá továrničku implementující BaseCmpFactory implementovat metodu construct, která pouze předává svojí továrničku komponentě
 */
abstract class BaseCmp extends \Nette\Application\UI\Control
{    
    /** @var BaseCmpFactory */
    public $factory;
    protected $uniqueId;
    public $cmpFullName;
//    protected $numOfOccur;
    public $mode;
    
    //note: modeName je zásadní - je třeba dodržovat správné názvy - pomocí "render".ucfirst(mode["modeName"]) vznikne název metody, která se podle modeName renderuje
    const modeDefault = array("modeName"=>"default", "info"=>"standardní mód - komponenta se zobrazí pomocí renderDefault() ve výchozím stavu");
    const modeEdit = array("modeName"=>"edit", "info"=>"komponenta zobrazená v módu umož%nujícím editaci");
    const modeQuickAdmin = array("modeName"=>"quickAdmin", "info"=>"zobrazení v quickAdmin panelu");
    const modeAdmin = array("modeName"=>"admin", "info"=>"zobrazení v admin modulu");
    
    /*
     * životní cyklus je takový, že se vykoná nejdříve handle (signály), v nich můžeme nastavit proměnné templatu, pak se pokračuje render metodou (v té zde vyberu jakou metodu dál volám a jaký template načtu)
     * construct->attached->handleMethods()->render() ; renderMethod() není po render() - nepoužívají se jinak než tak, že je ručně zavolám, nebo v latte cmp:renderMethoda
     */
    public function attached($presenter) {
        parent::attached($presenter);
	
	$this->cmpFullName = $this->getParent()->getName()."-".$this->getName();
	$this->template->kompName = $this->cmpFullName;
//	$this->uniqueId = $this->getUniqueId().$this->numOfOccur; //$this->lookupPath("\Nette\Application\UI\Presenter");//spl_object_hash($this);
	$this->uniqueId = $this->getUniqueId();
        $this->template->uniqueId = $this->uniqueId;
//	$this->mode = self::modeDefault;
//	$_SESSION["cmp"][] = $this->uniqueId;
	
	if($presenter->user->isAllowed("sprava-obsahu"))
	    $this->template->editMode = true;
	else
	    $this->template->editMode = false;
    }

    public function __construct(BaseCmpFactory $f) {
        parent::__construct();
        $this->factory = $f;
//	$this->numOfOccur = 0;
    }
    
    protected function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
	
	$template->addFilter(NULL, '\App\MyFunctions\Filters::common');
        
        return $template;
    }
    
    public function templatePrepareFilters($template)
    {
	\LatteMacros::install($template->getLatte()->getCompiler());
    }
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