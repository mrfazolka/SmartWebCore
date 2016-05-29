<?php
namespace App\Components\BaseStandardCmp\Model;

class Stranky extends \App\Model\Table{
    /** @var string */
    protected $tableName = 'cmpbase_stranky';
    
    /**
     * Vrátí stránku podle jejího slugu
     * @param array $slug
     * @return \Nette\Database\Table\ActiveRow|FALSE
     */
    public function findOneBySlug($slug)
    {
        return $this->findOneBy(array("slug"=>$slug));
    }
    
    public function findPageComponentByName($cmpId, $name){
	
    }
}
