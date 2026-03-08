<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Travaholica — MVP Homepage Demo</title>
  <meta name="description" content="Handcrafted cultural journeys in Egypt & beyond. Small groups. Local experts. Stress-free planning." />

  <style>
    :root{
      --bg: #ffffff;
      --text: #0f172a;      /* slate-900 */
      --muted: #475569;     /* slate-600 */
      --line: #e2e8f0;      /* slate-200 */
      --card: #ffffff;
      --shadow: 0 10px 25px rgba(15,23,42,.08);
      --radius: 18px;

      --primary: #0b2a5b;   /* deep navy */
      --primary-2:#123a7a;
      --accent: #f59e0b;    /* amber */
      --success:#16a34a;    /* green */
    }

    *{ box-sizing: border-box; }
    html,body{ margin:0; padding:0; font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; color:var(--text); background:var(--bg);}
    a{ color:inherit; text-decoration:none; }
    img{ max-width:100%; display:block; }
    button{ font-family: inherit; }

    /* Layout helpers */
    .container{ width: min(1120px, 92vw); margin: 0 auto; }
    .section{ padding: 72px 0; }
    .grid{ display:grid; gap: 18px; }
    .muted{ color: var(--muted); }
    .chip{ display:inline-flex; align-items:center; gap:8px; padding: 8px 12px; border:1px solid rgba(255,255,255,.25); background: rgba(0,0,0,.18); color:#fff; border-radius: 999px; font-size: 13px; }
    .sr{ position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border-width:0; }

    /* Header */
    .header{
      position: sticky; top:0; z-index: 50;
      background: rgba(255,255,255,.86);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--line);
    }
    .nav{
      display:flex; align-items:center; justify-content:space-between;
      height: 64px;
    }
    .brand{ display:flex; align-items:center; gap:10px; font-weight:800; letter-spacing:.2px; }
    .logo{
      width: 34px; height:34px; border-radius: 10px;
      background: linear-gradient(135deg, var(--primary), var(--primary-2));
      box-shadow: 0 10px 25px rgba(11,42,91,.25);
    }
    .links{ display:flex; gap: 18px; align-items:center; }
    .links a{ font-size: 14px; color: var(--muted); font-weight: 600; padding: 8px 10px; border-radius: 10px; }
    .links a:hover{ background:#f1f5f9; color: var(--text); }

    .cta{
      display:flex; align-items:center; gap: 10px;
    }
    .btn{
      border: 0; cursor:pointer;
      border-radius: 12px;
      padding: 10px 14px;
      font-weight: 700;
      font-size: 14px;
      transition: transform .08s ease, background .2s ease;
      display:inline-flex; align-items:center; justify-content:center; gap:10px;
      white-space:nowrap;
    }
    .btn:active{ transform: translateY(1px); }
    .btn-primary{ background: var(--primary); color:#fff; }
    .btn-primary:hover{ background: var(--primary-2); }
    .btn-ghost{ background: transparent; color: var(--primary); border: 1px solid var(--line); }
    .btn-ghost:hover{ background:#f8fafc; }
    .burger{
      display:none; border:1px solid var(--line); background:#fff;
      padding:10px 12px; border-radius: 12px; cursor:pointer;
    }

    /* Mobile nav */
    .mobile-panel{ display:none; border-top:1px solid var(--line); background:#fff; }
    .mobile-panel .container{ padding: 14px 0; }
    .mobile-links{ display:grid; gap: 10px; }
    .mobile-links a{ padding: 12px 12px; border:1px solid var(--line); border-radius: 12px; font-weight: 700; color: var(--text); }
    .mobile-links a small{ display:block; font-weight: 600; color: var(--muted); margin-top: 3px; }

    /* Hero */
    .hero{
      position: relative;
      padding: 78px 0 56px;
      background:
        linear-gradient(180deg, rgba(15,23,42,.62), rgba(15,23,42,.74)),
        url("https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=2400&q=80")
        center/cover no-repeat;
      color:#fff;
    }
    .hero .container{ position:relative; }
    .hero-grid{
      display:grid;
      grid-template-columns: 1.2fr .8fr;
      gap: 26px;
      align-items: end;
    }
    .hero h1{ margin:0; font-size: clamp(30px, 4vw, 52px); line-height:1.05; letter-spacing:-.6px; }
    .hero p{ margin: 14px 0 0; font-size: 16px; color: rgba(255,255,255,.86); max-width: 58ch;}
    .hero-actions{ margin-top: 18px; display:flex; gap: 12px; flex-wrap: wrap; }
    .hero-actions .btn{ padding: 12px 16px; border-radius: 14px; font-size: 15px;}
    .btn-secondary{ background: rgba(255,255,255,.14); color:#fff; border: 1px solid rgba(255,255,255,.25); }
    .btn-secondary:hover{ background: rgba(255,255,255,.22); }

    .hero-badges{ margin-top: 18px; display:flex; gap: 10px; flex-wrap: wrap;}
    .stars{ color: var(--accent); font-weight: 900; letter-spacing:1px; }
    .pill{
      display:inline-flex; align-items:center; gap:8px;
      padding: 10px 12px; border-radius: 999px;
      background: rgba(255,255,255,.12);
      border: 1px solid rgba(255,255,255,.18);
      font-size: 13px;
      color: rgba(255,255,255,.92);
    }

    /* Hero card */
    .hero-card{
      background: rgba(255,255,255,.10);
      border:1px solid rgba(255,255,255,.18);
      border-radius: var(--radius);
      padding: 18px;
      box-shadow: 0 24px 70px rgba(0,0,0,.22);
    }
    .hero-card h3{ margin:0 0 6px; font-size: 16px; }
    .hero-card p{ margin:0 0 14px; font-size: 13px; color: rgba(255,255,255,.82); }
    .hero-form{ display:grid; gap: 10px; }
    .field{
      display:grid; gap: 6px;
    }
    .field label{ font-size: 12px; color: rgba(255,255,255,.78); }
    .input{
      width:100%;
      padding: 12px 12px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.22);
      background: rgba(255,255,255,.12);
      color:#fff;
      outline: none;
    }
    .input::placeholder{ color: rgba(255,255,255,.6); }
    .hero-form .btn{ width:100%; padding: 12px 14px; border-radius: 12px;}

    /* Trust bar */
    .trust{
      padding: 18px 0;
      border-bottom: 1px solid var(--line);
      background:#fff;
    }
    .trust-row{
      display:grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
      align-items:center;
    }
    .trust-item{
      display:flex; align-items:center; gap:10px;
      padding: 12px 12px;
      border: 1px solid var(--line);
      border-radius: 14px;
      background: #fff;
    }
    .dot{
      width: 12px; height:12px; border-radius:999px; background: var(--success);
      box-shadow: 0 10px 25px rgba(22,163,74,.25);
      flex: 0 0 auto;
    }
    .trust-item strong{ font-size: 14px; }
    .trust-item span{ display:block; font-size: 12px; color: var(--muted); margin-top:2px; }

    /* Sections */
    .section-title{
      display:flex; align-items:end; justify-content:space-between;
      gap: 16px;
      margin-bottom: 18px;
    }
    .section-title h2{ margin:0; font-size: 26px; letter-spacing:-.3px; }
    .section-title p{ margin:0; color: var(--muted); max-width: 62ch; }

    /* Tour cards */
    .tour-grid{ grid-template-columns: repeat(3, 1fr); }
    .card{
      background: var(--card);
      border:1px solid var(--line);
      border-radius: var(--radius);
      overflow:hidden;
      box-shadow: var(--shadow);
      display:flex; flex-direction:column;
      min-height: 100%;
    }
    .card-media{
      position:relative;
      height: 180px;
      background: #e2e8f0;
    }
    .card-media img{ width:100%; height:100%; object-fit:cover; }
    .tag{
      position:absolute; top: 12px; left: 12px;
      background: rgba(245,158,11,.95);
      color:#1f2937; font-weight: 900; font-size: 12px;
      padding: 6px 10px; border-radius: 999px;
    }
    .fav{
      position:absolute; top: 12px; right: 12px;
      width: 38px; height: 38px; border-radius: 999px;
      border: 1px solid rgba(255,255,255,.5);
      background: rgba(0,0,0,.22);
      display:grid; place-items:center;
      cursor:pointer;
    }
    .fav svg{ width: 18px; height:18px; }
    .card-body{ padding: 14px 14px 16px; display:grid; gap: 10px; flex:1; }
    .rating{ display:flex; align-items:center; gap: 8px; font-size: 13px; color: var(--muted); }
    .rating .stars{ font-size: 13px; letter-spacing:0; }
    .card-title{ font-weight: 900; letter-spacing:-.2px; margin:0; }
    .meta{ display:flex; gap: 12px; flex-wrap: wrap; color: var(--muted); font-size: 13px; }
    .meta span{ display:inline-flex; gap:6px; align-items:center; }
    .price-row{ display:flex; align-items: baseline; justify-content:space-between; gap: 10px; }
    .price{ font-size: 20px; font-weight: 900; color: var(--text); }
    .per{ font-size: 12px; color: var(--muted); font-weight: 700; }
    .card-actions{ display:flex; gap: 10px; }
    .card-actions .btn{ flex:1; }

    /* Why section */
    .why-grid{ grid-template-columns: repeat(3, 1fr); }
    .why{
      padding: 18px;
      border:1px solid var(--line);
      border-radius: var(--radius);
      background:#fff;
      box-shadow: var(--shadow);
    }
    .why h3{ margin: 10px 0 6px; font-size: 16px; }
    .why p{ margin:0; color: var(--muted); font-size: 14px; }
    .icon{
      width: 44px; height: 44px; border-radius: 14px;
      display:grid; place-items:center;
      background: #f1f5f9;
      border: 1px solid var(--line);
    }

    /* Testimonials */
    .test-grid{ grid-template-columns: repeat(3, 1fr); }
    .quote{
      padding: 18px;
      border:1px solid var(--line);
      border-radius: var(--radius);
      background:#fff;
      box-shadow: var(--shadow);
      display:grid; gap: 10px;
    }
    .quote p{ margin:0; color: var(--text); font-weight: 650; }
    .who{ display:flex; align-items:center; gap: 10px; margin-top: 4px; }
    .avatar{ width: 38px; height:38px; border-radius:999px; background:#e2e8f0; overflow:hidden; }
    .avatar img{ width:100%; height:100%; object-fit:cover; }
    .who strong{ display:block; font-size: 13px; }
    .who span{ display:block; font-size: 12px; color: var(--muted); }

    /* Email capture */
    .cta-box{
      border-radius: 22px;
      border:1px solid var(--line);
      background: linear-gradient(135deg, #f8fafc, #ffffff);
      box-shadow: var(--shadow);
      padding: 22px;
      display:flex; align-items:center; justify-content:space-between; gap: 16px;
    }
    .cta-box h3{ margin:0; font-size: 18px; }
    .cta-box p{ margin:6px 0 0; color: var(--muted); font-size: 14px; }
    .email-form{ display:flex; gap: 10px; align-items:center; flex-wrap:wrap; justify-content:flex-end; }
    .email-form input{
      padding: 12px 12px;
      border-radius: 12px;
      border: 1px solid var(--line);
      min-width: min(340px, 70vw);
      outline:none;
    }

    /* Footer */
    footer{
      border-top: 1px solid var(--line);
      padding: 42px 0;
      background:#fff;
    }
    .footer-grid{
      display:grid;
      grid-template-columns: 1.2fr 1fr 1fr 1fr;
      gap: 18px;
    }
    .footer-grid h4{ margin:0 0 10px; font-size: 13px; letter-spacing:.2px; text-transform: uppercase; color: var(--muted); }
    .footer-grid a{ display:block; padding: 6px 0; color: var(--text); font-weight: 650; font-size: 14px;}
    .footer-grid a:hover{ text-decoration: underline; }
    .fineprint{ margin-top: 18px; color: var(--muted); font-size: 12px; }

    /* Responsive */
    @media (max-width: 980px){
      .hero-grid{ grid-template-columns: 1fr; align-items: start; }
      .trust-row{ grid-template-columns: repeat(2, 1fr); }
      .tour-grid{ grid-template-columns: repeat(2, 1fr); }
      .why-grid{ grid-template-columns: 1fr; }
      .test-grid{ grid-template-columns: 1fr; }
      .footer-grid{ grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 720px){
      .links, .cta{ display:none; }
      .burger{ display:inline-flex; }
      .tour-grid{ grid-template-columns: 1fr; }
      .trust-row{ grid-template-columns: 1fr; }
      .section{ padding: 56px 0; }
      .cta-box{ flex-direction: column; align-items: flex-start; }
      .email-form{ width:100%; justify-content:flex-start; }
      .email-form input{ min-width: 100%; }
      .hero{ padding: 64px 0 42px; }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="header">
    <div class="container nav">
      <a href="#" class="brand" aria-label="Travaholica Home">
        <span class="logo" aria-hidden="true"></span>
        <span>Travaholica</span>
      </a>

      <nav class="links" aria-label="Primary navigation">
        <a href="#tours">Tours</a>
        <a href="#destinations">Destinations</a>
        <a href="#why">Why Us</a>
        <a href="#reviews">Reviews</a>
        <a href="#contact">Contact</a>
      </nav>

      <div class="cta">
        <a class="btn btn-ghost" href="#tours">Explore Tours</a>
        <a class="btn btn-primary" href="#contact">Book / Inquire</a>
      </div>

      <button class="burger" id="burger" aria-expanded="false" aria-controls="mobilePanel">
        ☰ <span class="sr">Menu</span>
      </button>
    </div>

    <div class="mobile-panel" id="mobilePanel">
      <div class="container">
        <div class="mobile-links">
          <a href="#tours">Tours <small>Browse upcoming experiences</small></a>
          <a href="#destinations">Destinations <small>Explore by country</small></a>
          <a href="#why">Why Us <small>What makes us different</small></a>
          <a href="#reviews">Reviews <small>Traveler stories</small></a>
          <a href="#contact">Book / Inquire <small>Talk to a travel expert</small></a>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero" id="top">
    <div class="container hero-grid">
      <div>
        <div class="chip">✨ Handcrafted cultural journeys</div>
        <h1>Handcrafted Cultural Journeys in Egypt &amp; Beyond</h1>
        <p>
          Small groups. Local expert guides. Stress-free planning — designed for travelers who want authenticity,
          not tourist checklists.
        </p>

        <div class="hero-actions">
          <a class="btn btn-primary" href="#tours">Explore Tours</a>
          <a class="btn btn-secondary" href="#contact">Talk to an Expert</a>
        </div>

        <div class="hero-badges">
          <span class="pill"><span class="stars">★★★★★</span> 4.9 rated</span>
          <span class="pill">✅ Flexible cancellation</span>
          <span class="pill">🔒 Secure payments</span>
          <span class="pill">🧭 Local guides</span>
        </div>
      </div>

      <!-- Quick inquiry (MVP-friendly) -->
      <aside class="hero-card" aria-label="Quick inquiry form">
        <h3>Get a quick quote</h3>
        <p>Tell us your destination & dates — we’ll reply within 24 hours.</p>
        <form class="hero-form" id="quoteForm">
          <div class="field">
            <label for="dest">Destination</label>
            <select id="dest" class="input">
              <option>Egypt</option>
              <option>Nepal</option>
              <option>Jordan</option>
              <option>Morocco</option>
            </select>
          </div>
          <div class="field">
            <label for="dates">Preferred dates</label>
            <input id="dates" class="input" placeholder="e.g. 10–15 March" />
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" class="input" placeholder="you@example.com" required />
          </div>
          <button class="btn btn-primary" type="submit">Request quote</button>
          <div id="quoteMsg" class="muted" style="font-size:12px;"></div>
        </form>
      </aside>
    </div>
  </section>

  <!-- Trust bar -->
  <section class="trust">
    <div class="container trust-row">
      <div class="trust-item">
        <span class="dot"></span>
        <div><strong>Licensed &amp; insured</strong><span>Travel with confidence</span></div>
      </div>
      <div class="trust-item">
        <span class="dot"></span>
        <div><strong>Flexible cancellation</strong><span>Clear refund policy</span></div>
      </div>
      <div class="trust-item">
        <span class="dot"></span>
        <div><strong>Secure payments</strong><span>Protected checkout</span></div>
      </div>
      <div class="trust-item">
        <span class="dot"></span>
        <div><strong>Local expert guides</strong><span>Authentic experiences</span></div>
      </div>
    </div>
  </section>

  <!-- Featured tours -->
  <section class="section" id="tours">
    <div class="container">
      <div class="section-title">
        <div>
          <h2>Popular Experiences</h2>
          <p>Start with our most-loved trips — optimized itineraries, clear inclusions, and reliable support.</p>
        </div>
        <a class="btn btn-ghost" href="#" title="Replace with /tours in WordPress">View all tours</a>
      </div>

      <div class="grid tour-grid">
        <!-- Card 1 -->
        <article class="card">
          <div class="card-media">
            <img alt="Nile cruise" src="images/nile-cruise.jpg">
            <span class="tag">Featured</span>
            <button class="fav" aria-label="Add to wishlist">
              <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <path d="M20.8 4.6c-1.5-1.4-3.9-1.4-5.4 0l-.7.7-.7-.7c-1.5-1.4-3.9-1.4-5.4 0-1.7 1.6-1.7 4.2 0 5.8L12 21l8.8-10.6c1.7-1.6 1.7-4.2 0-5.8z"/>
              </svg>
            </button>
          </div>
          <div class="card-body">
            <div class="rating"><span class="stars">★★★★★</span> 4.8 <span class="muted">(32 reviews)</span></div>
            <h3 class="card-title">12-Day Egypt Highlights + Nile Cruise</h3>
            <div class="meta">
              <span>🕒 12 days</span>
              <span>👥 Small group</span>
              <span>🗺 Cairo • Luxor • Aswan</span>
            </div>
            <div class="price-row">
              <div>
                <div class="price">$1,840</div>
                <div class="per">per person</div>
              </div>
              <span class="muted" style="font-weight:700; font-size:13px;">From</span>
            </div>
            <div class="card-actions">
              <a class="btn btn-primary" href="#contact">View details</a>
              <a class="btn btn-ghost" href="#contact">Book</a>
            </div>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="card">
          <div class="card-media">
            <img alt="Pyramids" src="images/cairo-giza-group.jpg">
            <button class="fav" aria-label="Add to wishlist">
              <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <path d="M20.8 4.6c-1.5-1.4-3.9-1.4-5.4 0l-.7.7-.7-.7c-1.5-1.4-3.9-1.4-5.4 0-1.7 1.6-1.7 4.2 0 5.8L12 21l8.8-10.6c1.7-1.6 1.7-4.2 0-5.8z"/>
              </svg>
            </button>
          </div>
          <div class="card-body">
            <div class="rating"><span class="stars">★★★★☆</span> 4.6 <span class="muted">(18 reviews)</span></div>
            <h3 class="card-title">5-Day Cairo &amp; Giza Essentials</h3>
            <div class="meta">
              <span>🕒 5 days</span>
              <span>🏛 Museums</span>
              <span>✅ Airport pickup</span>
            </div>
            <div class="price-row">
              <div>
                <div class="price">$980</div>
                <div class="per">per person</div>
              </div>
              <span class="muted" style="font-weight:700; font-size:13px;">From</span>
            </div>
            <div class="card-actions">
              <a class="btn btn-primary" href="#contact">View details</a>
              <a class="btn btn-ghost" href="#contact">Book</a>
            </div>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="card">
          <div class="card-media">
            <img alt="Himalayas trek" src="images/nepal-mountains.jpg">
            <button class="fav" aria-label="Add to wishlist">
              <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <path d="M20.8 4.6c-1.5-1.4-3.9-1.4-5.4 0l-.7.7-.7-.7c-1.5-1.4-3.9-1.4-5.4 0-1.7 1.6-1.7 4.2 0 5.8L12 21l8.8-10.6c1.7-1.6 1.7-4.2 0-5.8z"/>
              </svg>
            </button>
          </div>
          <div class="card-body">
            <div class="rating"><span class="stars">★★★★★</span> 4.9 <span class="muted">(41 reviews)</span></div>
            <h3 class="card-title">5-Day Nepal Viewpoints &amp; Culture</h3>
            <div class="meta">
              <span>🕒 5 days</span>
              <span>⛰ Scenic</span>
              <span>🧑‍🤝‍🧑 Guided</span>
            </div>
            <div class="price-row">
              <div>
                <div class="price">$1,250</div>
                <div class="per">per person</div>
              </div>
              <span class="muted" style="font-weight:700; font-size:13px;">From</span>
            </div>
            <div class="card-actions">
              <a class="btn btn-primary" href="#contact">View details</a>
              <a class="btn btn-ghost" href="#contact">Book</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Destinations (simple MVP grid) -->
  <section class="section" id="destinations" style="padding-top:0;">
    <div class="container">
      <div class="section-title">
        <div>
          <h2>Explore By Destination</h2>
          <p>Help visitors browse the way they think: by country first, then by trip type.</p>
        </div>
      </div>

      <div class="grid" style="grid-template-columns: repeat(4, 1fr); gap: 14px;">
        <a class="card" href="#" style="min-height: 140px;">
          <div class="card-media" style="height: 140px;">
            <img alt="Egypt" src="https://images.unsplash.com/photo-1539768942893-daf53e448371?auto=format&fit=crop&w=1400&q=80">
          </div>
          <div class="card-body" style="padding: 12px;">
            <strong>Egypt</strong>
            <span class="muted" style="font-size:12px;">History • Nile • Culture</span>
          </div>
        </a>
        <a class="card" href="#" style="min-height: 140px;">
          <div class="card-media" style="height: 140px;">
            <img alt="Nepal" src="https://images.unsplash.com/photo-1521295121783-8a321d551ad2?auto=format&fit=crop&w=1400&q=80">
          </div>
          <div class="card-body" style="padding: 12px;">
            <strong>Nepal</strong>
            <span class="muted" style="font-size:12px;">Mountains • Trekking</span>
          </div>
        </a>
        <a class="card" href="#" style="min-height: 140px;">
          <div class="card-media" style="height: 140px;">
            <img alt="Jordan" src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1400&q=80">
          </div>
          <div class="card-body" style="padding: 12px;">
            <strong>Jordan</strong>
            <span class="muted" style="font-size:12px;">Petra • Desert</span>
          </div>
        </a>
        <a class="card" href="#" style="min-height: 140px;">
          <div class="card-media" style="height: 140px;">
            <img alt="Morocco" src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&w=1400&q=80">
          </div>
          <div class="card-body" style="padding: 12px;">
            <strong>Morocco</strong>
            <span class="muted" style="font-size:12px;">Souks • Coast</span>
          </div>
        </a>
      </div>
      <style>
        @media (max-width: 980px){
          #destinations .grid{ grid-template-columns: repeat(2,1fr) !important; }
        }
        @media (max-width: 720px){
          #destinations .grid{ grid-template-columns: 1fr !important; }
        }
      </style>
    </div>
  </section>

  <!-- Why Us -->
  <section class="section" id="why" style="background:#f8fafc; border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
    <div class="container">
      <div class="section-title">
        <div>
          <h2>Why Travelers Choose Travaholica</h2>
          <p>Clear differentiation beats generic travel claims. Keep this section honest and specific.</p>
        </div>
      </div>

      <div class="grid why-grid">
        <div class="why">
          <div class="icon">🧩</div>
          <h3>Handcrafted itineraries</h3>
          <p>Designed to balance highlights with hidden gems — with time to actually enjoy the place.</p>
        </div>
        <div class="why">
          <div class="icon">🧭</div>
          <h3>Local expert guides</h3>
          <p>Travel with people who live the culture — better stories, smoother logistics, safer routes.</p>
        </div>
        <div class="why">
          <div class="icon">🛡️</div>
          <h3>Stress-free planning</h3>
          <p>From pickup to hotels to day-by-day guidance, we handle the details so you can relax.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="section" id="reviews">
    <div class="container">
      <div class="section-title">
        <div>
          <h2>What Our Travelers Say</h2>
          <p>Pulled from public social pages. Open each source to verify and read more feedback.</p>
        </div>
        <a class="btn btn-ghost" href="https://www.tripadvisor.com/Attraction_Review-g946992-d27494028-Reviews-Travaholica-Schoneiche_Brandenburg.html" target="_blank" rel="noopener noreferrer" title="Open Tripadvisor reviews">View Tripadvisor</a>
      </div>

      <div class="grid test-grid">
        <div class="quote">
          <div class="rating"><span class="stars">★★★★★</span> Facebook Review</div>
          <p>"One of best tours in berlin. I went with them and totally happy with their service."</p>
          <div class="who">
            <div class="avatar"><img alt="Reviewer avatar" src="https://i.pravatar.cc/80?img=33"></div>
            <div>
              <strong>Rez Imani</strong>
              <span>Facebook review • September 17, 2025</span>
            </div>
          </div>
        </div>

        <div class="quote">
          <div class="rating"><span class="stars">Social</span> Facebook</div>
          <p>Public page status: "Not yet rated (3 Reviews)". See all available recommendations directly on Facebook.</p>
          <div class="who">
            <div class="avatar"><img alt="Facebook icon style avatar" src="https://i.pravatar.cc/80?img=15"></div>
            <div>
              <strong>Facebook Reviews</strong>
              <span><a href="https://www.facebook.com/profile.php?id=100063499302538&sk=reviews" target="_blank" rel="noopener noreferrer">Open review feed</a></span>
            </div>
          </div>
        </div>

        <div class="quote">
          <div class="rating"><span class="stars">Social</span> More feedback</div>
          <p>More traveler proof is available on Tripadvisor and Instagram. Follow for new stories and recent trips.</p>
          <div class="who">
            <div class="avatar"><img alt="Social links avatar" src="https://i.pravatar.cc/80?img=5"></div>
            <div>
              <strong>Social Channels</strong>
              <span><a href="https://www.instagram.com/travaholica" target="_blank" rel="noopener noreferrer">Instagram</a> • <a href="https://web.facebook.com/people/Travaholica/100063499302538" target="_blank" rel="noopener noreferrer">Facebook</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Email capture + final CTA -->
  <section class="section" id="contact" style="padding-top:0;">
    <div class="container">
      <div class="cta-box">
        <div>
          <h3>Get exclusive travel deals & early access</h3>
          <p>Join our list for limited offers. (MVP tip: offer <strong>5% off</strong> your first booking.)</p>
        </div>
        <form class="email-form" id="emailForm">
          <label class="sr" for="newsletter">Email</label>
          <input id="newsletter" type="email" placeholder="you@example.com" required />
          <button class="btn btn-primary" type="submit">Get deals</button>
          <span id="emailMsg" class="muted" style="font-size:12px;"></span>
        </form>
      </div>

      <div style="margin-top: 18px; display:flex; gap: 10px; flex-wrap: wrap;">
        <a class="btn btn-primary" href="#tours">Explore tours</a>
        <a class="btn btn-ghost" href="#top">Back to top</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container footer-grid">
      <div>
        <div class="brand" style="margin-bottom: 12px;">
          <span class="logo" aria-hidden="true"></span>
          <span>Travaholica</span>
        </div>
        <p class="muted" style="margin:0; max-width: 44ch;">
          Handcrafted journeys designed by local experts — built for travelers who want authenticity and ease.
        </p>
        <div class="fineprint">© <span id="year"></span> Travaholica. All rights reserved.</div>
      </div>

      <div>
        <h4>Company</h4>
        <a href="#">About</a>
        <a href="#">FAQs</a>
        <a href="#">Terms</a>
        <a href="#">Privacy</a>
      </div>

      <div>
        <h4>Explore</h4>
        <a href="#tours">Tours</a>
        <a href="#destinations">Destinations</a>
        <a href="#reviews">Reviews</a>
      </div>

      <div>
        <h4>Need help?</h4>
        <a href="tel:+20123456789">Call: +20 123 456 789</a>
        <a href="mailto:info@travaholica.com">Email: info@travaholica.com</a>
        <a href="#">WhatsApp</a>
        <a href="https://web.facebook.com/people/Travaholica/100063499302538" target="_blank" rel="noopener noreferrer">Facebook</a>
        <a href="https://www.tripadvisor.com/Attraction_Review-g946992-d27494028-Reviews-Travaholica-Schoneiche_Brandenburg.html" target="_blank" rel="noopener noreferrer">Tripadvisor</a>
        <a href="https://www.instagram.com/travaholica" target="_blank" rel="noopener noreferrer">Instagram</a>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    const burger = document.getElementById('burger');
    const panel = document.getElementById('mobilePanel');

    burger?.addEventListener('click', () => {
      const open = panel.style.display === 'block';
      panel.style.display = open ? 'none' : 'block';
      burger.setAttribute('aria-expanded', String(!open));
    });

    // Fake form submissions (demo behavior)
    const quoteForm = document.getElementById('quoteForm');
    const quoteMsg = document.getElementById('quoteMsg');

    quoteForm?.addEventListener('submit', (e) => {
      e.preventDefault();
      quoteMsg.textContent = "Thanks! We'll email you within 24 hours.";
      quoteForm.reset();
    });

    const emailForm = document.getElementById('emailForm');
    const emailMsg = document.getElementById('emailMsg');

    emailForm?.addEventListener('submit', (e) => {
      e.preventDefault();
      emailMsg.textContent = "You're in! Check your inbox soon.";
      emailForm.reset();
    });

    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
