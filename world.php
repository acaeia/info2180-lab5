<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$lookup = $_GET['lookup'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

if ($lookup=='cities'){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities WHERE name LIKE '%$cities%'");

  $sql="SELECT countries.name AS country_name, cities.city AS city_name, cities.district AS city_district, cities.population AS city_population FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%'";
  
  
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th> 
  <tr>
  <tr>
    <?php foreach ($results as $row): ?>
    <td><?= $row['name']; ?></td>
    <td><?= $row['continent']; ?></td>
    <td><?= $row['independence_year']; ?></td>
    <td><?= $row['head_of_state']; ?></td>
    <?php endforeach; ?>
  </tr>

</table>


<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name']; ?></td>
    <td><?= $row['continent']; ?></td>
    <td><?= $row['independence_year']; ?></td>
    <td><?= $row['head_of_state']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
