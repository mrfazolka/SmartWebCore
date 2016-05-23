<?php
// source: C:\xampp\htdocs\hovno\app\components\SmartCmps\TextCmp/templates/default.latte

class Templatec11396129b386a4a46c5db519ce269b5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f302f32cd5', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb2a46b4edcb_content')) { function _lb2a46b4edcb_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($user->isAllowed("sprava-obsahu")) { ?>
        <div class="componentTextControlButtonWrap"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("edit!"), ENT_COMPAT) ?>
#<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($uniqueId), ENT_COMPAT) ?>" class="button ajax">Upravit</a></div>
	<div id="<?php echo Latte\Runtime\Filters::escapeHtml($cmpId."InlineEdit", ENT_COMPAT) ?>" contenteditable="true">
	    <?php echo $row->text ?>

	</div>
	<style>
	    .cke_top{
		display: none;
	    }
	</style>
	
	<script>
	    $(function () 
	    {
		//load js only once
		var src = "<?php echo $basePath ?>/assets/ckeditor/ckeditor.js";
		var len = $('script[src="'+src+'"]').length;
		//if there are no scripts that match, the load it
		if (len === 0) {
		    $('head').append('<script src="'+src+'"><\/script>');
		}

		// Turn off automatic editor creation first.
		CKEDITOR.disableAutoInline = true;
    //	    var obj = { toolbar : [
    //			    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    //			    { name: 'paragraph', groups: [ 'list' ], items: [ 'NumberedList', 'BulletedList' ] },
    //			    { name: 'links', items: [ 'Link', 'Unlink' ] },
    //			    { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
    //			    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    //			] };
    //	    var ck = CKEDITOR.inline( <?php echo Latte\Runtime\Filters::escapeJs($cmpId."InlineEdit") ?>, obj );

//		CKEDITOR.config.toolbar = [
    //			    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    //			]
		var lastSaveStatus = false;
		var ck = CKEDITOR.inline( <?php echo Latte\Runtime\Filters::escapeJs($cmpId."InlineEdit") ?> );
		ck.config.toolbar = [];
		ck.on( 'instanceReady', function( ev ) {
		    var editor = ev.editor;
		    editor.setReadOnly( false );

		    		    var bar = document.getElementById("cke_"+editor.name).getElementsByClassName("cke_top")[0];
		    bar.style.display = "none";

		    $("#"+editor.name).focusout(function() {
			$.nette.ajax({
			    type: 'POST',
			    url: <?php echo Latte\Runtime\Filters::escapeJs($_control->link("updateText!")) ?>,
			    data: {"textData": editor.getData()}
			  }).done(function() {
			      lastSaveStatus = true;
			  });
		    });
		    
//		    $("#"+editor.name).click(function() {
//			console.log("start edit", this.getElementsByClassName("cke_top")[0]);
//			this.getElementsByClassName("cke_top")[0].style.display = "none";
//		    });
		}); //end: ck.on( 'instanceReady', function( ev )
		
		ck.on( 'blur', function( ev ) {
		    return false;
		});
		
	    }); //end: $(function ()
	</script>
<?php } else { ?>
	<?php echo $row->text ?>

<?php } 
}}

//
// end of blocks
//

// template extending

$_l->extends = '../../BaseCmp/@layout.latte'; $_g->extended = TRUE;

if ($_l->extends) { ob_start(function () {});}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
// ?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}