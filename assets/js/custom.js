function addNewUser(method) {
    $.ajax({
        url: "addNewUser",
        type: (method == "get") ? "GET" : "POST",
        data: (method == "get") ? "" : $('#addNewUser').serialize(),
    }).done(function (data) {
        $('.modal-content').html(data);
    });
}

function updateUsersList(field, order) {
    var direction = (order == "fa-sort-asc") ? "desc" : "asc";
    $.ajax({
        url: "usersList",
        data: "&sortby=" + field + "&order=" + direction,
    }).done(function (data) {
        $('#mainContent').html(data);
        var classStr = $('#userListTable #' + field + " i").attr('class');
        $('#userListTable #' + field + " i").removeClass(classStr.substr(classStr.lastIndexOf(' ') + 1));
        $('#userListTable #' + field + " i").addClass((order === "fa-sort-asc") ? "fa-sort-desc" : "fa-sort-asc");
    });
}

$(document).ready(function () {
// On close modal, trigger the hide event
//    $('#mainContent').on("click", "#closemodal", function () {
//        console.log("aaa");
//        $('#user-list').modal('hide');
////        location.reload();
//    });
    // Hide event for modal
    $('#user-list').on('hide.bs.modal', function () {
        console.log("bbb");
        addNewUser("get");
        // location.reload();
    });

    // Users list table header sort
    $("#mainContent").on("click", "th", function () {
        var classStr = $(this).find("i").attr('class');
        var lastClass = classStr.substr(classStr.lastIndexOf(' ') + 1);
        updateUsersList($(this).attr('id'), lastClass);
    });
});
