import serial
import time

# Объявляем переменную ser типа serial, в которой указываем номер COM порта и скорости общения с подключенным устройством.
# В момент, когда запустится скрипт и после объявления переменной будет установливаться связь с Arduino, поэтому нужно добавить
# временную паузу, чтобы дать время на их сопряжение, если не сделать паузу, то последующие команды просто напросто не смогут быть выполнены
# и мы получим ошибку
ser = serial.Serial(port='COM4', baudrate=9600)
time.sleep(2)

stop = 0
while stop != 1:  # Запускаем цикл
    ser.write(b'1') # Включить реле
    time.sleep(1)
    ser.write(b'0') # Выключить реле
    time.sleep(1)

    ser.write(b'2') # Запросить влажность
    msgh = ser.readline()
    print(msgh)
    strh = msgh.decode()
    print(strh[10:12])

    ser.write(b'3') # Запросить температуру
    msgt = ser.readline()
    print(msgt)
    strt = msgt.decode()
    print(strt[13:15])


    f1 = open("test3.php", 'w')
    f1.write('<?php\n$result[0]["id.] = "'+strh[10:12]+'";\necho json_encode($result);\n?>')
    f1.close()

    f1 = open("test2.php", 'w')
    f1.write('<?php\n$result[0]["id"] = "' + strt[13:15] + '";\necho json_encode($result);\n?>')
    f1.close()