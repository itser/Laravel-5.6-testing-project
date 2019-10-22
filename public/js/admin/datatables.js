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

    var employeesTable =  $('#employees-table').DataTable();

    $('body').on('keyup', '.filter-block input.filter-field', function (e) {
        searchByColumn($(this),employeesTable);
    });
});