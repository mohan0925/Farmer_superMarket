-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 05:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_username` varchar(200) NOT NULL,
  `A_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_username`, `A_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `all_categories`
--

CREATE TABLE `all_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(2000) NOT NULL,
  `category_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_categories`
--

INSERT INTO `all_categories` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Fertilisers', 'fertiliser.jpg'),
(2, 'Seeds', 'seeds.jpg'),
(3, 'Spices', 'spices.jpg'),
(4, 'Dry Fruits', 'dry_fruits.jpg'),
(5, 'Solar', 'solar.jpg'),
(6, 'Sprays', 'sprays.jpeg'),
(7, 'Protective Wears', 'protective_wears.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Entry` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Entry`, `first_name`, `phone`, `email`, `message`) VALUES
(1, 'Mohan Dharavath', '07660812553', 'dharavath.mohan47@gmail.com', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(6) UNSIGNED NOT NULL,
  `customer_first_name` varchar(100) NOT NULL,
  `customer_last_name` varchar(100) NOT NULL,
  `customer_phone` bigint(11) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_postcode` varchar(50) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `customer_image` varchar(2000) DEFAULT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_phone`, `customer_address`, `customer_postcode`, `customer_state`, `customer_image`, `customer_email`, `customer_pass`) VALUES
(34, 'Mohan', 'Dharavath', 7721590218, '63 Ullswater', 'LE2 7DU', '', 'IMG_0006.PNG', 'dharavath.mohan47@gmail.com', '12345'),
(41, 'Chandu', 'reddy', 7440052577, '63, ullswater street', 'le2 7du', '', 'covid.jpg', 'shashidhar751@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `cart_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `customer_id` int(6) NOT NULL,
  `vendor_email` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_cart`
--

INSERT INTO `customer_cart` (`cart_id`, `product_id`, `customer_id`, `vendor_email`, `quantity`) VALUES
(88, 256, 34, 'lokesh@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(6) NOT NULL,
  `order_invoice` varchar(50) NOT NULL,
  `product_id` int(6) NOT NULL,
  `customer_id` int(6) NOT NULL,
  `quantity` int(10) DEFAULT 1,
  `order_status` varchar(20) NOT NULL DEFAULT 'Active',
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vendor_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Order_table';

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `order_invoice`, `product_id`, `customer_id`, `quantity`, `order_status`, `order_time`, `vendor_email`) VALUES
(70, '20200419023717', 256, 34, 1, 'Delivered', '2020-04-19 01:37:17', 'lokesh@gmail.com'),
(71, '20200422063557', 214, 34, 1, 'cancel', '2020-04-22 17:35:57', 'lokesh@gmail.com'),
(72, '20200422063802', 213, 34, 1, 'Delivered', '2020-04-22 17:38:02', 'lokesh@gmail.com'),
(73, '20200422065012', 239, 34, 2, 'Delivered', '2020-04-22 17:50:12', 'lokesh@gmail.com'),
(74, '20200424043046', 213, 34, 1, 'Delivered', '2020-04-24 15:30:46', 'lokesh@gmail.com'),
(75, '20200506094633', 213, 34, 2, 'Delivered', '2020-05-06 20:46:33', 'lokesh@gmail.com'),
(76, '20200506095022', 214, 34, 1, 'Delivered', '2020-05-06 20:50:22', 'lokesh@gmail.com'),
(77, '20200509031315', 213, 34, 1, 'Delivered', '2020-05-09 02:13:15', 'lokesh@gmail.com'),
(78, '20200513064525', 213, 34, 1, 'Delivered', '2020-05-13 05:45:25', 'lokesh@gmail.com'),
(79, '20200514112615', 239, 34, 1, 'Delivered', '2020-05-14 10:26:15', 'lokesh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(6) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(2000) DEFAULT NULL,
  `product_category` varchar(30) DEFAULT NULL,
  `product_description` varchar(7000) DEFAULT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_status` varchar(200) NOT NULL DEFAULT 'Available',
  `vendor_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_description`, `product_quantity`, `product_status`, `vendor_email`) VALUES
(213, 'Crop Tiger', '100', 'crop_tiger.jpg', 'Fertilisers', 'Crop Tiger is an unique formulation designed especially for complete health of Sugarcane and Paddy. The gray colored powder is a blend of soluble Silica and Humic acid with many micronutrients. Crop Tiger builds an unbeatable strength in plants against any climatic pressure and diseases. Crop Tiger has multi-functional capabilities of not only anti-fungal, but also crop enhancers by providing potassium as nutrition to crops. ', '30', 'Available', 'lokesh@gmail.com'),
(214, 'Panchagavya', '110', 'panchagavya.jpg', 'Fertilisers', 'Panchagavya is an organic plant growth promoter that increases plant growth by giving high yield. Panchagavya is made from five products of cow namely cow dung, cow urine, milk, curd and ghee. Along with this, other products such as sugarcane juice, well ripened bananas and tender coconut water is added and mixed well for 21 days to get the desired effects. Panchagavya induces plant growth and immunity in plants.', '40', 'Available', 'lokesh@gmail.com'),
(215, 'VermiCompost', '95', 'VermiCompost.jpg', 'Fertilisers', 'It is a natural, odourless, aerobic process, much different from traditional composting. Earthworms ingest waste then excrete casts – dark, odourless, nutrient- and organically rich, soil mud granules that make an excellent soil conditioner. Earthworm casts are a ready-to-use fertilizer that can be used at a higher rate of application than compost, since nutrients are released at rates that growing plants prefer.', '40', 'Available', 'ravifkh@gmail.com'),
(216, 'Potash derived from molasses', '105', 'potash.jpeg', 'Fertilisers', 'Potash derived from molasses K-10to14%', '35', 'Available', 'lokesh@gmail.com'),
(217, 'Prom Fertilizer', '120', 'prom.jpg', 'Fertilisers', 'Brand Arjun Cleaning Agent No Color Brown Condition New Dosage 50-60 per acre Dosage (gram) 50-60 per acre Environment Friendly Yes Form Granules Grade Standard Bio-Tech Grade Moisture (%) 25% Organic Yes Pack Size 50kg Pack Type 50kg Ph Balanced Yes Release Type Slow State Granular Target crops all Crop Usage fertilizers Phosphate rich organic manure is a type of fertilizer used as an alternative to diammonium phosphate and single super phosphate. Phosphorus is required by all plants but is limited in soil, creating a problem in agriculture In many areas phosphorus must be added to soil for the extensive plant growth that is desired for crop production. Total Organic Carbon (Min.): 7.9%, Total Nitrogen (Min.): 0.4%, Total P2O5 (Min.): 10.4%, CN Ration < 20:1, Moisture (Max.): 25%', '45', 'Available', 'lokesh@gmail.com'),
(218, 'NPK Fertilizer 20-10-10', '150', 'npk.jpg', 'Fertilisers', 'Brand ARJUN Color Red NPK Yes Organic Not Organic Pack Size 50KG Pack Type BAG Usage AGRICULTURE Supplier, Trading Company of N:P:K 20:10:10 Fertilizers inGujarat, India.Moisture, Max 1.5 Total Nitrogen 20.0 Natural ammonium citrate phosphate (as P2O5), min.10 Water soluble phosphate (as P2O5), min 8.5 Water soluble potash (as K2O), min. 10', '50', 'Available', 'lokesh@gmail.com'),
(219, 'Monopotassium Phosphate ', '130', 'mono_potassium.jpg', 'Fertilisers', 'Condition Used Form Powder Grade Standard Reagent Grade Physical State Powder, Crystals Release Type Quick Monopotassium Phosphate Contains 52% P2O5 and 34% K2O. Most useful Fertilizer for Fruit corps and Flowers. In-organic Salt. Element Name Standard Report P2O5 52% K2O 34% Ph 4-6 Insoluble Matter 0.1% MAX Packing : 25 Kg PP Or HDPE Bag with Liner 100% Fully WaterSoluble Rich of Phosphorus and Potassium Content Containing in MKP (00-52-34) Fertilizer. Most Common use of MonoPotassium Phosphate is to increse productivity of Fruit and Suger Content. Application can be in Drip Irrigation as well as Direct soli use.', '50', 'Available', 'lokesh@gmail.com'),
(220, 'Potassium Sulphate', '150', 'potassium_sulphate.jpg', 'Fertilisers', 'Form Powder Pack Size 50 Pack Type bag Our firm is betrothed in providing an extensive range of Potassium Sulphate. The chemical is usually employed in fertilizers, providing both sulfur and potassium. Our presented product is processed using the premium quality chemical compounds and advanced technique by adroit professionals in tandem with defined industry parameters. For its longer shelf life, this product is extensively used by our esteemed patrons. Features: Balanced chemical composition Stabilized nature Precise pH value Element Name Standard Report Test Report Formula K2SO4 K2SO4 Potassium - K2O Min.50 % 51.3 % Sulphur - S Min. 18 % 18.1 % Moisture Max. 1 % 0.5 % Chloride Max. 2.5 % 1 % Heavy Metals Max. 1 PPM 1 PPM NON Element Specification Assay / Purity Min. 99 % PH Of 5% Sol. 5 to 7 Water Insoluble Max 0.5 %', '50', 'Available', 'lokesh@gmail.com'),
(221, 'Potassium Nitrate', '152', 'potassium_nitrate.jpg', 'Fertilisers', 'Color White Crystal Grade Standard Reagent Grade Physical State Powder State of Matter Crystals We are one of the reputed firms of NPK : 13-00-45 (Potassium Nitrate). Our products are also known as saltpeter. These are usually used in agriculture industry, food and pharm industry and solar energy plants. Our products are processed employing the finest quality input, which is attained from dependable retailers of market. These products are inspected by industry professionals on diverse industry parameters. Owing to longer shelf life and no harmful effect, this product is extensively used. Features: Accurate composition Soluble in water Highly effective Element Name Standard Report Test Report Formula KNO3 KNO3 Potassium - K2O Min.45 % 46.2 % Nitrogen - N Min. 13 % 13.4 % Moisture Max. 1 % 0.5 % Chloride Max. 2 % 1 % Heavy Metals Max. 1 PPM 1 PPM NON Element Specification Assay / Purity Min. 98.5 % PH Of 5% Sol. 5 to 7 Water Insoluble Max 0.5 %', '135', 'Available', 'lokesh@gmail.com'),
(222, 'NPK :17-44-00', '111', 'npk_174400.jpg', 'Fertilisers', 'Condition Used Environment Friendly Yes Form Powder Grade Standard Chemical Grade NPK Yes Organic Not Organic Release Type Quick Product Details: Total nitrogen % 17.00 Water soluble phosphate 44 % Moisture % 0.5 % matter insoluble 0.5 %', '60', 'Available', 'lokesh@gmail.com'),
(223, 'NPK : 20-20-20', '135', 'npk202020.jpg', 'Fertilisers', 'Color Green Form Powder Grade Standard Chemical Grade NPK Yes Organic Not Organic Pack Type 25 Release Type Quick Water Soluble Fertilizers N.P.K 20:20:20 Product Description 100% water soluble fertilizer containing all the three major plant nutrients viz., Nitrogen, Phosphorus and Potash in equal proportion Free flowing and easy to handle Details Features & Benefits Suitable for both foliar spraying and drip irrigation All major nutrients are available in a single product in equal proportion Low salt content prevents clogging of drip system As nutrient loss, which is common in ground application of fertilizers is avoided due to unique way of application, it enhances nutrient use efficiency Application Crops: All Crops Dosage:Foliar application : 4-5 g/L of water Fertigation: 1-3 kg/ac Note: For fertigation, number of application depends on crop. Fertigation: Use dosage based on results of the soil analysis, crop and its growth stage. However, do not mix with fertilizers containing calcium and magnesium salts. Technical details Composition Guaranteed (% w/w) Total Nitrogen (N) · Nitrate - N (as NO3) · Ammoniacal - N (as NH4) · Ureic – N (as NH2) 20 % min · 4. 9 % max · 3. 0 % min · 12. 1 % max Water Soluble Phosphate (as P2O5) 20 % min Water Soluble Potash (as K2O) 20 % min Sodium (as NaCl) 0.06 % max Matter Insoluble in water 0.5 % max Moisture 0.5 % max', '57', 'Available', 'lokesh@gmail.com'),
(224, 'Mono Ammonium Phosphate', '123', 'mono_ammonium_phosphate.jpg', 'Fertilisers', 'Condition Used Environment Friendly Yes Form Powder Grade Standard Chemical Grade Release Type Quick We are betrothed in offering a wide range of Mono Ammonium Phosphate. These are widely employed source of nitrogen (N) and phosphorus (P). It’s made of two constituents common in the fertilizer industry. This chemical is processed under the guidance of dexterous experts in compliance with universal industry parameters. This chemical is extremely employed in the market owing to their precise pH value and longer shelf life. Our chemical is available in varied chemical compositions that meet on industry demand. Features: Safe and pureEco friendlyAccurate composition Element Name Standard Report Test Report Formula NH4H2PO4 NH4H2PO4 Nitrogen – N Min.12 % 12.5 % Phosphorus – P2O5 Min. 61 % 61.3 % Moisture Max. 0.5 % 0.2 % Sodium as NaCl Max. 0.5 % 0.05 % Heavy Metals Max. 1 PPM > 1 PPM NON Element Specification Assay / Purity Min. 99 % PH Of 5% Sol. 5 to 7 Water Insoluble Max 0.5 %', '35', 'Available', 'lokesh@gmail.com'),
(225, 'JAL NIDHI pusa hydrogel', '147', 'jal_nidhi_pusa_hydrogel.jpg', 'Fertilisers', 'JAL NIDHI Pusa Hydrogel is a Super Absorbent used to absorb water and release to the plant when required. JAL NIDHI is developed and patented by IARI – PUSA– an autonomous body under government of India, New Delhi and is being manufactured by KCH India pvt ltd. Promoted by ICAR as well as Ministry of Agriculture & Science & Technolgy, Govt of India.   Jal Nidhi works like a sponge which swells and retains water up to approximately 350 times its Dry weight within its networked structure and releases water slowly to the plant / crops. It requires only 1.5 kg per acre of land and abosrbs water 350 times of its dry weight and stable up to 50 Deg C in the soil.', '35', 'Available', 'lokesh@gmail.com'),
(226, 'Sectin ', '99', 'sectin.jpg', 'Fertilisers', 'Sectin 60 WG is a combination fungicide containing Fenamidone and Mancozeb, thereby giving dual contact and systemic activity against Phycomycetes diseases, late blight of potato and tomato, downy mildew of grapes and vegetables and Pythium spp. It also controls nonphycomycetes leaf spot diseases like Alternaria and Mycosphaerella.', '19', 'Available', 'lokesh@gmail.com'),
(227, 'Nativo', '149', 'nativo.jpg', 'Fertilisers', 'Nativo is a new combination fungicide containing Tebuconazole and Trifloxystrobin. Nativo is a systemic broad-spectrum fungicide with protective and curative action which offers not only a disease control but also improves quality and yield of crop. In rice, it improves the yield quality by reducing incidence of dirty panicle in later crop stages. In tomato, Nativo protects foliage from early blight, enhances plant health and lays a strong platform for higher and quality yield. Timely application of Nativo has excellent efficacy for managing mango powdery mildew and anthracnose diseases, which leads to high and quality yield of mango. Nativo protects the flag leaf of wheat from yellow rust and powdery mildew and contributes to improving the yield and quality of grains.', '25', 'Available', 'lokesh@gmail.com'),
(228, 'Antracol', '145', 'antracol.png', 'Fertilisers', 'Antracol contains Propineb, a contact fungicide with broad spectrum activity against various diseases of rice, chilli, grapes, potato and other vegetables and fruits. Propineb is a polymeric zinc-containing dithiocarbamate. Due to the release of zinc, the application of Antracol results in greening effect on the crop and subsequent improvement in quality of produce.', '47', 'Available', 'lokesh@gmail.com'),
(229, 'G-sea power', '139', 'G_sea.png', 'Fertilisers', 'Seaweed (Ascophyllum nodosum): Acts as a growth promoter, Removes nutrient deficiencies. Effective soil conditioner. Based on seaweed (Ascophyllum nodosum) extract, this is a unique natural storehouse of organic matter based on vegetative origin seaweed for maximizing yield and better crop quality. USAGE DIRECTION DOSAGE: Broadcast 10kgs per acre. After use, irrigate the field to maintain the moisture level in soil.', '45', 'Available', 'lokesh@gmail.com'),
(230, 'Prime - All', '93', 'primeall.jpg', 'Fertilisers', '•	Prime – All is specially useful for healthy vegetative growth of young seedling and growing plants. •	Prime - All supply required macro nutrients (N, P, K) together in optimum dose to crops. •	Prime - All is free flowing, fine crystalline powder which dissolves speedily and completely in water to form spray solution.  Recommendations : •	Foliar Spray Application: 1.5-2gm / Lit of water            Drip –Soil Application : 250-400 gm / Acre Composition	Guaranteed (% w/w) Nitrogen (as N) from protein	10 % min P (as P2O5) from protein	10 % min K(as K2O) from protein	10% min Protein content (on dry basis)	62.5% min Color & Form	It is clear brown colored powder', '37', 'Available', 'lokesh@gmail.com'),
(231, 'F-Enhancer', '75', 'f_enhancer.jpg', 'Fertilisers', 'Crop Fruit and Flower Enhancer                                                               (100 % Water Soluble product)           F-Enhancer Benefits : •	F-Enhancer maintains uniform growth and shape of new developing fruits for best quality and production •	F-Enhancer Reduces cracking of fruit during harvesting and helps to prevent mix crop deficiencies in different forms occurred gradually at different growth stages of crops •	F-Enhancer improves shelf life of fruit and flower.       Recommendations :      Foliar Spray Application : 2-3gm / Lit of water      Drip –Soil Application : 1- 2 Kg / AcreCrop Fruit and Flower Enhancer                                                               (100 % Water Soluble product)           F-Enhancer Benefits : •	F-Enhancer maintains uniform growth and shape of new developing fruits for best quality and production •	F-Enhancer Reduces cracking of fruit during harvesting and helps to prevent mix crop deficiencies in different forms occurred gradually at different growth stages of crops •	F-Enhancer improves shelf life of fruit and flower.       Recommendations :      Foliar Spray Application : 2-3gm / Lit of water      Drip –Soil Application : 1- 2 Kg / Acre', '50', 'Available', 'lokesh@gmail.com'),
(233, 'Barrix Nutriclik', '126', 'barrix.jpeg', 'Fertilisers', 'Nutriclik is an Micro nutrient fertilizer which will help crops for normal growth and to complete their life cycle, your crops require 16 nutrients. Of them, six are micro nutrients and they are an essential part of nutrition. Termed ‘micro’ due to the small amounts required by the plant, their lack often play a ‘major’ role and result in visible crop loss.   How to use this product 1.  Dissolve 0.3 - 1 gram in 1 liter of water 2. Spray 2-3 times thoroughly on both surfaces of leaves', '30', 'Available', 'lokesh@gmail.com'),
(238, 'CHERRY TOMATO Seed  (25 per packet)', '169', 'tomato.jpeg', 'Fertilisers', 'There are all kinds of tomatoes to try ? from the tiniest cherry types that are favorites with children, through to full-flavored giant beefsteak tomatoes. And tomatoes come in all kinds of colours too ? red, of course, but also green and orange, even purple tomatoes or striped tomatoes. Tomato plants can be cordon varieties that need staking and tying in, bush varieties, and there are even tomato plants designed to grow in hanging baskets.', '52', 'Available', 'lokesh@gmail.com'),
(239, 'BOTTLE GOURD Seed  (25 per packet)', '191', 'bottle_guard.jpeg', 'Seeds', 'Bottle Gourd, also known as Calabash, opo squash, long melon and white-flowered gourd is called by different names in South Asia such as Lauki, dhoodhi and ghiya. With the least amount of calories per serving, intake of bottle gourd can help with weight-reduction/control programs. An excellent source of the antioxidant Vitamin C, it helps the body get rid of free radicals and prevent the formation of cancer cells. It also packs in Vitamin B3, B5, B6, calcium, zinc, potassium, and magnesium. A water-rich vegetable, it keeps the body hydrated and cool and reduces internal heat. Effective for people suffering from Tuberculosis and those looking to boost immunity. Bottle gourd is widely used as an ingredient in stews, soups, curd, curries and even as a sweet dish. It is also consumed as a juice by many as a popular remedy for epilepsy and nervous disorders.', '50', 'Available', 'lokesh@gmail.com'),
(240, 'SNAKE GOURD Seed  (50 per packet)', '151', 'snake_guard.jpeg', 'Seeds', 'Snake Gourd Long vegetable seeds Seed Quantity ? 10 Seeds. It is a vine plant that climbs up with any support and then unfurls its flowers and fruits to hang down to the ground. They are native to Southeast Asia, including Myanmar, India, Indonesia, Sri Lanka, and other neighboring countries, as well as some parts of Australia and Africa. Snake gourd improves the strength of the immune system, reduce fevers, detoxify the body, improve the digestive processes of the body, increase hydration in the body, treat diabetes, boost the strength and quality of the hair, and aid in weight loss.', '35', 'Available', 'lokesh@gmail.com'),
(241, 'BITTER GOURD Seed  (50 per packet)', '159', 'bitter_guard.jpeg', 'Seeds', 'You might not like the taste of it, but you can never ignore its nutritional benefits. Bitter gourd is a package of precious nutrients such as Vitamin B1, B2, and B3, C, magnesium, folate, zinc, phosphorus, manganese, and dietary fiber. It has a unique insulin-like compound called polypeptide-P, which makes it an excellent remedy for diabetes. It is also effective in treating blood disorders, cholera, and a host of other ailments. However, chances are high that the bitter gourd that you eat have been treated with chemical fertilizers and pesticides, making it harmful for your body in the long run. That?s why, we advise you to grow your own bitter gourd at home. You can easily grow them in your terrace or backyard garden. All you need is to facilitate for the growth of the climbers. Planting Guide: Bitter gourd requires a warm climate for optimum yield. In hilly areas, the best time to sow bitter gourd seeds is during the early days of summer. You can sow these bitter gourd seeds in your terrace garden or backyard garden. If you?re sowing in a pot or planter box, sow them at a depth of 1/2 ? and provide a spacing of 12? between plants and 12? between rows. The seeds germinate quickly, usually within 5 to 10 days. The harvesting should be done when the fruits are young and tender. Disclaimer 1. Germination depends on suitable climate, suitable temperature, preparation of soil. We have no control over those. 2. Product color and shape can slightly vary than image shown.', '29', 'Available', 'lokesh@gmail.com'),
(245, 'ONION Seed  (25 per packet)', '159', 'onions.jpeg', 'Seeds', 'Prepare Soil Mixed With Organic Manure Or Compost Before Sowing The Seeds*After All Frost And Check Soil Is Clean From Any Weed Or Insect*Open The Seed Packet On A White Sheet Of Paper As While Opening The Seeds Might Fall, Which Are Not Visible To Naked Eyes*After Preparing The Soil, Sprinkle The Seeds Over The Soil Cover The Seeds With Little Soil Or Press With Gentle Hand*While Watering, Care Needs To Be Taken To Only Sprinkling Water Through A Sprinkler Or Manually Using Your Hands*Do Not Use Pipe Or A Mug To Water For The First Week, As The Force Of Water Might Damage The Seed Germination Process*Germination May Take Place 10-18 Days, Depending Upon Different Varieties*For Herbs/Small Seeds Variety Special Care Needs To Be Taken Cover The Sowing Area With Transparent Polythene In Evening For Fast Germination*All Flowers, Tomatoes, Chilli, Peppers, Brinjal Etc All Needs To Be Transplant Once The Plant Is 3-4 Inch*All Varieties Require Very Less Water, And Need Sunlight Min 2-3 Hours Daily For Winter Variety 1-2 Hours Sun Is Fine For Germination Process*Happy Gardening*Team Seedscare-Rama Beej Bhandar', '58', 'Available', 'ravifkh@gmail.com'),
(246, 'RADISH Seed  (25 per packet)', '123', 'radish_seeds.jpeg', 'Seeds', 'Radish comes in a wide range of colour variants, such as white, red, and purple, and are a common ingredient in dishes around the globe. They are great to eat raw, and go perfectly with salads. Radish is also commonly used in various traditional Indian curries. Radishes being a lot juicy, also possess a great deal of health benefits, particularly in preventing jaundice, piles, urinary disorder, and cardiovascular deficiencies. Usually, the leaves, roots, and flowers of radish are consumed, and are found to act as a powerful detoxifier for your body. Planting Guide: Radish seeds can be sown outdoors. Sow the seeds directly into the soil or planting medium such as Purna Mitti. For radish seeds germination, it requires a constant temperature of 55 to 75 degree fahrenheit. Radishes also require a good amount of sunlight for optimal growth. They usually germinate between 3 - 5 days time and are ready to harvest between 25 - 35 days time. If you have any doubts regarding the seeds or any aspect of planting them, just email us. You can also mail us. Remember to provide ample number of images to substantiate your issues.', '45', 'Available', 'lokesh@gmail.com'),
(252, 'Coriander Seed  (700 per packet)', '161', 'coriander_seeds.jpeg', 'Seeds', 'General Brand	•	Durga Seeds Model Name	•	FKCOK08 Quantity	•	700 per packet Common Name	•	Coriander Suitable For	•	Outdoor Type of Seed	•	Vegetable Organic	•	No', '23', 'Available', 'lokesh@gmail.com'),
(253, '22.	Mahabeera Seeds (500 per packet)', '99', 'mahabeer_seeds.jpeg', 'Seeds', 'General Brand	•	PMW Model Name	•	mahabeera 500 g Quantity	•	1 per packet Common Name	•	Mahabeera Seeds (500 per packet) Suitable For	•	Indoor Type of Seed	•	Vegetable Organic	•	No', '199', 'Available', 'lokesh@gmail.com'),
(254, 'DOLICHOS Seed  (25 per packet)', '179', 'dolichos_seeds.jpeg', 'Seeds', 'Prepare Soil Mixed With Organic Manure Or Compost Before Sowing The Seeds*After All Frost And Check Soil Is Clean From Any Weed Or Insect*Open The Seed Packet On A White Sheet Of Paper As While Opening The Seeds Might Fall, Which Are Not Visible To Naked Eyes*After Preparing The Soil, Sprinkle The Seeds Over The Soil Cover The Seeds With Little Soil Or Press With Gentle Hand*While Watering, Care Needs To Be Taken To Only Sprinkling Water Through A Sprinkler Or Manually Using Your Hands*Do Not Use Pipe Or A Mug To Water For The First Week, As The Force Of Water Might Damage The Seed Germination Process*Germination May Take Place 10-18 Days, Depending Upon Different Varieties*For Herbs/Small Seeds Variety Special Care Needs To Be Taken Cover The Sowing Area With Transparent Polythene In Evening For Fast Germination*All Flowers, Tomatoes, Chilli, Peppers, Brinjal Etc All Needs To Be Transplant Once The Plant Is 3-4 Inch*All Varieties Require Very Less Water, And Need Sunlight Min 2-3 Hours Daily For Winter Variety 1-2 Hours Sun Is Fine For Germination Process*Happy Gardening*Team Seedscare-Rama Beej Bhandar', '24', 'Available', 'lokesh@gmail.com'),
(256, 'Jeera - Whole  (100 g)', '100', 'jeera.jpeg', 'Spices', 'General Brand	•	Catch Type	•	Jeera Form Factor	•	Whole Quantity	•	100 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Common Name	•	Jeera, Seeragam, Jeeragam, Jilakara Ready Masala	•	No', '60', 'Available', 'lokesh@gmail.com'),
(257, 'Fresh Guntur Chilli Stemless  (100 g)', '157', 'chillies.jpeg', 'Spices', 'General Brand	•	Origo Fresh Type	•	Red Chilli Form Factor	•	Whole Quantity	•	100 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	3 Months Organic	•	No Ready Masala	•	No', '50', 'Available', 'lokesh@gmail.com'),
(258, 'Black Pepper (Kali Mirch)  (50 g)', '100', 'black_pepper.jpeg', 'Spices', 'General Brand	•	Flipkart Supermart Select Type	•	Black Pepper (Kali Mirch) Form Factor	•	Whole Quantity	•	50 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	4 Months Organic	•	No Ready Masala	•	No', '39', 'Available', 'lokesh@gmail.com'),
(259, 'Tamarind Seedless  (500 g)', '125', 'tamarind_seedless.jpeg', 'Spices', 'General Brand	•	Safe Harvest Type	•	Tamarind Seedless Form Factor	•	Whole Quantity	•	500 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	10 Months Organic	•	No Common Name	•	Imali, Imli, Tamarind, Chintapandu, Unishehannu, Unisehannu, Chinch, Puli Ready Masala	•	No', '55', 'Available', 'lokesh@gmail.com'),
(260, 'Coriander (Dhania Seeds)  (100 g)', '159', 'corriander.jpeg', 'Spices', 'General Brand	•	Flipkart Supermart Select Type	•	Coriander Form Factor	•	Whole Quantity	•	100 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	4 Months Organic	•	No Ready Masala	•	No', '10', 'Available', 'lokesh@gmail.com'),
(261, 'Sounf  (50 g)', '120', 'sounf.jpeg', 'Spices', 'General Brand	•	JK Type	•	Sounf Form Factor	•	Whole Quantity	•	50 g Container Type	•	Pouch Dietary Preference	•	No Cholesterol, No Trans Fat Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Common Name	•	Saunf, Fennel Seed, Sompu pudi, Sompu pudi, Somp, sompum Ready Masala	•	No', '20', 'Available', 'lokesh@gmail.com'),
(262, 'Organic Cinnamon Bark  (50 g)', '129', 'cinnamon.jpeg', 'Spices', 'General Brand	•	Pro Nature Type	•	Cinnamon Bark Form Factor	•	Whole Quantity	•	50 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	9 Months Organic	•	Yes Common Name	•	Dalchinni, Cinnamon, Dalcina Chakka, Chekke, Pattai Ready Masala	•	No', '53', 'Available', 'ravifkh@gmail.com'),
(263, 'Cardamom  (50 g)', '157', 'cardamom.jpeg', 'Spices', 'General Brand	•	JK Type	•	Cardamom Form Factor	•	Whole Quantity	•	50 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Common Name	•	ilaayachee, Cardamom, yelakkullu, Elakki, yelakki, Veldoda Ready Masala	•	No', '22', 'Available', 'lokesh@gmail.com'),
(264, 'Methi  (100 g)', '122', 'methi.jpeg', 'Spices', 'General Brand	•	JK Type	•	Methi Form Factor	•	Whole Quantity	•	100 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Common Name	•	Menthulu, Mentulu, Vendhayam, Mentya, Menthya Ready Masala	•	No', '47', 'Available', 'lokesh@gmail.com'),
(265, 'Star Anise  (50 g)', '199', 'star_anise.jpeg', 'Spices', 'General Brand	•	JK Type	•	Star Anise Form Factor	•	Whole Quantity	•	50 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Ready Masala	•	No', '19', 'Available', 'lokesh@gmail.com'),
(266, 'Organic Cumin Whole  (100 g)', '130', 'cumin_whole.jpeg', 'Spices', 'General Brand	•	Pro Nature Type	•	Cumin Form Factor	•	Whole Quantity	•	100 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	9 Months Organic	•	Yes Ready Masala	•	No', '24', 'Available', 'lokesh@gmail.com'),
(267, 'Organic Cloves  (50 g)', '129', 'cloves.jpeg', 'Spices', 'General Brand	•	24 Mantra Organic Type	•	Cloves Form Factor	•	Whole Quantity	•	50 g Container Type	•	Pouch Dietary Preference	•	No MSG Gourmet	•	Yes Is Perishable	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	Yes Common Name	•	Laung, Clove, Lavangam, Lavanga, Lavang Ready Masala	•	No', '47', 'Available', 'lokesh@gmail.com'),
(268, 'Dry Ginger (Adarakh)  (100 g)', '199', 'dry_ginger.jpeg', 'Spices', 'General Brand	•	Flipkart Supermart Select Type	•	Dry Ginger Form Factor	•	Whole Quantity	•	100 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	6 Months Organic	•	No Ready Masala	•	No', '45', 'Available', 'lokesh@gmail.com'),
(269, 'Elaychi  (20 g)', '149', 'elaychi.jpeg', 'Spices', 'General Brand	•	Satyam Type	•	Elaychi Form Factor	•	Whole Quantity	•	20 g Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Ready Masala	•	No', '33', 'Available', 'lokesh@gmail.com'),
(271, 'Cinnamon Sticks  (250)', '159', 'cinnamon.jpeg', 'Spices', 'General Brand	•	Wonderland Type	•	Dalchini Form Factor	•	Whole Quantity	•	250 Container Type	•	Pouch Gourmet	•	No Added Preservatives	•	No Maximum Shelf Life	•	12 Months Organic	•	No Cuisine	•	Indian Ingredients	•	Dalchini Ready Masala	•	No', '35', 'Available', 'lokesh@gmail.com'),
(273, 'Ajwain  (1 kg)', '149', 'ajwain.jpeg', 'Spices', 'General Brand	•	FARMUP Type	•	FAR61 Form Factor	•	Whole Quantity	•	1 kg Container Type	•	Pouch Gourmet	•	Yes Added Preservatives	•	No Maximum Shelf Life	•	6 Months Organic	•	No Cuisine	•	Indian Common Name	•	Ajwain ajmo spices taste ajwain seeds natural taste spices indian seeds farmup tasty masala masala powder Manufactured By	•	FARMUP Ready Masala	•	No', '50', 'Available', 'lokesh@gmail.com'),
(278, 'Californian Almonds  (100 g)', '150', 'californian almonds.jpeg', 'Dry Fruits', 'General Brand	•	Happilo Quantity	•	100 g Type	•	Almonds Variant	•	Raw Container Type	•	Pouch Model Name	•	100% Natural Premium Californian Combo	•	No Maximum Shelf Life	•	9 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '55', 'Available', 'ravifkh@gmail.com'),
(279, 'Lion Dates', '110', 'lion_dates.jpeg', 'Dry Fruits', 'Brand	•	Lion Quantity	•	500 g Type	•	Dates Variant	•	Plain Container Type	•	Pouch Model Name	•	NA Combo	•	Yes Maximum Shelf Life	•	6 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '60', 'Available', 'lokesh@gmail.com'),
(280, 'Fresh Split Cashews  ', '100', 'origo_cashews.jpeg', 'Dry Fruits', 'Brand	•	Origo Fresh Quantity	•	100 g Type	•	Cashews Variant	•	Plain Container Type	•	Pouch Model Name	•	Split Combo	•	No Maximum Shelf Life	•	3 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '55', 'Available', 'lokesh@gmail.com'),
(281, 'Indian Raisins  ', '120', 'indian_raisins.jpeg', 'Dry Fruits', 'Raisins are small dry fruits that pack more than their size. They are concentrated with carbohydrates, vitamins, iron, potassium and more. Raisins are excellent sources of key nutrients and energy which help improve your overall health.', '60', 'Available', 'lokesh@gmail.com'),
(282, 'Happilo Premium International Healthy Nutmix  ', '100', 'nutmix.jpeg', 'Dry Fruits', 'Brand	•	Happilo Quantity	•	35 g Type	•	Assorted Fruits & Nuts Variant	•	Plain Container Type	•	Pouch Model Name	•	Premium International Healthy Nutmix Combo	•	No Maximum Shelf Life	•	9 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '44', 'Available', 'lokesh@gmail.com'),
(284, '24 Mantra Organic Flax Seeds  ', '130', '24_mantra_organic.jpeg', 'Dry Fruits', 'Brand	•	24 Mantra Organic Type	•	Brown Flax Seeds Quantity	•	200 g Form Factor	•	Whole Variant	•	Raw Container Type	•	Pouch Maximum Shelf Life	•	12 Months Organic	•	Yes Model Name	•	Flax Seeds', '55', 'Available', 'lokesh@gmail.com'),
(285, 'Apis Arabian Pearls Premium Fard Dates  ', '130', 'apis_arabian_pearls.jpeg', 'Dry Fruits', 'Brand	•	Apis Quantity	•	250 g Type	•	Dates Variant	•	Plain Container Type	•	Pouch Model Name	•	Arabian Pearls Premium Fard Combo	•	No Maximum Shelf Life	•	18 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '50', 'Available', 'lokesh@gmail.com'),
(286, 'Organic Holy Basil (Sabja) ', '140', 'basil_seeds.jpeg', 'Dry Fruits', 'Brand	•	Happilo Type	•	Basil Seeds Quantity	•	250 g Form Factor	•	Whole Variant	•	Raw Container Type	•	Pouch Dietary Preference	•	Gluten Free Maximum Shelf Life	•	12 Months Organic	•	Yes Common Name	•	Basil Seeds Health Benefits	•	Good for Healthy Living, Contains a lot of Vitamins, Minerals and is a natural source of Protien and Anti oxidants. Time to be Happy, Lovely & Heathy with Happilo. 0% guilt 100% indulgence', '50', 'Available', 'lokesh@gmail.com'),
(287, 'Lion Mixed Fruit Jam ', '110', 'lion_mixed_fruit.jpeg', 'Dry Fruits', 'Brand	•	Lion || Model Name	•	Mixed Fruit Jam || Quantity	•	250 g || Type	•	Mixed Fruit Jam || Container Type	•	Glass Bottle || Maximum Shelf Life	•	12 Months || Organic	•	No || Food Preference	•	Vegetarian || Storage Instructions	•	Store in Cool and Dry Place ||', '50', 'Available', 'lokesh@gmail.com'),
(288, 'Dried and Pitted Premium Californian ', '140', 'dried_and_pitted.jpeg', 'Dry Fruits', 'Brand	•	Happilo Quantity	•	200 g Type	•	Prunes Variant	•	Plain Container Type	•	Pouch Model Name	•	Dried and Pitted Premium Californian Combo	•	No Maximum Shelf Life	•	18 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '60', 'Available', 'lokesh@gmail.com'),
(289, 'Premium International Supermix Berries  ', '115', 'premium_international_supermix.jpeg', 'Dry Fruits', 'Brand	•	Happilo Quantity	•	35 g Type	•	Assorted Fruits & Nuts Variant	•	Plain Container Type	•	Pouch Model Name	•	Premium International Supermix Berries Combo	•	No Maximum Shelf Life	•	9 Months Organic	•	No Added Preservatives	•	No Gift Pack	•	No', '50', 'Available', 'lokesh@gmail.com'),
(290, 'Rechargeable Emergency Light  (Green)', '200', '24_ENERGY_Solar.jpeg', 'Solar', 'A Product by Aaris Enterprises, Start with some solar Emergency ligh for Walkway, driveway, and other outdoor lighting needs. 4 hours of Day Sunlight Charging could keep it running for 4 to 8 hours, High quality warm LEDs for wide lighting area? Elegant Patent design with Aluminum case and Waterproof IP65.100% solar powered, This Light is mainly powered by 24 ENERGY, so you don’t worry about your electricity bills. The Solar LED light of this device works on solar power, as it is equipped with an integrated solar panel. Portable and comfortable handle and strap, makes it highly durable and safe to carry.Dual-modes charging DC Power and solar Power.', '50', 'Available', 'lokesh@gmail.com'),
(293, 'Hi-Bright LED Rechargeable Solar Emergency Light  ', '200', '24_ENERGY_10W.jpeg', 'Solar', '•	Power Consumption: 10 W •	6 hrs Charging Time, 4 hrs Back-up Time •	Battery Capacity: 1000 mAh •	Power Source: Solar, Rechargeable', '50', 'Available', 'lokesh@gmail.com'),
(294, '5.	DP.LED JH-5800T Emergency Light', '210', 'dp_led.jpeg', 'Solar', '•	Power Consumption: 7 W •	3 hrs Charging Time, 7 hrs Back-up Time •	Battery Capacity: 2500 mAh •	Wall Mountable •	Power Source: Solar, Rechargeable', '50', 'Available', 'lokesh@gmail.com'),
(295, 'Concepta Solar Light Set  ', '180', 'concepta.jpeg', 'Solar', 'Brand	•	Concepta Model Number	•	20LED Set Contents	•	Solar Panel Suitable For	•	Indoor, Outdoor Mount Type	•	Wall Mounted Automatic Charging	•	Yes Automatic Switch On	•	Yes Material	•	Plastic LED Lifetime	•	50000 hr Weather Proof	•	Yes Motion Sensor Present	•	Yes', '50', 'Available', 'lokesh@gmail.com'),
(296, 'LED Flashlight Torch tactical light', '190', 'impex.jpeg', 'Solar', '•	Power Consumption: 4.2 W •	5 hrs Charging Time, 10 hrs Back-up Time •	Battery Capacity: 18650 mAh •	Wall Mountable •	Power Source: Solar, Rechargeable', '50', 'Available', 'lokesh@gmail.com'),
(297, 'Royaldeals Rd-Lantern 5800 Emergency Light  ', '185', 'royaldeals.jpeg', 'Solar', '•  Power Consumption: 220 W •  2 hrs Charging Time, 4 Back-up Time •  Battery Capacity: 1200 mAh •  Wall Mountable •  Power Source: Solar, Rechargeable', '50', 'Available', 'lokesh@gmail.com'),
(300, 'Gardena Dirty Water Pump ', '200', 'gardena_dirty_water.jpg', 'Sprays', 'The new GARDENA Classic Dirty Water Submersible Pump 7000/D can be used if, for example, the garden pond requires emptying or the construction pit is filled with rainwater. Water containing dirt particles with a diameter of up to 25 millimetres can easily be conveyed by the pump, at up to 7000 litres per hour. ', '50', 'Available', 'lokesh@gmail.com'),
(301, 'Gloria CleanMaster PF50', '230', 'gloria_clean_master.jpg', 'Sprays', 'The Gloria pressure sprayer is a special powerful high-pressure sprayer for spraying all Gloria approved acid and alkaline detergents. Suitable for spraying fluid substances, including many acid and alkaline cleaning products.', '60', 'Available', 'lokesh@gmail.com'),
(302, 'Gloria Prima 5 sprayer', '150', 'gloria_prima.jpg', 'Sprays', '•	Maximum Working pressure 3 bar •	Capacity: 5 litres •	Plastic tank with filler funnel •	Very ergonomic squeeze spray valve •	Brass spray lance •	High efficiency pump •	Pressure gauge with integrated venting/safety valve •	Adjustable spray pattern •	Shoulder strapContent check through transparent strip', '60', 'Available', 'lokesh@gmail.com'),
(303, 'Gloria Pressure cleaner 505T', '130', 'gloria_pressure_cleaner.jpg', 'Sprays', '•	A very high level of corrosion resistance •	Very resistant to wear and tear •	Safe to use •	Container volume: 5 litres •	Maximum working pressure: 6 bar', '60', 'Available', 'ravifkh@gmail.com'),
(304, 'hand pressure backpack sprayer', '140', 'solo_425.jpg', 'Sprays', '•	Practical and comfortable to use •	Backpack model for professional use •	Sprays when the lever is pressed •	Bottle holds 15 litres •	Transparent hose', '60', 'Available', 'lokesh@gmail.com'),
(305, 'Hobby 1200 preparation sprayer', '135', 'hobby_1200.jpg', 'Sprays', '•	Capacity: 12 litres •	Ergonomic plastic tank •	Softgrip squeeze spray valve and manometer •	Brass spray lance with a hollow cone spray pattern •	High efficiency pump •	Spray lance holder on the pump handle •	Adjustable carrying strap set with shoulder pads •	Filler cap sieve', '60', 'Available', 'lokesh@gmail.com'),
(306, 'Bottle Spray Gun for Water Pesticide ', '140', 'shop93.jpeg', 'Sprays', 'The spray can be connected with any normal size plastic beverage bottle and mineral water bottle, very convinentto use in garden and nursery suitable for pesticide spraying and water spraying for plants or bonsai. adjust the nozzle by lossen and tighten it to achive the best atomization efect you want. smalland light , easy to carry material plastic.', '40', 'Available', 'lokesh@gmail.com'),
(308, 'Nylonflex Glove', '120', 'nylonflex.jpg', 'Protective Wears', '•	Fitted with a nitrile coating •	Not porous •	Excellent grip in wet conditions •	Seamless, so perfect wearing comfort with excellent wear resistance •	Open back keeps the hands cool •	Available in sizes 7 to 10 •	Per pair', '60', 'Available', 'lokesh@gmail.com'),
(309, 'Neoprene Glove', '100', 'neoprene_glove.jpg', 'Protective Wears', '•	Length 30 cm •	Fitted with a diamond profile for a good grip •	Suitable for working with chemicals •	Per pair •	Available in sizes M to XXL', '60', 'Available', 'lokesh@gmail.com'),
(310, 'Glove cut resistant nitrile coated', '110', 'glove_cut_resistant.jpg', 'Protective Wears', '•	Fine fit •	Good grip •	Cut resistant •	Seamless •	Flexible collar •	Per pair', '60', 'Available', 'lokesh@gmail.com'),
(311, 'Glove Streetworker', '80', 'glove_streetworker.jpg', 'Protective Wears', '•	Cotton lining •	Rubber coat •	Rough palm for extra grip •	Breathable back •	Flexible •	Fixed grip •	Seamless •	Washable •	Due to the high absorption of perspiration, there is less •	chance of skin irritation ', '50', 'Available', 'lokesh@gmail.com'),
(312, 'Chemically coated nitrile glove', '100', 'chemically_coated.jpg', 'Protective Wears', '•	Acid and alkali resistant •	Wet and dry application •	Anti-slip •	Flocked inner-lining •	Per pair', '60', 'Available', 'lokesh@gmail.com'),
(313, 'Disposable plastic overcoat', '150', 'disposable_plastic_overcoat.jpg', 'Protective Wears', 'Plastic overcoat to wear over the regular clothes in order to protect these against dirt and for hygienic reasons. Ideal for visitors.', '50', 'Available', 'lokesh@gmail.com'),
(314, 'Havep Jacket attitude navy', '140', 'havep_jacket_attitude.jpg', 'Protective Wears', '•	Very good fit •	Super strong work clothing of the highest quality •	Breathable, wind- and waterproof •	Reflective accents for a better visibility •	Work safely in cold environments', '50', 'Available', 'lokesh@gmail.com'),
(315, '3M SecureFit Safety Glasses', '140', '3m_secure_fit.jpg', 'Protective Wears', '•	Safety glasses with 3M Pressure Diffusion Temple Technology for a comfortable fit  •	Wrap around design to improve the security of fit and prevent slipping  •	Get added comfort over the ears with padded temple touchpoints  •	Offers excellent protection against Ultraviolet (UV) radiation  •	Anti-scratch/anti-fog', '60', 'Available', 'lokesh@gmail.com'),
(316, 'Amblers FS98 Safety Wellingtons', '135', 'amblers_safety.jpg', 'Protective Wears', '•	White safety wellingtons  •	Unisex  •	Steel toe cap tested to 200 joule impact  •	Slip resistant (SRA)  •	Ribbing on the upper for added protection  •	Anti-static  •	Waterproof  •	Resistant to minerals, vegetable oils and fats, disinfectants and low concentration chemicals', '60', 'Available', 'lokesh@gmail.com'),
(317, 'Disposable Overboots', '130', 'disposable_overboots.gif', 'Protective Wears', '•	Full length  •	Wellington overboots  •	Plastic polythene  •	Elastic tops  •	25 pairs in a pack', '50', 'Available', 'ravifkh@gmail.com'),
(318, 'Purofort Plus Wellington Safety', '120', 'purofort_plus.jpg', 'Protective Wears', '•	Lightweight  •	Steel toe cap  •	100% waterproof  •	Steel mid-sole  •	Tear resistant  •	Polyurethane constructed  •	Cleated out-sole  •	Anatomically shaped footbed', '60', 'Available', 'lokesh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_vendor`
--

CREATE TABLE `product_vendor` (
  `vendor_id` int(6) NOT NULL,
  `vendor_first_name` varchar(100) NOT NULL,
  `vendor_last_name` varchar(100) NOT NULL,
  `vendor_address` text NOT NULL,
  `vendor_postcode` varchar(50) NOT NULL,
  `vendor_email` varchar(100) NOT NULL,
  `vendor_password` varchar(200) DEFAULT NULL,
  `vendor_image` varchar(2000) DEFAULT NULL,
  `vendor_status` varchar(200) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_vendor`
--

INSERT INTO `product_vendor` (`vendor_id`, `vendor_first_name`, `vendor_last_name`, `vendor_address`, `vendor_postcode`, `vendor_email`, `vendor_password`, `vendor_image`, `vendor_status`) VALUES
(27, 'Lokesh', 'Kumar', '63 Ullswater', 'LE27DU', 'lokesh@gmail.com', '12345', 'AOLD5465.JPG', 'Active'),
(29, 'Ravi', 'Bikkavolu', '177 hinckley', 'LE2 OTF', 'ravifkh@gmail.com', '12345', 'IMG_1791.jpg', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_categories`
--
ALTER TABLE `all_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Entry`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_vendor`
--
ALTER TABLE `product_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_categories`
--
ALTER TABLE `all_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Entry` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customer_cart`
--
ALTER TABLE `customer_cart`
  MODIFY `cart_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `product_vendor`
--
ALTER TABLE `product_vendor`
  MODIFY `vendor_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
