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
password varchar(24) not null,
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

create table posts
(
id int not null auto_increment,
created_by int,
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id),
FOREIGN KEY (created_by) REFERENCES project_developers(id)
);

create table comments
(
	id int PRIMARY KEY REFERENCES posts (id),
	parent_post_id int NOT NULL,
	comment_text text NOT NULL,
	created_at TIMESTAMP REFERENCES posts (created_at),
	created_by_developer int,
	FOREIGN KEY (parent_post_id) REFERENCES posts (id) ON DELETE CASCADE,
	FOREIGN KEY (created_by_developer) REFERENCES posts (created_by)
);

create table messages
(
id int PRIMARY KEY REFERENCES posts (id),
message_text text,
created_by_developer int,
created_at TIMESTAMP REFERENCES posts (created_at),
FOREIGN KEY (created_by_developer) REFERENCES posts(created_by)
);

create table stories
(
id int PRIMARY KEY REFERENCES posts (id),
story_name varchar(128) not null,
story_text text,
created_by_developer int,
created_at TIMESTAMP REFERENCES posts (created_at),
FOREIGN KEY (created_by_developer) REFERENCES posts(created_by)
);

create table tasks
(
id int PRIMARY KEY REFERENCES posts (id),
story_id int,
task_name varchar(128) not null,
task_text text not null,
created_by_developer int NOT NULL,
created_at TIMESTAMP REFERENCES posts (created_at),
priority varchar(12) NOT NULL,
status varchar(12) NOT NULL,
modified_at TIMESTAMP NOT NULL,
assigned_to int NOT NULL REFERENCES project_developers(id),
FOREIGN KEY (created_by_developer) REFERENCES posts(created_by),
FOREIGN KEY (story_id) REFERENCES stories(id)
);

create table task_assignments
(
id int not null auto_increment,
developer_id int,
task_id int,
primary key (id),
FOREIGN KEY (developer_id) REFERENCES project_developers(id),
FOREIGN KEY (task_id) REFERENCES tasks(id)
);

INSERT INTO projects ( name, password )
                       VALUES
                       ( 'hindenburg', 'passwordh' ),
                       ( 'titanic', 'passwordt' );

ALTER TABLE tasks ADD priority varchar(12) NOT NULL;
ALTER TABLE tasks ADD status varchar(12) NOT NULL;
ALTER TABLE tasks ADD modified_at TIMESTAMP NOT NULL;
ALTER TABLE tasks ADD assigned_to int NOT NULL REFERENCES project_developers(id);