# AGENTS.md — Arc website (WordPress)

## What this is

A bilingual (Persian RTL + English LTR) marketing site for **Arc** — a software
development, web design and business-development company. The repo holds only the
parts we own: a child theme (`wp-content/themes/arc-child`). WordPress core and the
database live in Docker volumes, not in git.

The design follows the supplied reference: dark surface (`#050505`), electric
purple/blue gradients, thin `1px` borders, generous section spacing.

## Running it

```bash
docker compose -f docker-compose.base44.yml up -d      # db + wordpress (port 3000)
docker compose -f docker-compose.base44.yml ps
curl -s -o /dev/null -w '%{http_code}\n' http://localhost:3000/
```

The site is served on host port **3000** and is reachable in the preview through the
proxy. WordPress admin: `/wp-admin` — user `arcadmin`, password `Arc!Preview-8x4Qm2`
(sandbox-only credentials; change them for any real deployment).

### WP-CLI

`wpcli` is an on-demand service behind the `tools` profile, so `up` does not start it:

```bash
docker compose -f docker-compose.base44.yml run --rm --entrypoint wp wpcli plugin list
docker compose -f docker-compose.base44.yml run --rm -v /tmp/x.php:/x.php --entrypoint wp wpcli eval-file /x.php
```

## Non-obvious setup facts

- **WP-CLI must run as uid 33.** The `wordpress:cli` image defaults to uid 82, but the
  `wordpress` image owns the volume as uid 33. Without `user: "33:33"` on the `wpcli`
  service, every plugin/language install fails with "Could not create directory".
- **First boot may need an ownership fix** before installing plugins or language packs:

  ```bash
  docker compose -f docker-compose.base44.yml exec -T -u root wordpress \
    chown -R www-data:www-data /var/www/html
  ```

- **Polylang free cannot share a slug between translations.** Translated pages get a
  unique slug (`/en/services-2/`). Sharing identical slugs (`/services/` and
  `/en/services/`) requires Polylang Pro. The theme resolves links through
  `arc_url()`, which looks up the default-language page and then its translation, so
  links stay correct either way.
- **Contact Form 7 does not install** on this PHP build; Elementor Pro's Form widget
  (or another form plugin) covers forms instead.
- Elementor (free) is installed and active. **Elementor Pro is not** — it is
  commercial software that cannot be downloaded without the account's licence, so it
  must be uploaded once by hand: WP admin → Plugins → Add New → Upload Plugin.

## Projects (portfolio content)

The theme registers an `arc_project` post type — WP admin → **پروژه‌ها → افزودن پروژه**.
Enter the project name, the text (editor) and the image (**تصویر پروژه**, the featured
image); the optional *دسته پروژه* taxonomy is the tag line above the title. Publishing a
project places it automatically in both project areas: the «پروژه‌های اخیر» section of the
front page (3 newest) and the `/portfolio/` + `/en/portfolio-2/` page grid (all of them).
Each card links to a single project page at `/projects/<slug>/`.

Until at least one project is published, both areas fall back to the built-in demo items
in `inc/content.php`. Projects are deliberately **not** translated by Polylang, so the
same list shows in both languages. On an existing install the post type needs a one-off
`wp rewrite flush` (already done here). Code lives in `inc/projects.php`:
`arc_get_projects()` reads them, `arc_render_projects()` prints the grid,
`arc_is_portfolio_page()` decides where the full grid goes.

## Dark / light theme

Dark is the default. The header toggle (`[data-arc-theme-toggle]`) sets
`data-theme="light"` on `<html>` and remembers the choice in `localStorage['arc-theme']`;
a small inline script in `header.php` applies it before paint so there is no flash of the
wrong theme. Light colours are overridden in the `html[data-theme='light']` token block in
`assets/css/theme.css`. **Add colours as tokens in `:root` and override them there** — the
light theme only works for values that are variables, not literals.

## Asset cache busting and a cascade trap

- `assets/css/theme.css` and `assets/js/theme.js` are versioned with the theme version
  from `style.css`. **Bump `Version:` in `style.css` when you edit those files**, or the
  browser keeps serving the cached copy (it silently hides CSS/JS changes).
- Hello Elementor's `reset.css` carries `[type=button] { … width: auto }` and
  `button:hover { background-color:#c36; color:#fff }`. Those selectors have the same
  specificity as one class, so they win whenever the parent stylesheet is printed *after*
  ours — this is why `arc_child_assets()` is hooked to `wp_enqueue_scripts` at priority
  **20**. Keep that priority when adding more child stylesheets, otherwise the theme's
  `button` elements get the parent reset applied.

## Preview behaviour (sandbox only)

The preview proxy serves the site at `https://3000-$BASE44_PUBLIC_HOST_SUFFIX`, so
`docker-compose.base44.yml` defines `WP_HOME` / `WP_SITEURL` from that variable —
WordPress' request-based URL detection cannot see the public host. Because of that,
`redirect_canonical` is disabled **only** when `BASE44_PREVIEW_MODE` is exactly `"1"`
(see `functions.php`), so internal health checks are not bounced to the public URL.
Unset or any other value keeps WordPress' normal behaviour.

## Verifying a change

```bash
curl -s http://localhost:3000/ | grep -o '<title>[^<]*</title>'          # fa home
curl -s http://localhost:3000/en/ | grep -o 'arc-hero__title">[^<]*'     # en hero
curl -s -o /dev/null -w '%{http_code}\n' http://localhost:3000/services/ # 200
curl -s http://localhost:3000/ | grep -c 'data-arc-theme-toggle'        # 1 — theme switch
curl -s http://localhost:3000/ | grep -c 'arc-work'                    # portfolio cards
```

Theme PHP/CSS/JS is bind-mounted, so edits are live immediately. A `wp` config or
plugin change needs `docker compose -f docker-compose.base44.yml restart wordpress`.
