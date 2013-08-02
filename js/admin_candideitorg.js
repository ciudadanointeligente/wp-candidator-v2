// In case we forget to take out console statements. IE becomes very unhappy when we forget. Let's not make IE unhappy
if(typeof(console) === 'undefined') {
	var console = {};
	console.log = console.error = console.info = console.debug = console.warn = console.trace = console.dir = console.dirxml = console.group = console.groupEnd = console.time = console.timeEnd = console.assert = console.profile = function() {};
}

jQuery(document).ready(function($) {

	$('input[name="candideitv2_election_id"]').on('change', function(){
		var spin = '<img src="/wp-admin/images/wpspin_light.gif" alt="" id="canv2_loading">';

		$("#candideits_list").html(spin);
		$("#submit").attr('disabled',true);
		var data = {
			action : 'canv2_get_candidates',
			electionId : $(this).val(),
			username : $("#candideitv2_username").val(),
			apikey : $("#candideitv2_api_key").val()
		}

		$.post(ajaxurl, data, function(response){
			// console.log(response);
			$("#canv2_loading").hide();
			$('#candideits_list').html(response);
			$("#submit").attr('disabled',false);
		});

		return false;
	});

})