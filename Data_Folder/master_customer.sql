
CREATE TABLE `master_customer` (
  `customer_id` int(11) NOT NULL,
  `name_customer` varchar(50) NOT NULL,
  `desc_customer` float NOT NULL,
  `created_at` date DEFAULT NULL,
  `Form8n9` varchar(20) NOT NULL,
  `EngineeringDesign` varchar(20) NOT NULL,
  `SiteOwner` varchar(20) NOT NULL,
  `ElectricBill` varchar(20) NOT NULL,
  `Declaration` varchar(20) NOT NULL,
  `NemasReport` varchar(20) NOT NULL,
  `FormLP` varchar(20) NOT NULL,
  `STPublicLicense` varchar(20) NOT NULL,
  `LicenseDate` varchar(10) DEFAULT '(N.A)',
  `TnC` varchar(20) NOT NULL,
  `TnCDate` varchar(10) DEFAULT '(N.A)',
  `CDate` varchar(10) DEFAULT 'WaitingNEM',
  `Upload` varchar(10) NOT NULL DEFAULT 'Pending',
  `NEMCO` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- sample Data

INSERT INTO `master_customer` (`customer_id`, `name_customer`, `desc_customer`, `created_at`, `Form8n9`, `EngineeringDesign`, `SiteOwner`, `ElectricBill`, `Declaration`, `NemasReport`, `FormLP`, `STPublicLicense`, `LicenseDate`, `TnC`, `TnCDate`, `CDate`, `Upload`, `NEMCO`) VALUES
(4, 'SFS', 1000, '2020-09-15', 'Done', 'No Need', 'No Need', 'Done', 'Done', 'Done', 'No Need', 'Done', '(N.A)', 'Pending', '(N.A)', 'WaitingNEM', 'Pending', 'Pending'),
(5, 'Infinity Sdn', 1000, '2020-09-15', 'Done', 'Done', 'No Need', 'Done', 'Done', 'Done', 'Pending', 'Done', '2020-09-15', 'Done', '(N.A)', 'WaitingNEM', 'Pending', 'Pending');


ALTER TABLE `master_customer`
  ADD PRIMARY KEY (`customer_id`);


ALTER TABLE `master_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

