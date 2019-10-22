function searchByColumn(filterField, table){
    if (typeof filterField.data('column_number') !== 'undefined') {
        var column_number = filterField.data('column_number');
    } else {
        var row = filterField.parent().parent();
        var column_number = row.index();
    }

    table
        .columns(column_number)
        .search(filterField.val())
        .draw();
}

$(document).ready(function () {
    //disable filtering by click on search field
    $('.filter-block input.filter-field', 'body').on('click', function(e) {
        e.stopPropagation();
    });
    $('.filter-block select.filter-field', 'body').on('click', function(e) {
        e.stopPropagation();
    });

    var employeesTable =  $('#employees-table').DataTable({
        processing: true,
        dom: '<"top">rt<"bottom"lip><"clear">',
        language: {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
        },
        "columnDefs": [
            {
                "targets": [5],
                "sorting": false
            },
            {
                "targets": [6],
                "visible": false,
            },
        ]
    });

    $('body').on('keyup', '.filter-block input.filter-field', function (e) {
        searchByColumn($(this),employeesTable);
    });

    $('body').on('change', '.filter-block select.filter-field', function (e) {
        searchByColumn($(this),employeesTable);
    });
});