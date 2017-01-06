/*
clay Woods(claywoods@my.unt.edu)
csce1040
hw 7
*/

#include <iostream>
#include <string>
#include "libGroups.h"
using namespace std;


//Begain Patron
Patron::Patron(string Pname,string Pid)//creates patron
{
	id = Pid;
	name = Pname;
	fine = 0;//sets the fine as 0 to start
}

bool Patron:: hasFine()//checks for fine
{
	return fine > 0;//returns true if patron has a fine
}//end of func

string Patron:: getName()//gets the patrons name
{
	return name;
}//end of func

string Patron:: getId()//Gets the patrons ID
{
	return id;
}//end of func

//End Patron


//Begain Book
Book::Book(string bookname,string auth,string uid)//creates a book
{
	title = bookname;
	bookId = uid;
	author = auth;
}

string Book::getBookName()//gets book name
{
	return title;
}//end of func

string Book::getBookId()//Gets book ID
{
	return bookId;
}//end of func

bool Book:: isCheckedOut()//makes checked out
{
	return checkedOut;
}//end of func

//Begains offset books classes

DVD::DVD(string dvdname, string auth, string uid) : Book(dvdname, auth, uid)
{
//Nothing needed
}

//whenever the function to choose a BookOnTape is called
BookOnTape::BookOnTape(string dvdname, string auth, string uid): Book(dvdname, auth, uid)
{
//Nothing needed
}

//Whenever the function to created a DVD is called
Reference::Reference(string dvdname, string auth, string uid) : Book(dvdname, auth, uid)
{
//Nothing needed
}



//End book


//begain patrons

//sets up the patron variables
Patrons::Patrons()
{
	
}

//creats a patron
void Patrons:: newPatron(string patron_name,string uid)
{
	Patron *tempPatron;
	tempPatron = new Patron(patron_name,uid);//sets tempPatron to the user input
	allPatrons.push_back(*tempPatron);//puts tempPatron onto the end of the Patrons vector


}//end of function

//Prints a list of patrons
void Patrons:: printPList()
{
	for(int i=0; i<allPatrons.size(); i++)
	{
		cout<< i+1<<") "<<"Name: "<< allPatrons[i].getName()<< " ID: "
<<allPatrons[i].getId()<< "\n";

	}//End of for


}//end of function

//Prints a list of fines
void Patrons::printFineList()
{
	int counter=1;

	for(int i=0; i<allPatrons.size();i++)
	{
		if(allPatrons[i].hasFine())//goes ino the fines list and prints it out
		{
			cout<< i+1<< ") Name: "<<allPatrons[i].getName()<< " ID: "<<allPatrons[i].getId() << "\n";
			counter++;
		}//End of if
		if(counter ==1)//For the instance where there are no patrons with fines
			cout<<"There are no Patrons with fines."<<endl;
	}//End of for

}//end of funcion

//Removes a patron
void Patrons::removePatron(string name,string id)
{
//	cout<<"HERE"<<endl;
	int at=-1;

	for(int i=0;i<allPatrons.size();i++)
	{
		if(allPatrons[i].getName() == name && allPatrons[i].getId() == id)//Checks to match up the names and id
		{
			at=i;//If the person exists mark at as where the patron is
			break;
		}//End of for

		if(at=-1)//If there isnt a Patron with that name and Id
			cout<<"This Patron does'nt exist."<<endl;
		else
			allPatrons.erase(allPatrons.begin() + at);
		
	}//End of for



}//end of function

//End patrons




//Begain Books

//Sets upt the book variables
Books::Books()
{
	counter=0;
}

//Adds a new book, dvd, book on tape, or reference to the library
void Books::addBook(string bookn,string booka,string bookid,int type)
{
	Book *tempBook;
	DVD *tempDVD;
	BookOnTape *tempBookOnTape;
	Reference *tempReference;


		switch(type) //checks which type of book to create
		{
			case 1:
				tempBook = new Book(bookn,booka,bookid);
				allBooks.push_back(*tempBook);
				break;
			case 2:
				tempDVD = new DVD(bookn,booka,bookid);
				allBooks.push_back(*tempDVD);
				break;
			case 3:
				tempBookOnTape = new BookOnTape(bookn,booka,bookid);
				allBooks.push_back(*tempBookOnTape);
				break;
			case 4:
				tempReference = new Reference(bookn,booka,bookid);
				allBooks.push_back(*tempReference);
				break;
		}//end of switch
		counter++;

}//End of function


//Removes a book
void Books::removeBook(string name,string id)
{
	int at=-1;

	for(int i=0;i<allBooks.size();i++)
	{
		if(allBooks[i].getBookName() == name && allBooks[i].getBookId() == id)//Checks to match up the names and id
		{
			at=i;//If the person exists mark at as where the patron is
			break;
		}//End of for

		if(at=-1)//If there isnt a Book with that name and Id
			cout<<"This Book does'nt exist."<<endl;
		else
			allBooks.erase(allBooks.begin() + at);//Erases the book

	}//End of for


}//end of function


//Prints over due books
void CheckOuts::printOverdueBook()
{
/*	for(int i=0;i<allBooks.size();i++)
	{
		cout<< allBooks[i].getBookName()<<endl;
	}//End of for
*/

}//End of function

//Prints all books
void Books::printAllBook()
{
	for(int i=0;i<allBooks.size();i++)
	{
		cout<< allBooks[i].getBookName()<<endl;//simply prints out all books
	}//End of for

}//end of function


//End books

//Begain Checkout

//sets up checkout variables
Checkout::Checkout(string name, string id,string bname)
{
	patronsName= name;
	patronsId= id;
	booksName= bname;
}//end of func

//gets patron ID for checkout
string Checkout::getPatronsId()
{
	return patronsId;
}//end of func

//gets book for checkout
string Checkout::getBooksName()
{
	return booksName;
}//end of func

//gets patron for checkout
string Checkout::getPatronsName()
{
	return patronsName;
}//end of func

//Sets up check outs
CheckOuts::CheckOuts()
{

}//End of checkout

//Checks a book out
void CheckOuts::checkOutBook(string name,string book,string id)
{
	Checkout *tempcheck;

	tempcheck = new Checkout(name,id,book);//creates an instance of a check out
	//allCheckouts.push_back(*tempcheck);//Puts the new checkout at the end

}//end of function

//Checks a book in
void CheckOuts::checkInBook(string name,string id,string bookname)
{

	int at = -1;
	
	for(int i = 0; i < allCheckouts.size(); i++)
	{
		if(head->getPatronsName() == name && head->getPatronsId() == id && head->getBooksName() ==bookname)
		{
			at = i;
			break;
		}
	}
	if(at=-1)
		cout<<"This book does not exists"<<endl;
	else
		allCheckouts.erase(allCheckouts.begin() + at);


}//end of function

//Prints checkouts
void CheckOuts::printCheckouts()
{
	for(int i =0; i < allCheckouts.size();i++)
	{
	//	cout<< allCheckouts[i].getPatronsName()<< " Checked out " <<allCheckouts[i].getBooksName() <<endl;
	}

}//end of function

//End checkout

