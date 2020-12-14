from sense_hat import SenseHat
import mysql.connector as mariadb
from datetime import datetime
import sys, sched, time

sense = SenseHat()
s = sched.scheduler(time.time, time.sleep)

try:
    conn = mariadb.connect(user="", password="", host="", port=3306, database="nerdygadgets")   
except mariadb.Error as e:
    print(f"Error connecting to MariaDB Platform: {e}")
    sys.exit(1)

cur = conn.cursor()

def get_temperature(): 
    return sense.get_temperature_from_humidity()

def set_temperature(sc): 
    temp = get_temperature()
    print(f'the temp is: {temp}')
    
    cur.execute("UPDATE `coldroomtemperatures` SET `Temperature`=%s, `RecordedWhen`=%s, `ValidFrom`=%s WHERE ColdRoomSensorNumber = 5", [temp, datetime.now(), datetime.now()])
    conn.commit()

    s.enter(3, 1, do_something, (sc,))

s.enter(3, 1, do_something, (s,))
s.run()
