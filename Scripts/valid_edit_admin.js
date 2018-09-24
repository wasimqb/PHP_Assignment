function do_edit_admin(user_id) {
    $('span[id^="error"]').remove();
    var uid = user_id;
    var dept = $("#dept").val();
    var location = $("#location").val();
    
    if (dept != "" && location != "" ) {
        $.ajax
            ({
                type: 'post',
                url: 'update_admin.php?uid='+uid,
                data: {
                    do_edit_admin: "do_edit_admin",
                    dept: dept,
                    location: location
                },
                success: function (response) {
                            window.location.href = "home_admin.php?uid=" + response;
                }
            });
    }

    else {
        if (dept.length < 1) {
            $('#dept').after('<span id="errorUname" class="error">Department required</span>');
        }
        if (location.length < 1) {
            $('#location').after('<span id="errorUname" class="error">Location required</span>');
        }
    }
    return false;
};