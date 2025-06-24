<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="3;url=login.html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout - Portal Surat Kepegawaian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: url('bgtk.jpeg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.35);
      z-index: 0;
    }

    .logout-box {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-radius: 1rem;
      padding: 3rem 2rem;
      max-width: 500px;
      width: 90%;
      color: white;
      text-align: center;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        transform: translateY(30px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    p {
      color: #f0f0f0;
      font-size: 1rem;
    }

    a {
      margin-top: 1.5rem;
      display: inline-block;
      color: #ffdd57;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #ffffff;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <div class="logout-box">
    <h1><i class="bi bi-box-arrow-right"></i> Anda telah logout</h1>
    <p>Anda akan diarahkan ke halaman login dalam beberapa detik...</p>
    <a href="login.html">Klik di sini jika tidak diarahkan otomatis</a>
  </div>
</body>
</html>
