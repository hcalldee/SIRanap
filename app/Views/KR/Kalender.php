<div class="container-fluid">
    <div class="table-responsive">
        <table id="container" style=" border: none !important; width :100%; height:100%; " class="calendar-container mt-4 shadow p-4 rounded"></table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#container").simpleCalendar({
            fixedStartDay: false,
            disableEmptyDetails: true,
            events: <?= $jadwal ?>
        });
    });
</script>