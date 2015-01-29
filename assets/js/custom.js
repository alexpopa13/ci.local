function addNewUser() {
    $.ajax({
        url: "addNewUser",
    }).done(function (data) {
        console.log(data);
        $('.modal-content').html(data);
    });
}