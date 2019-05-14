<!-- Add Exam -->
<div id="add_exam_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-file-plus"></i> Create New Exam </h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="input_new_exam"> Exam Name </label>
                            <input type="text" class="form-control" id="input_new_exam" placeholder="Input Exam Name" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_exam_type"> Select Exam Type </label>
                            <input type="hidden" id="selected_exam_type">
                            <select class="form-control select2" id="select_exam_type">
                                <option value='0' selected disabled readonly>Select Exam Type</option>
                                <option value='1'>Mathematics</option>
                                <option value='2'>English</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="save_new_exam_btn" class="btn btn-icon waves-effect waves-light btn-success float-right"> <i class="mdi mdi-content-save"></i> Save Exam </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Edit Exam -->
<div id="edit_exam_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-file-check"></i>  Update Exam Details</h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="edit_exam_name"> Exam Name </label>
                            <input type="hidden" id="edit_exam_id">
                            <input type="text" class="form-control" id="edit_exam_name" placeholder="Input User Name" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="edit_select_exam_type"> Select Exam Type </label>
                            <input type="hidden" id="edit_selected_exam_type">
                            <select class="form-control select2" id="edit_select_exam_type">
                                <option value='0' selected disabled readonly>Select Exam Type</option>
                                <option value='1'>Mathematics</option>
                                <option value='2'>English</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="update_exam_btn" class="btn btn-icon waves-effect waves-light btn-success float-right"> <i class="mdi mdi-checkbox-multiple-marked-outline"></i> Update </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Assign Exam -->
<div id="assign_exam_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-file-check"></i>  Assign User Exam</h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="select_examinee"> Select Examinee </label>
                            <input type="hidden" id="assign_exam_id">
                            <input type="hidden" id="selected_examinee">
                            <select class="form-control select2" id="select_examinee">
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="assign_exam_btn" class="btn btn-icon waves-effect waves-light btn-success float-right"> <i class="mdi mdi-file-send"></i> Assign </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add Exam Question -->
<div id="add_exam_question" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="mdi mdi-file-plus"></i> Add Exam Questions</h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" id="question_exam_id">
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="input_question"> Quesstion </label>
                            <textarea id="input_question" class="form-control" cols="10" rows="10"></textarea>
                            <label for="input_answer_a"> Answer A </label>
                            <input type="text" class="form-control" id="input_answer_a" autocomplete="off">
                            <label for="input_answer_b"> Answer B </label>
                            <input type="text" class="form-control" id="input_answer_b" autocomplete="off">
                            <label for="input_answer_c"> Answer C </label>
                            <input type="text" class="form-control" id="input_answer_c" autocomplete="off">
                            <label for="input_answer_d"> Answer D </label>
                            <input type="text" class="form-control" id="input_answer_d" autocomplete="off">
                            <label for="correct_answer"> Correct Answer </label>
                            <input type="text" class="form-control" id="correct_answer" autocomplete="off">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-12">
                        <button type="button" class="btn btn-icon waves-effect waves-light btn-default float-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close </button>
                        <button type="submit" id="confirm_exam_question_btn" class="btn btn-icon waves-effect waves-light btn-success float-right"> <i class="mdi mdi-content-save"></i> Save </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

