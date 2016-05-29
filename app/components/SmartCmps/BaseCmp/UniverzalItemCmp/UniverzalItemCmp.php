<?php
namespace App\Components\UniverzalItem;

use App\MyFunctions\Func;

//TODO: přidat do tabulky sloupec "typ" - abych mohl jednu tabulku používat na všechny univerzální věci ... projekty, aktuality ... atd .... tabulka bude jedna a typ bude označovat typ obsahu
abstract class UniverzalItemCmp extends \App\Components\BaseStandardCmp\BaseStandardCmp
{    
    /** @var $factory UniverzalItemCmpFactory */
    protected $cmp_titleTextImgCmp_id;
    protected $cmp_datum_id;
    
    protected $univerzalItemRow;
    
    const itemName = null;
    
    public function renderDefault()
    {
        $this->setTemplate();
	
	if(!$row = $this->factory->modelUniverzalItems->findOneById($this->id)){ //když nebyl záznam nalezen, založ nový
	    $row = $this->factory->modelUniverzalItems->insert(Func::arrHash(array("id"=>$this->id, "itemName"=>self::itemName)));
	    $this->flashMessage("Komponentě nebyl přiřazen žádný záznam, proto byl založen nový :)");
	}
	
	$this->template->row = $row;
//	if(get_class($this)=="App\Components\UniverzalItem\UniverzalItemStuffCmp"){ //debug UniverzalItemStuffCmp; get related row
//	    dump($row->ref("cmp_image", "img1"));exit;
//	}
    }
    
    public function renderEdit()
    {
	dump("komponenta nemá žádný form "); exit;
//        $this->setTemplate();
//	if($row = $this->factory->modelTexty->findOneById($this->id)){
//            $this["editForm"]["cmp_text_id"]->setValue($row->id);
//	    $this["editForm"]->setDefaults($row);
//            //$this["editForm"]->getElementPrototype()->id($this->uniqueId);
//	}
//        else{
//            dump("(".get_class($this).") text id: $this->id v db neexistuje");
//        }
    }

    protected function createComponentEditForm()
    {
        /** @var \Nette\Application\UI\Form */
        $form = $this->factory->textFormFactory->create(); //TODO: dodat do ImgFactory parametr ... (asi presenter), abych mohl ověřit práva uživatele při validaci ve formu..., ještě zkusit začít transakci ve formu (když se obrázek ukládá a pak jí zde nakonci, když všechno projde jak má, commitnou, jinar rollback)
        $form->onSuccess[] = function ($form) {
            if($this->presenter->user->isAllowed("sprava-obsahu"))
            {
                $this->flashMessage("uloženo");
                if($this->presenter->isAjax()){
                    $this->mode = self::modeDefault;
		    $this->redrawControl();
		    
		    if(isset($this->presenter["quickAdminMenu"])){
			$this->presenter["quickAdminMenu"]->redrawControl();
		    }
                }
                else{
                    $this->presenter->redirectUrl($this->link("this")."#".$this->uniqueId);
                }
            }
            else{
               $form->addError("nemáte oprávnění"); 
            }
        };

        return $form;
    }
    
    //insert new item
    public function renderQuickAdmin()
    {
	//insert new item (nezávisle na tom, jestli předám komponentě id nebo ne .... v quickAdminu je komponenta vypisována za účelem přidání záznamu. Když jde o editaci, je předána instance již existující komponenty a tato metoda se nerenderuje
        $this->setTemplate();
	
//	$this->renderEdit();
    }
    
    public function renderAdmin()
    {
        $this->setTemplate();
	$this->template->row = $this->factory->modelUniverzalItems->findOneById($this->id);
    }
    
    
    public function getUniverzalItemRow($id)
    {
	if($univerzalItemRow = $this->factory->modelUniverzalItems->findOneById($id))
	    $this->template->univerzalItemRow = $univerzalItemRow;
	else
	    dump("v db neexistuje záznam pro univerzální položku s id $id");
	
	return $this->univerzalItemRow = $univerzalItemRow;
    }
    
    public function createComponentDatumCmp()
    {
        //zavěsím handler, aby tato komponenta zachytávala, kdy dojde k uložení textu
        $this->presenter->kompDatumCmpFactory->datumFormFactory->onProcessedDatum[] = function($cmp_datum_id){
            //dump($cmp_datum_id);exit;
	    $this->factory->modelUniverzalItem->updateDatumId($this->id, $cmp_datum_id);
        };
        
        return $this->presenter->kompDatumCmpFactory->create();
        
    }
    
    public function createComponentTextCmp()
    {
        //zavěsím handler, aby tato komponenta zachytávala, kdy dojde k uložení textu
        $this->presenter->kompTextCmpFactory->textFormFactory->onProcessedText[] = function($cmp_text_id){
            //dump($cmp_subtext_id);exit;
//	    $this->factory->modelUniverzalItem->updateSubtextId($this->id, $cmp_subtext_id);
        };
        
        return $this->presenter->kompTextCmpFactory->create();
    }
    
    public function createComponentAjaxImgCmp()
    {
        //zavěsím handler, aby tato komponenta zachytávala, kdy dojde k uložení textu
        $this->presenter->kompAjaxImgCmpFactory->ajaxImgFormFactory->onProcessedText[] = function($cmp_ajaximg_id){
            //dump($cmp_subtext_id);exit;
//	    $this->factory->modelUniverzalItem->updateSubtextId($this->id, $cmp_subtext_id);
        };
        
        return $this->presenter->kompAjaxImgCmpFactory->create();
    }
    public function createComponentTitleCmp()
    {
        //zavěsím handler, aby tato komponenta zachytávala, kdy dojde k uložení textu
        $this->presenter->kompTitleCmpFactory->titleFormFactory->onProcessedTitle[] = function($cmp_title_id){
            //dump($cmp_subtext_id);exit;
//	    $this->factory->modelUniverzalItem->updateSubtextId($this->id, $cmp_subtext_id);
        };
        
        return $this->presenter->kompTitleCmpFactory->create();
    }
}

abstract class UniverzalItemCmpFactory extends \App\Components\BaseCmp\BaseCmpFactory{
 
    /** @var Model\UniverzalItems */
    public $modelUniverzalItems;
        
    public function __construct(Model\UniverzalItems $modelUniverzalItems)
    {
	$this->modelUniverzalItems = $modelUniverzalItems;
    }
}
