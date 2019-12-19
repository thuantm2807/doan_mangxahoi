function getPostByUserId(url, userId = null, page = 0) {
    $.ajax({
        url: url,
        data: {
            userId,
            page
        },
        method: "get",
        dataType: "json",
        success: function(data) {
            if (data.status) {
                var html = '';
                for (var i = 0; i < data.data.length; i++) {
                    html += "<div class=\"card shadow mb-4\">" +
                        "<div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">" +
                        "<h6 class=\"m-0 font-weight-bold text-primary\">" + data.data[i].name + " /<small>" + data.data[i].post_created_at + "</small></h6>" +
                        "<div class=\"dropdown no-arrow\">" +
                        "<a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">" +
                        "<i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>" +
                        "</a>" +
                        "<div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\" aria-labelledby=\"dropdownMenuLink\">" +
                        "<div class=\"dropdown-header\">Dropdown Header:</div>" +
                        "<a class=\"dropdown-item\" href=\"#\">Action</a>" +
                        "<a class=\"dropdown-item\" href=\"#\">Another action</a>" +
                        "<div class=\"dropdown-divider\"></div>" +
                        "<a class=\"dropdown-item\" href=\"#\">Something else here</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<div class=\"card-body\">" +
                        "<div >" +
                        data.data[i].description +
                        "</div>" +
                        "</div>" +
                        "</div>";
                }
                if (page == 0) {
                    $(".load-post").html(html);
                } else {
                    $(".load-post").append(html);
                }
            }
        },
        error: function() {
            toastr.error("Failed to get");
        }
    });
}


function save(url, form) {
    $.ajax({
        url: url,
        data: form,
        method: "post",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.status) {
                toastr.success("Saved successfully");
            }
        },
        error: function() {
            toastr.error("Failed to save");
        }
    })
}

function checkFriend(url ,userId, friendId) {
    if (userId == friendId) {
        return false;
    } else {
        var check = 0;
        $.ajax({
            async: false,
            url: url,
            method: "get",
            dataType: "json",
            data: {
                friendId
            },
            success: function(data) {
                if (data.status) {
                    check = data.data.follow;
                }
            }
        });
        var status = "Follow";
        var addClass = "btn-primary btn-create-friend";
        if (check == 1) {
            status = "Following";
            addClass = "btn-success btn-delete-friend";
        }

        var html = '<a href="#" class="d-none d-sm-inline-block btn btn-sm ' + addClass + ' shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>' + status + '</a>';
        $(".div-follow").html(html);
    }
}

function createAndDeleteFriend(token, url, friendId) {
    $.ajax({
        async: false,
        url: url,
        method: "post",
        dataType: "json",
        data: {
            _token:token,
            friendId
        },
        success: function(data) {
            if (data.status) {
                toastr.success(data.data.msg);
            }
        }
    });
}

