<?php
// source: C:\xampp\htdocs\SmartWebCore\app/config/config.neon 
// source: C:\xampp\htdocs\SmartWebCore\app/config/config.local.neon 

class Container_cf65bb5c43 extends Nette\DI\Container
{
	protected $meta = array(
		'types' => array(
			'Nette\Object' => array(
				array(
					'application.application',
					'application.linkGenerator',
					'database.default.connection',
					'database.default.structure',
					'database.default.context',
					'http.requestFactory',
					'http.request',
					'http.response',
					'http.context',
					'nette.template',
					'security.user',
					'session.session',
					'thumbnail.thumbnail',
					'modelKomponentz',
					'modelStranky',
					'29_App_Components_UniverzalItem_Model_UniverzalItems',
					'textyCmpForm',
					'textyCmpModel',
					'33_App_Acl',
					'34_App_Model_LoginManager',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'container',
				),
			),
			'Nette\Application\Application' => array(1 => array('application.application')),
			'Nette\Application\IPresenterFactory' => array(
				1 => array('application.presenterFactory'),
			),
			'Nette\Application\LinkGenerator' => array(1 => array('application.linkGenerator')),
			'Nette\Caching\Storages\IJournal' => array(1 => array('cache.journal')),
			'Nette\Caching\IStorage' => array(1 => array('cache.storage')),
			'Nette\Database\Connection' => array(
				1 => array('database.default.connection'),
			),
			'Nette\Database\IStructure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\Structure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\IConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Conventions\DiscoveredConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Context' => array(1 => array('database.default.context')),
			'Nette\Http\RequestFactory' => array(1 => array('http.requestFactory')),
			'Nette\Http\IRequest' => array(1 => array('http.request')),
			'Nette\Http\Request' => array(1 => array('http.request')),
			'Nette\Http\IResponse' => array(1 => array('http.response')),
			'Nette\Http\Response' => array(1 => array('http.response')),
			'Nette\Http\Context' => array(1 => array('http.context')),
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => array(1 => array('latte.latteFactory')),
			'Nette\Application\UI\ITemplateFactory' => array(1 => array('latte.templateFactory')),
			'Latte\Object' => array(array('nette.latte')),
			'Latte\Engine' => array(array('nette.latte')),
			'Nette\Templating\Template' => array(array('nette.template')),
			'Nette\Templating\ITemplate' => array(array('nette.template')),
			'Nette\Templating\IFileTemplate' => array(array('nette.template')),
			'Nette\Templating\FileTemplate' => array(array('nette.template')),
			'Nette\Mail\IMailer' => array(1 => array('mail.mailer')),
			'Nette\Application\IRouter' => array(1 => array('routing.router')),
			'Nette\Security\IUserStorage' => array(1 => array('security.userStorage')),
			'Nette\Security\User' => array(1 => array('security.user')),
			'Nette\Http\Session' => array(1 => array('session.session')),
			'Tracy\ILogger' => array(1 => array('tracy.logger')),
			'Tracy\BlueScreen' => array(1 => array('tracy.blueScreen')),
			'Tracy\Bar' => array(1 => array('tracy.bar')),
			'Kollarovic\Thumbnail\AbstractGenerator' => array(1 => array('thumbnail.thumbnail')),
			'Kollarovic\Thumbnail\Generator' => array(1 => array('thumbnail.thumbnail')),
			'App\Model\Table' => array(
				1 => array(
					'modelKomponentz',
					'modelStranky',
					'29_App_Components_UniverzalItem_Model_UniverzalItems',
					'textyCmpModel',
				),
			),
			'App\Components\BaseStandardCmp\Model\Komponenty' => array(1 => array('modelKomponentz')),
			'App\Components\BaseStandardCmp\Model\Stranky' => array(1 => array('modelStranky')),
			'App\Components\UniverzalItem\Model\UniverzalItems' => array(
				1 => array(
					'29_App_Components_UniverzalItem_Model_UniverzalItems',
				),
			),
			'App\Forms\AbstractFormFactory' => array(1 => array('textyCmpForm')),
			'App\Components\TextCmp\Forms\TextFormFactory' => array(1 => array('textyCmpForm')),
			'App\Components\BaseCmp\BaseCmpFactory' => array(1 => array('textCmp')),
			'App\Components\TextCmp\TextCmpFactory' => array(1 => array('textCmp')),
			'App\Components\TextDbParamCmp\Model\Texty' => array(1 => array('textyCmpModel')),
			'Nette\Security\Permission' => array(1 => array('33_App_Acl')),
			'Nette\Security\IAuthorizator' => array(1 => array('33_App_Acl')),
			'App\Acl' => array(1 => array('33_App_Acl')),
			'Nette\Security\IAuthenticator' => array(1 => array('34_App_Model_LoginManager')),
			'App\Model\LoginManager' => array(1 => array('34_App_Model_LoginManager')),
			'App\RouterFactory' => array(1 => array('35_App_RouterFactory')),
			'App\AdminModule\Presenters\BasePresenter' => array(array('application.1', 'application.2')),
			'App\Presenters\BasePresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'App\Presenters\BaseSmartCmpPresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\UI\Presenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\UI\Control' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\UI\PresenterComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\ComponentModel\Container' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\ComponentModel\Component' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\UI\IRenderable' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\ComponentModel\IContainer' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\ComponentModel\IComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\UI\ISignalReceiver' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\UI\IStatePersistent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'ArrayAccess' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.5',
					'application.6',
				),
			),
			'Nette\Application\IPresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
				),
			),
			'App\AdminModule\Presenters\HomepagePresenter' => array(array('application.1')),
			'App\AdminModule\Presenters\ItemsPresenter' => array(array('application.2')),
			'App\Presenters\Error4xxPresenter' => array(array('application.3')),
			'App\Presenters\ErrorPresenter' => array(array('application.4')),
			'App\Presenters\HomepagePresenter' => array(array('application.5')),
			'App\Presenters\SignPresenter' => array(array('application.6')),
			'NetteModule\ErrorPresenter' => array(array('application.7')),
			'NetteModule\MicroPresenter' => array(array('application.8')),
			'Nette\DI\Container' => array(1 => array('container')),
		),
		'services' => array(
			'29_App_Components_UniverzalItem_Model_UniverzalItems' => 'App\Components\UniverzalItem\Model\UniverzalItems',
			'33_App_Acl' => 'App\Acl',
			'34_App_Model_LoginManager' => 'App\Model\LoginManager',
			'35_App_RouterFactory' => 'App\RouterFactory',
			'application.1' => 'App\AdminModule\Presenters\HomepagePresenter',
			'application.2' => 'App\AdminModule\Presenters\ItemsPresenter',
			'application.3' => 'App\Presenters\Error4xxPresenter',
			'application.4' => 'App\Presenters\ErrorPresenter',
			'application.5' => 'App\Presenters\HomepagePresenter',
			'application.6' => 'App\Presenters\SignPresenter',
			'application.7' => 'NetteModule\ErrorPresenter',
			'application.8' => 'NetteModule\MicroPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'container' => 'Nette\DI\Container',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'modelKomponentz' => 'App\Components\BaseStandardCmp\Model\Komponenty',
			'modelStranky' => 'App\Components\BaseStandardCmp\Model\Stranky',
			'nette.latte' => 'Latte\Engine',
			'nette.template' => 'Nette\Templating\FileTemplate',
			'routing.router' => 'Nette\Application\IRouter',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'textCmp' => 'App\Components\TextCmp\TextCmpFactory',
			'textyCmpForm' => 'App\Components\TextCmp\Forms\TextFormFactory',
			'textyCmpModel' => 'App\Components\TextDbParamCmp\Model\Texty',
			'thumbnail.thumbnail' => 'Kollarovic\Thumbnail\Generator',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
		),
		'tags' => array(
			'inject' => array(
				'application.1' => TRUE,
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
				'application.8' => TRUE,
			),
			'nette.presenter' => array(
				'application.1' => 'App\AdminModule\Presenters\HomepagePresenter',
				'application.2' => 'App\AdminModule\Presenters\ItemsPresenter',
				'application.3' => 'App\Presenters\Error4xxPresenter',
				'application.4' => 'App\Presenters\ErrorPresenter',
				'application.5' => 'App\Presenters\HomepagePresenter',
				'application.6' => 'App\Presenters\SignPresenter',
				'application.7' => 'NetteModule\ErrorPresenter',
				'application.8' => 'NetteModule\MicroPresenter',
			),
		),
		'aliases' => array(
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'C:\xampp\htdocs\SmartWebCore\app',
			'wwwDir' => 'C:\xampp\htdocs\SmartWebCore\www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array('class' => NULL, 'parent' => NULL),
			'tempDir' => 'C:\xampp\htdocs\SmartWebCore\app/../temp',
			'thumbnail' => array(
				'thumbPathMask' => 'images/app/thumbs/{filename}-{width}x{height}.{extension}',
			),
		));
	}


	/**
	 * @return App\Components\UniverzalItem\Model\UniverzalItems
	 */
	public function createService__29_App_Components_UniverzalItem_Model_UniverzalItems()
	{
		$service = new App\Components\UniverzalItem\Model\UniverzalItems($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Acl
	 */
	public function createService__33_App_Acl()
	{
		$service = new App\Acl;
		return $service;
	}


	/**
	 * @return App\Model\LoginManager
	 */
	public function createService__34_App_Model_LoginManager()
	{
		$service = new App\Model\LoginManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\RouterFactory
	 */
	public function createService__35_App_RouterFactory()
	{
		$service = new App\RouterFactory;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\AdminModule\Presenters\HomepagePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\ItemsPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\AdminModule\Presenters\ItemsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\Error4xxPresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\Presenters\Error4xxPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return App\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\Presenters\HomepagePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\SignPresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new App\Presenters\SignPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return NetteModule\ErrorPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return NetteModule\MicroPresenter
	 */
	public function createServiceApplication__8()
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('routing.router'));
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication__application()
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('application.presenterFactory')));
		return $service;
	}


	/**
	 * @return Nette\Application\LinkGenerator
	 */
	public function createServiceApplication__linkGenerator()
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'), $this->getService('http.request')->getUrl(),
			$this->getService('application.presenterFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\IPresenterFactory
	 */
	public function createServiceApplication__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, 'C:\xampp\htdocs\SmartWebCore\app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping(array(
			'*' => 'App\*Module\Presenters\*Presenter',
		));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\FileJournal('C:\xampp\htdocs\SmartWebCore\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\xampp\htdocs\SmartWebCore\app/../temp/cache', $this->getService('cache.journal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default__connection()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=smartweb', 'root', NULL, array('lazy' => TRUE));
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'), $this->getService('database.default.structure'),
			$this->getService('database.default.conventions'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Database\Conventions\DiscoveredConventions
	 */
	public function createServiceDatabase__default__conventions()
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	/**
	 * @return Nette\Database\Structure
	 */
	public function createServiceDatabase__default__structure()
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceHttp__context()
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttp__request()
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'http.request\', value returned by factory is not Nette\Http\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceHttp__requestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttp__response()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceLatte__latteFactory()
	{
		return new Container_cf65bb5c43_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
	}


	/**
	 * @return Nette\Application\UI\ITemplateFactory
	 */
	public function createServiceLatte__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('security.user'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Mail\IMailer
	 */
	public function createServiceMail__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return App\Components\BaseStandardCmp\Model\Komponenty
	 */
	public function createServiceModelKomponentz()
	{
		$service = new App\Components\BaseStandardCmp\Model\Komponenty($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Components\BaseStandardCmp\Model\Stranky
	 */
	public function createServiceModelStranky()
	{
		$service = new App\Components\BaseStandardCmp\Model\Stranky($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Latte\Engine;
		trigger_error('Service nette.latte is deprecated, implement Nette\Bridges\ApplicationLatte\ILatteFactory.',
			16384);
		$service->setTempDirectory('C:\xampp\htdocs\SmartWebCore\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createServiceNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		trigger_error('Service nette.template is deprecated.', 16384);
		$service->registerFilter($this->getService('latte.latteFactory')->create());
		$service->registerHelperLoader('Nette\Templating\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouting__router()
	{
		$service = $this->getService('35_App_RouterFactory')->createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'routing.router\', value returned by factory is not Nette\Application\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceSecurity__user()
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('34_App_Model_LoginManager'),
			$this->getService('33_App_Acl'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	/**
	 * @return Nette\Security\IUserStorage
	 */
	public function createServiceSecurity__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession__session()
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return App\Components\TextCmp\TextCmpFactory
	 */
	public function createServiceTextCmp()
	{
		$service = new App\Components\TextCmp\TextCmpFactory($this->getService('textyCmpModel'), $this->getService('textyCmpForm'));
		return $service;
	}


	/**
	 * @return App\Components\TextCmp\Forms\TextFormFactory
	 */
	public function createServiceTextyCmpForm()
	{
		$service = new App\Components\TextCmp\Forms\TextFormFactory($this->getService('textyCmpModel'));
		return $service;
	}


	/**
	 * @return App\Components\TextDbParamCmp\Model\Texty
	 */
	public function createServiceTextyCmpModel()
	{
		$service = new App\Components\TextDbParamCmp\Model\Texty($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return Kollarovic\Thumbnail\Generator
	 */
	public function createServiceThumbnail__thumbnail()
	{
		$service = new Kollarovic\Thumbnail\Generator('C:\xampp\htdocs\SmartWebCore\www', $this->getService('http.request'),
			'images/thumbs/{width}x{height}/{filename}-{width}x{height}.{extension}', 'http://path/images/noimg.jpg');
		return $service;
	}


	/**
	 * @return Tracy\Bar
	 */
	public function createServiceTracy__bar()
	{
		$service = Tracy\Debugger::getBar();
		if (!$service instanceof Tracy\Bar) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.bar\', value returned by factory is not Tracy\Bar type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\BlueScreen
	 */
	public function createServiceTracy__blueScreen()
	{
		$service = Tracy\Debugger::getBlueScreen();
		if (!$service instanceof Tracy\BlueScreen) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.blueScreen\', value returned by factory is not Tracy\BlueScreen type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\ILogger
	 */
	public function createServiceTracy__logger()
	{
		$service = Tracy\Debugger::getLogger();
		if (!$service instanceof Tracy\ILogger) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.logger\', value returned by factory is not Tracy\ILogger type.');
		}
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		Nette\Reflection\AnnotationsParser::setCacheStorage($this->getByType("Nette\Caching\IStorage"));
		Nette\Reflection\AnnotationsParser::$autoRefresh = TRUE;
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
	}

}



final class Container_cf65bb5c43_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{
	private $container;


	public function __construct(Container_cf65bb5c43 $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\xampp\htdocs\SmartWebCore\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		$service->addFilter('thumbnail', array(
			$this->container->getService('thumbnail.thumbnail'),
			'thumbnail',
		));
		return $service;
	}

}
