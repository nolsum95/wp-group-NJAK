<?php

/**
 * Editable portfolio content.
 *
 * This is the file to update when the group is ready to publish real information.
 * Replace every placeholder below. Nothing in this file is a real person,
 * qualification, or project result.
 *
 * Photos
 * - Member portraits: assets/images/members/your-file.jpg
 * - Project images: assets/images/projects/your-file.jpg
 * Then set the file name in `photo` or `image`. Leave the field empty to keep
 * the built-in graphic.
 *
 * Member pages
 * - Each member needs a `slug`. Their portfolio is /member/{slug}/.
 *
 * @package Group_Portfolio
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * All front-page content.
 *
 * @return array<string, mixed>
 */
function gp_content()
{
	static $content = null;

	if (null !== $content) {
		return $content;
	}

	$content = array(
		'group_name'       => 'NJAK',
		'tagline'          => '4th Year Information Technology Students',
		'meta_description' => 'Portfolio of four 4th-year Information Technology students. Placeholder content ready to be replaced with the group\'s own work.',
		'email'            => 'njak.team@gmail.com',

		'nav'              => array(
			array(
				'label' => 'Home',
				'hash'  => 'home',
			),
			array(
				'label' => 'About Us',
				'hash'  => 'about',
			),
			array(
				'label' => 'Our Members',
				'hash'  => 'team',
			),
			array(
				'label' => 'Skills',
				'hash'  => 'skills',
			),
			array(
				'label' => 'Projects',
				'hash'  => 'projects',
			),
			array(
				'label' => 'Contact',
				'hash'  => 'contact',
				'cta'   => true,
			),
		),

		'hero'             => array(
			'label'           => '4TH YEAR INFORMATION TECHNOLOGY STUDENTS',
			'title_lead'      => 'Building Ideas.',
			'title_accent'    => 'Creating Digital Experiences.',
			'text'            => 'We are a team of four passionate Information Technology students dedicated to exploring technology, developing innovative solutions, and transforming ideas into meaningful digital experiences.',
			'primary_label'   => 'Explore Our Portfolio',
			'primary_hash'    => 'projects',
			'secondary_label' => 'Meet Our Team',
			'secondary_hash'  => 'team',
		),

		'about'            => array(
			'label' => 'About Us',
			'title' => 'Four Minds. One Vision.',
			'text'  => 'We are a collaborative team of four 4th-year IT students who share a passion for technology, creativity, and continuous learning. Through our academic journey, we have developed technical knowledge, practical skills, and a strong interest in creating solutions that address real-world challenges.',
			'link'  => 'Meet Our Team',
			'hash'  => 'team',
		),

		'pillars'          => array(
			array(
				'number' => '01',
				'title'  => 'Collaboration',
				'text'   => 'Shared work across one group portfolio.',
			),
			array(
				'number' => '02',
				'title'  => 'Learning',
				'text'   => 'Knowledge built through study and practice.',
			),
			array(
				'number' => '03',
				'title'  => 'Craft',
				'text'   => 'Care for clear, usable digital work.',
			),
			array(
				'number' => '04',
				'title'  => 'Purpose',
				'text'   => 'Ideas shaped into experiences people can use.',
			),
		),

		'team'             => array(
			'label' => 'Our Members',
			'title' => 'Meet Our Team',
			'text'  => 'The four Information Technology students in this group.',
		),

		'members'          => array(
			array(
				'slug'  => 'nolly',
				'name'  => 'Nolly S. Sumobay Jr.',
				'role'  => 'Programmer',
				'bio'   => 'Responsible for developing, coding, and maintaining the system. Focuses on creating functional features and ensuring the application works smoothly.',
				'skills' => array('PHP', 'HTML', 'CSS', 'JavaScript'),
				'photo' => 'nolly.jpg',
				'tone'  => 'blue',
				'links' => array(
					array(
						'label' => 'Facebook',
						'icon'  => 'facebook',
						'url'   => 'https://www.facebook.com/muslon.nssj',
					),
					array(
						'label' => 'LinkedIn',
						'icon'  => 'linkedin',
						'url'   => 'https://www.linkedin.com/',
					),
				),
			),
			array(
				'slug'    => 'japhet',
				'name'    => 'Japhet Arañez Dasig',
				'role'    => 'BSIT Student | Aspiring IT Professional',
				'tagline' => 'Learning, Building, and Innovating Through Technology.',
				'bio'     => 'I am a fourth-year BSIT student at Opol Community College with an interest in programming, web development, database management, and emerging technologies.',
				'skills'  => array( 'PHP', 'JavaScript', 'HTML', 'CSS', 'Laravel', 'MySQL' ),
				'photo'   => 'japhet.jpg',
				'tone'    => 'violet',
				'about'   => array(
					array(
						'label' => 'Background',
						'text'  => 'An aspiring IT professional from Opol, Misamis Oriental, passionate about technology and software development.',
					),
					array(
						'label' => 'Interests',
						'text'  => 'Programming, web development, gaming, exploring new technologies, and learning about computer systems.',
					),
					array(
						'label' => 'Values',
						'text'  => 'Hard work, responsibility, teamwork, adaptability, and continuous learning.',
					),
					array(
						'label' => 'Career Goal',
						'text'  => 'To become a competent IT professional and software developer.',
					),
				),
				'education' => array(
					array(
						'title' => 'Bachelor of Science in Information Technology',
						'meta'  => 'Opol Community College',
						'text'  => 'Fourth year.',
					),
				),
				'skill_groups' => array(
					array(
						'icon'  => 'code',
						'title' => 'Programming Languages',
						'items' => array( 'PHP', 'JavaScript' ),
					),
					array(
						'icon'  => 'layout',
						'title' => 'Web Development',
						'items' => array( 'HTML', 'CSS' ),
					),
					array(
						'icon'  => 'tool',
						'title' => 'Frameworks and Libraries',
						'items' => array( 'Laravel', 'React Native (basic)' ),
					),
					array(
						'icon'  => 'database',
						'title' => 'Database',
						'items' => array( 'MySQL' ),
					),
					array(
						'icon'  => 'cpu',
						'title' => 'Development Tools',
						'items' => array( 'Visual Studio Code', 'Arduino IDE', 'Blynk' ),
					),
					array(
						'icon'  => 'pen',
						'title' => 'Soft Skills',
						'items' => array( 'Problem-solving', 'Teamwork', 'Time Management', 'Adaptability' ),
					),
					array(
						'icon'  => 'network',
						'title' => 'Areas of Interest',
						'items' => array( 'Cloud Computing', 'Web Development', 'Database Management', 'Internet of Things (IoT)' ),
					),
				),
				'projects' => array(
					array(
						'title' => 'Web-Based ALS Center Management System',
						'text'  => 'A web-based system designed to improve learner enrollment, profiling, grading, and reporting for ALS Opol West District.',
						'role'  => 'Project Manager / Lead Presenter',
						'tech'  => array( 'PHP', 'MySQL', 'HTML', 'CSS' ),
					),
					array(
						'title' => 'Neighborhood Security and Emergency Warning System',
						'text'  => 'An IoT-based project designed to support neighborhood security and emergency detection.',
						'role'  => 'Student Developer / Project Member',
						'tech'  => array( 'ESP32', 'Ultrasonic Sensor', 'Servo Motor' ),
					),
					array(
						'title' => 'LED Blinking Activity Using Blynk',
						'text'  => 'An IoT activity demonstrating remote LED control through the Blynk application.',
						'role'  => 'Student Developer',
						'tech'  => array( 'ESP32', 'Blynk', 'LED' ),
					),
				),
			),
			array(
				'slug'    => 'keshel',
				'name'    => 'Keshel Bongcasan Honayon',
				'role'    => 'BSIT Student | Technical Writer',
				'tagline' => 'Learning today, innovating tomorrow.',
				'bio'     => 'A fourth-year BSIT student at Opol Community College who builds with code and explains technical work in clear, useful writing.',
				'skills'  => array( 'Technical Writing', 'HTML', 'CSS', 'PHP', 'MySQL' ),
				'photo'   => 'keshel-portrait.jpg',
				'tone'    => 'cyan',
				'about'   => array(
					array(
						'label' => 'Background',
						'text'  => 'A fourth-year BSIT student at Opol Community College who likes organizing information and explaining technical ideas in plain language.',
					),
					array(
						'label' => 'Interests',
						'text'  => 'New technology, programming, writing, music, movies, and time with family and friends.',
					),
					array(
						'label' => 'Values',
						'text'  => 'Honesty, responsibility, teamwork, and accuracy, with writing that is easy to understand the first time.',
					),
					array(
						'label' => 'Career Goal',
						'text'  => 'To work in technical writing and software documentation, creating guides and manuals people can actually use.',
					),
				),
				'skill_groups' => array(
					array(
						'icon'  => 'code',
						'title' => 'Programming Languages',
						'items' => array( 'HTML', 'CSS', 'JavaScript', 'PHP', 'Java (basic)' ),
					),
					array(
						'icon'  => 'layout',
						'title' => 'Technical Skills',
						'items' => array( 'Web Development', 'Database Management', 'Networking', 'Troubleshooting', 'System Analysis' ),
					),
					array(
						'icon'  => 'cpu',
						'title' => 'Tools',
						'items' => array( 'Visual Studio Code', 'XAMPP', 'MySQL', 'GitHub', 'Microsoft Office' ),
					),
					array(
						'icon'  => 'pen',
						'title' => 'Technical Writing',
						'items' => array( 'Documentation', 'User Guides', 'Report Writing', 'Editing' ),
					),
					array(
						'icon'  => 'network',
						'title' => 'Working Style',
						'items' => array( 'Communication', 'Teamwork', 'Problem-Solving', 'Attention to Detail' ),
					),
				),
				'projects' => array(
					array(
						'title' => 'Academic Web Development Project',
						'text'  => 'A class website built to be functional and easy to use, from layout through the written project notes.',
						'role'  => 'Planning, Design, Coding, and Documentation',
						'tech'  => array( 'HTML', 'CSS', 'JavaScript', 'PHP' ),
					),
					array(
						'title' => 'Database Management Project',
						'text'  => 'An academic system for storing and organizing information, with the process written down so others can follow it.',
						'role'  => 'Database Design and Documentation',
						'tech'  => array( 'MySQL' ),
					),
				),
				'education' => array(
					array(
						'title' => 'Bachelor of Science in Information Technology',
						'meta'  => 'Opol Community College · Fourth Year',
						'text'  => 'Currently enrolled, with coursework in programming, databases, web development, and technical documentation.',
					),
					array(
						'title' => 'Academic Experience',
						'meta'  => 'Classwork, projects, and writing',
						'text'  => 'Programming tasks, group projects, reports, and technical documents that turn class lessons into practice.',
					),
					array(
						'title' => 'Training and Workshops',
						'meta'  => 'Information Technology',
						'text'  => 'Programming exercises, technical writing, seminars, and workshops on digital skills.',
					),
				),
			),
			array(
				'slug'  => 'adrian',
				'name'  => 'Adrian Lester Econar',
				'role'  => 'System Analyst',
				'bio'   => 'Analyzes project requirements and identifies solutions to improve the system. Helps ensure that the system meets user needs and project objectives.',
				'skills' => array('System Analysis', 'Problem Solving', 'Research', 'Requirements Analysis'),
				'photo' => 'adrian.jpg',
				'tone'  => 'indigo',
				'links' => array(
					array(
						'label' => 'GitHub',
						'icon'  => 'github',
						'url'   => 'https://github.com/',
					),
					array(
						'label' => 'LinkedIn',
						'icon'  => 'linkedin',
						'url'   => 'https://www.linkedin.com/',
					),
				),
			),
		),

		'skills'           => array(
			'label' => 'Skills',
			'title' => 'Technical Skills',
			'text'  => 'The categories below are ready for the group\'s real tools. The items inside each card are placeholders, not claimed qualifications.',
		),

		'skill_groups'     => array(
			array(
				'icon'  => 'code',
				'title' => 'Programming Languages',
				'text'  => 'Languages used to write software and scripts.',
				'items' => array('Java', 'Python', 'JavaScript'),
			),
			array(
				'icon'  => 'layout',
				'title' => 'Web Development',
				'text'  => 'Building pages, interfaces, and web applications.',
				'items' => array('HTML', 'CSS', 'PHP'),
			),
			array(
				'icon'  => 'database',
				'title' => 'Database Management',
				'text'  => 'Storing, querying, and organizing data.',
				'items' => array('SQL', 'MySQL', 'Modeling'),
			),
			array(
				'icon'  => 'network',
				'title' => 'Networking',
				'text'  => 'How systems connect and communicate.',
				'items' => array('TCP/IP', 'LAN', 'Routing'),
			),
			array(
				'icon'  => 'pen',
				'title' => 'UI/UX Design',
				'text'  => 'Planning layouts and the way people use a product.',
				'items' => array('Wireframes', 'Layout', 'Typography'),
			),
			array(
				'icon'  => 'cpu',
				'title' => 'Hardware and Troubleshooting',
				'text'  => 'Working with devices and finding the cause of a problem.',
				'items' => array('Diagnostics', 'Assembly', 'Repair'),
			),
			array(
				'icon'  => 'tool',
				'title' => 'Software and Tools',
				'text'  => 'Applications used to design, build, and collaborate.',
				'items' => array('Git', 'Editor', 'Figma'),
			),
		),

		'projects'         => array(
			'label' => 'Projects',
			'title' => 'Featured Projects',
			'text'  => 'Academic and personal projects from the group.',
		),

		'project_items'    => array(
			array(
				'title' => 'ALS Center Management System',
				'text'  => 'A web-based system designed to manage and organize ALS Center records, learners information, enrollment, and other administrative tasks efficiently.',
				'tech'  => array('PHP', 'Laravel', 'JavaScript'),
				'image' => 'als.jpg',
				'style' => 'interface',
				'url'   => '',
				'button' => 'View Project',
			),
			array(
				'title' => 'Electric Billing System',
				'text'  => 'A system designed to calculate electricity consumption, generate billing statements, and manage customer payment records accurately and efficiently.',
				'tech'  => array('PHP', 'MySQL', 'JavaScript'),
				'image' => '',
				'style' => 'systems',
				'url'   => '',
				'button' => 'View Project',
			),

		),

		'contact'          => array(
			'label' => 'Contact',
			'title' => 'Let\'s Connect and Build Something Great.',
			'text'  => 'Reach the group by email, or send a message with the form. Social links below are placeholders.',
		),

		'socials'          => array(
			array(
				'label' => 'GitHub',
				'icon'  => 'github',
				'url'   => 'https://github.com/',
			),
			array(
				'label' => 'LinkedIn',
				'icon'  => 'linkedin',
				'url'   => 'https://www.linkedin.com/',
			),
		),

		'footer'           => array(
			'summary' => 'A group portfolio for four 4th-year Information Technology students.',
			'note'    => 'Designed and Developed by %s | 4th Year Information Technology Students',
		),
	);

	/**
	 * Filters the portfolio content array.
	 *
	 * @param array<string, mixed> $content Site content.
	 */
	$content = apply_filters('gp_content', $content);

	return $content;
}

/**
 * Read one content value.
 *
 * @param string $key     Top-level key.
 * @param mixed  $default Fallback when the key is missing.
 * @return mixed
 */
function gp_content_get($key, $default = null)
{
	$content = gp_content();

	if (array_key_exists($key, $content)) {
		return $content[$key];
	}

	return $default;
}
