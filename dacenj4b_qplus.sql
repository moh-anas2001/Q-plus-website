-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2024 at 03:49 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dacenj4b_qplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `author_name`, `author_image`, `cover_image`, `image_path`, `publish_date`, `created_at`, `updated_at`, `author_id`) VALUES
(4, '5 Technological Trends That You Can Learn To Develop Your Career', '<div data-hook=\"rcv-block19\">&nbsp;</div>\r\n<div id=\"viewer-bsbh4\" class=\"QHjDE rzoRKE\">\r\n<div class=\"gO6aa y8JqQg y8JqQg\">\r\n<div class=\"Q6a5A\" tabindex=\"0\" role=\"button\" data-hook=\"imageViewer\">\r\n<div id=\"new-image13945039\" class=\"vBPBf L9OMM XHhj0\"><img src=\"https://static.wixstatic.com/media/a4f3dc_676a42460a72407abddd66cb61ffab61~mv2.jpg/v1/fill/w_638,h_246,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a4f3dc_676a42460a72407abddd66cb61ffab61~mv2.jpg\" alt=\"\" data-pin-url=\"https://www.dacentrictechnologies.com/post/5-technological-trends-that-you-can-learn-to-develop-your-career\" data-pin-media=\"https://static.wixstatic.com/media/a4f3dc_676a42460a72407abddd66cb61ffab61~mv2.jpg/v1/fill/w_1092,h_422,al_c,lg_1,q_85/a4f3dc_676a42460a72407abddd66cb61ffab61~mv2.jpg\" data-load-done=\"\"></div>\r\n<div class=\"\">&nbsp;</div>\r\n<div class=\"\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-hook=\"rcv-block20\">&nbsp;</div>\r\n<p id=\"viewer-6r33p\" class=\"xVISr Y9Dpf bCMSCT OZy-3 lnyWN yMZv8w bCMSCT public-DraftStyleDefault-block-depth0 fixed-tab-size public-DraftStyleDefault-text-ltr\"><span class=\"B2EFF public-DraftStyleDefault-ltr\"> <strong>Virtual Reality (VR) and Augmented Reality (AR)</strong></span></p>\r\n<div data-hook=\"rcv-block22\">&nbsp;</div>\r\n<p id=\"viewer-1qh83\" class=\"xVISr Y9Dpf bCMSCT OZy-3 _40ACk Ecq9kg bCMSCT public-DraftStyleDefault-block-depth0 fixed-tab-size public-DraftStyleDefault-text-ltr\"><span class=\"B2EFF public-DraftStyleDefault-ltr\"><strong>Virtual Reality (VR)</strong> improves the user&rsquo;s experience whereas Augment Reality (AR) enhances the environment. There are major players on the VR market, such as Google, Samsung, and Oculus, but there are plenty of start-ups emerging and recruiting, and the demand for VR and AR skills professionals will only grow. It does not require a lot of specialized knowledge to get started in VR. Basic programming skills and forward-thinking mentality can create a job, although other employers will also look for optics as a skill set and hardware engineers.</span></p>\r\n<div data-hook=\"rcv-block23\">&nbsp;</div>\r\n<div id=\"viewer-32gl5\" class=\"QHjDE rzoRKE\">\r\n<div class=\"gO6aa y8JqQg y8JqQg\">\r\n<div class=\"Q6a5A\" tabindex=\"0\" role=\"button\" data-hook=\"imageViewer\">\r\n<div id=\"new-image13945040\" class=\"vBPBf L9OMM XHhj0\"><img src=\"https://static.wixstatic.com/media/a4f3dc_e26dcb38d05041e488358990acc365b0~mv2.jpg/v1/fill/w_499,h_356,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a4f3dc_e26dcb38d05041e488358990acc365b0~mv2.jpg\" alt=\"\" width=\"519\" height=\"370\" data-pin-url=\"https://www.dacentrictechnologies.com/post/5-technological-trends-that-you-can-learn-to-develop-your-career\" data-pin-media=\"https://static.wixstatic.com/media/a4f3dc_e26dcb38d05041e488358990acc365b0~mv2.jpg/v1/fill/w_600,h_428,al_c,lg_1,q_80/a4f3dc_e26dcb38d05041e488358990acc365b0~mv2.jpg\" data-load-done=\"\"></div>\r\n<div class=\"\">&nbsp;</div>\r\n<div class=\"\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-hook=\"rcv-block24\">&nbsp;</div>\r\n<p id=\"viewer-3jusi\" class=\"xVISr Y9Dpf bCMSCT OZy-3 lnyWN yMZv8w bCMSCT public-DraftStyleDefault-block-depth0 fixed-tab-size public-DraftStyleDefault-text-ltr\"><span class=\"B2EFF public-DraftStyleDefault-ltr\"><strong>Augmented reality (AR)</strong> adds digital elements to a live view often by using the camera on a Smartphone. Examples of augmented reality experiences include Snap chat lenses and the game Pok&eacute;mon Go. Virtual reality (VR) implies a complete immersion experience that shuts out the physical world. Augmented Reality applies algorithms and sensors to detect the position of the camera, and then sperimposes 3D graphics/objects into a user\'s view via Smartphone&rsquo;s/glasses/projections etc. AR offers users more freedom of action and doesn\'t require a head-mounted display. Virtual Reality (VR) is the use of computer technology to create a simulated environment. Unlike traditional user interfaces, VR places the user inside an experience. Instead of viewing a screen in front of them, users are immersed and able to interact with 3D worlds.</span></p>\r\n<div data-hook=\"rcv-block25\">&nbsp;</div>\r\n<div id=\"viewer-bh8sv\" class=\"QHjDE rzoRKE\">\r\n<div class=\"gO6aa y8JqQg y8JqQg\">\r\n<div class=\"Q6a5A\" tabindex=\"0\" role=\"button\" data-hook=\"imageViewer\">\r\n<div id=\"new-image13945041\" class=\"vBPBf L9OMM XHhj0\"><img src=\"https://static.wixstatic.com/media/a4f3dc_c6914c07cdf949f998dcbf2182b049f0~mv2.jpg/v1/fill/w_499,h_399,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a4f3dc_c6914c07cdf949f998dcbf2182b049f0~mv2.jpg\" alt=\"\" width=\"537\" height=\"429\" data-pin-url=\"https://www.dacentrictechnologies.com/post/5-technological-trends-that-you-can-learn-to-develop-your-career\" data-pin-media=\"https://static.wixstatic.com/media/a4f3dc_c6914c07cdf949f998dcbf2182b049f0~mv2.jpg/v1/fill/w_600,h_480,al_c,lg_1,q_80/a4f3dc_c6914c07cdf949f998dcbf2182b049f0~mv2.jpg\" data-load-done=\"\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-hook=\"rcv-block26\">&nbsp;</div>\r\n<p id=\"viewer-9njfr\" class=\"xVISr Y9Dpf bCMSCT OZy-3 lnyWN yMZv8w bCMSCT public-DraftStyleDefault-block-depth0 fixed-tab-size public-DraftStyleDefault-text-ltr\"><span class=\"B2EFF public-DraftStyleDefault-ltr\">Technologies will develop day by day, so keep learning new tools and develop new skills; you will surely grab your dream job. You can look up for course of your choice or search online for the courses and videos about the latest technology you want to learn. There are lots of free online courses available which can be utilized.</span></p>', 'Shafeek Meeran', '../assets/img/blog/author/1000007856.jpg', '../assets/img/blog/1000049530.jpg', '', '2020-07-17', '2023-09-18 05:29:18', '2023-09-18 05:29:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `image_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_code` varchar(30) NOT NULL,
  `job_description` text NOT NULL,
  `experience` varchar(255) NOT NULL,
  `posted` date DEFAULT NULL,
  `stat` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_code`, `job_description`, `experience`, `posted`, `stat`, `created_at`, `delete_date`) VALUES
(4, 'Painter/ Gypsum Worker', 'QPTS/JOB-22', '<p>Requirements: <br>&bull; Hands on experience in Painting and Gypsum work. <br>&bull; Should work in the tasks provided by the supervisor/ foreman. <br>&bull; Able to work with the team and as an individual.<br>&bull; Should follow all safety protocols while working.</p>', '2 - 3 Years', '2023-09-15', 'Open', '2023-09-15 08:45:22', '2023-12-20'),
(5, 'Technician/ Driver', 'QPTS/JOB-23', '<p style=\"line-height: 1.2; text-align: left;\">&bull; Should have valid UAE driving license.&nbsp;</p>\r\n<p style=\"line-height: 1.2; text-align: left;\">&bull; Knowledge in Data Cable termination &amp; testing, Fiber splicing &amp; testing, Cabinet cable dressing &amp; Cable Pulling.</p>\r\n<p style=\"line-height: 1.2; text-align: left;\">&bull; Should work in the tasks provided by the supervisor/ foreman.</p>\r\n<p style=\"line-height: 1.2; text-align: left;\">&bull; Able to work with the team and as an individual.</p>\r\n<p style=\"line-height: 1.2; text-align: left;\">&bull; Should follow all safety protocols while working.</p>', '2 - 3 Years', '2023-09-15', 'Open', '2023-09-15 08:48:52', '2023-12-20'),
(7, 'Estimation Engineer (ELV)', 'QPTS/JOB-25', '<p>Study Tender Files<br>2. Make precise Estimation from BOQ, Drawings and Specifications. <br>3. Quantity survey and enquiry generation to suppliers and subcontractors. <br>4. Aquire supplier quotations and present comparison. <br>5. Preparation of all documents related to Tender submission including Exclusions. <br>6. Attend meetings for project briefing and value engineering <br>7. Co-ordination with site engineers for submittal approvals and issue timely POs to suppliers <br>8. Procurment Support and submittals.<br>9. Issue cost analysis report related to project.<br>10. Maintain and develop supplier and subcontractor cost history sheets.</p>\r\n<p><strong>Location :&nbsp;</strong>India</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '1 - 3 Years', '2023-11-01', 'Open', '2023-11-05 01:14:24', '2024-10-31'),
(8, 'Accountant', 'QPTS/JOB-26', '<p style=\"line-height: 1;\">&bull; Tracking payments to internal and external stakeholders</p>\r\n<p style=\"line-height: 1;\">&bull; Preparing budget forecasts</p>\r\n<p style=\"line-height: 1;\">&bull; Processing tax payments and returns</p>\r\n<p><strong>Responsibilities:</strong></p>\r\n<p>&bull; &nbsp; &nbsp;Manage all accounting transactions<br>&bull; &nbsp; &nbsp;Prepare budget forecasts<br>&bull; &nbsp; &nbsp;Publish financial statements in time<br>&bull; &nbsp; &nbsp;Maintaining accurate financial records<br>&bull; &nbsp; &nbsp;Presenting data to managers, investors, and other entities<br>&bull; &nbsp; &nbsp;Handle monthly, quarterly and annual closings<br>&bull; &nbsp; &nbsp;Reconcile accounts payable and receivable<br>&bull; &nbsp; &nbsp;Ensure timely bank payments<br>&bull; &nbsp; &nbsp;Compute taxes and prepare tax returns<br>&bull; &nbsp; &nbsp;Manage balance sheets and profit/loss statements<br>&bull; &nbsp; &nbsp;Report on the company&rsquo;s financial health and liquidity<br>&bull; &nbsp; &nbsp;Audit financial transactions and documents<br>&bull; &nbsp; &nbsp;Reinforce financial data confidentiality and conduct database backups when necessary<br>&bull; &nbsp; &nbsp;Comply with financial policies and regulations</p>\r\n<p><strong>Requirements and skills :</strong></p>\r\n<p>&bull; &nbsp; &nbsp;Work experience as an Accountant<br>&bull; &nbsp; &nbsp;Excellent knowledge of accounting regulations and procedures<br>&bull; &nbsp; &nbsp;Hands-on experience with accounting software like FreshBooks and QuickBooks<br>&bull; &nbsp; &nbsp;Advanced MS Excel &amp; MS Word skills<br>&bull; &nbsp; &nbsp;Experience with general ledger functions<br>&bull; &nbsp; &nbsp;Strong attention to detail and good analytical skills<br>&bull; &nbsp; &nbsp;Ability to work independently<br>&bull; &nbsp; &nbsp;BSc in Accounting, Finance or relevant degree</p>\r\n<p><span style=\"font-size: 14pt; font-family: \'comic sans ms\', sans-serif;\"><em><strong><em>*Candidate should be in Husband Visa with immediate joining</em></strong></em></span></p>\r\n<p><strong>Location :&nbsp;</strong>Dubai, UAE</p>', '1 -2 Years', '2023-11-05', 'Open', '2023-11-05 03:09:23', '2024-03-31'),
(9, 'Technician', 'QPTS/JOB-27', '<p>Are you passionate about networking and ELV systems? We are looking for a skilled Technician to join our team in Dubai. This is a full-time, on-site role, where the Technician will be responsible for the installation, maintenance, and repair of a variety of systems, including CCTV, Access Control, Alarm, PA, and more. In addition to these tasks, the Technician will test and troubleshoot systems, provide technical support to clients, and adhere to safety and security protocols. This role offers an exciting opportunity for candidates with 1-2 years of experience in networking and ELV-related fields, and we welcome individuals with any degree or diploma background to apply.<br><br></p>\r\n<p><strong>Roles and Responsibilities:<br></strong></p>\r\n<ul>\r\n<li>Install, configure, and maintain networking equipment, including routers, switches, and access points.</li>\r\n<li>Troubleshoot network issues, diagnose problems and provide timely solutions to minimize downtime.</li>\r\n<li>Assist in the design and implementation of network infrastructures to meet business needs.</li>\r\n<li>Perform cable installation and termination for ELV systems, including structured cabling, security systems, and audio-visual equipment.</li>\r\n<li>Collaborate with the engineering team to ensure ELV systems are installed to industry standards.</li>\r\n<li>Conduct routine inspections, testing, and maintenance of ELV systems to ensure optimal performance.</li>\r\n<li>Assist in the installation of surveillance cameras, access control systems, and intercom systems.</li>\r\n<li>Provide technical support to end-users, addressing queries and resolving technical issues.</li>\r\n<li>Document network configurations, wiring layouts, and system changes for reference and future maintenance.</li>\r\n<li>Stay updated on industry trends, networking protocols, and ELV technologies to continuously improve your skills.</li>\r\n<li>Adhere to safety protocols and quality standards while working on projects.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>1-2 years of experience in networking and ELV-related fields</li>\r\n<li>Any degree or diploma holder is welcome to apply.</li>\r\n<li>Experience in the installation, maintenance, and repair of CCTV, Access Control, Alarm, PA systems, and more.</li>\r\n<li>Knowledge of networking protocols, TCP/IP, DHCP, and DNS</li>\r\n<li>Ability to interpret electrical wiring diagrams and blueprints.</li>\r\n<li>Excellent problem-solving and troubleshooting skills.</li>\r\n<li>Ability to work well under pressure and adhere to tight deadlines</li>\r\n<li>Strong written and verbal communication skills.</li>\r\n<li>Ability to work independently or in a team.</li>\r\n<li>Experience in the IT and ELV industries is a plus.</li>\r\n</ul>\r\n<p><strong><br>Location: </strong>Dubai, UAE<strong><br></strong></p>', '1 - 2 Years', '2023-11-08', 'Open', '2023-11-07 23:19:30', '2023-12-30'),
(10, 'KNX Engineer', 'QPTS/JOB-28', '<p>Qualification: BE/B.Tech/Diploma</p>\r\n<p>Knowledge in KNX programming, home automation, and lighting control systems, autocad, MS office.</p>\r\n<p>KNX basic certification will be added advantage.</p>\r\n<p>Candidates with a UAE driving license will be preferred</p>', '0 - 2 Years', '2024-02-12', 'Open', '2024-02-12 14:45:57', '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `last_job_code`
--

CREATE TABLE `last_job_code` (
  `id` int(11) NOT NULL,
  `last_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_job_code`
--

INSERT INTO `last_job_code` (`id`, `last_code`) VALUES
(1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `client_path` varchar(300) NOT NULL,
  `client_name` varchar(300) NOT NULL,
  `brand_path` varchar(300) NOT NULL,
  `brand_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `client_path`, `client_name`, `brand_path`, `brand_name`) VALUES
(1, '../assets/img/clients/1000049528.jpg', 'Al Majaz Amphitheater ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `client` varchar(300) NOT NULL,
  `contractor` varchar(300) NOT NULL,
  `consultant` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `image_path`, `project_name`, `description`, `client`, `contractor`, `consultant`, `created_at`) VALUES
(1, '../assets/img/projects/Mohre Muhaisna.jpg', 'Mohre Building, Muhaisna', 'Supply and Installation of Automatic Speed Gates', 'Emirates Real Estate Corporation (EREC)', 'Airolink Building Contracting LLC', 'Schuster Pechtold Architecture and Engineering Consultant', '2023-09-12 06:43:14'),
(2, '../assets/img/projects/al ain.jpg', 'Jumeirah Hotel at Saadiyat Island Resort', 'Supply, Installation & Configuration:\r\nâ€¢	Wifi System - Aruba\r\nâ€¢	Network Managed Switches â€“ Avaya\r\nâ€¢	Telephone â€“ Avaya/ V-tech Hotel Phones\r\nâ€¢	IPTV â€“ Samsung / VDA\r\nâ€¢	Structured Cabling â€“ Belden\r\nâ€¢	CCTV System â€“ Bosch\r\nâ€¢	Intercom System â€“ Comilet\r\nâ€¢	Access Control System â€“ Miditech\r\n', 'Sheikh Suroor Projects Department', 'Golden Vision General Contracting S.P.Â LLC', 'Khatib & Alami', '2023-09-14 09:35:19'),
(3, '../assets/img/projects/fairmont.jpg', 'Fairmont Hotel Marina, Abu Dhabi', 'Supply Installation, Rectification and Reprogramming of Guest Room Management System in 812 Rooms.\r\n', 'National Investment Corporation ', 'Spectrum Cube Technical Services LLC', 'Khatib & Alami', '2023-09-14 09:38:40'),
(4, '../assets/img/projects/Amphitheatre.jpg', 'Al Majaz Amphitheatre, Sharjah', 'Supply, Installation & Configuration of Paxton Access Control System.\r\n', 'Al Majaz Amphitheatre, Sharjah', 'Shades Interiors', '', '2023-09-14 09:57:36'),
(5, '../assets/img/projects/iris lounge dubai.jpg', 'Iris Lounge, Meydan, Dubai', 'Supply, Installation & Configuration:\r\nâ€¢	KNX Dali Lighting Control System.\r\nâ€¢	DMX RGB Lighting control.\r\nâ€¢	Controlling the Lighting control with Control4 \r\n', 'Add Mind', 'Gulfline International Trading CO LLC', '', '2023-09-14 10:00:30'),
(6, '../assets/img/projects/rotana hotel.jpg', 'Rotana Hotel, Abu Dhabi', 'Configuration of Spica Access Control System', 'Rotana Hotel', 'Rural Power General Contracting ', '', '2023-09-14 10:02:08'),
(7, '../assets/img/projects/royal m hotel, fujairah.jpg', 'Royal M Hotel, Fujairah', 'Supply Installation & Configuration of \r\nâ€¢	AV System - AMX\r\nâ€¢	Digital Signage â€“ Samsung / Magic Info\r\nâ€¢	Music System â€“ Bose / AMX\r\n', 'Royal M Hotel, Fujairah', 'Safetech Security & Safety Systems LLC', '', '2023-09-14 10:03:04'),
(8, '../assets/img/projects/barrari natural resources.jpg', 'Barrari Natural Resources, Al Ain', 'Supply and Installation: \r\nâ€¢	Structured Cabling system \r\nâ€¢	Fiber cable pulling and splicing and Cat6 cable pulling and testing.\r\nâ€¢	Server Room Rack re-arrangement.\r\nâ€¢	Configuration of UPS, \r\nâ€¢	Configuration of NTI system.\r\nâ€¢	Configuration of APC Rack Cool System.\r\n', 'Mawarid Services Company LLC', 'PMG Electromechanical Services', '', '2023-09-14 10:04:12'),
(9, '../assets/img/projects/alaska restaurant.jpg', 'Alaska Restaurant, Palm Jumeirah, Dubai', 'Supply and Installation of Kitchen Granite.', 'Al Nasseeb Kitchen Equipment Manufacturing LLC', '', '', '2023-09-14 10:16:18'),
(10, '../assets/img/projects/AD Compost.png', 'Abu Dhabi Compost Plant', 'Supply & Installation of Fiber and Cat 6 Cable including 5 Nos IDF Rack Installation, UPS Installation and configuration.\r\nCCTV Rectification.', 'Mawarid Services Company LLC', 'PMG Electromechanical Services', '', '2023-09-15 09:38:48'),
(11, '../assets/img/projects/Al Aryam Medical Clinic Center.jpg', 'Al Aryam Medical Clinic Center, Al Ain', 'Supply, Installation & Configuration:\r\nâ€¢	Structured Cabling system \r\nâ€¢	IP PBX System- Matrix\r\nâ€¢	IP CCTV System - UNV\r\n', 'Khalfan Mohammed Amer Obaid Al Marar', '', '', '2023-09-15 21:23:11'),
(12, '../assets/img/projects/HFZA-Gate 1 Security Office.png', 'Hamriyah Free Zone Security Building Phase-1', 'Supply, Installation of Electrical & IT Networking.\r\nElectrical Work: DB installation, Cable Termination, Glanding, Testing, Electrical Wiring, Light Installations.\r\nNetworking: IT Rack Installation and Cable pulling Cable dressing  (Brand: Beldon)', 'Hamriyah Free Zone Authority', 'ID & Beyond Interior Design Solutions', '', '2023-09-15 21:32:19'),
(13, '../assets/img/projects/WhatsApp Image 2022-03-17 at 12.23.47 PM.jpeg', 'Lahbaab Super Market, Abu Shagarah, SHarjah', 'Scope of Work:\r\nâ€¢	Interior Painting, Ceiling works, Butcher counter Installation, Inside Racks & Shelfs.\r\nâ€¢	MEP Works: Plumbing, Drainage, Electrical wiring, DB, Light Installation\r\nâ€¢	ELV System: Music System, CCTV System, IT & Wifi System.\r\nâ€¢	POS Installation & Configuration (One server and 2 POS Counter System)\r\n', 'Mrs. Fowzia Meeran Malik Mohamed', '', '', '2023-09-15 21:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `com_name` varchar(200) NOT NULL,
  `role` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `com_name`, `role`, `testimonial`, `image_path`, `created_at`) VALUES
(1, 'Jawed Ahmad', 'GOLDEN VISION GENERAL CONTRACTING - SOLE PROPRIETORSHIP L.L.C.', 'Operations Manager ', 'Best team to work with, they provide all ELV & IT solutions and they are very flexible understanding the requirement and provide a proper solution. They give high priority for customer satisfaction and quality. ', '../assets/img/testimonials/IMG-20230821-WA0060.jpg', '2023-09-07 07:12:08'),
(2, 'Sulthan Mohammad', 'Barari Natural Resouces', 'IT Engineer', 'I am thrilled to share my experience with QPLUS TECHNICAL SERVICE LLC, and I cannot express enough how exceptional their services have been. I have consistently been impressed with their dedication to excellence and unwavering commitment to customer satisfaction.\r\nCommunication with QPLUS TECHNICAL SERVICE LLC has always been seamless and efficient. They are responsive, receptive to feedback, and proactive in addressing any concerns. This open line of communication has fostered a sense of collaboration and trust, which is crucial in any vendor-client relationship.', '../assets/img/testimonials/sulthan.jpg', '2023-09-11 07:11:45'),
(3, 'Liam Fraser', 'Dubai Artistic Innovations', 'Production Manager', 'Clear and effective communications from this company with effective installation practices throughout the projects completed. I recommend this company to anyone who is looking for competitive prices and effective, easy and no problem completion of jobs. A pleasure to work with them.', '../assets/img/testimonials/DAI-Black PNG.png', '2023-09-18 06:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `phone` mediumtext NOT NULL,
  `country` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_image`, `phone`, `country`, `role`, `status`, `added`) VALUES
(1, 'Shafeek Meeran', 'Shafeek@qplus-ts.com', 'cabfa769c0467171c5e3d813b83ec4ff2342bd87', '../assets/img/blog/author/1000007856.jpg', '+971581174967', 'United Arab Emirates', 'Admin', 1, '2023-09-10 07:37:08'),
(4, 'admin', 'admin@ex.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '1234568789', 'United Arab Emirates', 'Admin', 1, '2024-01-22 11:20:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_blog_images_blog` (`blog_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_code` (`job_code`);

--
-- Indexes for table `last_job_code`
--
ALTER TABLE `last_job_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `fk_blog_images_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
