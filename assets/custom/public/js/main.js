$(function(){
    $.ajaxSetup({
	cache: true
    });

    //all ajax spinner
    var $loading = $('#ajax-spinner').hide();
    $(document)
      .ajaxStart(function () {
	$loading.show();
      })
      .ajaxStop(function () {
	$loading.hide();
      });
});
