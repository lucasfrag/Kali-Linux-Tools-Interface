-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 17-Maio-2019 às 11:11
-- Versão do servidor: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kali`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `commands`
--

CREATE TABLE `commands` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `description` text,
  `examples` text,
  `tool` int(11) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `command` text,
  `example` varchar(150) DEFAULT NULL,
  `sudo` int(1) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `commands`
--

INSERT INTO `commands` (`id`, `name`, `description`, `examples`, `tool`, `type`, `command`, `example`, `sudo`, `category`) VALUES
(1, 'Scan specific ports', NULL, 'nmap -p 80,443 8.8.8.8', 1, 'input', '-p', 'Specific: 80,443 OR Range: 1-65536', NULL, 'PORT SPECIFICATION AND SCAN ORDER'),
(28, 'Ping Scan - disable port scan', NULL, NULL, 1, 'checkbox', '-sL', NULL, NULL, 'HOST DISCOVERY'),
(29, 'Skip host discovery', NULL, NULL, 1, 'checkbox', '-Pn', NULL, NULL, 'HOST DISCOVERY'),
(30, 'Trace hop path to each host', NULL, NULL, 1, 'checkbox', '--traceroute', NULL, NULL, 'HOST DISCOVERY'),
(31, 'Use OS\'s DNS resolver', NULL, NULL, 1, 'checkbox', '--system-dns', NULL, NULL, 'HOST DISCOVERY'),
(32, 'Exclude hosts/networks', NULL, NULL, 1, 'input', '--exclude', 'Example: 192.168.0.1', NULL, 'TARGET SPECIFICATION'),
(33, 'Enable OS detection', NULL, NULL, 1, 'checkbox', '-O', NULL, NULL, 'OS DETECTION'),
(34, 'IP protocol scan', NULL, NULL, 1, 'checkbox', '-sO', NULL, NULL, 'SCAN TECHNIQUES'),
(35, 'FTP bounce scan', NULL, NULL, 1, 'checkbox', '-b', NULL, NULL, 'SCAN TECHNIQUES'),
(36, 'Exclude the specified ports from scanning', NULL, NULL, 1, 'input', '--exclude-ports', 'Specific: 80,443 OR Range: 1-65536', NULL, 'PORT SPECIFICATION AND SCAN ORDER'),
(37, 'Scan 100 most common ports', NULL, NULL, 1, 'checkbox', '-F', NULL, NULL, 'PORT SPECIFICATION AND SCAN ORDER'),
(40, 'Service detection (Standard)', NULL, NULL, 1, 'checkbox', '-sV', NULL, NULL, 'SERVICE/VERSION DETECTION'),
(42, 'OS detection, version, script scanning, and traceroute', NULL, NULL, 1, 'checkbox', '-A', NULL, NULL, 'MISC'),
(43, 'Print version number', NULL, NULL, 1, 'show', '-V', NULL, NULL, 'MISC'),
(44, 'Print this help summary page.', NULL, NULL, 1, 'show', '-h', NULL, NULL, 'MISC'),
(45, 'Enable IPv6 scanning', NULL, NULL, 1, 'checkbox', '-6', NULL, NULL, 'MISC'),
(47, 'UDP Scan', NULL, NULL, 1, 'checkbox', '-sU', NULL, NULL, 'SCAN TECHNIQUES'),
(48, 'Scan for vulnerabilities', NULL, NULL, 1, 'checkbox', '-sS -sC -Pn --script vuln', 'nmap -sS -sC -Pn --script vuln scanme.nmap.org ', NULL, NULL),
(49, 'Scan for exploits', NULL, NULL, 1, 'checkbox', '-Pn -sS -sC --script exploit', 'nmap -Pn -sS -sC --script exploit scanme.nmap.org  ', NULL, NULL),
(50, 'Scan to test DoS attack vulnerability', NULL, NULL, 1, 'checkbox', '-Pn -sS -sC --script dos', 'nmap -Pn -sS -sC --script dos scanme.nmap.org ', NULL, NULL),
(52, 'Perform DoS attacks with a simulator', NULL, NULL, 1, 'checkbox', '--max-parallelism 750 -Pn --script http-slowloris --script-args http-slowloris.runforever=true', 'nmap --max-parallelism 750 -Pn --script http-slowloris --script-args http-slowloris.runforever=true scanme.nmap.org', NULL, NULL),
(53, 'Find subdomains', NULL, NULL, 1, 'checkbox', '-p 80 --script dns-brute.nse', 'nmap -p 80 --script dns-brute.nse vulnweb.com', NULL, NULL),
(54, 'Scan all 65535 ports', NULL, NULL, 1, 'checkbox', '-p-', NULL, NULL, NULL),
(55, 'Scan using TCP connect', NULL, NULL, 1, 'checkbox', '-sT', NULL, NULL, 'SCAN TECHNIQUES'),
(56, 'Scan UDP ports', NULL, NULL, 1, 'checkbox', '-sU -p 123,161,162', NULL, NULL, NULL),
(57, 'Service detection (Agressive)', NULL, NULL, 1, 'checkbox', '--version-intensity 5', NULL, NULL, 'SERVICE/VERSION DETECTION'),
(58, 'Service detection (Lighter)', NULL, NULL, 1, 'checkbox', '-sV --version-intensity 0', NULL, NULL, 'SERVICE/VERSION DETECTION'),
(59, 'Scan using default safe scripts', NULL, NULL, 1, 'checkbox', '-sV -sC', NULL, NULL, NULL),
(60, 'Scan for UDP DDOS reflectors', NULL, NULL, 1, 'checkbox', '–sU –A –PN –n –pU:19,53,123,161 –script=ntp-monlist,dns-recursion,snmp-sysdescr', NULL, NULL, NULL),
(61, 'Gather page titles from HTTP services', NULL, NULL, 1, 'checkbox', '--script=http-title', NULL, NULL, 'HTTP Service Information'),
(62, 'Get HTTP headers of web services', NULL, NULL, 1, 'checkbox', '--script=http-headers', NULL, NULL, 'HTTP Service Information'),
(63, 'Find web apps from known paths', NULL, NULL, 1, 'checkbox', '--script=http-enum', NULL, NULL, NULL),
(64, 'Only show open (or possibly open) ports', NULL, NULL, 1, 'checkbox', '--open', NULL, NULL, NULL),
(65, 'Show host interfaces and routes', NULL, NULL, 1, 'checkbox', '--iflist', NULL, NULL, NULL),
(66, 'Scan using IP protocol ping', NULL, NULL, 1, 'checkbox', '-PO', NULL, NULL, NULL),
(67, 'Scan using UDP ping', NULL, NULL, 1, 'checkbox', '-PU', NULL, NULL, NULL),
(68, 'TCP Fin scan to check firewall', NULL, NULL, 1, 'checkbox', '-sF', NULL, NULL, 'Scan a firewall for security weakness'),
(69, 'TCP Xmas scan to check firewall', NULL, NULL, 1, 'checkbox', '-sX', NULL, NULL, 'Scan a firewall for security weakness'),
(70, 'TCP Null Scan to fool a firewall to generate a response', NULL, NULL, 1, 'checkbox', '-sN', NULL, NULL, 'Scan a firewall for security weakness'),
(71, 'Perform a DNS TLD expansion', NULL, NULL, 3, 'checkbox', '-t', NULL, NULL, NULL),
(72, 'Perform a DNS brute force', NULL, NULL, 3, 'checkbox', '-c', NULL, NULL, NULL),
(73, 'Perform a DNS reverse query', NULL, NULL, 3, 'checkbox', '-n', NULL, NULL, NULL),
(74, 'Use this DNS server', NULL, NULL, 3, 'input', '-e', 'Set a DNS server', NULL, NULL),
(75, 'Limit the number of results to work with', NULL, NULL, 3, 'input', '-l', 'Google goes from 100 to 100', NULL, NULL),
(76, 'Start in result number', NULL, NULL, 3, 'input', '-s', 'Default 0', NULL, NULL),
(77, 'Data source', NULL, NULL, 3, 'input', '-b', 'Ex.: google,bing,linkedin', NULL, NULL),
(78, 'Use this source address', NULL, NULL, 8, 'input', '-S', NULL, NULL, NULL),
(79, 'Limit time to wait per try', NULL, NULL, 8, 'input', '-t', NULL, NULL, NULL),
(80, 'Don\'t query IPv6 servers', NULL, NULL, 8, 'checkbox', '-4', NULL, NULL, NULL),
(81, 'Show all details and informations', NULL, NULL, 8, 'checkbox', '-v', NULL, NULL, NULL),
(82, 'Retry limit', NULL, NULL, 8, 'input', '-r', 'Ex: 1', NULL, NULL),
(83, 'Specific the register type', NULL, NULL, 8, 'input', '-q', 'Ex: A, AAA, MX, NS, TXT', NULL, NULL),
(84, 'Enable overview of received answers', NULL, NULL, 8, 'checkbox', '-o', NULL, NULL, NULL),
(85, 'Enable negative cache', NULL, NULL, 8, 'checkbox', '-C', NULL, NULL, NULL),
(86, 'Disable local caching', NULL, NULL, 8, 'checkbox', '-c', NULL, NULL, NULL),
(87, 'Verify host name and search for virtual hosts', NULL, NULL, 3, 'checkbox', '-v', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `fullname` varchar(150) DEFAULT NULL,
  `categories` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `github` varchar(500) DEFAULT NULL,
  `released` tinytext,
  `avatar` varchar(100) DEFAULT NULL,
  `cmd` varchar(100) DEFAULT NULL,
  `target` varchar(10) DEFAULT NULL,
  `resume` text,
  `category` varchar(100) DEFAULT NULL,
  `category2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tools`
--

INSERT INTO `tools` (`id`, `name`, `fullname`, `categories`, `description`, `site`, `github`, `released`, `avatar`, `cmd`, `target`, `resume`, `category`, `category2`) VALUES
(1, 'Nmap', 'Nmap: the Network Mapper', 'information-gathering  vulnerability -analysis', 'https://tools.kali.org/information-gathering/nmap', 'https://insecure.org/', NULL, 'Yes', 'assets/img/nmap.jpg', 'nmap', NULL, 'Nmap (“Network Mapper”) is a free and open source (license) utility for network discovery and security auditing. Many systems and network administrators also find it useful for tasks such as network inventory, managing service upgrade schedules, and monitoring host or service uptime.', 'Information Gathering', 'Vulnerability Analysis'),
(2, 'BetterCap', 'bettercap', 'sniffing-spoofing', 'https://tools.kali.org/sniffingspoofing/bettercap', 'https://www.bettercap.org/', NULL, NULL, 'assets/img/bettercap.jpg', 'bettercap', NULL, NULL, 'Sniffing & Spoofing', NULL),
(3, 'theHarvester', 'theHarvester', 'information- gathering', 'https://tools.kali.org/information-gathering/theharvester', NULL, 'https://github.com/laramies/theHarvester', 'Yes', NULL, 'python usr/lib/theHarvester/theHarvester.py', '-d', 'The objective of this program is to gather emails, subdomains, hosts, employee names, open ports and banners from different public sources like search engines, PGP key servers and SHODAN computer database.', 'Information Gathering', NULL),
(4, 'Nikto', 'Nikto', 'information-gathering  web-applications', 'https://tools.kali.org/information-gathering/nikto', 'https://www.cirt.net/Nikto2', 'https://github.com/sullo/nikto', NULL, 'assets/img/nikto.png', 'nikto', '-h', NULL, 'Information Gathering', 'Web Applications'),
(5, 'Aircrack-ng', 'Airckack-ng', 'wireless- attacks', 'https://tools.kali.org/wireless-attacks/aircrack-ng', 'https://www.aircrack-ng.org/doku.php?id=aircrack-ng', 'https://gitlab.com/kalilinux/packages/aircrack-ng', NULL, NULL, NULL, NULL, NULL, 'Wireless Attacks', NULL),
(6, 'THC-Hydra', 'THC-Hydra', 'password-attacks', 'https://tools.kali.org/password-attacks/hydra', 'http://freeworld.thc.org/thc-hydra/', NULL, NULL, 'assets/img/hydrathc.jpg', NULL, NULL, NULL, 'Password Attacks', NULL),
(7, 'WPScan', 'WordPress Vulnerability Scanner', 'web-applications', 'https://tools.kali.org/web-applications/wpscan', 'http://wpscan.org/', 'https://github.com/wpscanteam/wpscan', NULL, 'assets/img/wpscan.png', 'wpscan', '--url', 'WPScan is a black box WordPress vulnerability scanner that can be used to scan remote WordPress installations to find security issues.', 'Web Applications', NULL),
(8, 'Dnstracer', 'dnstracer', 'information-gathering', 'https://tools.kali.org/information-gathering/dnstracer', 'http://freshmeat.net/projects/dnstracer', NULL, 'Yes', NULL, 'dnstracer', NULL, 'dnstracer determines where a given Domain Name Server (DNS) gets its information from for a given hostname, and follows the chain of DNS servers back to the authoritative answer.', 'Information Gathering', NULL),
(10, 'Sqlninja', 'Sqlninja', 'vulnerability-analysis  web-applications', 'https://tools.kali.org/vulnerability-analysis/sqlninja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vulnerability Analysis', 'Web Applications'),
(11, 'Powerfuzzer', 'Powerfuzzer', 'vulnerability-analysis  web-applications', 'https://tools.kali.org/vulnerability-analysis/powerfuzzer', 'https://www.powerfuzzer.com/', NULL, NULL, NULL, NULL, NULL, NULL, 'Vulnerability Analysis', 'Web Applications'),
(12, 'ProxyStrike', 'ProxyStrike', 'web-applications', 'https://tools.kali.org/web-applications/proxystrike', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web Applications', NULL),
(14, 'Dnsenum', 'Dnsenum', 'information-gathering', 'https://tools.kali.org/information-gathering/dnsenum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Information Gathering', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commands`
--
ALTER TABLE `commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
