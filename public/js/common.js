function deletePackage(package_id) {

    if(confirm("Are you sure you want to delete this?")){

        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax(
            {
                type: 'POST',
                url: "/delete_package",
                data: {"_token":_token, "package_id": package_id}
                , success: function (result) {
                alert('deleted');
                location.reload();
            }
            })
    } else {
        return false;
    }
}