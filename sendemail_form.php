<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sending Email</title>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #fff5f5;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .container {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(220, 38, 38, 0.15);
      max-width: 800px;
      width: 100%;
      display: grid;
      grid-template-columns: 1fr 1fr;
      overflow: hidden;
      font-size: 14px;
    }

    @media (max-width: 700px) {
      .container {
        grid-template-columns: 1fr;
        max-width: 400px; 
      }
    }

    .form-section {
      padding: 30px 25px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .form-header h2 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #b91c1c; 
      margin-bottom: 6px;
    }

    .form-header p {
      color: #000000ff;
      font-size: 0.9rem;
    }

    label {
      display: block;
      font-weight: 600;
      color: #000000ff;
      margin-bottom: 6px;
      font-size: 0.85rem;
    }

    input[type="email"],
    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px 12px;
      border: 2px solid #f87171;
      border-radius: 10px;
      font-size: 0.9rem;
      transition: border-color 0.3s ease;
      resize: vertical;
      font-family: inherit;
      color: #000000ff;
    }

    input[type="email"]:focus,
    input[type="text"]:focus,
    textarea:focus {
      outline: none;
      border-color: #b91c1c;
      box-shadow: 0 0 6px rgba(185, 28, 28, 0.5);
    }

    textarea {
      min-height: 100px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    button.btn-send {
      width: 100%;
      padding: 14px 0;
      background: #dc2626; 
      border: none;
      border-radius: 12px;
      color: white;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button.btn-send:hover {
      background: #f12020ff;
      box-shadow: 0 2px 2px rgba(49, 10, 10, 0.4);
    }

    .beside-div {
      background: #b91c1c; 
      color: #fee2e2; 
      padding: 30px 25px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      font-size: 0.9rem;
      line-height: 1.4;
    }

    .beside-div h3 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 18px;
      color: #ffffffff;
    }

    .beside-info {
      list-style: none;
      margin-bottom: 25px;
      padding-left: 0;
    }

    .beside-info li {
      position: relative;
      padding-left: 22px;
      margin-bottom: 12px;
    }

    .beside-info li::before {
      content: "✔";
      position: absolute;
      left: 0;
      top: 0;
      color: #fecaca;
      font-weight: 700;
      font-size: 1rem;
      line-height: 1;
    }

    .contacts {
      background: #991b1b;
      padding: 15px 18px;
      border-radius: 10px;
    }

    .contacts h4 {
      margin-bottom: 8px;
      font-weight: 600;
      color: #ffffffff;
    }

    .contacts p {
      margin-bottom: 6px;
      font-size: 0.85rem;
      color: #fee2e2;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-section">
      <div class="form-header">
        <h2>Send Email</h2>
        <p>Quickly send your message</p>
      </div>
      <form action="sendemail_api.php" method="POST">
        <div class="form-group">
          <label for="to">Send to:</label>
          <input type="email" id="to" name="to" required placeholder="yourgmail@gmail.com" />
        </div>
        <div class="form-group">
          <label for="subject">Title:</label>
          <input type="text" id="subject" name="subject" required placeholder="Email Subject" />
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" required placeholder="Write your message here..."></textarea>
        </div>
        <button type="submit" class="btn-send">Send Email</button>
      </form>
    </div>
    
    <div class="beside-div">
      <h3>Why Choose Our Service?</h3>
      <ul class="beside-info">
        <li>Fast and reliable delivery</li>
        <li>Secure SSL encryption</li>
        <li>Easy to use interface</li>
        <li>24/7 customer support</li>
        <li>Mobile friendly design</li>
      </ul>
      <div class="contacts">
        <h4>Need Help?</h4>
        <p>Email: ehliforeducation@gmail.com</p>
        <p>Phone: 09603637669</p>
      </div>
    </div>
  </div>
</body>
</html>
