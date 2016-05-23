<?php
/**
 * C:\xampp\htdocs\hovno\app\components\SmartCmps\BaseCmp\initTrait.php
 */
trait initTrait
{

	public function createComponentTextCmp()
	{
		return $this->context->getByType("App\Components\TextCmp\TextCmpFactory")->create();
	}

}
