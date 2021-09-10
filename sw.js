var cachename = 'idata_erp_v1';

var static_files = [
	//'public/libs/bootstrap-4.4.1/css/bootstrap.min.css',
	'public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css',
	'public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css',
	'public/vendor/adminlte/dist/css/AdminLTE.min.css',
	'public/libs/select2/select2.css',
	'public/libs/datatable/datatables.min.css',
	'public/vendor/adminlte/plugins/iCheck/square/blue.css',
	'public/vendor/adminlte/css/auth.css',
	'public/vendor/adminlte/vendor/jquery/dist/jquery.min.js',
	'public/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js',
	//'public/libs/bootstrap-4.4.1/js/bootstrap.min.js',
	'public/libs/select2/select2.min.js',
	'public/libs/datatable/datatables.min.js',
	'public/vendor/adminlte/plugins/iCheck/icheck.min.js',
	'public/vendor/adminlte/vendor/bootstrap/dist/fonts/glyphicons-halflings-regular.woff2',
	'public/vendor/adminlte/plugins/iCheck/square/blue.png',
	'public/vendor/adminlte/dist/js/adminlte.min.js',
	'public/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css',
	'public/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js',
];


self.addEventListener('install', function(event) {
	event.waitUntil(caches.open(cachename).then(function(cache) {
		return cache.addAll(static_files);
	}));
});

self.addEventListener('fetch', function(event) {
	event.respondWith(caches.match(event.request).then(function(response) {
		return response || fetch(event.request).then(function(response) {
			if(event.request.url.endsWith('.png') || event.request.url.endsWith('.jpg') || event.request.url.endsWith('.gif')) {
				return caches.open(cachename).then(function(cache) {
					cache.put(event.request, response.clone());
					return response;
				});
			} else {
				return response;
			}
		});
	}));
});