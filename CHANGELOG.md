# Changelog

All notable changes to EvieWP are documented here.

## 1.1.0 — 2026-10-16

### Compatibility

- Tested against WordPress 7.1 and PHP 7.4–8.4.
- Added `theme.json` version 3, responsive embeds, wide alignment, editor styles, RTL styles, and print-style loading.
- Added a reusable callout block pattern and a card style for Group blocks.
- Removed the external Google Fonts request in favor of a privacy-friendly system font stack.

### Security and correctness

- Added contextual escaping for archive, taxonomy, author, breadcrumb, adjacent-post, and Customizer-generated output.
- Validated Customizer select choices and constrained numeric settings.
- Corrected the option helper guard and the color-shading calculation.
- Synchronized the runtime asset version with theme metadata.

### Accessibility

- Replaced link-like controls with semantic buttons.
- Added dialog labels and state, focus trapping and restoration, Escape handling, visible focus styles, and reduced-motion support.
- Rebuilt mobile navigation with accurate ARIA state and keyboard behavior.
- Corrected decorative avatar alternative text and search form labeling.
- Corrected duplicate footer hooks on 404 and empty-search templates.
- Preserved modal styling for WordPress-generated search form fields.
- Prevented an unset legacy container-width option from collapsing desktop layouts.
- Allowed desktop post grids to fill the available width with or without a sidebar.
- Prevented desktop page content from collapsing around container-responsive plugin interfaces.
- Aligned header controls, corrected search dialog spacing and focus, and repaired mobile navigation visibility and toggle icons.
- Centered the search dialog close icon independently of font metrics.

### Developer experience

- Added PHP_CodeSniffer with WordPress Coding Standards, ESLint, Stylelint, CI, and distribution exclusions.
- Optimized the theme screenshot while retaining the recommended 1200×900 dimensions.
- Removed unused legacy JavaScript and third-party compatibility libraries.
