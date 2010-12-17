/**
 * Store and namespace base functions used sitewide.
 */

//Create the Kumutu namespace WA
if (WA == null || typeof(WA) != "object") { var WA = new Object();}

/**
 * Convenience base URL for ajax calls.
 */
WA.baseUrl = location.protocol+'//'+location.hostname;

/**
 * Handle ajax errors site wide.
 * 
 * Possible error codes include:
 * 400 : Bad Request, general use when request cannot be handled by the server
 * 403 : Forbidden, authorisation denied
 * 408 : Request Timeout, timeout on the server
 * 409 : Conflict, exception thrown or similar server side error
 * 500 : Internal Server Error, error server side
 */
WA.ajaxFailureHandler = function() {
	
	//Handling any ajax errors
	$("#ajax-error-dialog").ajaxError(function(event, XMLHttpRequest, ajaxOptions, thrownError){

		 if (XMLHttpRequest.status == '409' || XMLHttpRequest.status == '403') {
		 
		   //Unbind ajaxStop
		   $(this).unbind('ajaxStop');
		 
		   //Use the ajax-error message dialog to display an error
		   $('#ajax-error-response', this).text(XMLHttpRequest.responseText);
		
		   $(this).dialog({
				bgiframe: true,
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		   $(this).dialog('open');
		 }
	});
};


$(document).ready(function(){
	WA.ajaxFailureHandler();
});