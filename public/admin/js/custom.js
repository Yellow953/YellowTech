// start auto dismiss
document.addEventListener("DOMContentLoaded", function () {
    function addAutoDismiss(alert) {
        setTimeout(function () {
            alert.style.display = "none";
        }, 5000);
    }

    var autoDismissAlerts = document.querySelectorAll(".auto-dismiss");
    autoDismissAlerts.forEach(function (alert) {
        addAutoDismiss(alert);
    });

    document.body.addEventListener("DOMNodeInserted", function (event) {
        if (
            event.target.classList &&
            event.target.classList.contains("auto-dismiss")
        ) {
            addAutoDismiss(event.target);
        }
    });
});
// end auto dismiss

// start delete confirmation
$(".show_confirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});
// end delete confirmation

// start select2
$(document).ready(function() {
    $('.select2').select2();
});
// end select2

$(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});

// start adjust sidenav scroll
document.addEventListener("DOMContentLoaded", function () {
    var activeElement = document.querySelector(".treeview.active");
    
    if (activeElement) {
        var sidebar = document.getElementById("sidenav-main");
        var sidebarRect = sidebar.getBoundingClientRect();
        var elementRect = activeElement.getBoundingClientRect();
    
        var offset =
            elementRect.top -
            sidebarRect.top -
            (sidebarRect.height - elementRect.height) / 2;
    
        sidebar.scrollTo({ top: offset, behavior: "smooth" });
    }
});
//   end adjust sidenav scroll