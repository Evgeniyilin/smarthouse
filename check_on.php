<?php
	
	//Функция записи обычного или ассоциативного массива в файл ini-формате:
	
	function write_php_ini($array, $file)	//Обявляем функцию с 2-мя параметрами (Массив и имя файла)
	{
		$res = array();	//Создаем пустой массив res
		foreach($array as $key => $val) //Запускаем цикл перебора всех элементов массива
			{
        if(is_array($val)) //Если значение ключа является массивом, то запускаем ещё один цикл обработки массива
			{
            $res[] = "[$key]"; // заносим в массив $res элемент, который в будущем станет разделом с именем ключа в ini-файле!
            foreach($val as $skey => $sval) 
				$res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"'); // заносим в массив $res элемент, который станет строкой «ключ=значение».
			}
        else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"'); // заносим в массив $res элемент, который станет строкой «ключ=значение».
		}
		echo print_r($res), "<br />";
		echo implode("<br />", $res);
		safefilerewrite($file, implode("\r\n", $res));
	}

	function safefilerewrite($fileName, $dataToSave)	{    
		if ($fp = fopen($fileName, 'w'))	{
        $startTime = microtime(TRUE);
        do
        {            $canWrite = flock($fp, LOCK_EX);
           // Если файл заблокирован, то ждем пока не разблокируется
           if(!$canWrite) usleep(round(rand(0, 100)*1000));
        } while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));

        //Блокировка файла, чтобы спокойно можно было записать
        if ($canWrite)
        {            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
		}
	}
	safefilerewrite("switch.ini", "[CHECKBOX]\r\nch1 = 1")	
?>