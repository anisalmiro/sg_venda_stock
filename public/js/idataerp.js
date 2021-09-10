
var path = (
		typeof window.location.pathname.split('/')[1] != "undefined" &&
		window.location.pathname.split('/')[1] != ""
	) ? window.location.pathname.split('/')[1] : "";

var sw_path = (path) ? '/' + path + '/sw.js' : 'sw.js';

if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register(sw_path).then(function(registration) {
		/* Service worker registado com successo!!! */
	
	}).catch(function(error) {
		console.log("Failed to register service-worker, due to: ", error);
	});
}