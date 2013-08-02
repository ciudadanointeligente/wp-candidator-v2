// In case we forget to take out console statements. IE becomes very unhappy when we forget. Let's not make IE unhappy
if(typeof(console) === 'undefined') {
    var console = {};
    console.log = console.error = console.info = console.debug = console.warn = console.trace = console.dir = console.dirxml = console.group = console.groupEnd = console.time = console.timeEnd = console.assert = console.profile = function() {};
}

jQuery(document).ready(function($) {
    var spin = '<img src="/wp-admin/images/wpspin_light.gif" alt="" id="canv2_loading">';

    $('.candideit').on('click', function(){
        var data = {
        	action : 'get_front_candideit_data',
        	uri : $(this).data('candidate-uri'),
            cache : true
        }

        $(".candidate-info").html(spin);
        $.post(ajaxurl, data, function(response){
        	$('.candidate-info').html(response);
        });
    });

    $('.profile-candidate').on('click', function(){
        $('.profiles').attr('style','display:none');
    });

    $('.backto-candidates').live('click',function(){
        $('.profiles').attr('style','display:block');
        $('.candidate-info').html(''); 
    });

    $('.versus').live('click',function(e){
        e.preventDefault();

        var data = {
            action : 'get_front_candideit_select',
            cache : true,
            exclude_candidate_uri : $(this).data('candidate-uri')
        }

        $(this).parent().attr('class','span6'); 
        if( ! ($(this).parent().parent().find('.candidate-vs-two').length ) )
            $(this).parent().parent().append('<div class="span6 candidate-vs-two"></div>');

        $(".candidate-vs-two").html(spin);
        $.post(ajaxurl, data, function(response){
            $('.candidate-vs-two').html(response);
        });
    });

    $('select[name="select-candidate-uri"]').live('change', function(){
        
        if( $(this).val() != 0 ) {
            $(this).append(spin);

            var data = {
                action : 'get_data_candidate_vs',
                cache: true,
                candidate_uri : $(this).val()
            }

            $.post(ajaxurl, data, function(response){
                
                $('#canv2_loading').remove();
                if( !($('.information-about-candidate-vs').length) )
                    $('select[name="select-candidate-uri"]').parent().append(response);
                else{
                    $('.information-about-candidate-vs').remove();
                    $('select[name="select-candidate-uri"]').parent().append(response);
                }
            });
        } else
            return;
        
    })
})