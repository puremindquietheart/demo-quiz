$(function(){
    const user_tbl = $('#user_list_tbl').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [ [5, 10, 15, 20, 25, 30 -1], [5, 10, 15, 20, 25, 30, "All"] ],
        pageLength: 5,
        searching: false,
        paging: false,
        info: false,
        ajax: {
            url: "http://localhost/Quiz/index.php/Dashboard/Administrator/getUsers",
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
            { data: 'user_name' },
            { data: 'user_type',  
                render: function (data, type, row, meta){
                    if (data == 1) {
                        return 'Admin';
                    } else {
                        return 'Member';
                    }
                }
            },
            { data: 'user_email' },
            { data: 'user_id', data: 'user_active',
                render: function (data, type, row, meta) {
                    if (row.user_active == 1) {
                        return '<button type="button" class="btn btn-danger waves-effect user-status waves-light" data-user_id='+row.user_id+'><i class="mdi mdi-account-off m-r-5"></i> Deactivate</button>'
                    } else {
                        return '<button type="button" class="btn btn-success waves-effect user-status waves-light" data-user_id='+row.user_id+'><i class="mdi mdi-account-check m-r-5"></i> Activate</button>'
                    }
                }
            },
            { data: 'user_id',  
                render: function (data, type, row, meta){
                return type === 'display' ?
                    '<button type="button" class="btn btn-primary waves-effect edit-user waves-light" data-edit_user_id='+data+'> <i class="mdi mdi-account-edit m-r-5"></i> <span>Edit</span> </button>' : data;
                }
            },
        ],
        createdRow: function (row, data, dataIndex) {
            const user_status = $(row).find('.user-status');
            const edit_user_details = $(row).find('.edit-user');
            // GET CONTAINER NUMBER
            $(edit_user_details).on('click', function(){

                $('#edit_user_modal').modal("show");

                $('#edit_select_user_type').select2();

                $('#edit_select_user_gender').select2();

                const edit_user_id = $(this).data('edit_user_id');
                
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/getUserData',
                    data:
                    {
                        edit_user_id:edit_user_id
                    },
                    dataType: 'json',
                    success: function(result) {
                        $.each(result, function(i, v) {
                            // console.log(v);
                            // console.log(v.user_active);
                            $('#edit_user_id').val(v.user_id);
                            $('#edit_user_name').val(v.user_name);
                            $('#edit_user_email').val(v.user_email);
                            $('#edit_user_password').val(v.user_password);
                            $('#edit_selected_user_type').val(v.user_type);
                            $('#edit_selected_user_gender').val(v.user_gender);
                            $('#edit_select_user_type').val(v.user_type).trigger('change');
                            $('#edit_select_user_gender').val(v.user_gender).trigger('change');
                        });
                    }
                });
            });

            $(user_status).on('click', function(){
                
                const user_status_id = $(this).data('user_id');

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/userStatus',
                    data:
                    {
                        user_status_id:user_status_id
                    },
                    dataType: 'json',
                    success: (result) => {
                        if (result.activated == false) {
                            swal({
                                title: 'Deactivated!',
                                text: 'User was deactivated.',
                                type: 'warning'
                            }).then(() => {
                                $('#message_warning').css('display', 'block');
                                $('#warning_text').text(result.message);
                                
                                setTimeout(() => {
                                    $('#message_warning').fadeOut();
                                }, 3500);
    
                                user_tbl.ajax.reload();
                            }).catch(swal.noop);
                        } else if (result.activated == true) {
                            swal({
                                title: 'Activated!',
                                text: 'User was activated.',
                                type: 'success'
                            }).then(() => {
                                $('#message_success').css('display', 'block');
                                $('#success_text').text(result.message);
                                
                                setTimeout(() => {
                                    $('#message_success').fadeOut();
                                }, 3500);
    
                                user_tbl.ajax.reload();
                            }).catch(swal.noop);
                        }
                    }
                });
            });
        }
    });

    $('#new_user').on('click', () => {

        $('#add_user_modal').modal('show');
        
        $('#select_user_type').select2();
        $('#select_user_type').on('change', () => {
            $('#selected_user_type').val($('#select_user_type option:selected').val());
            
        });
        
        $('#select_user_gender').select2();
        $('#select_user_gender').on('change', () => {
            $('#selected_user_gender').val($('#select_user_gender').val());
        });
    });

    $('#add_user_modal').on('hidden.bs.modal', () => {
        // inputs
        $('#input_new_user_name').val('');
        $('#input_new_user_email').val('');
        $('#selected_user_type').val('');
        $('#selected_user_gender').val('');
        // selects
        $('#select_user_type').val(0);
        $('#select_user_gender').val(0);
    });

    // new user

    $('#save_new_user_btn').on('click', (e) => {
        e.preventDefault();

        const input_new_user_name = $('#input_new_user_name').val();
        const input_new_user_email = $('#input_new_user_email').val();
        const selected_user_type = $('#selected_user_type').val();
        const selected_user_gender = $('#selected_user_gender').val();

        if (input_new_user_name == "" || input_new_user_name == "0") {
            swal({
                title: 'Required!',
                text: 'User name input is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (input_new_user_email == "" || input_new_user_email == "0" ) {
            swal({
                title: 'Required!',
                text: 'User email input is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (selected_user_type == "" || selected_user_type == "0") {
            swal({
                title: 'Required!',
                text: 'Select user type is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (selected_user_gender == "" || selected_user_gender == "0") {
            swal({
                title: 'Required!',
                text: 'Select user gender is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (!isEmail(input_new_user_email)) {
            swal({
                title: 'Invalid!',
                text: 'User email is not in valid format!',
                type: 'error'
            }).catch(swal.noop);
        } else {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/newUser',
                data:
                {
                    input_new_user_name:input_new_user_name,
                    input_new_user_email:input_new_user_email,
                    selected_user_type:selected_user_type,
                    selected_user_gender:selected_user_gender
                },
                dataType: 'json',
                success: (result) => {
                    if (result.success == true) {
                        $('#add_user_modal').modal('hide');
                        swal({
                            title: 'Success!',
                            text: 'New user was created!',
                            type: 'success'
                        }).then(() => {
                            $('#message_success').css('display', 'block');
                            $('#success_text').text(result.message);

                            setTimeout(() => {
                                $('#message_success').fadeOut();
                            }, 3500);

                            user_tbl.ajax.reload();
                        });

                        
                    } else if (result.success == false) {
                        swal({
                            title: 'Exist!',
                            text: 'User Email Already Exist!',
                            type: 'warning'
                        }).then(() => {
                            $('#input_new_user_email').val('');
                        });
                    }
                }
            });
        }

    });

    // update user

    $('#confirm_user_update_btn').on('click', (e) => {
        e.preventDefault();

        const edit_user_id = $('#edit_user_id').val();
        const edit_user_name = $('#edit_user_name').val();
        const edit_user_email = $('#edit_user_email').val();
        const edit_user_password = $('#edit_user_password').val();
        const edit_selected_user_type = $('#edit_selected_user_type').val();
        const edit_select_user_gender = $('#edit_select_user_gender').val();

        if (edit_user_name == "" || edit_user_name == "0") {
            swal({
                title: 'Required!',
                text: 'User name input is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (edit_user_email == "" || edit_user_email == "0") {
            swal({
                title: 'Required!',
                text: 'User email input is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (edit_user_password == "" || edit_user_password == "0") {
            swal({
                title: 'Required!',
                text: 'User password input is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (edit_selected_user_type == "" || edit_selected_user_type == "0") {
            swal({
                title: 'Required!',
                text: 'Select user type is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (edit_select_user_gender == "" || edit_select_user_gender == "0") {
            swal({
                title: 'Required!',
                text: 'Select user gender is empty!',
                type: 'warning'
            }).catch(swal.noop);
        } else if (!isEmail(edit_user_email)) {
            swal({
                title: 'Invalid!',
                text: 'User email is not in valid format!',
                type: 'error'
            }).catch(swal.noop);
        } else {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/updateUser',
                data:
                {   
                    // id
                    edit_user_id:edit_user_id,
                    // new data
                    edit_user_name:edit_user_name,
                    edit_user_email:edit_user_email,
                    edit_user_password:edit_user_password,
                    edit_selected_user_type:edit_selected_user_type,
                    edit_select_user_gender:edit_select_user_gender
                },
                dataType: 'json',
                success: (result) => {
                    if (result.success == true) {
                        $('#edit_user_modal').modal('hide');
                        swal({
                            title: 'Success!',
                            text: 'User Details was Updated!',
                            type: 'success'
                        }).then(() => {
                            $('#message_success').css('display', 'block');
                            $('#success_text').text(result.message);

                            setTimeout(() => {
                                $('#message_success').fadeOut();
                            }, 3500);

                            user_tbl.ajax.reload();
                        });

                        
                    } else if (result.success == false) {
                        swal({
                            title: 'Exist!',
                            text: 'User Email Already Exist!',
                            type: 'warning'
                        }).then(() => {
                            $('#edit_user_email').val('');
                        });
                    }
                }
            });
        }
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    setInterval(() => {
        user_tbl.ajax.reload();
    }, 10000);
});