<?php include 'dbh.php'; ?>
<div class="dashboard">
    <div class="dashboard-header">
        <a href="<?php echo $_SESSION['permalink']; ?>"><img src="assets/images/logo.png" alt=""></a>
    </div>
    <div class="dashboard-events">
        <h3 class="dashboard-events-title">Eventet Tuaja</h3>
        <?php 
            $user = $_SESSION['user'];
            $events_sql = "SELECT * FROM events ORDER BY id DESC; ";
            $events_result = mysqli_query($conn, $events_sql);
            if (mysqli_num_rows($events_result) > 0) {
                while ($event = mysqli_fetch_assoc($events_result)) {
                    if (in_array($user['id'], explode(", ", $event['event_participants']))) {
                    ?>
                    <a href="<?php echo $_SESSION['permalink']; ?>?t=<?php echo $event['id']; ?>" class="dashboard-events-single">
                        <div class="dashboard-events-single-wrapper">
                            <div class="dashboard-events-single-wrapper-left">
                                <h3><?php echo $event['event_name']; ?></h3>
                            </div>
                            <div class="dashboard-events-single-wrapper-right">
                                <?php echo count(explode(", ", $event['event_participants'])); ?><i class="fa fa-user"></i><span></span>
                            </div>
                            <i class="dashboard-events-single-wrapper-arrow fa fa-angle-right"></i>
                        </div>
                    </a>
                    <?php
                    }
                }
            }
        ?>
    </div>
    <div class="dashboard-pluses">
        <a href="dashboard/create_event_form.php">Krijo Event</a>
    </div>
</div>