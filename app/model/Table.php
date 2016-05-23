<?php
namespace App\Model;
/**
 * Reprezentuje repozitář pro databázovou tabulku
 */
abstract class Table extends \Nette\Object
{

    /** @var Nette\Database\Context */
    protected $context;

    /** @var string */
    protected $tableName;
    
    /** @var string */
    protected $relatedTableName;

    /**
     * @param Nette\Database\Context $db
     * @throws \Nette\InvalidStateException
     */
    public function __construct(\Nette\Database\Context $db)
    {
        $this->context = $db;

        if ($this->tableName === NULL) {
            $class = get_class($this);
            throw new \Nette\InvalidStateException("Název tabulky musí být definován v $class::\$tableName.");
        }
    }
    
    public function getTableName()
    {
        return $this->tableName;
    }
    
    public function getConnection()
    {
        return $this->context;
    }
    
    /**
     * Vrací celou tabulku z databáze
     * @return \Nette\Database\Table\Selection
     */
    protected function getTable()
    {
        return $this->context->table($this->tableName);
    }
    
    /**
     * Vrací z databáze celou tabulku, která je v relaci s tabulkou tohoto modelu
     * @return \Nette\Database\Table\Selection
     */
    public function getRelatedTable()
    {
	if ($this->relatedTableName === NULL) {
            $class = get_class($this);
            throw new \Nette\InvalidStateException("Název relační tabulky není definován v $class::\$relatedTableName.");
        }
	
	return $this->context->table($this->relatedTableName);
    }
    
    /**
     * Vrací všechny záznamy z databáze
     * @return \Nette\Database\Table\Selection
     */
    public function findAll()
    {
        return $this->getTable();
    }

    /**
     * Vrací vyfiltrované záznamy na základě vstupního pole
     * (pole array('name' => 'David') se převede na část SQL dotazu WHERE name = 'David')
     * @param array $by
     * @return \Nette\Database\Table\Selection
     */
    public function findBy(array $by)
    {
        return $this->getTable()->where($by);
    }

    /**
     * To samé jako findBy akorát vrací vždy jen jeden záznam
     * @param array $by
     * @return \Nette\Database\Table\ActiveRow|FALSE
     */
    public function findOneBy(array $by)
    {
        return $this->findBy($by)->limit(1)->fetch();
    }

    /**
     * Vrací záznam s daným primárním klíčem
     * @param int $id
     * @return \Nette\Database\Table\ActiveRow|FALSE
     */
    public function findOneById($id)
    {
        return $this->findBy(array('id'=>$id))->limit(1)->fetch();
    }
    public function delete($id)
    {
        return $this->getTable()->where('id', $id)->delete();
    }
}