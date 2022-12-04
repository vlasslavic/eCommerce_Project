<?php require  APPROOT . '/views/includes/header.php'; ?>

<!-- <input data-provide="datepicker"> -->
<div id="datepicker" data-date="12/03/2012"></div>
<input type="hidden" id="my_hidden_input">

<script>
$('#datepicker').datepicker({
    format: 'yyyy/mm/dd/',
    maxViewMode: 0,
    todayBtn: "linked",
    clearBtn: true,
    keyboardNavigation: false,
    daysOfWeekDisabled: "0,6",
    todayHighlight: true,
    toggleActive: true
});
$('#datepicker').on('changeDate', function() {
    $('#my_hidden_input').val(
        $('#datepicker').datepicker('getFormattedDate')
    );
});
</script>

<?php require APPROOT . '/views/includes/footer.php'?>