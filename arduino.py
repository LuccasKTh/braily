from flask import Flask, request, jsonify
# import serial

app = Flask(__name__)

# ser = serial.Serial('COM7')

@app.route('/api/send-to-arduino', methods=['POST'])
def send_to_arduino():
    data = request.json
    word = data['word']
    print(word)
    try:
        # ser.write(word.encode())
        return jsonify({"status": True}), 200
    except:
        return jsonify({'status': False}), 500

if __name__ == '__main__':
    app.run(port=5000)
