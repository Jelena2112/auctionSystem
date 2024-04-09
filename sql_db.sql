create table auction
(
    id         int auto_increment
        primary key,
    product_id int           not null,
    owner      int           not null,
    latest_bid int default 0 not null,
    won_by     int           not null
);

create index auction_owner_index
    on auction (owner);

create index auction_won_by_index
    on auction (won_by);

create table bids
(
    id         int not null,
    auction_id int not null,
    amount     int not null,
    user_id    int not null
);

create index bids_auction_id_index
    on bids (auction_id);

create index bids_id_index
    on bids (id);

create index bids_user_id_index
    on bids (user_id);

create table products
(
    id     int auto_increment
        primary key,
    name   varchar(64) not null,
    price  int         not null,
    amount int         null,
    constraint products_name_pk
        unique (name)
);

create table users
(
    id       int auto_increment
        primary key,
    email    varchar(128) not null,
    password varchar(200) not null,
    constraint email_pk
        unique (email)
);

