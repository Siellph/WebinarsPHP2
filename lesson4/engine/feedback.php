<?php
include "database.php";
$id = $_GET['id'];
$sql = "SELECT * FROM feedback WHERE product_id = $id";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while($feed = mysqli_fetch_assoc($result)) {
        $feed_name = $feed['name'];
        $feed_score = $feed['score'];
        $feedback = $feed['feedback'];
        $feed_mail = $feed['e-mail'];
        echo '<div class="comment">';
        echo '<p class="feed_name">'.$feed_name.'</p>';
        echo '<p class="feed_score">'.$feed_score.'&#9733;</p>';
        echo '<span class="feed_text">'.$feedback.'</span>';
        echo '</div>';
        // print_r($feed);
    }
} else {
    echo '<div class="comment">';
    echo "Будьте первым, кто оставит отзыв к этому товару!";
    echo '</div>';
}
mysqli_close($connection);
?>