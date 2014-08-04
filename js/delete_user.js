$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                /*text: bender.langs.delete,*/
				text:'delete',
                click: function() {
                    window.location = bender.base_url + '?page=user&action=delete&id=' + bender.user.id  + '&secret=' + bender.user.secret;
                }
            },
            {
                 /* text: bender.langs.cancel,*/
			   text: 'cansel',
                click: function() {
                    $(this).dialog("close");
                }
            }
        ]
    });
});