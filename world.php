<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$lookup = $_GET['lookup'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($lookup == 'cities'):?>
  <?php
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM countries JOIN cities ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th> 
  </tr>
  <?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name']; ?></td>
    <td><?= $row['district']; ?></td>
    <td><?= $row['population']; ?></td>
  </tr>
  <?php endforeach; ?> 
  </table>
<?php else: ?>
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
<?php endif; ?>
