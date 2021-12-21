import  requests
import json
import mysql.connector
query = input("Enter Query TO Get From crt.sh:")
# 'islamicbank.ps'
r = requests.get('https://crt.sh/?q='+query+'&output=json').json()

db = mysql.connector.connect(
    host="localhost", 
    user="root",
    passwd="",
    database="laravel_db"
)
my_cursor = db.cursor()
sql="INSERT INTO certificates (issuer_ca_id,issuer_name,common_name,name_value,entry_timestamp,not_before,not_after,serial_number) values (%s,%s,%s,%s,%s,%s,%s,%s)"
for row in r:
    my_cursor.execute(sql,(row['issuer_ca_id'],row['issuer_name'],row['common_name'],row['name_value'],row['entry_timestamp'],row['not_before'],row['not_after'],row['serial_number']))
    db.commit()
print('done its in your Database')
