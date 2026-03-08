# Memory

## 2026-03-08
- Added footer social links across all main templates:
  - Facebook: https://web.facebook.com/people/Travaholica/100063499302538
  - Tripadvisor: https://www.tripadvisor.com/Attraction_Review-g946992-d27494028-Reviews-Travaholica-Schoneiche_Brandenburg.html
  - Instagram: https://www.instagram.com/travaholica
- Updated files:
  - `index.html`
  - `index.html.txt`
  - `wordpress/elementor-html-widget.html`
  - `wordpress/theme/travaholica/index.php`
  - `wordpress/travaholica-elementor-template.json`
- Live check run against `https://travaholica.vercel.app/` from this environment did not find the three social links in the returned HTML at check time.
- User noted the live site was already updated manually.

## 2026-03-08 (Real Client Reviews Feed)
- Added real client review content to `data/social-reviews.json` and updated dynamic testimonial rendering in:
  - `index.html`
  - `index.html.txt`
- Renderer now supports:
  - Optional review title field
  - Optional source link field
  - Rendering all reviews from the feed (no 3-item cap)
- Live test results before this push:
  - `https://travaholica.vercel.app/` returned `200` but did not yet include reviewer names:
    - `Vacationer`
    - `Camper331995`
    - `184anthonyk`
    - `Sara B`
  - `https://travaholica.vercel.app/api/reviews` returned `200` with `3` reviews (older deployed payload).

## 2026-03-08 (Tour Card Local Images)
- Replaced tour card remote image URLs with local asset paths:
  - Nile Cruise card -> `images/nile-cruise.jpg`
  - Cairo/Giza card -> `images/cairo-giza-group.jpg`
  - Nepal card -> `images/nepal-mountains.jpg`
- Updated files:
  - `index.html`
  - `index.html.txt`
  - `wordpress/elementor-html-widget.html`
  - `wordpress/theme/travaholica/index.php`
  - `wordpress/travaholica-elementor-template.json`
  - `images/README.md`
- Live test results before this push:
  - `https://travaholica.vercel.app/` returned `200` but did not include:
    - `images/nile-cruise.jpg`
    - `images/cairo-giza-group.jpg`
    - `images/nepal-mountains.jpg`
  - `https://travaholica.vercel.app/api/reviews` returned `200` with `5` reviews and included:
    - `Vacationer`
    - `Camper331995`
    - `184anthonyk`
    - `Sara B`
