<?php
// index.php - Zesty Bites — Complete single-file landing page
// Replace existing project file with this. Requires assets/images/* to exist.
// Uses array(...) for PHP compatibility.
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Zesty Bites — Fresh · Fast · Flavorful</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root{--bg:#fff7f1;--accent:#e94e3a;--accent-2:#ffb86b;--muted:#6b6b6b;--card:#ffffff;--glass:rgba(255,255,255,0.75)}
    *{box-sizing:border-box}
    body{font-family:Inter,system-ui,Arial;background:var(--bg);color:#111;margin:0;-webkit-font-smoothing:antialiased}
    a{text-decoration:none;color:inherit}

  #preloader{
      position:fixed;inset:0;z-index:99999;
      background:white;
      display:flex;align-items:center;justify-content:center;
    }
    .loader{
      position:relative;
      width:180px;height:180px;
      display:flex;align-items:center;justify-content:center;
    }

    /*dark light toogle */
      .dark {
    --bg: #111;
    --card: #1b1b1b;
    --muted: #ccc;
    --accent: #ff7f50;
    --accent-2: #ffa07a;
    background: var(--bg);
    color: #fff;
  }

  .dark header {
    background: rgba(20,20,20,0.95);
  }

  .dark .food-card,
  .dark .about-card,
  .dark .contact-card {
    background: var(--card);
    color: #fff;
  }

  .dark a {
    color: #ffa07a;
  }

  .dark .btn {
    background: var(--accent);
    color: #fff;
  }

  .dark .hero h2, 
  .dark .hero p, 
  .dark .about-text p {
    color: #fff;
  }

  .dark .offers-marquee {
    background: linear-gradient(90deg, var(--accent), var(--accent-2));
    color: #fff;
  }
  
    /* LOGO */
    .loader img{
      width:90px;height:90px;
      border-radius:50%;
      animation:logoSpin 6s linear infinite;
      z-index:2;
      box-shadow:0 0 25px rgba(233,78,58,.6);
    }
    /* HEXAGON RING */
    .hex-ring{
      position:absolute;
      width:160px;height:160px;
      border:4px solid transparent;
      border-radius:50%;
      clip-path:polygon(
        50% 0%,
        93% 25%,
        93% 75%,
        50% 100%,
        7% 75%,
        7% 25%
      );
      background:conic-gradient(from 0deg,#e94e3a,#ffb86b,#e94e3a);
      animation:ringSpin 4s linear infinite;
      filter:drop-shadow(0 0 15px #e94e3a);
    }
    /* OUTER GLOW PULSE */
    .glow{
      position:absolute;
      width:200px;height:200px;
      border-radius:50%;
      background:radial-gradient(circle,rgba(233,78,58,.3),transparent 70%);
      animation:glowPulse 2s ease-in-out infinite;
      z-index:0;
    }

    @keyframes logoSpin{to{transform:rotate(360deg)}}
    @keyframes ringSpin{to{transform:rotate(-360deg)}}
    @keyframes glowPulse{
      0%,100%{transform:scale(1);opacity:.7}
      50%{transform:scale(1.2);opacity:.3}
    }

    /* NAVBAR */
    header{position:sticky;top:0;z-index:9990;background:rgba(255,255,255,0.95);backdrop-filter:blur(6px);box-shadow:0 6px 18px rgba(0,0,0,0.06)}
    .nav-wrap{max-width:1100px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;padding:14px 18px;gap:12px}
    .brand{display:flex;align-items:center;gap:12px}
    .brand img{width:52px;height:52px;border-radius:10px}
    .brand h1{font-family:'Fredoka One';font-size:20px;color:var(--accent);margin:0}
    nav.main{display:flex;gap:18px;align-items:center}
    nav.main a{font-weight:600;color:#222;padding:8px 10px;border-radius:8px}
    nav.main a:hover{background:#fff2ea}
    .actions{display:flex;align-items:center;gap:10px}
    .btn{background:var(--accent);color:#fff;border:none;padding:10px 14px;border-radius:10px;cursor:pointer;font-weight:700}
    .icon-btn{background:transparent;border:none;padding:8px;border-radius:8px;cursor:pointer}
    #hamburger{display:none}

    /* HERO */
    .hero{min-height:76vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(180deg,rgba(233,78,58,0.05),rgba(255,184,107,0.03)),url('assets/images/hero.jpg') center/cover no-repeat;padding:36px}
    .hero .inner{max-width:1100px;display:flex;gap:24px;align-items:center}
    .hero-left{flex:1}
    .eyebrow{display:inline-block;background:var(--accent);color:#fff;padding:6px 10px;border-radius:999px;font-weight:800}
    .hero h2{font-family:'Fredoka One';font-size:44px;margin:12px 0;color:#111}
    .hero p{color:var(--muted);font-size:18px}
    .hero .ctas{margin-top:18px;display:flex;gap:12px}

 .hero-card{width:360px;border-radius:18px;overflow:hidden;box-shadow:0 18px 48px rgba(0,0,0,0.12);position:relative}
.hero-slider{display:flex;transition:transform .6s ease;width:100%}
.hero-slider img{min-width:100%;height:420px;object-fit:cover}
.hero-prev,.hero-next{
  position:absolute;top:50%;transform:translateY(-50%);
  background:rgba(0,0,0,0.4);color:#fff;border:none;
  font-size:22px;padding:8px 12px;border-radius:50%;cursor:pointer;
}
.hero-prev{left:10px}
.hero-next{right:10px}

    /* SECTION HEADINGS */
    section{padding:64px 18px}
    .container{max-width:1100px;margin:0 auto}
    h3.section-title{font-family:'Fredoka One';color:var(--accent);text-align:center;margin-bottom:18px}

    /* ABOUT: carousel left, cards right */
    .about-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;align-items:center}
    .about-carousel{position:relative;border-radius:12px;overflow:hidden}
    .about-carousel img{width:100%;height:360px;object-fit:cover;display:block}
    .about-controls{position:absolute;left:12px;top:12px;display:flex;gap:8px}
    .about-controls button{background:rgba(255,255,255,0.85);border:none;padding:8px;border-radius:8px;cursor:pointer}
    .about-cards{display:grid;gap:12px}
    .about-card{background:var(--card);padding:18px;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,0.06);transition:transform .25s,box-shadow .25s}
    .about-card:hover{transform:translateX(6px);box-shadow:0 20px 50px rgba(0,0,0,0.08)}

    /* MENU: grid */
    .menu-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px}
    .food-card{background:var(--card);border-radius:12px;overflow:hidden;box-shadow:0 12px 30px rgba(0,0,0,0.06);cursor:pointer;transition:transform .25s}
    .food-card:hover{transform:translateY(-6px)}
    .food-card img{width:100%;height:170px;object-fit:cover}
    .food-card .body{padding:12px}
    .food-meta{display:flex;justify-content:space-between;align-items:center}
    .btn-cart{background:#fff;border:1px solid var(--accent);color:var(--accent);padding:8px 12px;border-radius:999px;cursor:pointer;font-weight:700}

    /* MODAL */
    .modal{position:fixed;inset:0;background:rgba(0,0,0,0.6);display:none;align-items:center;justify-content:center;z-index:12000;padding:18px}
    .modal.show{display:flex}
    .modal-box{width:100%;max-width:980px;background:#fff;border-radius:12px;overflow:hidden;display:flex;gap:12px}
    .modal-left{flex:1;padding:12px}
    .modal-left .main{width:100%;height:420px;background-size:cover;background-position:center;border-radius:8px}
    .thumbs{display:flex;gap:8px;margin-top:10px;overflow:auto}
    .thumbs img{width:80px;height:60px;object-fit:cover;border-radius:8px;cursor:pointer}
    .modal-right{width:340px;padding:18px;background:linear-gradient(180deg,#fff,#fff)}
    .modal-close{position:absolute;right:10px;top:8px;background:transparent;border:none;font-size:22px;cursor:pointer}

  /* GALLERY CAROUSEL */
.gallery-carousel{
  position:relative;
  overflow:hidden;
  max-width:100%;
  margin:20px auto;
}
.gallery-track{
  display:flex;
  transition:transform 0.6s ease;
}
.gallery-slide{
  flex:0 0 33.33%;  /* show 3 at a time */
  padding:10px;
  box-sizing:border-box;
}
.gallery-slide img{
  width:100%;
  height:220px;
  object-fit:cover;
  border-radius:12px;
  transition:transform 0.4s,border 0.4s;
}
.gallery-slide.active img{
  transform:scale(1.05);
  border:6px solid var(--accent);
}
.gallery-prev,.gallery-next{
  position:absolute;
  top:50%;transform:translateY(-50%);
  background:rgba(0,0,0,0.5);color:#fff;
  border:none;border-radius:50%;
  font-size:22px;
  padding:10px;cursor:pointer;
  z-index:2;
}
.gallery-prev{left:10px}
.gallery-next{right:10px}
.gallery-dots{text-align:center;margin-top:12px}
.gallery-dots button{
  width:10px;height:10px;border-radius:50%;
  border:none;margin:0 4px;cursor:pointer;
  background:#ccc;
}
.gallery-dots button.active{background:var(--accent);}
@media(max-width:768px){
  .gallery-slide{flex:0 0 100%;}
}
    /* TESTIMONIALS */
    .testimonials{display:flex;gap:12px;overflow:auto;padding:12px}
    .testimonial{min-width:260px;background:var(--card);padding:16px;border-radius:12px;box-shadow:0 10px 28px rgba(0,0,0,0.06)}

    /* OFFERS MARQUEE */
    .offers-marquee{background:linear-gradient(90deg,var(--accent),var(--accent-2));color:#fff;padding:12px;border-radius:10px;overflow:hidden}
    .offers-marquee .track{display:inline-block;white-space:nowrap;animation:marq 18s linear infinite}
    @keyframes marq{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}

    /* CONTACT */
    .contact-grid{display:grid;grid-template-columns:1fr 380px;gap:18px}
    .contact-card{background:var(--card);padding:18px;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.06)}
    .contact-card input,.contact-card textarea{width:100%;padding:10px;border-radius:8px;border:1px solid #e6e6e6;margin-top:10px}
    .contact-card button{margin-top:10px}

    /* FOOTER */
    footer{background:#0b1220;color:#fff;padding:36px}
    .footer-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;max-width:1100px;margin:0 auto}
    footer a{color:inherit}
    .socials a{display:inline-block;margin-right:8px;padding:8px;border-radius:10px;background:rgba(255,255,255,0.03);transition:transform .18s,background .18s}
    .socials a:hover{transform:translateY(-4px);background:rgba(255,255,255,0.06)}
   .modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background: rgba(0,0,0,0.6);
}
.modal-content {
  position: relative;
  background-image: url('assets/images/foodie3.jfif'); /* Your background image */
  background-size: cover;
  background-position: center;
  margin: 10% auto;
  padding: 30px;
  border-radius: 15px;
  width: 80%;
  max-width: 600px;
  color:red;
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}
.modal-header h2 {
  margin: 0 0 15px;
  text-align: center;
}
.modal-body ul {
  list-style: disc;
  padding-left: 20px;
}
.close {
  color:red;
  position: absolute;
  top: 15px;
  right: 25px;
  font-size: 30px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}
.close:hover {
  color: #ffdd00;
}
    /* floating whatsapp & scroll */
    .whatsapp{position:fixed;right:20px;bottom:80px;background:#25d366;color:#fff;padding:12px;border-radius:50%;box-shadow:0 8px 30px rgba(0,0,0,0.2);z-index:13000;cursor:pointer}
    .scroll-top{position:fixed;right:20px;bottom:20px;background:var(--accent);color:#fff;padding:12px;border-radius:12px;cursor:pointer;z-index:13000}

    /* feedback modal */
    .feedback-modal{position:fixed;inset:0;background:rgba(0,0,0,.6);display:none;align-items:center;justify-content:center;z-index:14000}
    .feedback-box{background:#fff;padding:18px;border-radius:12px;max-width:520px;width:94%}

    @media (max-width:980px){nav.main{display:none}#hamburger{display:block}.about-grid{grid-template-columns:1fr}.contact-grid{grid-template-columns:1fr}.modal-box{flex-direction:column}.modal-right{width:100%}.hero h2{font-size:28px}}
  </style>
</head>
<body>
<!-- PRELOADER -->
<div id="preloader">
  <div class="loader">
    <div class="glow"></div>
    <div class="hex-ring"></div>
    <img src="assets/images/logo.png" alt="logo">
  </div>
</div>

<!-- WELCOME POPUP with form inside -->
<div id="welcomeModal" class="modal" style="display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.6);">
  <div style="width:100%;max-width:720px;background:#fff;border-radius:12px;overflow:hidden;position:relative;">
    <button class="modal-close" onclick="closeWelcome()">&times;</button>
    <div style="display:flex;flex-wrap:wrap;align-items:stretch;">
      <div style="flex:1;min-width:280px;">
        <img src="assets/images/restoenter.jpg" style="width:100%;height:100%;object-fit:cover;display:block;">
      </div>
      <div style="flex:1;min-width:300px;padding:28px;">
        <h2 style="margin-top:0;color:var(--accent);font-family:'Fredoka One'">Welcome to Zesty Bites</h2>
        <h4 style="margin-top:0;color:var(--accent);font-family:'Fredoka One'">“Flavors That Spark Joy!”</h4>
        <p style="color:var(--muted)">Sign up for offers & fresh updates — we’ll send discounts and new combos.</p>
        <form id="welcomeForm">
          <input type="text" name="name" placeholder="Your name" style="width:100%;padding:10px;margin-top:10px;border-radius:8px;border:1px solid #eee" required>
          <input type="email" name="email" placeholder="Your email" style="width:100%;padding:10px;margin-top:10px;border-radius:8px;border:1px solid #eee" required>
          <div style="margin-top:12px;display:flex;gap:10px">
            <button type="submit" class="btn">Join</button>
            <button type="button" class="icon-btn" onclick="closeWelcome()" style="border:1px solid #eee;padding:8px;border-radius:8px">Skip</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- NAVBAR -->
<header>
  <div class="nav-wrap container">
    <div class="brand"><img src="assets/images/logo.png" alt="logo"><h1>Zesty Bites</h1></div>
    <nav class="main">
      <a href="#hero">Home</a>
      <a href="#about">About</a>
      <a href="#menu">Menu</a>
      <a href="#gallery">Gallery</a>
      <a href="#testimonials">Testimonials</a>
      <a href="#offers">Offers</a>
      <a href="#contact">Contact</a>
    </nav>
    <div class="actions">
     
      <button class="icon-btn" id="themeToggle" title="Toggle theme"><i class="fa fa-sun"></i></button>
      <button class="btn" onclick="document.getElementById('menu').scrollIntoView({behavior:'smooth'})">Order Now</button>
      <button id="hamburger" class="icon-btn"><i class="fa fa-bars"></i></button>
    </div>
  </div>
</header>
<!-- HERO -->
<section id="hero" class="hero">
  <div class="inner container">
    <div class="hero-left">
      <div class="eyebrow">Popular</div>
      <h2>Fresh combos, quick bites & big smiles</h2>
      <p>From steaming momos to loaded burgers — handcrafted, hygienic and served fast. Order online or walk in.</p>
      <div class="ctas">
        <button class="btn" onclick="document.getElementById('menu').scrollIntoView({behavior:'smooth'})">Explore Menu</button>
        <button class="btn" style="background:#fff;color:var(--accent);border:1px solid var(--accent)">Reserve Table</button>
      </div>
    </div>

    <!-- HERO CAROUSEL -->
    <div class="hero-right">
      <div class="hero-card" style="position:relative;overflow:hidden;">
        <div class="hero-slider">
          <img src="assets/images/vegmomo.jpg" alt="hero1">
          <img src="assets/images/pannepizza.jpg" alt="hero2">
          <img src="assets/images/cheeseburger1.jpg" alt="hero3">
          <img src="assets/images/coldcoffee.jpg" alt="hero4">
        </div>
        <!-- Controls -->
        <button class="hero-prev" onclick="prevHero()">&#10094;</button>
        <button class="hero-next" onclick="nextHero()">&#10095;</button>
      </div>
    </div>
  </div>
</section>

<!--about -->
<section id="about">
  <div class="container">
    <h3 class="section-title">About Us</h3>
    <div class="about-grid" style="display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap;">

      <!-- LEFT SIDE: IMAGE CARDS -->
      <div class="about-images" style="flex:1; position:relative; height:550px;">
        <?php
        $aboutImgs = array(
          'assets/images/biryani.jpg',
          'assets/images/cakeshake.jpg',
          'assets/images/combo2.jpg',
          'assets/images/pannepizza.jpg',
          'assets/images/chillipotato.jpg'
        );

        foreach($aboutImgs as $i => $img){
          $leftShift = ($i % 2 == 0) ? -40*$i : 40*$i; // more spaced left/right
          $topShift = 80 * $i; // vertical spacing
          echo '<div class="about-img-card" style="
                  position:absolute; 
                  top:'.$topShift.'px; 
                  left:calc(50% + '.$leftShift.'px); 
                  width:180px; 
                  height:250px; 
                  overflow:hidden; 
                  border-radius:12px; 
                  box-shadow:0 12px 30px rgba(0,0,0,0.1); 
                  transition:transform .3s;
                  z-index:'.(10-$i).';
                  transform:translateX(-50%);
                ">
                  <img src="'.$img.'" style="
                        width:100%; 
                        height:100%; 
                        object-fit:cover; 
                        display:block; 
                        transition:transform .3s;"
                        onmouseover="this.style.transform=\'scale(1.1)\'"
                        onmouseout="this.style.transform=\'scale(1)\'">
                </div>';
        }
        ?>
      </div>

      <!-- RIGHT SIDE: TEXT + NUMBERS -->
      <div class="about-text" style="flex:1; display:flex; flex-direction:column; gap:16px;">
        <p style="color:red; font-size:16px; line-height:1.6;">
          Zesty Bites has been delighting taste buds for over 50 years. From fresh, handcrafted combos to mouthwatering desserts, we are committed to delivering flavors that spark joy and memories for every bite.
        </p>

        <!-- Highlights -->
        <div class="highlights" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:16px; margin-top:12px;">
          <?php
          $highlights = array(
            '15 Master Chefs',
            '50 Years Experience',
            '100+ Dishes',
            '5000+ Happy Customers',
            '24/7 Online Orders'
          );

          foreach($highlights as $i => $h){
            echo '<div style="
                    background:#fff7f1; 
                    padding:12px; 
                    border-radius:12px; 
                    box-shadow:0 8px 20px rgba(0,0,0,0.08); 
                    text-align:center;
                    transition: background 0.3s, transform 0.3s;
                  "
                  onmouseover="this.style.background=\'#fff3b0\'; this.style.transform=\'scale(1.05)\'"
                  onmouseout="this.style.background=\'#fff7f1\'; this.style.transform=\'scale(1)\'">
                    <h4 style="margin:0; font-size:20px; color:#e94e3a;">'.($i+1).'</h4>
                    <p style="margin:4px 0 0; color:#555; font-size:14px;">'.$h.'</p>
                  </div>';
          }
          ?>
        </div>

        <a href="#menu" class="btn" style="margin-top:18px; width:160px; padding:10px 16px; text-align:center; display:inline-block;">Explore More </a>
      </div>

    </div>
  </div>
</section>



<!-- MENU -->
<section id="menu">
  <div class="container">
    <h3 class="section-title">Our Menu</h3>
    <div class="menu-grid">
      <?php
      $menu = array(
        array('name'=>'Paneer Pizza','price'=>119,'rating'=>4.5,'imgs'=>array('assets/images/pannepizza.jpg','assets/images/pannerpizza1.jpg','assets/images/pizza2.jpg')),
        array('name'=>'Cheese Burger','price'=>139,'rating'=>4.3,'imgs'=>array('assets/images/cheeseburger1.jpg','assets/images/cheeseburger.avif','assets/images/vegburger.jpg','assets/images/paneertikkaburger.jpg')),
        array('name'=>'Cold Coffee','price'=>79,'rating'=>4.0,'imgs'=>array('assets/images/coldcoffee.jpg','assets/images/coldcoffee1.jpg')),
        array('name'=>'Chilli Potato','price'=>99,'rating'=>4.1,'imgs'=>array('assets/images/chillipotato.jpg','assets/images/cheesefries.jpg')),
        array('name'=>'Spring Roll','price'=>89,'rating'=>4.0,'imgs'=>array('assets/images/springroll.jpg')),
        array('name'=>'Biryani','price'=>199,'rating'=>4.1,'imgs'=>array('assets/images/biryani.jpg','assets/images/vegbriyani.jpg')),
        array('name'=>'Grilled Cheese Sandwich','price'=>69,'rating'=>4.0,'imgs'=>array('assets/images/grilledcheesesandwich.jpg')),
        array('name'=>'Special Chatpat','price'=>129,'rating'=>4.1,'imgs'=>array('assets/images/combo1.webp','assets/images/combo2.jpg','assets/images/combo3.jpg')),
        
      );
      foreach($menu as $i=>$m){
        $img = htmlspecialchars($m['imgs'][0]);
        $name = htmlspecialchars($m['name']);
        $price = htmlspecialchars($m['price']);
        $rating = htmlspecialchars($m['rating']);
      echo "<div class='food-card' onclick=\"openFoodModal($i)\">";
echo "<img src='$img' alt='$name'>";
echo "<div class='body'><h4>$name</h4>";
echo "<div class='food-meta'><div>₹ $price</div><div>";
// Stars display
$fullStars = floor($rating);
$halfStar = $rating - $fullStars >= 0.5 ? true : false;
for($s=0;$s<$fullStars;$s++) echo "<i class='fa fa-star' style='color:#f5c518'></i>";
if($halfStar) echo "<i class='fa fa-star-half-alt' style='color:#f5c518'></i>";
$emptyStars = 5 - $fullStars - ($halfStar?1:0);
for($s=0;$s<$emptyStars;$s++) echo "<i class='fa fa-star-o' style='color:#f5c518'></i>";
echo "</div></div></div></div>";

      }
      ?>
    </div>
  </div>
</section>

<!-- FOOD MODAL -->
<div id="foodModal" class="modal" aria-hidden="true">
  <div class="modal-box">
    <button class="modal-close" onclick="closeFoodModal()">&times;</button>
    <div class="modal-left">
      <div id="modalMain" class="main" style="background-image:url('assets/images/vegmomo.jpg')"></div>
      <div class="thumbs" id="modalThumbs"></div>
    </div>
    <div class="modal-right">
      <h3 id="modalName">Food Name</h3>
      <div id="modalRating">⭐⭐⭐⭐</div>
      <div style="margin-top:8px;font-size:20px;color:var(--accent)">₹ <span id="modalPrice">129</span></div>
      <p id="modalDesc">Delicious & freshly prepared.</p>
      <div style="margin-top:12px;display:flex;gap:10px"><button class="icon-btn" onclick="closeFoodModal()">Close</button></div>
      <h4 style="margin-top:18px">Related</h4>
      <div id="modalRelated" style="display:flex;gap:8px;overflow:auto"></div>
    </div>
  </div>
</div>

<!-- GALLERY -->
<section id="gallery">
  <div class="container">
    <h3 class="section-title">Check Our Gallery</h3>

    <div class="gallery-carousel">
      <div class="gallery-track" id="galleryTrack">
        <?php
        $gallery = array(
          "assets/images/cheeseburger1.jpg",
          "assets/images/combo3.jpg",
          "assets/images/combo2.jpg",
          "assets/images/coldcoffee.jpg",
          "assets/images/biryani.jpg",
          "assets/images/grilledcheesesandwich.jpg"
        );
        foreach($gallery as $g){
          echo "<div class='gallery-slide'><img src='$g' alt='gallery'></div>";
        }
        ?>
      </div>

      <!-- Navigation -->
      <button class="gallery-prev" onclick="galleryPrev()">&#10094;</button>
      <button class="gallery-next" onclick="galleryNext()">&#10095;</button>
    </div>

    <!-- Dots -->
    <div class="gallery-dots" id="galleryDots"></div>
  </div>
  <!-- GALLERY MODAL -->
<div id="galleryModal" class="modal" aria-hidden="true">
  <div class="modal-box" style="max-width:800px; max-height:90vh; flex-direction:column;">
    <button class="modal-close" onclick="closeGallery()">&times;</button>
    <img id="galleryModalImg" src="" alt="Zoomed Image" style="width:100%;height:auto;border-radius:12px;object-fit:contain;">
  </div>
</div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonials" style="padding:64px 18px;background:#f7f7f7">
  <div class="container" style="max-width:800px;margin:0 auto;text-align:center">
    <h3 style="font-family:'Fredoka One';color:#e94e3a;margin-bottom:36px">What Are They <span style="color:#111">Saying About Us</span></h3>

    <div class="testimonial-slider" style="position:relative;overflow:hidden;">
      <div class="testimonial-track" style="display:flex;transition:transform 0.5s ease;">
        <!-- Example testimonial -->
        <div class="testimonial-slide" style="min-width:100%;display:flex;align-items:center;gap:20px;padding:24px;background:#fff;border-radius:12px;box-shadow:0 10px 28px rgba(0,0,0,0.06)">
          <div style="flex:1;text-align:left">
            <p style="font-style:italic;font-size:16px;color:#555">“Proin iaculis purus consequat sem cure digni sim donec porttitor a entum suscipit rhoncus.”</p>
            <strong style="display:block;margin-top:12px;font-size:14px;color:#111">Saul Goodman</strong>
            <span style="font-size:12px;color:#888">CEO & Founder</span>
            <div style="margin-top:6px;color:#f5c518">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
          </div>
          <div style="flex-shrink:0">
            <img src="assets/images/arun.jpg" alt="Saul Goodman" style="width:100px;height:100px;border-radius:50%;object-fit:cover">
          </div>
        </div>

        <div class="testimonial-slide" style="min-width:100%;display:flex;align-items:center;gap:20px;padding:24px;background:#fff;border-radius:12px;box-shadow:0 10px 28px rgba(0,0,0,0.06)">
          <div style="flex:1;text-align:left">
            <p style="font-style:italic;font-size:16px;color:#555">“Proin iaculis purus consequat sem cure digni sim donec porttitor a entum suscipit rhoncus.”</p>
            <strong style="display:block;margin-top:12px;font-size:14px;color:#111">Harsh </strong>
            <span style="font-size:12px;color:#888">General Manager</span>
            <div style="margin-top:6px;color:#f5c518">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
          </div>
          <div style="flex-shrink:0">
            <img src="assets/images/image1.jpg" alt="Saul Goodman" style="width:100px;height:100px;border-radius:50%;object-fit:cover">
          </div>
        </div>

         <div class="testimonial-slide" style="min-width:100%;display:flex;align-items:center;gap:20px;padding:24px;background:#fff;border-radius:12px;box-shadow:0 10px 28px rgba(0,0,0,0.06)">
          <div style="flex:1;text-align:left">
            <p style="font-style:italic;font-size:16px;color:#555">“Proin iaculis purus consequat sem cure digni sim donec porttitor a entum suscipit rhoncus.”</p>
            <strong style="display:block;margin-top:12px;font-size:14px;color:#111">Mr. Reddy Rathore </strong>
            <span style="font-size:12px;color:#888">HOD</span>
            <div style="margin-top:6px;color:#f5c518">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
          </div>
          <div style="flex-shrink:0">
            <img src="assets/images/anup.jpg" alt="Saul Goodman" style="width:100px;height:100px;border-radius:50%;object-fit:cover">
          </div>
        </div>
        <!-- Add more testimonial-slide blocks here -->
        <div class="testimonial-slide" style="min-width:100%;display:flex;align-items:center;gap:20px;padding:24px;background:#fff;border-radius:12px;box-shadow:0 10px 28px rgba(0,0,0,0.06)">
          <div style="flex:1;text-align:left">
            <p style="font-style:italic;font-size:16px;color:#555">“Fast delivery and tasty burgers — really impressed!”</p>
            <strong style="display:block;margin-top:12px;font-size:14px;color:#111">Sana P.</strong>
            <span style="font-size:12px;color:#888">Food Blogger</span>
            <div style="margin-top:6px;color:#f5c518">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>
            </div>
          </div>
          <div style="flex-shrink:0">
            <img src="assets/images/boy_image.png" alt="Sana P." style="width:100px;height:100px;border-radius:50%;object-fit:cover">
          </div>
        </div>
      </div>

      <!-- Dots -->
      <div class="testimonial-dots" style="margin-top:18px;text-align:center">
        <button class="dot active" style="width:10px;height:10px;border-radius:50%;border:none;margin:0 6px;background:#e94e3a;cursor:pointer"></button>
        <button class="dot" style="width:10px;height:10px;border-radius:50%;border:none;margin:0 6px;background:#ccc;cursor:pointer"></button>
        <button class="dot" style="width:10px;height:10px;border-radius:50%;border:none;margin:0 6px;background:#ccc;cursor:pointer"></button>
        <button class="dot" style="width:10px;height:10px;border-radius:50%;border:none;margin:0 6px;background:#ccc;cursor:pointer"></button>
        
      </div>
    </div>
  </div>
</section>

<!-- OFFERS -->
<section id="offers" style="padding:60px 20px;background:linear-gradient(135deg,#fff7f1,#ffe8dc)">
  <div class="container">
    <h3 class="section-title" style="text-align:center;margin-bottom:40px">🔥 Special Offers 🔥</h3>
    <div class="offers-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px">
      
      <!-- Offer Card 1 -->
      <div class="offer-card" style="background:#fff;border-radius:15px;padding:20px;box-shadow:0 8px 20px rgba(0,0,0,0.1);position:relative;overflow:hidden;text-align:center;transition:transform 0.3s">
        <span class="badge" style="position:absolute;top:15px;right:-40px;background:#e94e3a;color:#fff;padding:8px 50px;transform:rotate(45deg);font-size:14px;font-weight:bold">50% OFF</span>
        <img src="assets/images/vegburger.jpg" alt="Veg Burger" style="width:100%;border-radius:100%;margin-bottom:15px">
        <h4>Veg Burger</h4>
        <p>Buy 1 Get 1 Free on delicious Veg Burgers!</p>
        <button class="btn">Order Now</button>
      </div>

      <!-- Offer Card 2 -->
      <div class="offer-card" style="background:#fff;border-radius:15px;padding:20px;box-shadow:0 8px 20px rgba(0,0,0,0.1);position:relative;overflow:hidden;text-align:center;transition:transform 0.3s">
        <span class="badge" style="position:absolute;top:15px;right:-40px;background:#ff9800;color:#fff;padding:8px 50px;transform:rotate(45deg);font-size:14px;font-weight:bold">20% OFF</span>
        <img src="assets/images/pizza2.jpg" alt="Chilli Potato" style="width:100%;border-radius:100%;margin-bottom:15px">
        <h4>Chilli Potato</h4>
        <p>Spicy & crispy chilli potato at flat 20% off.</p>
        <button class="btn">Grab Deal</button>
      </div>

      <!-- Offer Card 3 -->
      <div class="offer-card" style="background:#fff;border-radius:15px;padding:20px;box-shadow:0 8px 20px rgba(0,0,0,0.1);position:relative;overflow:hidden;text-align:center;transition:transform 0.3s">
        <span class="badge" style="position:absolute;top:15px;right:-40px;background:#4caf50;color:#fff;padding:8px 50px;transform:rotate(45deg);font-size:14px;font-weight:bold">Combo Deal</span>
        <img src="assets/images/combo2.jpg" alt="Combo Meal" style="width:100%;border-radius:100%;margin-bottom:15px">
        <h4>Combo 1</h4>
        <p>Free Fries & Drink with every Combo 1 purchase.</p>
        <button class="btn">Claim Offer</button>
      </div>

    </div>
  </div>
</section>

<!-- Extra CSS -->
<style>
.offer-card:hover {
  transform: translateY(-10px);
}
</style>


<!-- CONTACT -->
<section id="contact">
  <div class="container">
    <h3 class="section-title">Contact & Booking</h3>
    <div class="contact-grid" style="display:flex;flex-wrap:wrap;gap:24px;">

      <!-- CONTACT / BOOKING FORM -->
      <div class="contact-card" style="flex:1;min-width:280px;">
        <h4>Send a Message / Booking</h4>
        <form id="contactForm" action="process_form.php" method="POST">
          <input name="name" placeholder="Your name" required>
          <input name="email" placeholder="Your email">
          <input name="mobile" placeholder="Mobile" required>
          <textarea name="message" rows="5" placeholder="Message / booking details" required></textarea>
          <button class="btn" type="submit">Send Message</button>
        </form>
        <!-- SUCCESS MESSAGE -->
        <div id="contactSuccess" style="display:none;margin-top:12px;padding:12px;background:#d4edda;color:#155724;border-radius:8px;font-weight:600;">
          Your query / booking submitted successfully!
        </div>
      </div>

      <!-- CONTACT INFO -->
      <div class="contact-card" style="flex:1;min-width:280px;">
        <h4>Visit / Contact</h4>
        <p><i class="fa fa-map-marker-alt"></i> Hazratganj, Lucknow</p>
        <p><i class="fa fa-phone"></i> +91 6389489942</p>
        <p><i class="fa fa-envelope"></i> info@zestybites.example</p>
        <div style="margin-top:12px">
          <iframe src="https://maps.google.com/maps?q=Lucknow&t=&z=13&ie=UTF8&iwloc=&output=embed" style="width:100%;height:200px;border:0;border-radius:8px"></iframe>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  // FORM SUBMISSION SUCCESS MESSAGE
  document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault(); // Prevent page reload
    const success = document.getElementById('contactSuccess');
    success.style.display = 'block'; // Show success message
    // Hide it automatically after 4 seconds
    setTimeout(() => { success.style.display = 'none'; }, 4000);
    this.reset(); // Clear form fields
  });
</script>


<!-- FOOTER -->
<!-- FOOTER -->
<footer>
  <div class="footer-grid container">
    <!-- About -->
    <div>
      <img src="assets/images/logo.png" style="width:60px;height:60px;border-radius:10px">
      <h4 style="margin-top:8px">Zesty Bites</h4>
      <p>Fresh food, fast service. Visit us or order online.</p>
      <p>“Flavors That Spark Joy!”</p>
      <div class="socials" style="margin-top:12px">
        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>

    <!-- Quick Links -->
    <div>
      <h4>Quick Links</h4>
      <p><a href="#hero">Home</a></p>
      <p><a href="#about">About</a></p>
      <p><a href="#menu">Menu</a></p>
      <p><a href="#gallery">Gallery</a></p>
      <p><a href="#testimonials">Testimonials</a></p>
      <p><a href="#offers">Offers</a></p>
      <p><a href="#contact">Contact</a></p>
      <p><a href="#" onclick="openFeedbackModal()">Feedback</a></p>
      
      <p><a href="#" id="privacyLink" class="text-light">Privacy & Policy</a></p>
      <!-- Privacy & Policy Modal -->
     <div id="privacyModal" class="modal">
     <div class="modal-content">
     <span class="close">&times;</span>
      <div class="modal-header">
      <h2>Privacy & Policy</h2>
      </div>
     <div class="modal-body">
      <ul>
        <li>Your personal data will be kept confidential and secure.</li>
        <li>We do not share your information with third parties without consent.</li>
        <li>Users must not misuse the platform or engage in illegal activities.</li>
        <li>Cookies may be used to enhance your experience on our site.</li>
        <li>We reserve the right to update this privacy policy at any time.</li>
      </ul>
    </div>
  </div>
 </div>
 </div>

    <!-- Contact Info -->
    <div>
      <h4>Contact Us</h4>
      <p><i class="fa fa-map-marker-alt"></i> Hazratganj, Lucknow</p>
      <p><i class="fa fa-phone"></i> +91 9876543210</p>
      <p><i class="fa fa-envelope"></i> info@zestybites.example</p>
    </div>

    <!-- Subscribe -->
    <div>
      <h4>Subscribe</h4>
      <p>Get latest offers & updates</p>
      <form id="footerSubscribe" style="display:flex;flex-direction:column;gap:8px">
        <input type="email" placeholder="Your email" required style="padding:10px;border-radius:8px;border:1px solid #eee">
        <button type="submit" class="btn" style="padding:10px">Subscribe</button>
      </form>
    </div>
  </div>

  <div style="text-align:center;margin-top:24px;font-size:14px;color:#aaa">
    &copy; 2025 Zesty Bites. All Rights Reserved.
  </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/919876543210" target="_blank" class="whatsapp">
  <i class="fab fa-whatsapp" style="font-size:20px;"></i>
</a>

<!-- Feedback Modal -->
<div class="feedback-modal" id="feedbackModal">
  <div class="feedback-box">
    <button class="modal-close" onclick="closeFeedbackModal()">&times;</button>
    <h3>Send Feedback</h3>
    <form id="feedbackForm" style="display:flex;flex-direction:column;gap:8px">
      <input type="text" name="name" placeholder="Your Name" required style="padding:10px;border-radius:8px;border:1px solid #eee">
      <input type="email" name="email" placeholder="Your Email" required style="padding:10px;border-radius:8px;border:1px solid #eee">
      <textarea name="message" rows="4" placeholder="Your Feedback" required style="padding:10px;border-radius:8px;border:1px solid #eee"></textarea>
      <button type="submit" class="btn">Send</button>
    </form>
  </div>
</div>

<script>
  function openFeedbackModal(){ document.getElementById('feedbackModal').style.display='flex'; }
  function closeFeedbackModal(){ document.getElementById('feedbackModal').style.display='none'; }
  document.getElementById('footerSubscribe').addEventListener('submit', e=>{ e.preventDefault(); alert('Subscribed!'); e.target.reset(); });
  document.getElementById('feedbackForm').addEventListener('submit', e=>{ e.preventDefault(); alert('Feedback Sent!'); closeFeedbackModal(); e.target.reset(); });
</script>


<button class="whatsapp" title="WhatsApp" onclick="window.open('https://wa.me/6389489942','_blank')"><i class="fa fa-whatsapp"></i></button>
<button class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i class="fa fa-arrow-up"></i></button>

<!-- Feedback modal -->
<div id="feedbackModal" class="feedback-modal">
  <div class="feedback-box">
    <h3>Feedback</h3>
    <form id="feedbackForm">
      <input type="text" name="name" placeholder="Your name" required style="width:100%;padding:10px;border-radius:8px;border:1px solid #eee;margin-top:8px">
      <input type="email" name="email" placeholder="Your email" style="width:100%;padding:10px;border-radius:8px;border:1px solid #eee;margin-top:8px">
      <textarea name="feedback" rows="5" placeholder="Your feedback" style="width:100%;padding:10px;border-radius:8px;border:1px solid #eee;margin-top:8px" required></textarea>
      <div style="margin-top:10px;display:flex;gap:10px;justify-content:flex-end"><button class="btn" type="submit">Submit</button><button type="button" class="icon-btn" onclick="closeFeedback()">Close</button></div>
    </form>
  </div>
</div>

<script>
  // Hide preloader after page load
  window.addEventListener("load",()=>{
    setTimeout(()=>document.getElementById("preloader").style.display="none",800);
  });
  function closeWelcome(){ document.getElementById('welcomeModal').style.display='none'; }

  let heroIndex = 0;
const heroSlides = document.querySelectorAll(".hero-slider img");
function showHeroSlide(i){
  heroIndex = (i + heroSlides.length) % heroSlides.length;
  document.querySelector(".hero-slider").style.transform = `translateX(-${heroIndex*100}%)`;
}
function nextHero(){ showHeroSlide(heroIndex+1); }
function prevHero(){ showHeroSlide(heroIndex-1); }
setInterval(nextHero, 4000); // auto slide every 4s
  // About carousel
  const aboutImgs = ['assets/images/combo3.jpg','assets/images/vegmomo.jpg','assets/images/combo2.jpg'];
  let aboutI = 0;
  function aboutNext(){ aboutI=(aboutI+1)%aboutImgs.length; document.getElementById('aboutImg').src = aboutImgs[aboutI]; }
  function aboutPrev(){ aboutI=(aboutI-1+aboutImgs.length)%aboutImgs.length; document.getElementById('aboutImg').src = aboutImgs[aboutI]; }
  setInterval(aboutNext, 3500);

  // Theme toggle
  document.getElementById('themeToggle').addEventListener('click', ()=>{
    document.body.classList.toggle('dark');
    document.getElementById('themeToggle').innerHTML = document.body.classList.contains('dark') ? '<i class="fa fa-sun"></i>' : '<i class="fa fa-moon"></i>';
  });
  // Hamburger menu toggle
  const hamburger = document.getElementById('hamburger');
  const mainNav = document.querySelector('nav.main');

  hamburger.addEventListener('click', () => {
    if(mainNav.style.display === 'flex'){
      mainNav.style.display = 'none';
    } else {
      mainNav.style.display = 'flex';
      mainNav.style.flexDirection = 'column';
      mainNav.style.position = 'absolute';
      mainNav.style.top = '70px'; // adjust based on header height
      mainNav.style.right = '18px';
      mainNav.style.background = 'rgba(255,255,255,0.95)';
      mainNav.style.padding = '12px';
      mainNav.style.borderRadius = '12px';
      mainNav.style.boxShadow = '0 8px 30px rgba(0,0,0,0.1)';
      mainNav.style.zIndex = '9999';
    }
  });

  // Optional: Close menu when a link is clicked (mobile)
  mainNav.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      if(window.innerWidth < 980){
        mainNav.style.display = 'none';
      }
    });
  });

  // Optional: close menu when clicking outside
  document.addEventListener('click', (e) => {
    if(window.innerWidth < 980){
      if(!mainNav.contains(e.target) && !hamburger.contains(e.target)){
        mainNav.style.display = 'none';
      }
    }
  });
 // DARK/LIGHT THEME TOGGLE
  const themeToggle = document.getElementById('themeToggle');
  const root = document.documentElement;

  // Check localStorage on page load
  const currentTheme = localStorage.getItem('theme');
  if(currentTheme === 'dark'){
    root.classList.add('dark');
    themeToggle.innerHTML = '<i class="fa fa-sun"></i>';
  }

  themeToggle.addEventListener('click', () => {
    if(root.classList.contains('dark')){
      root.classList.remove('dark');
      themeToggle.innerHTML = '<i class="fa fa-moon"></i>';
      localStorage.setItem('theme', 'light');
    } else {
      root.classList.add('dark');
      themeToggle.innerHTML = '<i class="fa fa-sun"></i>';
      localStorage.setItem('theme', 'dark');
    }
  });
  // Food modal handling
  const menuData = <?php echo json_encode($menu); ?>;
  function openFoodModal(i){
    const data = menuData[i];
    document.getElementById('modalMain').style.backgroundImage = "url('" + data.imgs[0] + "')";
    document.getElementById('modalName').innerText = data.name;
    document.getElementById('modalPrice').innerText = data.price;
    function getStars(rating){
  let full = Math.floor(rating), half = (rating-full)>=0.5, empty = 5-full-(half?1:0);
  let html = '';
  for(let i=0;i<full;i++) html += '<i class="fa fa-star" style="color:#f5c518"></i>';
  if(half) html += '<i class="fa fa-star-half-alt" style="color:#f5c518"></i>';
  for(let i=0;i<empty;i++) html += '<i class="fa fa-star-o" style="color:#f5c518"></i>';
  return html;
}

    document.getElementById('modalRating').innerText = data.rating;
    // thumbs
    const thumbs = document.getElementById('modalThumbs'); thumbs.innerHTML=''; data.imgs.forEach(u=>{const im=document.createElement('img');im.src=u;im.addEventListener('click',()=>document.getElementById('modalMain').style.backgroundImage="url('"+u+"')");thumbs.appendChild(im)});
    // related
    const related = document.getElementById('modalRelated'); related.innerHTML=''; for(let j=0;j<menuData.length;j++){ if(j!==i){ const r=document.createElement('img'); r.src=menuData[j].imgs[0]; r.style.width='80px'; r.style.height='60px'; r.style.objectFit='cover'; r.style.borderRadius='6px'; related.appendChild(r);}} 
    document.getElementById('foodModal').classList.add('show'); document.body.style.overflow='hidden';
  }
  function closeFoodModal(){ document.getElementById('foodModal').classList.remove('show'); document.body.style.overflow='auto'; }



function renderStars(rating){
    const fullStars = Math.floor(rating);
    const halfStar = rating - fullStars >= 0.5;
    let html = '';
    for(let i=0;i<fullStars;i++) html += '<i class="fa fa-star" style="color:#f5c518"></i>';
    if(halfStar) html += '<i class="fa fa-star-half-alt" style="color:#f5c518"></i>';
    const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);
    for(let i=0;i<emptyStars;i++) html += '<i class="far fa-star" style="color:#f5c518"></i>';
    return html;
}

// Update modal to show stars
function openFoodModal(i){
    const data = menuData[i];
    document.getElementById('modalMain').style.backgroundImage = "url('" + data.imgs[0] + "')";
    document.getElementById('modalName').innerText = data.name;
    document.getElementById('modalPrice').innerText = data.price;
    document.getElementById('modalRating').innerHTML = renderStars(data.rating); // stars now
    const thumbs = document.getElementById('modalThumbs');
    thumbs.innerHTML='';
    data.imgs.forEach(u=>{
        const im=document.createElement('img');
        im.src=u;
        im.addEventListener('click',()=>document.getElementById('modalMain').style.backgroundImage="url('"+u+"')");
        thumbs.appendChild(im);
    });
    const related = document.getElementById('modalRelated');
    related.innerHTML='';
    for(let j=0;j<menuData.length;j++){
        if(j!==i){
            const r=document.createElement('img');
            r.src=menuData[j].imgs[0];
            r.style.width='80px';
            r.style.height='60px';
            r.style.objectFit='cover';
            r.style.borderRadius='6px';
            related.appendChild(r);
        }
    }
    document.getElementById('foodModal').classList.add('show');
    document.body.style.overflow='hidden';
}



//gallery

let galleryIndex=0;
const gallerySlides=document.querySelectorAll(".gallery-slide");
const galleryTrack=document.getElementById("galleryTrack");
const dotsContainer=document.getElementById("galleryDots");

function updateGallery(){
  gallerySlides.forEach((s,i)=>s.classList.toggle("active",i===galleryIndex));
  galleryTrack.style.transform=`translateX(-${galleryIndex*100/3}%)`;
  [...dotsContainer.children].forEach((d,i)=>d.classList.toggle("active",i===galleryIndex));
}

function galleryNext(){galleryIndex=(galleryIndex+1)%gallerySlides.length;updateGallery();}
function galleryPrev(){galleryIndex=(galleryIndex-1+gallerySlides.length)%gallerySlides.length;updateGallery();}

// Dots
gallerySlides.forEach((_,i)=>{
  const dot=document.createElement("button");
  dot.addEventListener("click",()=>{galleryIndex=i;updateGallery();});
  dotsContainer.appendChild(dot);
});

updateGallery();
// Gallery image zoom modal
const galleryModal = document.getElementById('galleryModal');
const galleryModalImg = document.getElementById('galleryModalImg');

gallerySlides.forEach(slide => {
  const img = slide.querySelector('img');
  img.style.cursor = 'zoom-in';
  img.addEventListener('click', () => {
    galleryModalImg.src = img.src;
    galleryModal.classList.add('show');
    document.body.style.overflow = 'hidden';
  });
});

function closeGallery(){
  galleryModal.classList.remove('show');
  document.body.style.overflow = 'auto';
}

// Optional: close modal on click outside image
galleryModal.addEventListener('click', e => {
  if(e.target === galleryModal) closeGallery();
});
  // Feedback
  function openFeedback(){ document.getElementById('feedbackModal').style.display='flex'; document.body.style.overflow='hidden'; }
  function closeFeedback(){ document.getElementById('feedbackModal').style.display='none'; document.body.style.overflow='auto'; }
  document.getElementById('feedbackForm').addEventListener('submit', function(e){ e.preventDefault(); alert('Thanks for your feedback!'); closeFeedback(); });

  const modal = document.getElementById("privacyModal");
const btn = document.getElementById("privacyLink");
const span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  // Contact form simple handler (let server handle in process_form.php)
  document.getElementById('contactForm') && document.getElementById('contactForm').addEventListener('submit', function(){ /* let php handle */ });

  // Gallery modal close on esc
  window.addEventListener('keydown', function(e){ if(e.key==='Escape'){ closeGallery(); closeFoodModal(); closeFeedback(); closeWelcome(); } });

  // Scroll top visibility
  const st = document.querySelector('.scroll-top'); window.addEventListener('scroll', ()=> st.style.display = window.scrollY > 200 ? 'block' : 'none');
    const slides = document.querySelectorAll('.testimonial-slide');
  const dots = document.querySelectorAll('.testimonial-dots .dot');
  let index = 0;

  function showSlide(i){
    index = i;
    const track = document.querySelector('.testimonial-track');
    track.style.transform = `translateX(-${i*100}%)`;
    dots.forEach((d,di)=>d.style.backgroundColor = di===i ? '#e94e3a' : '#ccc');
  }

  dots.forEach((d,i)=>d.addEventListener('click',()=>showSlide(i)));

  // auto slide every 5 seconds
  setInterval(()=>showSlide((index+1)%slides.length),5000);
</script>
</body>
</html>
