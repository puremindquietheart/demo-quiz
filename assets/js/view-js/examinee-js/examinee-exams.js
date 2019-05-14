$(function(){
    const examinee_id = $('#examinee_id').val();
    const user_exams_tbl = $('#user_assigned_exams_tbl').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [ [5, 10, 15, 20, 25, 30 -1], [5, 10, 15, 20, 25, 30, "All"] ],
        pageLength: 5,
        searching: false,
        paging: false,
        info: false,
        ajax: {
            url: "http://localhost/Quiz/index.php/Dashboard/Examinee/getAssignedUserExams",
            type: 'POST',
            data: 
            {
                examinee_id:examinee_id
            },
            dataType: 'json',
            dataSrc: ''
        },
        columnDefs:
        [
            { className: 'text-center', targets: [0], orderable: false },
            { className: 'text-center', targets: [1], orderable: false },
            { className: 'text-center', targets: [2], orderable: false }
        ],
        columns:
        [   
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
            { data: 'exam_id', 
                render: function (data, type, row, meta) {
                    return type === 'display' ?
                    '<button type="button" class="btn btn-success waves-effect take-exam waves-light" data-take_exam_id='+data+'> <i class="mdi mdi-rocket m-r-5"></i> <span>Take</span> </button>' : data;
                }
            },
        ],
        createdRow: function (row, data, dataIndex) {
            const take_exam = $(row).find('.take-exam');

            $(take_exam).on('click', function(){

                const take_exam_id = $(this).data('take_exam_id');

                swal({
                    title: "Exam",
                    text: "Do you wish to take this exam now?",
                    type: "warning",
                    buttons: true
                }).then((willTake) => {
                    if (willTake) {
                        $.ajax({
                            type: 'POST',
                            url: 'http://localhost/Quiz/index.php/Dashboard/Examinee/userTakeExam',
                            data:
                            {
                                take_exam_id:take_exam_id,
                                examinee_id:examinee_id
                            },
                            dataType: 'json',
                            success: function (result) {
                                if (result.success == true) {
                                    swal({
                                        title: 'Success!',
                                        text: "Exam Confirmed Successfully!",
                                        type: "success",
                                        closeOnEsc: false,
                                        closeOnClickOutside: false
                                    }).then(function() {
                                        window.location = "http://localhost/Quiz/index.php/Dashboard/Examinee/exam_proceed";
                                    });
                                }
                            }
                        });
                    }
                });
            });
        }
    });

    setInterval(() => {
        user_exams_tbl.ajax.reload();
    }, 10000);
});