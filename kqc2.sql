/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.28-MariaDB : Database - kqc2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kqc2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kqc2`;

/*Table structure for table `artikel` */

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul_artikel` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo_artikel` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_artikel` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `artikel` */

insert  into `artikel`(`id_artikel`,`username`,`judul_artikel`,`judul_seo_artikel`,`isi_artikel`,`hari`,`tanggal`,`jam`,`gambar`,`dibaca`,`tag`) values (1,'Admin','Doa Pemimpin','doa-pemimpin','<p>“Dan saudaraku Harun” Pinta Musa AS kepada Allah swt, saat beban kenabian ditaruh pada pundaknya, “maka utuslah dia bersamaku sebagai pembantuku untuk membenarkan (perkataan)ku; sesungguhnya aku khawatir mereka akan mendustakanku”</p>\r\n\r\n<p>Nabi Musa menyadari dirinya bukanlah seorang yang pandai berbicara. Sementara disisi yang lain Fir’aun, yang menjadi seterunya, memiliki segalanya. Harta berlimpah, kuasa tak tergoyah dan lidah yang pandai berdialektika.</p>\r\n\r\n<p>Allah pun mengabulkannya. Musa dan Harun berjalan beriringan di jalan dakwah. Keduanya harus memimpin kaum yang sukar ditata serta seorang raja yang sangat besar kuasanya. Kehadiran Harun melengkapi Tongkat Musa, salah satu mukjizat lainnya. Hingga akhirnya mereka berhasil memuncaki perdebatan dan pertarungan.</p>\r\n\r\n<p>Doa serupa juga pernah dipanjatkan oleh Rasulullah saw di awal-awal dakwahnya. Saat tekanan semakin berat dirasakan, dengan khusyu Rasulullah memanjat do’a, “Ya Allah, muliakanlah Islam dengan salah seorang dari dua orang yang lebih Engkau cintai; Umar bin Khattab atau Abu Jahal bin Hisyam”.</p>\r\n\r\n<p>Keduanya merupakan orang yang kuat dari kaum Quraisy. Rasulullah yakin jika salah satu berhasil masuk Islam maka ini akan menjadi syiar yang bagus sekaligus akan semakin menguatkan dakwah. Maka Umar bin Khattab lah yang dipilih Allah untuk menemani Muhammad saw. Sejak itu, atas ijin Allah tentunya, dakwah Islam semakin terbuka dan tak terbendung.</p>\r\n\r\n<p>Dua fragmen diatas memberi hikmah seorang pemimpin adalah orang yang mengerti dengan kekurangannya. Musa sadar ia bukanlah orang yang pandai bicara. Maka untuk menghadapi seorang fir’aun dibutuhkan orang yang juga hebat dalam dialektika. Begitu juga Muhammad saw, yang membutuhkan orang yang kuat untuk melengkapi kepingan puzzlenya.</p>\r\n\r\n<p>Pemimpin bukanlah orang yang digdaya dan bisa menepuk dada seenaknya. Pemimpin juga bukan orang yang serba bisa lalu merasa dirinya sendiri bisa menaklukkan dunia. Sebaliknya pemimpin adalah orang yang menyadari ketidakbisaannya lalu memilih orang yang tepat untuk melengkapi dirinya.</p>\r\n\r\n<p>Dari Rasulullah saw pula kita belajar tentang membaca karakter seseorang. Beliau pernah mendoakan Abdullah Ibnu Abbad, “Ya Allah, berilah ia kepahaman agama dan Al-Qur’an” kelak sejarah mencatat Abdullah Ibnu Abbas dikenal sebagai seorang ahli Hadis, ahli Tafsir, ahli Fikih. Ia menjadi tempat rujukan banyak orang bahkan para sahabat yang lebih tua darinya.</p>\r\n\r\n<p>Doa pemimpin adalah doa tentang kebaikan. Maka Allah swt pernah menegur Musa saat ia berkata, “Ana a`lam al-qaum” (Aku orang paling pandai di negeri ini). Sepintas apa yang dikatakan oleh Musa dapat dianggap wajar terlebih yang dihadapinya saat itu adalah Fir’aun yang dikenal digdaya dan penuh kuasa. Namun, Allah swt memandang pernyataan Musa berlebihan. Musa lalu ditegur dan mendapat pembelajaran lewat seorang Nabi Khidir. Tidak cukup sampai disitu Allah swt pun meluruskan Nabi Musa dengan mengajarkan doa yang penuh kebaikan, “Rabbi zidni `ilman”(Ya Allah tambahkan kepadaku ilmu pengetahuan).</p>\r\n\r\n<p>Begitulah, doa pemimpin adalah doa yang penuh kebaikan. Ia tidak mendahulukan ke-aku-an sebaliknya doa pemimpin adalah doa yang menggerakkan siapa yang dipimpinnya. Misinya adalah membawa kesuksesan kepada orang lain bukan dirinya.</p>\r\n\r\n<blockquote>\r\n<p>Sebagaimana pesan yang disampaikan oleh KH. Ahmad Jameel beberapa waktu lalu, “Kesuksesan kita adalah bagaimana membuat jalan kesuksesan bagi orang lain”</p>\r\n</blockquote>','Sabtu','2018-07-14','18:51:13','2780d44da9f34823e79600bacf364a87.jpg',0,'mobil,komputer'),(4,'Administrator','Doa Pemimpin 3','doa-pemimpin-3','<p>“Dan saudaraku Harun” Pinta Musa AS kepada Allah swt, saat beban kenabian ditaruh pada pundaknya, “maka utuslah dia bersamaku sebagai pembantuku untuk membenarkan (perkataan)ku; sesungguhnya aku khawatir mereka akan mendustakanku”</p>\r\n\r\n<p>Nabi Musa menyadari dirinya bukanlah seorang yang pandai berbicara. Sementara disisi yang lain Fir’aun, yang menjadi seterunya, memiliki segalanya. Harta berlimpah, kuasa tak tergoyah dan lidah yang pandai berdialektika.</p>\r\n\r\n<p>Allah pun mengabulkannya. Musa dan Harun berjalan beriringan di jalan dakwah. Keduanya harus memimpin kaum yang sukar ditata serta seorang raja yang sangat besar kuasanya. Kehadiran Harun melengkapi Tongkat Musa, salah satu mukjizat lainnya. Hingga akhirnya mereka berhasil memuncaki perdebatan dan pertarungan.</p>\r\n\r\n<p>Doa serupa juga pernah dipanjatkan oleh Rasulullah saw di awal-awal dakwahnya. Saat tekanan semakin berat dirasakan, dengan khusyu Rasulullah memanjat do’a, “Ya Allah, muliakanlah Islam dengan salah seorang dari dua orang yang lebih Engkau cintai; Umar bin Khattab atau Abu Jahal bin Hisyam”.</p>\r\n\r\n<p>Keduanya merupakan orang yang kuat dari kaum Quraisy. Rasulullah yakin jika salah satu berhasil masuk Islam maka ini akan menjadi syiar yang bagus sekaligus akan semakin menguatkan dakwah. Maka Umar bin Khattab lah yang dipilih Allah untuk menemani Muhammad saw. Sejak itu, atas ijin Allah tentunya, dakwah Islam semakin terbuka dan tak terbendung.</p>\r\n\r\n<p>Dua fragmen diatas memberi hikmah seorang pemimpin adalah orang yang mengerti dengan kekurangannya. Musa sadar ia bukanlah orang yang pandai bicara. Maka untuk menghadapi seorang fir’aun dibutuhkan orang yang juga hebat dalam dialektika. Begitu juga Muhammad saw, yang membutuhkan orang yang kuat untuk melengkapi kepingan puzzlenya.</p>\r\n\r\n<p>Pemimpin bukanlah orang yang digdaya dan bisa menepuk dada seenaknya. Pemimpin juga bukan orang yang serba bisa lalu merasa dirinya sendiri bisa menaklukkan dunia. Sebaliknya pemimpin adalah orang yang menyadari ketidakbisaannya lalu memilih orang yang tepat untuk melengkapi dirinya.</p>\r\n\r\n<p>Dari Rasulullah saw pula kita belajar tentang membaca karakter seseorang. Beliau pernah mendoakan Abdullah Ibnu Abbad, “Ya Allah, berilah ia kepahaman agama dan Al-Qur’an” kelak sejarah mencatat Abdullah Ibnu Abbas dikenal sebagai seorang ahli Hadis, ahli Tafsir, ahli Fikih. Ia menjadi tempat rujukan banyak orang bahkan para sahabat yang lebih tua darinya.</p>\r\n\r\n<p>Doa pemimpin adalah doa tentang kebaikan. Maka Allah swt pernah menegur Musa saat ia berkata, “Ana a`lam al-qaum” (Aku orang paling pandai di negeri ini). Sepintas apa yang dikatakan oleh Musa dapat dianggap wajar terlebih yang dihadapinya saat itu adalah Fir’aun yang dikenal digdaya dan penuh kuasa. Namun, Allah swt memandang pernyataan Musa berlebihan. Musa lalu ditegur dan mendapat pembelajaran lewat seorang Nabi Khidir. Tidak cukup sampai disitu Allah swt pun meluruskan Nabi Musa dengan mengajarkan doa yang penuh kebaikan, “Rabbi zidni `ilman”(Ya Allah tambahkan kepadaku ilmu pengetahuan).</p>\r\n\r\n<p>Begitulah, doa pemimpin adalah doa yang penuh kebaikan. Ia tidak mendahulukan ke-aku-an sebaliknya doa pemimpin adalah doa yang menggerakkan siapa yang dipimpinnya. Misinya adalah membawa kesuksesan kepada orang lain bukan dirinya.</p>\r\n\r\n<blockquote>\r\n<p>Sebagaimana pesan yang disampaikan oleh KH. Ahmad Jameel beberapa waktu lalu, “Kesuksesan kita adalah bagaimana membuat jalan kesuksesan bagi orang lain”</p>\r\n</blockquote>','Jumat','2018-08-17','14:05:36','33b6b2199ccc737caef1adddd5b41fdd.jpg',0,'mobil'),(6,'Administrator','Ini Tiga Kunci Cepat Belajar Alquran Selama 30 Menit','ini-tiga-kunci-cepat-belajar-alquran-selama-30-menit','<p>Ustaz Farid mengatakan, terdapat tiga kunci untuk lancar membaca Alquran dengan menggunakan metode tersebut. Pertama, seseorang itu harus menguasai huruf Alquran yang jumlahnya 30 huruf. Sementara, kunci yang kedua harus bisa menguasai tanda baca Alquran yang jumlahnya ada delapan tanda baca.</p>\r\n\r\n<p> </p>\r\n\r\n<p>\"Untuk bisa menguasai huruf dan tanda baca itu dibutuhkan waktu 30 menit. Setelah itu dilanjutkan dengan praktik,\" kata Ustaz Farid di Kantor Republika, Jakarta, Sabtu (24/2).</p>\r\n\r\n<p> </p>\r\n\r\n<p>Sementara, kunci yang ketiga, kata Ustaz Farid, dengan menguasai tajwid yang ada dalam Al-Quran. Dimana, untuk menguasai tajwid tersebut dapat dipraktekkan seiring dengan praktik yang dilakukan setelah kegiatan ini kedepannya.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"photo\" src=\"http://static.republika.co.id/uploads/images/headline_slide/0.68853300-1512814555-830-556.jpeg\"></p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<blockquote>Belajar Mengaji. Peserta sedang mengikuti kegiatan 30 Menit Bisa Membaca Alquran di Kantor Republika, Jalan Warung Buncit, Jakarta.</blockquote>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Namun untuk menguasai huruf Alquran tersebut dengan cepat, kata Ustaz Farid, juga ada beberapa teknik. Dimana, pertama dengan menyebut 30 huruf tersebut dengan nama latinnya. \"Contoh kalau huruf <em>alif</em> sama dengan A kalau latinnya, <em>hamzah</em> juga A, <em>Ain</em> juga A, jadi A ada tiga. Terus <em>dal, dho</em> itu disebut D semua. <em>Sin, Syin, Sod</em> itu S semua,\" kata Farid.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Karena dalam satu huruf latin terdapat beberapa huruf Alquran, maka teknik membedakannya dengan diberi ciri-ciri terhadap huruf tersebut. Teknik tersebut merupakan teknik kedua untuk dapat menguasai 30 huruf tersebut.</p>\r\n\r\n<p> </p>\r\n\r\n<p>\"Contohnya <em>alif</em> atau A, itu ciri-cirinya lurus. Contohnya huruf S kalau di Alquran, bertemu dengan huruf yang giginya tiga, itu pasti S. Dan semua huruf yanh 30 itu ada ciri-cirinya semua,\" tambahnya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Setelah melalui dua teknik tersebut, maka selanjutnya dengan mengajari bagaimana melafalkan huruf tersebut dengan benar, sesuai dengan tajwid. \"Kalau orang udah tahu ciri-ciri huruf, biasanya kuat ingatannya, kuat memorinya untuk menghafal hurif-huruf tadi. Dengan ciri-ciri itu seseorang menjadi ringan untuk menghafal huruf dan melafalkannya setelah itu,\" kata Ustaz Farid.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Baca Juga: <a href=\"http://www.republika.co.id/berita/dunia-islam/islam-nusantara/18/02/24/p4niug396-ngaji-30-menit-supaya-masyarakat-melek-huruf-alquran\" target=\"_blank\"><em>Ngaji</em> 30 Menit Supaya Masyarakat Melek Huruf Alquran</a></strong></p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Metode ini sendiri diciptakan, lanjut Ustaz Farid, ada latar belakangnya. Pertama karena selama berpuluh-puluh tahun umat Islam itu masih kesulitan dalam membaca Alquran. Sebab, belum ditemukan metode yang telat, mudah dan praktis untuk dipraktekkan.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Sementara, latarbelakang kedua, lanjutnya, muncul dan ditemukan karena berdasarkan pengalaman dari Ustaz Farid sendiri selama mengajar. Dimans, banyak umat Islam yang bisa membaca Alquran, namun bacaannya tidak benar dan tidak sesuai dengan tajwid.</p>\r\n\r\n<p> </p>\r\n\r\n<p>\"Dari pengalaman itu akhirnya ada inspirasi membuat metode yang lebih cepat lagi dari metode yang pernah ada. Setelah ketemu metode ini jadinya kita jadi mudah gak ada yang kesulitan. Hampir semua yang belajar menjadi mudah tidak ada kesulitan,\" tambahnya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Selama kegiatan berlangsung, peserta &#39;ngaji 30 menit&#39; yang kali ini merupakan angkatan ke-76, akan diberikan banyak praktek. Di antaranya praktik surat Al Hajj, Al-Fatihah, Al-Baqarah, Yasin dan surat pendek lainnya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Diharapkan dari kegiatan ini, kata Farid, dapat lebih rajin lagi dalam membaca Al-Quran. \"Karena membaca Alquran itu mudah tapi godaannya yang besar. Jadi biar lebih rajin lagi, kalau sudah rajin harapannya bisa khatam 30 juz, dan lebih banyak lagi mencintai Alquran dan mencintai isinya,\" tambahnya.</p>','Jumat','2018-08-17','14:03:54','1ab804d2a2e651d6ba28f8b4d45fa3f3.jpg',0,'komputer,google');

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul_berita` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo_berita` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `berita` */

insert  into `berita`(`id_berita`,`username`,`judul_berita`,`judul_seo_berita`,`isi_berita`,`hari`,`tanggal`,`jam`,`gambar`,`dibaca`,`tag`) values (1,'Administrator','Doa Pemimpin','doa-pemimpin','<p>“Dan saudaraku Harun” Pinta Musa AS kepada Allah swt, saat beban kenabian ditaruh pada pundaknya, “maka utuslah dia bersamaku sebagai pembantuku untuk membenarkan (perkataan)ku; sesungguhnya aku khawatir mereka akan mendustakanku”</p>\r\n\r\n<p>Nabi Musa menyadari dirinya bukanlah seorang yang pandai berbicara. Sementara disisi yang lain Fir’aun, yang menjadi seterunya, memiliki segalanya. Harta berlimpah, kuasa tak tergoyah dan lidah yang pandai berdialektika.</p>\r\n\r\n<p>Allah pun mengabulkannya. Musa dan Harun berjalan beriringan di jalan dakwah. Keduanya harus memimpin kaum yang sukar ditata serta seorang raja yang sangat besar kuasanya. Kehadiran Harun melengkapi Tongkat Musa, salah satu mukjizat lainnya. Hingga akhirnya mereka berhasil memuncaki perdebatan dan pertarungan.</p>\r\n\r\n<p>Doa serupa juga pernah dipanjatkan oleh Rasulullah saw di awal-awal dakwahnya. Saat tekanan semakin berat dirasakan, dengan khusyu Rasulullah memanjat do’a, “Ya Allah, muliakanlah Islam dengan salah seorang dari dua orang yang lebih Engkau cintai; Umar bin Khattab atau Abu Jahal bin Hisyam”.</p>\r\n\r\n<p>Keduanya merupakan orang yang kuat dari kaum Quraisy. Rasulullah yakin jika salah satu berhasil masuk Islam maka ini akan menjadi syiar yang bagus sekaligus akan semakin menguatkan dakwah. Maka Umar bin Khattab lah yang dipilih Allah untuk menemani Muhammad saw. Sejak itu, atas ijin Allah tentunya, dakwah Islam semakin terbuka dan tak terbendung.</p>\r\n\r\n<p>Dua fragmen diatas memberi hikmah seorang pemimpin adalah orang yang mengerti dengan kekurangannya. Musa sadar ia bukanlah orang yang pandai bicara. Maka untuk menghadapi seorang fir’aun dibutuhkan orang yang juga hebat dalam dialektika. Begitu juga Muhammad saw, yang membutuhkan orang yang kuat untuk melengkapi kepingan puzzlenya.</p>\r\n\r\n<p>Pemimpin bukanlah orang yang digdaya dan bisa menepuk dada seenaknya. Pemimpin juga bukan orang yang serba bisa lalu merasa dirinya sendiri bisa menaklukkan dunia. Sebaliknya pemimpin adalah orang yang menyadari ketidakbisaannya lalu memilih orang yang tepat untuk melengkapi dirinya.</p>\r\n\r\n<p>Dari Rasulullah saw pula kita belajar tentang membaca karakter seseorang. Beliau pernah mendoakan Abdullah Ibnu Abbad, “Ya Allah, berilah ia kepahaman agama dan Al-Qur’an” kelak sejarah mencatat Abdullah Ibnu Abbas dikenal sebagai seorang ahli Hadis, ahli Tafsir, ahli Fikih. Ia menjadi tempat rujukan banyak orang bahkan para sahabat yang lebih tua darinya.</p>\r\n\r\n<p>Doa pemimpin adalah doa tentang kebaikan. Maka Allah swt pernah menegur Musa saat ia berkata, “Ana a`lam al-qaum” (Aku orang paling pandai di negeri ini). Sepintas apa yang dikatakan oleh Musa dapat dianggap wajar terlebih yang dihadapinya saat itu adalah Fir’aun yang dikenal digdaya dan penuh kuasa. Namun, Allah swt memandang pernyataan Musa berlebihan. Musa lalu ditegur dan mendapat pembelajaran lewat seorang Nabi Khidir. Tidak cukup sampai disitu Allah swt pun meluruskan Nabi Musa dengan mengajarkan doa yang penuh kebaikan, “Rabbi zidni `ilman”(Ya Allah tambahkan kepadaku ilmu pengetahuan).</p>\r\n\r\n<p>Begitulah, doa pemimpin adalah doa yang penuh kebaikan. Ia tidak mendahulukan ke-aku-an sebaliknya doa pemimpin adalah doa yang menggerakkan siapa yang dipimpinnya. Misinya adalah membawa kesuksesan kepada orang lain bukan dirinya.</p>\r\n\r\n<blockquote>\r\n<p>Sebagaimana pesan yang disampaikan oleh KH. Ahmad Jameel beberapa waktu lalu, “Kesuksesan kita adalah bagaimana membuat jalan kesuksesan bagi orang lain”</p>\r\n</blockquote>','Senin','2018-07-30','15:01:13','a48a84d12006a5a80c7d76a09c94e542.jpg',0,'mobil,komputer'),(7,'Administrator','Ustaz Abdul Somad (UAS) Mendadak Curhat setelah Diundang Kerajaan Perak, Ini Maksudnya','ustaz-abdul-somad-uas-mendadak-curhat-setelah-diundang-kerajaan-perak-ini-maksudnya','<p>Namun UAS mengaku undangan ini membuatnya tergiur. </p>\r\n\r\n<p>Kenapa? </p>\r\n\r\n<p>Ternyata  UAS gerah dengan kasus pengadangan yang dialaminya di sejumlah daerah.</p>\r\n\r\n<p>Baru-baru ini UAS diadang di Semarang, Grobogan, dan pembatalan sepihak di Jepara.</p>\r\n\r\n<p>“Terkadang datang juga bisikan ingin ke Perak ini, berfoto-foto dengan Sultan,” tulisnya.</p>\r\n\r\n<p>Hal itu menurutnya, karena hanya ingin menunjukkan kepada mereka yang telah menghadangnya selama ini di beberapa wilayah.</p>\r\n\r\n<p>“Untuk menunjukkan ke mereka yang menghadang di Semarang, menghadang di Grobogan, membatalkan sepihak di Jepara,” tulisnya.</p>\r\n\r\n<p><br>\r\n<br>\r\nArtikel ini telah tayang di <a href=\"http:\">tribun-medan.com</a> dengan judul Ustaz Abdul Somad (UAS) Mendadak Curhat setelah Diundang Kerajaan Perak, Ini Maksudnya, <a href=\"http://medan.tribunnews.com/2018/08/17/ustaz-abdul-somad-uas-mendadak-curhat-setelah-diundang-kerajaan-perak-ini-maksudnya\">http://medan.tribunnews.com/2018/08/17/ustaz-abdul-somad-uas-mendadak-curhat-setelah-diundang-kerajaan-perak-ini-maksudnya</a>.<br>\r\n<br>\r\nEditor: Tariden Turnip</p>','Jumat','2018-08-17','13:39:01','1225e15a779004258ee5c1d199b60576.jpg',0,'film,komputer'),(8,'Administrator','Ini Tiga Kunci Cepat Belajar Alquran Selama 30 Menit','ini-tiga-kunci-cepat-belajar-alquran-selama-30-menit','<p>Ustaz Farid mengatakan, terdapat tiga kunci untuk lancar membaca Alquran dengan menggunakan metode tersebut. Pertama, seseorang itu harus menguasai huruf Alquran yang jumlahnya 30 huruf. Sementara, kunci yang kedua harus bisa menguasai tanda baca Alquran yang jumlahnya ada delapan tanda baca.</p>\r\n\r\n<p> </p>\r\n\r\n<p>\"Untuk bisa menguasai huruf dan tanda baca itu dibutuhkan waktu 30 menit. Setelah itu dilanjutkan dengan praktik,\" kata Ustaz Farid di Kantor Republika, Jakarta, Sabtu (24/2).</p>\r\n\r\n<p> </p>\r\n\r\n<p>Sementara, kunci yang ketiga, kata Ustaz Farid, dengan menguasai tajwid yang ada dalam Al-Quran. Dimana, untuk menguasai tajwid tersebut dapat dipraktekkan seiring dengan praktik yang dilakukan setelah kegiatan ini kedepannya.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"photo\" src=\"http://static.republika.co.id/uploads/images/headline_slide/0.68853300-1512814555-830-556.jpeg\"></p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<blockquote>Belajar Mengaji. Peserta sedang mengikuti kegiatan 30 Menit Bisa Membaca Alquran di Kantor Republika, Jalan Warung Buncit, Jakarta.</blockquote>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Namun untuk menguasai huruf Alquran tersebut dengan cepat, kata Ustaz Farid, juga ada beberapa teknik. Dimana, pertama dengan menyebut 30 huruf tersebut dengan nama latinnya. \"Contoh kalau huruf <em>alif</em> sama dengan A kalau latinnya, <em>hamzah</em> juga A, <em>Ain</em> juga A, jadi A ada tiga. Terus <em>dal, dho</em> itu disebut D semua. <em>Sin, Syin, Sod</em> itu S semua,\" kata Farid.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Karena dalam satu huruf latin terdapat beberapa huruf Alquran, maka teknik membedakannya dengan diberi ciri-ciri terhadap huruf tersebut. Teknik tersebut merupakan teknik kedua untuk dapat menguasai 30 huruf tersebut.</p>\r\n\r\n<p> </p>\r\n\r\n<p>\"Contohnya <em>alif</em> atau A, itu ciri-cirinya lurus. Contohnya huruf S kalau di Alquran, bertemu dengan huruf yang giginya tiga, itu pasti S. Dan semua huruf yanh 30 itu ada ciri-cirinya semua,\" tambahnya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Setelah melalui dua teknik tersebut, maka selanjutnya dengan mengajari bagaimana melafalkan huruf tersebut dengan benar, sesuai dengan tajwid. \"Kalau orang udah tahu ciri-ciri huruf, biasanya kuat ingatannya, kuat memorinya untuk menghafal hurif-huruf tadi. Dengan ciri-ciri itu seseorang menjadi ringan untuk menghafal huruf dan melafalkannya setelah itu,\" kata Ustaz Farid.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Baca Juga: <a href=\"http://www.republika.co.id/berita/dunia-islam/islam-nusantara/18/02/24/p4niug396-ngaji-30-menit-supaya-masyarakat-melek-huruf-alquran\" target=\"_blank\"><em>Ngaji</em> 30 Menit Supaya Masyarakat Melek Huruf Alquran</a></strong></p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Metode ini sendiri diciptakan, lanjut Ustaz Farid, ada latar belakangnya. Pertama karena selama berpuluh-puluh tahun umat Islam itu masih kesulitan dalam membaca Alquran. Sebab, belum ditemukan metode yang telat, mudah dan praktis untuk dipraktekkan.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Sementara, latarbelakang kedua, lanjutnya, muncul dan ditemukan karena berdasarkan pengalaman dari Ustaz Farid sendiri selama mengajar. Dimans, banyak umat Islam yang bisa membaca Alquran, namun bacaannya tidak benar dan tidak sesuai dengan tajwid.</p>\r\n\r\n<p> </p>\r\n\r\n<p>\"Dari pengalaman itu akhirnya ada inspirasi membuat metode yang lebih cepat lagi dari metode yang pernah ada. Setelah ketemu metode ini jadinya kita jadi mudah gak ada yang kesulitan. Hampir semua yang belajar menjadi mudah tidak ada kesulitan,\" tambahnya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Selama kegiatan berlangsung, peserta &#39;ngaji 30 menit&#39; yang kali ini merupakan angkatan ke-76, akan diberikan banyak praktek. Di antaranya praktik surat Al Hajj, Al-Fatihah, Al-Baqarah, Yasin dan surat pendek lainnya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Diharapkan dari kegiatan ini, kata Farid, dapat lebih rajin lagi dalam membaca Al-Quran. \"Karena membaca Alquran itu mudah tapi godaannya yang besar. Jadi biar lebih rajin lagi, kalau sudah rajin harapannya bisa khatam 30 juz, dan lebih banyak lagi mencintai Alquran dan mencintai isinya,\" tambahnya.</p>','Jumat','2018-08-17','13:46:56','264933c1b2ed0987c6668aa06ad0238f.jpg',0,'mobil,film');

/*Table structure for table `carousel` */

DROP TABLE IF EXISTS `carousel`;

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_carousel` varchar(200) NOT NULL,
  `gambar_carousel` varchar(250) DEFAULT NULL,
  `keterangan_carousel` text NOT NULL,
  `active_carousel` enum('active','') DEFAULT NULL,
  PRIMARY KEY (`id_carousel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `carousel` */

insert  into `carousel`(`id_carousel`,`nama_carousel`,`gambar_carousel`,`keterangan_carousel`,`active_carousel`) values (1,'Slide 1','Ucapan_idul_fitri.JPG','<h2><a href=\"https://stackoverflow.com/questions/4554758/how-to-read-if-a-checkbox-is-checked-in-php\">Codeigniter</a></h2>\r\n','active'),(2,'Slide 2','Sedang_mengaji.JPG','',''),(3,'Slide 3','Sedekah_online.JPG','',''),(5,'Slide 4','Umroh.JPG','<h2><a href=\"https://stackoverflow.com/questions/4554758/how-to-read-if-a-checkbox-is-checked-in-php\">Codeigniter</a></h2>\r\n',''),(6,'Slide 5','Pray_for_palestine.JPG','<p>Nomor       : 345/IE-WAWANCARA/IV/2016<br>\r\nLampiran   : -<br>\r\nPerihal       : User<br>\r\n<br>\r\nKepada Yth,<br>\r\nKampung Qur&#39;am Cikarang<br>\r\nDi Tempat<br>\r\n<br>\r\nBerkenaan dengan Surat Pemberitahuan ini, dengan ini kami memberi informasi :</p>\r\n\r\n<p>Nama    : ________</p>\r\n\r\n<p>No HP   : _________</p>\r\n\r\n<p>E-mail   : _________</p>\r\n\r\n<p>Perihal  : _________</p>\r\n\r\n<p>Pesan   : _________</p>\r\n\r\n<p><br>\r\nAtas perhatian serta kerjasama Saudara/I, kami ucapkan terima kasih.<br>\r\n<br>\r\nBekasi, 5 November 2016<br>\r\n<br>\r\nHormat kami,<br>\r\n<br>\r\n<br>\r\nSystem Application</p>\r\n','');

/*Table structure for table `galeri_foto` */

DROP TABLE IF EXISTS `galeri_foto`;

CREATE TABLE `galeri_foto` (
  `id_galeri_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nama_galeri_foto` varchar(100) DEFAULT NULL,
  `keterangan_galeri_foto` text,
  `gambar_galeri_foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_galeri_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `galeri_foto` */

insert  into `galeri_foto`(`id_galeri_foto`,`nama_galeri_foto`,`keterangan_galeri_foto`,`gambar_galeri_foto`) values (1,'Test Foto','<p>dfhsdbgjkfdghukdhgkdhgdhg k dg h gihghgiudhg s</p>','62b3bc2f191a4b3729b7f5bba7c3d86d.jpg'),(3,'22222222222','<p>afsdgdfh</p>','d281abc837f966e5c6ac4defd9a4e86d.jpg');

/*Table structure for table `galeri_video` */

DROP TABLE IF EXISTS `galeri_video`;

CREATE TABLE `galeri_video` (
  `id_galeri_video` int(11) NOT NULL AUTO_INCREMENT,
  `nama_galeri_video` varchar(200) DEFAULT NULL,
  `link_galeri_video` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_galeri_video`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `galeri_video` */

insert  into `galeri_video`(`id_galeri_video`,`nama_galeri_video`,`link_galeri_video`) values (1,'Untuk Istri yang lagi kesel sama suami','https://www.youtube.com/embed/gdvQXuvXzgc'),(2,'Stimulasi motorik dengan guling','https://www.youtube.com/embed/PTyH-KHc0iA'),(4,'COBA AYAM BERSIH BERKAH LV 30 - RASA HALAL Eps.2','https://www.youtube.com/embed/IrWk-EQ63B0');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'Members','General User'),(3,'Supervisor','Supervisor Contoh');

/*Table structure for table `highlight` */

DROP TABLE IF EXISTS `highlight`;

CREATE TABLE `highlight` (
  `id_highlight` int(11) NOT NULL AUTO_INCREMENT,
  `nama_highlight` varchar(300) NOT NULL,
  `gambar_highlight` varchar(200) NOT NULL,
  `link_highlight` varchar(250) DEFAULT NULL,
  `active_carousel` enum('actvive','') DEFAULT NULL,
  PRIMARY KEY (`id_highlight`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `highlight` */

/*Table structure for table `hubungi_kami` */

DROP TABLE IF EXISTS `hubungi_kami`;

CREATE TABLE `hubungi_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(200) DEFAULT NULL,
  `email_pengirim` varchar(200) DEFAULT NULL,
  `tlp_pengirim` varchar(15) DEFAULT NULL,
  `subjek_pengirim` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hubungi_kami` */

/*Table structure for table `jemput_sedekah` */

DROP TABLE IF EXISTS `jemput_sedekah`;

CREATE TABLE `jemput_sedekah` (
  `id_jemput_sedekah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jemput_sedekah` varchar(200) DEFAULT NULL,
  `gambar_jemput_sedekah` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jemput_sedekah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jemput_sedekah` */

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `menu_groups` */

DROP TABLE IF EXISTS `menu_groups`;

CREATE TABLE `menu_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_groups_menus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `menu_groups` */

insert  into `menu_groups`(`id`,`group_id`,`menu_id`) values (6,2,6),(13,3,4),(14,3,5),(15,3,6),(22,1,1),(23,1,2),(24,1,3),(25,1,4),(26,1,5),(27,1,6),(28,1,7),(29,1,8),(30,1,9);

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id_menus` int(11) NOT NULL AUTO_INCREMENT,
  `judul_menus` varchar(150) NOT NULL,
  `link_menus` varchar(150) NOT NULL,
  `icon_menus` varchar(100) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_menus`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

insert  into `menus`(`id_menus`,`judul_menus`,`link_menus`,`icon_menus`,`is_main_menu`) values (1,'Berita','admin/berita','fa fa-home',0),(2,'Administrator','#','fa fa-user-secret',0),(3,'User','admin/users','fa fa-users',2),(4,'Artikel','admin/artikel','fa fa-tree',0),(5,'Groups','admin/groups','fa fa-home',2),(6,'Menu','admin/menus','fa fa-home',2),(7,'Tentang Kami','admin/tentang_kami','fa fa-home',0),(8,'Rekening','admin/rekening','fa fa-home',0),(9,'Pendidikan Dakwah','admin/pendidikan_dakwah','fa fa-home',0),(10,'','','',0);

/*Table structure for table `pendidikan_dakwah` */

DROP TABLE IF EXISTS `pendidikan_dakwah`;

CREATE TABLE `pendidikan_dakwah` (
  `id_pendidikan_dakwah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendidikan_dakwah` varchar(200) NOT NULL,
  `keterangan_pendidikan_dakwah` text NOT NULL,
  `gambar_pendidikan_dakwah` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pendidikan_dakwah`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan_dakwah` */

insert  into `pendidikan_dakwah`(`id_pendidikan_dakwah`,`nama_pendidikan_dakwah`,`keterangan_pendidikan_dakwah`,`gambar_pendidikan_dakwah`) values (2,'sdfa','asdsa','download.jpg'),(3,'asdas','asdasdas','download.jpg'),(4,'asdas','asdasdas','download.jpg'),(5,'asdas','asdasdas','download.jpg'),(6,'asdas','asdasdas','download.jpg'),(7,'adsewf','ewfrtes','download.jpg'),(8,'adsewf','ewfrtes','download.jpg'),(9,'adsewf','ewfrtes','download.jpg'),(13,'Rumah Tahfidz Center1','<p>1Rumah Tahfidz Center adalah unit program PPPA Daarul Qur’an yang bertanggungjawab atas pelaksanaan program Rumah Tahfidz di Indonesia dan luar negeri meliputi pembinaan, pengawasan, dan pengembangannya.</p>\r\n\r\n<p><strong>Rumah Tahfidz</strong></p>\r\n\r\n<ul>\r\n <li>Rumah tahfidz adalah aktivitas menghafal Al-Quran, mengamalkan, dan membudayakan nilai-nilai Al-Qur’an dalam sikap hidup seharihari berbasis hunian, lingkungan, dan komunitas.</li>\r\n <li>Rumah Tahfidz adalah embrio dan gerbang membangun masyarakat dengan dakwah Al-Qur’an untuk mencapai terwujudnya masyarakat madani yang punya nilai-nilai keislaman dalam wujud perilaku kehidupan.</li>\r\n <li>Rumah Tahfidz adalah agen perubahan masyarakat</li>\r\n <li>Rumah Tahfidz adalah sarana untuk membangun kemandirian masyarakat</li>\r\n</ul>\r\n\r\n<p><strong>Visi dan Misi Rumah Tahfidz Center</strong></p>\r\n\r\n<p>Visi:</p>\r\n\r\n<p>Membangun masyarakat madani berbasis tahfidzul Qur’an untuk kemandirian ekonomi, sosial, budaya, dan pendidikan bertumpu pada sumberdaya lokal yang berorientasi pada pemuliaan Al-Qur’an.</p>\r\n\r\n<p>Misi:</p>\r\n\r\n<ul>\r\n <li>Menjadikan tahfidzul Qur’an sebagai budaya hidup masyarakat dunia.</li>\r\n <li>Menjadikan Rumah Tahfidz Center sebagai pusat informasi, pembinaan dan pengembangan Rumah Tahfidz.</li>\r\n <li>Menyamakan pemahaman dan value tentang konsep Rumah Tahfidz</li>\r\n</ul>\r\n\r\n<p><strong>Tujuan Program</strong></p>\r\n\r\n<p>Rumah Tahfidz Center (RTC) dibentuk untuk melaksanakan fungsi dan peran penataan, pembinaan, pengembangan, dan pengawasan gerakan Rumah Tahfidz di seluruh Indonesia dan luar negeri.</p>\r\n\r\n<p><strong>Prinsip Program</strong></p>\r\n\r\n<p>RTC dalam melaksanakan aktivitasnya bersifat independen dan tidak berpihak pada kepentingan politik, maksudnya RTC sebagai unit pengelola Rumah tahfidz ada untuk semua golongan dengan kepentingan dakwah Al-Qur’an.</p>\r\n\r\n<p><strong>Sasaran Program</strong></p>\r\n\r\n<p>Sasaran Program Rumah Tahfidz Center adalah masyarakat muslim.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Komponen Program Rumah Tahfidz</strong></p>\r\n\r\n<p>-<strong> Masyarakat</strong></p>\r\n\r\n<ul>\r\n <li>Sekumpulan orang yang terdiri dari berbagai kalangan baik golongan mampu atau tidak mampu yang tinggal di dalam satu wilayah muslim yang memiliki tujuan sama untuk memuliakan AlQur’an dan mengamalkan nilai-nilainya dalam kehidupan seharihari</li>\r\n</ul>\r\n\r\n<p><strong>- Sarana dan Prasarana</strong></p>\r\n\r\n<ul>\r\n <li>Sarana adalah tempat, ruang belajar, dan lingkungan yang kondusif.</li>\r\n <li>Prasarana adalah alat penunjang pendidikan Tahfidzul Qur’an meliputi perlengkapan belajar.</li>\r\n</ul>\r\n\r\n<p><strong>- Ustadz/Ustadzah</strong></p>\r\n\r\n<p>Ustadz/Ustadzah adalah seseorang yang memiliki kompetensi untuk mengajarkan pelajaran agama Islam. Asaatidz Rumah Tahfidz adalah sekumpulan orang yang ditunjuk Rumah Tahfidz atau Rumah Tahfidz Center untuk menjadi pengajar, dengan kriteria memiliki hafalan 30 juz, memahami Daqu Methode, dan ilmu Dirosah Islamiyah.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Kriteria Asaatidz Rumah Tahfidz</strong></p>\r\n\r\n<ul>\r\n <li>Diutamakan yang sudah menikah (suami istri hafidz dan hafidzoh) jika dalam rumah tahfidz ada santri laki-laki dan perempuan yang mukim dengan tetap penginapan yang dipisah.</li>\r\n <li>Diutamakan hafal 30 juz untuk ustadz yang mukim dan lolos seleksi oleh Dewan Tahfidz dan RTC.</li>\r\n <li>Komunikatif dan mampu memberikan pengajaran tahfidz.</li>\r\n <li>Tidak mengajarkan hal-hal yang bertentangan dengan AlQur’an dan Sunnah.</li>\r\n <li>Tidak aktif dalam berpolitik.</li>\r\n</ul>\r\n\r\n<p><strong>- Santri</strong></p>\r\n\r\n<p>Santri Rumah Tahfidz adalah individu yang belajar dan menghafal Al-Qur’an di dalam rumah tahfidz baik mukim maupun non mukim.</p>\r\n\r\n<p>Kriteria Santri Rumah Tahfidz:</p>\r\n\r\n<ul>\r\n <li>Sudah lancar membaca Al-Qur’an 7</li>\r\n <li>Mempunyai keinginan yang kuat untuk mengaji dan menghafal Al-Qur’an 30 juz.</li>\r\n <li>Santri diprioritaskan untuk masyarakat di sekitar rumah tahfidz berdiri.</li>\r\n <li>Berakhlaq mulia dan siap untuk dibina.</li>\r\n</ul>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Kategori Rumah Tahfidz</strong></p>\r\n\r\n<p><strong>- Rumah Tahfidz Daarul Qur’an</strong></p>\r\n\r\n<p>Rumah tahfidz yang didirikan dan dibiayai sepenuhnya oleh lembaga PPPA Daarul Qur’an.</p>\r\n\r\n<p><strong>- Rumah Tahfidz Mitra</strong></p>\r\n\r\n<p>Rumah Tahfidz yang didirikan atas kerjasama antara Rumah Tahfidz Center dengan individu, lembaga, komunitas, perusahaan dan lain-lain, dengan pola kerjasamanya sebagai berikut: kerjasama pendanaan, kerjasama penempatan sdm pengajar, kerjasama branding rumah tahfidz.</p>\r\n\r\n<p><strong>- Rumah Tahfidz Mandiri</strong></p>\r\n\r\n<p>Rumah tahfidz yang didirikan atas inspirasi dari rumah tahfidz PPPA Daarul Qur’an dengan status rumah tahfidz pribadi, yayasan, lembaga dan komunitas. Biaya operasional sepenuhnya dibiayai oleh pengelola rumah tahfidz yang bersangkutan.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Sistem Kurikulum</strong></p>\r\n\r\n<ul>\r\n <li>Tahfidz dengan target hafalan 30 juz, atau 1 juz/bulan</li>\r\n <li>Jenjang pendidikan di Rumah Tahfidz selama 3 tahun.</li>\r\n <li>Dirasah islamiyah</li>\r\n <li>Attibyan fii adabi hamalatil Qur’an</li>\r\n <li>Bahasa Arab dan Inggris</li>\r\n <li>keterampilan sesuai minat dan bakat</li>\r\n</ul>\r\n\r\n<p><strong>Pengembangan</strong></p>\r\n\r\n<p>RTC mengembangkan jumlah berdirinya rumah tahfidz di seluruh Indonesia dan luar negeri.</p>\r\n\r\n<p><strong>Pembinaan</strong></p>\r\n\r\n<p>Ruang lingkup pembinaan Rumah Tahfidz Center:</p>\r\n\r\n<ul>\r\n <li>Upgrading Asaatidz Rumah Tahfidz.</li>\r\n <li>Pengarahan pelaksanaan kurikulum rumah tahfidz.</li>\r\n <li>Motivasi santri tahfidz.</li>\r\n <li>Memberikan saran, arahan, dan pendampingan terhadap rumah tahfidz yang bermasalah (tidak dapat menjalankan kurikulum rumah tahfidz, dll).</li>\r\n</ul>\r\n\r\n<p><strong>Pengawasan</strong></p>\r\n\r\n<ul>\r\n <li>Rumah Tahfidz Center melakukan audit program rumah tahfidz</li>\r\n <li>Rumah Tahfidz Center memastikan berjalannya SOP rumah tahfidz 8</li>\r\n <li>RTC akan membekukan rumah tahfidz jika bertentangan dengan ajaran Al Qur’an dan Sunnah dan melanggar ketentuan hukum yang berlaku.</li>\r\n</ul>\r\n\r\n<p><strong>Output & Indikator Keberhasilan Program</strong></p>\r\n\r\n<ul>\r\n <li>Dalam 3 tahun dapat meluluskan santri dengan hafalan 30 juz.</li>\r\n <li>Santri bisa berkomunikasi dengan bahasa Arab dan Inggris dalam 3 tahun. Santri memahami dan mengamalkan nilai-nilai keislaman.</li>\r\n <li>Terciptanya budaya Daqu Methode pada santri, guru, orang tua, pengelola dan masyarakat sekitar rumah tahfidz.</li>\r\n <li>Terwujudnya kawasan religius berbasis komunitas, kampung, dan wilayah.</li>\r\n <li>Rumah Tahfidz menjadi tempat pembelajaran Al Qur’an bagi masyarakat.</li>\r\n <li>Adanya peningkatan hafalan Al Qur’an yang diperoleh santri dan warga sekitar.</li>\r\n <li>Munculnya kecintaan terhadap Al Qur’an pada santri dan masyarakat sekitar.</li>\r\n</ul>','download.jpg');

/*Table structure for table `rekening` */

DROP TABLE IF EXISTS `rekening`;

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(200) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `rekening` */

insert  into `rekening`(`id_rekening`,`nama_bank`,`no_rekening`) values (1,'Bank Muamalat','303 003 361 51'),(2,'BNI Syariah','1699 1699 6');

/*Table structure for table `sedekah` */

DROP TABLE IF EXISTS `sedekah`;

CREATE TABLE `sedekah` (
  `id_sedekah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sedekah` varchar(200) NOT NULL,
  `gambar_sedekah` varchar(250) NOT NULL,
  PRIMARY KEY (`id_sedekah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sedekah` */

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tag` */

insert  into `tag`(`id_tag`,`nama_tag`,`tag_seo`,`count`) values (1,'Palestina','palestina',7),(2,'Gaza','gaza',11),(9,'Tenis','tenis',5),(10,'Sepakbola','sepakbola',7),(8,'Laskar Pelangi','laskar-pelangi',2),(11,'Amerika','amerika',18),(12,'George Bush','george-bush',3),(13,'Browser','browser',9),(14,'Google','google',3),(15,'Israel','israel',5),(16,'Komputer','komputer',24),(17,'Film','film',9),(19,'Mobil','mobil',0),(21,'Gayus','gayus',2);

/*Table structure for table `templates` */

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `title_templates` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `folder_templates` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status_templates` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `templates` */

insert  into `templates`(`id_templates`,`title_templates`,`folder_templates`,`status_templates`) values (1,'admin_lte','admin_lte','N'),(2,'kqc','kqc','Y');

/*Table structure for table `tentang_kami` */

DROP TABLE IF EXISTS `tentang_kami`;

CREATE TABLE `tentang_kami` (
  `id_tentang_kami` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tentang_kami` varchar(200) DEFAULT NULL,
  `isi_tentang_kami` text,
  `gambar_tentang_kami` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_tentang_kami`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tentang_kami` */

insert  into `tentang_kami`(`id_tentang_kami`,`nama_tentang_kami`,`isi_tentang_kami`,`gambar_tentang_kami`) values (1,'Manajemen','<table border=\"0\">\r\n <tbody>\r\n  <tr>\r\n   <td>Direktur Utama</td>\r\n   <td>:</td>\r\n   <td> M. Anwar Sani</td>\r\n  </tr>\r\n  <tr>\r\n   <td>Direktur Eksekutif</td>\r\n   <td>:</td>\r\n   <td>Tarmizi Ashidiq</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM Keuangan & Umum</td>\r\n   <td>:</td>\r\n   <td> Abdul Sidik</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM Fundrising</td>\r\n   <td>:</td>\r\n   <td> Irfan Yudha</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM Pendayagunaan</td>\r\n   <td>:</td>\r\n   <td> Jahidin</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM Legal & Asset</td>\r\n   <td>:</td>\r\n   <td> Nanang Ismuhartoyo</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM Marketing & komunikasi</td>\r\n   <td>:</td>\r\n   <td> Dwi Kartika</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM HRD</td>\r\n   <td>:</td>\r\n   <td> M. Yusuf</td>\r\n  </tr>\r\n  <tr>\r\n   <td>GM Rumah Tahfidz Center</td>\r\n   <td>:</td>\r\n   <td> Ust. Sholehudin</td>\r\n  </tr>\r\n </tbody>\r\n</table>','47f88a60ccc5575d966aa4b7104f3eab.jpg'),(2,'Sejarah','<blockquote>\r\n<p><strong>PPPA Daarul Qur’an adalah lembaga pengelola sedekah yang berkhidmad pada pembangunan masyarakat berbasis tahfizhul Qur’an yang dikelola secara profesional dan akuntabel.</strong></p>\r\n</blockquote>\r\n\r\n<p>Bermula pada 2003, saat Ustadz Yusuf Mansur berkhidmad untuk menciptakan kader-kader penghafal Al-Qur’an di Indonesia dengan Program Pembibitan Penghafal Al-Qur’an (PPPA) Daarul Qur’an. Dimulai dengan mengasuh beberapa santri tahfizh, kemudian berkembang hingga ribuan santri yang tersebar di seluruh Indonesia.</p>\r\n\r\n<p>Dari sudut sempit Musholla Bulak Santri yang bersebelahan dengan makam desa, di tempat inilah berawal aktivitas PPPA Daarul Qur’an mengusung visi dan cita-cita besar.</p>\r\n\r\n<p>Sedari awal, PPPA Daarul Qur’an berkonsentrasi dalam upaya membangun kesadaran masyarakat untuk kembali pada Al-Qur’an, dengan menggulirkan program-program yang bertujuan untuk membibit dan mencetak penghafal Qur’an.</p>\r\n\r\n<p>Makin hari, gerakan dan kesadaran masayrakat untuk melahirkan para penghafal Al-Qur’an terus meluas. Maka diperlukan payung kelembagaan yang kuat dan profesional. Pada 29 maret 2007 di Balai Sarbini Jakarta, identitas PPPA Daarul Qur’an resmi diperkenalkan ke publik. Dikukuhkan melalui akte notaris tertanggal 11 Mei 2007.</p>\r\n\r\n<p>PPPA Daarul Qur’an membangun gerakan Rumah Tahfizh di dalam dan luar negeri. Dalam program dakwah dan sosial, PPPA juga terlibat dalam pembangunan kemandirian dan pengembangan masyarakat berbasis tahfizhul Qur’an. Mulai bantuan beasiswa, kemanusiaan, kesehatan, dan pengembangan masyarakat. Dengan program kreatif, membumi, dan tepat sasar PPPA terus dipercaya masyarakat sebagai mitra pengelola sedekah dalam pembangunan bangsa berbasis tahfizhul Qur’an.</p>',NULL),(3,'Visi Misi','<p><strong>Visi :</strong></p>\r\n\r\n<p>Membangun masyarakat madani berbasis Tahfidzul Qur’an untuk kemandirian ekonomi, sosial, budaya, dan pendidikan bertumpu pada sumberdaya lokal yang berorientasi pada pemuliaan Al-Qur’an.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Misi :</strong></p>\r\n\r\n<ol>\r\n <li>Menjadikan Tahfidzul Qur’an sebagai budaya hidup masyarakat Indonesia</li>\r\n <li>Mewujudkan kemandirian ekonomi, pangan, pendidikan, dan kemandirian teknologi berbasis Tahfidzul Qur’an</li>\r\n <li>Menjadikan Indonesia bebas buta Al-Qur’an</li>\r\n <li>Menjadi lembaga yang menginspirasi masyarakat untuk peduli dan berpihak pada kaum lemah melalui nilai-nilai sedekah</li>\r\n <li>Menjadi lemabaga pengelola sedekah yang profesional, transparan, akuntabel, dan terpercaya.</li>\r\n</ol>',NULL),(4,'Method','Kami persilahkan bila ada yang ingin Anda ketahui atau tanyakan perihal Program Pembibitan Penghafal Al-Qur\'an Daarul Qur\'an melalui Form Hubungi Kami ini\r\n\r\n<h3>Daqu Method</h3>\r\n\r\n<p>1. Shalat Berjamaah & Jaga Hati, Jaga Sikap<br>\r\n2. Tahajjud, Dhuha & Qabliyah Ba’diyah<br>\r\n3. Menghafal & Tadabbur Al-Qur’an<br>\r\n4. Sedekah & Puasa Sunnah<br>\r\n5. Belajar & Mengajar<br>\r\n6. Doa, Mendoakan & Minta Didoakan<br>\r\n7. Ikhlas, Sabar, Syukur & Ridho</p>\r\n\r\n<h1>The above code sets the following rules:</h1>\r\n\r\n<ol>\r\n <li><span xss=removed>The username field be no shorter than 5 characters and no longer than 12.</span></li>\r\n <li><span xss=removed>The password field must match the password confirmation field.</span></li>\r\n <li>The email field must contain a valid email address.</li>\r\n</ol>\r\n\r\n<p>Give it a try! Submit your form without the proper data and you’ll see new error messages that correspond to your new rules. There are numerous rules available which you can read about in the validation reference.</p>',NULL),(5,'Legal Formal','<p>Legalitas Operasional PPPA Daarul Qur&#39;an berada dibawah naungan Yayasan Daarul Qur&#39;an Nusantara. berkedudukan di Tangerang, didirikan berdasarkan Akta Nomor 24 tanggal 11 Mei 2007 yang dibuat oleh Notaris Edi Priyono, SH berkedudukan di Jakarta. Akta Pendirian Yayasan Daarul Qur&#39;an Nusantara telah disahkan per tanggal 27 Agustus 2007 berdasarkan Keputusan Menteri Hukum dan Hak Asasi Manusia Republik Indonesia, Direktorat Jenderal Administrasi Hukum Umum dengan nomor C-2704.HT.01.02.TH 2007</p>\r\n\r\n<p>Berdasarkan Keputusan Ketua Umum Badan Amil Zakat Nasional (BAZNAS) No. KEP.005/BP/BAZNAS/VI/2015 Tentang Pembentukan UPZ BAZNAS bahwa PPPA Daarul Qur&#39;an mulai bulan Juni 2015 telah resmi menjadi UPZ BAZNAS (Unit Pengumpul Zakat), sesuai SK tersebut semua zakat karyawan Daarul Qur&#39;an dan dana zakat masyarakat yang terhimpun melalui PPPA Daarul Qur&#39;an di setorkan melalui BAZNAS.</p>',NULL),(6,'Salam Pimpinan','<h3>Dream 5 Benua</h3>\r\n\r\n<p><strong>Khoirul Mustofa</strong><br>\r\nDirektur Eksekutif</p>\r\n\r\n<p><em>Assalamu&#39;alaikum Warahmatullahi Wabarakatu</em>, Para donatur yang budiman, semoga Bapak/Ibu senantiasa diberikan kesehatan dan selalu dalam lindungan serta dilimpahkan kemudahan dan keberkahan oleh Allah SWT. Aamiin.<br>\r\n<br>\r\nSalah satu hasil rapat kerja pimpinan Pesantren Tahfizh Daarul Qur’an tahun 2014 di Hotel Siti, adalah sebuah “Big Dream Daqu”, mimpi besar untuk membangun 100 pesantren di 100 kota 5 benua. Dream ini berawal dari diskusi saya, Ustad Jameel dan Ustad Sani di rumah kediaman Kyai Yusuf Mansur. Saat itu, saya bersama kawan-kawan menyampaikan beberapa masukan program untuk satu tahun yaitu berkonsentrasi untuk pembangunan sepuluh pesantren selama lima tahun. Setiap tahunnya, Daarul Qur’an harus dapat membangun satu atau dua pesantren.<br>\r\n<br>\r\nTernyata, dalam diskusi itu, Kyai Yusuf malah memberi kami tantangan yang dahsyat, yaitu membangun 100 pesantren. \"Membangun 10 atau 100 pesantren, sama saja energinya, sama mikirnya, sama kerjanya, sama capek dan lelahnya. Mending yang banyak sekalian,“ ucap beliau. ‘\"Gedein cita-citanya, tingkatkan dreamnya, bukan 10 pesantren yang akan kita bangun tetapi 100 pesantren. Bismillah!\"<br>\r\n<br>\r\nSaat itu, kami bertiga sempat saling berpandangan, dan tersenyum sambal melafazkan basmalah. Setelah itu, kita mengaminkan do’a yang dipanjatkan oleh Kyai Yusuf. Dari diskusi itulah lahir Program “Its All about One Hundred’’. Selanjutnya, secara berangsur, PPPA, Pesantren, DBN mulai berupaya mengembangkan program-programnya.<br>\r\n<br>\r\nPPPA Daarul Qur’an dengan program Kampung Qur’an mulai berdiri di beberapa daerah, memberikan bantuan pendidikan, pendampingan masyarakat dhuafa, daerah tertimpa bencana, hingga daerah pedalaman. Ribuan rumah tahfizh di Indonesia hingga manca negara pun berdiri.<br>\r\n<br>\r\nPPPA Daarul Qur’an juga berhasil memandirikan programnya seperti Klinik Daqu Sehat, Daqu Agrotechno dan Qurban Istimewa. Ini merupakan prestasi tersendiri, bagaimana PPPA Daarul Qur’an mulai menggali potensi ekonomi ummat yang dapat dimaksimalkan dalam mewujudkan Dream Daqu. Ketiga lembaga yang dimandirikan mulai bermetamorfosis menjadi lembaga yang kuat, baik secara finansial dan manajemen pengelolaan.<br>\r\n<br>\r\nSedangkan Pesantren Tahfizh Daarul Qur’an dan DBN (Daqu Bisnis Nusantara) berjalan beriringan dalam memaksimalkan pontesi ekonomi yang ada dalam pesantren. Beberapa unit-unit usaha pendukung didirikan untuk memenuhi kebutuhan santri hingga keperluan insan Daqu.  Unit-unit usaha ekternal penopang kemandirian pesantren sudah mulai berkembang seperti PayTren, Daqu Travel, Aquado, dan Hotel Siti.<br>\r\n<br>\r\nDi sisi lain Pesantren Tahfizh Daarul Qur’an terus berbenah baik secara tata kelola, secara manajemen pendidikan dan sebagainya, agar Pesantren Tahfizh Daarul Qur’an dapat menghasilkan lulusan yang berkualitas dan mampu bersaing secara global.<br>\r\n<br>\r\nBertepatan 5 Juli tahun ini, Daarul Qur’an berusia ke 14 tahun, masih terlalu muda dengan dream dan cita-cita dari guru kami Kyai Yusuf. Perjalanan masihlah sangat panjang dengan dream dan cita kami, yang terus disemangati Kyai Yusuf.<br>\r\n<br>\r\nSaya ingat, saat perhelatan milad PPPA Daarul Qur’an ke 10 tahun April 2017 lalu,  Kyai Yusuf dengan motivasinya berbicara kepada kami bertiga (saya, Ustad Jameel dan Ustad Sani) untuk mengubah tema milad yang tertulis ‘’10 Tahun Daarul Qur’an, Nyata Untuk di Indonesia“. Ustad Jameel diminta mengubah kata ‘’Indonesia’’ menjadi ‘’Dunia’’. Perubahan ini sontak dilakukannya dengan menaiki kursi yang dipegangi saya dan Ustad Sani.<br>\r\n<br>\r\nDream Daqu, Dream 5 Benua, Dream Indonesia, adalah Dream Kita bersama. Kenapa?<br>\r\n<br>\r\nKarena mimpi kita bersama saat Indonesia banyak melahirkan generasi hafizh Qur’an yang berprofesi dalam semua bidang, baik pemeritahan dan swasta. Mimpi kita bersama agar lembaga-lembaga pendidikan Indonesia dapat berdiri di berbagai belahan dunia, bahkan Indonesia menjadi negara pusat dan tujuan orang dari berbagai negara untuk belajar. Mimpi kita bersama juga bila Indonesia ke depan, para pemipinnya amanah, bertanggung jawab, dan rakyat sejahtera.<br>\r\n<br>\r\nDi milad ke 14 tahun Daarul Qur’an, do’akan kami, do’akan Daarul Qur’an, do’akan lembaga-lembaga lainnya agar lebih bermanfaat untuk masyarakat dan ummat. Kerja keras ini tak lepas dari dukungan dan kepercayaan Bapak/Ibu yang menjadi modal besar bagi kami. Teriring do’a semoga setiap aktivitas Bapak/Ibu semua mendapat ridho Allah SWT. Aamiin</p>\r\n\r\n<p><em>Wa&#39;alaikumsalam Warahmatullahi Wabarakatuh</em></p>','a7c766df1c250d9625ed752783fc3fea.jpg');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'127.0.0.1','Administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,'3TD4NqwmC1YF0B1mJC.aSe',1268889823,1534478662,1,'Administrator','sfsdg','Kampung Qur\'an Cikarang','34563'),(2,'::1','khoirl@gmail.com','$2y$08$nLwC4y6v.4DMmgDU9EaqkuJSocmTkPQTNbWDLmNuNgfXtBjY1tYWW',NULL,'khoirl@gmail.com',NULL,NULL,NULL,NULL,1532329863,NULL,1,'khoirul','khoirul','khoirul','123123123'),(4,'::1','juhandist@gmail.com','$2y$08$KNKcadjCrenenaHIYzeTo.4s00jukeVvKh2My7K6XowZL/Qh0txVG',NULL,'juhandist@gmail.com',NULL,NULL,NULL,NULL,1533525012,1533810301,1,'aaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaa','Kampung Qur\'an Cikarang','1111111111111111111'),(5,'::1','Usaha','$2y$08$oFiYEgw1qocuGWRVHpysX.F3KCQ/L1.BYrlG/d8WqU/hGlqmBB8Wi',NULL,'ee@gg.mm',NULL,NULL,NULL,NULL,1533819392,NULL,1,'usaha','usaha','Kampung Qur\'an Cikarang','3601');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values (27,1,1),(28,1,2),(4,2,2),(5,2,3),(17,4,2),(18,4,3),(22,5,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
