<?php declare(strict_types=1);

//contacts
//
//require_once "Contacts/ContactDAO.php";
//require_once "Contacts/Contact.php";
//$contactDAO = new ContactDAO();
//
//$contact_id = $contactDAO->create(new Contact(0,"test","test","test","test"));
//$contact = $contactDAO->read($contact_id);
//$contact->setLastname("Name is updated");
//$contactDAO->update($contact);
//$contactDAO->delete($contact);
//var_dump($contact);
//echo "<br><br><br>";


//orders
//require_once "Orders/order.php";
//require_once "Orders/OrderDAO.php";
//require_once "Orders/Item.php";
//require_once "Orders/ItemDAO.php";
//
//$itemDAO = new ItemDAO();
//$item_id = $itemDAO->create(new Item(0,"test",120));
//$item = $itemDAO->read($item_id);
//$item->setPrice(1000);
//$itemDAO->update($item);
//
//var_dump($item);
//echo "<br><br><br>";
//
//$orderDAO = new OrderDAO();
//$order_id = $orderDAO->create(new Order(0,$item,new DateTime("now")));
//$order = $orderDAO->read($order_id);
//$order->setDate(new DateTime("2024-02-03"));
//$orderDAO->update($order);
//$orderDAO->delete($order);
//
//$itemDAO->delete(($item));
//
//var_dump($order);
//echo "<br><br><br>";


//blog
//require_once "Blog/Post.php";
//require_once "Blog/PostDAO.php";
//require_once "Blog/Comment.php";
//require_once "Blog/CommentDao.php";
//$postDAO = new PostDAO();
//$post_id =$postDAO->create(new Post(0,"test","test",new DateTime("now")));
//$post = $postDAO->read($post_id);
//$post->setTitle("updated title");
//$postDAO->update($post);
//
//$commentDAO = new CommentDAO();
//$commentDAO->create(new Comment(0,$post,"test","test",new DateTime("now")));
//$commentDAO->create(new Comment(0,$post,"test","test",new DateTime("now")));
//$commentDAO->create(new Comment(0,$post,"test","test",new DateTime("now")));
//
//var_dump($post);
//echo "<br><br><br>";



//catalogue
//require_once "Catalogue/Book.php";
//require_once "Catalogue/BookDAO.php";
//require_once "Catalogue/Author.php";
//require_once "Catalogue/AuthorDAO.php";
//$bookDAO = new BookDAO();
//$book_id =$bookDAO->create(new Book(0,"test",new DateTime("now"),"test"));
//$book = $bookDAO->read($book_id);
//$bookDAO->update($book);
//
//
//var_dump($book);
//echo "<br><br><br>";
//
//$authorDAO = new AuthorDAO();
//$author_id =$authorDAO->create(new Author(0,"test","test"));
//$author = $authorDAO->read($author_id);
//$authorDAO->update($author);
//
//var_dump($author);
//echo "<br><br><br>";
//
//
//$book_id1 = $bookDAO->create(new Book(0,"test",new DateTime("now"),"test"));
//$book_id2 = $bookDAO->create(new Book(0,"test",new DateTime("now"),"test"));
//$book_id3 = $bookDAO->create(new Book(0,"test",new DateTime("now"),"test"));
//$book1 = $bookDAO->read($book_id1);
//$book2 = $bookDAO->read($book_id2);
//$book3 = $bookDAO->read($book_id3);
//
//$authorDAO->linkAuthorToBook($author,$book1);
//$authorDAO->linkAuthorToBook($author,$book2);
//$authorDAO->linkAuthorToBook($author,$book3);
//
//$author = $authorDAO->read($author_id);
//
//var_dump($author);
//
//$authorDAO->unlinkAuthorToBook($author,$book1);
//$authorDAO->unlinkAuthorToBook($author,$book2);
//$authorDAO->unlinkAuthorToBook($author,$book3);
//
//$author_id1 = $authorDAO->create(new Author(0,"test","test"));
//$author_id2 = $authorDAO->create(new Author(0,"test","test"));
//$author_id3 = $authorDAO->create(new Author(0,"test","test"));
//$author1 = $authorDAO->read($author_id1);
//$author2 = $authorDAO->read($author_id2);
//$author3 = $authorDAO->read($author_id3);
//
//$bookDAO->linkBookToAuthor($author1,$book);
//$bookDAO->linkBookToAuthor($author2,$book);
//$bookDAO->linkBookToAuthor($author3,$book);
//
//
//$bookDAO->unlinkBookToAuthor($author1,$book);
//$bookDAO->unlinkBookToAuthor($author2,$book);
//$bookDAO->unlinkBookToAuthor($author3,$book);
//
//var_dump($book);

//students

//require_once "Students/Student.php";
//require_once "Students/StudentDAO.php";
//require_once "Students/Subject.php";
//require_once "Students/SubjectDAO.php";
//require_once "Students/Grade.php";
//require_once "Students/GradeDAO.php";
//
//
//
//$studentDAO = new StudentDAO();
//$student_id = $studentDAO->create(new Student(0,"test","test","test"));
//$student = $studentDAO->read($student_id);
//$studentDAO->update($student);
//$studentDAO->delete($student);
//
//var_dump($student);

//$subjectDAO = new SubjectDAO();
//$subject_id = $subjectDAO->create(new Subject(0,"test","test"));
//$subject = $subjectDAO->read($subject_id);
//$subjectDAO->update($subject);
//$subjectDAO->delete($subject);

//var_dump($subject);
//
//$gradeDAO = new GradeDAO();
//$grade_id = $gradeDAO->create(new Grade(0,$student->getStudentId(),$subject->getSubjectId(),100));
//$gradeDAO->create(new Grade(0,$student->getStudentId(),$subject->getSubjectId(),99));
//$gradeDAO->create(new Grade(0,$student->getStudentId(),$subject->getSubjectId(),98));
//$grade = $gradeDAO->read($grade_id);
//$gradeDAO->update($grade);
//$gradeDAO->delete($grade);
//
//$student = $studentDAO->read($student_id);
//var_dump($student);