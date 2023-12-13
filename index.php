<?php

$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_name = 'example_db';

$connection = new mysqli( $db_hostname, $db_username, $db_password, $db_name);

if ( $connection->connect_error) {
    die( 'Connessione al database non riuscita' . $connection->connection_error);
}

$query = 'SELECT id, title, date, content FROM posts';
$query_result = $connection->query($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../esempio_MYSQL/css/style.css">
        <title>Document</title>
    </head>
    <body>
        <div class="wrapper">
            <?php
            if ($query_result->num_rows > 0 ) {
                while ( $row = $query_result->fetch_assoc()) {
                    
                ?>
             
                <article class="post" id="<?php echo $row ['id']; ?>">
                    <h1><?php echo $row['title']; ?></h1>
                
                    <p><?php echo $row['date']; ?></p>
                    
                    <p><?php echo $row['content']; ?>
                    </p>
                </article>
                <?php
                }
            }
            ?>
        </div>
    </body>
</html>