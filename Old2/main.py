import serial
import time
import json

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
    strh = msgh.decode()[10:15]

    ser.write(b'3') # Запросить температуру
    msgt = ser.readline()
    strt = msgt.decode()[13:18]

    data = {'codeParams1': strt,
            'codeParams2': strh}

    with open('sensor.ini', 'w') as outfile:
       json.dump(data, outfile)