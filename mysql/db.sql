
DROP TABLE IF EXISTS contacts;

CREATE TABLE IF NOT EXISTS contacts
(
    contact_id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    email VARCHAR(100),
    phone_number VARCHAR(20),
    PRIMARY KEY(contact_id)
);

DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS items;

CREATE TABLE IF NOT EXISTS items
(
    item_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    price INT,
    PRIMARY KEY(item_id)
);

CREATE TABLE IF NOT EXISTS orders
(
    order_id INT NOT NULL AUTO_INCREMENT,
    item_id INT NOT NULL,
    date DATETIME,

    PRIMARY KEY(order_id),
    CONSTRAINT FOREIGN KEY (item_id)
        REFERENCES items(item_id)
);


DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;

CREATE TABLE IF NOT EXISTS posts
(
    post_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100),
    text TEXT,
    date DATETIME,

    PRIMARY KEY(post_id)
);

CREATE TABLE IF NOT EXISTS comments
(
    comment_id INT NOT NULL AUTO_INCREMENT,
    post_id INT NOT NULL,
    text TEXT,
    author VARCHAR(100),
    date DATETIME,

    PRIMARY KEY(comment_id),
    CONSTRAINT FOREIGN KEY (post_id)
        REFERENCES posts(post_id)
        ON DELETE CASCADE
);


DROP TABLE IF EXISTS authorBooks;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS authors;

CREATE TABLE IF NOT EXISTS books
(
    book_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100),
    publication_year DATETIME,
    isbn VARCHAR(100),

    PRIMARY KEY(book_id)
);

CREATE TABLE IF NOT EXISTS authors
(
    author_id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100),
    lastname VARCHAR(100),

    PRIMARY KEY(author_id)
);

CREATE TABLE IF NOT EXISTS authorBooks
(
    author_id INT NOT NULL,
    book_id INT NOT NULL,

    PRIMARY KEY (book_id, author_id),
    CONSTRAINT
        FOREIGN KEY (book_id) REFERENCES books(book_id)
            ON DELETE CASCADE,
    CONSTRAINT
        FOREIGN KEY (author_id) REFERENCES authors(author_id)
            ON DELETE CASCADE

);

DROP TABLE IF EXISTS grades;
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS subjects;

CREATE TABLE IF NOT EXISTS students
(
    student_id INT AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    student_group VARCHAR(10),
    PRIMARY KEY (student_id)
);

CREATE TABLE IF NOT EXISTS subjects
(
    subject_id INT AUTO_INCREMENT NOT NULL,
    teacher VARCHAR(100),
    name VARCHAR(100),
    PRIMARY KEY (subject_id)
);

CREATE TABLE IF NOT EXISTS grades
(
    grade_id INT AUTO_INCREMENT NOT NULL,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    grade INT,
    PRIMARY KEY (grade_id,student_id, subject_id),
    CONSTRAINT
        FOREIGN KEY (student_id) REFERENCES students(student_id)
            ON DELETE CASCADE,
    CONSTRAINT
        FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
            ON DELETE CASCADE
);