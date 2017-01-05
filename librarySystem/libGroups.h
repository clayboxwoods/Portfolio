/*
Clay Woods (claywoods@my.unt.edu)
csce1040
hw 7
*/


#include "libSingle.h"
#include <vector>

//This is for the patrons class
class Patrons
{
//The public variables are used to run through all the patrons
	public:	
//Old code
	Patron *head;
	Patron *walk;
	Patron *tail;
	Patron *temp;
//New code
	vector<Patron> allPatrons;

//some functions used later in main	
	void newPatron(string,string);//adds a patron
	void removePatron(string,string);//removes a patron
	void printPList();//prints the patrons
	void printFineList();//prints the patrons with fines (MIGHT HAVE TO MOVE TO CHECKOUTS)
	Patrons();
	
};

//Class for all the books
class Books
{
//public variables used to run through all the books
	public:
//Old code
	int counter;
	Book *head;
	Book *walk;
	Book *tail;
	Book *temp;
//New code
	Book *allbooks[50];//Dont know how large to make it also cant sort
	vector<Book> allBooks;

//functions used later in main	
	void newBook(string,string,string);//add a new book
	void removeBook(string,string); //remove a book
	void addBook(string, string, string, int);
	void deletBook(string, string);
	void printAllBook();//print all the books
	void setChecked(string,int); //add a book to checked-out (might have to move to checkOuts)
	Books();


};

//class for all the checkouts
class CheckOuts
{
//public variables used to run through all the checkouts
	public:
//Old code
	Checkout *head;
	Checkout *walk;
	Checkout *tail;
	Checkout *temp;
//New code
	vector<CheckOuts> allCheckouts;

//functions used in main
	void printOverdueBook();//print all over due books
	void checkOutBook(string,string,string);//chouck-out a book
	void checkInBook(string,string,string);//check-in a book
	void printCheckouts();//print all the check-outs
	CheckOuts();//check-out a book
};


