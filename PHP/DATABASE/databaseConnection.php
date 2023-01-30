<!-- database-connect :: start -->
<?php
    $link = @mysqli_connect("localhost","<username>","<password>","mykec") or die("ERROR:Unable to connect".mysqli_connect_error());
?>
<!-- database-connect :: end -->
