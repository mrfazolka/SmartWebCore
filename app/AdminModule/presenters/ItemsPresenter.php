<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\Model;


class ItemsPresenter extends BasePresenter
{
	public function renderDefault()
	{
	    dump("admin items");
	}

	public function renderNew($id, $name)
	{
	    $this->template->c = $this[$name."-manageItem_Id$id"];
	}
}
