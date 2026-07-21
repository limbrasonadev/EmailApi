📧 SendEmailAPI

A simple PHP project that demonstrates how to send emails using the **SendGrid Email API**.

✨ Features

* Send emails using the SendGrid API
* Simple HTML/PHP interface
* Uses cURL to communicate with SendGrid
* Secure API key management with `.env`
* Easy to set up and run locally

---

📋 Project Overview

The application allows users to send an email by entering:

* 📩 Recipient Email
* 📝 Subject
* 💬 Message

When the form is submitted, PHP sends a **POST** request to the SendGrid API using **cURL**. SendGrid processes the request and returns a response indicating whether the email was sent successfully.

---

📁 Project Structure

```text
SendEmailAPI/
│
├── index.html            # Landing page
├── sendemail_form.php    # Email form
├── sendemail_api.php     # Handles SendGrid API request
├── .env                  # Stores API Key (not uploaded)
├── .env.example          # Example environment variables
└── README.md
```

---

🚀 Getting Started

1. Create a SendGrid Account

Create an account at:

> https://sendgrid.com

Verify your account before using the API.

---

2. Generate an API Key

Generate a **Mail Send API Key** from your SendGrid dashboard.

> **Never share your API key or upload it to GitHub.**

---

3. Configure Environment Variables

Create a `.env` file in the project root.

```env
APIKEY=your_sendgrid_api_key
```

A sample `.env.example` file is included.

```env
APIKEY=your_sendgrid_api_key_here
```

---

4. Configure the Sender Email

Open **sendemail_api.php** and replace the sender email with your verified SendGrid sender address.

```php
$emaildata["from"] = "youremail@example.com";
```

---

5. Run the Project

1. Start **Apache** using XAMPP.
2. Open the project in your browser.
3. Fill in the email form.
4. Click **Send**.

If everything is configured correctly, the email will be sent through SendGrid.

---

📤 Example Request

```json
{
  "to": "ehliforeducation@gmail.com",
  "subject": "Hello",
  "message": "This is a test email sent using the API!"
}
```

📥 Example Response

```json
{
  "success": true,
  "message": "Email sent successfully!"
}
```

---

🛠️ Built With

* PHP
* HTML
* cURL
* SendGrid Email API

---

🔒 Security

* Never commit your `.env` file.
* Keep your API key private.
* Add `.env` to your `.gitignore`.

---

📄 License

This project is intended for **educational purposes** and demonstrates how to integrate the **SendGrid Email API** into a PHP application.
