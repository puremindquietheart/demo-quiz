$(function(){
    const exam_list_tbl = $('#exam_list_tbl').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [ [5, 10, 15, 20, 25, 30 -1], [5, 10, 15, 20, 25, 30, "All"] ],
        pageLength: 5,
        searching: false,
        paging: false,
        info: false,
        ajax: {
            url: "http://localhost/Quiz/index.php/Dashboard/Administrator/getExams",
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
            { className: 'text-center', targets: [4], orderable: false }
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
                    '<button type="button" class="btn btn-warning waves-effect add-question waves-light" data-question_exam_id='+data+'> <i class="mdi mdi-comment-question-outline m-r-5"></i> <span>Add Question</span> </button>' : data;
                }
            },
            { data: 'exam_id',
                render: function (data, type, row, meta) {
                    return type === 'display' ?
                    '<button type="button" class="btn btn-primary waves-effect edit-exam waves-light" data-edit_exam_id='+data+'> <i class="mdi mdi-tooltip-edit m-r-5"></i> <span>Edit</span> </button>' : data;
                }
            },
            { data: 'eq_exam_id', data: 'exam_id',
                render: function (data, type, row, meta) {
                    if (row.eq_exam_id == null) {
                        return '<button type="button" class="btn btn-info assign-exam" disabled> <i class="mdi mdi-file-send m-r-5"></i> <span>Assign To</span> </button>';
                    } else {
                        return '<button type="button" class="btn btn-info assign-exam" data-exam_id='+row.exam_id+'> <i class="mdi mdi-file-send m-r-5"></i> <span>Assign To</span> </button>';
                    }
                   
                }
            },
        ],
        createdRow: function (row, data, dataIndex) {
            const add_question = $(row).find('.add-question');
            const edit_exam_details = $(row).find('.edit-exam');
            const assign_user_exam = $(row).find('.assign-exam');
            
            $(add_question).on('click', function(){
                $('#add_exam_question').modal('show');
                const question_exam_id = $(this).data('question_exam_id');
                $('#question_exam_id').val(question_exam_id);
            });

            // GET CONTAINER NUMBER
            $(edit_exam_details).on('click', function(){

                $('#edit_exam_modal').modal('show');

                $('#edit_select_exam_type').select2();

                const edit_exam_id = $(this).data('edit_exam_id');

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/getExamDetails',
                    data:
                    {
                        edit_exam_id:edit_exam_id
                    },
                    dataType: 'json',
                    success: (result) => {
                        $('#edit_exam_id').val(result[0].exam_id);
                        $('#edit_exam_name').val(result[0].exam_name);
                        $('#edit_select_exam_type').val(result[0].exam_type).trigger('change');
                        $('#edit_selected_exam_type').val(result[0].exam_type).trigger('change');
                    }
                });
            });

            $(assign_user_exam).on('click', function(){
                $('#assign_exam_modal').modal('show');
                
                $('#select_examinee').select2();

                const get_exam_id = $(this).data('exam_id');

                $('#assign_exam_id').val(get_exam_id);

                console.log(get_exam_id);
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/getExaminee',
                    dataType: 'json',
                    success: (result) => {
                        $('#select_examinee').empty();

                        $('#select_examinee').append('<option value="0" selected disabled readonly>Please Select Examinee</option>');

                        $.each(result, function(i, v){
                            $('#select_examinee').append('<option value='+v.user_id+'>'+v.user_name+'</option>');
                        });

                        $('#select_examinee').on('change', function(){
                            $('#selected_examinee').val($('#select_examinee option:selected').val());
                        });
                    }
                });
            });
        }
    });

    $('#new_exam').on('click', () => {
        $('#add_exam_modal').modal('show');
        $('#select_exam_type').select2();

        $('#select_exam_type').on('change', () => {
            $('#selected_exam_type').val($('#select_exam_type option:selected').val());
        });
    });

    $('#add_exam_modal').on('hidden.bs.modal', () => {
        $('#input_new_exam').val('');
        $('#select_exam_type').val(0);
        $('#selected_exam_type').val('');
    });

    $('#assign_exam_modal').on('hidden.bs.modal', () => {
        $('#selected_examinee').val('');
        $('#select_examinee').val(0);
    });

    $('#save_new_exam_btn').on('click', (e) => {
        e.preventDefault();

        const input_new_exam = $('#input_new_exam').val();
        const selected_exam_type = $('#selected_exam_type').val();

        if (input_new_exam == "" || input_new_exam == "0") {
            swal({
                title: 'Required',
                text: 'Exam name input is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (selected_exam_type == "" || selected_exam_type == "0") {
            swal({
                title: 'Required',
                text: 'Select exam type is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/newExam',
                data:
                {
                    input_new_exam:input_new_exam,
                    selected_exam_type:selected_exam_type
                }, 
                dataType: 'json',
                success: (result) => {
                    if (result.success == true) {
                        $('#add_exam_modal').modal('hide');
                        swal({
                            title: 'Success!',
                            text: 'New exam was created!',
                            type: 'success'
                        }).then(() => {
                            $('#message_success').css('display', 'block');
                            $('#success_text').text(result.message);

                            setTimeout(() => {
                                $('#message_success').fadeOut();
                            }, 3500);

                            exam_list_tbl.ajax.reload();
                        });
                        
                    } else if (result.success == false) {
                        swal({
                            title: 'Exist!',
                            text: 'Exam Name Already Exist!',
                            type: 'warning'
                        }).then(() => {
                            $('#input_new_exam').val('');
                        });
                    }
                }
            });
        }
    });

    $('#confirm_exam_question_btn').on('click', (e) => {
        e.preventDefault();
        // exam id
        const question_exam_id = $('#question_exam_id').val();
        // question details
        const input_question = $('#input_question').val();
        const input_answer_a = $('#input_answer_a').val();
        const input_answer_b = $('#input_answer_b').val();
        const input_answer_c = $('#input_answer_c').val();
        const input_answer_d = $('#input_answer_d').val();
        const correct_answer = $('#correct_answer').val();

        if (input_question == "" || input_question == "0") {
            swal({
                title: 'Required',
                text: 'Question field is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (input_answer_a == "" || input_answer_a == "0") {
            swal({
                title: 'Required',
                text: 'Input Answer A is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (input_answer_b == "" || input_answer_b == "0") {
            swal({
                title: 'Required',
                text: 'Input Answer B is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (input_answer_c == "" || input_answer_c == "0") {
            swal({
                title: 'Required',
                text: 'Input Answer C is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (input_answer_d == "" || input_answer_d == "0") {
            swal({
                title: 'Required',
                text: 'Input Answer D is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (correct_answer == "" || correct_answer == "0") {
            swal({
                title: 'Required',
                text: 'Correct Answer field is Empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/newQuestion',
                data:
                {
                    // exam id
                    question_exam_id:question_exam_id,
                    // exam details
                    input_question:input_question,
                    input_answer_a:input_answer_a,
                    input_answer_b:input_answer_b,
                    input_answer_c:input_answer_c,
                    input_answer_d:input_answer_d,
                    correct_answer:correct_answer
                },
                dataType: 'json',
                success: (result) => {
                    if (result.success == true) {
                        $('#add_exam_question').modal('hide');
                        swal({
                            title: 'Success!',
                            text: 'New question was created!',
                            type: 'success'
                        }).then(() => {
                            $('#message_success').css('display', 'block');
                            $('#success_text').text(result.message);

                            setTimeout(() => {
                                $('#message_success').fadeOut();
                            }, 3500);

                            exam_list_tbl.ajax.reload();
                        });
                        
                    }
                }
            });
        }
    });

    $('#add_exam_question').on('hidden.bs.modal', () => {
        $('#input_question').val('');
        $('#input_answer_a').val('');
        $('#input_answer_b').val('');
        $('#input_answer_c').val('');
        $('#input_answer_d').val('');
        $('#correct_answer').val('');
    });

    $('#assign_exam_btn').on('click', (e) => {
        e.preventDefault();

        const assigned_exam_id = $('#assign_exam_id').val();
        const selected_examinee_id = $('#selected_examinee').val();

        if (selected_examinee_id == "" || selected_examinee_id == "0") {
            swal({
                title: 'Required',
                text: 'Select examinee is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/assignExam',
                data:
                {
                    selected_examinee_id:selected_examinee_id,
                    assigned_exam_id:assigned_exam_id
                },
                dataType: 'json',
                success: (result) => {
                    if (result.success == true) {
                        $('#assign_exam_modal').modal('hide');
                        swal({
                            title: 'Success!',
                            text: 'Exam was assigned!',
                            type: 'success'
                        }).then(() => {
                            $('#message_success').css('display', 'block');
                            $('#success_text').text(result.message);

                            setTimeout(() => {
                                $('#message_success').fadeOut();
                            }, 3500);

                            exam_list_tbl.ajax.reload();
                        });
                    }
                }
            }); 
        }
    });

    $('#update_exam_btn').on('click', (e) => {
        e.preventDefault();

        const edit_exam_id = $('#edit_exam_id').val();
        const edit_exam_name = $('#edit_exam_name').val();
        const edit_selected_exam_type = $('#edit_selected_exam_type').val();

        if (edit_exam_name == "" || edit_exam_name == "0") {
            swal({
                title: 'Required',
                text: 'Exam name input is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else if (edit_selected_exam_type == "" || edit_selected_exam_type == "0") {
            swal({
                title: 'Required',
                text: 'Select exam type is empty.',
                type: 'warning'
            }).catch(swal.noop);
        } else {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/updateExam',
                data:
                {
                    // id
                    edit_exam_id:edit_exam_id,
                    edit_exam_name:edit_exam_name,
                    edit_selected_exam_type:edit_selected_exam_type
                }, 
                dataType: 'json',
                success: (result) => {
                    if (result.success == true) {
                        $('#edit_exam_modal').modal('hide');
                        swal({
                            title: 'Success!',
                            text: 'New exam was created!',
                            type: 'success'
                        }).then(() => {
                            $('#message_success').css('display', 'block');
                            $('#success_text').text(result.message);

                            setTimeout(() => {
                                $('#message_success').fadeOut();
                            }, 3500);

                            exam_list_tbl.ajax.reload();
                        });

                        
                    } else if (result.success == false) {
                        swal({
                            title: 'Exist!',
                            text: 'Exam Name Already Exist!',
                            type: 'warning'
                        }).then(() => {
                            $('#edit_exam_name').val('');
                        });
                    }
                }
            });
        }
    });

    setInterval(() => {
        exam_list_tbl.ajax.reload();
    }, 10000);
});