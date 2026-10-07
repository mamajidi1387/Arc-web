<?php
/**
 * Landing page — mirrors the Arc reference design: hero, trust bar, services,
 * stats, features, portfolio, testimonials, FAQ and closing CTA.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$arc = arc_content();
get_header();
?>

<section class="arc-hero">
	<div class="arc-glow arc-glow--one" aria-hidden="true"></div>
	<div class="arc-glow arc-glow--two" aria-hidden="true"></div>
	<div class="arc-container arc-hero__inner">
		<div class="arc-hero__copy">
			<span class="arc-badge"><?php echo esc_html( $arc['brand'] ); ?></span>
			<h1 class="arc-hero__title"><?php echo esc_html( $arc['hero']['title'] ); ?></h1>
			<p class="arc-hero__text"><?php echo esc_html( $arc['hero']['text'] ); ?></p>
			<div class="arc-hero__actions">
				<a class="arc-btn arc-btn--primary arc-btn--lg" href="<?php echo esc_url( $arc['hero']['primary_url'] ); ?>"><?php echo esc_html( $arc['hero']['primary'] ); ?></a>
				<a class="arc-btn arc-btn--ghost arc-btn--lg" href="<?php echo esc_url( $arc['hero']['secondary_url'] ); ?>"><?php echo esc_html( $arc['hero']['secondary'] ); ?></a>
			</div>
		</div>

		<div class="arc-hero__visual" aria-hidden="true">
			<div class="arc-orb">
				<span class="arc-orb__mark">A</span>
				<span class="arc-orb__word"><?php echo esc_html( $arc['brand'] ); ?></span>
			</div>
		</div>
	</div>
</section>

<section class="arc-trust">
	<div class="arc-container">
		<p class="arc-trust__label"><?php echo esc_html( $arc['trust']['label'] ); ?></p>
		<ul class="arc-trust__logos">
			<?php foreach ( $arc['trust']['logos'] as $logo ) : ?>
				<li><?php echo esc_html( $logo ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="arc-section" id="services">
	<div class="arc-container">
		<header class="arc-section__head">
			<h2 class="arc-section__title"><?php echo esc_html( $arc['services']['title'] ); ?></h2>
			<p class="arc-section__subtitle"><?php echo esc_html( $arc['services']['subtitle'] ); ?></p>
		</header>

		<div class="arc-grid arc-grid--3">
			<?php foreach ( $arc['services']['items'] as $item ) : ?>
				<a class="arc-card" href="<?php echo esc_url( $item['url'] ); ?>">
					<span class="arc-card__arrow" aria-hidden="true">↗</span>
					<h3 class="arc-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p class="arc-card__text"><?php echo esc_html( $item['text'] ); ?></p>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="arc-section arc-section--stats">
	<div class="arc-container">
		<h2 class="arc-section__title arc-section__title--center"><?php echo esc_html( $arc['stats']['title'] ); ?></h2>
		<div class="arc-grid arc-grid--4">
			<?php foreach ( $arc['stats']['items'] as $stat ) : ?>
				<div class="arc-stat">
					<span class="arc-stat__value"><?php echo esc_html( $stat['value'] ); ?></span>
					<span class="arc-stat__label"><?php echo esc_html( $stat['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="arc-section">
	<div class="arc-container">
		<header class="arc-section__head">
			<h2 class="arc-section__title"><?php echo esc_html( $arc['features']['title'] ); ?></h2>
			<p class="arc-section__subtitle"><?php echo esc_html( $arc['features']['subtitle'] ); ?></p>
		</header>

		<div class="arc-grid arc-grid--3">
			<?php foreach ( $arc['features']['items'] as $item ) : ?>
				<div class="arc-card arc-card--static">
					<h3 class="arc-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p class="arc-card__text"><?php echo esc_html( $item['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="arc-section">
	<div class="arc-container">
		<header class="arc-section__head">
			<h2 class="arc-section__title"><?php echo esc_html( $arc['portfolio']['title'] ); ?></h2>
			<p class="arc-section__subtitle"><?php echo esc_html( $arc['portfolio']['subtitle'] ); ?></p>
		</header>

		<div class="arc-grid arc-grid--3">
			<?php foreach ( $arc['portfolio']['items'] as $item ) : ?>
				<a class="arc-work" href="<?php echo esc_url( $arc['portfolio']['all_url'] ); ?>">
					<span class="arc-work__thumb" aria-hidden="true"></span>
					<span class="arc-work__tag"><?php echo esc_html( $item['tag'] ); ?></span>
					<span class="arc-work__title"><?php echo esc_html( $item['title'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="arc-section__foot">
			<a class="arc-btn arc-btn--ghost" href="<?php echo esc_url( $arc['portfolio']['all_url'] ); ?>"><?php echo esc_html( $arc['portfolio']['all'] ); ?></a>
		</div>
	</div>
</section>

<section class="arc-section">
	<div class="arc-container">
		<h2 class="arc-section__title arc-section__title--center"><?php echo esc_html( $arc['testimonials']['title'] ); ?></h2>
		<div class="arc-grid arc-grid--3">
			<?php foreach ( $arc['testimonials']['items'] as $item ) : ?>
				<figure class="arc-quote">
					<div class="arc-quote__stars" aria-label="5/5">★★★★★</div>
					<blockquote class="arc-quote__text"><?php echo esc_html( $item['quote'] ); ?></blockquote>
					<figcaption class="arc-quote__meta">
						<span class="arc-quote__avatar" aria-hidden="true"><?php echo esc_html( mb_substr( $item['name'], 0, 1 ) ); ?></span>
						<span>
							<span class="arc-quote__name"><?php echo esc_html( $item['name'] ); ?></span>
							<span class="arc-quote__role"><?php echo esc_html( $item['role'] ); ?></span>
						</span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="arc-section" id="faq">
	<div class="arc-container arc-container--narrow">
		<h2 class="arc-section__title arc-section__title--center"><?php echo esc_html( $arc['faq']['title'] ); ?></h2>
		<div class="arc-faq">
			<?php foreach ( $arc['faq']['items'] as $item ) : ?>
				<details class="arc-faq__item">
					<summary class="arc-faq__question"><?php echo esc_html( $item['q'] ); ?></summary>
					<div class="arc-faq__answer"><?php echo esc_html( $item['a'] ); ?></div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="arc-section">
	<div class="arc-container">
		<div class="arc-cta">
			<h2 class="arc-cta__title"><?php echo esc_html( $arc['cta']['title'] ); ?></h2>
			<p class="arc-cta__text"><?php echo esc_html( $arc['cta']['text'] ); ?></p>
			<a class="arc-btn arc-btn--primary arc-btn--lg" href="<?php echo esc_url( $arc['cta']['url'] ); ?>"><?php echo esc_html( $arc['cta']['button'] ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
