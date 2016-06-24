<?php

namespace App\Presenters;

use Nette;
use App\Model;


class SmartPagesPresenterBase extends BasePresenter
{
    /**
     * @inject 
     * @var \App\Components\BaseStandardCmp\Model\Stranky */
    public $modelStranky;
    
    public function actionDefault($smartSlug, $id)
    {
//	dump($smartSlug);
	if($page = $this->modelStranky->findOneBy(array("slug"=>"/".$smartSlug))){
	    $pageMethod = "page".ucfirst($page->cmpbase_sablony->template);
	    if(method_exists($this, $pageMethod))
		$id ? $this->$pageMethod($id) : $this->$pageMethod();
//	    dump($page);exit;
	    $this->setView($page->cmpbase_sablony->template);
	}
//	else{
////	    exit;
//	    if($smartSlug==null)
//		$this->redirect("Homepage:default");
//	    $presenterName = Nette\Utils\Strings::firstUpper($smartSlug);
//	    $this->redirect("$presenterName:$id"); //id je zde view
//	}
    }
}
