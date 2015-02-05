function addNewUser() {
    $.ajax({
        url: "addNewUser",
        type: "POST",
        data: $('#addNewUser').serialize(),
    }).done(function (data) {
        $('.modal-content').html(data);
    });
}

function editUser() {
    $.ajax({
        url: "editUser",
        type: "POST",
        data: $('#editUserPopup').serialize(),
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
    // Hide event for modal
    $('#user-list').on('hide.bs.modal', function () {
        $(this).removeData('bs.modal');
        updateUsersList("id", "fa-sort-desc")
    });

    // Users list table header sort
    $("#mainContent").on("click", "th", function () {
        var classStr = $(this).find("i").attr('class');
        var lastClass = classStr.substr(classStr.lastIndexOf(' ') + 1);
        updateUsersList($(this).attr('id'), lastClass);
    });
});
