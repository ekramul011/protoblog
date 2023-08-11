-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 11:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssb547project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_parent` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `is_parent`, `status`) VALUES
(1, 'Education Impact', 'EDUCATION IMPACT, E-learning that works.', 0, 1),
(2, 'Health Impact', 'Ensuring our students can lead healthy, secure, and productive lives', 0, 1),
(3, 'Earth Impact', 'Combatting Climate Change', 0, 1),
(4, 'Girls Education', 'Empowering girls and young women to be educated, healthy and safe', 1, 1),
(5, 'Result', 'result', 0, 1),
(6, 'Practice Brief Series', 'READ SMART', 5, 1),
(7, 'Success Stories', 'Success Stories', 5, 1),
(8, 'Impact', 'Education Impact', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `comments` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `cmt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `postID`, `comments`, `status`, `cmt_date`) VALUES
(1, 12, 1, 'This is first comment to check database', 1, '2023-08-05'),
(4, 12, 1, 'This is fourth comment to check database', 1, '2023-08-05'),
(5, 12, 5, 'This is fifth comment to check database', 1, '2023-08-05'),
(6, 12, 1, 'Six comment posted for test', 1, '2023-08-05'),
(7, 12, 2, 'Great esources provide activity-oriented lesson plans for each day, designed to move learning away from traditional rote learning. They include valuable life lessons in addition to academic content', 1, '2023-08-05'),
(8, 12, 9, 'Test comment 35', 1, '2023-08-11'),
(9, 12, 9, 'Test comment 45', 1, '2023-08-11'),
(10, 12, 9, 'Test comment 33', 1, '2023-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `tags` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=Active 2=Inactive',
  `post_date` date NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `category_id`, `author_id`, `tags`, `status`, `post_date`, `view`) VALUES
(1, 'EDUCATION IMPACT ', '<h2><strong>eLearning that works.</strong></h2>\r\n\r\n<p>We envision a world where all students are given the tools they need to reach their full potential. We have developed an effective education platform for rural communities to provide a model for developing countries. With the school as a starting point, we are able to make broad changes across families and communities to improve not only their educational outcomes, but also their overall wellbeing.</p>\r\n\r\n<p><em>We believe education is a combination of an effective curriculum (supported by <a href=\"https://mwabu.com/\">Mwabu</a>)</em>, a robust teaching and coaching model and supplemental programs around health, child protection, and environmental sustainability.</p>\r\n\r\n<h3><strong>THE PROBLEM</strong></h3>\r\n\r\n<p>Primary and secondary school age children in the poorest countries are nine times more likely to be out of school than those in the richest countries.</p>\r\n\r\n<p>While primary school enrollment is high, education quality is low, and literacy rates among young adults fall under regional averages. The average scores on the 2016 Grade 5 National Assessment were 35% in English and 37% in math, and little progress has been made on academic performance since 1999.</p>\r\n\r\n<p>Despite decades of peace and stability, the Zambian educational system is providing neither the access to nor the quality of education that its citizens demand.</p>\r\n\r\n<h3><strong>OUR SOLUTION</strong></h3>\r\n\r\n<p>eLearning works because it provides teachers with a roadmap to teach and engages students with activity-based lessons.</p>\r\n\r\n<p>We&#39;ve learned through research that technology alone is not enough. Delivering quality education requires all aspects of a school to work in sync. Impact Network developed the eSchool 360 model to maximize the potential benefits of eLearning in the most remote, under-served areas of Africa.</p>\r\n', '97718321.jpg', 8, 12, 'eLearning, eSchool, childhood education, early education', 2, '2023-08-05', 0),
(2, 'THE ESCHOOL 360', '<h1><strong>THE ESCHOOL 360</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>WEEKLY MANAGEMENT</h3>\r\n\r\n<p>Professional staff (including teacher supervisors and a technology expert) support every school, providing accountability, on-site support, and training.</p>\r\n\r\n<h3>SCHOOL SUPPLIES</h3>\r\n\r\n<p>Since the program targets under-resourced families, students, teachers, and schools are given adequate school supplies.</p>\r\n\r\n<h3>SOLAR</h3>\r\n\r\n<p>Since our schools are &ldquo;off the grid,&rdquo;&nbsp;electricity in our schools is generated from solar power installed on the roofs in an effort to conserve and protect the environment using cost-effective means.</p>\r\n\r\n<h3>TEACHER SALARY</h3>\r\n\r\n<p>In contrast to other community schools, where teachers are often volunteers who are paid sporadically and poorly, our teachers receive a living wage and benefits.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.squarespace-cdn.com/content/v1/5df1453b1180e26a82cf7100/efc29259-7ec2-47b8-a39a-67a9c0f2bf6f/eschool_2022+Update.png\" style=\"height:438px; width:800px\" /></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>ELEARNING HARDWARE</h3>\r\n\r\n<p>Impact Network partners with&nbsp;<a href=\"https://mwabu.com/international/home/\" target=\"_blank\">Mwabu</a> to provide teachers with a tablet and projector to deliver class lessons. The tablets contain thousands of lessons and lesson plans that adhere to the Zambian national curriculum, are approved by the Ministry of Education, and are taught in the local language.</p>\r\n\r\n<h3>STUDENT CENTERED METHODS</h3>\r\n\r\n<p>The lesson resources provide activity-oriented lesson plans for each day, designed to move learning away from traditional rote learning.&nbsp;They include valuable life lessons in addition to academic content.</p>\r\n\r\n<h3>TEACHER TRAINING</h3>\r\n\r\n<p>Teachers are hired locally, providing crucial job creation in rural areas. Weekly coaching sessions help tailor support to the needs of individual teachers. During monthly training sessions, teachers come together from across our schools to participate in a series of workshops.</p>\r\n\r\n<h3>COMMUNITY OWNERSHIP</h3>\r\n\r\n<p>Ownership is fostered through community activities. Each school has a Parent Teacher Association that provides input, parental involvement, and support.</p>\r\n\r\n<h3>RURAL SECURITY</h3>\r\n\r\n<p>In addition to community and teacher ownership, steel doors and a security guard are provided.</p>\r\n\r\n<h3>BUILDING CARE</h3>\r\n\r\n<p>Respectable and safe facilities are key to providing a quality learning environment for students. Buildings are constructed and maintained by local workers.&nbsp;</p>\r\n', '37267362.jpg', 8, 12, 'eLearning, eSchool, childhood education, early education', 1, '2023-08-05', 8),
(3, 'EARLY CHILDHOOD EDUCATION', '<h1><strong>EARLY CHILDHOOD EDUCATION</strong></h1>\r\n\r\n<p>Across the globe, investing in the earliest years of a child&rsquo;s development has been proven to improve future learning outcomes and keep children in school longer. Early Childhood Education supports cognitive and socio-emotional developments during early childhood when the brain matures faster than any other time in life.&nbsp; Indeed, it has even been proven to improve future earnings by up to 25 percent (World Bank Group, 2017). An additional dollar invested in quality early childhood programs has a return of between $6 and $17.</p>\r\n\r\n<p>Impact Network Early Childhood classes operate across 8 schools and 350 children, and are divided into two classes: Middle Class (aged 3-4) and Reception Class (aged 5-6). There are a maximum of 25 learners in each class in order for the teachers to be able to manage the classes and provide appropriate support to each individual child. Impact Network uses a play-based approach to learning and a child-friendly space. The play-based approach offers many opportunities for exploration and manipulation across a number of domains including cognitive, physical and socio-emotional.</p>\r\n\r\n<p>Using play for instruction takes a few different shapes in the Impact Network ECE classes. Free play allows children to lead their own playing and explore the world and classroom around them. Guided play is a child-led approach with guidance from a trained adult who is able to scaffold learning appropriately for children. Direct instruction is adult-designed and controlled but still uses play to engage children in different topics and skills.</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.squarespace-cdn.com/content/v1/5df1453b1180e26a82cf7100/1624558511266-FYCYKJIK8C77JYS1NCTH/Deborah+and+Christine.jpg\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<h1>OUR PILOT SCHOOLS</h1>\r\n\r\n<p>In 2009, Impact Network began building schools in rural Zambia to bring educational access to out-of-school children. By 2011, we had built 5 community schools, operated by the community. But after completing these construction works, we realized that while the buildings were impressive, the level of education was inadequate. We shifted our focus <em>beyond the build</em>, and created the <strong>eSchool 360</strong> system to deliver high-quality education, while keeping costs to a minimum. We began a partnership with <a href=\"https://mwabu.com/international/home/\">Mwabu</a>, to provide standardized, high-quality lesson plans and lessons to our teachers and students.</p>\r\n\r\n<p>In 2013, we had piloted the eSchool 360 across 8 schools in Katete District with incredible success. Building upon that and using the classroom as a starting point, we designed and implemented projects to address the social determinants of education focusing on girls and woman empowerment, health and the environment. These projects include financial literacy, child protection, girls and women empowerment, environmental sustainability and life skills and sexuality and have impacted over 25,000 lives.</p>\r\n\r\n<p>We continue to work with these initial schools to pilot new innovations that have the potential to help rural community schools across the</p>\r\n', '79643903.jfif', 8, 12, 'eLearning, eSchool, childhood education, early education', 1, '2023-08-05', 1),
(4, ' GIRLS IMPACT', '<h2><strong>Empowering girls and young women to be educated, healthy and safe</strong></h2>\r\n\r\n<p>Impact Girls aims to holistically address critical issues facing rural girls and young women &ndash; a lack of power to make decisions about their own education, health, bodies and lives. Keeping school-age girls in school is one of the biggest factors that helps to secure long-term change in communities across Zambia. <strong>An extra year of primary school increases wages for girls by an eventual 10% to 20%.</strong></p>\r\n\r\n<hr />\r\n<h3><strong>THE PROBLEM</strong></h3>\r\n\r\n<p>Many adolescent girls in rural Zambia lack critical menstrual health hygiene materials and knowledge.</p>\r\n\r\n<p>First, they may not have access to private washrooms or clean sanitary products. <strong>Poorly managed menstrual health hygiene contributes to up to 4-5 missed days of school each month.</strong></p>\r\n\r\n<p>Additionally, young women are often not empowered to have control over their own bodies and are coerced into unwanted sex or early marriage. Zambia has a teenage pregnancy rate of 15%, the 11th highest in a 2018 UNICEF study of countries. <strong>Almost one-third of girls aged 15-19 have a child or are currently pregnant,</strong> and a similar proportion get married by 18.</p>\r\n\r\n<p><a href=\"https://www.impactnetwork.org/donate\" target=\"_blank\">DONATE &rarr;</a></p>\r\n\r\n<h3><strong>THE SOLUTION</strong></h3>\r\n\r\n<p>Our student population is 60% female, and we employ a number of strategies in the classroom to ensure our girls can continue learning.</p>\r\n\r\n<p>First, we provide private latrines and handwashing stations for adolescent girls. We combine these with pad-making workshops to promote the use of clean and reusable sanitary products. We provide community sensitization, counseling services, and work closely with local One Stop Centers to ensure that girls receive appropriate support to prevent early marriage and teenage pregnancy.</p>\r\n\r\n<p>We also provide opportunity for growth through play and engagement in group sport, primarily through our <a href=\"http://www.netgirlszambia.org/\" target=\"_blank\">NetGirls Zambia</a> initiative.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>SUPPORTING GIRLS IN RURAL AFRICA THROUGH NETBALL LEAGUES</h2>\r\n\r\n<p>Netball is a hybrid between handball and basketball. While boys prefer soccer, netball is the sport of choice for girls across Southern Africa. Unfortunately, funding and access to netball is often limited or takes a backseat to soccer.&nbsp; The Impact Network&#39;s NetGirls Zambia initiative empowers and improves the lives of girls by providing opportunity for growth through play and engagement in group sport.</p>\r\n\r\n<p>We currently operate in rural villages around Katete district in Eastern Zambia with 100 teams and over a thousand girls competing for the highly sought after league champion title!&nbsp;</p>\r\n\r\n<h2>WHY GIRLS SPORTS?</h2>\r\n\r\n<p>In Zambia, girls often miss out on opportunities to play sports because they are expected to help with chores and take care of younger siblings.&nbsp;Yet, research has shown that giving girls the opportunity to play sports has awesome benefits, including:&nbsp;<em>Breaking down gender stereotypes; Building leadership skills; Expanding social networks; Providing female mentorship and role models; Teaching teamwork; Building self-esteem and improving happiness through healthy, social organized activities.</em></p>\r\n\r\n<h2>HOW DOES THE LEAGUE WORK?</h2>\r\n\r\n<p>There are two basic leagues &mdash; our Junior League focuses on school-aged girls, while the Varsity League caters to young women over the age of 18. Teams are coached by volunteers and managed at the ward level by local staff. Teams practice daily and hold games with teams from neighboring villages on weekends. Scores and game recaps are announced on local radio and there are zonal and overall tournaments held in Katete.</p>\r\n\r\n<p>Initially the focus has been on athletics, however in 2019 we combined the netball league with financial literacy and menstrual health hygiene programs.</p>\r\n\r\n<p><strong>Importantly, the cost of the program is just $5 a season per girl.</strong></p>\r\n', '20306264.jfif', 4, 12, 'girls education', 1, '2023-08-05', 1),
(5, ' HEALTH IMPACT', '<h2>Ensuring our students can lead healthy, secure, and productive lives</h2>\r\n\r\n<p>Our work extends beyond the lines of traditional education, towards a shared mission of improving the overall lives of rural children in Zambia.&nbsp; With the school as a starting point, we are able to make broad changes across families and communities to improve not only their educational outcomes, but also their overall wellbeing.</p>\r\n\r\n<h3><strong>THE PROBLEM</strong></h3>\r\n\r\n<p>Sexual and reproductive health information is essential for the futures of young women in rural communities, but only a third of primary school students in Eastern Province are provided with sex education. The lack of sexual and reproductive health education leads to a high risk of unplanned pregnancies and compounds the cycle of poverty in rural Zambia.</p>\r\n\r\n<p>Additionally, the risk of contracting HIV and other sexually transmitted diseases is higher when people lack access to health education. A nationwide survey commissioned by UNESCO in 2013 found that only 25% of girls and boys have sufficient knowledge of HIV. Zambia is experiencing a generalized HIV/AIDS epidemic, with a national HIV prevalence rate among adults ages 15 to 49 of 12%, the 7th highest rate globally.</p>\r\n\r\n<p>Last, most young women are likely to encounter violence from future partners. The latest study showed that the proportion of women aged 15-49 experiencing intimate partner violence at least once in their lifetime was <strong>an incredible 43%.</strong> Young women are not often given adequate life skills training to help them deal with and escape such violence, and more importantly, young men are not taught the importance of respect, consent, and advocacy for the women in their lives.</p>\r\n\r\n<h3><strong>THE SOLUTION</strong></h3>\r\n\r\n<p>To solve the health issues facing our students we use a multi-pronged approach.</p>\r\n\r\n<p><strong>Every single one of our students has a trusted adult to confide in, and access to a trained social worker. </strong>Impact Network is committed to a &#39;zero tolerance&#39; of all forms of&nbsp;child&nbsp;abuse, neglect, exploitation, and violence. This includes collaboration with parents, traditional leaders, and law enforcement agencies to create a safe learning environment and promote and safeguard the well-being of all our pupils.</p>\r\n\r\n<p>All students in grades 5 and higher complete weekly <strong>Life Skills and Sexuality workshops</strong>. &nbsp;This supplemental program teaches skills that will benefit the students in their transition into their teenage years and subsequent adulthood.&nbsp; Topics surround transferable skills such as communication and problem solving, as well as difficult topics like teenage pregnancy, sexuality transmitted diseases, and gender-based violence.&nbsp;Life Skills and Sexuality is taught as a compliment to the eSchool 360 and is designed to add a safe space with a trusted adult where students can learn and contribute in small groups.</p>\r\n\r\n<p>In addition to working with students, we also work to promote good health within the community more broadly. We conduct workshops for teachers, PTA members, and community members on <strong>WASH, HIV / AIDS prevention, and gender-based violence prevention.</strong></p>\r\n\r\n<p><strong><em>Looking Forward: </em></strong>Impact Health is our newest group of projects and we will be adding more comprehensive health programs in the future!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>Our COVID-19 Response</h1>\r\n\r\n<p>As we respond to the current COVID-19 crisis in Zambia, we are actively working to disseminate information to our students, families and communities. Our initial outreach in late March created over 12,000 care packages with soap, information on how to stay safe, and homework for students as schools closed.</p>\r\n\r\n<p>Since then, we have created a number of initiatives to help support the communities that we work with. We are currently working to disseminate locally-made masks and are working with local tailors to create 2,500 masks a week.</p>\r\n\r\n<p><strong><em>Stay tuned for updates as this is a quickly evolving project!</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '74353655.png', 2, 12, 'health', 1, '2023-08-05', 0),
(6, 'EARTH IMPACT', '<h2><strong>Combatting Climate Change</strong></h2>\r\n\r\n<p>Impact Earth was a part of our programs from the very start &mdash; we just didn&rsquo;t name it! Each of our schools is powered by solar panels and sustainability has been a core value since Impact&rsquo;s inception. In 2021, these programs were formalized to form Impact Earth.</p>\r\n\r\n<h3><strong>THE PROBLEM</strong></h3>\r\n\r\n<p>Despite policy and legal initiatives centered on environmental protection, little has been achieved on the ground to reduce the consequences of environmental degradation for the country and the toll that it continues to take on the people. Over 85% of rural households are affected by worsening crop land conditions, exacerbating the situation beyond an environmental issue, but also a food security one. In particular, the areas that we work are drought-prone and the conservation and efficient use of water becomes critical.</p>\r\n\r\n<h3><strong>THE SOLUTION</strong></h3>\r\n\r\n<p>Our Impact Earth initiatives include solar power, rainwater harvesting, tree-planting, and educational upcycling to rethink the use of trash in our school environment. Each of our students participates in environmental activities, culminating in an Environmental Awareness Day each term.</p>\r\n', '20326486.jpg', 3, 12, 'earth', 1, '2023-08-05', 2),
(7, 'READ SMART', '<p>READ SMART CINYANJA!</p>\r\n\r\n<p>During COVID-19, Impact Network piloted an innovative project to improve early literacy outcomes called &ldquo;<em>Read Smart</em>&rdquo;. This program is a literacy intervention for early grade learning based on the use of phonetic charts &ndash; essentially speech movement pictures that show the way the mouth moves to make certain sounds.</p>\r\n\r\n<p>This program was conducted in partnership with Ursula Rickli who has proven results and experience building local language phonics approaches in a variety of contexts. We are the only ones we know using this method in Zambia to teach children how to read &ndash; the majority of Zambian children are taught how to read by memorization.</p>\r\n\r\n<p>The pilot was conducted in 2021 at two schools in Eastern Province of Zambia, targeted at Grade 1-2 students. In 2022, we implemented across eight schools, reaching over 900 students.</p>\r\n\r\n<p>Importantly, standardized assessment data from the USAID-funded Let&rsquo;s Read Zambia project allows us to compare pilot schools with a national dataset. Across the nation, the proportion of first grade students at &ldquo;desirable&rdquo; or &ldquo;outstanding&rdquo; levels was 32-34%, <strong>compared to 75% at the pilot schools.&nbsp; </strong></p>\r\n\r\n<p><a href=\"https://www.impactnetwork.org/s/2023-Read-Smart-Cinyanja-Program.pdf\" target=\"_blank\">LEARN MORE</a></p>\r\n\r\n<p><img alt=\"\" src=\"https://images.squarespace-cdn.com/content/v1/5df1453b1180e26a82cf7100/8e5e9043-b016-4362-8838-c1ea4ca1a695/20150204_KU_Impact+Network_Zambia_070.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<h3>TEACHER TRAINING &amp; COACHING</h3>\r\n\r\n<p>Implementing a systematic plan to support teacher training and coaching is a crucial part of the Impact Network eSchool 360 model. Because teacher quality is a key metric in developing high performing learners and schools, we have invested more than eight years into developing, implementing and continuously improving a model of teacher development that improves teaching and learning in rural community schools. This model for teacher development includes three main components: ongoing teacher training, frequent monitoring, and regular observation and coaching sessions.</p>\r\n\r\n<p><a href=\"https://www.impactnetwork.org/s/2022-Coaching-Training-Concept-Note.pdf\" target=\"_blank\">LEARN MORE</a></p>\r\n\r\n<p><img alt=\"\" src=\"https://images.squarespace-cdn.com/content/v1/5df1453b1180e26a82cf7100/a6f41f2a-8990-4c7c-9a44-54b758837c53/Ackim.++.jpg\" style=\"height:1198px; width:800px\" /></p>\r\n\r\n<h3>REFLECTIONS FROM GRADE 7 STUDENT SURVEY</h3>\r\n\r\n<p>During Term 1 of 2022, all Grade 7 students were surveyed by the School Support Officer at their schools regarding their family background, living conditions, and future educational plans. This survey is specifically conducted with Grade 7 students in order to better understand what factors may contribute to or diminish school success for students in their final year of primary school and determine if there are school-wide or individual needs which could be met by Impact Network in order to improve the transition of Impact Network graduates to secondary school programs.</p>\r\n\r\n<p><a href=\"https://www.impactnetwork.org/s/2022-Grade-7-Survey-Results-9cbs.pdf\" target=\"_blank\">LEARN MORE</a></p>\r\n', '31192207.jpg', 6, 12, 'read, smart,  CINYANJA', 1, '2023-08-05', 2),
(8, 'SUCCESS STORIES', '<h1><strong>SUCCESS STORIES</strong></h1>\r\n\r\n<h2>From students to teachers to community members &mdash; we are making an impact.</h2>\r\n\r\n<h1>1. Meet Peter Banda, a grade 7 student</h1>\r\n\r\n<p><em>When I first got into this school, I had no ICT skills. My first contact with a tablet was in this school. Having been given this opportunity, I can now attest that I am able to operate and use the technology with very minimal supervision.</em></p>\r\n\r\n<p><em>In the earlier days before eLearning was introduced, I used to find it difficult to remember what was taught because some lessons were hard for me to remember without anything to look at. I enjoy the lessons when they are projected on the wall and I pay more attention.&nbsp; At times it feels like am watching a cartoon which helps me to learn the material faster because it is interesting and brings something real in a classroom.</em></p>\r\n\r\n<p><em>eLearning has enhanced my ability to learn and remember things that I see. The lessons on the tablets are awesome because it gets us engaged as a class.&nbsp; I love group work.&nbsp; We all interact and work as a group whereas before the teacher would do an exercise on the board and each student would hide their answer whether it is right or wrong.&nbsp;&nbsp;</em></p>\r\n\r\n<p><em>One statement our teacher uses is &ldquo;if you see it, you can&rsquo;t forget it and if you do something, you are likely to remember always how that particular thing is done&rdquo;. Truly, I have seen this in my learning ability as well as when it comes to remember what I learned. When I compare my performance before and now, I can truly attest to the fact that my grades have improved, and I am more zealous and positive minded than I was before. Visual learning is so much easier and fun. Now our classes are on time because we do not take so much time to understand what the teacher is teaching and the number of absenteeism has dropped.</em></p>\r\n\r\n<p><em>I am a better more focused and committed pupil now than I was some time back before visual learning and other learning aids where introduced. I look forward to so much more that I will learn with regards to ICT skill acquisition.</em></p>\r\n\r\n<p><em>*Name has been changed to protect identity of student.</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://images.squarespace-cdn.com/content/v1/5df1453b1180e26a82cf7100/1581108103148-WINESDLUCH8ISUDOYJMF/image-asset.jpeg\" style=\"height:750px; width:500px\" /></p>\r\n\r\n<h1>2. Meet Katherine Mwale, a parent from one of our schools</h1>\r\n\r\n<p><em>I am Katherine Mwale. I have nine children, among my children one is an Impact student and another one is an Impact teacher.</em></p>\r\n\r\n<p><em>Before Impact Network was established I had no interest in educating my children but my husband did. In our village there were no schools but there was a community school nearby where my husband took our children. The community recommended a male teacher and we agreed that will be taking portions of our crops to pay the teacher. This worked well the first 2 years, but afterwards the children would come home and tell us the teacher was not there. At times the teacher would travel without letting anyone know. He was very stubborn. When the head man approached him on these issues, he started to resent the children. Whenever I went by the school the children were usually outside playing. We as parents never saw any benefit for children to go to school and play all day long when there were so many chores to be done at home and in the field. I remember that year there were a lot of dropouts and the school closed for a period of time.&nbsp;</em></p>\r\n\r\n<p><em>Years later a non-profit organization came to our community to educate us on the importance of education and invited children to come back to the school, free of charge.&nbsp; My daughter, who now works for Impact Network, was among the children who were sponsored.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Now that my daughter is a teacher, I have seen the importance of education.&nbsp; Our lives have changed. The way my girl does things, the way she understands things, the way she explains things to me, the way she encourages her younger sibling to go to school amazes me.&nbsp;I can see the difference in the schools my oldest children attended to the Impact Network School my youngest goes to.&nbsp;When he is home from school, all he talks about is learning on tablets. He tells me what he learns from them and doesn&rsquo;t want to miss school.&nbsp;</em></p>\r\n\r\n<p><em>At school, the students now pay attention to each and every detail and are finally getting a quality education. The classrooms are perfect and the teachers always get paid.&nbsp; The salary helps motivate the teachers a lot because people expect to be paid a fair wage after their hard work, and without it, you cannot attract or retain&nbsp;employees. The prospect of receiving&nbsp;money&nbsp;in the near future is a strong enough&nbsp;motivator&nbsp;to change behavior.&nbsp;Maybe this is what the earlier teachers lacked. It is not just me and my kids that are benefiting but the community as a whole. </em></p>\r\n\r\n<p><em>The quality of education our children are receiving are that of a 5 star hotel.</em></p>\r\n\r\n<p>*Name has been changed to protect identity of parent<em>.</em></p>\r\n\r\n<h2>&ldquo;It is not just me and my kids that are benefiting but the community as a whole.&rdquo;</h2>\r\n\r\n<p>&mdash; Katherine Mwale</p>\r\n\r\n<p><img alt=\"DSC06099-min.JPG\" src=\"https://images.squarespace-cdn.com/content/v1/5df1453b1180e26a82cf7100/1581108477706-F50P1Q10GO4GCJ7A5KDJ/DSC06099-min.JPG\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<h1>3. Meet Solomon Phiri, one of our teachers</h1>\r\n\r\n<p><em>Learning is a process, and it is part of our daily lives.</em></p>\r\n\r\n<p><em>I remember when I was growing up, Community School Teachers were never paid, not motivated and did not pay attention to student&rsquo;s abilities. Because of this there was a negative social culture tag attached to school as people perceived it to be a waste of time. Students going to community schools were labeled as orphans and destitute, which demotivated both students and teachers. Therefore, students lacked quality education and motivation to continue with school while teachers did not have the right skills to teach and were not interested in it. This is why you find a lot of our elders in the community are not educated.</em></p>\r\n\r\n<p><em>Before I joined Impact Network, I had little interest in my teaching career. Impact Network Teacher Training has made me gain interest and every time I attend the training, my interest is rekindled. I have learned a lot and have moved from being a mere teacher to a teacher with a vision for my country. I never knew how to deal with learners especially the ones that are struggling or are difficult in the classroom. Learning about positive discipline and the steps to take when talking to our students has opened my eyes. Teacher Training is doing wonders for me. If each and every school would have these teacher trainings then we will flourish as a country, because education plays a central role in all aspects of development and </em><strong><em>teachers are agents of education.</em></strong></p>\r\n\r\n<p><em>Teacher Training also brings about balanced professional development, as we learn from our peers how to use effective strategies when delivering lessons. There are a lot of skills gained such as learning how to use group activities in a lesson, adapting the textbook to match the class and how to use the time table. I now use classroom aides and resources that help my learners remember the lessons. Another positive impact is that we have learned how to be economical, creative and always look for ways to make use of available local resources when delivering a lesson.</em></p>\r\n\r\n<p><em>There is more that I could say about the benefits of the training that we receive.&nbsp; We are taught about children&rsquo;s rights and responsibilities.&nbsp; We practice better techniques to give learners feedback on performance as well as how to deliver lessons on a tablet.</em></p>\r\n\r\n<p><em>Modern technology has made it simple for students to learn more effectively, conveniently and support individual learning which also gives students a chance to learn on their own. It has improved learners retention. As the saying goes </em><strong><em>&ldquo;tell me and I&#39;ll forget; show me and I may remember; involve me and I&#39;ll understand.&rdquo;</em></strong><em> eLearning is really helping both the teachers and the students.</em></p>\r\n', '16984718.jfif', 7, 12, 'students, teachers, community, members', 1, '2023-08-05', 500000000),
(9, 'Earth Imapct', '<h2>Combatting Climate Change</h2>\r\n\r\n<p>Impact Earth was a part of our programs from the very start &mdash; we just didn&rsquo;t name it! Each of our schools is powered by solar panels and sustainability has been a core value since Impact&rsquo;s inception. In 2021, these programs were formalized to form Impact Earth.</p>\r\n\r\n<h3>THE PROBLEM</h3>\r\n\r\n<p>Despite policy and legal initiatives centered on environmental protection, little has been achieved on the ground to reduce the consequences of environmental degradation for the country and the toll that it continues to take on the people. Over 85% of rural households are affected by worsening crop land conditions, exacerbating the situation beyond an environmental issue, but also a food security one. In particular, the areas that we work are drought-prone and the conservation and efficient use of water becomes critical.</p>\r\n\r\n<h3>THE SOLUTION</h3>\r\n\r\n<p>Our Impact Earth initiatives include solar power, rainwater harvesting, tree-planting, and educational upcycling to rethink the use of trash in our school environment. Each of our students participates in environmental activities culminating in an Environmental Awareness Day each term</p>\r\n', '7083846.jpg', 3, 12, 'earth', 1, '2023-08-05', 210013);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=User',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 2=Inactive',
  `image` text DEFAULT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `status`, `image`, `join_date`) VALUES
(1, 'Fahim', 'fahim@mail.com', '123', '09876543232', 'home', 2, 2, '', '2023-06-08'),
(6, 'Akash', 'Akash@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', '123456', 'home', 2, 1, '', '2023-06-18'),
(10, 'Raju', 'raju@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12345', '12345', 2, 2, '3660907pexels-andrea-piacquadio-3763188.jpg', '2023-06-18'),
(12, 'admin admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 'dashborad', 1, 1, '5207236image.jpg', '2023-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
