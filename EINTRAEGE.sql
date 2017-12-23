-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 19. August 2010 um 17:35
-- Server Version: 5.0.51
-- PHP-Version: 5.3.3
--
-- Sicherheitskopie, BeachExplorere DB
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `db220224-lexikon`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `EINTRAEGE`
--
-- Erzeugt am: 18. August 2010 um 09:53
-- Aktualisiert am: 19. August 2010 um 17:34
--

DROP TABLE IF EXISTS `EINTRAEGE`;
CREATE TABLE IF NOT EXISTS `EINTRAEGE` (
  `ID` int(10) NOT NULL auto_increment,
  `NAME` varchar(50) default NULL,
  `LATINNAME` varchar(50) default NULL,
  `DESCRIPTION` varchar(5000) default NULL,
  `PHOTOS` varchar(5000) default NULL,
  `LONGITUDE` varchar(5000) default NULL,
  `LATITUDE` varchar(5000) default NULL,
  `LINKS` varchar(5000) default NULL,
  `DATES` varchar(5000) default NULL,
  `COUNT` int(10) default NULL,
  `ATTRIBUTES` varchar(5000) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `EINTRAEGE`
--

INSERT INTO `EINTRAEGE` (`ID`, `NAME`, `LATINNAME`, `DESCRIPTION`, `PHOTOS`, `LONGITUDE`, `LATITUDE`, `LINKS`, `DATES`, `COUNT`, `ATTRIBUTES`) VALUES
(1, 'Miesmuschel', 'Mytilus edulis', 'Miesmuscheln (Mytilus), von mittelhochdeutsch mies für ''Moos'', auch Pfahlmuscheln genannt, sind eine weltweit verbreitete Gattung der Muscheln (Bivalvia). Nachdem die Larven sich etwa vier Wochen freischwebend als Plankton entwickelt haben, befestigen sie sich mit Byssusfäden in Küstenregionen, bevorzugt im Brackwasser von Flussmündungen und Wattgebieten an Steinen, Pfählen, Schill und Festsand. Miesmuscheln haben eine graue bis blau-violette, etwa 5 bis 10 Zentimeter lange Schale von länglich ovaler Form.', 'PHOTOS/Miesmuschel1.jpg', ',54.89576947,54.89576947', ',8.36690306,8.36690306', 'http://www.schutzstation-wattenmeer.de/index.php?id=251&L=0&no_cache=1&sword_list[0]=miesmuschel', '2010-08-18 10:22:49+2010-08-19 16:17:51', 2, 'mies, muschel, Muschel, Mies, Blau, blau, oval, Byssus, Fäden, Faden, 5cm, 5, fünf, 10cm, 10, cm, fuenf, zehn, zentimeter, dunkelblau, dunkel'),
(2, 'Gemeine Strandkrabbe', 'Carcinus maenas', 'Die Gemeine Strandkrabbe (Carcinus maenas) ist eine sehr häufige und weit verbreitete Krabbenart der Küsten. Sie ist ein anpassungsfähiger Allesfresser und gilt als Schädling in der Fischerei-Industrie. Ihr ursprüngliches Verbreitungsgebiet ist die Atlantikküste Europas und Nordafrikas. Die Krabbe wurde durch die Wirkung des Menschen in andere Regionen eingeführt, so dass sie inzwischen als fast weltweit verbreitet gilt. Außerhalb ihres ursprünglichen Verbreitungsareals kann sie als so genannte invasive Art eine Vielzahl von direkten und indirekten ökologischen Auswirkungen auf andere Arten, Lebensgemeinschaften oder Biotope haben.', 'PHOTOS/Gemeine%20Strandkrabbe1.jpg', ',55.04638', ',8.397009', 'http://www.schutzstation-wattenmeer.de/index.php?id=21&L=0&no_cache=1&sword_list[0]=strandkrabbe', '2010-05-05 12:08:15', 1, 'Krebs, krabbe, krebs, Strandkrabbe, gemeine, Allesfresser, allesfresser'),
(3, 'Kegelrobbe', 'Halichoerus grypus', 'Die Kegelrobbe hat ihren Namen wegen ihres langen, kegelförmigen Kopfes bekommen, der ihr im englischen auch den Namen "horsehead" einbrachte. In den meisten anderen Ländern heißt sie "Graue Robbe", obwohl die Männchen dunkel mit hellen Flecken sind und die Weibchen hell mit dunklen Flecken.', 'PHOTOS/Kegelrobbe1.jpg', ',54.844199', ',8.372955', 'http://www.schutzstation-wattenmeer.de/wissen/wissen/tiere/saeuger/kegelrobbe/', '2010-05-12 17:21:32', 1, 'robbe, kegel, säuger, säugetier, grau, hund, see, seehund, heuler, weiß, weiss'),
(4, 'Stichling', 'Gasterosteus aculeatus', 'Der Stichling lebt räuberisch von Kleintieren und Fischlaich und wird selbst oft von größeren Fischen oder von Vögeln erbeutet - vom Eisvogel bis zum Graureiher. Die drei kräftigen Rückenstacheln und die Stacheln der Brustflossen schützen nur gegen kleine Räuber, und erst die hohe Fortpflanzungsrate sichert das überleben des Stichlings. Er ist von Alaska bis zum Schwarzen Meer verbreitet und kann bis zu 3 Jahre alt werden.', 'PHOTOS/Stichling1.jpg', ',54.823832,54.85843', ',8.295364,8.308411', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/fische/stichling/', '2010-05-20 18:23:56', 2, 'Stich, fisch, stichling, räuber, fleischfresser, raubtier, beute, wanderfisch, '),
(5, 'Scholle', 'Pleuronectes platessa', 'Schollen laichen im Winter bei Wassertemperaturen von > 6° C in bestimmten Gebieten der Nordsee, wobei ein Weibchen 50.000 bis 520.000 Eier abgeben kann. 10 - 20 Tage nach der Befruchtung schlüpfen die 6 - 7 mm großen Larven. Sie sind noch symmetrisch "fischförmig" und leben im Freiwasser. Die Umwandlung zum Plattfisch beginnt mit einer Größe von 10 - 12 mm. Dabei wandert das linke Auge auf die rechte Kopfseite, und die linke Körperseite wird zur Unterseite.', 'PHOTOS/Scholle1.jpg', ',54.775148', ',8.300536', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/fische/scholle/', '2010-08-18 10:29:26', 1, 'flunder, platt, fisch, scholle, auge, flach'),
(6, 'Nordseegarnele', 'Crangon crangon', 'Nordseegarnelen sind langschwänzige Zehnfußkrebse von bis zu 8 cm Länge. Sie sind sandfarben, haben kleine Scheren und lange Fühler und vergraben sich meist flach im Sand. Mit der Flut wandern sie auf die Wattflächen hinauf, mit der Ebbe zurück in die Priele.  Sowohl als Räuber als auch als Beutetier ist die Garnele eine Schlüsselart im ökologischen Gefüge des Wattenmeeres.', 'PHOTOS/Nordseegarnele.jpg', ',54.90378022', ',8.32234418', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/krebstiere/nordseegarnele/', '2010-05-20 18:29:46', 1, 'garnele, krabben, krebse, krabbenbrötchen, krabbenbroetchen, nordseekrabbe, nordseegarnele, scheren, schwanz, lang'),
(7, 'Seepocke', 'Balanidae', 'Seepocken gehören zur weltweit verbreiteten Gruppe der Rankenfußkrebse. Sie besitzen anstelle von Beinen und Scheren fächerförmige "Rankenfüße", mit denen sie feine Schwebstoffe und Planktonorganismen aus dem Seewasser filtern. Mit dem Kopf sitzen sie auf Hartgrund fest, ein kegelförmiges Kalkgehäuse schützt den Körper gegen Austrocknung und Fressfeinde.', 'PHOTOS/seepocke1.jpg', ',54.89556497', ',8.36187344', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/krebstiere/seepocke/', '2010-08-17 21:13:52', 1, 'see, pocke, seepocke, ranken, krebs, stein, auf, filter, filtrierer, ansiedlung, steine, steinen, kalk, panzer'),
(8, 'Pazifische Auster', 'Crassostrea pacifica', 'Wie alle Muscheln filtert sie Pazifische Auster Plankton aus dem Wasser, wie alle Austern sitzt sie dabei festgewachsen auf Muschelschalen oder Steinen. Um Eier bilden zu können, brauchen die Pazifik-austern jedoch Temperaturen von 22 Grad Celsius oder mehr. Daher kommt sie nur ausnahmsweise im Wattenmeer zur Fortpflanzung.', 'PHOTOS/Pauster1.jpg', ',55.005804', ',8.420742', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/muscheln/pazif-auster/', '2010-05-20 18:34:42', 1, 'auster, pazifik, sylt, drahtkorb, pazifische, pazifische auster'),
(9, 'Herzmuschel', 'Cerastoderma edule', 'Die Herzmuschel ist die wohl häufigste Muschel im Wattenmeer. Ihren Namen hat sie vom herzförmigen Körperumriss bei seitlicher Betrachtung des Gehäuses. Unverwechselbar ist sie durch die wellige Außenstruktur ihrer Schale. Herzmuscheln sitzen 1 cm tief im Boden und filtrieren Plankton aus dem Wasser. Eine 3 cm große Herzmuschel filtriert stündlich 2,5 Liter Wasser! Falls sie einmal freigespült wird, kann sie sich mit ihrem Grabfuß schnell wieder in Boden vergraben.', 'PHOTOS/Herzmuschel.jpg', ',54.957709', ',8.360252', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/muscheln/herzmuschel/', '2010-05-20 18:37:05', 1, 'herz, muschel, form, herzform, wellig, wellen, hell, gestreift, im, boden, wattboden'),
(10, 'Sandklaffmuschel', 'Mya arenaria', 'Von der Gezeitenzone bis in 70 m Tiefe ist die Sandklaffmuschel in fast allen Meeren der Nordhalbkugel anzutreffen. Nach der letzten Eiszeit kam sie nur noch an der amerikanischen Ostküste vor, wurde dann aber vermutlich schon von den Wikingern als "Proviant" in die Nordsee verschleppt. Neuerdings breitet sie sich auch im Pazifik in Alaska und Kanada aus, wohin sie mit Zucht- austern verschleppt worden ist.', 'PHOTOS/sandklaffmuschel1.jpg', ',54.89576947', ',8.36690306', 'http://www.schutzstation-wattenmeer.de/wissen/tiere/muscheln/sandklaffmuschel/', '2010-08-18 23:35:44', 73, 'sand, sandklaffmuschel, sandklaff, oval, klaffen,spalt, gehäuse, muschel, gehaeuse, schale, hell, groß, gross');
