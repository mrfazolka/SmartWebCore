<?php
// source: C:\xampp\htdocs\hovno\app\components\SmartCmps\TextCmp/templates/../../BaseCmp/@layout.latte

class Template5d37e111093a3ffc2f15b4fa6ae3b142 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('d9a870db9d', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block _smartCmpCont
//
if (!function_exists($_b->blocks['_smartCmpCont'][] = '_lba0d68c829c__smartCmpCont')) { function _lba0d68c829c__smartCmpCont($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('smartCmpCont', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>
	    <div class="flash <?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

	<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

	
	<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>

<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbfd2b656083_content')) { function _lbfd2b656083_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb4b80ffa63c_scripts')) { function _lb4b80ffa63c_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start(function () {});}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<div class="<?php echo Latte\Runtime\Filters::escapeHtml($kompName, ENT_COMPAT) ?>
" id="<?php echo Latte\Runtime\Filters::escapeHtml($uniqueId, ENT_COMPAT) ?>">
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); } ?>
<div id="<?php echo $_control->getSnippetId('smartCmpCont') ?>"><?php call_user_func(reset($_b->blocks['_smartCmpCont']), $_b, $template->getParameters()) ?>
</div></div><?php
}}