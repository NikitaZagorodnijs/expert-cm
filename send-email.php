<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $brand = htmlspecialchars($_POST['Brand']);
    $modelNumber = htmlspecialchars($_POST['modelNumber']);
    $serialNumber = htmlspecialchars($_POST['serialNumber']);
    $detailSpec = htmlspecialchars($_POST['detailSpec']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    // Проверка на наличие файла
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Загрузка файла в директорию (опционально)
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $imageUploadStatus = "Файл успешно загружен.";
        } else {
            $imageUploadStatus = "Ошибка загрузки файла.";
        }
    }

    // Формирование тела письма
    $to = "info@expert-cm.lv";  // Email получателя
    $subject = "Новое сообщение с сайта";
    $message = "
        <html>
        <head>
          <title>Новое сообщение с сайта</title>
        </head>
        <body>
          <p>Ražotāja nosaukums: $brand</p>
          <p>Pilns modeļa numurs: $modelNumber</p>
          <p>Sērijas numурс: $serialNumber</p>
          <p>Rezerves daļa apraksts: $detailSpec</p>
          <p>Tālruna numurs: $phoneNumber</p>
          <p>Email отправителя: $email</p>
          <p>foto :$fileName</p>
        </body>
        </html>
    ";
    
    // Заголовки для отправки email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";
    
    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Сообщение отправлено успешно.";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
}
?>
