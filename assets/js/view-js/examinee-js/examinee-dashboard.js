$(function(){
    user_dashboard_details();
    

    function user_dashboard_details() {
        const user_id = $('#examinee_id').val();
        $.ajax({
            type: 'POST',
            url: "http://localhost/Quiz/index.php/Dashboard/Examinee/getUserExamsData",
            data:
            {
                user_id:user_id
            },
            dataType: 'json',
            success: (result) => {
                $.each(result, (i, v) => {
                    
                    let pass_exam_percent = (v.exam_pass / v.exam_taken) * 100;
                    let fail_exam_percent = (v.exam_fail / v.exam_taken) * 100;

                    $('#exam_taken').text(v.exam_taken);
                    $('#pass_exams').text(pass_exam_percent);
                    $('#fail_exams').text(fail_exam_percent);
                    $('#count_price_taken').text(v.total_price);
                });
            }
        });
    }

    setInterval(() => {
        user_dashboard_details();
    }, 10000);
});