from flask import Flask, jsonify, request
import smtplib as smtp
import random as r

app = Flask(__name__)


html = '''
    <html>
        <body>
            <h1>Daily S&P 500 prices report</h1>
            <p>Hello, welcome to your report!</p>
        </body>
    </html>
    '''


@app.route('/getotp', methods=['GET'])
def get():
    if(request.method == "GET"):
        otp = r.randint(1000, 9999)
        smtp_obj = smtp.SMTP("smtp.gmail.com", 587)
        smtp_obj.starttls()
        smtp_obj.login("nikhilkumarnk8520@gmail.com", "nkxkgqekcewpqhsr")
        mes = f"Subject: Email Verification (Snapshot)\n\n<h1>This is the otp {otp}</h1>"
        verfiy = smtp_obj.sendmail(
            "nikhilkumarnk8520@gmail.com", "nikhilkumarnk1142@gmail.com", html)
        data = {"otp": f"{otp}", "verify": verfiy}
        return jsonify(data)


if __name__ == '__main__':
    app.run(debug=True)
