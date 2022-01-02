<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5071035561:AAH2WJkJ0bZ3ggwfqgHWXSshrfICp0b_zyA";

//Сюда вставляем chat_id
$chat_id = "-620408331";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'Телефон:' => $phone
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Дякуємо! Протягом 10 хвилин з вами зв`яжеться наш адміністратор.');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Упс... Щось пішло не так, попробуйте ще раз.');
    }
}

?>