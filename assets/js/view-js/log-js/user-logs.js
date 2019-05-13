$(function(){
    const user_log_tbl = $('#user_logs_tbl').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [ [5, 10, 15, 20, 25, 30 -1], [5, 10, 15, 20, 25, 30, "All"] ],
        pageLength: 5,
        searching: false,
        paging: false,
        info: false,
        ajax: {
            url: "http://localhost/Quiz/index.php/Dashboard/Administrator/getUserLogs",
            type: 'POST',
            dataType: 'json',
            dataSrc: ''
        },
        columnDefs:
        [
            { className: 'text-center', targets: [0], orderable: false, data: 'user_name' },
            { className: 'text-center', targets: [1], orderable: false, data: 'log_action' },
            { className: 'text-center', targets: [2], orderable: false, data: 'log_date' }
        ],
    });

    setInterval(() => {
        user_log_tbl.ajax.reload();
    }, 10000);
});