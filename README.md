## Booklist Project

This is a coding assessment project for Booj / ReMax.

This project is available at http://54.172.242.15/.


## About Project

This project is written in Vue/Laravel using a SPA architecture.


This project allows you to create, read, update, and delete a book from the
list.  You may also move an item in the list by clicking and dragging the
item to the new position.  Clicking the Book header of the table will sort
the list for you.


Unit/Feature tests are visible in the tests directory and a Postman collection is
available in the postman directory.

This code is deployed on an AWS instance.

## Project API

This project supports the following HTTP operations:

### Get books
HTTP Get "/books"

### Add book
HTTP Post "/add_book"

### Edit book
HTTP Post "/update_book/{id}"

### Delete book
HTTP Delete "/delete_book/{id}"

### Update All Books
HTTP Post "/update_all"
