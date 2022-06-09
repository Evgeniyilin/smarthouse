import serial
import time
import json
from configparser import ConfigParser

# Объявляем переменную ser типа serial, в которой указываем номер COM порта и скорости общения с подключенным устройством.
# В момент, когда запустится скрипт и после объявления переменной будет установливаться связь с Arduino, поэтому нужно добавить
# временную паузу, чтобы дать время на их сопряжение, если не сделать паузу, то последующие команды просто напросто не смогут быть выполнены
# и мы получим ошибку



# # print(config.sections())
#
# config.read('switch.ini')
# config.read('config.ini')
#
# print(type(config['CHECKBOX']['ch1']))
#
# # print(config['ch1'])

config = ConfigParser()
ser = serial.Serial(port='COM4', baudrate=9600)
time.sleep(2)

stop = 0
light1 = False
while stop != 1:  # Запускаем цикл

    config.read('switch.ini')
    if (config['CHECKBOX']['ch1']) == "1":
        ser.write(b'1') # Включить реле
    else:
        ser.write(b'0')
    # time.sleep(1)
    # ser.write(b'0') # Выключить реле
    # time.sleep(1)

    ser.write(b'2') # Запросить влажность
    msgh = ser.readline()
    strh = msgh.decode()[10:15]

    ser.write(b'3') # Запросить температуру
    msgt = ser.readline()
    strt = msgt.decode()[13:18]

    ser.write(b'4')  # Запросить температуру
    msgl = ser.readline()
    strl = msgl.decode()[8]

    if strl == "1":
        light1 = True
    else:
        light1 = False

    # print(strl)
    # time.sleep(1)

    # if light1 == False:
    #     light1 = True
    # else:
    #     light1 = False

    data = {'codeParams1': strt,
            'codeParams2': strh,
            'codeParams3': light1}

    with open('sensor.ini', 'w') as outfile:
       json.dump(data, outfile)