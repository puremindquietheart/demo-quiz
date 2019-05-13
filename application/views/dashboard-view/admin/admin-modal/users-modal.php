<!-- Add User -->
<div id="add_user_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-account-plus"></i>  New User Details </h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="input_new_user_name"> User Name </label>
                            <input type="text" class="form-control" id="input_new_user_name" placeholder="Input User Name">
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="input_new_user_email"> User Email </label>
                            <input type="email" class="form-control" id="input_new_user_email" placeholder="Input User Email">
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_user_type"> Select User Type </label>
                            <input type="text" id="selected_user_type">
                            <select class="form-control select2" id="select_user_type">
                                <option value='0' selected disabled readonly>Select User Type</option>
                                <option value='1'>Admin</option>
                                <option value='2'>Member</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_user_gender"> Select User Gender </label>
                            <input type="text" id="selected_user_gender">
                            <select class="form-control select2" id="select_user_gender">
                                <option value='0' selected disabled readonly>Select User Gender</option>
                                <option value='1'>Male</option>
                                <option value='2'>Female</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="save_new_user_btn" class="btn btn-icon waves-effect waves-light btn-success float-right"> <i class="mdi mdi-content-save"></i> Save User </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Edit User -->
<div id="edit_user_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-receipt"></i>  Sales Order Details </h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_promo_method"> Select Promo Method </label>
                            <input type="hidden" id="selected_promo_id">
                                <select class="form-control select2" id="select_promo_method">
                                    <option value='0' selected disabled readonly>Select Method</option>
                                    <option value='1'>Add</option>
                                    <option value='2'>Minus</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_brand"> Select Brand </label>
                            <input type="hidden" id="selected_brand_id">
                                <select class="form-control select2" id="select_brand" disabled>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_model"> Select Model </label>
                            <input type="hidden" id="selected_model_id">
                                <select class="form-control select2" id="select_model" disabled>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="input_model_promo"> Promo Price</label>
                            <input class="form-control" type="text" id="input_model_promo" placeholder="Input Model Promo" data-a-sign="₱ " data-p-sign="p" autocomplete="off" disabled>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="confirm_promo_btn" class="btn btn-icon waves-effect waves-light btn-success float-right"> <i class="mdi mdi-check-circle"></i> Confirm </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->