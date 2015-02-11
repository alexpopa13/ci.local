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

function updateUsersList(field, order, text) {
    text = text || "";
    var direction = (order == "fa-sort-asc") ? "desc" : "asc";
    $.ajax({
        url: "usersList",
        data: "&sortby=" + field + "&order=" + direction + "&text=" + text,
    }).done(function (data) {
        $('#usersTable').html(data);
        var classStr = $('#userListTable #' + field + " i").attr('class');
        $('#userListTable #' + field + " i").removeClass(classStr.substr(classStr.lastIndexOf(' ') + 1));
        $('#userListTable #' + field + " i").addClass((order === "fa-sort-asc") ? "fa-sort-desc" : "fa-sort-asc");
        $("#mainContent #search").val(text);
    });
}

$(document).ready(function () {
    $(document).tooltip();
    // Hide event for modal
    $('#user-list').on('hide.bs.modal', function () {
        $(this).removeData('bs.modal');
        updateUsersList("id", "fa-sort-desc", $("#search").val());
    });

    // Users list table header sort
    $("#mainContent").on("click", "th", function () {
        var classStr = $(this).find("i").attr('class');
        var lastClass = classStr.substr(classStr.lastIndexOf(' ') + 1);
        updateUsersList($(this).attr('id'), lastClass, $("#search").val());
    });

    $("#mainContent").find("#search").bind("change keyup", function () {
        updateUsersList('id', 'fa-sort-desc', $("#search").val());
    });
});
