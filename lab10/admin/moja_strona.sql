-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 09:10 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `matka` int(11) DEFAULT 0,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `matka`, `nazwa`) VALUES
(1, 0, 'Komputery'),
(2, 0, 'Podzespoły'),
(3, 2, 'Procesory');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<div id=\"zegarek\"></div>\r\n        <div id=\"data\"></div>\r\n<div class=\"main\">\r\n    <h1>Czym jest komputer?</h1>\r\n    <p>Komputer <b>(od ang. computer);</b> dawniej: mózg elektronowy, elektroniczna maszyna cyfrowa, maszyna matematyczna\r\n         maszyna przeznaczona do przetwarzania informacji, które da się zapisać w formie ciągu cyfr albo sygnału ciągłego.<br> \r\n         Maszyna roku tygodnika <i>„Time”</i> w <u>1982 roku.</u></p>\r\n         <h1>Przykładowe zdjęcia nowoczesnych komputerów</h1>\r\n        </div>\r\n         <table class=\"table1\">\r\n        <tr>\r\n            <td><img src=\"https://as1.ftcdn.net/v2/jpg/01/56/56/62/1000_F_156566202_wj3y2vNkz2OtyMFuHVn5zFvrWft5J915.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://as1.ftcdn.net/v2/jpg/05/44/71/62/1000_F_544716203_PkX2ZAij0YWqvgDpd8P8bF32zTSxzO1K.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz3jFzLyjbSK1bhFKUy9HRpT509Qgf41-UJA&s\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2024/3/pr_2024_3_15_14_33_54_277_07.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://i.pinimg.com/564x/e5/50/84/e5508404258acd42aea282a26d94d41b.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            </tr>\r\n            <tr>\r\n                <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF8prToOAG2CCro17HpuQAz2jbLlSR0YeYNA&s\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://prod-api.mediaexpert.pl/api/images/gallery/thumbnails/images/38/3867030/Laptop-APPLE-MacBook-Air-2022-1.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://static.cybertron.com/clx/home/pcs-laps-section/custom-gaming-pcs.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkfe-tP6RsTYnB2Mzz1hu6atklSFZlKA8gcQ&s\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://img.freepik.com/premium-photo/gaming-pc-computer-glowing-dark-isometric-illustration-modern-computer-case_1197797-182528.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            </tr>\r\n            <tr>\r\n                <td><img src=\"https://i.pcmag.com/imagery/reviews/04B0MdrAPwZVu5RqlJsWXvw-1.fit_lpad.size_625x365.v1695330054.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://as1.ftcdn.net/v2/jpg/04/71/67/04/1000_F_471670401_BYuZ0Bn7YtYpMv3qvMGyJ7N1KtwuqV2k.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTD14B_tRhS3_pTbG3JxvV6L9YhTgwpMm6cw&s\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://logicstechnology.com/cdn/shop/articles/DALL_E_2024-03-05_19.51.31_-_The_image_should_capture_the_essence_of_a_high-performance_PC_build_guide_for_2024_focusing_on_cutting-edge_technology_and_a_sleek_modern_aesthetic.webp?v=1709686342&width=1024\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://iwocomputers.pl/12872-large_default/laptop-msi-modern-15-a5m-213fr-156-r5-5500u-8gb-ddr4-512gb-w11-home-szary.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            </tr>\r\n        </table>   \r\n        <table class=\"table2\">\r\n            <tr>\r\n            <td>\r\n            <a>Mimo że mechaniczne maszyny liczące istniały od wielu stuleci, komputery w sensie współczesnym pojawiły się dopiero w połowie <span style=\"color:blue\">XX wieku,</span> \r\n                gdy zbudowano pierwsze komputery elektroniczne. Miały one rozmiary sporych pomieszczeń i zużywały kilkaset razy więcej energii niż współczesne komputery osobiste (PC), \r\n                a jednocześnie miały miliardy razy mniejszą moc obliczeniową. <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/IMac.jpg/220px-IMac.jpg\" ALIGN=\"LEFT\">\r\n                Współcześnie są prowadzone także badania nad komputerami biologicznymi i optycznymi.</a>\r\n                <a>Komputer od typowego kalkulatora odróżnia zdolność wykonywania wielokrotnie, automatycznie powtarzanych obliczeń, według algorytmicznego wzorca zwanego programem, gdy tymczasem kalkulator może zwykle wykonywać tylko pojedyncze działania. Granica jest tu umowna, ponieważ taką definicję komputera spełniają też kalkulatory programowalne (naukowe, inżynierskie), jednak kalkulatory służą tylko do obliczeń numerycznych, podczas gdy nazwa komputer najczęściej dotyczy urządzeń wielofunkcyjnych.</a>\r\n            </div>\r\n        </td>\r\n            </tr>\r\n        </table>\r\n        <br>\r\n        <center>\r\n        <div>\r\n            <h2>Wybierz kolor tła</h2>\r\n            <form method=\"POST\" name=\"background\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"żółty\" value=\"żółty\" onclick=\"changeBackground(\'#FFF000\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"czarny\" value=\"czarny\" onclick=\"changeBackground(\'#000000\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"biały\" value=\"biały\" onclick=\"changeBackground(\'#FFFFFF\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"zielony\" value=\"zielony\" onclick=\"changeBackground(\'#04AA6D\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"niebieski\" value=\"niebieski\" onclick=\"changeBackground(\'#008CBA\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"pomaranczowy\" value=\"pomarańczowy\" onclick=\"changeBackground(\'#ff8000\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"szary\" value=\"szary\" onclick=\"changeBackground(\'#c0c0c0\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"czerwony\" value=\"czerwony\" onclick=\"changeBackground(\'#f44336\')\">\r\n                </form>\r\n                <br>\r\n                <div id=\"animacjaTestowa1\" class=\"test-block\"><h1><b><i>Kliknij a się powiększy</i></b></h1></div>\r\n\r\n                <script>\r\n                    \r\n                    $(\"#animacjaTestowa1\").on(\"click\", function(){\r\n                        $(this).animate({\r\n                            width: \"500px\",\r\n                            fontSize: \"3em\",\r\n                            borderWidth: \"10px\",\r\n                        }, 800);\r\n                    });\r\n        \r\n                </script>\r\n<br>\r\n                <div id=\"animacjaTestowa2\" class=\"test-block\"><h1><b><i>Najedź kursorem a się powiększy</i></b></h1></div>\r\n\r\n                <script>\r\n                    \r\n                    $(\'#animacjaTestowa2\').on({\r\n                        \"mouseover\" : function(){\r\n                            $(this).animate({\r\n                                width: 500\r\n                            }, 800);\r\n                        },\r\n                        \"mouseout\" : function(){\r\n                            $(this).animate({\r\n                                width: 200\r\n                            },2000);\r\n                        }\r\n                    });\r\n        \r\n                </script>\r\n                <br>\r\n                <div id=\"animacjaTestowa3\" class=\"test-block\"><h1><b><i>Kliknij abym urósł</i></b></h1></div>\r\n\r\n                <script>\r\n\r\n                    $(\"#animacjaTestowa3\").on(\"click\", function(){\r\n                        if (!$(this).is(\":animated\")) {\r\n                            $(this).animate({\r\n                                width: \"+=\" + 50,\r\n                                height: \"+=\" + 15,\r\n                                opacity: \"+=\" + 0.1,\r\n                                duration : 10000\r\n                            })\r\n                        }\r\n                    })\r\n            </script>\r\n            <h1>Kontakt</h1>\r\n            <form action=\"mailto:169224@student.uwm.edu.pl\" method=\"post\" enctype=\"text/plain\">\r\n                <p>Imię i Nazwisko</p><input name=\"Imię i Nazwisko\"><br>\r\n                <p>Napisz wiadomość:</p>\r\n                <textarea name=\"Komentarz\" cols=\"50\" rows=\"12\"></textarea>\r\n                <br>\r\n                <input type=\"submit\" value=\"Wyślij formularz\" class=\"submit1\">\r\n                <input type=\"button\" value=\"Wiadomość\" class=\"submit1\" onclick=\"alert(\'169224@student.uwm.edu.pl\')\">\r\n            </form>\r\n        </div>\r\n        </center>', 1),
(2, 'history', '<html lang=\"pl\">\r\n<head>\r\n    <link rel=\"stylesheet\" href=\"../css/style.css\">\r\n    <meta http-equiv=\"Content-type\" content=\"text/html; charset=UTF-8\" />\r\n    <meta http-equiv=\"Content-Language\" content=\"pl\" />\r\n    <meta name=\"Author\" content=\"Jakub Budzich\" />\r\n    <title>Historia Komputerów</title>\r\n</head>\r\n<body>\r\n        <div class=\"main\">\r\n    <h1>Najwybitniejsi naukowcy, których prace przyczyniły się do powstania komputerów:</h1>\r\n    <div>\r\n    <ul>\r\n    <li>Christopher Latham Sholes (maszyna do pisania, 1867)</li>\r\n    <li>Blaise Pascal (kalkulator od nazwiska konstruktora zwany Pascaliną, 1642)</li>\r\n    <li>Gottfried Leibniz (system binarny, żywa ława do obliczeń, mechanizm stepped drum)</li>\r\n    <li>Abraham Stern (maszyna licząca)</li>\r\n    <li>Charles Babbage (maszyna różnicowa, maszyna analityczna)</li>\r\n    <li>Ada Lovelace (prace teoretyczne, wizjonerskie w jej czasach koncepcje wykorzystania komputerów)</li>\r\n    <li>Claude Shannon (teoretyczne podstawy budowy komputerów – „przekucie” algebry Boole’a i współczesnej mu wiedzy o elektronice)</li>\r\n    <li>Alan Turing (teoretyczne podstawy informatyki, maszyna Turinga i uniwersalna maszyna Turinga)</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 1),
(3, 'basic', '<html lang=\"pl\">\r\n<head>\r\n    <link rel=\"stylesheet\" href=\"../css/style.css\">\r\n    <meta http-equiv=\"Content-type\" content=\"text/html; charset=UTF-8\" />\r\n    <meta http-equiv=\"Content-Language\" content=\"pl\" />\r\n    <meta name=\"Author\" content=\"Jakub Budzich\" />\r\n    <title>Podstawowe elementy komputera</title>\r\n</head>\r\n<body>\r\n        <div class=\"main\">\r\n            <h1>Podstawowe elementy komputera</h1>\r\n            <img src=\"https://sprzetowo.pl/userdata/gfx/54262.jpg\" width=\"300px\" height=\"300px\"><br>\r\n            <a>procesor</a><br>\r\n            <img src=\"https://media.distrelec.com/Web/WebShopImages/landscape_large/6-/01/Kingston_KCP3L16NS8_4_30061436-01.jpg\" width=\"400px\" height=\"300px\"><br>\r\n            <a>pamięć RAM</a><br>\r\n            <img src=\"https://wordpressjk.wordpress.com/wp-content/uploads/2013/12/wejscie_wyjscie.jpg\" width=\"400px\" height=\"300px\"><br>\r\n            <a>urządzenia wejścia/wyjścia</a><br>\r\n        </div>\r\n</body>\r\n</html>', 1),
(4, 'types', '<html lang=\"pl\">\r\n<head>\r\n    <link rel=\"stylesheet\" href=\"../css/style.css\">\r\n    <meta http-equiv=\"Content-type\" content=\"text/html; charset=UTF-8\" />\r\n    <meta http-equiv=\"Content-Language\" content=\"pl\" />\r\n    <meta name=\"Author\" content=\"Jakub Budzich\" />\r\n    <title>Typy komputerów</title>\r\n</head>\r\n<body>\r\n        <div class=\"main\">\r\n    <h1>Typy komputerów</h1>\r\n    <p><h2>Współcześnie komputery dzieli się na:</h2>\r\n        komputery osobiste („PC”, z ang. personal computer)<br>\r\n        smartfony (ang. smartphone) – mają podobne podzespoły i oprogramowanie co komputery osobiste.<br>\r\n        konsola – komputer wyspecjalizowany w programach rozrywkowych. Zazwyczaj korzysta z telewizora jako głównego wyświetlacza. Posiada ograniczone oprogramowanie przygotowane do wydajnego uruchamiania programów i gier. Na niektórych modelach można zainstalować inny system operacyjny i wykorzystywać do specyficznych zastosowań, na przykład procesory graficzne konsoli PS3 nadają się na przykład do łamania różnego rodzaju kodów.<br>\r\n        komputery domowe – poprzedniki komputerów osobistych, korzystające z telewizora jako monitora.<br>\r\n        komputery mainframe – często o większych rozmiarach, których zastosowaniem jest przetwarzanie dużych ilości danych na potrzeby różnego rodzaju instytucji, pełnienie roli serwerów itp.<br>\r\n        superkomputery – największe komputery o dużej mocy obliczeniowej, używane do czasochłonnych obliczeń naukowych i symulacji skomplikowanych systemów.<br>\r\n        komputery wbudowane – (lub osadzone, ang. embedded) specjalizowane komputery służące do sterowania urządzeniami z gatunku automatyki przemysłowej, elektroniki użytkowej (np. stare telefony komórkowe itp.) czy wręcz poszczególnymi komponentami wchodzącymi w skład komputerów.<br></p>\r\n    </div>\r\n</body>\r\n</html>', 1),
(5, 'polish', '<html lang=\"pl\">\r\n<head>\r\n    <link rel=\"stylesheet\" href=\"../css/style.css\">\r\n    <meta http-equiv=\"Content-type\" content=\"text/html; charset=UTF-8\" />\r\n    <meta http-equiv=\"Content-Language\" content=\"pl\" />\r\n    <meta name=\"Author\" content=\"Jakub Budzich\" />\r\n    <title>Polskie komputery</title>\r\n</head>\r\n<body>\r\n        <div class=\"main\">\r\n    <h1>Polskie komputery</h1>\r\n    <ol>\r\n        <ul><a>Cyforwe</a>\r\n            <li>K-202</li>\r\n            <li>PRS-4</li>\r\n            <li>XYZ</li>\r\n            <li>UMC</li>\r\n            <li>Odra</li>\r\n        </ul>\r\n<ul><a>Analogowe</a>\r\n    <li>ELWAT</li>\r\n    <li>AKAT-1</li>\r\n    <li>ARR</li>\r\n</ul>\r\n</ol>\r\n</div>\r\n</body>\r\n</html>', 1),
(6, 'before', '<html lang=\"pl\">\r\n<head>\r\n    <link rel=\"stylesheet\" href=\"../css/style.css\">\r\n    <meta http-equiv=\"Content-type\" content=\"text/html; charset=UTF-8\" />\r\n    <meta http-equiv=\"Content-Language\" content=\"pl\" />\r\n    <meta name=\"Author\" content=\"Jakub Budzich\" />\r\n    <title>Maszyny poprzedzające komputer</title>\r\n</head>\r\n<body>\r\n        <div class=\"main\">\r\n    <h1>Maszyny poprzedzające komputer</h1>\r\n    <ul>\r\n        <li>maszyna do pisania</li>\r\n        <li>maszyna do księgowania</li>\r\n            <li>maszyna analityczna</li>\r\n                <li>dalekopis</li>\r\n                    <li>teleks</li>\r\n                        <li>telegraf</li>\r\n</ul>\r\n</div>\r\n</body>\r\n</html>', 1),
(7, 'movie', '<html lang=\"pl\">\r\n<head>\r\n    <link rel=\"stylesheet\" href=\"../css/style.css\">\r\n    <meta http-equiv=\"Content-type\" content=\"text/html; charset=UTF-8\" />\r\n    <meta http-equiv=\"Content-Language\" content=\"pl\" />\r\n    <meta name=\"Author\" content=\"Jakub Budzich\" />\r\n    <title>Typy komputerów</title>\r\n</head>\r\n<body>\r\n        <div class=\"main\">\r\n    <h1>Polecane przez nasza firme filmy o komputerach</h1>\r\n    <h2>Historia komputerów</h2>\r\n    <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gjVX47dLlN8\" \r\ntitle=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; \r\nencrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n<h2>Film o podzespołach komputera</h2>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ExxFxD4OSZ0\"\" \r\ntitle=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; \r\nencrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n<h2>Film o procesorach intel</h2>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GLSPub4ydiM\" \r\ntitle=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; \r\nencrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n</div>\r\n</body>\r\n</html>', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
