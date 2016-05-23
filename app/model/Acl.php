<?php
/**
 * Description of Acl
 *
 * @author zdeniiik
 */
namespace App;
use Nette\Security\Permission;

class Acl extends Permission
{
    public function __construct()
	{
		//roles
		$this->addRole('guest');
                $this->addRole('authenticated', 'guest');
                $this->addRole('spravce');
		$this->addRole('admin');
		
		// resources
                $this->addResource('administrace');//parent zdroj pro pristup do administrace
                $this->addResource('sprava-obsahu');//
               
		// privileges
                // pravidla ve tvaru allow/deny (role, zdroj, práva)
                //GUEST
                $this->deny("guest", "administrace",Permission::ALL);
                $this->deny("guest", "sprava-obsahu",Permission::ALL);
                //SPRAVCE
                $this->deny("spravce", "administrace",Permission::ALL);
                $this->allow("spravce", "sprava-obsahu",Permission::ALL);
                //ADMIN
                $this->allow('admin','administrace',Permission::ALL);
                $this->allow('admin','sprava-obsahu',Permission::ALL);
	}
}