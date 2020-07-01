/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.37-MariaDB : Database - inet_olshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inet_olshop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inet_olshop`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`) values 
(1,'admin','0192023a7bbd73250516f069df18b500');

/*Table structure for table `bank_transfer` */

DROP TABLE IF EXISTS `bank_transfer`;

CREATE TABLE `bank_transfer` (
  `id_bank` int(255) NOT NULL AUTO_INCREMENT,
  `no_rek` varchar(11) DEFAULT NULL,
  `nama_bank` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `bank_transfer` */

insert  into `bank_transfer`(`id_bank`,`no_rek`,`nama_bank`) values 
(1,'9972','Mandiri'),
(2,'8878','BNI'),
(3,'6789','BRI');

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(255) NOT NULL AUTO_INCREMENT,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(20) DEFAULT NULL,
  `stok_brg` int(11) DEFAULT NULL,
  `harga_brg` int(11) DEFAULT NULL,
  `deskripsi` longtext,
  `foto` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_barang`,`kode_brg`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`kode_brg`,`nama_brg`,`stok_brg`,`harga_brg`,`deskripsi`,`foto`,`id_kategori`,`tanggal_update`) values 
(1,'001','TP-Link Arcer A6',999,500000,'<ul><li>Supports 802.11ac standard</li><li>Simultaneous 2.4GHz 300 Mbps and 5GHz 867 Mbps connections for 1200 Mbps of total available bandwidth</li><li>4 external antennas and one internal antenna provide stable wireless connections and optimal coverage</li><li>Easy network management at your fingertips with TP-Link&nbsp;Tether</li><li>MU-MIMO achieves 2X efficiency by communicating with up to 2&nbsp;devices at once</li><li>Beamforming technology delivers wider wireless coverage</li><li>Supports Access Point mode to create a new Wi-Fi access point</li></ul>','6fcbb06a22793ea3e80bd136932253c8.jpg',9,'2020-05-05 05:52:07'),
(2,'002','TP-Link Archer C9',999,700000,'<ul><li>Mendukung 802.11ac standar-generasi Wi-Fi berikutnya</li><li>Koneksi simultan antara 2.4GHz 600Mbps dan 5GHz 1300Mbps dengan total&nbsp;<em>bandwidth</em>&nbsp;yang tersedia sebesar 1.9Gbps</li><li>3 antena&nbsp;<em>dual band</em>&nbsp;yang dapat dilepas menyediakan cakupan nirkabel yang luas&nbsp;dan dapat dihandalkan</li><li>Teknologi&nbsp;<em>beamforming</em>&nbsp;memberikan koneksi nirkabel yang sangat efisien</li><li>Prosesor dual-core 1GHz memastikan tidak ada gangguan saat bersamaan dalam memproses beberapa tugas nirkabel atau kabel</li><li>Port USB 3.0 + USB 2.0&nbsp;- berbagi&nbsp;printer lokal,&nbsp;file &amp; Media dengan perangkat jaringan atau jarak jauh melalui internet dengan mudah</li></ul>','d813c40a0b0e5af7a951e1dd30730f00.jpg',9,'2020-04-21 06:54:03'),
(3,'003','TP-Link CPE510',999,500000,'<ul><li>Built-in 13dBi 2x2 dual-polarized directional MIMO antenna</li><li>Adjustable transmission power from 0 to 23dBm/200mw</li><li>System-level optimizations for more than 15km long range wireless transmission</li><li>TP-LINK Pharos MAXtream TDMA (Time-Division-Multiple-Access) technology improves product performance in throughput, capacity and latency performance, ideal for PTMP applications</li><li>Centralized Management System &ndash; Pharos Control</li><li>AP / Client&nbsp; / AP Router / AP Client Router (WISP) operation modes</li><li>Passive PoE Adapter supports up to 60 meter (200 feet) Power over Ethernet deployment and allows the device to be reset remotely</li></ul>','ca4a53020ad5451af8a94b66d5efd47d.jpg',10,'2020-04-21 06:55:11'),
(4,'004','TP-Link TL-SG1008MP',999,300000,'<ul><li>8&nbsp;10/100/1000Mbps RJ45 ports</li><li>Equipped with 8 PoE+ supported ports to transfer data and power over a single cable</li><li>Works with IEEE 802.3af/at compliant devices, expanding home and office networks</li><li>Innovative energy-efficient technology reduces power consumption by up to 75%*</li><li>Supports PoE+ standard with total power budget of 126W and up to 30W per port</li><li>Plug and play design, no configuration required</li></ul>','a282f6cac17b6dbdbc6fcbd6e19529b2.jpg',6,'2020-04-21 06:56:25'),
(5,'005','TP-Link TL-WR840N',999,250000,'<ul><li>300Mbps wireless transmission rate ideal for both bandwidth sensitive tasks and basic work&nbsp;</li><li>Supports Access Point mode to create a new Wi-Fi access point</li><li>Supports Range Extender mode to boost the existing wireless coverage in your room</li><li>Parental Controls manage when and how connected devices can access the internet</li><li>IPTV supports IGMP Proxy/Snooping, Bridge and Tag VLAN to optimize IPTV streaming</li><li>compatible with IPv6 (Internet Protocol version 6)</li><li>Guest Network provides separate access for guests while securing the home network</li></ul>','70c76426d2bbaa0cf93d104ccb299989.jpg',9,'2020-04-21 06:57:27'),
(6,'007','Tenda A18',999,230000,'<p>A18 is an AC1200 dual-band WiFi repeater dedicated for two-storey houses, villas, and multi-room houses with an area over 120 square meters. It offers up to 300 Mbps data rate on 11n band and 867 Mbps data rate on 11ac band. With two external omni-directional antennas, A18 can provide larger WiFi coverage, as well as extreme fast data rate, satisfying applications such as playback of 1080P HD videos, massively multiplayer online games, and high-speed download. With the upgrade Setup Wizard, it only takes you three steps to configure your repeater, which is easy to use. A18 also works better with other brands&#39; WiFi router available on the market. For whole home WiFi coverage, A18 is your best choice.</p>','7a1213d0462159430bb41f13b1de5a05.jpg',7,'2020-04-21 07:05:18'),
(7,'008','Tenda N301',999,200000,'<p>Router N301 Wireless N300 Easy Setup dirancang untuk lebih mudah diatur untuk pengguna rumahan. Router ini sesuai dengan IEEE802.11n, memberikan kecepatan wireless hingga 300 Mbps, membuatnya sempurna untuk aktivitas web harian seperti email, streaming video, online gaming dan sebagainya. N301 juga dapat bekerja sebagai router klien untuk menyambungkan jaringan ISP tanpa kabel atau uplink AP untuk membagi internet ke setiap sudut, menghilangkan blank spot</p>','4c4edb97da34a632db9cb0dfbbdbf409.jpg',9,'2020-04-21 07:06:08'),
(8,'009','Tenda TEF1226P',999,300000,'<p>TEF1226P-24-410W is a smart PoE switch independently designed by Tenda. Featured with 24 IEEE 802.3at/af-compliant RJ45 ports, it supplies a maximum PoE power output of 370 W. The switch can supply power when transmitting data with APs, IP cameras, and IP phones through CAT5 cables . Featured smart management functions, including 250 m long distance power supply, 802.1Q VLAN, link aggregation, QoS and MAC address binding, it minimizes the difficulty and cost in networking deployment.</p>','ad673e6054444d9cb84c8d42249d6769.jpg',6,'2020-04-21 07:06:58'),
(9,'010','Tenda W18E',999,400000,'<p>W18E is designed to provide wireless network for small offi_x001f_ce, internet caf&eacute;, large house etc premise. It is compliant with 802.11a/n/ac standard and delivers wireless rate up to 1200Mbps. Features with external power amplier and 4 high gain antenna, it provide superior wireless coverage and high quanlity wifi connection expirence for mobile user. Adopt of 11ac dual band,airtime fairness,5G bandsteering etc wireless optimization technology to improve wireless user capacity and ensure high qualied Wi-Fi connection.</p>','cf9d669fc7b6204685f99b0aa6bf2365.jpg',9,'2020-04-21 07:07:50'),
(10,'011','Ubiquity Litebeam M5',999,600000,'<p>LiteBeam M5 adalah perangkat ultra-lightweight airMAX CPE dengan jangkauan hingga -+30km</p>','7d60759c9cfcec0a03b34aab295e8659.jpg',10,'2020-04-21 07:12:28'),
(11,'012','Ubiquity Unifi Switc',999,550000,'<ul><li>Manage Your Networks from a Single Control Plane</li><li>Intuitive and Robust Configuration, Control and Monitoring</li><li>Remote Firmware Upgrade</li><li>Users and Guests</li><li>Guest Portal/Hotspot Support</li><li>(24) Gigabit RJ45 Ports</li><li>(2) 1G SFP Ports</li><li>Managed by Unifi Controller</li></ul>','a4b8782f3063e22ea0231a852bf1a872.png',6,'2020-04-21 07:14:35'),
(12,'013','Mikrotik Hex Lite',999,450000,'<p>hEX lite is a small five port ethernet router in a nice plastic case.<br /><br />Its price is lower than the RouterOS license alone - there simply is no choice when it comes to managing your wired home network, the RB750r2 (hEX lite) has it all.<br /><br />Not only it&rsquo;s affordable, small, good looking and easy to use - It&rsquo;s probably the most affordable MPLS capable router on the market! No more compromise between price and features - RB750r2 has both. With its compact design and clean looks, it will fit perfectly into any SOHO environment.<br /><br />Box contains: hEX lite in a plastic case, power supply</p>','80791e74ad9fd369e4a49226a8dadaad.jpg',9,'2020-04-21 07:22:12'),
(13,'014','Mikrotik CRS112-8G-4',999,300000,'<p>Cloud Router Switch 112-8G-4S-IN is a &ldquo;small size low cost&rdquo; member of our CRS series. It comes with eight Gigabit Ethernet ports and four SFP cages.</p><p>Our CRS series combines the best features of a fully functional router and a Layer 3 switch, is powered by the familiar RouterOS.</p><p>All the specific Switch configuration options are available in a special Switch menu, but if you want, ports can be removed from the switch configuration, and used for routing purposes.</p>','ddce1c60a0d99d945ed3558fc94484df.jpg',6,'2020-05-05 05:51:53'),
(14,'015','Mikrotik LDF 5',999,500000,'<p>The LDF (Lite Dish Feed) is an outdoor wireless system with a built in antenna, meant to be installed on satellite offset dish antennas. The dish will act as a reflector, amplifying the signal.</p><p>This means you can use any available satellite TV dish with an offset mount to quickly deploy powerful long range wireless links. The offset mount is universal at 40mm diameter, and the LDF can easily be placed inside it. Since the LDF itself is a tiny little package, it makes shipping and deployment simple and low cost.</p><p>Using a dish of up to 100cm in diameter, it is possible to obtain antenna amplification of up to 33dBi. The device comes preinstalled with RouterOS and is ready to use.</p><p>&nbsp;</p><p>- LDF 5 US (USA) is factory locked for 5170-5250MHz and 5725-5835MHz frequencies. This lock can not be removed.</p><p>- LDF 5 (International) supports 5150MHz-5875MHz range (Specific frequency range can be limited by country regulations).</p>','8b2f4009ab89cdaf8da3d39543e02553.jpg',10,'2020-04-21 07:24:19'),
(15,'016','Mikrotik LHG  2',999,1025000,'<p>The Light Head Grid (LHG) is a compact and light 2.4 GHz 802.11b/g/n wireless device with an integrated dual polarization 18 dBi grid antenna at a revolutionary price. It is perfect for point to point links or for use as a CPE at longer distances and supports Nv2 TDMA protocol.</p><p>&nbsp;</p><p>The grid design ensures protection against wind, and the fact that the antenna element is built into the wireless unit means no loss on cables.</p>','11e27cbf84281f542209927433827849.jpg',10,'2020-04-21 07:25:06'),
(16,'017','TP-Link TL-WA860RE',999,350000,'<ul><li>Range Extender mode boosts wireless signal to previously unreachable or hard-to-wire areas flawlessly</li><li>Miniature size and wall-mounted design make it easy to deploy and move flexibly</li><li>Extra power socket making sure that no power outlet is going to waste</li><li>2 fixed external antennas provide excellent Wi-Fi coverage and reliability</li><li>Easily expand wireless coverage at a push of Range Extender button</li><li>Create a new Wi-Fi access point to enhance your wired network with Wi-Fi capability</li></ul>','74cf51646d28ccf945cc495c6f56ddba.jpg',7,'2020-04-21 07:28:31'),
(17,'018','Kabel Belden',999,1249999,'<ul><li>Belden Cable / Kabel UTP Cat5e Original 1 Roll = 305 Meter</li></ul>','531d7a1a556e732c57f0c229aad378bd.jpg',5,'2020-05-05 05:51:36'),
(18,'019','Kabel Vascolink',999,400000,'<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>','d61cd0e8795018ec183bfbeb0e91d05c.jpg',5,'2020-05-05 05:51:26'),
(19,'020','Crimper HT-568R',999,60000,'<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>','bb701d6947b6aa27da411d2703497837.jpg',5,'2020-05-05 05:51:13'),
(20,'021','Lan Tester JW-360',999,40000,'<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>','dd529428b0117cdc39dd0d6e91001246.jpg',5,'2020-04-21 07:36:50'),
(21,'022','Kepala RJ45',999,5000,'<p>Kepala untuk menghubungkan kabel LAN ke Port Lan</p>','9932943d78c3ddf71c8de20ad8daa9a9.jpg',5,'2020-04-21 07:38:23'),
(22,'023','TP-Link CPE610',999,500000,'<p>Long range wireless transmission</p>','5ff5702577c5ebb3b96053e8806751af.jpg',10,'2020-04-21 08:10:14'),
(23,'024','TP-Link Archer C58',999,450000,'<p>Cover blank spot in your house!</p>','82ebee2ee0c3ad65f0b23ccd39672702.jpg',9,'2020-04-21 08:11:25');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values 
(5,'Lain-lain'),
(6,'Switch'),
(7,'Repeater'),
(9,'Router'),
(10,'Access Point');

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) DEFAULT NULL,
  `id_barang` int(255) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `keranjang` */

insert  into `keranjang`(`id`,`id_user`,`id_barang`,`qty`) values 
(24,'078e5ede296e8325adea27524a169ab3',17,1),
(71,'b8590622bc76b01db61b2d19c584b015',19,8);

/*Table structure for table `kurir` */

DROP TABLE IF EXISTS `kurir`;

CREATE TABLE `kurir` (
  `id_kurir` int(255) NOT NULL AUTO_INCREMENT,
  `nama_kurir` varchar(20) DEFAULT NULL,
  `harga_kurir` int(11) DEFAULT NULL,
  `situs_kurir` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kurir`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `kurir` */

insert  into `kurir`(`id_kurir`,`nama_kurir`,`harga_kurir`,`situs_kurir`) values 
(29,'JNE',20000,'http://fb.com'),
(30,'SiCepat',13000,'http://track.sicepat.com');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_pembayaran` varchar(255) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `no_pesanan` varchar(50) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `dibuat_pembayaran` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`no_pembayaran`,`id_user`,`id_pesanan`,`id_bank`,`no_pesanan`,`total_harga`,`dibuat_pembayaran`,`expired`) values 
(1,'887884033693','USR115025',1,2,'INET7827052012',1430000,'2020-05-05 11:59:16','2020-05-07 00:00:00'),
(2,'997231466912','be54c5577f5ea31019b40038f77181de',2,1,'INET1573498710',620000,'2020-05-05 22:39:42','2020-05-07 00:00:00'),
(3,'887809402132','be54c5577f5ea31019b40038f77181de',3,2,'INET3193515152',120000,'2020-05-05 22:46:51','2020-05-07 00:00:00'),
(4,'887854333693','bf6e392cf8f6a74d852fd85287907629',4,2,'INET6933674462',1929999,'2020-05-06 05:41:15','2020-05-08 00:00:00'),
(5,'997279433693','bf6e392cf8f6a74d852fd85287907629',5,1,'INET9540856031',500000,'2020-05-06 05:42:30','2020-05-08 00:00:00'),
(6,'997200853693','bf6e392cf8f6a74d852fd85287907629',6,1,'INET1144993331',2512999,'2020-05-06 05:44:05','2020-05-08 00:00:00'),
(7,'887816443693','bf6e392cf8f6a74d852fd85287907629',7,2,'INET8387453624',60000,'2020-05-06 07:35:00','2020-05-08 00:00:00'),
(8,'997270543693','a0c7c9434154c0172bd4f79ba34e1e5d',8,1,'INET6142220724',3949999,'2020-05-07 19:51:54','2020-05-09 00:00:00'),
(9,'678974873691','a0c7c9434154c0172bd4f79ba34e1e5d',9,3,'INET7462571252',1262999,'2020-05-07 20:18:30','2020-05-09 00:00:00'),
(10,'887860773691','2335ce3ecb661e484d5424407ba452d3',10,2,'INET8482386404',80000,'2020-05-07 20:35:12','2020-05-09 00:00:00'),
(11,'887887233693','c4a14a3efba244963f61ab5b64cff816',11,2,'INET8640411642',3513000,'2020-05-08 06:48:16','2020-05-10 00:00:00'),
(12,'997243752333','c4a14a3efba244963f61ab5b64cff816',12,1,'INET8415169387',513000,'2020-05-08 07:31:08','2020-05-10 00:00:00'),
(13,'678906193693','5bd204b18d165c0ee59358ca992c203d',13,3,'INET8389313264',80000,'2020-05-08 08:04:33','2020-05-10 00:00:00'),
(14,'678929953693','5bd204b18d165c0ee59358ca992c203d',14,3,'INET3445524064',73000,'2020-05-08 08:05:06','2020-05-10 00:00:00'),
(15,'887827743693','63742f5080702369302c5c72317b1305',15,2,'INET7009258338',520000,'2020-05-08 08:34:18','2020-05-10 00:00:00'),
(16,'887853475809','63742f5080702369302c5c72317b1305',16,2,'INET3677843087',1762999,'2020-05-08 08:34:48','2020-05-10 00:00:00'),
(17,'887823723691','63742f5080702369302c5c72317b1305',17,2,'INET6590787620',1390000,'2020-05-08 08:35:36','2020-05-10 00:00:00'),
(18,'887857763691','b8590622bc76b01db61b2d19c584b015',18,2,'INET0867268462',880000,'2020-05-08 08:49:48','2020-05-10 00:00:00'),
(19,'678995383691','b8590622bc76b01db61b2d19c584b015',19,3,'INET1735657516',73000,'2020-05-08 08:55:02','2020-05-10 00:00:00'),
(20,'887894663693','899ccc5b1e6de52f20f9d3fd1f20e606',20,2,'INET9050394890',1040000,'2020-05-08 09:20:36','2020-05-10 00:00:00'),
(21,'887870273693','899ccc5b1e6de52f20f9d3fd1f20e606',21,2,'INET9249877901',1040000,'2020-05-08 09:23:00','2020-05-10 00:00:00');

/*Table structure for table `pembayaran_isi` */

DROP TABLE IF EXISTS `pembayaran_isi`;

CREATE TABLE `pembayaran_isi` (
  `id_pembayaran_isi` int(255) NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) DEFAULT NULL,
  `no_pembayaran` varchar(255) DEFAULT NULL,
  `no_pesanan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran_isi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_isi` */

insert  into `pembayaran_isi`(`id_pembayaran_isi`,`id_pembayaran`,`no_pembayaran`,`no_pesanan`) values 
(2,21,'887870273693','INET9249877901');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` int(255) NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(50) DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `id_kurir` int(11) DEFAULT NULL,
  `total_harga` int(20) DEFAULT NULL,
  `dibuat_pesanan` datetime DEFAULT NULL,
  `berakhir_pesanan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id_pesanan`,`no_pesanan`,`id_user`,`id_kurir`,`total_harga`,`dibuat_pesanan`,`berakhir_pesanan`) values 
(7,'INET8387453624','bf6e392cf8f6a74d852fd85287907629',29,60000,'2020-05-06 07:35:00','2020-05-08 07:35:00'),
(8,'INET6142220724','a0c7c9434154c0172bd4f79ba34e1e5d',29,3949999,'2020-05-07 19:51:54','2020-05-09 19:51:54'),
(9,'INET7462571252','a0c7c9434154c0172bd4f79ba34e1e5d',30,1262999,'2020-05-07 20:18:30','2020-05-09 20:18:30'),
(10,'INET8482386404','2335ce3ecb661e484d5424407ba452d3',29,80000,'2020-05-07 20:35:12','2020-05-09 20:35:12'),
(11,'INET8640411642','c4a14a3efba244963f61ab5b64cff816',30,3513000,'2020-05-08 06:48:16','2020-05-10 06:48:16'),
(12,'INET8415169387','c4a14a3efba244963f61ab5b64cff816',30,513000,'2020-05-08 07:31:08','2020-05-10 07:31:08'),
(13,'INET8389313264','5bd204b18d165c0ee59358ca992c203d',29,80000,'2020-05-08 08:04:33','2020-05-10 08:04:33'),
(14,'INET3445524064','5bd204b18d165c0ee59358ca992c203d',30,73000,'2020-05-08 08:05:06','2020-05-10 08:05:06'),
(15,'INET7009258338','63742f5080702369302c5c72317b1305',29,520000,'2020-05-08 08:34:18','2020-05-10 08:34:18'),
(16,'INET3677843087','63742f5080702369302c5c72317b1305',30,1762999,'2020-05-08 08:34:48','2020-05-10 08:34:48'),
(17,'INET6590787620','63742f5080702369302c5c72317b1305',29,1390000,'2020-05-08 08:35:36','2020-05-10 08:35:36'),
(18,'INET0867268462','b8590622bc76b01db61b2d19c584b015',29,880000,'2020-05-08 08:49:48','2020-05-10 08:49:48'),
(19,'INET1735657516','b8590622bc76b01db61b2d19c584b015',30,73000,'2020-05-08 08:55:02','2020-05-10 08:55:02'),
(20,'INET9050394890','899ccc5b1e6de52f20f9d3fd1f20e606',29,1040000,'2020-05-08 09:20:36','2020-05-10 09:20:36'),
(21,'INET9249877901','899ccc5b1e6de52f20f9d3fd1f20e606',29,1040000,'2020-05-08 09:23:00','2020-05-10 09:23:00');

/*Table structure for table `pesanan_isi` */

DROP TABLE IF EXISTS `pesanan_isi`;

CREATE TABLE `pesanan_isi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(50) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `id_barang` int(255) DEFAULT NULL,
  `kode_brg` varchar(20) DEFAULT NULL,
  `nama_brg` varchar(255) DEFAULT NULL,
  `deskripsi` longtext,
  `harga_brg` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  `nama_kurir` varchar(20) DEFAULT NULL,
  `harga_kurir` int(20) DEFAULT NULL,
  `situs_kurir` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan_isi` */

insert  into `pesanan_isi`(`id`,`no_pesanan`,`nama_user`,`id_barang`,`kode_brg`,`nama_brg`,`deskripsi`,`harga_brg`,`qty`,`nama_kategori`,`nama_kurir`,`harga_kurir`,`situs_kurir`,`foto`) values 
(1,'INET7827052012','Banu Triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(2,'INET7827052012','Banu Triyantoko',16,'017','TP-Link TL-WA860RE','<ul><li>Range Extender mode boosts wireless signal to previously unreachable or hard-to-wire areas flawlessly</li><li>Miniature size and wall-mounted design make it easy to deploy and move flexibly</li><li>Extra power socket making sure that no power outlet is going to waste</li><li>2 fixed external antennas provide excellent Wi-Fi coverage and reliability</li><li>Easily expand wireless coverage at a push of Range Extender button</li><li>Create a new Wi-Fi access point to enhance your wired network with Wi-Fi capability</li></ul>',350000,1,'Repeater','JNE',20000,'http://fb.com','74cf51646d28ccf945cc495c6f56ddba.jpg'),
(3,'INET7827052012','Banu Triyantoko',4,'004','TP-Link TL-SG1008MP','<ul><li>8&nbsp;10/100/1000Mbps RJ45 ports</li><li>Equipped with 8 PoE+ supported ports to transfer data and power over a single cable</li><li>Works with IEEE 802.3af/at compliant devices, expanding home and office networks</li><li>Innovative energy-efficient technology reduces power consumption by up to 75%*</li><li>Supports PoE+ standard with total power budget of 126W and up to 30W per port</li><li>Plug and play design, no configuration required</li></ul>',300000,1,'Switch','JNE',20000,'http://fb.com','a282f6cac17b6dbdbc6fcbd6e19529b2.jpg'),
(4,'INET7827052012','Banu Triyantoko',2,'002','TP-Link Archer C9','<ul><li>Mendukung 802.11ac standar-generasi Wi-Fi berikutnya</li><li>Koneksi simultan antara 2.4GHz 600Mbps dan 5GHz 1300Mbps dengan total&nbsp;<em>bandwidth</em>&nbsp;yang tersedia sebesar 1.9Gbps</li><li>3 antena&nbsp;<em>dual band</em>&nbsp;yang dapat dilepas menyediakan cakupan nirkabel yang luas&nbsp;dan dapat dihandalkan</li><li>Teknologi&nbsp;<em>beamforming</em>&nbsp;memberikan koneksi nirkabel yang sangat efisien</li><li>Prosesor dual-core 1GHz memastikan tidak ada gangguan saat bersamaan dalam memproses beberapa tugas nirkabel atau kabel</li><li>Port USB 3.0 + USB 2.0&nbsp;- berbagi&nbsp;printer lokal,&nbsp;file &amp; Media dengan perangkat jaringan atau jarak jauh melalui internet dengan mudah</li></ul>',700000,1,'Router','JNE',20000,'http://fb.com','d813c40a0b0e5af7a951e1dd30730f00.jpg'),
(5,'INET1573498710','Banu Badboy',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(6,'INET1573498710','Banu Badboy',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,5,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(7,'INET3193515152','Haha hihi',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(8,'INET3193515152','Haha hihi',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(9,'INET6933674462','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(10,'INET6933674462','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(11,'INET6933674462','banu triyantoko',17,'018','Kabel Belden','<ul><li>Belden Cable / Kabel UTP Cat5e Original 1 Roll = 305 Meter</li></ul>',1249999,1,'Lain-lain','JNE',20000,'http://fb.com','531d7a1a556e732c57f0c229aad378bd.jpg'),
(12,'INET6933674462','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,5,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(13,'INET9540856031','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(14,'INET9540856031','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(15,'INET9540856031','banu triyantoko',21,'022','Kepala RJ45','<p>Kepala untuk menghubungkan kabel LAN ke Port Lan</p>',5000,4,'Lain-lain','JNE',20000,'http://fb.com','9932943d78c3ddf71c8de20ad8daa9a9.jpg'),
(16,'INET1144993331','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(17,'INET1144993331','banu triyantoko',17,'018','Kabel Belden','<ul><li>Belden Cable / Kabel UTP Cat5e Original 1 Roll = 305 Meter</li></ul>',1249999,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','531d7a1a556e732c57f0c229aad378bd.jpg'),
(18,'INET1144993331','banu triyantoko',8,'009','Tenda TEF1226P','<p>TEF1226P-24-410W is a smart PoE switch independently designed by Tenda. Featured with 24 IEEE 802.3at/af-compliant RJ45 ports, it supplies a maximum PoE power output of 370 W. The switch can supply power when transmitting data with APs, IP cameras, and IP phones through CAT5 cables . Featured smart management functions, including 250 m long distance power supply, 802.1Q VLAN, link aggregation, QoS and MAC address binding, it minimizes the difficulty and cost in networking deployment.</p>',300000,1,'Switch','SiCepat',13000,'http://track.sicepat.com','ad673e6054444d9cb84c8d42249d6769.jpg'),
(19,'INET1144993331','banu triyantoko',11,'012','Ubiquity Unifi Switc','<ul><li>Manage Your Networks from a Single Control Plane</li><li>Intuitive and Robust Configuration, Control and Monitoring</li><li>Remote Firmware Upgrade</li><li>Users and Guests</li><li>Guest Portal/Hotspot Support</li><li>(24) Gigabit RJ45 Ports</li><li>(2) 1G SFP Ports</li><li>Managed by Unifi Controller</li></ul>',550000,1,'Switch','SiCepat',13000,'http://track.sicepat.com','a4b8782f3063e22ea0231a852bf1a872.png'),
(20,'INET8387453624','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(21,'INET6142220724','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,3,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(22,'INET6142220724','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,4,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(23,'INET6142220724','banu triyantoko',17,'018','Kabel Belden','<ul><li>Belden Cable / Kabel UTP Cat5e Original 1 Roll = 305 Meter</li></ul>',1249999,1,'Lain-lain','JNE',20000,'http://fb.com','531d7a1a556e732c57f0c229aad378bd.jpg'),
(24,'INET6142220724','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(25,'INET6142220724','banu triyantoko',8,'009','Tenda TEF1226P','<p>TEF1226P-24-410W is a smart PoE switch independently designed by Tenda. Featured with 24 IEEE 802.3at/af-compliant RJ45 ports, it supplies a maximum PoE power output of 370 W. The switch can supply power when transmitting data with APs, IP cameras, and IP phones through CAT5 cables . Featured smart management functions, including 250 m long distance power supply, 802.1Q VLAN, link aggregation, QoS and MAC address binding, it minimizes the difficulty and cost in networking deployment.</p>',300000,3,'Switch','JNE',20000,'http://fb.com','ad673e6054444d9cb84c8d42249d6769.jpg'),
(26,'INET7462571252','banu bad boy',17,'018','Kabel Belden','<ul><li>Belden Cable / Kabel UTP Cat5e Original 1 Roll = 305 Meter</li></ul>',1249999,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','531d7a1a556e732c57f0c229aad378bd.jpg'),
(27,'INET8482386404','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(28,'INET8640411642','banu triyantoko',3,'003','TP-Link CPE510','<ul><li>Built-in 13dBi 2x2 dual-polarized directional MIMO antenna</li><li>Adjustable transmission power from 0 to 23dBm/200mw</li><li>System-level optimizations for more than 15km long range wireless transmission</li><li>TP-LINK Pharos MAXtream TDMA (Time-Division-Multiple-Access) technology improves product performance in throughput, capacity and latency performance, ideal for PTMP applications</li><li>Centralized Management System &ndash; Pharos Control</li><li>AP / Client&nbsp; / AP Router / AP Client Router (WISP) operation modes</li><li>Passive PoE Adapter supports up to 60 meter (200 feet) Power over Ethernet deployment and allows the device to be reset remotely</li></ul>',500000,7,'Access Point','SiCepat',13000,'http://track.sicepat.com','ca4a53020ad5451af8a94b66d5efd47d.jpg'),
(29,'INET8415169387','aasd',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(30,'INET8415169387','aasd',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','bb701d6947b6aa27da411d2703497837.jpg'),
(31,'INET8415169387','aasd',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(32,'INET8389313264','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(33,'INET3445524064','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','bb701d6947b6aa27da411d2703497837.jpg'),
(34,'INET7009258338','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(35,'INET7009258338','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(36,'INET7009258338','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(37,'INET3677843087','banu bad boy',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(38,'INET3677843087','banu bad boy',17,'018','Kabel Belden','<ul><li>Belden Cable / Kabel UTP Cat5e Original 1 Roll = 305 Meter</li></ul>',1249999,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','531d7a1a556e732c57f0c229aad378bd.jpg'),
(39,'INET3677843087','banu bad boy',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','bb701d6947b6aa27da411d2703497837.jpg'),
(40,'INET3677843087','banu bad boy',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(41,'INET6590787620','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(42,'INET6590787620','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,4,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(43,'INET6590787620','banu triyantoko',11,'012','Ubiquity Unifi Switc','<ul><li>Manage Your Networks from a Single Control Plane</li><li>Intuitive and Robust Configuration, Control and Monitoring</li><li>Remote Firmware Upgrade</li><li>Users and Guests</li><li>Guest Portal/Hotspot Support</li><li>(24) Gigabit RJ45 Ports</li><li>(2) 1G SFP Ports</li><li>Managed by Unifi Controller</li></ul>',550000,1,'Switch','JNE',20000,'http://fb.com','a4b8782f3063e22ea0231a852bf1a872.png'),
(44,'INET6590787620','banu triyantoko',8,'009','Tenda TEF1226P','<p>TEF1226P-24-410W is a smart PoE switch independently designed by Tenda. Featured with 24 IEEE 802.3at/af-compliant RJ45 ports, it supplies a maximum PoE power output of 370 W. The switch can supply power when transmitting data with APs, IP cameras, and IP phones through CAT5 cables . Featured smart management functions, including 250 m long distance power supply, 802.1Q VLAN, link aggregation, QoS and MAC address binding, it minimizes the difficulty and cost in networking deployment.</p>',300000,2,'Switch','JNE',20000,'http://fb.com','ad673e6054444d9cb84c8d42249d6769.jpg'),
(45,'INET0867268462','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(46,'INET0867268462','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,7,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(47,'INET0867268462','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,1,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg'),
(48,'INET1735657516','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,1,'Lain-lain','SiCepat',13000,'http://track.sicepat.com','bb701d6947b6aa27da411d2703497837.jpg'),
(49,'INET9249877901','banu triyantoko',20,'021','Lan Tester JW-360','<ul><li>Cable Tester for UTP STP RJ45 RJ11;</li><li>Automatic efficient scan for the miss wiring, disorder cable, open and short circuit; 3. TEL BNC test available(Adapter needed);</li><li>Remotely test cable up to 1000 ft in length ( remote kit included );</li><li>Protective power switch for low power consumption;</li><li>High quality protecive case provides more secure protection;</li><li>Judge continuity of the cables or wires;</li><li>Track the cables or wires, and diagnose the break point;</li><li>Receiver the tone signal on the cables or wires (telephone line);</li><li>Identify the state in the working telephone line (clear ring, busy); 11.Send a single solid tone or a dual alternating tone to the object cables or wires.</li></ul>',40000,1,'Lain-lain','JNE',20000,'http://fb.com','dd529428b0117cdc39dd0d6e91001246.jpg'),
(50,'INET9249877901','banu triyantoko',19,'020','Crimper HT-568R','<p>Suitable For Stripping &amp; Cutting for All kind of Cables Suitable for Crimp RJ45(8P8C) / RJ12(6P6C) / RJ11(6P4C) / 6P2C Network &amp; Telecom Connector Plugs Specially design with Laboursaving Ratch and Soft-Plastic Hand Shank.</p>',60000,3,'Lain-lain','JNE',20000,'http://fb.com','bb701d6947b6aa27da411d2703497837.jpg'),
(51,'INET9249877901','banu triyantoko',18,'019','Kabel Vascolink','<p>Vascolink Cable / Kabel UTP Cat5e Original 1 Roll = 100 Meter</p>',400000,2,'Lain-lain','JNE',20000,'http://fb.com','d61cd0e8795018ec183bfbeb0e91d05c.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`) values 
('USR115025');

/*Table structure for table `user_detail` */

DROP TABLE IF EXISTS `user_detail`;

CREATE TABLE `user_detail` (
  `id_detail_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) DEFAULT NULL,
  `no_hp_user` varchar(15) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `alamat_user` longtext,
  PRIMARY KEY (`id_detail_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `user_detail` */

insert  into `user_detail`(`id_detail_user`,`id_user`,`no_hp_user`,`nama_user`,`alamat_user`) values 
(1,'USR115025','081548143693','Banu Triyantoko','Jl. Mr. Wurjanto, Kp. Ngabean RT01 RW04, Gunungpati, Semarang, 50225'),
(2,'bf6e392cf8','081548143693','Banu triyantoko','Jl. mr. wurjanto gunungpati semarang 50225'),
(3,'bf6e392cf8f6a74d852fd85287907629','081548143693','Banu triyantoko','Jl. mr. wurjanto gunungpati semarang'),
(4,'bf6e392cf8f6a74d852fd85287907629','081548143693','Banu Triyantoko','Jl. Mr. Wurjanto Gunungpati Semarang 50225'),
(5,'bf6e392cf8f6a74d852fd85287907629','081548143693','Banu Triyantoko','Jl Jl Dimana Saja Aku Suka'),
(6,'a0c7c9434154c0172bd4f79ba34e1e5d','081548143693','Banu Triyantoko','Jl Mw Wurjanto No 23 Gunungpati Semarang'),
(7,'a0c7c9434154c0172bd4f79ba34e1e5d','081548143691','Banu Bad Boy','Jl Mr Wurjanto Watt'),
(8,'2335ce3ecb661e484d5424407ba452d3','081548143691','Banu Triyantoko','Jl Ewel Ewel Antah Berantah'),
(9,'c4a14a3efba244963f61ab5b64cff816','081548143693','Banu Triyantoko','J Ewel Welws Asdasd'),
(10,'c4a14a3efba244963f61ab5b64cff816','123112333','Aasd','Asdad'),
(11,'5bd204b18d165c0ee59358ca992c203d','081548143693','Banu Triyantoko','Okok'),
(12,'5bd204b18d165c0ee59358ca992c203d','081548143693','Banu Triyantoko','Sdasdas'),
(13,'63742f5080702369302c5c72317b1305','081548143691','Banu Triyantoko','Wosodkaosd'),
(14,'b8590622bc76b01db61b2d19c584b015','081548143691','Banu Triyantoko','Asdasdsdsad'),
(15,'899ccc5b1e6de52f20f9d3fd1f20e606','081548143693','Banu Triyantoko','Asdsadsad');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
