
jQuery(document).ready(function() {
	jQuery('.alith-tab-item').click(function() {
		var me = jQuery(this);
		var current_tab = 'alith-current-item';
		var current_content = 'alith-current-content';

		if (!me.hasClass(current_tab)) {	
			var id_part = me.attr('id').split('-');
			var id = id_part[id_part.length - 1];
			
			jQuery('#alith-tab li').each(function() {
				var item = jQuery(this).find('a');
				if (item.hasClass(current_tab)) {
					item.removeClass(current_tab);
				}
			});
			me.addClass(current_tab);

			jQuery('#alith-content-wrapper .alith-tab-content').each( function() {
				var item = jQuery(this);
				if (item.hasClass(current_content)) {
					item.removeAttr('style');
					item.removeClass(current_content);
				}

				if (item.attr('id').indexOf(id) > -1) {
					item.fadeIn(300);
					item.addClass(current_content);
				}
			});
		}

		return false;
	});
});