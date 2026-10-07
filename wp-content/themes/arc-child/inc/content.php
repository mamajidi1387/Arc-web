<?php
/**
 * Landing copy for the Arc theme, in both site languages.
 *
 * Kept as a language-keyed map so the theme renders a complete landing page in
 * either language even before every page has a Polylang translation.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the copy block for the active language.
 */
function arc_content() {
	$blocks = array(
		'fa' => array(
			'brand'  => 'Arc',
			'locale' => 'fa',
			'nav'    => array(
				array( 'label' => 'خانه', 'url' => arc_url( '/' ) ),
				array( 'label' => 'خدمات', 'url' => arc_url( '/services' ) ),
				array( 'label' => 'نمونه‌کارها', 'url' => arc_url( '/portfolio' ) ),
				array( 'label' => 'تعرفه‌ها', 'url' => arc_url( '/pricing' ) ),
				array( 'label' => 'درباره ما', 'url' => arc_url( '/about' ) ),
				array( 'label' => 'وبلاگ', 'url' => arc_url( '/blog' ) ),
				array( 'label' => 'تماس', 'url' => arc_url( '/contact' ) ),
			),
			'header' => array(
				'demo'    => 'درخواست دمو',
				'start'   => 'شروع کنید',
				'demo_url' => arc_url( '/request-demo' ),
				'start_url' => arc_url( '/get-started' ),
			),
			'hero'   => array(
				'title'     => 'فناوری امروز، آینده کسب‌وکار شما',
				'text'      => 'از ایده تا اجرا؛ نرم‌افزار اختصاصی می‌سازیم، وب‌سایت شما را طراحی می‌کنیم و مسیر رشد کسب‌وکارتان را هموار می‌کنیم.',
				'primary'   => 'شروع همکاری',
				'primary_url' => arc_url( '/get-started' ),
				'secondary' => 'درخواست دمو',
				'secondary_url' => arc_url( '/request-demo' ),
			),
			'trust'  => array(
				'label' => 'بیش از ۱۲۰۰ کسب‌وکار به Arc اعتماد کرده‌اند',
				'logos' => array( 'پارس‌داده', 'آرا', 'نوین‌تجارت', 'سیمرغ', 'آریانا' ),
			),
			'services' => array(
				'title'    => 'خدمات ما',
				'subtitle' => 'سه ستون اصلی رشد دیجیتال کسب‌وکار شما',
				'items'    => array(
					array(
						'title' => 'توسعه نرم‌افزار',
						'text'  => 'سامانه‌های اختصاصی، اپلیکیشن وب و موبایل و یکپارچه‌سازی سرویس‌ها.',
						'url'   => arc_url( '/services/software-development' ),
					),
					array(
						'title' => 'طراحی و توسعه وب‌سایت',
						'text'  => 'طراحی رابط کاربری مدرن و سایت‌های سریع، واکنش‌گرا و سئو-محور.',
						'url'   => arc_url( '/services/web-design' ),
					),
					array(
						'title' => 'توسعه کسب‌وکار',
						'text'  => 'مشاوره، دیجیتال مارکتینگ و بهینه‌سازی فرایندهای فروش.',
						'url'   => arc_url( '/services/business-development' ),
					),
				),
			),
			'stats'  => array(
				'title' => 'اعتماد شما، بزرگترین سرمایه ماست',
				'items' => array(
					array( 'value' => '۱۰+', 'label' => 'سال تجربه' ),
					array( 'value' => '۱۲۰۰+', 'label' => 'مشتری فعال' ),
					array( 'value' => '۳۵۰+', 'label' => 'پروژه موفق' ),
					array( 'value' => '۹۸٪', 'label' => 'رضایت مشتری' ),
				),
			),
			'features' => array(
				'title'    => 'چرا Arc؟',
				'subtitle' => 'تیمی که فقط تحویل نمی‌دهد، کنار شما می‌ماند',
				'items'    => array(
					array( 'title' => 'تیم متخصص', 'text' => 'مهندسان و طراحان ارشد با تجربه پروژه‌های سازمانی.' ),
					array( 'title' => 'تحویل به‌موقع', 'text' => 'برنامه شفاف، اسپرینت‌های کوتاه و گزارش پیشرفت هفتگی.' ),
					array( 'title' => 'پشتیبانی مستمر', 'text' => 'نگهداری، مانیتورینگ و توسعه پس از تحویل پروژه.' ),
				),
			),
			'portfolio' => array(
				'title'    => 'پروژه‌های اخیر',
				'subtitle' => 'نمونه‌ای از کاری که با افتخار انجام داده‌ایم',
				'all'      => 'مشاهده همه نمونه‌کارها',
				'all_url'  => arc_url( '/portfolio' ),
				'items'    => array(
					array( 'title' => 'سامانه مدیریت سفارشات', 'tag' => 'نرم‌افزار سازمانی' ),
					array( 'title' => 'فروشگاه آنلاین آرا', 'tag' => 'تجارت الکترونیک' ),
					array( 'title' => 'پنل تحلیل داده پارس', 'tag' => 'داشبورد داده' ),
				),
			),
			'testimonials' => array(
				'title' => 'مشتریان ما چه می‌گویند؟',
				'items' => array(
					array( 'quote' => 'تیم Arc پروژه را دقیقاً در زمان مقرر و با کیفیتی فراتر از انتظار تحویل داد.', 'name' => 'مهسا رضایی', 'role' => 'مدیر محصول' ),
					array( 'quote' => 'پس از بازطراحی سایت، نرخ تبدیل ما تقریباً دو برابر شد.', 'name' => 'علی کریمی', 'role' => 'بنیان‌گذار استارتاپ' ),
					array( 'quote' => 'پشتیبانی و پیگیری تیم واقعاً حرفه‌ای است؛ همکاری با آن‌ها خیال آدم را راحت می‌کند.', 'name' => 'سارا محمدی', 'role' => 'مدیر بازاریابی' ),
				),
			),
			'faq'    => array(
				'title' => 'سوالات متداول',
				'items' => array(
					array( 'q' => 'مدت اجرای پروژه چقدر است؟', 'a' => 'بسته به دامنه کار از ۲ تا ۱۲ هفته؛ پیش از شروع، زمان‌بندی دقیق ارائه می‌شود.' ),
					array( 'q' => 'هزینه پروژه چگونه محاسبه می‌شود؟', 'a' => 'بر اساس دامنه کار، پیچیدگی فنی و زمان‌بندی. پس از جلسه مشاوره رایگان، پیشنهاد قیمت شفاف دریافت می‌کنید.' ),
					array( 'q' => 'آیا پس از تحویل پشتیبانی دارید؟', 'a' => 'بله؛ همه پروژه‌ها شامل دوره پشتیبانی و امکان قرارداد نگهداری سالانه هستند.' ),
					array( 'q' => 'از چه فناوری‌هایی استفاده می‌کنید؟', 'a' => 'وردپرس، React، Next.js، Laravel، Python و سرویس‌های ابری، متناسب با نیاز پروژه.' ),
					array( 'q' => 'امکان همکاری برای پروژه‌های بین‌المللی وجود دارد؟', 'a' => 'بله؛ ما با مشتریان فارسی‌زبان و بین‌المللی همکاری می‌کنیم.' ),
					array( 'q' => 'چطور شروع کنیم؟', 'a' => 'یک جلسه مشاوره رایگان رزرو کنید تا نیازهایتان را بررسی کنیم و مسیر را پیشنهاد دهیم.' ),
				),
			),
			'cta'    => array(
				'title'  => 'آماده‌اید کسب‌وکار خود را متحول کنید؟',
				'text'   => 'در یک جلسه مشاوره رایگان، مسیر رشد کسب‌وکارتان را با هم بررسی می‌کنیم.',
				'button' => 'دریافت مشاوره',
				'url'    => arc_url( '/consultation' ),
			),
			'footer' => array(
				'blurb'     => 'Arc؛ شریک فناوری کسب‌وکار شما در توسعه نرم‌افزار، طراحی وب‌سایت و رشد کسب‌وکار.',
				'services'  => array(
					array( 'label' => 'توسعه نرم‌افزار', 'url' => arc_url( '/services/software-development' ) ),
					array( 'label' => 'طراحی و توسعه وب‌سایت', 'url' => arc_url( '/services/web-design' ) ),
					array( 'label' => 'توسعه کسب‌وکار', 'url' => arc_url( '/services/business-development' ) ),
					array( 'label' => 'تعرفه‌ها', 'url' => arc_url( '/pricing' ) ),
				),
				'resources' => array(
					array( 'label' => 'درباره ما', 'url' => arc_url( '/about' ) ),
					array( 'label' => 'نمونه‌کارها', 'url' => arc_url( '/portfolio' ) ),
					array( 'label' => 'وبلاگ', 'url' => arc_url( '/blog' ) ),
					array( 'label' => 'سوالات متداول', 'url' => arc_url( '/faq' ) ),
				),
				'contact'   => array(
					'email'   => 'hello@arc.example',
					'phone'   => '+98 21 1234 5678',
					'address' => 'تهران، ایران',
				),
				'copyright' => '۲۰۲۵ © کلیه حقوق برای Arc محفوظ است.',
			),
		),
		'en' => array(
			'brand'  => 'Arc',
			'locale' => 'en',
			'nav'    => array(
				array( 'label' => 'Home', 'url' => arc_url( '/' ) ),
				array( 'label' => 'Services', 'url' => arc_url( '/services' ) ),
				array( 'label' => 'Portfolio', 'url' => arc_url( '/portfolio' ) ),
				array( 'label' => 'Pricing', 'url' => arc_url( '/pricing' ) ),
				array( 'label' => 'About', 'url' => arc_url( '/about' ) ),
				array( 'label' => 'Blog', 'url' => arc_url( '/blog' ) ),
				array( 'label' => 'Contact', 'url' => arc_url( '/contact' ) ),
			),
			'header' => array(
				'demo'      => 'Request Demo',
				'start'     => 'Get Started',
				'demo_url'  => arc_url( '/request-demo' ),
				'start_url' => arc_url( '/get-started' ),
			),
			'hero'   => array(
				'title'         => 'Today’s technology, your business’s tomorrow',
				'text'          => 'From idea to launch — we build custom software, design high-performing websites and grow your business.',
				'primary'       => 'Get Started',
				'primary_url'   => arc_url( '/get-started' ),
				'secondary'     => 'Request Demo',
				'secondary_url' => arc_url( '/request-demo' ),
			),
			'trust'  => array(
				'label' => 'Trusted by 1,200+ growing businesses',
				'logos' => array( 'ParsData', 'Ara', 'NovinTrade', 'Simorgh', 'Ariana' ),
			),
			'services' => array(
				'title'    => 'What we do',
				'subtitle' => 'Three pillars behind your digital growth',
				'items'    => array(
					array(
						'title' => 'Software Development',
						'text'  => 'Custom platforms, web and mobile applications, and service integrations.',
						'url'   => arc_url( '/services/software-development' ),
					),
					array(
						'title' => 'Web Design & Development',
						'text'  => 'Modern interfaces and fast, responsive, SEO-focused websites.',
						'url'   => arc_url( '/services/web-design' ),
					),
					array(
						'title' => 'Business Development',
						'text'  => 'Consulting, digital marketing and sales process optimisation.',
						'url'   => arc_url( '/services/business-development' ),
					),
				),
			),
			'stats'  => array(
				'title' => 'Your trust is our greatest asset',
				'items' => array(
					array( 'value' => '10+', 'label' => 'Years of experience' ),
					array( 'value' => '1200+', 'label' => 'Active clients' ),
					array( 'value' => '350+', 'label' => 'Projects delivered' ),
					array( 'value' => '98%', 'label' => 'Client satisfaction' ),
				),
			),
			'features' => array(
				'title'    => 'Why Arc?',
				'subtitle' => 'A team that stays with you after delivery',
				'items'    => array(
					array( 'title' => 'Senior team', 'text' => 'Engineers and designers with enterprise delivery experience.' ),
					array( 'title' => 'On-time delivery', 'text' => 'A clear plan, short sprints and weekly progress reports.' ),
					array( 'title' => 'Ongoing support', 'text' => 'Maintenance, monitoring and further development after launch.' ),
				),
			),
			'portfolio' => array(
				'title'    => 'Recent work',
				'subtitle' => 'A selection of projects we are proud of',
				'all'      => 'View all projects',
				'all_url'  => arc_url( '/portfolio' ),
				'items'    => array(
					array( 'title' => 'Order Management Platform', 'tag' => 'Enterprise software' ),
					array( 'title' => 'Ara Online Store', 'tag' => 'E-commerce' ),
					array( 'title' => 'Pars Data Dashboard', 'tag' => 'Data dashboard' ),
				),
			),
			'testimonials' => array(
				'title' => 'What our clients say',
				'items' => array(
					array( 'quote' => 'Arc delivered on time and beyond our expectations.', 'name' => 'Mahsa Rezaei', 'role' => 'Product Manager' ),
					array( 'quote' => 'After the redesign, our conversion rate almost doubled.', 'name' => 'Ali Karimi', 'role' => 'Startup Founder' ),
					array( 'quote' => 'Their support and follow-up is genuinely professional.', 'name' => 'Sara Mohammadi', 'role' => 'Marketing Manager' ),
				),
			),
			'faq'    => array(
				'title' => 'Frequently asked questions',
				'items' => array(
					array( 'q' => 'How long does a project take?', 'a' => 'Depending on scope, between 2 and 12 weeks. You get a detailed schedule before we start.' ),
					array( 'q' => 'How is pricing calculated?', 'a' => 'By scope, technical complexity and timeline. After a free consultation you receive a clear quote.' ),
					array( 'q' => 'Do you support the project after launch?', 'a' => 'Yes. Every project includes a support period and an optional annual maintenance plan.' ),
					array( 'q' => 'Which technologies do you use?', 'a' => 'WordPress, React, Next.js, Laravel, Python and cloud services — chosen to fit the project.' ),
					array( 'q' => 'Do you work with international clients?', 'a' => 'Yes, we work with both Persian-speaking and international clients.' ),
					array( 'q' => 'How do we get started?', 'a' => 'Book a free consultation and we will review your needs and propose a roadmap.' ),
				),
			),
			'cta'    => array(
				'title'  => 'Ready to transform your business?',
				'text'   => 'In a free consultation we will map out your business growth together.',
				'button' => 'Get a consultation',
				'url'    => arc_url( '/consultation' ),
			),
			'footer' => array(
				'blurb'     => 'Arc is your technology partner for software development, web design and business growth.',
				'services'  => array(
					array( 'label' => 'Software Development', 'url' => arc_url( '/services/software-development' ) ),
					array( 'label' => 'Web Design & Development', 'url' => arc_url( '/services/web-design' ) ),
					array( 'label' => 'Business Development', 'url' => arc_url( '/services/business-development' ) ),
					array( 'label' => 'Pricing', 'url' => arc_url( '/pricing' ) ),
				),
				'resources' => array(
					array( 'label' => 'About', 'url' => arc_url( '/about' ) ),
					array( 'label' => 'Portfolio', 'url' => arc_url( '/portfolio' ) ),
					array( 'label' => 'Blog', 'url' => arc_url( '/blog' ) ),
					array( 'label' => 'FAQ', 'url' => arc_url( '/faq' ) ),
				),
				'contact'   => array(
					'email'   => 'hello@arc.example',
					'phone'   => '+98 21 1234 5678',
					'address' => 'Tehran, Iran',
				),
				'copyright' => '2025 © Arc. All rights reserved.',
			),
		),
	);

	return $blocks[ arc_lang() ];
}
