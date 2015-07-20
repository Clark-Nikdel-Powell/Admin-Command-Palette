$(document).keydown( function(e) {

	// If ACP isn't open, stop processing
	if ( ! $('.admin-command-palette-modal').hasClass('open') ) {
		return;
	}

	// Get the pressed key
	var key = e.keyCode;
	// If pressed key was not Enter, Up, or Down, stop processing
	if ( key !== 13 && key !== 38 && key !== 40 ) {
		return;
	}

	// Remove input focus
	$('.admin-command-palette input[type=search]').blur();

	var $current;
	// Get items to traverse
	var $listItems = $('.acp-list li');
	// Get the currently selected item
	var $selected = $listItems.filter('.selected');
	// Get the index of the currently selected item
	var $selectedIndex = $listItems.index( $selected );

	if ( key === 13 ) { // ENTER

		// If no item is selected, stop processing
		if ( $selectedIndex === -1 ) {
			return;
		}

		// Process the selected item
		var $action = $selected.find('a').attr('href');
		window.location = $action;

		// Exit the function to stop processing
		return;

	} else if ( key === 38 ) { // UP

		e.preventDefault(); // Stop scrolling

		// If no item is selected, or the first item is
		// selected, select the last item
		// otherwise, decrement the index to traverse up the items
		if ( $selectedIndex === -1 || $selectedIndex === 0 ) {
			$current = $listItems.eq( $listItems.length - 1 );
		} else {
			$current = $listItems.eq($selectedIndex - 1);
		}

	} else if ( key === 40 ) { // DOWN

		e.preventDefault(); // Stop scrolling

		// If no item is selected, or the last item is
		// selected, select the first item
		// otherwise, increment the index to traverse down the items
		if ( $selectedIndex === -1 || $selectedIndex === $listItems.length - 1 ) {
			$current = $listItems.eq(0);
		} else {
			$current = $listItems.eq($selectedIndex + 1);
		}

	}

	// Remove the selected class
	$listItems.removeClass('selected');

	// Add the selected class to the newly selected item
	$current.addClass('selected');
});
