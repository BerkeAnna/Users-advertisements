create table if not exists users(
    id int primary key not null,
    name varchar(60) not null
);

create table if not exists advertismenets(
    id int primary key not null,
    userid int not null,
    title varchar(60) not null,
    foreign key userid references users(id)
);