@if (in_array(Request::route()->getName(), Helper::get_muliple_select_routes()))
<script>
    // Start multiple selection form
    function setAction(action){
        var form = document.getElementById('multipleSelectionForm');
        var actionInput = document.getElementById('action');
        actionInput.value = action;
        form.submit();
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('checkAll').addEventListener('click', function() {
            let checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    });
    // End multiple selection form
</script>
@endif