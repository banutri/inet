$(document).ready(function () {
    // alert_bootstrap();
});


/// start function alert bootstrap
function alert_bootstrap() {
	
		$(".alert-danger").fadeTo(2500, 500).slideUp(500, function () {
			$(".alert-danger").slideUp(1000);
		});
	
		
		$(".alert-success").fadeTo(2500, 500).slideUp(500, function () {
			$(".alert-success").slideUp(1000);
		});
	

}
/// end alert