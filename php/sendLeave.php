<?php
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $token = "1653147642:AAGdSlQOw5v4X2xsyM0GGGYi_AeqYbOSkP4";
    $chat_id = "-1001402000585";
 
    if (!empty($_POST['pop-up-leave__email'])){
        $bot_url = "https://api.telegram.org/bot{$token}/";
 
        if (isset($_POST['pop-up-leave__email'])) {
          if (!empty($_POST['pop-up-leave__email'])){
            $text = "Почта пославшего: " . strip_tags($_POST['pop-up-leave__email']) . "%0A";
          }
        }
 
 
 
        // Формируем текст сообщения
        $txt = "Запрос на чек лист: " . $text;
 
        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
        if ($output && $sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
        } elseif ($sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
          return true;
        } else {
            $msgs['err'] = 'Ошибка. Сообщение не отправлено!';
            echo json_encode($msgs);
            die('Ошибка. Сообщение не отправлено!');
        }
 
    } else {
        $msgs['err'] = 'Ошибка. Вы заполнили не все обязательные поля!';
        echo json_encode($msgs);;
    }
} else {
  header ("Location: /");
}
?>