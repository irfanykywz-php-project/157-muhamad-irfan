let $table = $('#table'),
    $update = $('#update'),
    $remove = $('#remove'),
    selections = [];

$table.bootstrapTable({
    toolbar: '#toolbar',
    showRefresh: true,
    search: true,
    sidePagination: 'server',
    pagination: true,
    checkboxHeader: true,
    clickToSelect: true,
    // showPaginationSwitch: true,
    pageList: '[10, 25, 50, 100, all]',
    idField: 'id',
    sortName: 'id',
    sortOrder: 'DESC',
    responseHandler: (res) => {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.id, selections) !== -1
        })
        return res
    },
    columns: [
        {
            field: 'state',
            checkbox: true,
        },
        {
            field: 'id',
            title: '#'
        },
        {
            field: 'name',
            title: 'Name',
            sortable: true
        },
        {
            field: 'total_files',
            title: 'Total Files'
        },
        {
            field: 'status',
            title: 'Status',
            formatter: (row) => {
                let type;
                if (row == 'banned'){
                    type = 'text-bg-danger'
                }else if (row == 'active'){
                    type = 'text-bg-success'
                }
                return `<span class="badge ${type}">${row}</span>`;
            }
        },
    ],
});

function getIdSelections() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
        return row.id
    })
}

$table.on('check.bs.table uncheck.bs.table ' +
    'check-all.bs.table uncheck-all.bs.table',
    function () {
        $update.prop('disabled', !$table.bootstrapTable('getSelections').length)
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

        // save your data, here just save the current page
        selections = getIdSelections()
        // push or splice the selections if you want to save all data selections
        console.log(selections);
    })

$(".update").click(function () {
    $.ajax({
        type:"put",
        url: $update.data('url'),
        data: {ids: selections, status:$(this).data('status')},
        dataType:"json",
        cache:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (response) => {
            $table.bootstrapTable('refresh');
        },
        error: (xhr, status, err) => {
            alert(err + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    })

})

$remove.click(function () {
    $.ajax({
        type:"delete",
        url: $remove.data('url'),
        data: {ids: selections},
        dataType:"json",
        cache:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (response) => {
            $table.bootstrapTable('refresh');
        },
        error: (xhr, status, err) => {
            alert(err + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    })

    $remove.prop('disabled', true)
    $update.prop('disabled', true)
})
