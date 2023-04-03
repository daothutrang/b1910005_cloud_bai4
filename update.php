<IDOCTYPE html>
<html lang="en">
    <body>
    Insert Employee

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
        ID<BR> <input type="text" name="id" value ="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>"><BR>
        Full Name<BR> <input type="text" name="name" value ="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><BR>
        Email<BR> <input type="text" name="email" value ="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><BR>
        Password<BR> <input type="text" name="password" value ="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><BR>
        <input type="submit" name="submit" value="submit">
    </form> 
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id=$_POST["id"];
                $name=$_POST["name"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                
                $SMYSQL_ADDON_HOST=getenv('MYSQL_ADDON_HOST');
                $SMYSQL_ADDON_PORT=getenv('MYSQL_ADDON_PORT');
                $SMYSQL_ADDON_BD=getenv('MYSQL_ADDON_DB');
                $SMYSQL_ADDON_USER=getenv('MYSQL_ADDON_USER');
                $SMYSQL_ADDON_PASSWORD=getenv('MYSQL_ADDON_PASSWORD');
                
                $conn = mysqli_connect($SMYSQL_ADDON_HOST, $SMYSQL_ADDON_USER, $SMYSQL_ADDON_PASSWORD, $SMYSQL_ADDON_BD, $SMYSQL_ADDON_PORT);
                
                if(!$conn){
                    echo "\nError : Unable to open database\n";
                } else {
                    echo "\nOpen database successfully\n";
                }
                
                $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id'";
                
                if (mysqli_query($conn, $sql)) {
                    echo "\nUser updated successfully.";
                } else {
                    echo "\nERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                
                mysqli_close($conn);
            }
        ?>
    </body>
</html> 