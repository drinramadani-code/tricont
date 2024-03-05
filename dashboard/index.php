<?php include 'dbh.php'; ?>
<div class="dashboard">
    <?php  ?>
    <div class="dashboard-events">
        <?php 
            $user = $_SESSION['user'];
            $events_sql = "SELECT * FROM events; ";
            $events_result = mysqli_query($conn, $events_sql);
            if (mysqli_num_rows($events_result) > 0) {
                while ($event = mysqli_fetch_assoc($events_result)) {
                    if (in_array($user['id'], explode(", ", $event['event_participants']))) {
                    ?>
                    <a href="<?php echo $_SESSION['permalink']; ?>?t=1" class="dashboard-events-single">
                        <div class="dashboard-events-single-wrapper">
                            <div class="dashboard-events-single-wrapper-left">
                                <h3><?php echo $event['event_name']; ?></h3>
                            </div>
                            <div class="dashboard-events-single-wrapper-right">
                                <i class="fa fa-user"></i><span>(<?php echo count(explode(", ", $event['event_participants'])); ?>)</span>
                            </div>
                        </div>
                    </a>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>