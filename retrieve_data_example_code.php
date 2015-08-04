
// below are some examples of code for retrieving data 
<?PHP

require_once 'parks_config.php';
require_once 'db_connect.php';

//$stmt = $dbc->query('SELECT * FROM users');


// function getUsers($dbc)
// {
// 	 // Bring the $dbc variable into scope somehow


//     $stmt = $dbc->query('SELECT * FROM users');

//     $rows = array();
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $rows[] = $row;
//     }

//     return $rows;

// }

// below is an abbreviated version of above

function getUsers($dbc)
{

	return $dbc->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
}

print_r(getUsers($dbc));

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
echo "Rows: " . $stmt->rowCount() . PHP_EOL;


echo "Columns: " . $stmt->columnCount() . PHP_EOL;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
};

// echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
//     print_r($row);
// }
// echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
//     print_r($row);
// }

print_r($stmt->fetch());
// print_r($stmt->fetch(PDO::FETCH_ASSOC)));
// print_r($stmt->fetch(PDO::FETCH_NUM));
// print_r($stmt->fetch(PDO::FETCH_BOTH));
