<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, DELETE, HEAD, OPTIONS');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
$context = filter_var($_GET['context'], FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (empty($context)): 
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
  <table> 
      <tr>
        <th> Name </th>
        <th> Continent </th>
        <th> Independence </th>
        <th> Head of State </th>
      <tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['continent'] ?></td>
      <td><?= $row['independence_year'] ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php else:
  $stmt = $conn->query("SELECT DISTINCT c.name, c.district, c.population FROM countries JOIN cities c ON code = country_code WHERE countries.name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

  <table> 
      <tr>
        <th> Name </th>
        <th> District </th>
        <th> Population </th>
      <tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['district'] ?></td>
      <td><?= $row['population'] ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endif?>
