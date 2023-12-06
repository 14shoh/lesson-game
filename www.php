<html>
  <head>
    <title>Угадай число</title>
  </head>
  <body>
    <h1>Добро пожаловать в игру "Угадай число"!</h1>
    <p>Я загадал число от 0 до 100. Попробуйте угадать его!</p>

    <form method="POST">
      <label for="guess">Введите ваше предположение:</label>
      <input type="number" id="guess" name="guess" min="0" max="100" required>
      <button type="submit">Отправить</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $secretNumber = rand(0, 100);
      $guessed = false;
      $attempts = array();

      if (isset($_POST["guess"]) && is_numeric($_POST["guess"]) && $_POST["guess"] >= 0 && $_POST["guess"] <= 100) {
        $guess = $_POST["guess"];
        array_push($attempts, $guess);
      } else {
        echo "Пожалуйста, введите корректное число от 0 до 100.\n";
        exit();
      }

      while (!$guessed) {

        if ($guess == $secretNumber) {
          $guessed = true;
          echo "Поздравляем, вы угадали число $secretNumber за " . count($attempts) . " попыток!\n";
        } else if ($guess < $secretNumber) {
          echo "Загаданное число больше, чем $guess. Попробуйте еще раз.\n";
        } else {
          echo "Загаданное число меньше, чем $guess. Попробуйте еще раз.\n";
        }

        if (count($attempts) > 1) {
          echo "Ваши предыдущие попытки: " . implode(", ", $attempts) . "\n";
        }

        if (!$guessed) {
          if (isset($_POST["guess"]) && is_numeric($_POST["guess"]) && $_POST["guess"] >=0 && $_POST["guess"]<=100){
            $guess=$_POST["guess"];
          }else{
            echo "Пожалуйста введите корректное число от 0 до 100.\n";
          }
        }
      }
    }
    ?>
  </body>
</html>