
$(document).ready(function () {
    $("#dataAcqTitleExpanded").click(function () {
        $("#dataAcqBody").hide();
        $("#dataAcqTitleExpanded").hide();
        $("#dataAcqTitleCollapsed").show();
    });

    $("#dataAcqTitleCollapsed").click(function () {
        $("#dataAcqBody").show();
        $("#dataAcqTitleExpanded").show();
        $("#dataAcqTitleCollapsed").hide();
        
    });


var now = new Date();
if(now.getHours() >= 12)
{
	var goodDay = $('p[title="Good Day Message"]');
	goodDay.text('Good Afternoon!');
}
    