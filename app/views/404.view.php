<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      font-family: 'Roboto', sans-serif;
      color: #fff;
    }
    .container {
      text-align: center;
      padding: 40px 20px;
      background: rgba(255,255,255,0.05);
      border-radius: 20px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(6px);
      max-width: 400px;
      width: 100%;
    }
    .error-code {
      font-size: 8rem;
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      letter-spacing: 5px;
      background: linear-gradient(90deg, #ff8c00, #ff2d55);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin: 0;
    }
    .message {
      font-size: 1.5rem;
      margin: 20px 0 10px 0;
      font-weight: 500;
    }
    .description {
      font-size: 1rem;
      opacity: 0.8;
      margin-bottom: 30px;
    }
    .home-btn {
      display: inline-block;
      padding: 12px 32px;
      background: linear-gradient(90deg, #ff8c00, #ff2d55);
      color: #fff;
      border: none;
      border-radius: 30px;
      font-size: 1rem;
      font-weight: 700;
      text-decoration: none;
      box-shadow: 0 4px 14px rgba(255,45,85,0.2);
      transition: background 0.3s, transform 0.2s;
    }
    .home-btn:hover {
      background: linear-gradient(90deg, #ff2d55, #ff8c00);
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 6px 20px rgba(255,45,85,0.25);
    }
    @media (max-width: 500px) {
      .error-code {
        font-size: 4.5rem;
      }
      .container {
        padding: 24px 10px;
      }
      .message {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="error-code">404</div>
    <div class="message">Oops! Page Not Found</div>
    <div class="description">
      The page you are looking for doesn't exist or has been moved.<br>
      Let's get you back home!
    </div>
    <a href="login" class="home-btn">Go Home</a>
  </div>
</body>
</html>
