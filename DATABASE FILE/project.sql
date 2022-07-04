create table `branch`(
    `branch_name` varchar(25),
    `assets` float(13,2)
);

create table `account`(
    `account_number` int(10) not null AUTO_INCREMENT,
    `branch_name` varchar(25),
    `balance` float(12,2),
    primary key(`account_number`)
);
create table `depositor`(
    `customer_id` int(10),
    `account_number` int(10)
);
-- create table `customer`(
--     `customer_id` varchar(10),
--     `customer_name` varchar(35),
--     `customer_city` varchar(25),
--     `customer_street` varchar(25)
-- );
create table `borrower`(
    `customer_id` int(10),
    `loan_number` varchar(12)
);
create table `loan`(
    `loan_number` varchar(12),
    `branch_name` varchar(25),
    `amount` float(12,2)
);
create table `registration`(
    `customer_id` int(10) not null AUTO_INCREMENT,
    `customer_name` varchar(35) not null,
    `gender` varchar(1) not null,
    `dob` date not null,
    `mobile` varchar(10) not null,
    `email` varchar(35),
    `citizenship` varchar(25) not null,
    `customer_city` varchar(25),
    `customer_street` varchar(25),
    `branch_name` varchar(25) not null,
    `pin` varchar(6) not null,
    `InDtTm` DATETIME DEFAULT CURRENT_TIMESTAMP,
    primary key (`customer_id`)
);

alter table `branch` add  primary key (`branch_name`);

alter table `branch` add constraint `ck` check (`branch_name` in (
					  "Kathmandu","Pokhara","Biratnagar","Janakpur","Bharatpur","Bigunj",
                      "Itahari","Lalitpur","Nepalgunj","Dhangadhi","Dharan","Hetauda","Bhaktapur",
                      "Butwal","Kritipur","Tulsipur",
                      "Siddharthanagar","Birendranagar","Tikapur","Ghorahi","Panauti",
                      "Gaighat","Rajbiraj","Baglung", "Tansen"));

alter table `registration` add constraint `ck` check (`gender` in ("m","f"));                  

alter table `loan` add  primary key (`loan_number`);


alter table `account` add constraint `fk_const` foreign key (`branch_name`)
references `branch`(`branch_name`) ; 

alter table `depositor` add constraint `fk1_const` foreign key (`customer_id`)
references `registration`(`customer_id`);

alter table `depositor` add constraint `fk2_const` foreign key (`account_number`)
references `account`(`account_number`);

alter table `loan` add constraint `fk3_const` foreign key (`branch_name`)
references `branch`(`branch_name`);

alter table `borrower` add constraint `fk6_const` foreign key (`loan_number`)
references `loan`(`loan_number`);

alter table `borrower` add constraint `fk4_const` foreign key (`customer_id`)
references `registration`(`customer_id`);


alter table `registration` add constraint `fk5_const` foreign key (`branch_name`)
references `branch`(`branch_name`);

alter table `registration` add constraint `uq_const` unique key (`mobile`);

alter table `registration` add constraint `uq1_const` unique key (`email`);

alter table `registration` add constraint `uq2_const` unique key (`citizenship`);

insert into `branch` values("Kathmandu",1500000000);
insert into `branch` values("Pokhara",1000000000);
insert into `branch` values("Biratnagar",900000000);
insert into `branch` values("Janakpur",800000000);
insert into `branch` values("Bharatpur",750000000);
insert into `branch` values("Bigunj",700000000);
insert into `branch` values("Itahari",690000000);
insert into `branch` values("Lalitpur",700000000);
insert into `branch` values("Nepalgunj",770000000);
insert into `branch` values("Dhangadhi",800000000);
insert into `branch` values("Dharan",800000000);
insert into `branch` values("Hetauda",680000000);
insert into `branch` values("Bhaktapur",980000000);
insert into `branch` values("Butwal",900000000);
insert into `branch` values("Kritipur",800000000);
insert into `branch` values("Tulsipur",550000000);
insert into `branch` values("Siddharthanagar",400000000);
insert into `branch` values("Birendranagar",450000000);
insert into `branch` values("Tikapur",350000000);
insert into `branch` values("Ghorahi",500000000);
insert into `branch` values("Panauti",250000000);
insert into `branch` values("Gaighat",150000000);
insert into `branch` values("Rajbiraj",400000000);
insert into `branch` values("Baglung",100000000);
insert into `branch` values("Tansen",90000000);

-- insert into `registration` values("Sanjog Shrestha","m","2000-06-26","9812899991","ssanjogshrestha@gmail.com",
--         "52-39-03987","Ghorahi","Bank road","Ghorahi","456852",1001);


