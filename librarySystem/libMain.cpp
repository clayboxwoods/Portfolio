/*
Clay Woods(claywoods@my.unt.edu)
csce1040
hw 7
*/

#include "libGroups.h"
#include <string>
#include <iostream>

using namespace std;

Patrons *members;
Books *books;
CheckOuts *check;

//Checking if the Patron exists
bool patronexist(string id)
{
	members->walk = members->head;
	while(members->walk != NULL)//while there is still a member
	{
		if(members->walk->getId() == id)//if this is the member then true
			return true;

		members->walk = members->walk->nextPatron;
	}
return false;//else return false
}

//Checking if the book exists
bool Bookexist(string id)
{
	books ->walk = books ->head;//strats at the bgaining
	while(books ->walk != NULL)//while there are still books
	{
		if(books ->walk->getBookId() == id)//if this is the book then true
			return true;

		books ->walk = books ->walk->nextBook;
	}
return false;//else return false
}


int main()
{
	int menuChoice = -1;//used to reloop through the do while loop
	int menu2Choice = -1;//Used to go into the second switch statment
	string name;
	string id;
	string author;
	

	members = new Patrons();
	books = new Books();
	check = new CheckOuts();

	do
	{
		//Print Menu
		cout<<"Library Menu"<<endl;
		cout<<"1) Add a new patron"<< endl;
		cout<<"2) Remove a patron"<< endl;
		cout<<"3) Show patrons with fines"<<endl;
		cout<<"4) Show all patrons"<<endl; 
		cout<<"5) Add a new Book"<<endl;//wheere second switch is
		cout<<"6) Remove a book"<<endl;
		cout<<"7) print all book" <<endl;
		cout<<"8) print all Over-due book" <<endl;
		cout<<"9) Check-out a Book"<<endl;
		cout<<"10) Check-in a Book"<<endl;
		cin >> menuChoice;

		switch(menuChoice)
		{
			case 1:
				cout<< "What is the Patrons Last name: "<<endl;
				cin >> name;
				cout<<"What is the Patrons ID: "<<endl;
				cin >> id;
				if(!patronexist(id))
					members->newPatron(name,id);
				else //If the Patrons ID already exists
					cout <<"A current member with that ID already exist!!"<<endl;
				menuChoice =-1;
				break;
			case 4:
				members->printPList();//uses the print patrons function
				menuChoice =-1;
				break;
			case 3:
				members->printFineList();//uses the print fines function
				menuChoice = -1;
				break;
			case 2:
				cout<< "What is the patrons name: "<<endl;
                      		cin >> name;
                        	cout<<"What is the patrons ID: "<<endl;
                        	cin >> id;
				members->removePatron(name,id);//uses the remove patrons function with the variables given
				menuChoice = -1;
				break;
			case 5:
//switch for what they would like to create
				cout<< "What kind would you like to create: 1)Book  2)DVD  3)Book on tape  4)Reference: ";
				cin>> menu2Choice;
				switch(menu2Choice)
				{
					case 1: 
						cout << "What is the books title: "<<endl;
		                       		cin >> name;
						cout << "What is the authors name"<<endl;
						cin >> author;
       			                 	cout <<"What is the books ID: "<<endl;
       			                 	cin >> id;
						books->addBook(name,author,id,1);
						break;
					case 2:
						cout << "Whats the name of the DVD: "<<endl;
						cin >> name;
						cout << "What is the DVDs authors name: "<<endl;
						cin >>author;
						cout << "What is the DVDs ID: "<<endl;
						cin >> id;
						books->addBook(name, author, id, 2);
						break;
					case 3:
						cout << "Whats the name of the Book on tape: "<<endl;
						cin >> name;
						cout << "What is the authers name of the book: "<<endl;
						cin >> author;
						cout << "Whats the book on tapes ID: "<<endl;
						cin >> id;
						books->addBook(name,author,id,3);
						break;
					case 4:
						cout << "What is the name of the reference: "<<endl;
						cin >> name;
						cout << "What is the authors name of the reference: "<<endl;
						cin >> author;
						cout << "What is the references ID: "<<endl;
						cin >> id;
						books->addBook(name,author,id,4);
						break;
				}
				menuChoice = -1;
				menu2Choice = -1;
				break;
			case 6:
				cout<< "What is the books title: "<<endl;
                       		cin >> name;
                        	cout<<"What is the books ID: "<<endl;
                        	cin >> id;
				books->removeBook(name,id);//runs the remove book function with the variables given
				menuChoice = -1;
				break;
			case 7:
				books->printAllBook();//runs the print all function
				menuChoice = -1;
				break;
			case 8:
				check->printOverdueBook();//runs the overdue print function
				menuChoice = -1;
				break;
			case 9:
				cout<< "What is the Patrons name: "<<endl;
                        	cin >> name;
				cout<< "What is the Patrons ID: "<<endl;
                        	cin >> id;
				cout<< "What is the books title: "<<endl;
                        	cin >> author;

				if(patronexist(id) && Bookexist(author))//Checks for patron and book existance
				{	
					check->checkOutBook(name,author,id);
//					books->setChecked(author,0);
					check->printCheckouts();
				}
				menuChoice = -1;
				break;
			case 10:
				cout<< "What is the patrons name: "<<endl;
                        	cin >> name;
				cout<< "What is the patrons ID: "<<endl;
                        	cin >> id;
				cout<< "What is the books title: "<<endl;
                	        cin >> author;
				if(patronexist(id) && Bookexist(author))//checks for patron and book existance
				{
					check->checkInBook(name,id,author);
//					books->setChecked(author,1);
					cout <<name <<"Checked out!"<<author<<endl;

				}
				menuChoice = -1;//defaults to -1 to act as a anti-quit
				break;


		}

	}while(menuChoice !=0); //acts as an exit

	return 0;
}//End of 


