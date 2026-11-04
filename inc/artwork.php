<?php
/**
 * Decorative project artwork.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * SVG illustration for a project card.
 *
 * @param string $style Artwork key.
 * @return string
 */
function gp_project_art( $style ) {
	$arts = array(
		'interface' => '<svg viewBox="0 0 640 400" aria-hidden="true" fill="none"><rect x="70" y="54" width="500" height="292" rx="22" fill="rgba(11,15,25,0.72)" stroke="rgba(249,250,251,0.14)"/><rect x="70" y="54" width="500" height="42" rx="22" fill="rgba(255,255,255,0.03)"/><circle cx="98" cy="75" r="5" fill="#3B82F6"/><circle cx="116" cy="75" r="5" fill="#8B5CF6"/><rect x="98" y="122" width="120" height="184" rx="12" fill="rgba(59,130,246,0.12)" stroke="rgba(147,197,253,0.25)"/><rect x="242" y="122" width="292" height="28" rx="8" fill="rgba(249,250,251,0.08)"/><rect x="242" y="166" width="210" height="16" rx="8" fill="rgba(249,250,251,0.05)"/><rect x="242" y="196" width="250" height="16" rx="8" fill="rgba(249,250,251,0.05)"/><path d="M250 300c28-36 52-20 78-46 24-24 40-8 62-28 22-20 48-52 92-34" stroke="#93C5FD" stroke-width="3" stroke-linecap="round"/><circle cx="328" cy="254" r="5" fill="#C4B5FD"/><circle cx="390" cy="226" r="5" fill="#3B82F6"/></svg>',
		'systems'   => '<svg viewBox="0 0 640 400" aria-hidden="true" fill="none"><circle cx="180" cy="150" r="36" stroke="#93C5FD" stroke-width="2" fill="rgba(59,130,246,0.12)"/><circle cx="430" cy="120" r="28" stroke="#C4B5FD" stroke-width="2" fill="rgba(139,92,246,0.14)"/><circle cx="470" cy="270" r="42" stroke="#93C5FD" stroke-width="2" fill="rgba(59,130,246,0.1)"/><circle cx="230" cy="280" r="24" stroke="#C4B5FD" stroke-width="2" fill="rgba(139,92,246,0.12)"/><path d="M210 166 404 136M204 176 246 258M254 270 430 270M430 148 452 230" stroke="rgba(191,219,254,0.7)" stroke-width="1.6"/><circle cx="180" cy="150" r="6" fill="#3B82F6"/><circle cx="430" cy="120" r="6" fill="#8B5CF6"/><circle cx="470" cy="270" r="6" fill="#93C5FD"/><circle cx="230" cy="280" r="6" fill="#C4B5FD"/></svg>',
		'data'      => '<svg viewBox="0 0 640 400" aria-hidden="true" fill="none"><ellipse cx="320" cy="108" rx="150" ry="36" fill="rgba(59,130,246,0.16)" stroke="#93C5FD"/><path d="M170 108v48c0 20 67 36 150 36s150-16 150-36v-48" stroke="#93C5FD"/><ellipse cx="320" cy="176" rx="150" ry="36" fill="rgba(139,92,246,0.12)" stroke="#C4B5FD"/><path d="M170 176v48c0 20 67 36 150 36s150-16 150-36v-48" stroke="#C4B5FD"/><ellipse cx="320" cy="246" rx="150" ry="36" fill="rgba(59,130,246,0.1)" stroke="#93C5FD"/><path d="M170 246v36c0 20 67 36 150 36s150-16 150-36v-36" stroke="#93C5FD"/><rect x="250" y="292" width="140" height="10" rx="5" fill="rgba(249,250,251,0.16)"/></svg>',
	);

	$style = sanitize_key( (string) $style );

	if ( ! isset( $arts[ $style ] ) ) {
		$style = 'interface';
	}

	return $arts[ $style ];
}
