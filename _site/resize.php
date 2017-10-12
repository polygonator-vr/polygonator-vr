<?php
    function readFolderWithImagesAndResize($paths) {
        $allowed_types=array("jpg", "png", "gif");  //разрешеные типы изображений
        $all_files = array();
        $all_files_small = array();

        foreach ($paths as $path) {
            $dir_handle = @opendir($path) or die("Ошибка при открытии папки !!!");
            $files = scandir($path);
            $files_small = scandir($path);

            $len = count($files);
            for ($i = 0; $i < $len; $i++) {
                if($files[$i] == "." || $files[$i] == "..") continue;  //пропустить ссылки на другие папки

                $files_small[$i] = $path.'_min/'.$files[$i];
                $files[$i] = $path.'/'.$files[$i];
            }
            $all_files = array_merge($all_files, $files);
            $all_files_small = array_merge($all_files_small, $files_small);

            closedir($dir_handle);
        }

        $array_size = count($all_files);
        for ($i = 0; $i < $array_size; $i++) {
            if($all_files[$i] == "." || $all_files[$i] == "..") continue;  //пропустить ссылки на другие папки

            $file_parts = explode(".",$all_files[$i]);          //разделить имя файла и поместить его в массив
            $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение

            if(in_array($ext,$allowed_types))
            {
                resizeImage($all_files[$i], $all_files_small[$i]);
            }
        }

        echo "Изображения успешно сжаты";
    }

    $paths = array(
        "img/services/visualization",
        "img/services/interactive",
        "img/services/modelling",
    );



    function resizeImage($filename, $filename_new) {
        // файл
        // задание максимальной ширины и высоты
        $width = 600;
        $height = 600;

        // тип содержимого
        header('Content-Type: image/jpeg');

        // получение новых размеров
        list($width_orig, $height_orig) = getimagesize($filename);

        $ratio_orig = $width_orig/$height_orig;

        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }

        // ресэмплирование
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        // вывод
        imagejpeg($image_p, $filename_new, 100);
    }


    readFolderWithImagesAndResize($paths);
