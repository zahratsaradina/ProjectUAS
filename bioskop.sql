-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 05:55 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`id_admin`, `user`, `pwd`) VALUES
(1, 'admin', 'passadmin'),
(2, 'adminZahra', 'passAdminZahra');

-- --------------------------------------------------------

--
-- Table structure for table `db_anggota`
--

CREATE TABLE `db_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tgllahir` date NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `konfirm_pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_anggota`
--

INSERT INTO `db_anggota` (`id_anggota`, `nama_lengkap`, `tgllahir`, `Username`, `Password`, `konfirm_pass`, `email`, `no_hp`, `alamat`) VALUES
(2, 'bubu', '1998-02-01', 'bubu', 'bubu', 'bubu', 'bubu@gmail.com', '08123495', 'Bandung'),
(4, 'arhaz', '1998-03-03', 'rara', 'rara', 'rara', 'arhaz@gmail.com', '08123134', 'Bandung'),
(5, 'arhaz', '1998-03-03', 'rara', 'rara', 'rara', 'arhaz@gmail.com', '08123134', 'Bandung'),
(6, 'tsaradina', '1997-09-12', 'tsrdn', '0505', '0505', 'tsaradina@gmail.com', '08122344', 'Bandung'),
(7, 'kaka', '1995-08-01', 'kk', 'passkk', 'passkk', 'kk@gmail.com', '08323239', 'Manisi'),
(8, 'bodat', '1997-01-07', 'datdat', 'password', 'password', 'dat@gmail.com', '0812334522', 'Medan'),
(9, 'rinca', '0000-00-00', 'rinca', 'rinca', 'rinca', 'rinca@gmail.com', '0823123434', 'Majalengka'),
(10, 'hehe', '1995-07-19', 'hehe', 'passhehe', 'passhehe', 'hehe@gmail.com', '0892356772', 'Jakarta'),
(13, 'Miko', '1994-07-28', 'miko', 'passmiko', 'passmiko', 'miko@gmail.com', '082326787', 'Cileunyi'),
(14, 'Kimi', '1999-02-01', 'kimi', 'passkimi', 'passkimi', 'kimi@gmail.com', '0812323892', 'Bandung'),
(15, 'Bagus Enggar Tiasto', '0000-00-00', 'enggar', 'enggar', 'enggar', 'enggar@uinsgd.ac.id', '082166263802', 'Jl. Kenanga raya no 62'),
(16, 'Tari Miftahul', '1997-08-06', 'tarimj', 'tari', 'tari', 'tarimj@gmail.com', '08127362378', 'Bekasi'),
(17, 'Zahra Tsaradina', '1998-02-01', 'zaher', 'zaher', 'zaher', 'ztsaradina@gmail.com', '0812327890', 'Bandung'),
(18, 'Zakiy M Luthfi', '2001-09-28', 'zakiy', 'zakiy', 'kuro', 'zakiluthi@gmail.com', '0812516739', 'Bandung'),
(19, 'deby', '1980-03-08', 'deby', 'passdeby', 'passdeby', 'deby@gmail.com', '081321734', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `judul`, `deskripsi`, `gambar`, `tanggal`) VALUES
(1, 'Galih & Ratna', 'Kisah tentang cinta pertama dua orang remaja SMA. Galih (Refal Hady) merupakan murid teladan yang sangat senang dengan musik tetapi belum pernah mengenal cinta. Sedangkan Ratna (Sheryl Sheinafia) menyukai hal-hal instan tetapi tidak memiliki tujuan hidup. Hubungan mereka menjadi kisah cinta yang manis dan juga pahit. Kisah cinta pertama yang akan selalu menjadi kenangan mereka dan tidak akan terlupakan.\r\n 	\r\nInfo film: Rilis 09 Maret 2017 dengan durasi 112 menit\r\nSutradara: Lucky Kuswandi\r\nProduser: -\r\nProduksi: 360 Synergy Production, Nant Entertainment\r\nDistributor: -\r\nGenre: Drama, Romance\r\nKelompok Umur: 13+', 'poster-galih-ratna.jpg', '2017-06-04 23:48:52'),
(4, 'La La Land', 'Di pusat kota Los Angeles seorang calon artis bernama Mia (Emma Stone) bertugas menyiapkan kopi kepada bintang film ketika audisi. Sementara itu Sebastian (Ryan Gosling) musisi Jazz bermain di sebuah bar kecil. Mereka berdua bertemu dan saling jatuh cinta, tetapi mereka bekerja keras untuk mengejar kesuksesan karir mereka yang mengakibatkan sulitnya mempertahankan hubungan mereka berdua.\r\n\r\n    Info film: Rilis 10 Januari 2017 dengan durasi 128 menit, http://www.lalaland.movie/\r\n    Sutradara: Damien Chazelle\r\n    Produser: Fred Berger, Gary Gilbert, Jordan Horowitz, Marc Platt\r\n    Produksi: Gilbert Films, Impostor Pictures, Marc Platt Productions\r\n    Distributor: Summit Entertainment\r\n    Genre: Comedy, Drama, Musical\r\n    Kelompok Umur: 13+', 'poster-lalaland.jpg', '2017-06-01 13:18:29'),
(5, 'The Boss Baby', 'Seseorang bernama Tim Templeton (Tobey Maguire) menceritakan kehidupannya ketika ia berumur 7 tahun. Ketika Tim berumur 7 tahun ia cemburu dengan adiknya yang pintar dan cepat berbicara yaitu Baby Boss (Alec Baldwin). Mereka tidak akur dan saling ingin merebut hati orangtua mereka. Tetapi suatu ketika ia menemukan sebuah rahasia tersembunyi dari Francis (Steve Buscemi) CEO dari Puppy Co. yang berencana untuk menghilangkan cinta dari seluruh dunia. Sekarang dua bersaudara tersebut harus bekerjasama untuk menyelamatkan orangtua mereka dan dunia.\r\n\r\n    Info film: Rilis 05 April 2017 dengan durasi 97 menit\r\n    Sutradara: Tom McGrath\r\n    Produser: Ramsey Ann Naito\r\n    Produksi: DreamWorks Animation\r\n    Distributor: 20th Century Fox\r\n    Genre: Animation, Children''s/Family, Comedy\r\n    Kelompok Umur: SU', 'poster-the-boss-baby.jpg', '2017-06-01 13:27:57'),
(6, 'Ballerina', 'Berlatar belakang di Perancis pada tahun 1879, ada seorang gadis yatim piatu bernama Felicie (Elle Fanning) yang bercita-cita untuk menjadi seorang ballerina. Pada suatu hari ia meninggalkan kampung halamannya dan pergi ke Paris untuk mengikuti kelas balet di Paris Opera. Akan tetapi, Felicie merasa bahwa kelas baletnya terlalu susah untuknya, bahkan ia pun mengalami kesulitan dalam mendapatkan teman baru. Dengan dukungan Odette, seorang penjaga misterius di Paris Opera dan sang penemu muda bernama Victor, Felicie mendapatkan kekuatan untuk bekerja keras dalam mewujudkan cita-citanya.\r\n\r\n    Info film: Rilis 20 Januari 2017 dengan durasi 90 menit\r\n    Sutradara: Eric Summer, Ric Warin\r\n    Produser: Valrie Dauteuil, Nicolas Duval, Andr Rouleau, Laurent Zeitoun, Yann Zenou\r\n    Produksi: Quad Productions, Caramel Film, Main Journey\r\n    Distributor: Entertainment One\r\n    Genre: Adventure, Animation, Children''s/Family\r\n    Kelompok Umur: SU', 'poster_ballerina.jpg', '2017-06-01 13:28:49'),
(7, 'Hacker', 'Setelah Ibunya kehilangan pekerjaan dan keluarganya mengalami krisis keuangan, Alex (Callan McAuliffe) yang merupakan Hacker asal Ukraina mulai masuk kedunia kejahatan. Dibantu oleh Sye (Daniel Eric Gold) ia dikenalkan oleh Kira (Lorraine Nicholson) yang merupakan hacker perempuan. Setelah mereka berhasil mengacaukan sistem perbankan dan membuat kekacauan, mereka mendapat perhatian dari Z, seorang bertopeng misterius yang merupakan kepala dari organisasi bernama Anonymous yang merupakan target nomor 1 FBI.\r\n\r\n    Info film: Rilis 20 Januari 2017 dengan durasi 95 menit\r\n    Sutradara: Akan Satayev\r\n    Produser: -\r\n    Produksi: Skylight Picture Works, Sataifilm, Brillstein Entertainment Partners\r\n    Distributor: -\r\n    Genre: Crime, Drama, Thriller\r\n    Kelompok Umur: 17+', 'poster-hacker.jpg', '2017-06-01 13:29:41'),
(8, 'The Space Between Us', 'Dalam petualangan antar planet ini, pesawat ruang angkasa memulai misi pertama untuk menduduki Mars, dimana setelah lepas landas mereka baru menyadari bahwa terdapat salah satu astronot yang hamil. Tak lama setelah mendarat, wanita tersebut meninggal akibat komplikasi saat melahirkan â€“ dan anak tersebut tidak pernah tahu siapa ayahnya. Jadi dimulailah kisah kehidupan yang luar biasa dari Gardner Elliot (Asa Butterfield) â€“ seorang anak yang sangat cerdas dan memiliki rasa ingin tahu yang tinggi, yang hingga memasuki usia 16 hanya bertemu 14 orang dalam asuhan yang sangat tidak lazim.\r\n\r\nSambil mencari petunjuk tentang ayahnya, dan planet asal yang dia tidak pernah dikenal, Gardner memulai persahabatan online dengan seorang gadis cerdas yang berasal dari Colorado bernama Tulsa (Britt Robertson). Ketika ia akhirnya mendapat kesempatan untuk pergi ke Bumi, dia ingin mengalami semua keajaiban di bumi yang hanya bisa dia baca di Mars â€“ dari yang paling sederhana sampai yang luar biasa. Tapi setelah eksplorasi nya mulai, para ilmuwan menyadari bahwa organ Gardner tidak dapat menahan atmosfer bumi.\r\n\r\nDibakar oleh semangat untuk menemukan ayahnya, Gardner melarikan diri dari tim ilmuwan dan bersama Tulsa berpacu dengan waktu mengungkap misteri asal-usulnya, dan dimana seharusnya dia tinggal.\r\n\r\n    Info film: Rilis 04 Februari 2017 dengan durasi 121 menit, https://web.facebook.com/spacebetweenus/\r\n    Sutradara: Peter Chelsom\r\n    Produser: Richard Barton Lewis\r\n    Produksi: Huayi Brothers Pictures, Los Angeles Media Fund, Southpaw Entertainment\r\n    Distributor: STX Entertainment\r\n    Genre: Adventure, Drama, Romance\r\n    Kelompok Umur: 13+', 'The-Space-Between-Us.jpg', '2017-06-01 13:30:47'),
(9, 'Beauty and The Beast', 'Seorang perempuan muda bernama Belle (Emma Watson) ditahan oleh Beast (Dan Stevens) di istananya. Meskipun ketakutan, Belle mencoba berteman dengan staff istana dan mencoba melihat Beast tidak dari sisi luarnya saja, tetapi dari hatinya juga jiwanya yang ternyata ia adalah seorang pangeran. Sementara itu seorang pemburu bernama Gaston (Luke Evans) ingin menyelamatkan Belle dan memburu Beast apapun taruhannya.\r\n\r\n    Info film: Rilis 17 Maret 2017 dengan durasi 129 menit\r\n    Sutradara: Bill Condon\r\n    Produser: David Hoberman, Todd Lieberman\r\n    Produksi: Walt Disney Pictures, Mandeville Films\r\n    Distributor: Walt Disney Studios Motion Pictures\r\n    Genre: Fantasy, Musical, Romance\r\n    Kelompok Umur: 13+', 'poster-beauty-and-the-beast-2.jpg', '2017-06-01 13:32:24'),
(10, 'Logan', 'Pada tahun 2024 populasi mutan telah turun secara drastis dan X-Men telah terpecah belah. Logan (Hugh Jackman) yang kemampuan menyembuhkan dirinya telah menurun sekarang menjadi pemabuk. Ia juga merawat dan melindungi Professor X (Patrick Stewart) yang sudah sangat tua. Suatu hari seorang wanita meminta tolong Logan untuk mengantar seorang anak perempuan bernama Laura (Dafne Keen) ke perbatasan Kanada. Logan menolak tetapi Professor X telah menunggu Laura untuk hadir.\r\n\r\nLaura memiliki kekuatan yang mirip dengan Wolverine, ia juga dikejar oleh orang-orang berkuasa karena DNA nya memiliki rahasia yang berhubungan dengan Logan.\r\n\r\n    Info film: Rilis 01 Maret 2017 dengan durasi 135 menit\r\n    Sutradara: James Mangold\r\n    Produser: Lauren Shuler Donner, Simon Kinberg, Hutch Parker\r\n    Produksi: Marvel Entertainment, TSG Entertainment, Seed Productions, The Donners'' Company\r\n    Distributor: 20th Century Fox\r\n    Genre: Action, Drama, Science Fiction\r\n    Kelompok Umur: 17+', 'poster-logan-1.jpg', '2017-06-01 13:33:12'),
(11, 'Critical Eleven', 'Anya (Adinia Wirasti) adalah Management Consultant lulusan Georgetown University sementara Ale (Reza Rahadian) merupakan anak seorang jendral yang menjadi insinyur perminyakan. Mereka bertemu pertama kali dalam pesawat dari Jakarta & Sidney. Tiga menit pertama mereka saling tertarik kemudian tujuh jam berikutnya mereka saling mengenal dan delapan menit sebelum berpisah Ale menginginkan Anya.\r\n\r\nSetelah mereka akhirnya menikah dan tepat 5 tahun setelah perkenalan mereka mengalami masalah besar dalam rumah tangga. Mereka akhirnya mengevaluasi 11 menit pertemuan pertama mereka yang membuat mereka menjadi seperti sekarang.\r\n\r\n    Info film: Rilis 10 Mei 2017 dengan durasi menit\r\n    Sutradara: Monty Tiwa\r\n    Produser: -\r\n    Produksi: Starvision, Legacy Pictures\r\n    Distributor: -\r\n    Genre: Drama, Romance\r\n    Kelompok Umur: 17+', 'poster-critical-eleven-1.jpg', '2017-06-01 13:34:08'),
(12, 'Alien: Covenant', 'Terdampar di sebuah planet terpencil di sisi yang jauh dari galaksi, awak Covenant, sebuah kapal koloni menemukan apa yang mereka yakini sebagai surga yang belum dipetakan. Apa yang mereka temukan adalah, dunia yang berbahaya dan gelap, yang mana salah satu penduduknya adalah â€œsintetikâ€, dia adalah David (Michael Fassbender), yang selamat dari ekspedisi Prometheus yang hancur.\r\n\r\n    Info film: Rilis 19 Mei 2017 dengan durasi menit\r\n    Sutradara: Ridley Scott\r\n    Produser: Ridley Scott, David Giler\r\n    Produksi: 20th Century Fox, Scott Free Productions\r\n    Distributor: 20th Century Fox\r\n    Genre: Horror\r\n    Kelompok Umur: 17+', 'poster-alien-covenant.jpg', '2017-06-04 08:20:16'),
(13, 'Trinity, The Nekad Traveller', 'Trinity (Maudy Ayunda) adalah wanita pekerja kantoran yang memang suka traveling sejak kecil. Tetapi ketika ia sudah bekerja, hobinya sering terbentur masalah uang dan jatah cuti dari kantornya, yang mengakibatkan ia sering diomeli oleh bossnya. Ia memiliki 2 sahabat yaitu Yasmin (Rachel Amanda) dan Nina (Anggika Bolsterli) serta sepupunya yaitu Ezra (Babe Cabiita) yang juga memiliki hobi traveling.\r\n\r\nOrangtuanya selalu menanyakan kapan Trinity memikirkan pernikahan, tetapi jawaban Trinity selalu kalau semua daftar (Bucket List) hal-hal yang harus ia lakukan sebelum tua terpenuhi yang sebagian besar isinya tentang jalan-jalan. Ia dilema antara fokus pekerjaannya atau mengejar keinginan ia yang sebenarnya yaitu jalan-jalan, hingga ia jatuh cinta dengan Paul (Hamish Daud) seorang fotografer yang juga hobi traveling.\r\n\r\n    Info film: Rilis 16 Maret 2017 dengan durasi 103 menit\r\n    Sutradara: Rizal Mantovani\r\n    Produser: Ronny Irawan, Agung Saputra\r\n    Produksi: Tujuh Bintang Sinema\r\n    Distributor: -\r\n    Genre: Adventure, Comedy, Drama\r\n    Kelompok Umur: 13+', 'poster-trinity.jpg', '2017-06-04 14:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kd_pesan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `seat_baris` varchar(2) NOT NULL,
  `seat_kolom` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`kd_pesan`, `id_anggota`, `nama_lengkap`, `tgl_pesan`, `judul`, `jam`, `seat_baris`, `seat_kolom`) VALUES
(1, 15, 'Bagus Enggar Tiasto', '2017-06-05', 'La La Land', '18.00 WIB', 'F', '17'),
(2, 15, 'Bagus Enggar Tiasto', '2017-06-27', 'Logan', '12.00 WIB', 'A', '1'),
(3, 15, 'Bagus Enggar Tiasto', '2017-06-06', 'Hacker', '18.00 WIB', 'A', '1'),
(4, 15, 'Bagus Enggar Tiasto', '2017-06-06', 'Ballerina', '20.00 WIB', 'L', '1'),
(6, 5, 'arhaz', '2017-06-07', 'Galih & Ratna', '18.00 WIB', 'B', '2'),
(10, 15, 'Bagus Enggar Tiasto', '2017-06-08', 'The Boss Baby', '12.00 WIB', 'D', '3'),
(11, 2, 'bubu', '2017-06-13', 'Beauty and The Beast', '12.00 WIB', 'F', '5'),
(12, 5, 'arhaz', '2017-06-06', 'Ballerina', '20.00 WIB', 'H', '17'),
(13, 16, 'Tari Miftahul', '2017-06-13', 'Ballerina', '20.00 WIB', 'H', '7'),
(14, 16, 'Tari Miftahul', '2017-06-20', 'The Space Between Us', '14.00 WIB', 'G', '16'),
(15, 17, 'Zahra Tsaradina', '2017-06-13', 'Trinity, The Nekad Traveller', '14.00 WIB', 'H', '9'),
(16, 18, 'Zakiy M Luthfi', '2017-06-15', 'Hacker', '14.00 WIB', 'H', '12'),
(17, 18, 'Zakiy M Luthfi', '2017-06-15', 'Hacker', '14.00 WIB', 'H', '12'),
(18, 19, 'deby', '2017-06-27', 'Critical Eleven', '14.00 WIB', 'C', '4');

-- --------------------------------------------------------

--
-- Table structure for table `rilis_film`
--

CREATE TABLE `rilis_film` (
  `id_film` int(11) NOT NULL,
  `bulan_rilis` varchar(50) NOT NULL,
  `judul_film` varchar(50) NOT NULL,
  `desc_film` text NOT NULL,
  `img_film` varchar(255) NOT NULL,
  `tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `db_anggota`
--
ALTER TABLE `db_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kd_pesan`);

--
-- Indexes for table `rilis_film`
--
ALTER TABLE `rilis_film`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `db_anggota`
--
ALTER TABLE `db_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `kd_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rilis_film`
--
ALTER TABLE `rilis_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
