function flamboya_add_class(){
	if(jQuery( "#theflamboyaplayerid" ).hasClass( "fap-open" )){
		jQuery('.container').addClass('flamboya_player_open');
	} else {
		jQuery('.container').removeClass('flamboya_player_open');
	}
}