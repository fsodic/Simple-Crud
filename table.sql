CREATE TABLE IF NOT EXISTS `product` (
`idproduct` int(10) NOT NULL,
  `product_nama` varchar(100) NOT NULL,
  `product_berat` int(10) NOT NULL,
  `product_deskripsi` text NOT NULL,
  `product_harga` decimal(10,2) NOT NULL,
  `product_stock` int(6) NOT NULL,
  `product_gambar` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `user` (
`iduser` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `user` (`iduser`, `username`, `password`, `fullname`) VALUES
(1, 'admin', 'admin1234', 'Admin Toko');

ALTER TABLE `product`
 ADD PRIMARY KEY (`idproduct`);

ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`);

ALTER TABLE `product`
MODIFY `idproduct` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

ALTER TABLE `user`
MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;