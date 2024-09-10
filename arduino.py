from flask import Flask, request, jsonify
import serial
import requests
import threading

app = Flask(__name__)

ser = serial.Serial('COM7')

@app.route('/api/send-to-arduino', methods=['POST'])
def send_to_arduino():
    data = request.json
    word = data['word']
    ser.write(word.encode())

def listen_to_arduino():
    while True:
        if ser.in_waiting > 0:
            command = ser.readline().decode('utf-8').strip()
            print(command)
            if command == 'next_word':
                print("Comando recebido: Próxima palavra")
                requests.post('http://localhost:8000/api/arduino-next-word')

thread = threading.Thread(target=listen_to_arduino)
thread.daemon = True
thread.start()

if __name__ == '__main__':
    app.run(port=5000)
