<?php
/**
 * Static interface icons.
 *
 * Markup is authored in the theme and selected by a fixed name.
 * User content is never inserted into these strings.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a theme icon.
 *
 * @param string $name Icon key.
 * @return string SVG markup, or an empty string.
 */
function gp_icon( $name ) {
	$icons = array(
		'github'   => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.18-3.37-1.18-.45-1.16-1.1-1.47-1.1-1.47-.9-.62.07-.6.07-.6 1 .07 1.52 1.03 1.52 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.08.63-1.33-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.99 1.03-2.69-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.02a9.56 9.56 0 0 1 5 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.38.2 2.4.1 2.65.64.7 1.03 1.6 1.03 2.69 0 3.85-2.34 4.7-4.57 4.95.36.31.68.92.68 1.86v2.76c0 .26.18.58.69.48A10 10 0 0 0 12 2Z"/></svg>',
		'linkedin' => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M6.5 9H4V20h2.5V9ZM5.25 3.5A1.75 1.75 0 1 0 5.26 7a1.75 1.75 0 0 0 0-3.5ZM20 20h-2.5v-5.6c0-1.55-.55-2.6-1.94-2.6-1.06 0-1.69.71-1.97 1.4-.1.24-.12.58-.12.92V20H11V9h2.4v1.51c.36-.55 1.24-1.66 3.16-1.66 2.24 0 3.44 1.46 3.44 4.42V20Z"/></svg>',
		'mail'     => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="m4 7 8 6 8-6"/></svg>',
		'arrow'    => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>',
		'code'     => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m8 8-4 4 4 4"/><path d="m16 8 4 4-4 4"/><path d="m13 5-2 14"/></svg>',
		'layout'   => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="4.5" width="17" height="15" rx="2"/><path d="M3.5 9h17"/><path d="M9 9v10.5"/></svg>',
		'database' => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="6.5" rx="6.5" ry="2.7"/><path d="M5.5 6.5v11c0 1.5 2.9 2.7 6.5 2.7s6.5-1.2 6.5-2.7v-11"/><path d="M5.5 12c0 1.5 2.9 2.7 6.5 2.7s6.5-1.2 6.5-2.7"/></svg>',
		'network'  => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="7" r="2.2"/><circle cx="17.5" cy="6.5" r="2.2"/><circle cx="8" cy="17" r="2.2"/><circle cx="17" cy="16.5" r="2.2"/><path d="m8 8.2 7.2-1.2M7.2 15.2 16 8.2M10.1 16.6h4.6"/></svg>',
		'pen'      => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h4l10.2-10.2a2.1 2.1 0 0 0-3-3L5 17v3Z"/><path d="m12.8 7.2 3 3"/></svg>',
		'cpu'      => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M9 3.5v3M12 3.5v3M15 3.5v3M9 17.5v3M12 17.5v3M15 17.5v3M3.5 9h3M3.5 12h3M3.5 15h3M17.5 9h3M17.5 12h3M17.5 15h3"/></svg>',
		'tool'     => '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 6.5a3.5 3.5 0 0 0-4.8 4.3L4 16.5 7.5 20l5.7-5.7a3.5 3.5 0 0 0 4.3-4.8L15 12l-3-3 2.5-2.5Z"/></svg>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return $icons[ $name ];
}
