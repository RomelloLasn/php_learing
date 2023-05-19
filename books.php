<html>
    <head>
    <script src="https://cdn.tailwindcss.com"></script>
     <meta charset="UTF-8">
    </head> 
<?php
$servername = "d118824.mysql.zonevs.eu"; // Change this if your database is hosted on a different server
$username = "d118824_rompsiks"; // Replace with your MySQL username
$password = "Syncmaster710N"; // Replace with your MySQL password
$dbname = "d118824_bookstore"; // Replace with the name of your database

// +--------------+----------------------------+------+-----+---------+----------------+
// | Field        | Type                       | Null | Key | Default | Extra          |
// +--------------+----------------------------+------+-----+---------+----------------+
// | id           | int(11)                    | NO   | PRI | NULL    | auto_increment |
// | title        | varchar(255)               | NO   |     | NULL    |                |
// | release_date | year(4)                    | NO   |     | NULL    |                |
// | cover_path   | varchar(255)               | YES  |     | NULL    |                |
// | language     | varchar(45)                | NO   |     | NULL    |                |
// | summary      | text                       | YES  |     | NULL    |                |
// | price        | decimal(13,4)              | NO   |     | NULL    |                |
// | stock_saldo  | varchar(45)                | NO   |     | 0       |                |
// | pages        | int(11)                    | NO   |     | NULL    |                |
// | type         | enum('new','used','ebook') | NO   |     | NULL    |                |
// +--------------+----------------------------+------+-----+---------+----------------+


// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";

if( isset( $_REQUEST["book"] ) ) {
    $bookId = $_REQUEST["book"];
    $sql = "SELECT * FROM books WHERE id=$bookId";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
                <div class="bg-gradient-to-r from-black via-green-500 to-black h-[1000px] ">
                <h1 class=" mb-[40px] text-center text-white text-9xl font-semibold underline mb-[90px]"><?php echo $row["title"]; ?></h1>
                <div class="text-7xl text-white font-semibold mb-[30px]">Release date: <?php echo $row["release_date"]; ?></div>
                <div class="text-7xl text-white font-semibold mb-[30px]">language: <?php echo $row["language"]; ?></div>
                <div class="text-7xl text-white font-semibold mb-[30px]">price: <?php echo $row["price"]; ?></div>
                <div class="text-7xl text-white font-semibold mb-[90px]">pages: <?php echo $row["pages"]; ?></div>

                <a class=" justify- bottom-0 text-4xl text-white font-semibold text-center" href="/books.php">Tagasi</a>
                </div>
            <?php
        }
    }
}else{
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {https://portfolio.tak22lasn.itmajakas.ee/books.php
                
             echo '<a class=" underline bg-gradient-to-r from-black via-yellow-500  to-black text-yellow-300" href="?book=' . $row["id"] . '">' . $row["title"] . '</a><br>';
        }
    }
}


// Close the connection
$conn->close();
?> 

</html>
