CREATE TABLE Users(
    user_id varchar(255) NOT NULL
);

CREATE TABLE Posts(
    post_id int NOT NULL,
    content varchar(1000),
    author_id varchar(255) NOT NULL
);