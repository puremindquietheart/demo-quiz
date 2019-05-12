$(function(){
    users();
    exams();

    function users() {
        $.ajax({
            type: 'POST',
            url  : 'http://localhost/Quiz/index.php/Dashboard/Administrator/countUsers',
            dataType: 'json',
            success: (result) => {
                $('#current_active_examinees').text(result[0].active_users);
                $('#current_inactive_examinees').text(result[0].inactive_users);
            }
        });
    }

    function exams() {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/Quiz/index.php/Dashboard/Administrator/countExams',
            dataType: 'json',
            success: (result) => {
                $('#current_passed_exams').text(result[0].passed_examinees);
                $('#current_failed_exams').text(result[0].failed_examinees);
            }
        });
    }

    setInterval(() => {
        users();
        exams();
    }, 5000);
});