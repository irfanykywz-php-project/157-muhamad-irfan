let $table = $('#table'),
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
            field: 'user',
            title: 'User',
            sortable: true
        },
        {
            field: 'method',
            title: 'Method',
        },
        {
            field: 'destination',
            title: 'Destination',
        },
        {
            field: 'total',
            title: 'Total',
        },
        {
            field: 'status',
            title: 'Status',
            formatter: (row) => {
                let type;
                if (row == 'pending'){
                    type = 'text-bg-warning'
                }else if (row == 'reject'){
                    type = 'text-bg-danger'
                }else if (row == 'success'){
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
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

        // save your data, here just save the current page
        selections = getIdSelections()
        // push or splice the selections if you want to save all data selections
        console.log(selections);
    })

$remove.click(function () {
    // go ajax...
    // console.log(ids);
    $.ajax({
        type:"put",
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

    // $remove.prop('disabled', true)
})
