create table users
(
id int not null auto_increment,
username varchar(36) not null unique,
password varchar(24) not null,
email varchar(255) not null unique,
primary key (id)
);

create table projects
(
id int not null auto_increment,
name varchar(64) not null,
primary key (id)
);

create table project_developers
(
id int not null auto_increment,
user_id int,
project_id int,
primary key (id),
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (project_id) REFERENCES projects(id)
);

create table messages
(
id int not null auto_increment,
messages_text varchar(255) not null,
created_by_developer int,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
primary key (id),
foreign key (created_by_developer) references project_developers(id)
);
