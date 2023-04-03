<IDOCTYPE html>
<html lang="en">
    <body>
        LIST<BR>
        <?php
            $MYSQL_ADDON_HOST=getenv('MYSQL_ADDON_HOST');
            $SMYSQL_ADDON_PORT=getenv('MYSQL_ADDON_PORT');
            $SMYSQL_ADDON_BD=getenv('MYSQL_ADDON_DB');
            $SMYSQL_ADDON_USER=getenv('MYSQL_ADDON_USER');
            $SMYSQL_ADDON_PASSWORD=getenv('MYSQL_ADDON_PASSWORD');
            $conn = mysqli_connect($MYSQL_ADDON_HOST, $SMYSQL_ADDON_USER, $SMYSQL_ADDON_PASSWORD, $SMYSQL_ADDON_BD);
            if (!$conn){
                echo "\nError : Unable to open database\n <BR>";
            } else {
                echo "\nOpen database successfully\n <BR>";
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                echo "\nID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
                }
            } else {
                echo "\n0 results";
            }
            mysqli_close($conn);
            }
        ?>
    </body>
</html>