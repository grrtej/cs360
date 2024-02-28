from flask import Flask, render_template

app = Flask(__name__)

@app.route("/")
def index_page():
    return render_template('index.html', title="Home")

@app.route("/photos")
def photos_page():
    return render_template('photos.html', title="Photos")

@app.route("/bio")
def bio_page():
    return render_template('bio.html', title="Bio")

@app.route("/blog")
def blog_page():
    return render_template('blog.html', title="Blog")

@app.route("/contact")
def contact_page():
    return render_template('contact.html', title="Contact")
