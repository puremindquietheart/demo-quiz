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
                    if (data === 1) {
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
                        return '<button type="button" class="btn btn-danger waves-effect deactivate-user waves-light" data-user_id='+row.user_id+'><i class="mdi mdi-account-off m-r-5"></i> Deactivate</button>'
                    } else {
                        return '<button type="button" class="btn btn-success waves-effect activate-user waves-light" data-user_id='+row.user_id+'><i class="mdi mdi-account-check m-r-5"></i> Activate</button>'
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
            const deactivate_user = $(row).find('.deactivate-user');
            const activate_user = $(row).find('.activate-user');
            const edit_user_details = $(row).find('.edit-user');
            // GET CONTAINER NUMBER
            $(edit_user_details).on('click', function(){

                $('#edit_user_modal').modal("show");

                const edit_user_id = $(this).data('edit_user_id');
            });
        }
    });

    $('#new_user').on('click', () => {

        $('#add_user_modal').modal('show');

        $('#save_new_user_btn').prop('disabled', true);
        $('#input_new_user_email').prop('disabled', true);
        $('#select_user_type').prop('disabled', true);
        $('#select_user_gender').prop('disabled', true);

        let select_user_type = $('#selected_user_type').val();
        let select_user_gender = $('#selected_user_gender').val();

        if (select_user_type == "") {
            console.log("HAHA");
        }
        

        $('#input_new_user_name').on('input', function() {
            let check_input_name = this.value;
            if (check_input_name == 0 || check_input_name == "") {
                $('#input_new_user_email').prop('disabled', true);
                $('#save_new_user_btn').prop('disabled', true);
            } else {
                $('#input_new_user_email').prop('disabled', false);
                console.log(select_user_type);
            }
        });

        $('#input_new_user_email').on('input', function(){
            let check_email_input = this.value;

            if (isEmail(check_email_input)) {
                $('#select_user_type').prop('disabled', false);

                if (select_user_type == "" && select_user_gender == "") {
                    $('#save_new_user_btn').prop('disabled', true);
                } else {
                    $('#save_new_user_btn').prop('disabled', false);
                }
            } else { 
                $('#select_user_type').prop('disabled', true);
                $('#save_new_user_btn').prop('disabled', true);
            }
        });
        
        $('#select_user_type').select2();
        $('#select_user_type').on('change', () => {
            $('#selected_user_type').val($('#select_user_type option:selected').val());
            $('#save_new_user_btn').prop('disabled', true);
            $('#select_user_gender').prop('disabled', false);
            
        });
        
        $('#select_user_gender').select2();
        $('#select_user_gender').on('change', () => {
            $('#selected_user_gender').val($('#select_user_gender').val());
            $('#save_new_user_btn').prop('disabled', false);
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

    $('#save_new_user_btn').on('click', (e) => {
        e.preventDefault();

        const input_new_user_name = $('#input_new_user_name').val();
        const input_new_user_email = $('#input_new_user_email').val();
        const selected_user_type = $('#selected_user_type').val();
        const selected_user_gender = $('#selected_user_gender').val();

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
                console.log(result);
                console.log(result.success);
                // if (result.) {

                // }
            }
        });

    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    setInterval(() => {
        user_tbl.ajax.reload();
    }, 10000);
});