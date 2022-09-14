![Development](https://github.com/ravorona/sage/actions/workflows/develop.yml/badge.svg) ![Release](https://github.com/ravorona/sage/actions/workflows/publish.yml/badge.svg)

# 🧩 Wordpress Starter Theme

-   Based on [Sage](https://roots.io/sage/) version [10](https://github.com/roots/sage/)
-   Using [Vite](https://vitejs.dev)

## Requirements

-   [Acorn](https://docs.roots.io/acorn/2.x/installation/) v2
-   [PHP](https://secure.php.net/manual/en/install.php) >= 8.0.2 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
-   [Composer](https://getcomposer.org/download/)
-   [Vite](https://vitejs.dev) >= 3.1.0
-   [Node.js](http://nodejs.org/) >= 14.0.0
-   [Yarn](https://yarnpkg.com/en/docs/install)

## Theme installation

Install Sage using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# @ app/themes/ or wp-content/themes/
$ composer create-project ravorona/sage your-theme-name
```

To install the latest development version of Sage, add `dev-develop` to the end of the command:

```shell
$ composer create-project ravorona/sage your-theme-name dev-develop
```

## Theme structure

```sh
themes/your-theme-name/   # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── Providers/        # → Service providers
│   ├── View/             # → View models
│   ├── filters.php       # → Theme filters
│   ├── helpers.php       # → Global helpers
│   ├── medias.php        # → Medias helper
│   └── setup.php         # → Theme setup
├── composer.json         # → Autoloading for `app/` files
├── public/               # → Built theme assets (never edit)
├── functions.php         # → Theme bootloader
├── index.php             # → Theme template wrapper
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme javascript
│   ├── styles/           # → Theme stylesheets
│   ├── svg/              # → Theme svgs
│   └── views/            # → Theme templates
│       ├── components/   # → Component templates
│       ├── forms/        # → Form templates
│       ├── layouts/      # → Base templates
│       ├── partials/     # → Partial templates
        └── sections/     # → Section templates
├── screenshot.png        # → Theme screenshot for WP admin
├── style.css             # → Theme meta information
├── vendor/               # → Composer packages (never edit)
└── vite.config.ts        # → Vite configuration
```

## Theme development

-   Run `yarn` from the theme directory to install dependencies
-   Update `vite.config.ts` for bundler fine tuning

### Build commands

-   `yarn dev` — Start dev server
-   `yarn build` — Compile assets
-   `yarn lint` — Lint stylesheets & javascripts
-   `yarn lint:css` — Lint stylesheets
-   `yarn lint:js` — Lint javascripts

### Hot reload mode

To enable hot reload add the following variables in your `.env`

```sh
# Dev server port
HMR_PORT=3000

# if true hot reload is active
HMR_ENABLED=true

# Endpoint where the bundler serve your assets
HMR_ENTRYPOINT=https://example.com:${HMR_PORT}
```

To dev server `https` mode add valid certificates path with

```sh
# Certificates
HTTPS_CERT=path_to_crt
HTTPS_KEY=path_to_key
```


Update path to `.env` in `vite.config.ts`

```javascript
dotenv.config({ path: '../../../../.env' })
```

## Documentation

-   [Sage documentation](https://roots.io/sage/docs/)
-   [Controller documentation](https://github.com/soberwp/controller#usage)
-   [Vite](https://vitejs.dev/guide/)
