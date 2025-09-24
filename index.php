<?php
// index.php - Zesty Bites (full replaceable code)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Zesty Bites Restaurant</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root{
      --light-orange:#fbeed7;
      --vivid-orange:#c83604;
      --orange:#f9ab1f;
      --dark-brown:#2a1503;
      --dark-green:#296713;
    }

    *{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}
    body{background:var(--light-orange);color:var(--dark-brown);transition:all .25s ease;}
    body.dark{background:#121212;color:#fbeed7;}

    a{text-decoration:none;color:inherit}

    /* ---------- HEADER ---------- */
    header{
      display:flex;align-items:center;justify-content:space-between;
      gap:12px;padding:14px 22px;background:var(--vivid-orange);color:white;
      position:sticky;top:0;z-index:9999;
    }
    header h1{font-family:'Fredoka One',cursive;font-size:22px;display:flex;align-items:center;gap:10px}
    header img.logo{height:38px;width:38px;border-radius:8px;object-fit:cover}

    nav{display:flex;gap:14px;align-items:center}
    nav a{color:white;font-weight:600;padding:8px 10px;border-radius:6px;transition:all .18s}
    nav a:hover{background:rgba(0,0,0,0.08);color:var(--orange)}

    #toggleMode{
      background:var(--orange);border:none;padding:8px 10px;border-radius:999px;font-size:18px;
      display:inline-flex;align-items:center;justify-content:center;cursor:pointer;transition:all .18s;
    }
    #toggleMode:hover{transform:scale(1.06);background:var(--vivid-orange)}

    #menuToggle{display:none;flex-direction:column;gap:5px;cursor:pointer}
    #menuToggle span{width:24px;height:3px;background:#fff;border-radius:2px;display:block}

    @media (max-width:880px){
      nav{display:none;position:absolute;top:64px;right:18px;background:var(--vivid-orange);padding:12px;border-radius:10px;flex-direction:column;min-width:160px}
      nav.active{display:flex}
      #menuToggle{display:flex}
    }

    /* ---------- HERO ---------- */
    .hero{
      min-height:70vh;display:flex;align-items:center;justify-content:center;text-align:center;position:relative;
      background:linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.35)), url('assets/images/combo3.jpg') center/cover no-repeat;
      color:#fff;padding:48px 20px;
    }
    .hero .inner{max-width:980px}
    .hero h2{font-family:'Fredoka One',cursive;font-size:46px;margin-bottom:8px;color:var(--orange);text-shadow:0 6px 20px rgba(0,0,0,0.45)}
    .hero p{font-size:18px;margin-bottom:18px;opacity:.95}
    .hero .cta{background:var(--orange);border:none;padding:12px 22px;border-radius:10px;font-weight:700;cursor:pointer}
    .hero .cta:hover{background:var(--vivid-orange);color:#fff;transform:translateY(-2px)}

    section{padding:60px 18px}
    section h3{font-family:'Fredoka One',cursive;color:var(--vivid-orange);margin-bottom:16px;font-size:26px;text-align:center}

    /* ---------- ABOUT ---------- */
    .about-wrap{display:flex;gap:28px;align-items:center;justify-content:center;flex-wrap:wrap;max-width:1100px;margin:0 auto}
    .about-left,.about-right{flex:1 1 320px}
    .about-left img{width:100%;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,0.12);animation:floatImg 4s ease-in-out infinite}
    @keyframes floatImg{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
    .about-card{background:#fff;padding:18px;border-radius:12px;box-shadow:0 8px 24px rgba(0,0,0,0.08);transition:.3s;text-align:left;opacity:0;transform:translateY(30px);}
    .about-card.show{opacity:1;transform:translateY(0)}
    .about-card:hover{transform:translateY(-6px) scale(1.02);background:var(--orange);color:#fff}

    /* ---------- MENU ---------- */
    .menu-grid{display:flex;gap:20px;align-items:flex-start;justify-content:center;max-width:1200px;margin:0 auto;flex-wrap:wrap}
    .menu-list{display:flex;flex-wrap:wrap;gap:18px;flex:0 0 68%}
    .menu-item{width:190px;height:190px;border-radius:12px;overflow:hidden;cursor:pointer;box-shadow:0 6px 20px rgba(0,0,0,0.12);position:relative;background:#fff}
    .menu-item img{width:100%;height:100%;object-fit:cover;transition:transform .45s,opacity .25s}
    .menu-item:hover img{transform:scale(1.08);opacity:.45}
    .menu-item .mi-name{position:absolute;left:12px;bottom:12px;background:rgba(200,54,4,0.92);color:#fff;padding:8px 10px;border-radius:8px;font-weight:700}
    .menu-detail{flex:0 0 28%;min-width:220px;background:#fff;padding:16px;border-radius:12px;box-shadow:0 8px 24px rgba(0,0,0,0.08);text-align:center}
    .menu-detail img{width:100%;height:160px;object-fit:cover;border-radius:8px;margin-bottom:12px}

    /* ---------- GALLERY (Carousel) ---------- */
    .gallery-container{overflow:hidden;max-width:1100px;margin:0 auto;position:relative}
    .gallery-track{display:flex;gap:16px;animation:scrollGallery 25s linear infinite}
    @keyframes scrollGallery{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
    .gallery-card{flex:0 0 260px;height:170px;border-radius:12px;overflow:hidden;box-shadow:0 8px 26px rgba(0,0,0,0.12);cursor:pointer;position:relative}
    .gallery-card img{width:100%;height:100%;object-fit:cover}

    /* ---------- OFFERS ---------- */
    .offers{display:flex;gap:18px;flex-wrap:wrap;justify-content:center;max-width:1100px;margin:0 auto}
    .offer-card{width:320px;border-radius:12px;overflow:hidden;background:#fff;box-shadow:0 10px 30px rgba(0,0,0,0.12);transition:.3s;opacity:0;transform:translateY(40px)}
    .offer-card.show{opacity:1;transform:translateY(0)}
    .offer-card:hover{transform:translateY(-8px) scale(1.03)}
    .offer-card img{width:100%;height:200px;object-fit:cover}
    .offer-card .offer-body{padding:14px}

    /* ---------- CONTACT ---------- */
    .contact-wrap{display:flex;gap:18px;flex-wrap:wrap;justify-content:center;max-width:1100px;margin:0 auto}
    .contact-card,.map-card{flex:1 1 340px;border-radius:12px;background:#fff;padding:18px;box-shadow:0 10px 30px rgba(0,0,0,0.08)}
    .contact-card form input,.contact-card form textarea{width:100%;padding:10px;border-radius:8px;border:1px solid #ddd;margin-bottom:10px}
    .contact-card form button{background:var(--orange);border:none;padding:12px 16px;border-radius:10px;font-weight:700;cursor:pointer;transition:.3s}
    .contact-card form button:hover{background:var(--vivid-orange);color:#fff;transform:scale(1.05)}

    /* ---------- FOOTER ---------- */
    footer{background:var(--dark-brown);color:#fff;padding:36px 18px}
    .footer-container{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px}
    .footer-col h4{font-family:'Fredoka One',cursive;color:var(--orange);margin-bottom:12px}
    .social-icons{display:flex;gap:12px;margin-top:8px}
    .social-icons a{background:rgba(255,255,255,0.08);padding:8px 10px;border-radius:8px;color:#fff}

    /* ---------- SCROLL TOP ---------- */
    #scrollTop{position:fixed;bottom:22px;right:22px;background:var(--orange);color:#fff;border:none;padding:12px;border-radius:50%;box-shadow:0 8px 18px rgba(0,0,0,0.18);cursor:pointer;display:none}
    #scrollTop:hover{background:var(--vivid-orange);transform:translateY(-3px)}
  </style>
</head>
<body>

  <!-- HEADER -->
  <header>
    <h1>
      <a href="index.php">
        <img class="logo" src="assets/images/logo.png" alt="Zesty logo"> Zesty Bites
      </a>
    </h1>
    <div id="menuToggle"><span></span><span></span><span></span></div>
    <nav id="mainNav">
      <a href="#about">About</a>
      <a href="#menu">Menu</a>
      <a href="#gallery">Gallery</a>
      <a href="#offers">Offers</a>
      <a href="#contact">Contact</a>
    </nav>
    <button id="toggleMode">🌙</button>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="inner">
      <h2>Zesty Bites</h2>
      <p>Flavors That Spark Joy! — Fresh, fast & full of love.</p>
      <button class="cta" onclick="document.getElementById('menu').scrollIntoView({behavior:'smooth'})">View Menu</button>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about">
    <h3>About Us</h3>
    <div class="about-wrap">
      <div class="about-left"><img src="assets/images/cheeseburger1.jpg" alt="Cheese Burger"></div>
      <div class="about-right">
        <div class="about-card"><h4>Our Mission</h4><p>Serve fresh, delicious meals made quickly with tidy hygiene and friendly faces.</p></div>
        <div class="about-card"><h4>Owner</h4><p>Harsh Pandey — passionate about taste & quality.</p></div>
        <div class="about-card"><h4>Specialties</h4><p>Fresh Ingredients • Hygienic Prep • Quick Service</p></div>
      </div>
    </div>
  </section>

  <!-- MENU -->
  <section id="menu">
    <h3>Our Menu</h3>
    <div class="menu-grid">
      <div class="menu-list">
        <?php
        $menuItems = array(
          array("name"=>"Cheese Burger","desc"=>"Juicy Cheese Burger with fresh lettuce and tomato.","img"=>"assets/images/cheeseburger1.jpg"),
          array("name"=>"Chilli Potato","desc"=>"Spicy Chilli Potato tossed with sauces.","img"=>"assets/images/chillipotato.jpg"),
          array("name"=>"Cold Coffee","desc"=>"Refreshing Cold Coffee.","img"=>"assets/images/coldcoffee.jpg"),
          array("name"=>"Veg Momos","desc"=>"8 pcs Veg Momos with chutney.","img"=>"assets/images/vegmomo.jpg"),
          array("name"=>"Combo 2","desc"=>"Burger + Spring Roll + Drink combo.","img"=>"assets/images/combo2.jpg"),
          array("name"=>"Veg Burger","desc"=>"Fresh Veg Burger with slaw.","img"=>"assets/images/vegburger.jpg"),
          array("name"=>"Spring Roll","desc"=>"Crispy Spring Roll (2 pcs).","img"=>"assets/images/springroll.jpg"),
          array("name"=>"Paneer Momos","desc"=>"8 pcs Paneer Momos with chutney.","img"=>"assets/images/paneermomo.jpg"),
        );
        foreach($menuItems as $item){
          echo '<div class="menu-item menu-card" data-name="'.htmlspecialchars($item['name']).'" data-desc="'.htmlspecialchars($item['desc']).'" data-img="'.htmlspecialchars($item['img']).'">';
          echo '<img src="'.htmlspecialchars($item['img']).'" alt="'.htmlspecialchars($item['name']).'">';
          echo '<div class="mi-name">'.htmlspecialchars($item['name']).'</div>';
          echo '</div>';
        }
        ?>
      </div>
      <aside class="menu-detail" id="menuDetail">
        <img id="menuDetailImg" src="assets/images/cheeseburger1.jpg" alt="Selected dish">
        <h4 id="menuDetailName">Cheese Burger</h4>
        <p id="menuDetailDesc">Juicy Cheese Burger with fresh lettuce and tomato.</p>
      </aside>
    </div>
  </section>

  <!-- GALLERY (Auto-scrolling) -->
  <section id="gallery">
    <h3>Gallery</h3>
    <div class="gallery-container">
      <div class="gallery-track">
        <div class="gallery-card"><img src="assets/images/cheeseburger1.jpg" alt="Cheese Burger"></div>
        <div class="gallery-card"><img src="assets/images/chillipotato.jpg" alt="Chilli Potato"></div>
        <div class="gallery-card"><img src="assets/images/coldcoffee.jpg" alt="Cold Coffee"></div>
        <div class="gallery-card"><img src="assets/images/combo1.webp" alt="Combo 1"></div>
        <div class="gallery-card"><img src="assets/images/combo2.jpg" alt="Combo 2"></div>
        <!-- Duplicate for infinite effect -->
        <div class="gallery-card"><img src="assets/images/cheeseburger1.jpg" alt="Cheese Burger"></div>
        <div class="gallery-card"><img src="assets/images/chillipotato.jpg" alt="Chilli Potato"></div>
        <div class="gallery-card"><img src="assets/images/coldcoffee.jpg" alt="Cold Coffee"></div>
        <div class="gallery-card"><img src="assets/images/combo1.webp" alt="Combo 1"></div>
        <div class="gallery-card"><img src="assets/images/combo2.jpg" alt="Combo 2"></div>
      </div>
    </div>
  </section>

  <!-- OFFERS -->
  <section id="offers">
    <h3>Special Offers</h3>
    <div class="offers">
      <div class="offer-card"><img src="assets/images/vegburger.jpg" alt="Veg Burger"><div class="offer-body"><h4>Veg Burger Offer</h4><p>Buy 1 Get 1 Free (Weekend Special)</p></div></div>
      <div class="offer-card"><img src="assets/images/springroll.jpg" alt="Spring Roll"><div class="offer-body"><h4>Spring Roll Combo</h4><p>2 Spring Rolls + Dip — discount</p></div></div>
      <div class="offer-card"><img src="assets/images/chillipotato.jpg" alt="Chilli Potato"><div class="offer-body"><h4>Chilli Potato Deal</h4><p>2 plates for a discounted price</p></div></div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact">
    <h3>Contact & Booking</h3>
    <div class="contact-wrap">
      <div class="contact-card">
        <h4>Send a Message / Book</h4>
        <form action="process_form.php" method="POST">
          <input name="name" type="text" placeholder="Your name" required>
          <input name="email" type="email" placeholder="Your email (optional)">
          <input name="mobile" type="text" placeholder="Mobile number" required>
          <textarea name="message" rows="5" placeholder="Message / booking details" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
      <div class="map-card">
        <iframe src="https://maps.google.com/maps?q=Lucknow&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy" style="width: 100%;height: 100%;"></iframe>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="footer-container">
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#offers">Offers</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact Info</h4>
        <p>📍 Hazratganj, Lucknow</p>
        <p>📞 +91 9876543210</p>
      </div>
      <div class="footer-col">
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i>FB</a>
          <a href="#"><i class="fab fa-instagram"></i>IG</a>
          <a href="#"><i class="fab fa-twitter"></i>TW</a>
        </div>
      </div>
    </div>
    <p style="margin-top:18px;text-align:center;font-size:14px">&copy; 2025 Zesty Bites. All rights reserved.</p>
  </footer>

  <button id="scrollTop">↑</button>

  <script>
    // Toggle nav
    document.getElementById('menuToggle').addEventListener('click', ()=>document.getElementById('mainNav').classList.toggle('active'));
    // Dark mode
    document.getElementById('toggleMode').addEventListener('click', ()=>document.body.classList.toggle('dark'));
    // Scroll top
    const scrollBtn=document.getElementById('scrollTop');
    window.addEventListener('scroll',()=>scrollBtn.style.display=window.scrollY>250?'block':'none');
    scrollBtn.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));
    // Menu hover detail
    document.querySelectorAll('.menu-card').forEach(card=>{
      card.addEventListener('mouseenter',()=>{
        document.getElementById('menuDetailImg').src=card.dataset.img;
        document.getElementById('menuDetailName').textContent=card.dataset.name;
        document.getElementById('menuDetailDesc').textContent=card.dataset.desc;
      });
    });
    // Reveal cards on scroll
    const revealCards=()=>{document.querySelectorAll('.about-card,.offer-card').forEach(el=>{if(el.getBoundingClientRect().top<window.innerHeight-80)el.classList.add('show')})}
    window.addEventListener('scroll',revealCards);window.addEventListener('load',revealCards);
  </script>
  <script src="https://kit.fontawesome.com/a2d9d6a04d.js" crossorigin="anonymous"></script>
  <?php
  if(isset($_GET['success'])){
  echo "
  <script>
    alert('Congratulation! Your inquery successfully send to owner.');
  </script>";}
  ?>


</body>
</html>
