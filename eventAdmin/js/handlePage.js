//Default Variables
var d_ID = 1;
var e_AdminApproved = 0;

fetchEvents(d_ID, e_AdminApproved);

//Filter
$(".filter").click(function (){
    $(".filter").removeClass("active");
    $(this).addClass("active");
    e_AdminApproved = $(this).context.id;

    fetchEvents(d_ID, e_AdminApproved);
});

//Navigation
$(".dept").click(function () {
    $(".dept").removeClass("deptActive");
    $(this).addClass("deptActive");
    var d_ID = $(this).context.children[0].innerHTML;

    fetchEvents(d_ID,e_AdminApproved);
});

//Fetch all the events for the department the user clicked on
function fetchEvents(d_ID,e_AdminApproved) {
    $.ajax({
        url: "./php/fetchEvents.php",
        method: "post",
        data: {
            d_ID: d_ID,
            e_AdminApproved:e_AdminApproved
        },
        success: function (data) {
            $('#section').html('');
            $('#section').html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
}
