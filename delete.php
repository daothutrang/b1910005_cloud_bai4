<!DOCTYPE html>
<html lang="en">
    <body>
        Insert Employee

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
            ID<BR> <input type="text" name="id" value ="<?php echo $id; ?>"><BR>
            <input type="submit" name="submit" value="submit">
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id=$_POST["id"];
                $MYSQL_ADDON_HOST=getenv('MYSQL_ADDON_HOST');
                $MYSQL_ADDON_PORT=getenv('MYSQL_ADDON_PORT');
                $MYSQL_ADDON_BD=getenv('MYSQL_ADDON_DB');
                $MYSQL_ADDON_USER=getenv('MYSQL_ADDON_USER');
                $MYSQL_ADDON_PASSWORD=getenv('MYSQL_ADDON_PASSWORD');
                $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_BD, $MYSQL_ADDON_PORT);
                if(!$conn){
                    echo "\nError : Unable to open database\n";
                } else {
                    echo "\nOpen database successfully\n";
                }
                $sql = "DELETE FROM users WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                    echo "\nUser deleted successfully.";
                } else {
                    echo "\nERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
        ?>
    </body>
</html>