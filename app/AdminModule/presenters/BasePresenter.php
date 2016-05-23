<?php
namespace App\AdminModule\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \App\Presenters\BasePresenter
{
    function beforeRender() {
	parent::beforeRender();
	
	if(!$this->user->isAllowed("sprava-obsahu"))
	    $this->redirect(":Homepage:");
    }
}
