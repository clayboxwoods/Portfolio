/*
Clay Woods(claywoods@my.unt.edu)
csce1040
hw 7
*/

#include <string>
using namespace std;

//class for all the single patrons
class Patron
{
//private variables for each individual patron
	private:
	string id;
	string name;

//public functions to get those variables used in functions
	public:
	int fine;
	bool hasFine();//checks if has fine or not
	Patron *nextPatron;
	string getName();//gets patrons Name
	string getId();//gets patrons ID
	Patron(string,string);//creates a new patron

};

//class for each single book
class Book
{
//private variables for each book
	private:
	string title;
	string author;
	string bookId;

//functions used to get those private variables and other things
	public:
	bool checkedOut;//function to check if checked-out
	bool Overdue;//function to check if overdue
	Book *nextBook;
	string getBookName();//Function to get the name
	string getBookId();//function to get the ID
	bool isCheckedOut();//true or false of if its checkedout
	Book(string,string,string);//creates a book

};

//Thiss class is for the books on tape. It an extention of the book class
class BookOnTape: public Book
{
	public:
	BookOnTape(string, string, string);//creates a book on tape
};//End of BookOnTape


//This class is for DVDs. its an extintion of the Book class
class DVD: public Book
{
	public:
	DVD(string, string, string);//creates a DVD
};//End of DVD


//This class is foe freferance. it is an extention of the Book class
class Reference: public Book
{
	public:
	Reference(string, string, string);//creates a reference
};//End of Reference

//class for each single cheack-out
class Checkout
{
//private variables for each check-out
	private:
	string patronsName;
	string booksName;
	string patronsId;

//functions to get those veriables and other things
	public:	
	bool Overdue;//check if overdue
	Checkout *next;
	string getPatronsName();//getrs the patrons name
	string getPatronsId();//gets the patrons ID
	string getBooksName();//gets the book name
	Checkout(string,string,string);//creates a check-out

};


