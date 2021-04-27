<?php
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $token = "1653147642:AAGdSlQOw5v4X2xsyM0GGGYi_AeqYbOSkP4";
    $chat_id = "-1001402000585";
 
    if (!empty($_POST['pop-up__name']) && !empty($_POST['pop-up__tel'])){
        $bot_url = "https://api.telegram.org/bot{$token}/";
 
        if (isset($_POST['pop-up__name'])) {
          if (!empty($_POST['pop-up__name'])){
            $name = "Имя пославшего: " . strip_tags($_POST['pop-up__name']) . "%0A";
          }
        }
 
        if (isset($_POST['pop-up__tel'])) {
          if (!empty($_POST['pop-up__tel'])){
            $phone = "Телефон: " . "%2B" . strip_tags($_POST['pop-up__tel']) . "%0A";
          }
        }
 
        // Формируем текст сообщения
        $txt = "Запрос на консультацию: " . $name . $phone;
 
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