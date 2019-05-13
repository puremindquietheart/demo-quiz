<!--  Modal content for the above example -->
<div id="view_so_details_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-receipt"></i>  Sales Order Details </h4>
            </div>
            <div class="modal-body">
                <table id="view_so_details_tbl" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Brand Name</th>
                            <th>Model Name</th>
                            <th>Product Type</th>
                            <th>Ordered Quantity</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <div class="col-12">
                    <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                </div>
            </div>
        </div><!-- /.modal-content --> 
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Input Item Quantity Modal-->
<div id="released_item_modal" class="modal fade" role="dialog" aria-labelledby="custom-width-modalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-cube-send"></i> Releasing Product Quantity </h4>
            </div>
            <form action="#" class="form-horizontal">
                <input type="hidden" id="product_reserved_qty">
                <input type="hidden" id="so_ordered_qty">
                <input type="hidden" id="product_item_id">
                <input type="hidden" id="product_container_id">
                <input type="hidden" id="product_model_id">
                <div class="modal-body">
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <h1 class="header-title m-t-0">Product Total Reserved: <span style="color:red;" id="display_reserved_qty"></span> </h1>
                            <label for="input_release_product_qty"> Model Quantity</label>
                            <input class="form-control" type="text" id="input_release_product_qty" placeholder="Input Quantity to Release" data-a-sign=" PC/s" data-p-sign="s" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="confirm_product_release_btn" class="btn btn-icon waves-effect waves-light btn-primary float-right" style="display:none;"> <i class="mdi mdi-checkbox-marked-circle"></i> Confirm </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Sales Promo Modal-->
<div id="sales_promo_modal" class="modal fade" role="dialog" aria-labelledby="custom-width-modalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
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

    <!-- Remove Product Modal-->
<div id="sales_remove_modal" class="modal fade" role="dialog" aria-labelledby="custom-width-modalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-remove"></i>  Remove Product </h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" id="released_qty">
                    <input type="hidden" id="remove_product_id">
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="input_remove_item_code"> Product Item Code </label>
                            <input class="form-control" type="text" id="input_remove_item_code" placeholder="Input Product Item to Remove" autocomplete="off">
                        </div>  
                    </div>
                    <div class="form-group m-b-25" id="remove_div_qty" style="display:none;">  
                        <div class="col-12">
                            <label for="input_remove_product_qty"> Product Item Code </label>
                            <input class="form-control" type="text" id="input_remove_product_qty" placeholder="Input Quantity to Remove" data-a-sign=" PC/s" data-p-sign="s" autocomplete="off">
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="remove_check_code_btn" class="btn btn-icon waves-effect waves-light btn-primary float-right"> <i class="mdi mdi-file-document-box"></i> View Item Code </button>
                        <button type="submit" id="remove_product_item_btn" class="btn btn-icon waves-effect waves-light btn-danger float-right" style="display:none;"> <i class="mdi mdi-delete-forever"></i> Remove </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->   
</div><!-- /.modal -->

{{-- <!-- Confirm Transaction Modal-->
<div id="sales_confirm_transaction_modal" class="modal fade" role="dialog" aria-labelledby="custom-width-modalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title"><i class="mdi mdi-receipt"></i>  Sales Order Details </h4>
                <br/>
                <form action="#" class="form-horizontal">
                    <table id="view_so_details_tbl" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Model Name</th>
                                <th>Ordered Quantity</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-12">
                            <button type="button" class="btn btn-icon waves-effect waves-light btn-danger float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> --}}