<?php

class LatteMacros extends Latte\Macros\MacroSet
{    
    public static function install(Latte\Compiler $compiler)
    {
        $me = new static($compiler);
        $me->addMacro('myMacro', array($me, 'testMacro'));
	$me->addMacro('cmp', array($me, 'macroMyControl'));
    }
    
    public function testMacro(Latte\MacroNode $node, \Latte\PhpWriter $writer)
    {
	return 'echo "test macro ahoj :)))";';
    }
    
    public function macroMyControl(Latte\MacroNode $node, \Latte\PhpWriter $writer)
    {
	    $words = $node->tokenizer->fetchWords();
	    if (!$words) {
		    throw new CompileException('Missing control name in {control}');
	    }
	    
	    $cmpName = $words[0];
	    $paramsStr = $writer->formatArray();
//	    dump($words, $cmpName, $paramsStr);
//	    $params = eval("return $paramsStr;");
//	    dump($params);
	    
	    ///del
	    $name = $writer->formatWord($words[0]);
	    $method = isset($words[1]) ? ucfirst($words[1]) : '';
	    $method = Nette\Utils\Strings::match($method, '#^\w*\z#') ? "render$method" : "{\"render$method\"}";
	    $param = $writer->formatArray();
	    if (!Nette\Utils\Strings::contains($node->args, '=>')) {
		    $param = substr($param, $param[0] === '[' ? 1 : 6, -1); // removes array() or []
	    }
	    ///
	    $returnStr = ($name[0] === '$' ? "if (is_object($name)) \$_l->tmp = $name; else " : '')
			 . '$_l->tmp = $_control->getComponent(' . $name . '); ';
	    
	    $returnStr.=    "\$_l->tmp->staticParams=$paramsStr; "; //$_l->tmp je objekt komponenty
//	    foreach($params as $paramName=>$paramVal)
//		$returnStr.=    "\$_l->tmp->$paramName=$paramVal; "; //$_l->tmp je objekt komponenty
	    
	    $returnStr.= 'if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); '
			 . ($node->modifiers === '' ? "\$_l->tmp->$method($param)" : $writer->write("ob_start(); \$_l->tmp->$method($param); echo %modify(ob_get_clean())"));
	    
	    return $returnStr;
    }
}