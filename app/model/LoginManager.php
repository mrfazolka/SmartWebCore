<?php

namespace App\Model;

use Nette,
	Nette\Utils\Strings;


/**
 * Users management.
 */
class LoginManager extends Nette\Object implements Nette\Security\IAuthenticator
{
	const
		TABLE_NAME = 'uzivatele',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'login',
		COLUMN_PASSWORD_HASH = 'heslo';


	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		$password = self::removeCapsLock($password);

		$row = $this->database->table(self::TABLE_NAME)->where(self::COLUMN_NAME, $username)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);

		} elseif (!PasswordsManager::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);

		} elseif (PasswordsManager::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update(array(
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			));
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row->role->nazev, $arr);
	}

	/**
	 * Fixes caps lock accidentally turned on.
	 * @return string
	 */
	private static function removeCapsLock($password)
	{
		return $password === Strings::upper($password)
			? Strings::lower($password)
			: $password;
	}

}
