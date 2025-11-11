<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Inventify</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }

      body, html {
        height: 100%;
        font-family: 'Public Sans', sans-serif;
        overflow: hidden;
      }

      .authentication-wrapper {
        position: relative;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(120deg, #4a90e2, #3f7de3, #5a9bf6);
        background-size: 300% 300%;
        animation: gradientShift 10s ease infinite;
        overflow: hidden;
      }

      @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }

      .sparkles, .falling-items {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        overflow: hidden;
        pointer-events: none;
      }

      .sparkle {
        position: absolute;
        width: 4px; height: 4px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        animation: blink 3s infinite ease-in-out;
      }

      @keyframes blink {
        0%, 100% { opacity: 0; transform: scale(0.5); }
        50% { opacity: 1; transform: scale(1.3); }
      }

      .falling-item {
        position: absolute;
        font-size: 22px;
        opacity: 0.9;
        animation: fall linear infinite;
      }

      @keyframes fall {
        0% { transform: translateY(-10%) rotate(0deg); opacity: 1; }
        100% { transform: translateY(110vh) rotate(360deg); opacity: 0.6; }
      }

      .card {
        position: relative;
        z-index: 10;
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        width: 400px;
        max-width: 90%;
        color: #fff;
        text-align: center;
        padding: 30px 30px 40px;
      }

      .card img {
        width: 80px;
        height: 60px;
      }

      .app-brand-text {
        font-size: 1.8rem;
        font-weight: 700;
        color: #fff;
        margin-top: 5px;
        margin-bottom: 10px;
      }

      h4, p, label {
        color: #fff;
      }

      p { margin-bottom: 20px; }

      .form-control {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.3);
        color: #000;
      }

      .mb-3 { text-align: left; margin-bottom: 15px; }

      .form-check {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
      }

      .btn-primary {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        color: black;
        cursor: pointer;
        background: linear-gradient(90deg, #007bff, #4facfe);
        transition: 0.3s ease;
      }

      .btn-primary:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
      }

      .top-right-bar {
        position: absolute;
        top: 20px;
        right: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 40;
      }

      .icon-btn {
        color: white;
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s;
      }

      .icon-btn:hover {
        background: rgba(255,255,255,0.4);
        transform: scale(1.1);
      }

      .clock-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        width: 250px;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.4s ease;
        z-index: 50;
        box-shadow: 0 0 25px rgba(255,255,255,0.4);
      }

      .clock-modal.show {
        transform: translate(-50%, -50%) scale(1);
      }

      canvas {
        width: 200px;
        height: 200px;
      }

      .about-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(15px);
        border-radius: 15px;
        width: 380px;
        max-width: 90%;
        padding: 25px;
        text-align: center;
        transition: 0.4s ease;
        z-index: 60;
        box-shadow: 0 0 25px rgba(255,255,255,0.4);
      }

      .about-modal.show {
        transform: translate(-50%, -50%) scale(1);
      }

      .about-modal h3 { 
        margin-bottom: 10px; 
        color: #03090eff;
      }

      .about-modal p {
        color: black;
        font-weight: 500;
      }

      .close-about {
        margin-top: 15px;
        padding: 8px 14px;
        background: rgba(255,255,255,0.7);
        border: none;
        border-radius: 8px;
        color: #000;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 600;
      }

      .close-about:hover {
        background: rgba(79, 172, 254, 0.6);
        color: white;
      }
    </style>
  </head>

  <body>
    <div class="authentication-wrapper">
      <div class="sparkles"></div>
      <div class="falling-items"></div>

      <div class="top-right-bar">
        <div class="icon-btn" id="clockBtn">🕒</div>
        <div class="icon-btn" id="aboutBtn">ℹ️ About</div>
      </div>

      <div class="clock-modal" id="clockModal">
        <canvas id="clockCanvas" width="200" height="200"></canvas>
      </div>

      <div class="about-modal" id="aboutModal">
        <h3>Tentang Inventify</h3>
        <p>Inventify adalah sistem manajemen inventaris modern yang membantu memantau dan mengelola barang secara efisien, cepat, dan aman.</p>
        <button class="close-about" id="closeAbout">Tutup</button>
      </div>

      <div class="card">
        <div class="app-brand">
          <img src="{{ asset('img/icons/misc/logo-inves.jpg.png') }}" alt="Inventify Logo">
          <div class="app-brand-text">Inventify</div>
        </div>

        <p>Silahkan login untuk masuk ke INVENTIFY</p>

        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan alamat email">
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="********">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
            <label class="form-check-label" for="remember-me">Selalu ingat saya</label>
          </div>
          <button type="submit" class="btn-primary">Login</button>
        </form>
      </div>
    </div>

    <script>
      const sparkles = document.querySelector('.sparkles');
      for (let i = 0; i < 40; i++) {
        const s = document.createElement('div');
        s.classList.add('sparkle');
        s.style.top = Math.random() * 100 + 'vh';
        s.style.left = Math.random() * 100 + 'vw';
        s.style.animationDelay = Math.random() * 5 + 's';
        s.style.animationDuration = 2 + Math.random() * 3 + 's';
        sparkles.appendChild(s);
      }

      const items = ['✏️', '📚', '📏', '👜'];
      const fallContainer = document.querySelector('.falling-items');
      for (let i = 0; i < 12; i++) {
        const el = document.createElement('div');
        el.classList.add('falling-item');
        el.textContent = items[Math.floor(Math.random() * items.length)];
        el.style.left = Math.random() * 100 + 'vw';
        el.style.animationDuration = 6 + Math.random() * 5 + 's';
        el.style.animationDelay = Math.random() * 3 + 's';
        fallContainer.appendChild(el);
      }

      const clockBtn = document.getElementById("clockBtn");
      const clockModal = document.getElementById("clockModal");
      clockBtn.addEventListener("click", () => clockModal.classList.toggle("show"));

      const aboutBtn = document.getElementById("aboutBtn");
      const aboutModal = document.getElementById("aboutModal");
      const closeAbout = document.getElementById("closeAbout");
      aboutBtn.addEventListener("click", () => aboutModal.classList.add("show"));
      closeAbout.addEventListener("click", () => aboutModal.classList.remove("show"));

      const canvas = document.getElementById("clockCanvas");
      const ctx = canvas.getContext("2d");
      const radius = canvas.height / 2;
      ctx.translate(radius, radius);

      function drawClock() {
        ctx.clearRect(-radius, -radius, canvas.width, canvas.height);
        drawFace(ctx, radius);
        drawNumbers(ctx, radius);
        drawTime(ctx, radius);
      }

      function drawFace(ctx, radius) {
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2 * Math.PI);
        ctx.fillStyle = "rgba(79, 172, 254, 0.15)";
        ctx.fill();
        ctx.strokeStyle = "#4facfe";
        ctx.lineWidth = 6;
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(0, 0, 5, 0, 2 * Math.PI);
        ctx.fillStyle = "#4facfe";
        ctx.fill();
      }

      function drawNumbers(ctx, radius) {
        ctx.font = radius * 0.15 + "px Arial";
        ctx.textBaseline = "middle";
        ctx.textAlign = "center";
        ctx.fillStyle = "#050b0fff";
        for (let num = 1; num <= 12; num++) {
          const ang = num * Math.PI / 6;
          ctx.rotate(ang);
          ctx.translate(0, -radius * 0.8);
          ctx.rotate(-ang);
          ctx.fillText(num.toString(), 0, 0);
          ctx.rotate(ang);
          ctx.translate(0, radius * 0.8);
          ctx.rotate(-ang);
        }
      }

      function drawTime(ctx, radius) {
        const now = new Date();
        let hour = now.getHours();
        let minute = now.getMinutes();
        let second = now.getSeconds();

        hour = hour % 12;
        hour = (hour * Math.PI / 6) + (minute * Math.PI / (6 * 60));
        drawHand(ctx, hour, radius * 0.5, 6, "#4facfe");

        minute = (minute * Math.PI / 30);
        drawHand(ctx, minute, radius * 0.75, 4, "#4facfe");

        second = (second * Math.PI / 30);
        drawHand(ctx, second, radius * 0.85, 2, "#ff4757");
      }

      function drawHand(ctx, pos, length, width, color="#fff") {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.strokeStyle = color;
        ctx.moveTo(0, 0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
      }

      setInterval(drawClock, 1000);
    </script>
  </body>
</html>
