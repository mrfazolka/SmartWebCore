<?php
/**
 * C:\xampp\htdocs\harmonydesign.cz\app\components\SmartCmps\BaseCmp/initTrait.php
 */
trait initTrait
{

	public function createComponentAjaxImgCmp()
	{
		return $this->context->getByType("App\Components\AjaxImgCmp\AjaxImgCmpFactory")->create();
	}


	public function createComponentAjaxMultiuploadCmp()
	{
		return $this->context->getByType("App\Components\AjaxMultiuploadCmp\AjaxMultiuploadCmpFactory")->create();
	}


	public function createComponentBlogCmp()
	{
		return $this->context->getByType("App\Components\BlogCmpomponent\BlogCmpFactory")->create();
	}


	public function createComponentMenuCmp()
	{
		return $this->context->getByType("App\Components\MenuCmp\MenuCmpFactory")->create();
	}


	public function createComponentProdejCmp()
	{
		return $this->context->getByType("App\Components\ProdejCmp\ProdejCmpFactory")->create();
	}


	public function createComponentProjektyCmp()
	{
		return $this->context->getByType("App\Components\ProjektyCmp\ProjektyCmpFactory")->create();
	}


	public function createComponentSliderCmp()
	{
		return $this->context->getByType("App\Components\SliderCmp\SliderCmpFactory")->create();
	}


	public function createComponentTextCmp()
	{
		return $this->context->getByType("App\Components\TextCmp\TextCmpFactory")->create();
	}


	public function createComponentTitleCmp()
	{
		return $this->context->getByType("App\Components\TitleCmp\TitleCmpFactory")->create();
	}


	public function createComponentUniverzalBlogCmp()
	{
		return $this->context->getByType("App\Components\UniverzalItem\UniverzalBlogCmpFactory")->create();
	}


	public function createComponentUniverzalItemOstatniSluzbyCmp()
	{
		return $this->context->getByType("App\Components\UniverzalItem\UniverzalItemOstatniSluzbyCmpFactory")->create();
	}


	public function createComponentUniverzalSluzbyCmp()
	{
		return $this->context->getByType("App\Components\UniverzalItem\UniverzalSluzbyCmpFactory")->create();
	}


	public function createComponentUniverzalItemStuffCmp()
	{
		return $this->context->getByType("App\Components\UniverzalItem\UniverzalItemStuffCmpFactory")->create();
	}


	public function createComponentDatumCmp()
	{
		return $this->context->getByType("App\Components\DatumCmp\DatumCmpFactory")->create();
	}


	public function createComponentSimpleImageCmp()
	{
		return $this->context->getByType("App\Components\SimpleImageCmp\SimpleImageCmpFactory")->create();
	}

}
