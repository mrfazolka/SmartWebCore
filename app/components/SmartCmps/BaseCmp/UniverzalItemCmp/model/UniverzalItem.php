<?php
namespace App\Components\UniverzalItem\Model;

class UniverzalItems extends \App\Model\Table{
    /** @var string */
    protected $tableName = 'cmp_univerzalitem';
    
    public function insert($values)
    {
        return $this->getTable()
                    ->insert(array(
                        'title' => $values->cmp_title_id,
			'text1' => $values->cmp_text_id,
			'img1' => $values->cmp_image_id,
			'itemname' => $values->itemName,
        ));
    }
    
    public function update($values)
    {
        return $this->getTable()
                    ->where("id", $values->cmp_univerzal_id)
                    ->update(array(
                        'title' => $values->cmp_title_id,
			'text1' => $values->cmp_text_id,
			'img1' => $values->cmp_image_id,
        ));
    }
    
    public function updateTitleTextImgId($id, $cmp_titletextimg)
    {
	return $this->getTable()->where(array("id"=>$id))->update(array("cmp_titletextimg"=>$cmp_titletextimg));
    }
    public function updateDatumId($id, $cmp_datum_id)
    {
	return $this->getTable()->where(array("id"=>$id))->update(array("cmp_datum_id"=>$cmp_datum_id));
    }
    public function updateSubtextId($id, $cmp_subtext_id)
    {
	return $this->getTable()->where(array("id"=>$id))->update(array("cmp_text_id"=>$cmp_subtext_id));
    }
}