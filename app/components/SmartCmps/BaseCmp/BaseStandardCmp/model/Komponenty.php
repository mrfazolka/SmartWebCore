<?php
namespace App\Components\BaseStandardCmp\Model;

class Komponenty extends \App\Model\Table{
    /** @var string */
    protected $tableName = 'cmpbase_komponenty';
    
    public function insert($values)
    {
        return $this->getTable()
                    ->insert(array(
                        'komponentaName' => $values->nazev,
			'komponentaTitle' => $values->title
        ));
    }
    
//    public function update($id, $text)
//    {
//        return $this->getTable()
//                    ->where("id", $id)
//                    ->update(array(
//                        'text' => $text
//        ));
//    }
    
    public function findByName($name)
    {
        return $this->findBy(array("name"=>$name));
    }
}