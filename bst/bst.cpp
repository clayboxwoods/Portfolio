//****************************************************************************
//       CLASS:  CSCE-2100
//  ASSIGNMENT:  Program 3
// DESCRIPTION:  This program creates a binary search tree(BST) using user input
//		 The BST needs to add integers, search for integers, and remove
//		 integers. The program can only accept integers from the user.
//
// Sources:  
//		 source 1:
//		 	http://stackoverflow.com/questions/20287186/how-to-check-if-the-input-is-a-valid-integer-without-any-other-char
//			used to check if integer
//		 Source 2:
//			http://www.cprogramming.com/tutorial/lesson18.html
//			this webitse helped me get a good starting point on what to 
//			do with my add function
//
//		 source 3:
//			Zak 
//			Zak helped me with some buggs and some search stuff. I worked with him for parts
//
//		 source 4:
//			http://www.algolist.net/Data_structures/Binary_search_tree/Lookup
//			good info in searching a tree
//
// SPECIAL INSTRUCTIONS:  
//
//****************************************************************************

#include <iostream>
#include <cstdlib>
using namespace std;

class bstree
{
    private:
        struct treeNode
        {
           treeNode* left;
           treeNode* right;
           int data;
        };
        treeNode* root;
    public:
        bstree()
        {
           root = NULL;
        }
        bool isEmpty() const { return root == NULL; }//THIS MIGHT BE CAUSING LOGIC ERROR
	void printInorder();
        void inorder(treeNode*);
        void printPreorder();
        void preorder(treeNode*);
        void printPostorder();
        void postorder(treeNode*);
        void addInt(int);
        void deleteNode(int);
	void searchFor(int);

};


int main()
{
    bstree b;
    int choice,choice2,temp,temp1,temp2;

    //Prompts the user for a choice
    while(1)
    {
       cout<<endl<<endl;
       cout<<" 1)Insert "<<endl;
       cout<<" 2)search for "<<endl;
       cout<<" 3)Remove "<<endl;
       cout<<" 4)Print out "<<endl;
       cout<<" 5)Exit "<<endl;
       cout<<" Please enter your choice: ";
       cin>>choice;

       //switch to do what the user wants
       switch(choice)
       {
           case 1: 
		    cout<<endl;
		    cout<<" Enter integer to insert: ";
                    cin>>temp;

		    //used sourse 1
		    while(cin.fail())	//function to check if intup is not int
		    {
			cin.clear();	//Clears the fail function
			cin.ignore();	//Ignores line of input larger than screan
			cout<< " Error! ONLY INTEGER INPUT ALLOWED " << endl;
			cout<< " Enter integer to insert: ";
			cin>> temp;
		    }//End of while 


                    b.addInt(temp);
                    break;

	   case 2:
		    cout<<endl;
		    cout<<" Enter an integer you want to search for: ";
		    cin>>temp2;

		    //used sourse 1
		    while(cin.fail())	//function to check if intup is not int
		    {
			cin.clear();	//Clears the fail function
			cin.ignore();	//Ignores line of input larger than screan
			cout<< " Error! ONLY INTEGER INPUT ALLOWED " << endl;
			cout<< " Enter integer to insert: ";
			cin>> temp2;
		    }//end of while

		    b.searchFor(temp2);
		    break;

	   case 3:
		    cout<<endl;
		    cout<<" Enter an integer you want to delete: ";
                    cin>>temp1;

		    //used sourse 1
		    while(cin.fail())	//function to check if intup is not int
		    {
			cin.clear();	//Clears the fail function
			cin.ignore();	//Ignores line of input larger than screan
			cout<< " Error! ONLY INTEGER INPUT ALLOWED " << endl;
			cout<< " Enter integer to insert: ";
			cin>> temp1;
		    }//end of while


                    b.deleteNode(temp1);
                    break;
	   case 4:
		   cout<<endl<<endl;
		   cout<<" 1)In-Order"<<endl;
		   cout<<" 2)Pre-Order"<<endl;
		   cout<<" 3)Post-Order"<<endl;
		   cout<<" Please enter your choice: ";
		   cin>>choice2;

		   //second menu to ask user for which print out
		   switch(choice2)
		   {
	       		    case 1: // in-order choice
				    cout<<endl;
                		    cout<<" In-Order "<<endl<<endl;
		                    b.printInorder();
				    cout<<endl;
		                    break;

	        	   case 2:  //pre-order choice
				    cout<<endl;
	        	            cout<<" Pre-Order "<<endl<<endl;
	      	        	    b.printPreorder();
	       		            break;

        		   case 3:  //post order choice
				    cout<<endl;
		                    cout<<" Post-Order "<<endl<<endl;
		                    b.printPostorder();
		                    break;

		   }//end of switch

		   break;

           case 5:
		    cout<<" Have a beautiful day :) "<<endl<<endl;
                    return 0;

       }//end of switch

    }//end of while
//  cout<<endl;
}//end of main


//*****************************************
//start add


//function to insert an int
void bstree::addInt(int d)
{

    bool searchFound = false;//bool to check if int is found

    //used to go through the tree and search
    treeNode* searchCurr;
    treeNode* searchParent;
    searchCurr = root;

    //while to find the int
    while(searchCurr != NULL)
    {
	 //used to return true if int is found
        if(searchCurr->data == d)
        {
            searchFound = true;
            break;
		}//end of if
		//goes to the next value if the current node isnt right
         else
         {
             searchParent = searchCurr;

             if(d>searchCurr->data)
				searchCurr = searchCurr->right;

             else
				searchCurr = searchCurr->left;

         }//end of else

    }//end of while

    //prints not found to user
    if(searchFound)
    {
        cout<<" ERROR: value aready in tree: "<< d <<endl;
        return;
    }//end of if


    //used to creat a new node. sets value and pointers
    treeNode* t = new treeNode;
    treeNode* parent;
    t->data = d;
    t->left = NULL;
    t->right = NULL;
    parent = NULL;

    //if it is empty set the root to t
    if(isEmpty()) root = t;

    //if it is not empty
    else
    {
        treeNode* current;
        current = root;//sets the nodes value to current

	//while current is still active
        while(current)
        {
            parent = current;
            if(t->data > current->data) 
				current = current->right;
            else current = current->left;
        }

	//moves the value to the left
        if(t->data < parent->data)
           parent->left = t;
	//moves the value to the right
        else
           parent->right = t;
    }
}//end of addInt


//*****************************************
//start delete
//*****************************************

//function to delete a nod
void bstree::deleteNode(int d)
{
    bool found = false;//bool to check if int is found

    //if there are no values
    if(isEmpty())
    {
        cout<<" There are no values in the tree! "<<endl;
        return;
    }//end of if

    //used to go through the tree and search
    treeNode* current;
    treeNode* parent;
    current = root;

    //while to find the int
    while(current != NULL)
    {
	 //used to return true if int is found
         if(current->data == d)
         {
            found = true;
            break;
	 }//end of if

	 //goes to the next value if the current node isnt right
         else
         {
             parent = current;
             if(d>current->data)
		current = current->right;

             else
		current = current->left;

         }//end of else

    }//end of while

    //prints not found to user
    if(!found)
    {
        cout<<" ERROR: Not found in tree: "<< d <<endl;
        return;
    }//end of if

    //if either the left is NULL and right is not OR right is NULL and left is not
    //has to move the only Node that is off the current node needing to be deleted
    if((current->left == NULL && current->right != NULL)|| (current->left != NULL&& current->right == NULL))
    {
	//if the left pointer = NULL and right pointer isnt NULL
	//goes into node and finds which to replace and delete
       if(current->left == NULL && current->right != NULL)
       {
	   //if the parent of the left pointer is the value being deleted
	   //moves the pointer and deletes the current value
           if(parent->left == current)
           {
             parent->left = current->right;
             delete current;
           }//end of if

	   //if parent of right pointer is the one needed
	   //moves the pointer and delets current node
           else
           {
             parent->right = current->right;
             delete current;
           }//end of else

       }//end of if

	//if the right pointer is NULL and the left is not
	//go into node and find which to replace and delete
       else
       {
	  //if the parent left is the value needed then replace and delete
          if(parent->left == current)
           {
             parent->left = current->left;
             delete current;
           }//end of if

	   //if parent right is value needed then replace and delete
           else
           {
             parent->right = current->left;
             delete current;
           }//end of else

       }//end of else
     return;
    }//end of if

    //if both the left and the right pointers are pointing to NULL
    //dont have not move and nodes on the pointers because there are non
    if( current->left == NULL && current->right == NULL)
    {
	//delets the left pointer
        if(parent->left == current)
		parent->left = NULL;
	//deletes the right pointer
        else
		parent->right = NULL;

	//deletes the node
	delete current;
	return;

    }//end of if

    //If both the left and right pointers have values
    //has to move around the pointers of right and left because both are taken by values
    //must replace then delete value
    if (current->left != NULL && current->right != NULL)
    {
	//sets chkr to the right pointer value
        treeNode* chkr;
        chkr = current->right;

	// if the right value has no items on its pointer then replace deleting value with it
        if((chkr->left == NULL) && (chkr->right == NULL))
        {
            current = chkr;
            delete chkr;
            current->right = NULL;
        }//end of if

	//if the right has values on its pointer(s)
        else
        {

	    //the right pointer has a value and left does not
	    //sets 2 pointers to that value and runs through till there is no left
            if((current->right)->left != NULL)
            {
                treeNode* lcurrent;
                treeNode* lcurrentp;
                lcurrentp = current->right;
                lcurrent = (current->right)->left;

		//once there is no left- you have hit the smallest right value
                while(lcurrent->left != NULL)
                {
                   lcurrentp = lcurrent;
                   lcurrent = lcurrent->left;
                }

		//sets the left most right value to the node being deleted
		//deletes the integer
		current->data = lcurrent->data;
                delete lcurrent;
                lcurrentp->left = NULL;
           }//end of else

	   //if the left pointer has a value and the righs do not
	   //makes temp to hold the data; sets the current data to temp then delets current and deletes temp
           else
           {
               treeNode* tmp;
               tmp = current->right;
               current->data = tmp->data;
	        current->right = tmp->right;
               delete tmp;

           }//end of else

        }//end of else
		 return;
    }//end of if

}//end of deleteNode



//***********************************
//start print


//function to direct to print inorder
void bstree::printInorder()
{
  inorder(root);
}//end of printInorder



//function to put tree in inorder
void bstree::inorder(treeNode* p)
{
    //If the bode isnt NULL
    if(p != NULL)
    {
        if(p->left) inorder(p->left);
        cout<<" "<<p->data<<" ";
        if(p->right) inorder(p->right);

    }//end of if

    else return;

}//end of inorder



//function to print and direct to preorder
void bstree::printPreorder()
{
    preorder(root);
}//end of printPreorder



//function to put tree in preorder
void bstree::preorder(treeNode* p)
{
    //if the node isnt NULL
    if(p != NULL)
    {
        cout<<" "<<p->data<<" ";
        if(p->left) preorder(p->left);
        if(p->right) preorder(p->right);
    }
    else return;
}//end of preorder


//sents tree to postorder the prints
void bstree::printPostorder()
{
    postorder(root);
}//end of printPostorder



//puts the tree in post-order
void bstree::postorder(treeNode* p)
{
    //if the node isnt NULL
    if(p != NULL)
    {
        if(p->left) postorder(p->left);
        if(p->right) postorder(p->right);
        cout<<" "<<p->data<<" ";
    }
    else return;
}//end of postorder


//*******************************************
//start search

//function used to search for an integer in the tree
void bstree::searchFor(int d)
{
    bool found = false;//bool to check if int is found

    //if there are no values
    if(isEmpty())
    {
        cout<<" There are no values in the tree! "<<endl;
        return;
    }//end of if

    //used to go through the tree and search
    treeNode* current;
    treeNode* parent;
    current = root;

    //while to find the int
    while(current != NULL)
    {
	 //used to return true if int is found
         if(current->data == d)
         {
            found = true;
            break;
	 }//end of if

	 //goes to the next value if the current node isnt right
         else
         {
             parent = current;

	     //checks if larger
	     //if so then sets it to the right
             if(d>current->data)
		current = current->right;

	     //if smaller then sets it to left
             else
		current = current->left;

         }//end of else

    }//end of while

    //prints true if found
    if(found)
    {
	cout<< "TRUE: "<< d <<endl;
    }//end of if

    //prints false if not found
    if(!found)
    {
        cout<<"False: "<< d <<endl;
        return;
    }//end of if


}//End of searchFor

//YAY DONE