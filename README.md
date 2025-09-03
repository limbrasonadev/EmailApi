    SendEmailAPI
    - This project demonstrates how to send emails using the SendGrid API with PHP.

    Purpose
    The goal of this code is to provide a simple way to send an email via SendGrid API.  
    Users can fill out a form with:
    - Recipient email  
    - Subject/title  
    - Message  

    When submitted, the app makes a `cURL` request to the SendGrid API endpoint.  
    SendGrid then processes the request and responds whether the email was sent successfully or failed.

    Setup Instructions:

    1. Sign up on SendGrid
    - Create a SendGrid account at [https://sendgrid.com].
    - Verify your account.

    2. Save Important Credentials
    Keep these safe and never share publicly:
    - Recovery code  
    - API key  
    - Password  

    Never commit your API key to GitHub.

    3. Configure .env
    - Inside the SendEmailAPI folder, create a .env file and add your SendGrid API key:

    inside at .env
    APIKEY=yourAPIKEY

    4. Update Verified Sender
    - In sendemail_api.php, update the sender email with your verified SendGrid account email:
      $emaildata["from"] = "youremail@example.com";

    5. Run the Project

    - Start your local server XAMPP.
    - Open index.html in your browser.
    - Fill in the form (recipient email, subject, and message).
    - Submit and SendGrid will send the email.

    Reminder: 

    .env is ignored in GitHub for security reasons.

    To help others run the project, include a .env.example file with placeholder content:

    APIKEY=yourAPIKEYHERE

    Project Files

    index.html > The frontend greeting

    sendemail_form.php > The frontend form

    sendemail_api.php > Handles API request to SendGrid

    .env > Stores your API key (not uploaded to GitHub)

    Example request and response

  Request
    {
  "to": "ehliforeducation@gmail.com",
  "subject": "Hello",
  "message": "This is a test email sent using the API!"
    }
    
  Response
    {
    "success": true,
    "message": "Email sent successfully!"
    }


