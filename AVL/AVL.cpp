#include <iostream>
#include <cstdlib>
using namespace std;


//tree node; each has key, left node right node and height
struct node
{
	int key;
	struct node *left;
	struct node *right;
	int height;
};

//make a new node, it starts as a leaf
struct node* newNode(int key)
{
	//allocates size for a new node
	struct node* node = (struct node*) malloc(sizeof(struct node));
	
	//left and right point to null and height is 1
	node->left = NULL;
	node->right = NULL;
	node->key = key;
	node->height = 1;
	return(node);
}


int max(int left, int right);
int height(node *tempNode);
int balanceFactor(struct node* node);
struct node *rRotate(struct node *N);
struct node *lRotate(struct node *N);
struct node* insertNode(struct node* node, int key);
struct node* searchTree(struct node* N, int key);
struct node* removeNode(struct node* N, int key);
void preOrder(struct node *N);
void postOrder(struct node *N);
void inOrder(struct node *N);



int main()
{
	int choice,key, howMany;
	char tempChar;
	float tempFloat;
	struct node *root = NULL; 
	
	do
	{
		
		cout << "\nWhat would you like to do\n1)insert node, 2)delete node, 3)search node, 4)print tree, 0)exit: ";
		cin >> choice;
	
	
		switch(choice)
		{
			case 1:
				cout << "would you like multiple inputs (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << "How many: ";
					cin >> howMany;
					
					cout << "Enter the integers with new lines between:\n";
					for(int i=1; i<=howMany; i++)
					{
						cout << i << ") ";
						cin >> key;
						root = insertNode(root, (int)key);
					}
					
				}
				else
				{
					

					cout << "Would you like to add an int? (y/n): ";
					cin >> tempChar;
				
					if(tempChar == 'y' || tempChar == 'Y')
					{
						cout << "What is the int: ";
						cin >> key;
						root = insertNode(root, key);
						break;
					}
				
					cout << "Would you like to add a char? (y/n): ";
					cin >> tempChar;
					if(tempChar == 'y' || tempChar == 'Y')
					{
						cout << "What is the char (will be lowered): ";
						cin >> tempChar;
						key = (int)tolower(tempChar);
						root = insertNode(root, key);
					}
					else
					{
						cout << "What is the float youd like to add: ";
						cin >> tempFloat;
						key = (int)tempFloat;
						root = insertNode(root, key);
					
					}
				}
				break;
			case 2:
				cout << "Would you like to delete an int? (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << "What is the int: ";
					cin >> key;
					root = removeNode(root, key);
					//cout << "HHHHEEHEREREER" << endl;
					break;
				}
				
				cout << "Would you like to delete a char? (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << "What is the char: ";
					cin >> tempChar;
					key = (int)tolower(tempChar);
					root = removeNode(root, key);
					
				}
				else
				{
					cout << "What is the float youd like to delete: ";
					cin >> tempFloat;
					key = (int)tempFloat;
					root = removeNode(root, key);
					
				}
				break;
			case 3:
				cout << "Would you like to search for an int? (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << "What is the int: ";
					cin >> key;
					root = searchTree(root, key);
					break;
				}
				
				cout << "Would you like to search for a char? (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << "What is the char: ";
					cin >> tempChar;
					key = (int)tolower(tempChar);
					root = searchTree(root, key);
				
				}
				else
				{
					cout << "What is the float youd like to search for: ";
					cin >> tempFloat;
					key = (int)tempFloat;
					root = searchTree(root, key);
					
				}
				break;
				
			case 4:
				cout << "Would you likde to print in pre-order? (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << endl;
					cout << "PRE-ORDER";
					preOrder(root);
					cout << endl;
					break;
				}
				
				cout << "Would you like to print in in-order? (y/n): ";
				cin >> tempChar;
				if(tempChar == 'y' || tempChar == 'Y')
				{
					cout << endl;
					cout << "IN-ORDER";
					inOrder(root);
					cout << endl;
				}
				else
				{
					cout << endl;
					cout << "POST-ORDER";
					postOrder(root);
					cout << endl;	
				}
				break;
				
			case 0:
				cout << "Have a great day!" << endl;
				break;
			
			default:
				cout << "Wrong input!" << endl;
				break;
		}
	}while(choice != 0);
	return 0;
}

//use to find max of 2 ints
int max(int left, int right)
{
	//if left>right return left; else return right
    return (left > right)? left : right;
}

//returns height of tree
int height(node *tempNode)
{
	if(tempNode == NULL)
		return 0;
	return tempNode->height;
}

int balanceFactor(struct node* node)
{
	//if node isnt there
	if(node == NULL)
		return 0;
	//balance factor = height of left - height of right
	//if <-1 then left heavy
	//if >1 then right heavy
	return height(node->left) - height(node->right);
}


//performs a right rotation
//set temp to left and lefts right
//adj pointers
//new height 
struct node *rRotate(struct node *N)
{
	//set variables to point to left 
	struct node *temp1 = N->left;
	struct node *temp2 = temp1->right;
	
	//this does the rotation
	temp1->right = N;
	N->left = temp2;
	
	//get new hights
	//had one off by one error >:(
	temp1->height = max(height(temp1->left),height(temp1->right))+1;
	N->height = max(height(N->left),height(N->right))+1;
	
	return temp1;
}

//perform left rotation
//set temp to left and lefts right
//adj pointers
//new height
struct node *lRotate(struct node *N)
{
	//set variables to point to right
	struct node *temp1 = N->right;
	struct node *temp2 = temp1->left;
	
	//does the rotation
	temp1->left = N;
	N->right = temp2;
	
	//get new height
	temp1->height = max(height(temp1->left),height(temp1->right));
	N->height = max(height(N->left),height(N->right));
	
	return temp1;
}




//insert a new node, adjust to make AVL
//go through the tree till find the spot to insert
//call newNode
//balance tree
struct node* insertNode(struct node* node, int key)
{
	int balanceNum;
	
	//if there is no node; place the new one here
	if(node == NULL)
		return(newNode(key));
	//if the inserted node is bigger than the root
	else if(key > node->key)
	{
		node->right = insertNode(node->right, key);
	}
	//if the inserted node is smaller than the root
	else
	{
		node->left = insertNode(node->left, key);
	}
	
	//give the new node a height
	//check if right or left is taller
	node->height = max(height(node->left),height(node->right)) +1;
	
	//now must check and re-balance tree
	balanceNum = balanceFactor(node);
	
	//if balanceNum < -1 then left heavy
	//do left rotation
	if(balanceNum < -1 && key > node->right->key)
		return lRotate(node);
	
	//must do right rotation first then left rotation
	if(balanceNum < -1 && key < node->right->key)
	{
		node->right = rRotate(node->right);
		return lRotate(node);
	}
	
	//if balanceNum > 1 then right heavy
	//do right rotaation
	if(balanceNum > 1 && key < node->left->key)
		return rRotate(node);
	
	//must do left rotation first then right rotation
	if(balanceNum > 1 && key > node->left->key)
	{
		node->left = lRotate(node->left);
		return rRotate(node);
	}
	
	return node;
}


//searches the tree for a key
//go through tree till find right spot
//if n == NULL then not in tree; else there
struct node* searchTree(struct node* N, int key)
{
	if(N == NULL)
	{
		cout << "Node not found!\n";
		return N;
	}
	if(key == N->key)
	{
		cout << "Node found!\n";
		return N;
	}
	else if(key > N->key)
		N->right = searchTree(N->right, key);
	else
		N->left = searchTree(N->left, key);
}


//finds the min nodes value
struct node* minNode(struct node *N)
{
	struct node *walker = N;
	while(N->left != NULL)
		walker = N->left;
	
	return walker;
}


//deletes nodes
//goes through till finds right spot
//deletes then re-balance
struct node* removeNode(struct node* N, int key)
{
	
	int balanceNum;
	
	//first we have to find the node
	if(N == NULL)
		return N;
	
	//if smaller go to left
	if(key < N->key)
		N->left = removeNode(N->left, key);
	
	//if key is greater go to right
	else if(key > N->key)
		N->right = removeNode(N->right, key);
	
	//when the key = the node in the tree
	else
	{
		//cout << "HHHHEEHEREREER" << endl;
		//if one child is NULL or if 2 are NULL
		if(N->left == NULL || N->right == NULL)
		{
			//cout << "HHHHEEHEREREER" << endl;
			//set a tempNode = to whichever child is there
			struct node *temp1 = N->right ? N->right : N->left;
			
			//if tempNode = NULL then no children
			if(temp1 == NULL)
			{
				//cout << "HHHHEEHEREREER" << endl;
				//seg faults withput putting temp1 to null
				temp1 = NULL;
				N = NULL;
			}
			//one child
			else
				*N = *temp1;
			
			//always free values
			free (temp1);
			
		}
		//node with 2 children
		else
		{
			//get the smallest in the right subtree
            struct node* temp2 = minNode(N->right);
 
            //copy data to this node
            N->key = temp2->key;
 
            // Delete the temp node
            N->right = removeNode(N->right, temp2->key);
		}
	}
	
	
	//cout << "HHEERRERERERERERERE1111"<<endl;
	
	//give the new node a height
	//check if right or left is taller
	N->height = max(height(N->left),height(N->right)) +1;
	
	//now must check and re-balance tree
	balanceNum = balanceFactor(N);
	
	//cout << "HHEERRERERERERERERE22222"<<endl;
	//if balanceNum < -1 then left heavy
	//do left rotation
	if(balanceNum < -1 && key > N->right->key)
		return lRotate(N);
	
	//must do right rotation first then left rotation
	if(balanceNum < -1 && key < N->right->key)
	{
		N->right = rRotate(N->right);
		return lRotate(N);
	}
	
	//cout << "HHEERRERERERERERERE3333"<<endl;
	//if balanceNum > 1 then right heavy
	//do right rotaation
	if(balanceNum > 1 && key < N->left->key)
		return rRotate(N);
	
	//must do left rotation first then right rotation
	if(balanceNum > 1 && key > N->left->key)
	{
		N->left = lRotate(N->left);
		return rRotate(N);
	}
	//cout << "HHEERRERERERERERERE"<<endl;
	return N;
}


//prints pre-order
void preOrder(struct node *N)
{
	
    if(N != NULL)
    {
        cout << "\t" << N->key;
        preOrder(N->left);
        preOrder(N->right);
    }
}


//prints in-order
void inOrder(struct node *N)
{
	
    if(N != NULL)
    {
		inOrder(N->left);
        cout << "\t" << N->key;
        inOrder(N->right);
    }
}

//prints postorder
void postOrder(struct node *N)
{
	if(N != NULL)
	{
		postOrder(N->left);
		postOrder(N->right);
		cout<< "\t" << N->key ;
	}
}

