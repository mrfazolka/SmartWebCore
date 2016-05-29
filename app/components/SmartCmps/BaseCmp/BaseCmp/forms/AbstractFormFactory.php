<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
	Nette\Security\User;


abstract class AbstractFormFactory extends Nette\Object
{
    /** @var Form*/
    protected $form;

    /**
     * @return Form
     */
    public function create()
    {                        
        $this->form = new Form();
        $this->form->getElementPrototype()->setClass("ajax");
	
        return $this->form;
    }
}
