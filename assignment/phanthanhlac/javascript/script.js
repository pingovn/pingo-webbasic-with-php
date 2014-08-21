function submitForm(action, userId) {
    // Submit form here
    var form = document.getElementById("actionForm");
    var linkView = document.getElementById("link_view");
    var linkEdit = document.getElementById("link_edit");
    var linkDelete = document.getElementById("link_delete");
    linkView.value = userId;
    linkEdit.value = userId;
    linkDelete.value = userId;
    form.action = action;
    if (action == "delete_user.php") {
        return confirm('Are you sure to delete this user?');
    }
    form.submit();
    return false;

}