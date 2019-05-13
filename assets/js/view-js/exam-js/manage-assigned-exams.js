$(function(){
    const assigned_exam_tbl = $('#user_assigned_tbl').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [ [5, 10, 15, 20, 25, 30 -1], [5, 10, 15, 20, 25, 30, "All"] ],
        pageLength: 5,
        searching: false,
        paging: false,
        info: false,
        ajax: {
            url: "http://localhost/Quiz/index.php/Dashboard/Administrator/getUserExams",
            type: 'POST',
            dataType: 'json',
            dataSrc: ''
        },
        columnDefs:
        [
            { className: 'text-center', targets: [0], orderable: false },
            { className: 'text-center', targets: [1], orderable: false },
            { className: 'text-center', targets: [2], orderable: false },
            { className: 'text-center', targets: [3], orderable: false },
            { className: 'text-center', targets: [4], orderable: false },
            { className: 'text-center', targets: [5], orderable: false }
        ],
        columns:
        [   
            { data: 'user_name' },
            { data: 'exam_name' },
            { data: 'exam_type',  
                render: function (data, type, row, meta){
                    if (data == 1) {
                        return 'Mathematics';
                    } else {
                        return 'English';
                    }
                }
            },
            { data: 'is_taken',  
                render: function (data, type, row, meta){
                    if (data == 1) {
                        return 'Exam Taken';
                    } else {
                        return 'Pending';
                    }
                }
            },
            { data: 'is_passed',  
                render: function (data, type, row, meta){
                    if (data == 1) {
                        return 'Passed';
                    } else if (data == 2) {
                        return 'Failed';
                    }
                }
            },
            { data: 'with_prize', 
                render: function (data, type, row, meta){
                    if (data == 1) {
                        return 'You received a chocolate!';
                    } else if (data == 2) {
                        return 'You received a candy!';
                    }
                }
            }
        ]
    });

    // setInterval(() => {
    //     assigned_exam_tbl.ajax.reload();
    // }, 10000);
}); 