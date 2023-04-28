create table `rando` (
  `nom` varchar(15) NOT NULL,
  `description` varchar(180) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  /*`photo` ???,*/
  PRIMARY KEY (`nom`)
);

insert into `rando` values (
  'Exemple1',
  'blabla bla bla',
  'loin je pense',
);

commit;