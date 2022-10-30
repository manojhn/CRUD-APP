$(function(){
    $('.alert').delay(5000).fadeOut(function(){
        $('.alert-success' ).hide();
    });
    $('.date').click(function(){
        $(this).datepicker({
            dateFormat:"yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: false,
        }).datepicker( "show" );
    });

    $('#policy_list').DataTable({
        fixedHeader:true,
        responsive:false,
        "searching":false,
        "columns": [
            {"orderable":false},
            {"orderable":false},
            {"orderable":false},
            {"orderable":false},
            {"orderable":false},
            {"orderable":false},
            {"orderable":false},
        ],
        "ajax": {
            "url": baseUrl + "/policy/getPolicysList",
            "type": "POST",
            "data": function (d) {
            },
            beforeSend: function () {
            },
            complete:function(){
            }
        }
    });
});

function validateDate(id) {
    var startDate = $("#start_date").val();
    var endDate = $("#end_date").val();
    if (startDate != '' && endDate !='') {
        if (Date.parse(startDate) > Date.parse(endDate)) {
            $("#"+id).val('');
            alert("End date should be greater than start date");
        }
    }
    return false;
}

function deleteRecord(policyId){
    if(confirm("Are you sure you want to delete this policy?")){
        $.ajax({
            type:"POST",
            url:baseUrl + "/policy/deletePolicy",
            dataType:"json",
            data:{policyId:policyId},
            success: function (response){
                alert(response.msg);
                location.reload();
            }
        });
    }
}