/**
 * Category Tabber Widget
 */

jQuery(document).on('click', function(e) {
	var $this = jQuery(e.target);

	if ($this.is('#select-tab-toggle')) {
		
		$this.parent().next('#alith-select-tab').slideToggle();

	} else if ($this.is('#alith-option-toggle')) {
		
		$this.parent().next('#alith-option').slideToggle();

	} else if ($this.is('#add-tab')) {

		var html = $this.parent().next().next('#html-tab-wrapper').html();
		html = html.replace(/_sample/g, '');
		
		var $tab_list = $this.parent().next('#alith-tab-list');
		$tab_list.append('<li>' + html + '</li>');
	
	} else if ($this.is('.remove-tab')) {

		$this.closest('li').remove();

	} else {
		return true;
	}
	
	return false;
});