-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 10, 2025 at 02:00 PM
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
(3, 2, 'Procesory'),
(4, 1, 'Laptopy'),
(5, 1, 'Komputery Stacjonarne'),
(6, 2, 'Karty Graficzne');

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
(1, 'glowna', '<div class=\"container_index\">\r\n    <div id=\"zegarek\"></div>\r\n    <div id=\"data\"></div>\r\n<div class=\"main\">\r\n    <h1>Czym jest komputer?</h1>\r\n    <p>Komputer <b>(od ang. computer);</b> dawniej: mózg elektronowy, elektroniczna maszyna cyfrowa, maszyna matematyczna\r\n         maszyna przeznaczona do przetwarzania informacji, które da się zapisać w formie ciągu cyfr albo sygnału ciągłego.<br> \r\n         Maszyna roku tygodnika <i>„Time”</i> w <u>1982 roku.</u></p>\r\n         <h1>Przykładowe zdjęcia nowoczesnych komputerów</h1>\r\n        </div>\r\n         <table class=\"table1\">\r\n        <tr>\r\n            <td><img src=\"https://as1.ftcdn.net/v2/jpg/01/56/56/62/1000_F_156566202_wj3y2vNkz2OtyMFuHVn5zFvrWft5J915.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://as1.ftcdn.net/v2/jpg/05/44/71/62/1000_F_544716203_PkX2ZAij0YWqvgDpd8P8bF32zTSxzO1K.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz3jFzLyjbSK1bhFKUy9HRpT509Qgf41-UJA&s\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2024/3/pr_2024_3_15_14_33_54_277_07.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            <td><img src=\"https://i.pinimg.com/564x/e5/50/84/e5508404258acd42aea282a26d94d41b.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            </tr>\r\n            <tr>\r\n                <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF8prToOAG2CCro17HpuQAz2jbLlSR0YeYNA&s\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://prod-api.mediaexpert.pl/api/images/gallery/thumbnails/images/38/3867030/Laptop-APPLE-MacBook-Air-2022-1.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://static.cybertron.com/clx/home/pcs-laps-section/custom-gaming-pcs.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkfe-tP6RsTYnB2Mzz1hu6atklSFZlKA8gcQ&s\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://img.freepik.com/premium-photo/gaming-pc-computer-glowing-dark-isometric-illustration-modern-computer-case_1197797-182528.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            </tr>\r\n            <tr>\r\n                <td><img src=\"https://i.pcmag.com/imagery/reviews/04B0MdrAPwZVu5RqlJsWXvw-1.fit_lpad.size_625x365.v1695330054.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://as1.ftcdn.net/v2/jpg/04/71/67/04/1000_F_471670401_BYuZ0Bn7YtYpMv3qvMGyJ7N1KtwuqV2k.jpg\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTD14B_tRhS3_pTbG3JxvV6L9YhTgwpMm6cw&s\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://logicstechnology.com/cdn/shop/articles/DALL_E_2024-03-05_19.51.31_-_The_image_should_capture_the_essence_of_a_high-performance_PC_build_guide_for_2024_focusing_on_cutting-edge_technology_and_a_sleek_modern_aesthetic.webp?v=1709686342&width=1024\" width=\"200px\" height=\"200px\"></td>\r\n                <td><img src=\"https://iwocomputers.pl/12872-large_default/laptop-msi-modern-15-a5m-213fr-156-r5-5500u-8gb-ddr4-512gb-w11-home-szary.jpg\" width=\"200px\" height=\"200px\"></td>\r\n            </tr>\r\n        </table>   \r\n        <table class=\"table2\">\r\n            <tr>\r\n            <td>\r\n            <a>Mimo że mechaniczne maszyny liczące istniały od wielu stuleci, komputery w sensie współczesnym pojawiły się dopiero w połowie <span style=\"color:blue\">XX wieku,</span> \r\n                gdy zbudowano pierwsze komputery elektroniczne. Miały one rozmiary sporych pomieszczeń i zużywały kilkaset razy więcej energii niż współczesne komputery osobiste (PC), \r\n                a jednocześnie miały miliardy razy mniejszą moc obliczeniową. <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/IMac.jpg/220px-IMac.jpg\" ALIGN=\"LEFT\">\r\n                Współcześnie są prowadzone także badania nad komputerami biologicznymi i optycznymi.</a>\r\n                <a>Komputer od typowego kalkulatora odróżnia zdolność wykonywania wielokrotnie, automatycznie powtarzanych obliczeń, według algorytmicznego wzorca zwanego programem, gdy tymczasem kalkulator może zwykle wykonywać tylko pojedyncze działania. Granica jest tu umowna, ponieważ taką definicję komputera spełniają też kalkulatory programowalne (naukowe, inżynierskie), jednak kalkulatory służą tylko do obliczeń numerycznych, podczas gdy nazwa komputer najczęściej dotyczy urządzeń wielofunkcyjnych.</a>\r\n            </div>\r\n        </td>\r\n            </tr>\r\n        </table>\r\n        <br>\r\n        <center>\r\n        <div id=\"part2\">\r\n            <h2>Wybierz kolor tła</h2>\r\n            <form method=\"POST\" name=\"background\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"żółty\" value=\"żółty\" onclick=\"changeBackground(\'#FFF000\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"czarny\" value=\"czarny\" onclick=\"changeBackground(\'#000000\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"biały\" value=\"biały\" onclick=\"changeBackground(\'#FFFFFF\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"zielony\" value=\"zielony\" onclick=\"changeBackground(\'#04AA6D\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"niebieski\" value=\"niebieski\" onclick=\"changeBackground(\'#008CBA\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"pomaranczowy\" value=\"pomarańczowy\" onclick=\"changeBackground(\'#ff8000\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"szary\" value=\"szary\" onclick=\"changeBackground(\'#c0c0c0\')\">\r\n                <input type=\"button\" class=\"colorBtn\" id=\"czerwony\" value=\"czerwony\" onclick=\"changeBackground(\'#f44336\')\">\r\n                </form>\r\n                <br>\r\n                <div id=\"animacjaTestowa1\" class=\"test-block\"><h1><b><i>Kliknij a się powiększy</i></b></h1></div>\r\n\r\n                <script>\r\n                    \r\n                    $(\"#animacjaTestowa1\").on(\"click\", function(){\r\n                        $(this).animate({\r\n                            width: \"500px\",\r\n                            fontSize: \"3em\",\r\n                            borderWidth: \"10px\",\r\n                        }, 800);\r\n                    });\r\n        \r\n                </script>\r\n<br>\r\n                <div id=\"animacjaTestowa2\" class=\"test-block\"><h1><b><i>Najedź kursorem a się powiększy</i></b></h1></div>\r\n\r\n                <script>\r\n                    $(\'#animacjaTestowa2\').on({\r\n                        \"mouseover\": function () {\r\n                            $(this).stop(true, false).animate({\r\n                                width: 500\r\n                            }, 800);\r\n                        },\r\n                        \"mouseout\": function () {\r\n                            $(this).stop(true, false).animate({\r\n                                width: 200\r\n                            }, 2000);\r\n                        }\r\n                    });\r\n                </script>\r\n                \r\n                <br>\r\n                <div id=\"animacjaTestowa3\" class=\"test-block\"><h1><b><i>Kliknij abym urósł</i></b></h1></div>\r\n\r\n                <script>\r\n\r\n                    $(\"#animacjaTestowa3\").on(\"click\", function(){\r\n                        if (!$(this).is(\":animated\")) {\r\n                            $(this).animate({\r\n                                width: \"+=\" + 50,\r\n                                height: \"+=\" + 15,\r\n                                opacity: \"+=\" + 0.1,\r\n                                duration : 10000\r\n                            })\r\n                        }\r\n                    })\r\n            </script>\r\n        </div>\r\n    </center>\r\n</div>', 1),
(2, 'history', '<div class=\"main\">\r\n        <div class=\"container_his\">\r\n        <h1>Najwybitniejsi naukowcy, których prace przyczyniły się do powstania komputerów:</h1>\r\n        <div class=\"scientist\">\r\n            <div class=\"scientist-item\">\r\n                <h3>Christopher Latham Sholes</h3>\r\n                <h4>Maszyna do pisania (1867)</h4>\r\n                <p>Stworzył pierwszą maszynę do pisania, która stała się podstawą dla późniejszych rozwoju komputerów do wprowadzania tekstu.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Blaise Pascal</h3>\r\n                <h4>Pascalina (1642)</h4>\r\n                <p>Wynalazł maszynę liczącą zwaną Pascaliną, pierwsze urządzenie mechaniczne do wykonywania obliczeń.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Gottfried Leibniz</h3>\r\n                <h4>System binarny</h4>\r\n                <p>Wprowadził system binarny, który jest podstawą nowoczesnych komputerów.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Abraham Stern</h3>\r\n                <h4>Maszyna licząca</h4>\r\n                <p>Opracował mechanizmy do automatycznych obliczeń, stanowiące fundamenty dla późniejszych urządzeń liczących.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Charles Babbage</h3>\r\n                <h4>Maszyna różnicowa</h4>\r\n                <p>Uważany za ojca współczesnych komputerów, zaprojektował maszynę różnicową i analityczną, które mogłyby obliczać funkcje matematyczne.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Ada Lovelace</h3>\r\n                <h4>Wizjonerska teoria komputerów</h4>\r\n                <p>Opracowała pierwsze teoretyczne koncepcje komputerów, które wyprzedzały jej czasy.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Claude Shannon</h3>\r\n                <h4>Teoretyczne podstawy komputerów</h4>\r\n                <p>Przekształcił algebrę Boole a w teoretyczne podstawy komputerów, wprowadzając pojęcie logiki cyfrowej.</p>\r\n            </div>\r\n\r\n            <div class=\"scientist-item\">\r\n                <h3>Alan Turing</h3>\r\n                <h4>Maszyna Turinga</h4>\r\n                <p>Twórca fundamentalnych pojęć informatyki, takich jak maszyna Turinga, stanowiącej podstawy współczesnych komputerów.</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>', 1),
(3, 'basic', '<div class=\"main\">\r\n    <div class=\"container_components\">\r\n        <h1>Podstawowe elementy komputera</h1>\r\n        <table class=\"table-components\">\r\n            <tr>\r\n                <td>\r\n                    <img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTlcEt49wLcHaiWJ4t_5SmsPaxkDemg0kiEA&s\" alt=\"Procesor\">\r\n                    <a>Procesor</a>\r\n                </td>\r\n                <td>\r\n                    <img src=\"https://www.dyski-sieciowe.pl/photo/product/f600x600/Kosc-pamieci-RAM-8GDR4A1-UD-2400-99769.jpg\" alt=\"Pamięć RAM\">\r\n                    <a>Pamięć RAM</a>\r\n                </td>\r\n                <td>\r\n                    <img src=\"https://wordpressjk.wordpress.com/wp-content/uploads/2013/12/wejscie_wyjscie.jpg\" alt=\"Urządzenia wejścia/wyjścia\">\r\n                    <a>Urządzenia wejścia/wyjścia</a>\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td>\r\n                    <img src=\"https://at-outlet.pl/img/product_media/11001-12000/toshiba_35_cala_10tb_72k_rpm_sata_256mb.jpg\" alt=\"Dysk twardy\">\r\n                    <a>Dysk twardy</a>\r\n                </td>\r\n                <td>\r\n                    <img src=\"https://komputerymarkowe.pl/36254-medium_default/plyta-glowna-gigabyte-b760-ds3h-ddr4.jpg\" alt=\"Płyta główna\">\r\n                    <a>Płyta główna</a>\r\n                </td>\r\n                <td>\r\n                    <img src=\"https://prod-api.mediaexpert.pl/api/images/gallery_500_500/thumbnails/images/55/5542056/Zasilacz-ENDORFY-Vero-L5-500W-Bronze-front-gora-bok-prawy.jpg\" alt=\"Zasilacz\">\r\n                    <a>Zasilacz</a>\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td>\r\n                    <img src=\"https://prod-api.mediaexpert.pl/api/images/gallery_500_500/thumbnails/images/41/4106430/Karta-graficzna-ASUS-Dual-Radeon-RX-6650-XT-OC-8GB-box-z-karta.jpg\" alt=\"Karta graficzna\">\r\n                    <a>Karta graficzna</a>\r\n                </td>\r\n                <td>\r\n                    <img src=\"https://prod-api.mediaexpert.pl/api/images/gallery_500_500/thumbnails/images/10/1075923/Karta-dzwiekowa-CREATIVE-Sound-Blaster-Audigy-Rx-front.jpg\" alt=\"Karta dźwiękowa\">\r\n                    <a>Karta dźwiękowa</a>\r\n                </td>\r\n                <td>\r\n                    <img src=\"https://hardwaredirect.pl/media/amasty/webp/catalog/product/cache/945dc61d9e6e06b7c17a6f3dc6234571/n/a/naped_optyczny_dell_dvd_rw_slimline_t8mfh_17155_30895_0_jpg.webp\">\r\n                    <a>Napęd optyczny</a>\r\n                </td>\r\n            </tr>\r\n        </table>\r\n    </div>\r\n</div>', 1),
(4, 'types', '<div class=\"main\">\r\n        <div class=\"container_type\">\r\n        <h1>Typy komputerów</h1>\r\n        <h2>Współcześnie komputery dzieli się na:</h2>\r\n        <div class=\"card-container\">\r\n            <div class=\"card\">\r\n                <img src=\"https://prod-api.mediaexpert.pl/api/images/gallery_500_500/thumbnails/images/59/5925196/Laptop-LENOVO-IdeaPad-Slim-5-16ABR8-82XG006EPB-frontowe-2.jpg\" alt=\"Komputer osobisty\">\r\n                <h3>Komputery osobiste</h3>\r\n                <p>Personalne urządzenia przeznaczone do użytku indywidualnego.</p>\r\n            </div>\r\n            <div class=\"card\">\r\n                <img src=\"https://www.mytrendyphone.pl/blog/5/wp-content/uploads/2021/08/iphone-12-od-apple.jpg\" alt=\"Smartfony\">\r\n                <h3>Smartfony</h3>\r\n                <p>Telefony z funkcjonalnością komputerów osobistych.</p>\r\n            </div>\r\n            <div class=\"card\">\r\n                <img src=\"https://wascom.pl/66526-large_default/Konsola-PlayStation-5---PS5-Slim.jpg\" alt=\"Konsola\">\r\n                <h3>Konsola</h3>\r\n                <p>Specjalizowane urządzenia do gier i rozrywki.</p>\r\n            </div>\r\n            <div class=\"card\">\r\n                <img src=\"https://gamer-zone.pl/wp-content/uploads/2-5.png\" alt=\"Komputery domowe\">\r\n                <h3>Komputery domowe</h3>\r\n                <p>Poprzedniki komputerów osobistych, korzystające z telewizora jako monitora.</p>\r\n            </div>\r\n            <div class=\"card\">\r\n                <img src=\"https://www.senetic.pl/blog/wp-content/uploads/2015/01/z13_450x450.jpg\" alt=\"Komputery mainframe\">\r\n                <h3>Komputery mainframe</h3>\r\n                <p>Urządzenia do przetwarzania dużych ilości danych dla instytucji.</p>\r\n            </div>\r\n            <div class=\"card\">\r\n                <img src=\"https://ocs-pl.oktawave.com/v1/AUTH_2887234e-384a-4873-8bc5-405211db13a2/spidersweb/2024/04/superkomputer-agh-helios-min-800x800.jpg\" alt=\"Superkomputery\">\r\n                <h3>Superkomputery</h3>\r\n                <p>Maksymalna moc obliczeniowa do złożonych obliczeń i symulacji.</p>\r\n            </div>\r\n            <div class=\"card\">\r\n                <img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSokEB7BcBP35dtv_0GJj5UlP0W3USuEeUVKw&s\" alt=\"Komputery wbudowane\">\r\n                <h3>Komputery wbudowane</h3>\r\n                <p>Specjalizowane komputery do sterowania urządzeniami.</p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', 1),
(5, 'polish', '<div class=\"main\">\r\n        <div class=\"container_pl\">\r\n        <h1>Polskie komputery</h1>\r\n            <div class=\"list-section\">\r\n            <a href=\"#\">Cyfrowe</a>\r\n            <ol>\r\n                <li>K-202</li>\r\n                <li>PRS-4</li>\r\n                <li>XYZ</li>\r\n                <li>UMC</li>\r\n                <li>Odra</li>\r\n            </ol>\r\n        </div>\r\n        <div class=\"list-section\">\r\n            <a href=\"#\">Analogowe</a>\r\n            <ol>\r\n                <li>ELWAT</li>\r\n                <li>AKAT-1</li>\r\n                <li>ARR</li>\r\n            </ol>\r\n        </div>\r\n    </div>\r\n</div>', 1),
(6, 'before', '<div class=\"main\">\r\n    <div class=\"container\">\r\n        <h1>Maszyny poprzedzające komputer</h1>\r\n        <ul class=\"machine-list\">\r\n            <li class=\"machine-item\">\r\n                <img src=\"https://img.pakamera.net/i1/7/110/dodatki-rozne-walizkowa-maszyna-do-pisania-scheidegger-princess-matic-niemcy-lata-60-12692529_36747110.jpg\" alt=\"Maszyna do pisania\">\r\n                <h3>Maszyna do pisania</h3>\r\n                <p>Wynaleziona w XIX wieku, umożliwiała szybkie tworzenie dokumentów pisemnych.</p>\r\n            </li>\r\n            <li class=\"machine-item\">\r\n                <img src=\"https://ireland.apollo.olxcdn.com/v1/files/su7n4l82ulps1-PL/image\" alt=\"Maszyna do księgowania\">\r\n                <h3>Maszyna do księgowania</h3>\r\n                <p>Mechaniczne urządzenie do obliczeń używane w biurach księgowych.</p>\r\n            </li>\r\n            <li class=\"machine-item\">\r\n                <img src=\"https://s.ciekawostkihistoryczne.pl/uploads/2012/05/800px-AnalyticalMachine_Babbage_London.jpg\" alt=\"Maszyna analityczna\">\r\n                <h3>Maszyna analityczna</h3>\r\n                <p>Stworzona przez Charlesa Babbage, uznawana za przodka komputera.</p>\r\n            </li>\r\n            <li class=\"machine-item\">\r\n                <img src=\"https://pgmilitaria.pl/9340-thickbox_default/dalekopis-wojskowy-t523-niemieckiej-firmy-rft.jpg\" alt=\"Dalekopis\">\r\n                <h3>Dalekopis</h3>\r\n                <p>Urządzenie do przesyłania wiadomości tekstowych na odległość.</p>\r\n            </li>\r\n            <li class=\"machine-item\">\r\n                <img src=\"https://www.aetherltd.com/images/frontview1med.jpg\" alt=\"Teleks\">\r\n                <h3>Teleks</h3>\r\n                <p>System telekomunikacyjny używany do przesyłania tekstu między urządzeniami.</p>\r\n            </li>\r\n            <li class=\"machine-item\">\r\n                <img src=\"https://www.lampywcentrum.pl/media/catalog/product/cache/a3a85c35a7715136c521477888cd1681/I/d/Id_12064.jpg\" alt=\"Telegraf\">\r\n                <h3>Telegraf</h3>\r\n                <p>Rewolucyjne urządzenie do komunikacji na duże odległości za pomocą sygnałów.</p>\r\n            </li>\r\n        </ul>\r\n    </div>\r\n</div>', 1),
(7, 'movie', '        <div class=\"main\">\r\n            <div class=\"container_movie\">\r\n    <h1>Polecane przez nasza firme filmy o komputerach</h1>\r\n    <h2>Historia komputerów</h2>\r\n    <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gjVX47dLlN8\" \r\ntitle=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; \r\nencrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n<h2>Film o podzespołach komputera</h2>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ExxFxD4OSZ0\" \r\ntitle=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; \r\nencrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n<h2>Film o procesorach intel</h2>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GLSPub4ydiM\" \r\ntitle=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; \r\nencrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n</div>\r\n</div>\r\n', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `opis` text DEFAULT NULL,
  `data_utworzenia` date NOT NULL DEFAULT current_timestamp(),
  `data_modyfikacji` date DEFAULT current_timestamp(),
  `data_wygasniecia` date DEFAULT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `podatek_vat` decimal(4,2) NOT NULL,
  `ilosc` int(11) NOT NULL DEFAULT 0,
  `status_dostepnosci` tinyint(1) NOT NULL DEFAULT 1,
  `gabaryt` enum('mały','średni','duży','transport') DEFAULT 'mały',
  `zdjecie` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc`, `status_dostepnosci`, `gabaryt`, `zdjecie`, `category_id`) VALUES
(1, 'MacBook Air M3', 'Laptop APPLE MacBook Air świetnie sprawdza się zarówno podczas pracy, jak i w czasie rozrywki, a zasilany przez czip M3 staje się jeszcze bardziej wszechstronny niż jego fantastyczni poprzednicy. ', '2025-01-02', '2025-01-02', '2025-01-30', 3600.00, 23.00, 10, 1, 'średni', 'https://prod-api.mediaexpert.pl/api/images/gallery_500_500/thumbnails/images/64/6432400/Laptop-APPLE-MacBook-Air-2024-01.jpg', 4),
(2, 'AMD FX-8350', 'procesor AMD w swietnej cenie ', '2025-01-03', '2025-01-05', '2025-01-31', 210.00, 23.00, 12, 1, 'mały', 'https://m.media-amazon.com/images/I/614qlodNVuL._AC_UF1000,1000_QL80_.jpg', 3),
(3, 'G4MER PC', 'Super wydajny komputer dla wymagających graczy ', '2025-01-03', '2025-01-03', '2025-01-29', 5000.00, 23.00, 3, 1, 'duży', 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-medium,,2023/10/pr_2023_10_20_14_5_52_390_00.jpg', 5),
(4, 'RTX 3050', 'Karta Graficzna NVidia RTX', '2025-01-10', '2025-01-10', '2025-01-31', 1029.00, 23.00, 5, 1, 'średni', 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2025/1/pr_2025_1_9_7_55_11_994_00.jpg', 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
