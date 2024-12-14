( function( api ) {

	// Extends our custom "boxing-martial-arts" section.
	api.sectionConstructor['boxing-martial-arts'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );