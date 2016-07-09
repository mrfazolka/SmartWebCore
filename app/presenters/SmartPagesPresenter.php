<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class SmartPagesPresenter extends SmartPagesPresenterBase
{
    //do only for smartpage uvodniStrana
    public function renderUvodniStrana()
    {
	$this->template->var = "something";
    }
}
