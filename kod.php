<form method="POST" action="submit.php">
  <div>
    <label for="last_name">Фамилия:</label>
    <input type="text" name="last_name" required>
  </div>
  <div>
    <label for="first_name">Имя:</label>
    <input type="text" name="first_name" required>
  </div>
  <div>
    <label for="isikukood">Личный код:</label>
    <input type="text" name="isikukood" required>
  </div>
  <div>
    <label for="grade">Курс:</label>
    <input type="number" name="grade" min="1" max="6" required>
  </div>
  <div>
    <label for="email">E-mail:</label>
    <input type="email" name="email" required>
  </div>
  <div>
    <label for="message">Сообщение:</label>
    <textarea name="message"></textarea>
  </div>
  <button type="submit">Запись</button>
  <button type="reset">Отмена</button>
</form>
<?php
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$isikukood = $_POST['isikukood'];
$grade = $_POST['grade'];
$email = $_POST['email'];
$message = $_POST['message'];
// Проверяем обязательные поля
?>
<?php
// Подключаемся к базе данных
$db = new mysqli('localhost', 'username', 'password', 'database_name');
if ($db->connect_error) {
    die('Ошибка подключения (' . $db->connect_errno . ') '
            . $db->connect_error);
}

// Запрос на выборку всех студентов из таблицы
$query = "SELECT * FROM students";
$result = $db->query($query);

// Выводим таблицу со списком студентов
echo '<table>';
echo '<tr><th>Имя</th><th>Фамилия</th><th>Личный код</th><th>Курс</th><th>E-mail</th><th>Message</th><th>Действия</th></tr>';
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['first_name']) . '</td>';
    echo '<td>' . htmlspecialchars($row['last_name']) . '</td>';
    echo '<td>' . htmlspecialchars($row['personal_code']) . '</td>';
    echo '<td>' . htmlspecialchars($row['grade']) . '</td>';
    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
    echo '<td>' . htmlspecialchars($row['message']) . '</td>';
    echo '<td><a href="edit.php?id=' . $row['id'] . '">Редактировать</a> <a href="delete.php?id=' . $row['id'] . '">Удалить</a></td>';
    echo '</tr>';
}
echo '</table>';

// Закрываем соединение с базой данных
$db->close();
?>
<?php
       // Подключаемся к базе данных
$db = new mysqli('localhost', 'username', 'password', 'database_name');
if ($db->connect_error) {
    die('Ошибка подключения (' . $db->connect_errno . ') '
            . $db->connect_error);
}?>
<?php
// Проверяем, был ли передан идентификатор студента
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Запрос на выборку данных о студенте по его идентификатору
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = $db->query($query);
    $row = $result->fetch
?>
