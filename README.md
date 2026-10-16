# EvieWP

EvieWP is a lightweight classic WordPress theme for blogs and content-focused sites. Version 1.1 modernizes the original theme for WordPress 7.1 while preserving its visual character and Customizer workflow.

## Requirements

- WordPress 6.6 or newer
- PHP 7.4 or newer
- WordPress 7.1 and PHP 8.3+ are recommended for production

## Features

- Responsive single-level primary navigation
- Accessible search dialog and keyboard navigation
- Left, right, or disabled sidebars for posts, pages, and archives
- Customizer controls for colors, sizing, excerpts, and layout
- Block editor styles, wide/full alignment, and responsive embeds
- A reusable callout block pattern and card-style Group variation
- RTL and print styles
- Featured images, author cards, pagination, threaded comments, and widgets
- No front-end JavaScript or PHP runtime dependencies

## Installation

1. Copy the `evie-wp` directory to `wp-content/themes/`.
2. Activate **EvieWP** from **Appearance → Themes**.
3. Configure the primary menu, widgets, logo, colors, and layout in the Customizer.

Only one level of navigation is supported.

## Development

Install the development dependencies:

```bash
composer install
npm install
```

Run all static checks:

```bash
composer phpcs
npm run lint
```

The production theme package should exclude the files listed in `.distignore`.

## Compatibility

EvieWP 1.1 is tested against WordPress 7.1 and PHP 7.4 through PHP 8.4. See [CHANGELOG.md](CHANGELOG.md) for the modernization details.

## Credits

- [Evie](https://github.com/anges244/evie) — MIT
- [Font Awesome Free](https://fontawesome.com/) — Icons: CC BY 4.0; fonts: SIL OFL 1.1; code: MIT
- [Bootstrap grid](https://getbootstrap.com/) — MIT
- [normalize.css](https://github.com/necolas/normalize.css) — MIT
- [Underscores](https://underscores.me/) — GPL-2.0-or-later

## License

EvieWP is licensed under the [GNU GPL v2 or later](LICENSE).
