from flask import Flask, request, jsonify
import serial
import threading

app = Flask(__name__)

ser = serial.Serial('COM7', baudrate=9600, timeout=1)

serial_data = None

def read_serial():
    global serial_data
    while True:
        try:
            if ser.in_waiting > 0:
                serial_data = ser.readline().decode('utf-8').rstrip()
                print(f"Dados recebidos do Arduino: {serial_data}")
        except Exception as e:
            print(f"Erro ao ler da porta serial: {e}")

# Inicia a thread de leitura serial
serial_thread = threading.Thread(target=read_serial)
serial_thread.daemon = True
serial_thread.start()

@app.route('/api/send-to-arduino', methods=['POST'])
def send_to_arduino():
    data = request.json
    word = data['word']
    print(word)
    try:
        ser.write(word.encode())
        return jsonify({"status": True}), 200
    except:
        return jsonify({'status': False}), 500

if __name__ == '__main__':
    app.run(port=5000)
